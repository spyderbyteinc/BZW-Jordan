<?php
    include "connect.php";
    
    $catalog_id = $_POST['id'];

    $sql = "UPDATE `catalog_status` SET `status` = 'open', `time` = CURRENT_TIMESTAMP WHERE `cat_id` = $catalog_id;";
    $result = mysqli_query($conn, $sql);

    echo $sql;
?>