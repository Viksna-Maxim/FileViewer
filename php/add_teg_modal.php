<?php
require "session.php";
include_once 'dbconfig.php';

$project_name = "";
$add_teg = "";
$teg_massiv = "";

$FORM['prj_name'] = "";
$FORM['teg'] = "";

if (isset($_POST['prj_name'])) $FORM['prj_name'] = htmlspecialchars($_POST['prj_name']);
if (isset($_POST['teg'])) $FORM['teg'] = htmlspecialchars($_POST['teg']);

$project_name = $FORM['prj_name'];
$add_teg = $FORM['teg'];

$search_result = $mysqli->query("SELECT * FROM `project_users` WHERE `name` = '$project_name'");

$itog = mysqli_fetch_assoc($search_result);

$num = find_word($itog['author'], $_SESSION['login']);

if ($num) {
    if (check_tegs($itog['type'],$add_teg)) {

        $teg_massiv = $itog['type'];

        if (strlen($teg_massiv) > 0) {

            $teg_massiv = $teg_massiv.','.$add_teg; //добавление тега
            $mysqli->query("UPDATE `project_users` SET `type` = '$teg_massiv' WHERE `project_users`.`name` = '$project_name';");
        } else {

            $teg_massiv = $add_teg; //добавление тега
            $mysqli->query("UPDATE `project_users` SET `type` = '$teg_massiv' WHERE `project_users`.`name` = '$project_name';");
        }
    }

    $search_result = $mysqli->query("SELECT * FROM `project_users` WHERE `name` = '$project_name'");
    $itog = mysqli_fetch_assoc($search_result);

    echo $itog['type'];
} else {
    echo "invalid_author";
}


function check_tegs ($sql_massiv,$massiv) {

    if(strpos($sql_massiv,$massiv) === FALSE) {
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
