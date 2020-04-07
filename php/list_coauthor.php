<?php
include_once "dbconfig.php";

$project_name = "";

$FORM['prj_name'] = "";

$coauthor = "";

if (isset($_POST['prj_name'])) $FORM['prj_name'] = htmlspecialchars($_POST['prj_name']);

$project_name = $FORM['prj_name'];

$search_result = $mysqli->query("SELECT * FROM `project_users` WHERE `name` = '$project_name'");

$itog = mysqli_fetch_assoc($search_result);


if (strpos($itog['author'],',') !== FALSE) {
    $coauthor = substr($itog['author'], strpos($itog['author'],',') + 1); // начинает копировать после запятой

    $massiv = "";
    $j = 0;
    $str = "";

    for ($i = 0; $i < strlen($coauthor); $i++) {
        if ($coauthor[$i] != ',') {
            $massiv[$j] = $coauthor[$i];
            $j++;
        }
        if (($coauthor[$i] == ',') || ($i == (strlen($coauthor) - 1))) {

            $str = "'".$massiv."'";
            echo '<div id="coauthor_bock_1">'.$massiv.'<i class="fas fa-minus" id="minus" onclick="delete_coauthor('.$str.');"></i></div>';
            $massiv = "";
            $j = 0;
        }
    }
}

?>
