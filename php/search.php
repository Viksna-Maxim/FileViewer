<?php
include_once "dbconfig.php";
require "session.php";

$FORM['search_q'] = "";
$FORM['mode'] = "";
$FORM['tegs'] = "";
$FORM['date_before'] = "";
$FORM['date_after'] = "";

if (isset($_POST['search_q'])) $FORM['search_q'] = htmlspecialchars($_POST['search_q']);
if (isset($_POST['mode'])) $FORM['mode'] = htmlspecialchars($_POST['mode']);
if (isset($_POST['tegs'])) $FORM['tegs'] = htmlspecialchars($_POST['tegs']);
if (isset($_POST['date_before'])) $FORM['date_before'] = htmlspecialchars($_POST['date_before']);
if (isset($_POST['date_after'])) $FORM['date_after'] = htmlspecialchars($_POST['date_after']);

$search_q = $FORM['search_q'];
$mode = $FORM['mode'];
$tegs = $FORM['tegs'];
$date_before = $FORM['date_before'];
$date_after = $FORM['date_after'];
$strt = "";
$search_result = 1;

$search_q = trim($search_q);
$search_q = strip_tags($search_q);

if ($mode != 'filter_is_on') {

    $search_result = $mysqli->query("SELECT * FROM `project_users` WHERE `name` LIKE '%$search_q%' OR `author` LIKE '%$search_q%' OR `type` LIKE '%$search_q%'");
    while ($itog = mysqli_fetch_assoc($search_result)) {
          print_html ($itog);
    }

} else if ($mode == 'filter_is_on') {

    if ((strlen($date_before) > 0) && (strlen($date_after) == 1) && (strlen($tegs) == 0)) {

        if (strlen($search_q) > 1)
            $search_result = $mysqli->query("SELECT * FROM `project_users` WHERE `name` LIKE '%$search_q%' OR `author` LIKE '%$search_q%' AND `creationdate` > '$date_before'");
        else
            $search_result = $mysqli->query("SELECT * FROM `project_users` WHERE `creationdate` > '$date_before'");

        while ($itog = mysqli_fetch_assoc($search_result)) {
              print_html ($itog);
        }
    }

    if ((strlen($date_before) > 0) && (strlen($date_after) > 0) && (strlen($tegs) == 0)) {

      if (strlen($search_q) > 1)
          $search_result = $mysqli->query("SELECT * FROM `project_users` WHERE `name` LIKE '%$search_q%' OR `author` LIKE '%$search_q%' AND `creationdate` > '$date_before' AND `creationdate` < '$date_after'");
      else
          $search_result = $mysqli->query("SELECT * FROM `project_users` WHERE `creationdate` > '$date_before' AND `creationdate` < '$date_after'");

        while ($itog = mysqli_fetch_assoc($search_result)) {
              print_html ($itog);
        }
    }

    if ((strlen($date_before) == 1) && (strlen($date_after) == 1) && (strlen($tegs) > 0)){
        $tegs = explode(",",$tegs);
        if (strlen($search_q) > 1)
            $search_result = $mysqli->query("SELECT * FROM `project_users` WHERE `name` LIKE '%$search_q%' OR `author` LIKE '%$search_q%'");
        else
            $search_result = $mysqli->query("SELECT * FROM `project_users`");

        while ($itog = mysqli_fetch_assoc($search_result)) {
            if (check_tegs($itog['type'],$tegs))
                print_html($itog);
        }
    }

    if ((strlen($date_before) > 1) && (strlen($tegs) > 0) && (strlen($date_after) == 1)) {
        $tegs = explode(",",$tegs);

        if (strlen($search_q) > 1)
            $search_result = $mysqli->query("SELECT * FROM `project_users` WHERE `name` LIKE '%$search_q%' OR `author` LIKE '%$search_q%' AND `creationdate` > '$date_before'");
        else
            $search_result = $mysqli->query("SELECT * FROM `project_users` WHERE `creationdate` > '$date_before'");

        while ($itog = mysqli_fetch_assoc($search_result)) {
            if (check_tegs($itog['type'],$tegs))
                print_html($itog);
        }
    }

    if ((strlen($date_before) > 1) && (strlen($tegs) > 0) && (strlen($date_after) > 1)) {
        $tegs = explode(",",$tegs);

        if (strlen($search_q) > 1)
            $search_result = $mysqli->query("SELECT * FROM `project_users` WHERE `name` LIKE '%$search_q%' OR `author` LIKE '%$search_q%' AND `creationdate` > '$date_before' AND `creationdate` < '$date_after'");
        else
            $search_result = $mysqli->query("SELECT * FROM `project_users` WHERE `creationdate` > '$date_before'");

        while ($itog = mysqli_fetch_assoc($search_result)) {
            if (check_tegs($itog['type'],$tegs))
                print_html($itog);
        }
    }
}

$mysqli->close();

function print_html ($itog) {
    $str = "";
    echo '<div class="result-block">';
    echo     '<img class="img-search-style" src="'.$itog['logotype'].'"/>';
    echo     '<h4 class="block-name">'.$itog['name'].'</h4>';

    $folder_name = str_replace('\\', '/', $itog['folder']);

    if (strpos($itog['author'],',') !== FALSE)
        $str = substr($itog['author'],0,strpos($itog['author'],','));
    else
        $str = substr($itog['author'],0,strlen($itog['author']));


    $folder_name = "'".$folder_name."'";
    $project_name = "'".$itog['name']."'";
    $logo_url_img = "'".$itog['logotype']."'";
    $author_str = "'".$str."'";
    $cdate = "'".$itog['creationdate']."'";
    $tegstr = "'".$itog['type']."'";

    echo     '<h4 class="block-author">'.$itog['author'].'</h4>';
    echo     '<button type="button" class="btn btn-primary btn-search-2" data-toggle="modal" data-target="#exampleModalLong" onclick="folder_list('.$folder_name.'); display_project_name('.$project_name.'); add_logo_modal('.$logo_url_img.'); add_author_modal('.$author_str.'); add_creation_date_fnc('.$cdate.'); add_tag_in_modal('.$tegstr.');">Show</button>';
    echo  '</div>';
}

function check_tegs ($sql_massiv,$massiv) {

    for ($i = 0; $i < count($massiv); $i++) {

        if(strpos($sql_massiv,$massiv[$i]) === FALSE) {
            return 0;
        }
    }

    return 1;
}
?>
