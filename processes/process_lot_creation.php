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

    
    if(!isset($_POST['lot_creation_check'])){
        header("location: ../lots/create.php");
        exit();
    }

    $lot_name = mysqli_real_escape_string($conn, $_POST['lot_name']); 
    $lot_description = mysqli_real_escape_string($conn, $_POST['lot_description_helper']); 
    $starting_bid = mysqli_real_escape_string($conn, $_POST['starting_bid']); 
    $bid_increment_type = mysqli_real_escape_string($conn, $_POST['bid_increment_type']); 

    $increment_type = $_POST['bid_increment_type'];
    $bid_increment = "";
    if($increment_type == "static"){
        $bid_increment = mysqli_real_escape_string($conn, $_POST['bid_increment']); 
    }
    else if($increment_type == "progressive"){
        $bid_increment = mysqli_real_escape_string($conn, $_POST['starting_bid_increment']); 
    }

    $reserve_amount = mysqli_real_escape_string($conn, $_POST['reserve_amount']);
    if($reserve_amount == ""){
        $reserve_amount = 0;
    }

    $category_value = mysqli_real_escape_string($conn, $_POST['category_value']);
    $category_other = mysqli_real_escape_string($conn, $_POST['category_other']);
    
    $lot_location = mysqli_real_escape_string($conn, $_POST['lot_location']); 

    $featured_lot = mysqli_real_escape_string($conn, $_POST['featured_lot']);
    $allow_freeze = mysqli_real_escape_string($conn, $_POST['allow_freeze']);

    $times_the_bid = mysqli_real_escape_string($conn, $_POST['times_the_bid']);

    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']); 
    $unit_type = mysqli_real_escape_string($conn, $_POST['unit_type']); 
    $brand = mysqli_real_escape_string($conn, $_POST['brand']); 
    $lot_condition = mysqli_real_escape_string($conn, $_POST['condition']); 
    $size = mysqli_real_escape_string($conn, $_POST['size']); 
    $weight = mysqli_real_escape_string($conn, $_POST['weight']); 

    $internal_notes = mysqli_real_escape_string($conn, $_POST['internal_notes_helper']);
    $tags = mysqli_real_escape_string($conn, $_POST['tags']); 
    
    $ip = $_SERVER['REMOTE_ADDR'];
    $username;


    $sql = "INSERT INTO `lots` (`id`, `catalog_id`, `name`, `description`, `starting_bid`, `increment_type`, `bid_increment`, `reserve_amount`, `category`, `other_category`, `lot_location`, `featured_lot`, `allow_freeze`, `times_the_bid`, `quantity`, `units`, `brand`, `lot_condition`, `size`, `weight`, `tags`, `internal_notes`, `current_bid`, `closed`, `winner`, `owner`, `ip_address`) VALUES (NULL, '$catalog_id', '$lot_name', '$lot_description', '$starting_bid', '$increment_type', '$bid_increment', '$reserve_amount', '$category_value', '$category_other', '$lot_location', '$featured_lot', '$allow_freeze', '$times_the_bid', '$quantity', '$unit_type', '$brand', '$lot_condition', '$size', '$weight', '$tags', '$internal_notes', '-1', '-1', '-1', '$username', '$ip');";

    mysqli_query($conn, $sql);

    
    $last_id = mysqli_insert_id($conn);
    
    $sequence_sql = "SELECT * FROM `lot_sort` WHERE `cat_id` = '$catalog_id'";
    $sequence_result = mysqli_query($conn, $sequence_sql);
    $sequence_row = mysqli_fetch_assoc($sequence_result);
    $sequence_orig = $sequence_row['sequence'];
    
    $add_on_seq = $last_id . "||";
    $new_sequence = $sequence_orig . $add_on_seq;
    
    $sequence_sql = "UPDATE `lot_sort` SET `sequence` = '$new_sequence' WHERE `cat_id` = '$catalog_id';";
    
    mysqli_query($conn, $sequence_sql);

    $loc = "location: ../lots/manage.php?cat_id=" . $catalog_id;
    header($loc);

?>