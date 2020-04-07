<?php
$path = '../'.$_POST['path'];

$path = str_replace('/', '\\', $path);

switch(pathinfo($path, PATHINFO_EXTENSION)) {
    case 'cpp';
    case 'html';
    case 'js';
    case 'php';
    case 'c';
    case 'h';
    case 'txt': {
        $str = file_get_contents($path);
        break;
    }
    default: {
        $str = pathinfo($path, PATHINFO_EXTENSION).' - данное расширение файла не поддерживается на сайте';
    }

}

//$str = file_get_contents($path);

echo $str;
?>
