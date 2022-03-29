<?php

include "../includes/username.php";
include "../includes/connect.php";

$cat_id = $_POST['id'];

$sql = "SELECT * FROM `catalogs` WHERE `id`=$cat_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$return = array();
$location1 = $row['asset_location_1'];
$location2 = $row['asset_location_2'];
$location3 = $row['asset_location_3'];
$location4 = $row['asset_location_4'];
$location5 = $row['asset_location_5'];

array_push($return, $location1);

if($location2 != "-1"){
    array_push($return, $location2);
}
if($location3 != "-1"){
    array_push($return, $location3);
}
if($location4 != "-1"){
    array_push($return, $location4);
}
if($location5 != "-1"){
    array_push($return, $location5);
}

print json_encode($return);
?>