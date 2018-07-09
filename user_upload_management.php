<?php include_once('includes/config.php'); ?>
<?php
$_SESSION['user_id'] = 1;

function process_user_file($db, $user, $user_filename, $user_filedate, $user_filetype, $user_file){
    // check if file downloaded with error
    if ($user_file['error'] !== UPLOAD_ERR_OK) {
        return "Ошибка загрузки!";
    }
    
    $file_tmp_name  = $user_file['tmp_name'];

    $allowed_mime_types  = ['image/jpeg', 'image/jpg', 'image/png', 'image/svg', 'image/gif',
                        'application/pdf', 'application/msword'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file_tmp_name);
    // check if file file extension is bad
    if(!in_array($mime, $allowed_mime_types)){
        return "Данное разрешение не поддерживается нашим сервисом!";
    }

    $max_size = 2000000;
    // check file size
    if($user_file['size'] > $max_size){
        return "Наш сервис не поддерживает загрузку файлов размером больше 2Мб!";
    }

    // check if file is malicious
    if(is_uploaded_file($file_tmp_name)){
        $file_name = $user_file['name'];
        $file_extension = strtolower(end(explode('.',$file_name)));

        // user files directory == user_uploads/user_id_uploads/
        $upload_dir = getcwd()."/user_uploads/".$_SESSION['user_id']."_uploads/";
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        // + check if user_folder contains 30 files already
        // + check if file with such name and type already exists
        // + rename user file using user id and time of upload in milliseconds
        // + save file to user directory
        // + save data about file in db (user_uploads_user_id, user_uploads_upload_type_id, user_uploads_filename, 
        // + user_uploads_date, user_uploads_extension, user_uploads_path)

        return "ОК";
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
        $filename = basename($filepath);
        if(file_exists($filepath)){
            header("Content-Type: application/octet-stream");
            header("Content-Disposition: attachment; filename=$filename");
            readfile($filepath);
        }
    }

    else if(isset($_GET['delete_file'])){
        $filepath = $_GET['delete_file'];
        $filename = basename($filepath);
        if (file_exists($filepath) && is_writable($filepath)) {
            unlink($filepath);
        }
        header("Location: docs_test.php");
    }

    else if(isset($_GET['get_zip_files'])){
        $folder_path = $_GET['get_zip_files'];
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
}
catch(Exception $e){
    $e->getMessage();
}
?>