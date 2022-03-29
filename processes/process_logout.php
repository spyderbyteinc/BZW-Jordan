<?php
    unset($_COOKIE['username']); 
    setcookie('username', null, -1, '/');
    
    session_start();

    session_destroy();
    unset($_SESSION['username']);

    header("location: ../index.php");
?>