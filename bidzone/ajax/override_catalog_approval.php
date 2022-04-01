<?php
    include "../includes/connect.php";

    $type = $_POST['type'];
    $username = $_POST['username'];
    $catalog_id = $_POST['catalog_id'];

    $sql = "UPDATE `catalog_registration` SET `status` = '$type' WHERE `cat_id` = $catalog_id AND `user`='$username';";
    mysqli_query($conn, $sql);

    echo 1;
?>