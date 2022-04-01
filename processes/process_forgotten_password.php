<?php
    // This is used to change the users password
    // first we will do a sanity check, then change password    
    session_start();

    include "../includes/connect.php";

    // Get variables
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $username2 = mysqli_real_escape_string($conn, $_POST['username_placeholder']);
    $username3 = $_SESSION['forgotten_username'];

    $account_type = $_SESSION['account_type'];
    
    $answer1 = mysqli_real_escape_string($conn, $_POST['answer1']);
    $answer2 = mysqli_real_escape_string($conn, $_POST['answer2']);
    
    $password = mysqli_real_escape_string($conn,  $_POST['password']);
    $confirm = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    $valid = true;
    


    // Check that passwords match
    if($password != $confirm){
        $valid = false;
    }

    // Check that the answers are correct
    if($account_type == "buyer" || $account_type == "seller"){
        $sql = "SELECT * FROM `users` WHERE (`username`='$username' OR `email`='$username') AND `answer1`='$answer1' AND `answer2`='$answer2'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num != 1){
            $valid = false;
        }
    }
    else if($account_type == "house"){
        $sql = "SELECT * FROM `users` WHERE (`username`='$username' OR `email`='$username') AND `answer1`='$answer1' AND `answer2`='$answer2'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num != 1){
            $valid = false;
        }
    }

    if($valid){

        $new_password = md5($password);

        // Change passwords
            // Change account table
            $acct_sql = "UPDATE `accounts` SET `password` = '$new_password' WHERE `accounts`.`username` = '$username' OR `email`='$username'";
            $result = mysqli_query($conn, $acct_sql);

        if($account_type == "house"){
            $house_sql = "UPDATE `house` SET `password` = '$new_password' WHERE `house`.`username` = '$username' OR `email`='$username';";
            $result = mysqli_query($conn, $house_sql);
        }
        else{
            $user_sql = "UPDATE `users` SET `password` = '$new_password' WHERE `users`.`username` = '$username' OR `email`='$username'";
            $result = mysqli_query($conn, $user_sql);
        }

        $loc = $root . "index.php?forgotten=good";
        header("location: " . $loc);
        exit();
    }
    else{
        $loc = $root . "forgotten_pass.php?forgotten=bad";
        header("location: " . $loc);
        exit();
    }
?>