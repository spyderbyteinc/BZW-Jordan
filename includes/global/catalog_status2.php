<?php
    
    // check if published catalogs are open
    $cat_sql = "SELECT * FROM `catalogs` WHERE `published` = 1";
    $cat_result = mysqli_query($conn, $cat_sql);
    while($cat_row = mysqli_fetch_assoc($cat_result)){
        $id = $cat_row['id'];
        $catalog_name = $cat_row['catalog_name'];
        $timezone = $cat_row['timezone'];

        $status_sql = "SELECT * FROM `catalog_status` WHERE `cat_id`=$id";
        $status_result = mysqli_query($conn, $status_sql);
        $status_row = mysqli_fetch_assoc($status_result);
        $current_status = $status_row['status'];

        $date = new DateTime("now", new DateTimeZone($timezone) );
        $now = $date->format('Y-m-d H:i:s');
        $timestamp = strtotime($now);

        $datetime = datetime($id);
        $now = $timestamp;

        $difference = $now - $datetime;
        


        if($current_status != "published"){
            continue;
        }
        if($current_status == "open"){
            continue;
        }

        if($difference >= 0){

            $tester = "BOOGIE_BOOGIE" . $difference;
            $update_sql = "UPDATE `catalog_status` SET `status` = 'open', `time` = DATE_ADD(hour,-5,GETUTCDATE()) WHERE `cat_id` = $id";

            $update_result = mysqli_query($conn, $update_sql);
        }
    }

    // 85, 94, 95, 96, 97
?>