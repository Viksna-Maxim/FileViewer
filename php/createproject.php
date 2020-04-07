<?php
include_once 'dbconfig.php';

$FORM['author'] = "";
$FORM['type'] = "";
$FORM['name'] = "";

$file_loc = "";
$logo = "";
$folder = 'content/logo/';
$author = "";
$types = "";
$project_name = "";
$path_project_str = 'projects/';

if (isset($_POST['author'])) $FORM['author'] = htmlspecialchars($_POST['author']);
if (isset($_POST['type'])) $FORM['type'] = htmlspecialchars($_POST['type']);
if (isset($_POST['name'])) $FORM['name'] = htmlspecialchars($_POST['name']);

$author = $FORM['author'];
$types = $FORM['type'];
$project_name = $FORM['name'];

$search_result = $mysqli->query("SELECT * FROM `project_users` WHERE `name` = '$project_name'");
$itog = mysqli_fetch_assoc($search_result);

if (strlen($itog['name']) == 0) {

    if (isset($_FILES["logo"])) {
        $logo = rand(5,99999).'-'.$_FILES['logo']['name'];
        $file_loc = $_FILES['logo']['tmp_name'];

        move_uploaded_file($file_loc,"../".$folder.$logo);

        $folder = $folder.$logo;
    } else {
        $folder = 'content/logo/defaultlogo.png';
    }

    //Настройка тут(где будут созаваться проекты);

    $path_project_str = $path_project_str.$project_name;

    $path_project_str = str_replace('/', '\\', $path_project_str);

    mkdir('..\\'.$path_project_str,0777,true);

    $path_project_str = str_replace('\\', '/', $path_project_str);

    $mysqli->query("INSERT INTO `project_users` (`name`, `author`, `type`, `subtype`, `logotype`, `folder`) VALUES ('$project_name', '$author', '$types', '', '$folder', '$path_project_str')");
} else {
    echo "invalid_name_project";
}

$mysqli->close();
?>
