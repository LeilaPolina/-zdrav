<?php include_once('includes/config.php'); ?>
<?php

function check_extension($file_tmp_name){
    $allowed_mime_types  = ['image/jpeg', 'image/jpg', 'image/png', 'image/svg', 'image/gif',
                        'application/pdf', 'application/msword'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file_tmp_name);
    if(!in_array($mime, $allowed_mime_types)){
        return false;
    }
    return true;
}

function check_size($file_size, $max_size){
    if($file_size > $max_size){
        return false;
    }
    return true;
}

function check_files_quantity($upload_dir, $max_quantity){
    $filecount = 0;
    $files = glob($upload_dir . "*"); // find all files in directory
    if ($files){
        $filecount = count($files);
    }
    if($filecount > $max_quantity){
        return false;
    }
    return true;
}

function check_if_already_in_db($db, $user_filetype, $user_filename, $user_filedate){
    $check_file_in_db = $db->prepare('SELECT * FROM user_uploads WHERE 
                                        user_uploads_user_id = :user_id AND
                                        user_uploads_upload_type_id = :user_filetype AND
                                        user_uploads_filename = :user_filename AND
                                        user_uploads_date = :user_filedate');
    $check_file_in_db->execute(array(
        ':user_id' => $_SESSION['user_id'],
        ':user_filetype' => $user_filetype,
        ':user_filename' => $user_filename,
        ':user_filedate' => $user_filedate
    ));
    $check_rows = $check_file_in_db->fetchAll();
    if(count($check_rows) > 0){
        return false;
    }
    return true;
}

function save_file_data_to_db($db, $user_filetype, $user_filename, $user_filedate, $file_extension, $new_filename){
    $save_file = $db->prepare('INSERT INTO user_uploads (user_uploads_user_id, user_uploads_upload_type_id, user_uploads_filename, 
                                user_uploads_date, user_uploads_extension, user_uploads_path) 
                                VALUES (:user_id, :user_filetype, :user_filename, :user_filedate, 
                                :file_extension, :file_path)');
    $save_file->execute(array(
        ':user_id' => $_SESSION['user_id'], 
        ':user_filetype'=> $user_filetype, 
        ':user_filename'=> $user_filename, 
        ':user_filedate'=> $user_filedate, 
        ':file_extension' => $file_extension, 
        ':file_path' => $new_filename
    ));
}

function process_user_file($db, $user, $user_filename, $user_filedate, $user_filetype, $user_file){
    // check if file downloaded with error
    if ($user_file['error'] !== UPLOAD_ERR_OK) {
        return "Ошибка загрузки!";
    }
    
    // check if file file extension is not allowed
    $file_tmp_name  = $user_file['tmp_name'];
    if(!check_extension($file_tmp_name)){
        return "Данное разрешение не поддерживается нашим сервисом!";
    }
    else{
        if(!check_size($user_file['size'], 2000000)){
            return "Наш сервис не поддерживает загрузку файлов размером больше 2Мб!";
        }
        else{
            if(!is_uploaded_file($file_tmp_name)){
                return "Что-то пошло не так, попробуйте позже!";
            }
            else{
                // user files directory == user_uploads/user_id_uploads/..
                $upload_dir = getcwd()."/user_uploads/".$_SESSION['user_id']."_uploads/";
                // create folder if doesn't exist
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }

                if(!check_files_quantity($upload_dir, 30)){
                    return "Наш сервис поддерживает хранение не более 30 файлов";
                }
                else{
                    if(!check_if_already_in_db($db, $user_filetype, $user_filename, $user_filedate)){
                        return "Файл с таким же названием и видом уже был загружен в этот день!";
                    }
                    else{
                        //everything ok, saving to db and to user folder
                        $file_name = $user_file['name'];
                        $file_extension = strtolower(end(explode('.', $file_name)));

                        // rename user file using user id and time of upload in milliseconds
                        $new_filename = $_SESSION['user_id'].'_'.round(microtime(true));
                        $new_path = $new_filename.'.'.$file_extension;
                        save_file_data_to_db($db, $user_filetype, $user_filename, $user_filedate, $file_extension, $new_filename);
                        
                        //save file to user folder
                        move_uploaded_file($file_tmp_name, $upload_dir.$new_path);
                        return "ОК";
                    }
                }
            }
        }
    }
}

function download_file($filepath){
    $filename = basename($filepath);
    if(file_exists($filepath)){
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=$filename");
        readfile($filepath);
    }
}

function delete_file($db, $filepath){
    $filename = basename($filepath);
    $file_extension = strtolower(end(explode('.', $filename)));
    $filename = basename($filepath, '.'.$file_extension);
    $delete_file = $db->prepare('DELETE FROM user_uploads 
                                WHERE user_uploads_user_id = :user_id AND
                                user_uploads_extension = :file_extension AND
                                user_uploads_path = :file_path');
    $delete_file->execute(array(
        ':user_id' => $_SESSION['user_id'],
        ':file_extension' => $file_extension, 
        ':file_path' => $filename
    ));

    if (file_exists($filepath) && is_writable($filepath)) {
        unlink($filepath);
    }
    header("Location: docs.php");
}

function get_zip($folder_path){
    if(file_exists($folder_path)) {            
        $rootPath = realpath($folder_path);
        $zip_name = $folder_path.'.zip';

        $zip = new ZipArchive();
        $zip->open($zip_name, ZipArchive::CREATE | ZipArchive::OVERWRITE);

        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($rootPath),
            RecursiveIteratorIterator::LEAVES_ONLY
        );
        foreach ($files as $name => $file)
        {
            if (!$file->isDir())
            {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
        
        $filename = basename($zip_name);
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=$filename");
        readfile($zip_name);
        if (is_writable($zip_name)) {
            unlink($zip_name);
        }
    }
}

try{
    if(isset($_POST['user_file_name'])){        
        $user_filename = $_POST['user_file_name'];
        $user_filedate = $_POST['user_file_date'];
        $user_filetype = $_POST['user_file_type'];
        $user_file = $_FILES['user_file'];

        echo process_user_file($db, $user, $user_filename, $user_filedate, $user_filetype, $user_file);
    }

    else if(isset($_GET['download_file'])){
        $filepath = $_GET['download_file'];
        download_file($filepath);
    }

    else if(isset($_GET['delete_file'])){
        $filepath = $_GET['delete_file'];
        delete_file($db, $filepath);
    }

    else if(isset($_GET['get_zip_files'])){
        $folder_path = $_GET['get_zip_files'];
        get_zip($folder_path);        
    }
}
catch(Exception $e){
    $e->getMessage();
}
?>