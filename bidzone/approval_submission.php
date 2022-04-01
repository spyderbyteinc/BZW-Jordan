<?php
    if(!isset($_GET['approval']) || !isset($_GET['id'])){
        header("location: seller_approval.php");
    }
    include "includes/connect.php";

    $id = $_GET['id'];
    $approval = $_GET['approval'];
    if($approval == "true"){
        $approval = true;
    }
    else if($approval == "false"){
        $approval = false;
    }
    else{
        header("location: seller_approval.php");
    }

    $get_id = "SELECT * FROM `users` WHERE `id`=$id AND `seller`=1 AND `seller_auth`=0";
    $get_result = mysqli_query($conn, $get_id);
    if(mysqli_num_rows($get_result) != 1){
        header("location: seller_approval.php");
    }

    // Approving seller
    if($approval){
        $sql = "UPDATE `users` SET `seller_auth` = '1' WHERE `users`.`id` = $id";
    }
    // Denying seller
    else if(!$approval){
        $sql = "UPDATE `users` SET `seller_auth` = '-1' WHERE `users`.`id` = $id";
    }
    else{
        header("location: seller_approval.php");
    }

    mysqli_query($conn, $sql);

    header("location: seller_approval.php");
    
?>