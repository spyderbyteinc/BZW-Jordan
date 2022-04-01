<?php
    if(!isset($_GET['id']) | $_GET['id'] == ""){
        header("location: bugs.php");
        exit();
    }
    else{
        $id = $_GET['id'];
    }

    include "includes/connect.php";

    $sql = "SELECT * FROM `bugs` WHERE `id`=$id";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if($num == 0){
        header("location: bugs.php");
        exit();
    }

    $row = mysqli_fetch_assoc($result);

    $done = $row['done'];

    if($done == 1){
        $sql = "UPDATE `bugs` SET `done` = '0' WHERE `bugs`.`id` = $id;";
    }
    else if($done == 0){
        $sql = "UPDATE `bugs` SET `done` = '1' WHERE `bugs`.`id` = $id;";
    }
    else{
        $sql = "UPDATE `bugs` SET `done` = '-1' WHERE `bugs`.`id` = $id;";
    }

    mysqli_query($conn, $sql);

    header("location: bugs.php");
    exit();
?>