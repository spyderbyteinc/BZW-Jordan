<?php

    session_start();

    $root = "http://localhost/bidzwon/";

    
    include "connect.php";

    $logged_in = false;
    if(isset($_COOKIE['username'])){
        $username = $_COOKIE['username'];
        $logged_in = true;
    }
    else if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $logged_in = true;
    }
    else{
        $username = null;
        $logged_in = false;
    }
?>