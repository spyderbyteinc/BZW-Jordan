<?php
    include "../includes/username.php";

    include "../includes/connect.php";

    $type = $_POST['type'];

    if($type == "add"){
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $username_entered = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
    
        $password = md5($_POST['password']);
        $question1 = mysqli_real_escape_string($conn, $_POST['question1']);
        $answer1 = mysqli_real_escape_string($conn, $_POST['answer1']);
        $question2 = mysqli_real_escape_string($conn, $_POST['question2']);
        $answer2 = mysqli_real_escape_string($conn, $_POST['answer2']);

        $owner = $username;

        $house_sql = "INSERT INTO `house` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `question1`, `answer1`, `question2`, `answer2`, `owner`) VALUES (NULL, '$username_entered', '$email', '$password', '$first_name', '$last_name', '$question1', '$answer1', '$question2', '$answer2', '$owner');";

        mysqli_query($conn, $house_sql);

        $ip = $_SERVER['REMOTE_ADDR'];

        $account_type = "house";
        $account_sql = "INSERT INTO `accounts` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `type`, `IP_address`) VALUES (NULL, '$username_entered', '$email', '$password', '$first_name', '$last_name', '$account_type','$ip')";

        mysqli_query($conn, $account_sql);

        $draw_sql = "SELECT * FROM `house` WHERE `username`='$username_entered'";
        $draw_result = mysqli_query($conn, $draw_sql);
        $row = mysqli_fetch_assoc($draw_result);

        $id = $row['id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $username_entered = $row['username'];
        $email = $row['email'];

        $output = $id . "??||&&" . $first_name . "??||&&" . $last_name . "??||&&" . $username_entered . "??||&&" . $email;

        echo $output;
    }
    else if($type == "edit"){
        $first_name = mysqli_real_escape_string($conn, $_POST['edit_first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['edit_last_name']);
        $username_entered = mysqli_real_escape_string($conn, $_POST['edit_username']);
        $email = mysqli_real_escape_string($conn, $_POST['edit_email']);
        $id = $_POST['edit_id'];
        
        $sql = "SELECT * FROM `house` WHERE `id` = $id;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $owner = $row['owner'];

        if($username != $owner){
            return;
        }
        $orig_username = $_POST['original_username'];

        $house_update_sql = "UPDATE `house` SET `email` = '$email', `username` = '$username_entered', `first_name` = '$first_name', `last_name` = '$last_name' WHERE `house`.`id` = $id;";
        mysqli_query($conn, $house_update_sql);

        $ip = $_SERVER['REMOTE_ADDR'];

        $account_update_sql = "UPDATE `accounts` SET `username` = '$username_entered', `email` = '$email', `first_name`= '$first_name', `last_name`='$last_name',`IP_address`='$ip' WHERE `accounts`.`username` = '$orig_username';";
        mysqli_query($conn, $account_update_sql);
        
        $output = $id . "??||&&" . $first_name . "??||&&" . $last_name . "??||&&" . $username_entered . "??||&&" . $email;

        echo $output;
    }
    else if($type == "delete"){

        $id = $_POST['id'];

        $sql = "SELECT * FROM `house` WHERE `id`=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $username_ent = $row['username'];

        $delete_house = "DELETE FROM `house` WHERE `username`='$username_ent'";
        mysqli_query($conn, $delete_house);

        $delete_account = "DELETE FROM `accounts` WHERE `username`='$username_ent'";
        mysqli_query($conn, $delete_account);


        $delete_id = $id;

        // delete id from catalog house list
        $house_list_sql = "SELECT * FROM `catalogs`";
        $house_list_result = mysqli_query($conn, $house_list_sql);
        while($row = mysqli_fetch_assoc($house_list_result)){
            $id = $row['id'];
            $house_list = $row['house_list'];

            $delete_str = "||" . $delete_id . "||";

            if (strpos($house_list, $delete_str) !== false) {

                $sql = "SELECT * FROM `catalogs` WHERE `house_list`='$house_list'";
                $res = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($res);
                $idd = $row['id'];

                $replaced = str_replace($delete_str, "||", $house_list);

                $rep_sql = "UPDATE `catalogs` SET `house_list` = '$replaced' WHERE `catalogs`.`id` = $idd;";

                mysqli_query($conn, $rep_sql);
            }
        }
    }

?>