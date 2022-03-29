<?php
    $type = $_POST['type'];
    $amount = $_POST['amount'];
    $id = $_POST['id'];

    if($type == "catalog"){
        if($amount == "multiple"){
            echo "catalog __ multiple";
        }
        else if($amount == "single"){
            echo "catalog __ single";
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