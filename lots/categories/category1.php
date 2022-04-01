<?php
    include "../../includes/connect.php";

    $id = $_POST['id'];
    $name = $_POST['name'];

    $sql = "SELECT * FROM `cat_tier2` WHERE `parent`='$id'";
    $result = mysqli_query($conn, $sql);
    $options = "";

    $num = mysqli_num_rows($result);

    if($num == 0){
        echo -1;
        return;
    }
    while($row = mysqli_fetch_assoc($result)){
        $cur_name = $name . "-" . $row['id'];

        $next_id = $row['id'];
        $next_text = $row['name'];
        $cur_option = "<option value='$next_id' name='$cur_name'>$next_text</option>";

        $options = $options . $cur_option;
    }

    $other = "<option value='0' name='" . $name . "-0'>Other</option>";

    $options = $options . $other;
    echo $options;
?>