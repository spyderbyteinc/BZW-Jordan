<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "bidzwon";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

mysqli_select_db($conn, $db);
?>