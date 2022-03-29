<?php
    session_start();


    include "connect.php"; 

    $root = "https://bidzwon.com/dev/";

    if(!isset($_SESSION['staff_user'])){
        header("location: login.php");
    }
    else{
        $staff_user = $_SESSION['staff_user'];
    }


    $sql = "SELECT * FROM `staff` WHERE `username`='$staff_user'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];

    
    
    $filename = basename($_SERVER["SCRIPT_FILENAME"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="all.css">
    <link rel="stylesheet" href="boot.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="buttons.css">

    <!-- <script src="all.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Document</title>
</head>

<body>
    <header id="header">
        <div id="dashboard_nav">
            <div id="navContent">
                <ul id="navlinks">
                    <li><a href="#" class="active">Dashboard - BidZWon</a></li>
                </ul>

                <ul id="accountlinks">
                    <li>
                        <a href="#">
                            <i class="fas fa-user"></i>
                            <span class="head_link">Welcome, <?php echo $staff_user; ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <i class="fas fa-user-times"></i>
                            <span class="head_link">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div id="dashboard_logo">
            <div id="logo_content">
                <img class="logo" src="logo6.png" alt="Logo">
                <h1>Welcome, <?php echo $name; ?></h1>
            </div>
        </div>
    </header>
    <div id="bottom">
        <div id="sidebar">

            <div id="sidebarContent">
                <ul id="navlinks2">
                    <?php if($filename == "index.php") : ?>
                    <li class="nav active">
                    <?php else : ?>
                    <li class="nav">
                    <?php endif ; ?>
                        <a class="navlin" href="index.php">
                            <i class="fas fa-home"></i>
                            <span class="side_link">Home</span>
                        </a>
                    </li>
                    <?php if($filename == "bugs.php" || $filename == "view_bug.php") : ?>
                    <li class="nav active">
                    <?php else : ?>
                    <li class="nav">
                    <?php endif ; ?>
                        <a class="navlin" href="bugs.php">
                            <i class="fas fa-bug"></i>
                            <span class="side_link">Bug Tracker</span>
                        </a>
                    </li>
                    <?php if($filename == "category_tree.php") : ?>
                    <li class="nav active">
                    <?php else : ?>
                    <li class="nav ">
                    <?php endif ; ?>
                        <a class="navlin" href="category_tree.php">
                            <i class="fas fa-project-diagram"></i>
                            <span class="side_link">Category Tree</span>
                        </a>
                    </li>
                    <?php if($filename == "seller_approval.php" || $filename == "seller_record.php") : ?>
                    <li class="nav active">
                    <?php else : ?>
                    <li class="nav ">
                    <?php endif ; ?>
                        <a class="navlin" href="seller_approval.php">
                            <i class="fas fa-user-check"></i>
                            <span class="side_link">Seller Approval</span>
                        </a>
                    </li>
                    <?php if($filename == "all_users.php" || $filename == "user_record.php") : ?>
                    <li class="nav active">
                    <?php else : ?>
                    <li class="nav ">
                    <?php endif ; ?>
                        <a class="navlin" href="all_users.php">
                            <i class="fas fa-users"></i>
                            <span class="side_link">All Users</span>
                        </a>
                    </li>
                    <?php if($filename == "calculator.php" || $filename == "calculator.php") : ?>
                    <li class="nav active">
                    <?php else : ?>
                    <li class="nav ">
                    <?php endif ; ?>
                        <a class="navlin" href="calculator.php">
                            <i class="fas fa-calculator"></i>   
                            <span class="side_link">Calculator</span>
                        </a>
                    </li>
                    <?php if($filename == "catalog_registration_override.php") : ?>
                    <li class="nav active">
                    <?php else : ?>
                    <li class="nav ">
                    <?php endif ; ?>
                        <a class="navlin" href="catalog_registration_override.php">
                            <i class="far fa-clipboard" aria-hidden="true"></i>
                            <span class="side_link">Catalog Registration Override</span>
                        </a>
                    </li>
                </ul>
            </div>



        </div>