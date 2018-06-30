<?php
try{
    if(isset($_GET['download_file'])){
        $filepath = $_GET['download_file'];
        $filename = basename($filepath);
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=$filename");
        readfile($filepath);
    }

    if(isset($_GET['delete_file'])){
        $filepath = $_GET['delete_file'];
        $filename = basename($filepath);
        if (is_writable($filepath)) {
            unlink($filepath);
        }
        header("Location: docs_test.php");
    }

    if(isset($_GET['get_zip_files'])){
        $folder_path = $_GET['get_zip_files'];
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
catch(Exception $e){

}
?>