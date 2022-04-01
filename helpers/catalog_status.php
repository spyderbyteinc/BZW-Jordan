<?php
//     $root = "http://localhost/bidzwon/";
//     include "../includes/connect.php";



// // get month name with switch/case
// function month_convert($month){
    
//     switch ($month){
//         case 1:
//             $month_name = "January";
//             break;
//         case 2:
//             $month_name = "February";
//             break;
//         case 3:
//             $month_name = "March";
//             break;
//         case 4:
//             $month_name = "April";
//             break;
//         case 5:
//             $month_name = "May";
//             break;
//         case 6:
//             $month_name = "June";
//             break;
//         case 7:
//             $month_name = "July";
//             break;
//         case 8:
//             $month_name = "August";
//             break;
//         case 9:
//             $month_name = "September";
//             break;
//         case 10:
//             $month_name = "October";
//             break;
//         case 11:
//             $month_name = "November";
//             break;
//         case 12:
//             $month_name = "December";
//             break;
//     }

//      return $month_name;
// }

// // get catalog status from id
// function catalog_status($id){ 
    
//     include "../includes/connect.php";
//     include_once "../helpers/datetime.php";

//     $stage = "staging";

//     // get published information
//     $published_sql = "SELECT * FROM `catalogs` WHERE `id`='$id'";
//     $published_result = mysqli_query($conn, $published_sql);
//     $published_row = mysqli_fetch_assoc($published_result);
//     $published = $published_row['published'];
//     $start_date = sql_to_date($published_row['start_date']);

//     $select = "SELECT * FROM `catalog_status` WHERE `cat_id`=$id";
//     $res = mysqli_query($conn, $select);
//     $mystage_row = mysqli_fetch_assoc($res);

//     $mystage = $mystage_row['status'];

//     if($published == "0" || $published == 0){
//         if($mystage == "staging"){
//             $stage = "staging";
//         }
//         else{
//             $stage = "cancel";
//         }
//     }
//     else{
//         $day = explode("/", $start_date);
//         $month = $day[0];
//         $date = $day[1];
//         $year = $day[2];

//         $month_name = month_convert($month);
        
//         $str = $date  . " " . $month_name . " " . $year;
//         $start_time = (int)datetime2($id);

//         $current_time = strtotime("now");


//         if($current_time > $start_time){
//             $stage = "open";
//         }
//         else{
//             $stage = "published";
//         }
        
//         $stage_sql = "SELECT * FROM `catalog_status` WHERE `cat_id`=$id";
//         $stage_result = mysqli_query($conn, $stage_sql);
//         $row = mysqli_fetch_assoc($stage_result);
//         $stg = $row['status'];

//         if(mysqli_num_rows($stage_result) == 0){
//             $catalog_stage_sql = "INSERT INTO `catalog_status` (`id`, `cat_id`, `status`, `time`) VALUES (NULL, '$id', '$stage', CURRENT_TIMESTAMP);";

//             mysqli_query($conn, $catalog_stage_sql);
//         }
//         else if($stg != $stage){
//             $update_sql = "UPDATE `catalog_status` SET `status` = '$stage', `time` = CURRENT_TIMESTAMP WHERE `catalog_status`.`id` = $id;";

//             mysqli_query($conn, $update_sql);
//         }
//     }

//     return $stage;

// }

?>