<?php
    session_start();

    include "../includes/connect.php";

    if(isset($_POST['username'])){
        $username = $_POST['username'];

        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $confirmation_code = $row['confirmation_code'];

        $entered_code = $_POST['confirm_token'];

        if($confirmation_code == $entered_code){
            $verify_sql = "UPDATE users SET email_verified = 1 WHERE username = '$username'";
            mysqli_query($conn, $verify_sql);
            header("location: ../index.php");
        }
        else{
            header("location: ../email_confirmation.php?error=1");
        }
    }
?>