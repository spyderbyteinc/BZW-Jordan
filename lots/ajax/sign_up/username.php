<?php
    include "../connect.php";

    $username = $_POST['username'];

    $sql = "SELECT * FROM accounts WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    echo mysqli_num_rows($result);
?>