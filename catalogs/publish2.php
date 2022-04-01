<?php
    include "../includes/username.php";
    include "../includes/connect.php";

    $catalog_id = $_GET['cat_id'];

    if($username == "" || !isset($username)){
        header("location: ../index.php");
        exit();
    }

    // check for catalog ownership
    $own_sql = "SELECT * FROM `catalogs` WHERE id=$catalog_id AND owner='$username'";
    $own_result = mysqli_query($conn, $own_sql);
    $own_num = mysqli_num_rows($own_result);
    
    if($own_num != 1){
        header("location: ../index.php");
        exit();
    }


    // Get all location ids
    $locs = array();
    $location_result = mysqli_query($conn, $own_sql);
    while($loc_row = mysqli_fetch_assoc($location_result)){
        $location1 = $loc_row['asset_location_1'];
        $location2 = $loc_row['asset_location_2'];
        $location3 = $loc_row['asset_location_3'];
        $location4 = $loc_row['asset_location_4'];
        $location5 = $loc_row['asset_location_5'];

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

    }
    
    $lot_discrepancy = true;
    // check for all locations
    $lot_loc_sql = "SELECT * FROM `lots` WHERE catalog_id=$catalog_id";
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

    if($lot_discrepancy){
        echo 'good to go';
    }
    else{
        echo 'lot location bad';
    }
    
?>