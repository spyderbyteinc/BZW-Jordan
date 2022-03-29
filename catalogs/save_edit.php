<?php
    session_start();

    include "../includes/username.php";
        
    include "../helpers/date_conversion.php";

    include "../includes/connect.php";


    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    // Get all locations
    $all_locations = $_POST['locations'];
    $set_locations = [];

    if(count($all_locations) > 0){
        foreach($all_locations as $loc){
            if($loc != -1 && $loc != "-1" && $loc != ""){
                $addr = $loc['id'] . "??||&&" . $loc['address1'] . "??||&&" . $loc['address2'] . "??||&&" . $loc['city'] . "??||&&" . $loc['state'] . "??||&&" . $loc['country'];
    
                array_push($set_locations, $addr);
            }
        }
    }

    for($l = 0; $l < 5; $l++){
        $item = $set_locations[$l];

        if(empty($item)){
            array_push($set_locations, "-1");
        }
    }

    // Get all inspections
    $all_inspections = $_POST['inspections'];
    $set_inspections = [];

    if(count($all_inspections) > 0){
        foreach($all_inspections as $ins){
            if($ins != -1 && $ins != "-1" && $ins != ""){
                $line = $ins['id'] . "??||&&" . $ins['start_date'] . "??||&&" . $ins['end_date'] . "??||&&" . $ins['start_time'] . "??||&&" . $ins['end_time'] . "??||&&" . $ins['location'];
    
                array_push($set_inspections, $line);
            }
        }
    }

    for($i = 0; $i < 10; $i++){
        $item = $set_inspections[$i];

        if(empty($item)){
            array_push($set_inspections, "-1");
        }
    }
    
    // Get all removals
    $all_removals = $_POST['removals'];
    $set_removals = [];

    if(count($all_removals) > 0){
        foreach($all_removals as $rem){
            if($rem != -1 && $rem != "-1" && $rem != ""){
                $line = $rem['id'] . "??||&&" . $rem['start_date'] . "??||&&" . $rem['end_date'] . "??||&&" . $rem['start_time'] . "??||&&" . $rem['end_time'] . "??||&&" . $rem['location'];
    
                array_push($set_removals, $line);
            }
        }
    }

    for($r = 0; $r < 10; $r++){
        $item = $set_removals[$r];

        if(empty($item)){
            array_push($set_removals, "-1");
        }
    }

    // Get all contacts
    $all_contacts = $_POST['contacts'];
    $set_contacts = [];

    if(count($all_contacts) > 0){
        foreach($all_contacts as $con){
            if($con != -1 && $con != "-1" && $con != ""){
                $line = $con['id'] . "??||&&" . $con['name'] . "??||&&" . $con['phone'] . "??||&&" . $con['location'];
    
                array_push($set_contacts, $line);
            }
        }
    }

    for($c = 0; $c < 10; $c++){
        $item = $set_contacts[$c];

        if(empty($item)){
            array_push($set_contacts, "-1");
        }
    }


    // Get all questions
    $all_questions = $_POST['questions'];
    $set_questions = [];

    if(count($all_questions) > 0){
        foreach($all_questions as $ques){
            if($ques != -1 && $ques != "-1" && $ques != ""){
                $line = $ques['id'] . "??||&&" . $ques['question'];
    
                array_push($set_questions, $line);
            }
        }
    }

    for($q = 0; $q < 10; $q++){
        $item = $set_questions[$q];

        if(empty($item)){
            array_push($set_questions, "-1");
        }
    }



    // Get information to send to SQL query
    // basic stuff
    $catalog_name = mysqli_real_escape_string($conn, $_POST['catalog_name']);
    $auction_type = mysqli_real_escape_string($conn, $_POST['auction_type']);
    $charity_event = mysqli_real_escape_string($conn, $_POST['charity_event']);
    $catalog_description = mysqli_real_escape_string($conn, $_POST['catalog_description']);

    $start_date = date_to_sql($_POST['start_date']);
    $start_time = mysqli_real_escape_string($conn, $_POST['start_time']);
    $end_date = date_to_sql($_POST['end_date']);
    $end_time = mysqli_real_escape_string($conn, $_POST['end_time']);
    $end_increment = mysqli_real_escape_string($conn, $_POST['end_increment']);

    $asset_currency = mysqli_real_escape_string($conn, $_POST['asset_currency']);
    $asset_timezone = mysqli_real_escape_string($conn, $_POST['asset_timezone']);
    $buyer_premium = mysqli_real_escape_string($conn, $_POST['buyer_premium']);
    $allow_freeze = mysqli_real_escape_string($conn, $_POST['allow_freeze']);

    // house account
    $active_house_accounts = mysqli_real_escape_string($conn, $_POST['active_house_accounts']);

    // location
    $location1 = mysqli_real_escape_string($conn, $set_locations[0]);
    $location2 = mysqli_real_escape_string($conn, $set_locations[1]);
    $location3 = mysqli_real_escape_string($conn, $set_locations[2]);
    $location4 = mysqli_real_escape_string($conn, $set_locations[3]);
    $location5 = mysqli_real_escape_string($conn, $set_locations[4]);

    // inspection
    $inspection1 = mysqli_real_escape_string($conn, $set_inspections[0]);
    $inspection2 = mysqli_real_escape_string($conn, $set_inspections[1]);
    $inspection3 = mysqli_real_escape_string($conn, $set_inspections[2]);
    $inspection4 = mysqli_real_escape_string($conn, $set_inspections[3]);
    $inspection5 = mysqli_real_escape_string($conn, $set_inspections[4]);
    $inspection6 = mysqli_real_escape_string($conn, $set_inspections[5]);
    $inspection7 = mysqli_real_escape_string($conn, $set_inspections[6]);
    $inspection8 = mysqli_real_escape_string($conn, $set_inspections[7]);
    $inspection9 = mysqli_real_escape_string($conn, $set_inspections[8]);
    $inspection10 = mysqli_real_escape_string($conn, $set_inspections[9]);

    // removal
    $removal1 = mysqli_real_escape_string($conn, $set_removals[0]);
    $removal2 = mysqli_real_escape_string($conn, $set_removals[1]);
    $removal3 = mysqli_real_escape_string($conn, $set_removals[2]);
    $removal4 = mysqli_real_escape_string($conn, $set_removals[3]);
    $removal5 = mysqli_real_escape_string($conn, $set_removals[4]);
    $removal6 = mysqli_real_escape_string($conn, $set_removals[5]);
    $removal7 = mysqli_real_escape_string($conn, $set_removals[6]);
    $removal8 = mysqli_real_escape_string($conn, $set_removals[7]);
    $removal9 = mysqli_real_escape_string($conn, $set_removals[8]);
    $removal10 = mysqli_real_escape_string($conn, $set_removals[9]);

    // contact
    $contact1 = mysqli_real_escape_string($conn, $set_contacts[0]);
    $contact2 = mysqli_real_escape_string($conn, $set_contacts[1]);
    $contact3 = mysqli_real_escape_string($conn, $set_contacts[2]);
    $contact4 = mysqli_real_escape_string($conn, $set_contacts[3]);
    $contact5 = mysqli_real_escape_string($conn, $set_contacts[4]);
    $contact6 = mysqli_real_escape_string($conn, $set_contacts[5]);
    $contact7 = mysqli_real_escape_string($conn, $set_contacts[6]);
    $contact8 = mysqli_real_escape_string($conn, $set_contacts[7]);
    $contact9 = mysqli_real_escape_string($conn, $set_contacts[8]);
    $contact10 = mysqli_real_escape_string($conn, $set_contacts[9]);

    // questions
    $question1 = mysqli_real_escape_string($conn, $set_questions[0]);
    $question2 = mysqli_real_escape_string($conn, $set_questions[1]);
    $question3 = mysqli_real_escape_string($conn, $set_questions[2]);
    $question4 = mysqli_real_escape_string($conn, $set_questions[3]);
    $question5 = mysqli_real_escape_string($conn, $set_questions[4]);
    $question6 = mysqli_real_escape_string($conn, $set_questions[5]);
    $question7 = mysqli_real_escape_string($conn, $set_questions[6]);
    $question8 = mysqli_real_escape_string($conn, $set_questions[7]);
    $question9 = mysqli_real_escape_string($conn, $set_questions[8]);
    $question10 = mysqli_real_escape_string($conn, $set_questions[9]);

    $inspection_notes = mysqli_real_escape_string($conn, $_POST['inspection_notes']);
    $removal_notes = mysqli_real_escape_string($conn, $_POST['removal_notes']);
    
    $terms_conditions =  mysqli_real_escape_string($conn, $_POST['terms_conditions']);

    $catalog_id = $_SESSION['catalog_id'];

    $sql = "UPDATE `catalogs` SET `catalog_name` = '$catalog_name', `auction_type` = '$auction_type', `charity` = '$charity_event', `catalog_description` = '$catalog_description', `start_date` = '$start_date', `start_time` = '$start_time', `end_date` = '$end_date', `end_time` = '$end_time', `end_increment` = '$end_increment', `house_list` = '$active_house_accounts', `currency` = '$asset_currency', `timezone` = '$asset_timezone', `buyer_premium` = '$buyer_premium', `allow_freeze` = '$allow_freeze', `asset_location_1` = '$location1', `asset_location_2` = '$location2', `asset_location_3` = '$location3', `asset_location_4` = '$location4', `asset_location_5` = '$location5', `inspection_1` = '$inspection1', `inspection_2` = '$inspection2', `inspection_3` = '$inspection3', `inspection_4` = '$inspection4', `inspection_5` = '$inspection5', `inspection_6` = '$inspection6', `inspection_7` = '$inspection7', `inspection_8` = '$inspection8', `inspection_9` = '$inspection9', `inspection_10` = '$inspection10', `removal_1` = '$removal1', `removal_2` = '$removal2', `removal_3` = '$removal3', `removal_4` = '$removal4', `removal_5` = '$removal5', `removal_6` = '$removal6', `removal_7` = '$removal7', `removal_8` = '$removal8', `removal_9` = '$removal9', `removal_10` = '$removal10', `contact_1` = '$contact1', `contact_2` = '$contact2', `contact_3` = '$contact3', `contact_4` = '$contact4', `contact_5` = '$contact5', `contact_6` = '$contact6', `contact_7` = '$contact7', `contact_8` = '$contact8', `contact_9` = '$contact9', `contact_10` = '$contact10', `question_1` = '$question1', `question_2` = '$question2', `question_3` = '$question3', `question_4` = '$question4', `question_5` = '$question5', `question_6` = '$question6', `question_7` = '$question7', `question_8` = '$question8', `question_9` = '$question9', `question_10` = '$question10', `terms_conditions` = '$terms_conditions', `inspection_notes` = '$inspection_notes', `removal_notes` = '$removal_notes', `IP_address` = '$ip' WHERE `catalogs`.`id` = $catalog_id;";

    mysqli_query($conn, $sql);

    echo $sql;


    // echo "done";
?>