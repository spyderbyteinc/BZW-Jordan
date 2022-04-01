<?php
    include "../includes/connect.php";

    $type = $_POST['type'];
    $id = $_POST['id'];

    if($type == "catalog"){
        $amount = $_POST['amount'];

        if($amount == "multiple"){
            $output = array();

            $sql = "SELECT * FROM `catalogs` WHERE `id`=$id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            for($a = 1; $a<=5; $a++){
                $col = "asset_location_" . $a;
                $curr = $row[$col];

                if($curr != "-1" && $curr != -1){
                    array_push($output, $curr);
                }
            }

            echo json_encode($output);
            exit();
        }
        else if($amount == "single"){
            $output = array();

            $sql = "SELECT * FROM `catalogs` WHERE `id`=$id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            $loc = $row['asset_location_1'];

            array_push($output, $loc);
            
            echo json_encode($output);
            exit();
        }
        else{
            echo "-1";
            exit();
        }
    }
    else if($type == "lot"){

    }
    else{
        echo "-1";
        exit();
    }
?>