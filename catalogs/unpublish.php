<?php include "../includes/connect.php"; ?>
<?php include "../includes/username.php"; ?>
<?php
    if(!isset($_GET['id'])){
        header("location: manage.php?unpublish=-1");
        exit();
    }

    $id = $_GET['id'];

    $owner_sql = "SELECT * FROM `catalogs` WHERE `id`=$id";
    $owner_result = mysqli_query($conn, $owner_sql);
    $owner_row = mysqli_fetch_assoc($owner_result);
    $owner_name = $owner_row['owner'];

    if($username != $owner_name){
        header("location: manage.php?unpublish=-1");
        exit();
    }
    
    // clear out tables with these lot ids
    $del_sql = "DELETE FROM `lot_countdown` WHERE `lot_countdown`.`cat_id` = $id AND `username`='$username'";
    mysqli_query($conn, $del_sql);

    $sql = "UPDATE `catalogs` SET `published` = '0' WHERE `id` = $id";
    mysqli_query($conn, $sql);

    $sql = "UPDATE `catalog_status` SET `status` = 'staging' WHERE `cat_id` = $id;";
    mysqli_query($conn, $sql);

    $loc = $root . "catalogs/manage.php";
    header("location: " . $loc);
?>