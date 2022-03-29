<?php

    include "includes/connect.php";

    $sql = "SELECT number FROM increment LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $num = $row['number'];
        }
    }

    $new_num = $num + 1;

    $sql = "UPDATE increment SET number='$new_num'";
    $result = $conn->query($sql);
    
    echo "New Number: " . $new_num;

?>