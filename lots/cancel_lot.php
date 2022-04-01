<?php
    include "../includes/connect.php";
    include "../includes/username.php";

    $cat_id = $_SESSION['lot_catalog'];

    // check if cancel parameter is passed
    if(!isset($_POST['type']) || $_POST['type'] != "cancel"){
        $loc = "location: manage.php?cat_id=" . $cat_id;
        header($loc);
        exit();
    }


    $lot_id = $_POST['id'];


    $sql = "SELECT * FROM `lots` WHERE `id`=$lot_id AND `catalog_id`=$cat_id AND `owner`='$username'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

    if($num_rows != 1){
        $loc = "location: manage.php?cat_id=" . $cat_id;
        header($loc);
        exit();
    }
    
    $sql = "UPDATE `lots` SET `status` = 'cancel' WHERE `lots`.`id` = $lot_id;";
    $result = mysqli_query($conn, $sql);

    
    $sorter_get = "SELECT * FROM `lot_sort` WHERE `cat_id`=$cat_id";
    $sorter_result = mysqli_query($conn, $sorter_get);
    $sorter_row = mysqli_fetch_assoc($sorter_result);
    $sequence = $sorter_row['sequence'];
    
    $new_sequence = str_replace("||" . $lot_id . "||", "||", $sequence);
    $update_sql = "UPDATE `lot_sort` SET `sequence` = '$new_sequence' WHERE `lot_sort`.`cat_id` = '$cat_id';";
    mysqli_query($conn, $update_sql);

    echo $update_sql;
?>