<?php
include_once 'dbconfig.php';
require "session.php";

$prj_name = "";
$logo = "";
$file_loc = "";
$folder = 'content/logo/';
$rename = "";

if (isset($_POST['project_name'])) $FORM['project_name'] = htmlspecialchars($_POST['project_name']);

$prj_name = $FORM['project_name'];

$search_result = $mysqli->query("SELECT * FROM `project_users` WHERE `name` = '$prj_name'");

$itog = mysqli_fetch_assoc($search_result);

$num = find_word($itog['author'], $_SESSION['login']);

if ($num) {

    if (isset($_FILES["logo"])) {
        $logo = $_FILES['logo']['name'];
        $file_loc = $_FILES['logo']['tmp_name'];
        $rename = rand(22,99999).'-'.$logo;
        move_uploaded_file($file_loc,'../'.$folder.$logo);
        rename('../'.$folder.$logo,'../'.$folder.$rename);

        $folder = $folder.$rename;
    } else {
        $folder = 'content/logo/defaultlogo.png';
    }

    if ($itog['logotype'] != 'content/logo/defaultlogo.png')
        unlink('../'.$itog['logotype']);

    $mysqli->query("UPDATE `project_users` SET `logotype` = '$folder' WHERE `project_users`.`name` = '$prj_name';");
} else {
    echo 'invalid_user';
}

$mysqli->close();

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
