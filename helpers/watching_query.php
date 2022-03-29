<?php

    include "../includes/connect.php";

    $status = $_POST['status'];
    $catalog_id = $_POST['catalog_id'];
    $lot_id = $_POST['lot_id'];
    $username = $_POST['username'];

    if($status == "on"){
        $sql = "SELECT * FROM `watching` WHERE `catalog_id`= $catalog_id AND `lot_id`=$lot_id AND `username`= '$username'";
        $result = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($result);

        if($num_rows >= 1){
            echo "on_failure";
            exit();
        }

        $sql = "INSERT INTO `watching` (`id`, `catalog_id`, `lot_id`, `username`) VALUES (NULL, '$catalog_id', '$lot_id', '$username');";
        mysqli_query($conn, $sql);

        echo "on_success";
    }
    else if($status == "off"){
        $sql = "DELETE FROM `watching` WHERE `catalog_id`=$catalog_id AND `lot_id`=$lot_id AND `username`= '$username'";
        mysqli_query($conn, $sql);

        echo "off_success";
    }
?>