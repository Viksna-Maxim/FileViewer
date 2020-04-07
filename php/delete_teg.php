<?php
require "session.php";
include_once 'dbconfig.php';

$teg = "";
$teg_massiv = "";
$project_name = "";
$author = $_SESSION['login'];
$clear = "";

$FORM['teg'] = "";
$FORM['prj_name'] = "";

if (isset($_POST['teg'])) $FORM['teg'] = htmlspecialchars($_POST['teg']);
if (isset($_POST['prj_name'])) $FORM['prj_name'] = htmlspecialchars($_POST['prj_name']);

$teg = $FORM['teg'];
$project_name = $FORM['prj_name'];

if (($author !="guest") || ($author != "guest1")) {

    $search_result = $mysqli->query("SELECT * FROM `project_users` WHERE `name` = '$project_name'");

    $itog = mysqli_fetch_assoc($search_result);

    $num = find_word($itog['author'],$author);

    if ($num) {
        $teg_massiv = $itog['type'];

        if(strpos($teg_massiv,',') === FALSE) {

            $teg_massiv = str_replace($teg,'',$teg_massiv);
        } else {
            $index = strpos($teg_massiv, $teg);
            if ($index === 0)
                $teg_massiv = str_replace($teg.',','',$teg_massiv);
            else
                $teg_massiv = str_replace(','.$teg,'',$teg_massiv);
        }

        $mysqli->query("UPDATE `project_users` SET `type` = '$teg_massiv' WHERE `project_users`.`name` = '$project_name';");

        echo $teg_massiv;

    } else {
        echo "invalid_author";
    }
} else {
    echo "Не аворизированным пользователям изменять теги нельзя";
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
