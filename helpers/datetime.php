<?php
    include "../includes/connect.php";

    function datetime2($id){
        include "../includes/connect.php";

        // get start date and start time
        $sql ="SELECT * FROM `catalogs` WHERE `id`=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $start_date = $row['start_date'];
        $start_time = $row['start_time'];

        
        $hour = (int)($start_time[0] . $start_time[1]);
        $min = (int)($start_time[2] . $start_time[3]);
        
        $day = explode("-", $start_date);
        $year = (int)$day[0];
        $month = (int)$day[1];
        $date = (int)$day[2];

        date_default_timezone_set('America/Detroit');
        $time = mktime($hour, $min, 0, $month, $date, $year);
        return strval($time);
    }

    function datetime_end($id){
        include "../includes/connect.php";

        // get start date and start time
        $sql ="SELECT * FROM `catalogs` WHERE `id`=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $end_date = $row['end_date'];
        $end_time = $row['end_time'];

        
        $hour = (int)($end_time[0] . $end_time[1]);
        $min = (int)($end_time[2] . $end_time[3]);
        
        $day = explode("-", $end_date);
        $year = (int)$day[0];
        $month = (int)$day[1];
        $date = (int)$day[2];

        date_default_timezone_set('America/Detroit');
        $time = mktime($hour, $min, 0, $month, $date, $year);
        return strval($time);
    }
?>