<?php

function setup($zip){
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($zip)."&sensor=false&key=AIzaSyB9ftZTJSGz3nfhQ5e8mfOxPHLZYwOrLd8";
    $result_string = file_get_contents($url);
    $result = json_decode($result_string, true);
    return $result;
}
function long($zip){
    $result = setup($zip);
    $long = $result['results'][0]['geometry']['location']['lng'];
    return $long;
}
function lat($zip){
    $result = setup($zip);
    $lat = $result['results'][0]['geometry']['location']['lat'];
    return $lat;
}
function distance($lat1, $lon1, $lat2, $lon2, $unit) {
    if (($lat1 == $lat2) && ($lon1 == $lon2)) {
      return 0;
    }
    else {
      $theta = $lon1 - $lon2;
      $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      $miles = $dist * 60 * 1.1515;
      $unit = strtoupper($unit);
  
      if ($unit == "K") {
        return ($miles * 1.609344);
      } else if ($unit == "N") {
        return ($miles * 0.8684);
      } else {
        return $miles;
      }
    }
  }



$start_zip = "48178";
$start_lat = lat($start_zip);
$start_long = long($start_zip);

echo "Latitude: " . $start_lat;
echo "<br/>";
echo "Longitude: " . $start_long;


echo "<br/><br/><br/>";


$end_zip = "48150";
$end_lat = lat($end_zip);
$end_long = long($end_zip);

echo "Latitude: " . $end_lat;
echo "<br/>";
echo "Longitude: " . $end_long;


echo "<br/><br/><br/>";


echo distance($start_lat, $start_long, $end_lat, $end_long, "M") . " Miles<br>";
?>