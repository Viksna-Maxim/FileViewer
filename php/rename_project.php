<?php
require "session.php";
include_once "dbconfig.php";

$rename = "";
$project_name = "";
$new_path = "";

$FORM['rename'] = "";
$FORM['project_name'] = "";

if (isset($_POST['rename'])) $FORM['rename'] = htmlspecialchars($_POST['rename']);
if (isset($_POST['project_name'])) $FORM['project_name'] = htmlspecialchars($_POST['project_name']);

$rename = $FORM['rename'];
$project_name = $FORM['project_name'];

$search_result = $mysqli->query("SELECT * FROM `project_users` WHERE `name` LIKE '%$project_name%'");

$itog = mysqli_fetch_assoc($search_result);

$num = find_word($itog['author'], $_SESSION['login']);

if ($num) {

    if (strlen($itog['name'])) {
        rename('../projects/'.$itog['name'],'../projects/'.$rename);

        $new_path = 'projects/'.$rename;

        $mysqli->query("UPDATE `project_users` SET `folder` = '$new_path' WHERE `project_users`.`name` = '$project_name';");
        $mysqli->query("UPDATE `project_users` SET `name` = '$rename' WHERE `project_users`.`name` = '$project_name';");

    } else {
        echo 'invalid_project';
    }
} else {
    echo 'invalid_user';
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
