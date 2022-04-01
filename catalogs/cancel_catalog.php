<?php
    include "../includes/username.php"; 
    include "../includes/connect.php"; 

    if(!isset($_GET['cat_id'])){
        header("location: " . $root . "catalogs/manage.php");
        exit();
    }

    $cat_id = $_GET['cat_id'];

    $sql = "UPDATE `catalog_status` SET `status` = 'cancel', `time` = CURRENT_TIMESTAMP WHERE `catalog_status`.`cat_id` = $cat_id;";

    mysqli_query($conn, $sql);

    header("location: " . $root . "catalogs/manage.php");
?>