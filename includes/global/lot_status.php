<?php

    $lot_sql = "SELECT * FROM `lots` WHERE `status`<>'cancel'";
    $lot_result = mysqli_query($conn, $lot_sql);
    while($lot_row = mysqli_fetch_assoc($lot_result)){
        $id = $lot_row['id'];
        $catalog_id = $lot_row['catalog_id'];
        $lot_status = $lot_row['status'];

        $cat_sql = "SELECT * FROM `catalog_status` WHERE `cat_id`=$catalog_id AND `status`<>'cancel'";
        $cat_result = mysqli_query($conn, $cat_sql);
        $cat_row = mysqli_fetch_assoc($cat_result);
        $cat_status = $cat_row['status'];

        $update_sql = "";

        if($cat_status == "published"){
            if($lot_status == "published"){
                continue;
            }
            $update_sql = "UPDATE `lots` SET `status` = 'published' WHERE `id` = $id";
        }
        else if($cat_status == "open"){
            if($lot_status == "open"){
                continue;
            }
            $update_sql = "UPDATE `lots` SET `status` = 'open' WHERE `id` = $id";
        }
        else if($cat_status == "staging"){
            if($lot_status == "staging"){
                continue;
            }
            $update_sql = "UPDATE `lots` SET `status` = 'staging' WHERE `id` = $id";
        }
        else{
            continue;
        }

        mysqli_query($conn, $update_sql);
    }

?>