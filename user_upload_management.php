<?php
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
        //print();
        if (is_writable($filepath)) {
            unlink($filepath);
        }
        header("Location: docs_test.php");
    }
?>