<?php
    include "../connect.php";

    $email = $_POST['email'];

    $sql = "SELECT * FROM accounts WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    echo mysqli_num_rows($result);
?>