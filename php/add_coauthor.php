<?php
require "session.php";
include_once "dbconfig.php";

$add_author = "";
$project_name = "";
$current_author = $_SESSION['login'];
$author_massiv = "";

$FORM['author'] = "";
$FORM['prj_name'] = "";

if (isset($_POST['author'])) $FORM['author'] = htmlspecialchars($_POST['author']);
if (isset($_POST['prj_name'])) $FORM['prj_name'] = htmlspecialchars($_POST['prj_name']);

$add_author = $FORM['author'];
$project_name = $FORM['prj_name'];

$search_result = $mysqli->query("SELECT * FROM `project_users` WHERE `name` LIKE '%$project_name%'");

$itog = mysqli_fetch_assoc($search_result);

$author_massiv = $itog['author'];

$num = find_word($itog['author'], $_SESSION['login']);

if ($num) {

    if (!find_word($author_massiv,$add_author)) {

        $author_massiv = $author_massiv.','.$add_author;

        $mysqli->query("UPDATE `project_users` SET `author` = '$author_massiv' WHERE `project_users`.`name` = '$project_name';");
    } else {
        echo "user_exists";
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
