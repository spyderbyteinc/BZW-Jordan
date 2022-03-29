<?php
    include "connect.php";
    
    $catalog_id = $_POST['catalog_id'];

    // get timezone
    $timezone_sql = "SELECT * FROM `catalogs` WHERE `id`=$catalog_id";
    $timezone_result = mysqli_query($conn, $timezone_sql);
    $timezone_row = mysqli_fetch_array($timezone_result);
    $timezone = $timezone_row['timezone'];

    $sql = "SELECT * FROM `lot_countdown` WHERE `cat_id`=$catalog_id";
    $result = mysqli_query($conn, $sql);
    
    $master = array();
    while($row = mysqli_fetch_assoc($result)){
        $temp = array();

        $lot_id = $row['lot_id'];
        $end_time = $row['end_time'];


        $date = new DateTime("now", new DateTimeZone($timezone) );
        $now = $date->format('Y-m-d H:i:s');
        $timestamp = strtotime($now);

        $lot_countdown = $end_time * 1000;
        $today = $timestamp * 1000;

        $remaining_time = $lot_countdown - $today;
        
        array_push($temp, $lot_id, $remaining_time); 
        array_push($master, $temp);
    }

    echo json_encode($master);
    exit();
?>