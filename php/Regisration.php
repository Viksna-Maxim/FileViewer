<?php

include_once "dbconfig.php";

$login = $_POST['login'];
$password = $_POST['psw'];

$mysqli->query("INSERT INTO `users` (`login`, `password`, `id`) VALUES ('$login', '$password', NULL)");
$mysqli->close();
?>
