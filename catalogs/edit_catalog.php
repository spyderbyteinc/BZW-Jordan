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

$catalog_id = $_SESSION['catalog_id'];

$catalog_name = mysqli_real_escape_string($conn, $_POST['catalog_name']);
$auction_type = mysqli_real_escape_string($conn, $_POST['auction_type']);
$charity_event = mysqli_real_escape_string($conn, $_POST['charity_event']);
$catalog_description = mysqli_real_escape_string($conn, $_POST['catalog_description']);
$start_date = date_to_sql($_POST['start_date']);
$start_time = mysqli_real_escape_string($conn, $_POST['start_time']);
$end_date = date_to_sql($_POST['end_date']);
$end_time = mysqli_real_escape_string($conn, $_POST['end_time']);
$end_increment = mysqli_real_escape_string($conn, $_POST['end_increment']);

$location1 = mysqli_real_escape_string($conn, $_POST['location1']);
$location2 = mysqli_real_escape_string($conn, $_POST['location2']);
$location3 = mysqli_real_escape_string($conn, $_POST['location3']);
$location4 = mysqli_real_escape_string($conn, $_POST['location4']);
$location5 = mysqli_real_escape_string($conn, $_POST['location5']);

$house_accounts = mysqli_real_escape_string($conn, $_POST['house_accounts']);

$currency = mysqli_real_escape_string($conn, $_POST['currency']);
$timezone = mysqli_real_escape_string($conn, $_POST['timezone']);
$buyer_premium = mysqli_real_escape_string($conn, $_POST['buyer_premium']);
$allow_freeze = mysqli_real_escape_string($conn, $_POST['allow_freeze']);

$bid_increment = mysqli_real_escape_string($conn, $_POST['bid_increment']);
$times_the_bid = mysqli_real_escape_string($conn, $_POST['times_the_bid']);


// Extended Bidding
$extended_bidding = mysqli_real_escape_string($conn, $_POST['extended_bidding']);
$extended_type = mysqli_real_escape_string($conn, $_POST['extended_type']);
$extended_time_remaining = mysqli_real_escape_string($conn, $_POST['extended_time_remaining']);
$extended_minutes_increment = mysqli_real_escape_string($conn, $_POST['extended_minutes_increment']);
$extended_minutes_jump = mysqli_real_escape_string($conn, $_POST['extended_minutes_jump']);

if($extended_type == "jump"){
    $extended_minutes_increment = "";
}
else if($extended_type == "increment"){
    $extended_minutes_jump = "";
}

$inspection1 = mysqli_real_escape_string($conn, $_POST['inspection1']);
$inspection2 = mysqli_real_escape_string($conn, $_POST['inspection2']);
$inspection3 = mysqli_real_escape_string($conn, $_POST['inspection3']);
$inspection4 = mysqli_real_escape_string($conn, $_POST['inspection4']);
$inspection5 = mysqli_real_escape_string($conn, $_POST['inspection5']);
$inspection6 = mysqli_real_escape_string($conn, $_POST['inspection6']);
$inspection7 = mysqli_real_escape_string($conn, $_POST['inspection7']);
$inspection8 = mysqli_real_escape_string($conn, $_POST['inspection8']);
$inspection9 = mysqli_real_escape_string($conn, $_POST['inspection9']);
$inspection10 = mysqli_real_escape_string($conn, $_POST['inspection10']);

$removal1 = mysqli_real_escape_string($conn, $_POST['removal1']);
$removal2 = mysqli_real_escape_string($conn, $_POST['removal2']);
$removal3 = mysqli_real_escape_string($conn, $_POST['removal3']);
$removal4 = mysqli_real_escape_string($conn, $_POST['removal4']);
$removal5 = mysqli_real_escape_string($conn, $_POST['removal5']);
$removal6 = mysqli_real_escape_string($conn, $_POST['removal6']);
$removal7 = mysqli_real_escape_string($conn, $_POST['removal7']);
$removal8 = mysqli_real_escape_string($conn, $_POST['removal8']);
$removal9 = mysqli_real_escape_string($conn, $_POST['removal9']);
$removal10 = mysqli_real_escape_string($conn, $_POST['removal10']);

$contact1 = mysqli_real_escape_string($conn, $_POST['contact1']);
$contact2 = mysqli_real_escape_string($conn, $_POST['contact2']);
$contact3 = mysqli_real_escape_string($conn, $_POST['contact3']);
$contact4 = mysqli_real_escape_string($conn, $_POST['contact4']);
$contact5 = mysqli_real_escape_string($conn, $_POST['contact5']);
$contact6 = mysqli_real_escape_string($conn, $_POST['contact6']);
$contact7 = mysqli_real_escape_string($conn, $_POST['contact7']);
$contact8 = mysqli_real_escape_string($conn, $_POST['contact8']);
$contact9 = mysqli_real_escape_string($conn, $_POST['contact9']);
$contact10 = mysqli_real_escape_string($conn, $_POST['contact10']);

$question1 = mysqli_real_escape_string($conn, $_POST['question1']);
$question2 = mysqli_real_escape_string($conn, $_POST['question2']);
$question3 = mysqli_real_escape_string($conn, $_POST['question3']);
$question4 = mysqli_real_escape_string($conn, $_POST['question4']);
$question5 = mysqli_real_escape_string($conn, $_POST['question5']);
$question6 = mysqli_real_escape_string($conn, $_POST['question6']);
$question7 = mysqli_real_escape_string($conn, $_POST['question7']);
$question8 = mysqli_real_escape_string($conn, $_POST['question8']);
$question9 = mysqli_real_escape_string($conn, $_POST['question9']);
$question10 = mysqli_real_escape_string($conn, $_POST['question10']);

$terms_conditions =  mysqli_real_escape_string($conn, $_POST['terms_conditions']);

$inspection_notes = mysqli_real_escape_string($conn, $_POST['inspection_notes']);
$removal_notes = mysqli_real_escape_string($conn, $_POST['removal_notes']);

$sql = "UPDATE `catalogs` SET `catalog_name` = '$catalog_name', `auction_type` = '$auction_type', `charity` = '$charity_event', `catalog_description` = '$catalog_description', `start_date` = '$start_date', `start_time` = '$start_time', `end_date` = '$end_date', `end_time` = '$end_time', `end_increment` = '$end_increment', `house_list` = '$house_accounts', `currency` = '$currency', `timezone` = '$timezone', `buyer_premium` = '$buyer_premium', `allow_freeze`='$allow_freeze', `asset_location_1` = '$location1', `asset_location_2` = '$location2', `asset_location_3` = '$location3', `asset_location_4` = '$location4', `asset_location_5` = '$location5', `inspection_1` = '$inspection1', `inspection_2` = '$inspection2', `inspection_3` = '$inspection3', `inspection_4` = '$inspection4', `inspection_5` = '$inspection5', `inspection_6` = '$inspection6', `inspection_7` = '$inspection7', `inspection_8` = '$inspection8', `inspection_9` = '$inspection9', `inspection_10` = '$inspection10', `removal_1` = '$removal1', `removal_2` = '$removal2', `removal_3` = '$removal3', `removal_4` = '$removal4', `removal_5` = '$removal5', `removal_6` = '$removal6', `removal_7` = '$removal7', `removal_8` = '$removal8', `removal_9` = '$removal9', `removal_10` = '$removal10', `contact_1` = '$contact1', `contact_2` = '$contact2', `contact_3` = '$contact3', `contact_4` = '$contact4', `contact_5` = '$contact5', `contact_6` = '$contact6', `contact_7` = '$contact7', `contact_8` = '$contact8', `contact_9` = '$contact9', `contact_10` = '$contact10', `question_1` = '$question1', `question_2` = '$question2', `question_3` = '$question3', `question_4` = '$question4', `question_5` = '$question5', `question_6` = '$question6', `question_7` = '$question7', `question_8` = '$question8', `question_9` = '$question9', `question_10` = '$question10', `terms_conditions` = '$terms_conditions', `inspection_notes` = '$inspection_notes', `removal_notes` = '$removal_notes', `extended_bidding` = '$extended_bidding', `extended_type` = '$extended_type', `extended_time_remaining`='$extended_time_remaining', `extended_minutes_jump` = '$extended_minutes_jump', `extended_minutes_increment`='$extended_minutes_increment', `bid_increment`='$bid_increment', `times_the_bid`='$times_the_bid', `owner` = '$username', `IP_address` = '$ip'  WHERE `catalogs`.`id` = $catalog_id;";

mysqli_query($conn, $sql);

$highest_location_id = mysqli_real_escape_string($conn, $_POST['highest_location_id']);

$location_sql = "UPDATE `catalog_location` SET `location_index` = '$highest_location_id' WHERE `cat_id` = $catalog_id;";
mysqli_query($conn, $location_sql);
echo "done";
?>