<?php
    include "../includes/username.php";
            
    include "../helpers/date_conversion.php";

    include "../includes/connect.php";
    
    if(!isset($_SESSION['lot_catalog'])){
        $loc = "location: " . $root . "catalogs/manage.php";
        header($loc);
        exit();
    }
    
    $catalog_id = $_SESSION['lot_catalog'];

    $loc = "location: " . $root;
    if($username == "" || !isset($username)){
        header($loc);
        exit();
    }

    $loc = "location: " . $root . "lots/manage.php?cat_id=" . $catalog_id;
    if(!isset($_POST['lot_update_check'])){
        header($loc);
        exit();
    }

    $lot_id = mysqli_real_escape_string($conn, $_POST['lot_update_check']);

    // // look up owner ship
    $own_sql = "SELECT * FROM `lots` WHERE id=$lot_id AND owner='$username'";
    $own_result = mysqli_query($conn, $own_sql);
    $num = mysqli_num_rows($own_result);

    if($num != 1){
        $loc = "location: " . $root . "catalogs/manage.php";
        exit();
    }



    $lot_name =  mysqli_real_escape_string($conn, $_POST['lot_name']);
    $lot_description =  mysqli_real_escape_string($conn, $_POST['lot_description_helper']);
    
    $starting_bid = mysqli_real_escape_string($conn, $_POST['starting_bid']);
    $bid_increment_type = mysqli_real_escape_string($conn, $_POST['bid_increment_type']);
    $bid_increment = mysqli_real_escape_string($conn, $_POST['bid_increment']);
    $starting_bid_increment = mysqli_real_escape_string($conn, $_POST['starting_bid_increment']);

    $bid_increment_final = "";
    if($bid_increment_type == "static"){
        $bid_increment_final = mysqli_real_escape_string($conn, $bid_increment); 
    }
    else if($bid_increment_type == "progressive"){
        $bid_increment_final = mysqli_real_escape_string($conn, $starting_bid_increment); 
    }

    $reserve_option = mysqli_real_escape_string($conn, $_POST['reserve_option']);
    $reserve_amount = mysqli_real_escape_string($conn, $_POST['reserve_amount']);
    if($reserve_option == "no"){
        $reserve_amount = 0;
    }

    $category_value = mysqli_real_escape_string($conn, $_POST['category_value']);
    $category_other = mysqli_real_escape_string($conn, $_POST['category_other']);

    $lot_location = mysqli_real_escape_string($conn,$_POST['lot_location']);

    $featured_lot = mysqli_real_escape_string($conn, $_POST['featured_lot']);
    $allow_freeze = mysqli_real_escape_string($conn, $_POST['allow_freeze']);

    $times_the_bid = mysqli_real_escape_string($conn, $_POST['times_the_bid']);
    
    $quantity = mysqli_real_escape_string($conn,$_POST['quantity']);
    $unit_type = mysqli_real_escape_string($conn,$_POST['unit_type']);
    $brand = mysqli_real_escape_string($conn,$_POST['brand']);
    $condition = mysqli_real_escape_string($conn,$_POST['condition']);
    $size = mysqli_real_escape_string($conn,$_POST['size']);
    $weight = mysqli_real_escape_string($conn,$_POST['weight']);

    $internal_notes = mysqli_real_escape_string($conn, $_POST['internal_notes_helper']);
    
    $tags = mysqli_real_escape_string($conn,$_POST['tags']);

    $ip = $_SERVER['REMOTE_ADDR'];
    
    
    $update_sql = "UPDATE `lots` SET `name` = '$lot_name', `description` = '$lot_description', `starting_bid` = '$starting_bid', `increment_type` = '$bid_increment_type', `bid_increment` = '$bid_increment_final', `reserve_amount` = '$reserve_amount', `category` = '$category_value', `other_category` = '$category_other', `lot_location` = '$lot_location', `featured_lot` = '$featured_lot', `allow_freeze`='$allow_freeze', `times_the_bid`='$times_the_bid', `quantity` = '$quantity', `units` = '$unit_type', `brand` = '$bran', `lot_condition` = '$condition', `size` = '$size', `weight` = '$weight', `tags` = '$tags', `internal_notes`='$internal_notes', `ip_address` = '$ip' WHERE `lots`.`id` = $lot_id;";

    mysqli_query($conn, $update_sql);
    
    $loc = "location: " . $root . "lots/manage.php?update_success=1&cat_id=" . $catalog_id;
    header($loc);
    exit();
?>