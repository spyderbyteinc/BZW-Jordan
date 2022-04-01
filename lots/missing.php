<?php

    include "../includes/username.php";

    include "../includes/connect.php";

    $catalog_id = $_GET['cat_id'];
    $location = $_POST['choose_location'];
    foreach($_POST as $x => $x_value) {
        if($x != "choose_location"){
            if($x_value != 0){
                $id = str_replace("lot_id_", "", $x);
                $sql = "UPDATE `lots` SET `lot_location` = '$location' WHERE `lots`.`id` = $id AND `catalog_id` = $catalog_id;";
                $result = mysqli_query($conn, $sql);
            }
        }
    }

    header("location: manage.php?cat_id=" . $catalog_id);
?>