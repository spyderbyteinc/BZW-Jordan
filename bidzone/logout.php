<?php
    session_start();
    session_destroy();
    unset($_SESSION['staff_user']);

    header("location: index.php");
?>