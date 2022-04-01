<?php
    session_start();

    include "../includes/connect.php";

    $username = $_POST['login_username'];
    $password = $_POST['login_password'];
    $password = md5($password);

    $remember = $_POST['remem_checkbox'];

    $location = $_POST['location'];
    $location = strtok($location, "?");

    // Try username & password combination
    $usql = "SELECT * FROM accounts WHERE username = '$username' and password = '$password'";
    $uresult = mysqli_query($conn, $usql);
    $unum = mysqli_num_rows($uresult);

    // Try email & pasword combination
    if($unum == 0){
        $esql = "SELECT * FROM accounts WHERE email = '$username' and password = '$password'";
        $eresult = mysqli_query($conn, $esql);

        $enum = mysqli_num_rows($eresult);

        if($enum == 0){
            $url = "location: " . $location . "?login=0";
            header($url);
        }
        else{
            $url = "location: " . $location . "?login=1";
            
            $erow = mysqli_fetch_assoc($eresult);
            $username = $erow['username'];

            success($username, $remember);
            header($url);
        }
    }
    else{

        $url = "location: " . $location . "?login=2";

        success($username, $remember);
        header($url);
    }

    function success($username, $remember){
        if($remember == 1){
            // Remember - create Cookie
            $cookie_name = "username";
            $cookie_value = $username;

            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        }
        else if($remember == 0){

            // No remember - create Session
            $_SESSION['username'] = $username;
        }
        
    }
    
?>