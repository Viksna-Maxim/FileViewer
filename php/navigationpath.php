<?php
$nav_path = "";
$FORM['path'] = "";

if (isset($_POST['path'])) $FORM['path'] = htmlspecialchars($_POST['path']);

$nav_path = $FORM['path'];

$str_rev = '';
$str = '';
$i = 0;
$j = 0;
$length = 0;

$length = strlen($nav_path);
$i = $length - 1;

while ($nav_path[$i] != '/') {

    if ($i < 0)
        break;

    $str_rev[$j] = $nav_path[$i];

    $j++;
    $i--;
}

for ($k = 0,$m = strlen($str_rev) - 1;$k <= strlen($str_rev) - 1;$k++,$m--) {

    $str[$k] = $str_rev[$m];
}

$nav_path = "'".$nav_path."'";

echo '<a class="nav-path-class-style" onclick="folder_list('.$nav_path.');">'.$str.'</a>';
?>
