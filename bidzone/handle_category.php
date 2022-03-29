<?php
    include "includes/connect.php";
    $operation = $_POST['operation'];

    if($operation == 'edit'){
        $tier = $_POST['tier_name'];
        $id = $_POST['tier_id'];
    
        if($tier == "tier1"){
            $sql = "SELECT * FROM `cat_tier1` WHERE `id`=$id";
        }
        else if($tier == "tier2"){
            $sql = "SELECT * FROM `cat_tier2` WHERE `id`=$id";
        }
        else if($tier == "tier3"){
            $sql = "SELECT * FROM `cat_tier3` WHERE `id`=$id";
        }
        else if($tier == "tier4"){
            $sql = "SELECT * FROM `cat_tier4` WHERE `id`=$id";
        }
    
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $category_name = $row['name'];
    
        echo $category_name;
    }
    else if($operation == 'save_add_all_tiers'){
        $value = $_POST['value'];
        $level = $_POST['level'];
        $parent = $_POST['parent'];

        $table = 'cat_tier' . $level;

        $sql = "INSERT INTO `$table` (`id`, `name`, `parent`) VALUES (NULL, '$value', '$parent');";
        $result = mysqli_query($conn, $sql);

        echo "done";
        return;
    }
    else if($operation == 'save_edit'){
        $level = $_POST['level'];
        $id = $_POST['tier_id'];
        $value = $_POST['value'];

        $table = 'cat_' . $level;
        $sql = "UPDATE `$table` SET `name` = '$value' WHERE `$table`.`id` = $id;";
        $result = mysqli_query($conn, $sql);

        echo "done";
        return;
    }
    else if($operation == 'save_add_tier1'){
        $value = $_POST['value'];
        $sql = "INSERT INTO `cat_tier1` (`id`, `name`) VALUES (NULL, '$value');";
        $result = mysqli_query($conn, $sql);
        
        echo "done";
        return;
    }
    else if($operation == 'add'){
        $level = $_POST['level'];
        $id = $_POST['tier_id'];

        $output = false;

        if($level == "2" || $level == 2){
            $sql = "SELECT * FROM `cat_tier1` WHERE `id`=$id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $output = $row['name'];
        }
        else if($level == "3" || $level == 3){
            $sql = "SELECT * FROM `cat_tier2` WHERE `id`=$id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $name2 = $row['name'];

            $parent_id = $row['parent'];

            $sql = "SELECT * FROM `cat_tier1` WHERE `id`=$parent_id";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $name1 = $row['name'];


            $output = $name1 . "??||&&" . $name2;
        }
        else if($level == "4" || $level == 4){
            $sql = "SELECT * FROM `cat_tier3` WHERE `id`=$id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $name3 = $row['name'];

            $parent_id = $row['parent'];

            $sql = "SELECT * FROM `cat_tier2` WHERE `id`=$parent_id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $name2 = $row['name'];

            $parent_id = $row['parent'];

            $sql = "SELECT * FROM `cat_tier1` WHERE `id`=$parent_id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $name1 = $row['name'];

            $output = $name1 . "??||&&" . $name2 . "??||&&" . $name3;
        }

        echo $output;
    }
?>