<?php
require "session.php";
include_once 'dbconfig.php';

$project_name = "";

$FORM['prj_name'] = "";

if (isset($_POST['prj_name'])) $FORM['prj_name'] = htmlspecialchars($_POST['prj_name']);

$project_name = $FORM['prj_name'];
$author = $_SESSION['login'];

$search_result = $mysqli->query("SELECT * FROM `project_users` WHERE `name` = '$project_name'");

$itog = mysqli_fetch_assoc($search_result);

$num = find_word($itog['author'],$author);

if ($num) {

    $mysqli->query("DELETE FROM `project_users` WHERE `project_users`.`name` = '$project_name'");

    $project_name = "../projects/".$project_name;

    delete_files($project_name);

    echo "Проект ".$FORM['prj_name']." успешно удалён";

} else {
  //  echo $itog['author'];
    echo "Вы можете удалять только свои проекты";
}

function delete_files($target)
{
    if(!is_link($target) && is_dir($target))
    {
        // it a directory; recursively delete everything in it
        $files = array_diff( scandir($target), array('.', '..') );
        foreach($files as $file) {
            delete_files("$target/$file");
        }
        rmdir($target);
    }
    else
    {
        // probably a normal file or a symlink; either way, just unlink() it
        unlink($target);
    }
}
$mysqli->close();

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
