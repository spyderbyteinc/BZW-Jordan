<?php include "../includes/connect.php"; ?>
<?php include "../includes/username.php"; ?>
<?php
    if(!isset($_GET['cat_id'])){
        header("location: manage.php?preview=-1");
        exit();
    }

    $id = $_GET['cat_id'];

    $owner_sql = "SELECT * FROM `catalogs` WHERE `id`=$id";
    $owner_result = mysqli_query($conn, $owner_sql);
    $owner_row = mysqli_fetch_assoc($owner_result);
    $owner_name = $owner_row['owner'];

    if($username != $owner_name){
        header("location: manage.php?preview=-1");
        exit();
    }

    if(!isset($_GET['action'])){
        header("location: manage.php?preview=-1");
        exit();
    }
    
    $action = $_GET['action'];

    if($action == "enable"){
        $update_sql = "UPDATE `catalogs` SET `preview` = 1 WHERE `id` = $id;";
    }
    else if($action == "disable"){
        $update_sql = "UPDATE `catalogs` SET `preview` = 0 WHERE `id` = $id;";
    }
    else{
        header("location: manage.php?preview=-1");
        exit();
    }

    mysqli_query($conn, $update_sql);

    header("location: manage.php");
?>