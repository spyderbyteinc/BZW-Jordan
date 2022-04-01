<?php

include "connect.php"; 

$all_catalog_sql = "SELECT * FROM `catalog_status`";
$all_catalog_result = mysqli_query($conn, $all_catalog_sql);
while($all_catalog_row = mysqli_fetch_assoc($all_catalog_result)){
    $my_catalog_id = $all_catalog_row['cat_id'];

    // get timezone
    $timezone_sql = "SELECT * FROM `catalogs` WHERE `id`=$my_catalog_id";
    $timezone_result = mysqli_query($conn, $timezone_sql);
    $timezone_row = mysqli_fetch_assoc($timezone_result);

    $my_catalog_name = $timezone_row['catalog_name'];
    
    $timezone = $timezone_row['timezone'];

    // get current timezone
    date_default_timezone_set($timezone);
    
    $date = new DateTime("now", new DateTimeZone($timezone) );
    $now = $date->format('Y-m-d H:i:s');
    $now_timestamp = strtotime($now);

    $temp = array();

    $all_lots_sql = "SELECT * FROM `lots` WHERE `catalog_id`=$my_catalog_id";
    $all_lots_result = mysqli_query($conn, $all_lots_sql);
    while($all_lot_row =  mysqli_fetch_assoc($all_lots_result)){

        $lot_complete = false;

        $my_lot_id = $all_lot_row['id'];
        $lot_name = $all_lot_row['name'];

        $end_time_sql = "SELECT * FROM `lot_countdown` WHERE `cat_id`=$my_catalog_id AND `lot_id`=$my_lot_id";
        $end_time_result = mysqli_query($conn, $end_time_sql);
        $end_time_row = mysqli_fetch_assoc($end_time_result);

        $end_time = $end_time_row['end_time'];

        if($now_timestamp > $end_time){
            $lot_complete = true;
        }
        array_push($temp, $lot_complete);
    }


    if(count($temp) == 0){
        continue;
    }

    $my_check = check_if_all_complete($temp);

    if($my_check == 1 || $my_check || $my_check == "1" || $my_check == true){

        // check if catalog is cancelled
        $cancel_check_sql = "SELECT * FROM `catalog_status` WHERE `cat_id`=$my_catalog_id";
        $cancel_result = mysqli_query($conn, $cancel_check_sql);
        $cancel_row = mysqli_fetch_assoc($cancel_result);
        $cancel_status = $cancel_row['status'];
        
        if($cancel_status == "cancel" || $cancel_status == "published" || $cancel_status == "staging"){
            continue;
        }
        $close_sql = "UPDATE `catalog_status` SET `status` = 'closed' WHERE `catalog_status`.`cat_id` = $my_catalog_id;";
        mysqli_query($conn, $close_sql);

    }
}

// determines if array of lots are all complete
function check_if_all_complete($arr){
    $complete = true;

    foreach($arr as $a){
        if($a){
            // continue
        }
        else{
            $complete = false;
        }
    }

    if($complete){
        return 1;
    }
    else{
        return 0;
    }
}

?>