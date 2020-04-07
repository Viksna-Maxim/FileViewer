<?php

require "session.php";

$dbhost2 = "localhost";
$dbuser2 = "root";
$dbpass2 = "";
$dbname2 = "users";

$mysqli2 = new mysqli($dbhost2,$dbuser2,$dbpass2,$dbname2);
$mysqli2->query("SET NAMES 'utf8'");

$author = "";
$str = "";

$FORM['author'] = "";

if (isset($_POST['author'])) $FORM['author'] = htmlspecialchars($_POST['author']);

$author = $FORM['author'];

$search_result = $mysqli2->query("SELECT * FROM `users` WHERE `login` LIKE '%$author%'");

while ($itog = mysqli_fetch_assoc($search_result)) {

    $str = "'".$itog['login']."'";
    if ($_SESSION['login'] != $itog['login']) {
        echo '<div id="coauthor_block4">';
        echo     '<div id="coauthor_block1"><i id="coauthor_block5" class="material-icons" class="face-class">face</i></div>';
        echo     '<div id="coauthor_block2"><span class="author-class-name">'.$itog['login'].'</span></div>';
        echo     '<div id="coauthor_block3"><i class="fas fa-plus fa-plus-my" id="coauthor_block6" onclick="add_coauthor_db_func('.$str.');"></i></div>';
        echo '</div>';
    }
}
 ?>
