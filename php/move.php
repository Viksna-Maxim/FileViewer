<?php
require "session.php";
include_once "dbconfig.php";

$file = "";
$project_name = "";
$path_to_move = "";
$str = "";
$length = 0;

$FORM['file_name'] = "";
$FORM['prj_name'] = "";
$FORM['path_to_move'] = "";

if (isset($_POST['file_name'])) $FORM['file_name'] = htmlspecialchars($_POST['file_name']);
if (isset($_POST['prj_name'])) $FORM['prj_name'] = htmlspecialchars($_POST['prj_name']);
if (isset($_POST['path_to_move'])) $FORM['path_to_move'] = htmlspecialchars($_POST['path_to_move']);

$file = $FORM['file_name'];
$project_name = $FORM['prj_name'];
$path_to_move = '../projects/'.$FORM['path_to_move'];

$file = '../'.str_replace("'","",$file);

$file = str_replace('/', '\\', $file);
$path_to_move = str_replace('/', '\\', $path_to_move);

    $search_result = $mysqli->query("SELECT * FROM `project_users` WHERE `name` = '$project_name'");
    $itog = mysqli_fetch_assoc($search_result);

    $num = find_word($itog['author'],$_SESSION['login']);

    if ($num) {

        if (is_dir($path_to_move)) {

            $str = substr($file,strrpos($file,'\\'),strlen($file) - strrpos($file,'\\'));
            $path_to_move = $path_to_move.$str;
            $path_to_move = str_replace('/', '\\', $path_to_move);

            rename($file, $path_to_move);
        } else {
            echo "invalid_path";
        }

    } else {
        echo "invalid_user";
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
