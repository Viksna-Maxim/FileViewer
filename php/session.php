<?php
session_start();

if (!isset($_SESSION['login'])) {
  $_SESSION['login'] = "guest";
}

if (!isset($_SESSION['project_name'])) {
  $_SESSION['project_name'] = "";
}

if (!isset($_SESSION['current_path'])) {
  $_SESSION['current_path'] = "";
}

if (!isset($_SESSION['current_file'])) {
  $_SESSION['current_file'] = "";
}
?>
