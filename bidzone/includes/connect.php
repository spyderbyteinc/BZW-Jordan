<?php
$servername = "gator3040.hostgator.com";
$user = "jhalaby_bidz";
$password = "nadroJnadroJ99!";
$db = "jhalaby_bidzwon";

// Create connection
$conn = new mysqli($servername, $user, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

mysqli_select_db($conn, $db);
?>