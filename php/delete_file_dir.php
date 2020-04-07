<?php
require "session.php";
include_once 'dbconfig.php';

$FORM['file'] = "";
$FORM['prj_name'] = "";
$project_name = "";
$path_to_f = "";
$str = "";

if (isset($_POST['file'])) $FORM['file'] = htmlspecialchars($_POST['file']);
if (isset($_POST['prj_name'])) $FORM['prj_name'] = htmlspecialchars($_POST['prj_name']);

$path_to_f = $FORM['file'];
$project_name = $FORM['prj_name'];

$search_result = $mysqli->query("SELECT * FROM `project_users` WHERE `name` = '$project_name'");

$itog = mysqli_fetch_assoc($search_result);

$num = find_word($itog['author'],$_SESSION['login']);

if ($num) {

    $path_to_f = '../'.delete_quotation($path_to_f);

    $path_to_f = str_replace('/', '\\', $path_to_f);

    if (is_dir($path_to_f)){
        delete_files($path_to_f); //рекурсивное удаление папки с содержимым

    } else {
        unlink($path_to_f); //удаление файла
    }

    $path_to_f = str_replace('\\', '/', $path_to_f);
    $path_to_f = str_replace('../','',$path_to_f);

    if (count_slesh($path_to_f) > 1) {

        $path_to_f = substr($path_to_f,0,strripos($path_to_f,'/'));
    } else {
        $path_to_f = substr($path_to_f,0,9+strlen($project_name));
    }

    echo $path_to_f;

} else {
    echo "invalid_user";
}

function delete_quotation ($string) {
    $str = "";

    for ($i = 1,$j = 0; $i < strlen($string) - 1;$i++,$j++) {
        $str[$j] = $string[$i];
    }

    return $str;
}

function delete_files($target) {

    if(!is_link($target) && is_dir($target))
    {
        // it a directory; recursively delete everything in it
        $files = array_diff( scandir($target), array('.', '..') );
        foreach($files as $file) {
            delete_files("$target/$file");
        }
        rmdir($target);
    }
    else
    {
        // probably a normal file or a symlink; either way, just unlink() it
        unlink($target);
    }
}

function count_slesh ($str) {
    $count = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] == '/')
            $count++;
    }

    return $count;
}

function find_word($author_str,$author) {

    if ($author == 'Administrator')
        return 1;

    $stroka = "";

    $stroka = explode(',',$author_str);

    for ($i = 0; $i < count($stroka);$i++) {
        if ($stroka[$i] == $author)
            return 1;
    }

    return 0;
}
?>
