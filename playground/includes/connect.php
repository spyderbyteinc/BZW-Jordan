<?php
$servername = "localhost";
$user = "root";
$password = "";
$db = "bidzwon";

// Create connection
$conn = new mysqli($servername, $user, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

mysqli_select_db($conn, $db);
?>