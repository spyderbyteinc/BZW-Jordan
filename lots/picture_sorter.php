<?php
    include "../includes/connect.php";
    include "../includes/username.php";

    $catalog_id = $_SESSION['lot_catalog'];
    $lot_id = $_SESSION['lot_id'];

    $given_sequence = $_POST['sequence'];
    $given_num = $_POST['num'];
    
    $sequence_arr = explode("??||&&", $given_sequence);

    // 1. Correct Number of Pictures
        // 1.1. Number from js call
            $seq_num = count($sequence_arr);
            if($seq_num != $given_num){
                echo "error - wrong number 1";
                exit();
            }
        // 1.2. Number from table
            $num_sql = "SELECT * FROM `lot_picture_order` WHERE `cat_id`=$catalog_id AND `lot_id`=$lot_id";
            $num_result = mysqli_query($conn, $num_sql);
            $row = mysqli_fetch_assoc($num_result);
            $table_sequence = $row['sequence'];

            $table_sequence = substr($table_sequence, 2);
            $table_sequence = substr($table_sequence, 0, -2);
            $table_arr = explode("||", $table_sequence);
            $table_num = count($table_arr);

            if($table_num != $given_num){
                echo "error - wrong number 2";
                exit();
            }

    // 2. No duplicates
        $dup_array = array();
        foreach($sequence_arr as $seq_item){
            $in_dup = in_array($seq_item, $dup_array);
            if($in_dup){
                echo "error - not unique";
                exit();
            }
            else{
                array_push($dup_array, $seq_item);
            }
        }
    
    // 3. All integers
        foreach($sequence_arr as $seq_item){
            if(is_numeric($seq_item)){
                // $item = (int)$seq_item;
                // if(!is_int($item)){
                //     echo "error";
                //     return;
                // }
                if($seq_item != (int)$seq_item){
                    echo "error - not integer 1";
                    exit();
                }
            }
            else{
                echo "error - not integer 2";
                exit();
            }

        }
    // 4. Check ownership
        foreach($sequence_arr as $seq_item){
            $seq_item = (int)$seq_item;

            $own_sql = "SELECT * FROM `lot_pictures` WHERE `id`=$seq_item AND `cat_id`=$catalog_id AND `lot_id`=$lot_id";
            $own_result = mysqli_query($conn, $own_sql);
            $own_num = mysqli_num_rows($own_result);

            if($own_num != 1){
                echo "error - picture not owned";
                exit();
            }
        }


    // No Error
    $update_sequence = "||";
    foreach($sequence_arr as $seq_item){
        $update_sequence = $update_sequence . $seq_item . "||";
    }

    $update_sql = "UPDATE `lot_picture_order` SET `sequence` = '$update_sequence' WHERE `cat_id`=$catalog_id AND `lot_id`=$lot_id;";
    mysqli_query($conn, $update_sql);
?>