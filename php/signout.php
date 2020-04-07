<?php
include_once "session.php";

$_SESSION['login'] = "guest";

session_unset();
session_destroy();
 ?>
