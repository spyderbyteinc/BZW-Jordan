<?php 
    include("includes/connect.php");

    session_start();

    $type =  mysqli_real_escape_string($conn, $_POST['type']);

    if($type == "answers"){
        // Get username from session
        $name = $_SESSION['forgotten_username'];
        // Account type
        $account_type = $_SESSION['account_type'];
        // get post variables
        $answer1 = mysqli_real_escape_string($conn, $_POST['answer1']);
        $answer2 = mysqli_real_escape_string($conn, $_POST['answer2']);


        if($account_type == "buyer" || $account_type == "seller"){
            $sql = "SELECT * FROM `users` WHERE `username`='$name' AND `answer1`='$answer1' AND `answer2`='$answer2'";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if($num == 1){
                echo "good";
            }
            else{
                echo "bad";
            }
            return;
        }
        else if($account_type == "house"){
            $sql = "SELECT * FROM `users` WHERE `username`='$name' AND `answer1`='$answer1' AND `answer2`='$answer2'";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if($num == 1){
                echo "good";
            }
            else{
                echo "bad";
            }
            return;
        }
    }
    else if($type == "questions"){
        $q1 = mysqli_real_escape_string($conn, $_POST['question1']);
        $q2 = mysqli_real_escape_string($conn, $_POST['question2']);

        // Get question text - 1
        $sql = "SELECT * FROM `security_question1` WHERE `id`='$q1'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $question1 = $row['question'];

        // Get question text - 2
        $sql = "SELECT * FROM `security_question2` WHERE `id`='$q2'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $question2 = $row['question'];

        echo $question1 . "||??&&" . $question2;
    }
    else if($type == "username"){
        $username =  mysqli_real_escape_string($conn, $_POST['username']);
        
        // Get account type - house, seller, or buyer
        $act_type = "none";
        $act_valid = false;

        $uname = $username;

        $username_sql = "SELECT * FROM `accounts` WHERE `username` = '$username'";
        $username_result = mysqli_query($conn, $username_sql);
        $rowu = mysqli_fetch_assoc($username_result);
        $num = mysqli_num_rows($username_result);
        if($num == 1){
            $act_type = $rowu['type'];
            $act_valid = true;
        }
        else{
            $email_sql = "SELECT * FROM `accounts` WHERE `email` = '$username'";
            $email_result = mysqli_query($conn, $email_sql);
            $email_row = mysqli_fetch_assoc($email_result);
            $email_num = mysqli_num_rows($email_result);

            if($email_num == 1){
                $act_type = $email_row['type'];
                $act_valid = true;

                $uname = $email_row['username'];
            }
        }

        if(!$act_valid){
            echo "no_match";
        }
        else{

            $nums = getQuestions($uname, $act_type, $conn);

            echo $act_type . "??||" . $uname . "||??&&" . $nums;

            $_SESSION['forgotten_username'] = $uname;
            $_SESSION['account_type'] = $act_type;
        }
    }


    // Get index of security questions
    function getQuestions($username, $type, $conn){
        if($type == "house"){
            $sql = "SELECT * FROM `house` WHERE `username`='$username'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $questions = $row['question1'] . "=" . $row['question2'];
            return $questions;
        }
        else{
            $sql = "SELECT * FROM `users` WHERE `username`='$username'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $questions = $row['question1'] . "=" . $row['question2'];
            return $questions;
        }
    }
?>