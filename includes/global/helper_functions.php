<?php

    function datetime($id){
        
        include "connect.php";

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

    function time_to_countdown($time){
        // here is the formula for countdown
        // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        // var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        // var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        $days = floor($time / (1000 * 60 * 60 *24));
        $hours = floor(($time % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        $minutes = floor(($time % (1000 * 60 * 60)) / (1000 * 60));
        $seconds = floor(($time % (1000 * 60)) / 1000);

        return $days . "D " . $hours . "H " . $minutes . "M " . $seconds . "S";
    }
?>