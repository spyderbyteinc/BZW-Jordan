<?php
    include "../includes/connect.php";
    include "../includes/username.php";

    $catalog_id = $_SESSION['lot_catalog'];

    $given_sequence = $_POST['sequence'];
    $lot_count = $_POST['num'];
    
    $sequence_arr = explode("??||&&", $given_sequence);

    // 1 - Correct Number of Lots
        // 1.1 - Number from js call
        $seq_num = count($sequence_arr);
        if($seq_num != $lot_count){
            echo "error - wrong number 1";
            return;
        }
        // 1.2 - Number from table
        $num_sql = "SELECT * FROM `lot_sort` WHERE `cat_id`=$catalog_id";
        $num_result = mysqli_query($conn, $num_sql);
        $row = mysqli_fetch_assoc($num_result);
        $table_sequence = $row['sequence'];

        $table_sequence = substr($table_sequence, 2);
        $table_sequence = substr($table_sequence, 0, -2);
        $table_arr = explode("||", $table_sequence);
        $table_num = count($table_arr);

        if($table_num != $lot_count){
            echo "error - wrong number 2";
            return;
        }


    // 2 - No duplicates
    $dup_array = array();
    foreach($sequence_arr as $seq_item){
        $in_dup = in_array($seq_item, $dup_array);
        if($in_dup){
            echo "error - not unique";
            return;
        }
        else{
            array_push($dup_array, $seq_item);
        }
    }
    

    // 3 - All Integers
    foreach($sequence_arr as $seq_item){
        if(is_numeric($seq_item)){
            // $item = (int)$seq_item;
            // if(!is_int($item)){
            //     echo "error";
            //     return;
            // }
            if($seq_item != (int)$seq_item){
                echo "error - not integer 1";
                return;
            }
        }
        else{
            echo "error - not integer 2";
            return;
        }
    }
    // 4 - Ownership
    foreach($sequence_arr as $seq_item){
        $seq_item = (int)$seq_item;

        $own_sql = "SELECT * FROM `lots` WHERE `id`=$seq_item AND `catalog_id`=$catalog_id AND `owner`='$username'";
        $own_result = mysqli_query($conn, $own_sql);
        $own_num = mysqli_num_rows($own_result);

        if($own_num != 1){
            echo "error - picture not owned";
            return;
        }
    }

    // No Error
    $update_sequence = "||";
    foreach($sequence_arr as $seq_item){
        $update_sequence = $update_sequence . $seq_item . "||";
    }

    $update_sql = "UPDATE `lot_sort` SET `sequence`='$update_sequence' WHERE `cat_id`=$catalog_id";
    mysqli_query($conn, $update_sql);

    return "success";
?>