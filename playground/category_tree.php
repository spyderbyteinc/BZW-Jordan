<?php

    include "includes/connect.php";

    $tier1_sql = "SELECT * FROM cat_tier1";
    $tier1_result = mysqli_query($conn, $tier1_sql);
    while($tier1_row = mysqli_fetch_assoc($tier1_result)){
        $tier1_name = $tier1_row['name'];
        $tier1_id = $tier1_row['id'];

        echo $tier1_name;

        echo "<br>";

        $tier2_sql = "SELECT * FROM cat_tier2 WHERE parent=$tier1_id";
        $tier2_result = mysqli_query($conn, $tier2_sql);
        while($tier2_row = mysqli_fetch_assoc($tier2_result)){
            $tier2_name = $tier2_row['name'];
            $tier2_id = $tier2_row['id'];

            echo "&rarr;" . $tier2_name;

            echo "<br>";

            $tier3_sql = "SELECT * FROM cat_tier3 WHERE parent=$tier2_id";
            $tier3_result = mysqli_query($conn, $tier3_sql);
            while($tier3_row = mysqli_fetch_assoc($tier3_result)){
                $tier3_name = $tier3_row['name'];
                $tier3_id = $tier3_row['id'];

                echo "&rarr; &rarr;" . $tier3_name;

                echo "<br>";

                $tier4_sql = "SELECT * FROM cat_tier4 WHERE parent=$tier3_id";
                $tier4_result = mysqli_query($conn, $tier4_sql);
                while($tier4_row = mysqli_fetch_assoc($tier4_result)){
                    $tier4_name = $tier4_row['name'];

                    echo "&rarr; &rarr; &rarr;" . $tier4_name;

                    echo "<br>";
                }
            }
        }
    }
?>