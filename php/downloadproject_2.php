<?php
if(!empty($_POST['file'])){
    $fileName = basename($_POST['file']);
    $filePath = '../projects/'.$fileName;
    echo $filePath;
    if(!empty($fileName) && file_exists($filePath)){
        // Define headers
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        header('Content-Length: '.filesize($fileName));

        // Read the file
        readfile($filePath);
        exit;
    }
}
?>
