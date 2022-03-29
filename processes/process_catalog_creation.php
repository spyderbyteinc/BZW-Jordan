<?php
    include "../includes/username.php";
    
    include "../helpers/date_conversion.php";

    include "../includes/connect.php";


    $loc = "location: " . $root;
    if($username == "" || !isset($username)){
        header($loc);
        exit();
    }
    
    if(!isset($_POST['confirm_creation'])){
        header("location: ../catalogs/create.php");
        exit();
    }

    // Basic Elements
    $catalog_name = mysqli_real_escape_string($conn, $_POST['catalog_name']);
    $auction_type = mysqli_real_escape_string($conn, $_POST['auction_type']);
    $charity = mysqli_real_escape_string($conn, $_POST['charity_event']);
    $catalog_description = mysqli_real_escape_string($conn, $_POST['catalog_description']);
    $start_date = date_to_sql($_POST['start_date']);
    $start_time = mysqli_real_escape_string($conn, $_POST['start_time']);
    $end_date = date_to_sql($_POST['end_date']);
    $end_time = mysqli_real_escape_string($conn, $_POST['end_time']);
    $end_increment = mysqli_real_escape_string($conn, $_POST['end_increment']);
    $house_list = mysqli_real_escape_string($conn, $_POST['active_house_accounts']);
    $currency = mysqli_real_escape_string($conn, $_POST['asset_currency']);
    $timezone = mysqli_real_escape_string($conn, $_POST['asset_timezone']);
    $buyer_premium = mysqli_real_escape_string($conn, $_POST['buyer_premium']);
    $terms_conditions = mysqli_real_escape_string($conn, $_POST['terms_conditions']);


    // Locations
    $locations = array(-1);
    $locations_nums = array(-1);
    $location_number = $_POST['location_num'];
    for($i = 0; $i <= $location_number; $i++){
        $mod = "location_address1_" . $i;
        if(isset($_POST[$mod])){
            $address1 = $_POST["location_address1_" . $i];
            $address2 = $_POST["location_address2_" . $i];
            if($address2 == "" || !isset($address2)){
                $address2 = "-1";
            }
            $city = $_POST["location_city_" . $i];
            $state = $_POST["location_state_" . $i];
            $country = $_POST["location_country_" . $i];

            if (strpos($address1, '??') !== false && strpos($address1, '||') !== false && strpos($address1, '&&') !== false) {
                error_entry();
            }
            if (strpos($address2, '??') !== false && strpos($address2, '||') !== false && strpos($address2, '&&') !== false) {
                error_entry();
            }
            if (strpos($city, '??') !== false && strpos($city, '||') !== false && strpos($city, '&&') !== false) {
                error_entry();
            }
            if (strpos($state, '??') !== false && strpos($state, '||') !== false && strpos($state, '&&') !== false) {
                error_entry();
            }
            if (strpos($country, '??') !== false && strpos($country, '||') !== false && strpos($country, '&&') !== false) {
                error_entry();
            }

            $line = $address1 . "??||&&" . $address2 . "??||&&" . $city . "??||&&" . $state . "??||&&" . $country;

            $line = mysqli_real_escape_string($conn, $line);

            array_push($locations, $line);
            array_push($locations_nums, $i);
        }
    }


    // Inspection
    $inspections = array();
    $inspection_number = $_POST['inspection_num'];
    for($i = 0; $i <= $inspection_number; $i++){
        $mod = "inspection_date_" . $i;
        if(isset($_POST[$mod])){
            $date = $_POST['inspection_date_' . $i];
            $start_time = $_POST['inspection_start_' . $i];
            $end_time = $_POST['inspection_end_' . $i];
            $location = $_POST['inspection_location_' . $i];
            
            if (strpos($date, '??') !== false && strpos($date, '||') !== false && strpos($date, '&&') !== false) {
                error_entry();
            }
            if (strpos($start_time, '??') !== false && strpos($start_time, '||') !== false && strpos($start_time, '&&') !== false) {
                error_entry();
            }
            if (strpos($end_time, '??') !== false && strpos($end_time, '||') !== false && strpos($end_time, '&&') !== false) {
                error_entry();
            }
            if (strpos($location, '??') !== false && strpos($location, '||') !== false && strpos($location, '&&') !== false) {
                error_entry();
            }

            $count = 0;
            foreach($locations_nums as $loc){
                if($loc == $location){
                    $location = $count;
                }
                $count++;
            }

            $location--;

            $line = $date . "??||&&" . $start_time . "??||&&" . $end_time . "??||&&" . $location;

            $line = mysqli_real_escape_string($conn, $line);
            
            array_push($inspections, $line);
        }
    }

    // Removal
    $removals = array();
    $removal_number = $_POST['removal_num'];
    for($i = 0; $i <= $removal_number; $i++){
        $mod = "removal_date_" . $i;
        if(isset($_POST[$mod])){
            $date = $_POST['removal_date_' . $i];
            $start_time = $_POST['removal_start_' . $i];
            $end_time = $_POST['removal_end_' . $i];
            $location = $_POST['removal_location_' . $i];
            
            if (strpos($date, '??') !== false && strpos($date, '||') !== false && strpos($date, '&&') !== false) {
                error_entry();
            }
            if (strpos($start_time, '??') !== false && strpos($start_time, '||') !== false && strpos($start_time, '&&') !== false) {
                error_entry();
            }
            if (strpos($end_time, '??') !== false && strpos($end_time, '||') !== false && strpos($end_time, '&&') !== false) {
                error_entry();
            }
            if (strpos($location, '??') !== false && strpos($location, '||') !== false && strpos($location, '&&') !== false) {
                error_entry();
            }

            $count = 0;
            foreach($locations_nums as $loc){
                if($loc == $location){
                    $location = $count;
                }
                $count++;
            }

            $location--;

            $line = $date . "??||&&" . $start_time . "??||&&" . $end_time . "??||&&" . $location;

            $line = mysqli_real_escape_string($conn, $line);
            
            array_push($removals, $line);
        }
    }

    // Contacts
    $contacts = array();
    $contact_number = $_POST['contact_num'];
    for($i = 0; $i <= $contact_number; $i++){
        $mod = "contact_name_" . $i;
        if(isset($_POST[$mod])){
            $name = $_POST['contact_name_' . $i];
            $phone = $_POST['contact_phone_' . $i];
            $location = $_POST['contact_location_' . $i];
            
            if (strpos($name, '??') !== false && strpos($name, '||') !== false && strpos($name, '&&') !== false) {
                error_entry();
            }
            if (strpos($phone, '??') !== false && strpos($phone, '||') !== false && strpos($phone, '&&') !== false) {
                error_entry();
            }
            if (strpos($location, '??') !== false && strpos($location, '||') !== false && strpos($location, '&&') !== false) {
                error_entry();
            }

            $count = 0;
            foreach($locations_nums as $loc){
                if($loc == $location){
                    $location = $count;
                }
                $count++;
            }

            $location--;

            $line = $name . "??||&&" . $phone . "??||&&" . $location;

            $line = mysqli_real_escape_string($conn, $line);
            
            array_push($contacts, $line);
        }
    }

    // Questions
    $questions = array();
    $question_number = $_POST['question_num'];
    for($i = 0; $i <= $question_number; $i++){
        $mod = "question_" . $i;
        if(isset($_POST[$mod])){
            $question_name = $_POST["question_" . $i];

            $line = mysqli_real_escape_string($conn, $question_name);
            
            array_push($questions, $question_name);
        }
    }

    $catalog_questions = array(-1,-1,-1,-1,-1,-1,-1,-1,-1,-1);
    $i=0;
    foreach($questions as $cur_ques){
        if(isset($cur_ques) && $cur_ques != -1){
            $catalog_questions[$i] = $cur_ques;
        }
        $i++;
    }
    

    // Move data from arrays to database values

    // Location 
    $asset_locations = array(-1,-1,-1,-1,-1);
    $i = -2;
    foreach($locations as $cur_location){
        $i++;
        if(isset($cur_location) && $cur_location != -1){
            $asset_locations[$i] = $cur_location;
        }
    }
    


    // Removal
    $asset_removals = array(-1,-1,-1,-1,-1,-1,-1,-1,-1,-1);
    $i=0;
    foreach($removals as $cur_remove){
        if(isset($cur_remove) && $cur_remove != -1){
            $asset_removals[$i] = $cur_remove;
        }
        $i++;
    }



    // Inspection
    $asset_inspections = array(-1,-1,-1,-1,-1,-1,-1,-1,-1,-1);
    $i=0;
    foreach($inspections as $cur_inspect){
        if(isset($cur_inspect) && $cur_inspect != -1){
            $asset_inspections[$i] = $cur_inspect;
        }
        $i++;
    }



    // Contacts
    $asset_contacts = array(-1,-1,-1,-1,-1,-1,-1,-1,-1,-1);
    $i=0;
    foreach($contacts as $cur_contact){
        if(isset($cur_contact) && $cur_contact != -1){
            $asset_contacts[$i] = $cur_contact;
        }
        $i++;
    }
    





    $sql = "INSERT INTO `catalogs` (`id`, `catalog_name`, `auction_type`, `charity`, `catalog_description`, `start_date`, `start_time`, `end_date`, `end_time`, `end_increment`, `house_list`, `currency`, `timezone`, `buyer_premium`, `asset_location_1`, `asset_location_2`, `asset_location_3`, `asset_location_4`, `asset_location_5`, `inspection_1`, `inspection_2`, `inspection_3`, `inspection_4`, `inspection_5`, `inspection_6`, `inspection_7`, `inspection_8`, `inspection_9`, `inspection_10`, `removal_1`, `removal_2`, `removal_3`, `removal_4`, `removal_5`, `removal_6`, `removal_7`, `removal_8`, `removal_9`, `removal_10`, `contact_1`, `contact_2`, `contact_3`, `contact_4`, `contact_5`, `contact_6`, `contact_7`, `contact_8`, `contact_9`, `contact_10`, `question_1`, `question_2`, `question_3`, `question_4`, `question_5`, `question_6`, `question_7`, `question_8`, `question_9`, `question_10`, `terms_conditions`, `owner`) VALUES (NULL, '$catalog_name', '$auction_type', '$charity', '$catalog_description', '$start_date', '$start_time', '$end_date', '$end_time', '$end_increment', '$house_list', '$currency', '$timezone', '$buyer_premium', '$asset_locations[0]', '$asset_locations[1]', '$asset_locations[2]', '$asset_locations[3]', '$asset_locations[4]', '$asset_inspections[0]', '$asset_inspections[1]', '$asset_inspections[2]', '$asset_inspections[3]', '$asset_inspections[4]', '$asset_inspections[5]', '$asset_inspections[6]', '$asset_inspections[7]', '$asset_inspections[8]', '$asset_inspections[9]', '$asset_removals[0]', '$asset_removals[1]', '$asset_removals[2]', '$asset_removals[3]', '$asset_removals[4]', '$asset_removals[5]', '$asset_removals[6]', '$asset_removals[7]', '$asset_removals[8]', '$asset_removals[9]', '$asset_contacts[0]', '$asset_contacts[1]', '$asset_contacts[2]', '$asset_contacts[3]', '$asset_contacts[4]', '$asset_contacts[5]', '$asset_contacts[6]', '$asset_contacts[7]', '$asset_contacts[8]', '$asset_contacts[9]', '$catalog_questions[0]', '$catalog_questions[1]', '$catalog_questions[2]', '$catalog_questions[3]', '$catalog_questions[4]', '$catalog_questions[5]', '$catalog_questions[6]', '$catalog_questions[7]', '$catalog_questions[8]', '$catalog_questions[9]', '$terms_conditions', '$username');";

    mysqli_query($conn, $sql);

    header("location: ../catalogs/manage.php");

    function error_entry(){
        echo "TODO: ERROR Handling";
    }
?>