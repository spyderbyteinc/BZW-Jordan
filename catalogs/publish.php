<?php
    include "../includes/username.php";
    include "../includes/connect.php";
    include "../helpers/datetime.php";

    $catalog_id = $_POST['id'];

    // check for missing location
    $sql = "SELECT * FROM `catalogs` WHERE `id`=$catalog_id AND `owner`='$username'";
    $result = mysqli_query($conn, $sql);
    $loc_row = mysqli_fetch_assoc($result);

    $locs = array();

    $location1 = $loc_row['asset_location_1'];
    $location2 = $loc_row['asset_location_2'];
    $location3 = $loc_row['asset_location_3'];
    $location4 = $loc_row['asset_location_4'];
    $location5 = $loc_row['asset_location_5'];

    $start_date = $loc_row['start_date'];

    $location1_array = explode("??||&&", $location1);
    $location2_array = explode("??||&&", $location2);
    $location3_array = explode("??||&&", $location3);
    $location4_array = explode("??||&&", $location4);
    $location5_array = explode("??||&&", $location5);

    if($location1 != "-1"){
        array_push($locs, $location1_array[0]);
    }
    if($location2 != "-1"){
        array_push($locs, $location2_array[0]);
    }
    if($location3 != "-1"){
        array_push($locs, $location3_array[0]);
    }
    if($location4 != "-1"){
        array_push($locs, $location4_array[0]);
    }
    if($location5 != "-1"){
        array_push($locs, $location5_array[0]);
    }

    $lot_discrepancy = true;
    // check for all locations
    $lot_loc_sql = "SELECT * FROM `lots` WHERE catalog_id=$catalog_id AND `status`<>'cancel'";
    $lot_loc_result = mysqli_query($conn, $lot_loc_sql);
    while($row = mysqli_fetch_assoc($lot_loc_result)){
        $location = $row['lot_location'];

        if(in_array($location, $locs)){
            // good to go

        }
        else{
            $lot_discrepancy = false;
        }
    }

    // determine if start date is before (invalid) or after (valid) today's date
    $day = explode("/", $start_date);
    $month = $day[1];
    $date = $day[2];
    $year = $day[0];

    $str = $date  . " " . $month_name . " " . $year;
    $start_time = strtotime($str);

    $current_time = strtotime("now");
    $start_time = datetime2($catalog_id);

    if($current_time > $start_time){
        // echo "Catalog cannot be published after given start date";

        echo 3;
        exit();
    }
    
    // Get number of lots (must be one or more)
    $num_lot_sql = "SELECT * FROM `lots` WHERE catalog_id=$catalog_id";
    $res = mysqli_query($conn, $num_lot_sql);
    $num_lots = mysqli_num_rows($res);

    if($num_lots == 0){
        // echo "Catalog Must Have at Least One Lot";
        echo 2;
        exit();
    }


    if($lot_discrepancy){
        $psql = "UPDATE `catalogs` SET `published` = '1' WHERE `catalogs`.`id` = $catalog_id AND `owner`='$username';";
        mysqli_query($conn, $psql);

        // echo "Catalog Successfully Published";

        $publish_sql = "UPDATE `catalog_status` SET `status` = 'published', `time` = CURRENT_TIMESTAMP WHERE `catalog_status`.`cat_id` = $catalog_id";

        mysqli_query($conn, $publish_sql);

        $current_time = time();

        // get end date and time from database
        $end_sql = "SELECT * FROM `catalogs` WHERE `id`=$catalog_id";
        $end_result = mysqli_query($conn, $end_sql);
        $end_row = mysqli_fetch_assoc($end_result);

        $end_date = $end_row['end_date'];
        $end_time = $end_row['end_time'];

        $end_increment = $end_row['end_increment'];

        $timezone = $end_row['timezone'];

        // format end date and time for mktime

        $end_date_comps = explode("-", $end_date);
        $month = $end_date_comps[1];
        $day = $end_date_comps[2];
        $year = $end_date_comps[0];

        $hour = $end_time[0] . $end_time[1];
        $min = $end_time[2] . $end_time[3];

        // $mktime_timestamp = gmmktime($hour, $min, 0, $month, $day, $year);

        // get sorted list of lots
        $lot_sql = "SELECT * FROM `lot_sort` WHERE `cat_id`=$catalog_id";
        $lot_result = mysqli_query($conn, $lot_sql);
        $lot_row = mysqli_fetch_assoc($lot_result);

        $sequence = $lot_row['sequence'];

        $sequence_items = explode("||", $sequence);

        $sequence_array = array();

        // clean up sequence array to get rid of empty elements
        foreach($sequence_items as $item){
            if($item != ""){
                array_push($sequence_array, $item);
            }
        }

        $current_increment = 0;
        
        $increment_arr = array();
        for($i = 0; $i<count($sequence_array); $i++){
            array_push($increment_arr, $current_increment);
            $current_increment = $current_increment + $end_increment;
        }

        $timestamp_array = array();

        $min = $min - $end_increment;
        for($v = 0; $v<count($increment_arr); $v++){
            $increment = $increment_arr[$v];

            $min = $min + $end_increment;

            date_default_timezone_set($timezone);
            // $mktime_timestamp = date(DATE_ATOM, gmmktime($hour, $min, 0, $month, $day, $year));
            $mktime_timestamp = mktime($hour, $min, 0, $month, $day, $year);
            array_push($timestamp_array, $mktime_timestamp);
        }

        // clear out tables with these lot ids
        $del_sql = "DELETE FROM `lot_countdown` WHERE `lot_countdown`.`cat_id` = $catalog_id AND `username`='$username'";
        mysqli_query($conn, $del_sql);

        // put lot countdowns into database
        $output_array = array();
        for($a = 0; $a<count($sequence_array); $a++){
            $lot_id = $sequence_array[$a];
            $time_val = $timestamp_array[$a];

            $countdown_sql = "INSERT INTO `lot_countdown` (`id`, `cat_id`, `lot_id`, `create_time`, `username`, `end_time`) VALUES (NULL, '$catalog_id', '$lot_id', '$current_time', '$username', '$time_val')";
            mysqli_query($conn, $countdown_sql);
        } 

        echo json_encode($timestamp_array);
        exit();
    }
    else{
        // echo 'Cannot Publish Catalog - Missing Location';

        echo 0;
        exit();
    }
?>