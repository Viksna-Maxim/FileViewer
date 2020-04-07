<?php
require "session.php";
include_once "dbconfig.php";

$file = "";
$file_loc = "";

$cfolder = $_POST['folder'];
$str = "";
$k = 0;
$folder="../".$_POST['folder']."/";

for ($i = 0; $i < strlen($cfolder); $i++) {
    if ($cfolder[$i] == '/')
        $k++;
    if ($k == 2)
        break;

    $str[$i] = $cfolder[$i];
}

$search_result = $mysqli->query("SELECT * FROM `project_users` WHERE `folder` = '$str'");

$itog = mysqli_fetch_assoc($search_result);

$num = find_word($itog['author'],$_SESSION['login']);

if ($num) {

    if(isset($_FILES["file"])) {

        $file = $_FILES['file']['name'];
        $file_loc = $_FILES['file']['tmp_name'];

        $folder = str_replace('/', '\\',$folder);

        move_uploaded_file($file_loc,$folder.$file);
    }
} else {
    echo "invalid_user";
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
