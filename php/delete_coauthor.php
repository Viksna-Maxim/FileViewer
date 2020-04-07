<?php
include_once "dbconfig.php";
require "session.php";

$project_name = "";
$author = "";
$massiv = "";

$FORM['prj_name'] = "";
$FORM['d_author'] = "";

if (isset($_POST['prj_name'])) $FORM['prj_name'] = htmlspecialchars($_POST['prj_name']);
if (isset($_POST['d_author'])) $FORM['d_author'] = htmlspecialchars($_POST['d_author']);

$project_name = $FORM['prj_name'];
$author = $FORM['d_author'];

$search_result = $mysqli->query("SELECT * FROM `project_users` WHERE `name` = '$project_name'");

$itog = mysqli_fetch_assoc($search_result);

$massiv = $itog['author'];

$num = find_word($itog['author'], $_SESSION['login']);

if ($num) {

    $massiv = delete_author_func($massiv,$author);

    $mysqli->query("UPDATE `project_users` SET `author` = '$massiv' WHERE `project_users`.`name` = '$project_name';");

} else {
    echo 'invalid_user';
}

function delete_author_func($massiv_author,$author) {

    $stroka = "";

    $stroka = explode(',',$massiv_author);

    for ($i = 0; $i < count($stroka);$i++) {

        if ($stroka[$i] == $author) {
            unset($stroka[$i]);
        }
    }

    return implode(',',$stroka);
}

function find_word($author_str,$author) {

    if ($author == 'Administrator')
        return 1;
        
    $stroka = "";

    $stroka = explode(',',$author_str);

    for ($i = 0; $i < count($stroka);$i++) {
        echo $stroka[$i];
        if ($stroka[$i] == $author)
            return 1;
    }

    return 0;
}
?>
