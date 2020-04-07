<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "datafiles";
$mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
$mysqli->query("SET NAMES 'utf8'");

//$mysqli->close();
?>
