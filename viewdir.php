<?php


$path_to_folder = $_POST['name'];

scan_print_view($path_to_folder);

//print contents of the directory
function print_cont_dir ($path_folder, $massiv_fd) {

    for($i = 2;$i < count($massiv_fd);$i++){
        $str = $path_folder.'/'.$massiv_fd[$i];

        $str = "'".$str."'";

        $str = str_replace('/', '\\', $str);

        if (is_dir(delete_quotation($str))){
            $str = str_replace('\\', '/', $str);
            echo '<div class="viewdir_elem_block">';  //btn tracker(file or dir)
            echo '<input type="checkbox" id="checkbox-style" value="'.$str.'"/>';
            echo '<span class="span-class" onclick="folder_list('.$str.');"><i class="far fa-folder"></i> '.$massiv_fd[$i].'</span><br/>';
            echo '<hr>';
            echo '</div>';

        } else {
            $str = str_replace('\\', '/', $str);
            echo '<div class="viewdir_elem_block">';  //btn tracker(file or dir)
            echo '<input type="checkbox"id="checkbox-style" value="'.$str.'"/>';
            echo '<span class="span-class" onclick="openfile('.$str.');"><i class="far fa-file-alt"></i> '.$massiv_fd[$i].'</span><br/>';
            echo '<hr>';
            echo '</div>';
        }
    }
}


function scan_print_view ($selected_file_dir) {

    $selected_file_dir = str_replace('/', '\\', $selected_file_dir);

    if(is_dir($selected_file_dir)){
      //print content of directory
        $file_dir_mass = "";
        $file_dir_mass = scandir($selected_file_dir);

        $selected_file_dir = str_replace('\\', '/', $selected_file_dir);

        print_cont_dir($selected_file_dir,$file_dir_mass);
    } else {
      //print contens of file
      //echo "OpenFileInModalBox";
      //echo "1234";
    }


}

function delete_quotation ($string) {
    $str = "";

    for ($i = 1,$j = 0; $i < strlen($string) - 1;$i++,$j++) {
        $str[$j] = $string[$i];
    }

    return $str;
}

?>
