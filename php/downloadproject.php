<?php

$filename = "";
$project_name = "";
$filename = "";
$FORM['filename'] = "";
$FORM['project_name'] = "";

if (isset($_POST['filename'])) $FORM['filename'] = htmlspecialchars($_POST['filename']);
if (isset($_POST['project_name'])) $FORM['project_name'] = htmlspecialchars($_POST['project_name']);

$filename_path = '../'.$FORM['filename'].'.zip';
$filename = '../'.$FORM['filename'];
$project_name = $FORM['project_name'];

Zip($filename,$filename_path);

function Zip($source, $destination) {

    if (!extension_loaded('zip') || !file_exists($source)) {
        return false;
    }

    $zip = new ZipArchive();
    if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
        return false;
    }

    $source = str_replace('\\', '/', realpath($source));

    if (is_dir($source) === true)
    {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

        foreach ($files as $file)
        {
            $file = str_replace('\\', '/', $file);

            // Ignore "." and ".." folders
            if( in_array(substr($file, strrpos($file, '/')+1), array('.', '..')) )
                continue;

            if (is_dir($file) === true)
            {
                $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
            }
            else if (is_file($file) === true)
            {
                $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
            }
        }
    }
    else if (is_file($source) === true)
    {
        $zip->addFromString(basename($source), file_get_contents($source));
    }

    return $zip->close();
}


?>
