<?php
require "session.php";
include_once 'dbconfig.php';

$FORM['elogin'] = "";
$FORM['epsw'] = "";

//$elogin = $_POST["elogin"];
//$epassword = $_POST["epsw"];

if (isset($_POST['elogin'])) $FORM['elogin'] = htmlspecialchars($_POST['elogin']);
if (isset($_POST['epsw'])) $FORM['epsw'] = htmlspecialchars($_POST['epsw']);

$enter_login = $FORM['elogin'];
$enter_psw = $FORM['epsw'];

$result_enter = $mysqli->query("SELECT * FROM `datafiles`.`users` WHERE `login` = '$enter_login' AND `password` ='$enter_psw' ");

$result_enter_assoc = mysqli_fetch_assoc($result_enter);

$_SESSION['login'] = $result_enter_assoc['login'];

if ($result_enter_assoc)
    echo $result_enter_assoc['login'];
else {
    echo 'invalid_user';
}


$mysqli->close();

?>
