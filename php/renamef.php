<?php
require "session.php";
include_once "dbconfig.php";

$file_name_new = "";
$file_name_new_only = "";
$file_name_old = "";
$expansion = "";
$project_name = "";
$path = "";
$FORM['file_name_new'] = "";
$FORM['file_name_old'] = "";
$FORM['project_name'] = "";
$search_result = 0;

if (isset($_POST['file_name_new'])) $FORM['file_name_new'] = htmlspecialchars($_POST['file_name_new']);
if (isset($_POST['file_name_old'])) $FORM['file_name_old'] = htmlspecialchars($_POST['file_name_old']);
if (isset($_POST['project_name'])) $FORM['project_name'] = htmlspecialchars($_POST['project_name']);

$project_name = $FORM['project_name'];

$search_result = $mysqli->query("SELECT * FROM `project_users` WHERE `name` = '$project_name'");

$itog = mysqli_fetch_assoc($search_result);

$num = find_word($itog['author'],$_SESSION['login']);

if ($num) {

    $file_name_new = $FORM['file_name_new'];
    $file_name_new_only = $FORM['file_name_new'];
    $file_name_old = '../'.delete_quotation($FORM['file_name_old']);

    if (!is_dir($file_name_old))
        if (strpos($file_name_new,'.') === FALSE)
             $expansion = substr($file_name_old,strrpos($file_name_old,'.'),strlen($file_name_old)-strrpos($file_name_old,'.'));

    $file_name_new = substr($file_name_old,0,strrpos($file_name_old,'/')+1).$file_name_new.$expansion;

    $path = substr($file_name_old,0,strrpos($file_name_old,'/')+1);

    if (!search_file_in_directory($path,$file_name_new_only))
        rename($file_name_old,$file_name_new);
    else {
        echo "invalid_file_name";
    }

} else {
    echo "invalid_user";
}

function delete_quotation($string) {
    $str = "";

    for ($i = 1,$j = 0; $i < strlen($string) - 1;$i++,$j++) {
        $str[$j] = $string[$i];
    }

    return $str;
}

function search_file_in_directory($path,$file) {

    $massiv = scandir($path);

    for ($i = 0; $i < count($massiv); $i++) {

        if ($path.$massiv[$i] == $path.$file)
            return 1;
    }

    return 0;
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
