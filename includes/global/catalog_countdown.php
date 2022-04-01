<?php

    // loop through all catalogs for published catalogs to determine when they will be open
    function getCatalogOpenCountdown(){
        include "../includes/connect.php";

        $published_catalogs = array();

        $status_sql = "SELECT * FROM `catalog_status` WHERE `status`='published'";
        $status_result = mysqli_query($conn, $status_sql);
        while ($status_row = mysqli_fetch_assoc($status_result)) {
            $catalog_id = $status_row['cat_id'];

            array_push($published_catalogs, $catalog_id);
        }


        $catalog_remaining = array();

        for ($i = 0; $i<count($published_catalogs); $i++) {
            $catalog_id = $published_catalogs[$i];

            $sql = "SELECT * FROM `catalogs` WHERE `id`=$catalog_id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $timezone = $row['timezone'];

            $date = new DateTime("now", new DateTimeZone($timezone) );
            $now = $date->format('Y-m-d H:i:s');
            $timestamp = strtotime($now);

            $start_timestamp = datetime($catalog_id) * 1000;
            $today = $timestamp * 1000;

            $remaining = $start_timestamp - $today;

            
            $temp = array('catalog_id'=> $catalog_id, 'time_remaining'=> $remaining);

            array_push($catalog_remaining, $temp);
        }

        $catalog_open_countdown = json_encode($catalog_remaining);

        return $catalog_open_countdown;
    }
?>