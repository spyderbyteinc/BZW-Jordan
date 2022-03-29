<?php
    include "../includes/connect.php";
    include "../includes/username.php";
    include "../helpers/date_conversion.php";

    $id = $_POST['id'];
    $type = $_POST['type'];

    function getLocationDets($id){
        include "../includes/connect.php";
        include "../includes/username.php";

        $locs = array();

        $sql = "SELECT * FROM `catalogs` WHERE `id`=$id AND `owner`='$username'";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $cols = array("asset_location_1", "asset_location_2", "asset_location_3", "asset_location_4", "asset_location_5");

        foreach($cols as $col){
            $temp = $row[$col];

            if($temp != "-1"){
                $locs[$col] = $temp;
            }
        }

        return $locs;
    }
    
    function locationString($string){
        $comps = explode("??||&&", $string);

        $id = $comps[0];
        $address1 = $comps[1];
        $address2 = $comps[2];
        $city = $comps[3];
        $state = $comps[4];
        $country = $comps[5];

        $output = "";

        if($address2 == -1){
            $output = $address1 . ", " . $city . ", " . $state . ", " . $country;
        }
        else{
            $output = $address1 .  ", " . $address2 . ", " . $city . ", " . $state . ", " . $country;
        }

        return $output;
    }
    function idToLocation($cat_id, $loc_id){
        $locs = getLocationDets($cat_id);
        
        $cols = array("asset_location_1", "asset_location_2", "asset_location_3", "asset_location_4", "asset_location_5");

        foreach($cols as $col){
            if(array_key_exists($col, $locs)){
                $temp = $locs[$col];
                
                $comps = explode("??||&&", $temp);

                $id = $comps[0];

                if($id == $loc_id){
                    return $temp;
                    exit();
                }
            }
        }
        echo "done";
    }
    if($type == "contact"){
        $ret = array();
        $cons = array();

        $sql = "SELECT * FROM `catalogs` WHERE `id`=$id AND `owner`='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $cols = array("contact_1", "contact_2", "contact_3", "contact_4", "contact_5", "contact_6", "contact_7", "contact_8", "contact_9", "contact_10");

        foreach($cols as $col){
            $temp = $row[$col];

            if($temp != "-1"){
                $cons[$col] = $temp;
            }
        }

        $locs = getLocationDets($id);

        $ret['contacts'] = $cons;
        $ret['locations'] = $locs;

        echo json_encode($ret);
    }
    else if($type == "inspection"){
        $ret = array();
        $ins = array();

        $sql = "SELECT * FROM `catalogs` WHERE `id`=$id AND `owner`='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $cols = array("inspection_1", "inspection_2", "inspection_3", "inspection_4", "inspection_5", "inspection_6", "inspection_7", "inspection_8", "inspection_9", "inspection_10");

        foreach($cols as $col){
            $temp = $row[$col];

            if($temp != "-1"){
                $ins[$col] = $temp;
            }
        }

        $locs = getLocationDets($id);

        $ret['inspection'] = $ins;
        $ret['locations'] = $locs;

        echo json_encode($ret);
    }
    else if($type == "location"){
        $ret = array();

        $sql = "SELECT * FROM `catalogs` WHERE `id`=$id AND `owner`='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $cols = array("asset_location_1", "asset_location_2", "asset_location_3", "asset_location_4", "asset_location_5");

        foreach($cols as $col){
            $temp = $row[$col];

            if($temp != "-1"){
                array_push($ret, $temp);
            }
        }

        echo json_encode($ret);
    }
    else if($type == "save_contact"){
        $id = $_POST['cat_id'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $location = $_POST['location'];

        $sql = "SELECT * FROM `catalogs` WHERE `id`=$id AND `owner`='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        
        $cols = array("contact_1", "contact_2", "contact_3", "contact_4", "contact_5", "contact_6", "contact_7", "contact_8", "contact_9", "contact_10");

        $next_col = "";
        $highest_index = 0;
        foreach($cols as $col){
            $temp = $row[$col];

            if($temp == "-1"){
                $next_col = $col;
                break;
            }

        }

        foreach($cols as $col){
            $temp = $row[$col];

            if($temp != "-1"){
                $comps = explode("??||&&", $temp);
                $next_id = $comps[0];
                if($next_id > $highest_index){
                    $highest_index = $next_id;
                }
            }
        }
        $highest_index++;
        // loop through table entry for last contact column

        $record = $highest_index . "??||&&" . $name . "??||&&" . $phone . "??||&&" . $location;

        $sql = "UPDATE `catalogs` SET `$next_col` = '$record' WHERE `catalogs`.`id` = $id AND `owner`='$username'";
        mysqli_query($conn, $sql);
        
        $loc = idToLocation($id, $location);

        $location_string = locationString($loc);
        echo $location_string . "??||&&" . $highest_index;
    }
    else if($type == "save_inspect"){
        $id = $_POST['cat_id'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];
        $location = $_POST['location'];

        if($end_date == ""){
            $end_date = "-1";
        }
        $sql = "SELECT * FROM `catalogs` WHERE `id`=$id AND `owner`='$username'";
        
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $cols = array("inspection_1", "inspection_2", "inspection_3", "inspection_4", "inspection_5", "inspection_6", "inspection_7", "inspection_8", "inspection_9", "inspection_10");
        $next_col = "";
        $highest_index = 0;
        foreach($cols as $col){
            $temp = $row[$col];

            if($temp == "-1"){
                $next_col = $col;
                break;
            }

        }

        foreach($cols as $col){
            $temp = $row[$col];

            if($temp != "-1"){
                $comps = explode("??||&&", $temp);
                $next_id = $comps[0];
                if($next_id > $highest_index){
                    $highest_index = $next_id;
                }
            }
        }
        $highest_index++;


        $record = $highest_index . "??||&&" . $start_date . "??||&&" . $end_date . "??||&&" . $start_time . "??||&&" . $end_time . "??||&&" . $location;

        $sql = "UPDATE `catalogs` SET `$next_col` = '$record' WHERE `catalogs`.`id` = $id AND `owner`='$username'";
        mysqli_query($conn, $sql);
        
        $loc = idToLocation($id, $location);

        $location_string = locationString($loc);
        echo $location_string . "??||&&" . $highest_index;
    }
    else if($type == "inspect_number"){
        $cat_id = $_POST['cat_id'];

        $sql = "SELECT * FROM `catalogs` WHERE `id`=$cat_id AND `owner`='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $cols = array("inspection_1", "inspection_2", "inspection_3", "inspection_4", "inspection_5", "inspection_6", "inspection_7", "inspection_8", "inspection_9", "inspection_10");

        $num = 0;
        foreach($cols as $col){
            $curr = $row[$col];

            if($curr != "-1"){
                $num++;
            }
        }

        echo $num;
    }
    else if($type == "contact_number"){
        $cat_id = $_POST['cat_id'];

        $sql = "SELECT * FROM `catalogs` WHERE `id`=$cat_id AND `owner`='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $cols = array("contact_1", "contact_2", "contact_3", "contact_4", "contact_5", "contact_6", "contact_7", "contact_8", "contact_9", "contact_10");

        $num = 0;
        foreach($cols as $col){
            $curr = $row[$col];

            if($curr != "-1"){
                $num++;
            }
        }

        echo $num;
    }
    else if($type == "delete_inspection"){
        // doesn't actually delete a row, just a column of data
        $del_id = $_POST['del_id'];
        $cat_id = $_POST['cat_id'];

        // loop through to find deletable column
        $sql = "SELECT * FROM `catalogs` WHERE `id`=$cat_id AND `owner`='$username'";	
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $cols = array("inspection_1", "inspection_2", "inspection_3", "inspection_4", "inspection_5", "inspection_6", "inspection_7", "inspection_8", "inspection_9", "inspection_10");

        $update_col = "";

        foreach($cols as $col){
            $curr = $row[$col];

            $comps = explode("??||&&", $curr);

            $curr_id = $comps[0];

            if($curr_id == $del_id){
                $update_col = $col;
            }
        }

        $sql = "UPDATE `catalogs` SET `$update_col` = '-1' WHERE `catalogs`.`id` = $cat_id;";
        mysqli_query($conn, $sql);

        echo "delete_inspection_" . $del_id;
    }
    else if($type == "delete_contact"){
        // doesn't actually delete a row, just a column of data
        $del_id = $_POST['del_id'];
        $cat_id = $_POST['cat_id'];

        // loop through to find deletable column
        $sql = "SELECT * FROM `catalogs` WHERE `id`=$cat_id AND `owner`='$username'";	
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $cols = array("contact_1", "contact_2", "contact_3", "contact_4", "contact_5", "contact_6", "contact_7", "contact_8", "contact_9", "contact_10");

        $update_col = "";

        foreach($cols as $col){
            $curr = $row[$col];

            $comps = explode("??||&&", $curr);

            $curr_id = $comps[0];

            if($curr_id == $del_id){
                $update_col = $col;
            }
        }

        $sql = "UPDATE `catalogs` SET `$update_col` = '-1' WHERE `catalogs`.`id` = $cat_id;";
        mysqli_query($conn, $sql);

        echo "delete_contact_" . $del_id;
    }
    else if($type == "specific_inspection"){
        $cat_id = $_POST['cat_id'];
        $mod_id = $_POST['mod_id'];

        
        $sql = "SELECT * FROM `catalogs` WHERE `id`=$cat_id AND `owner`='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $cols = array("inspection_1", "inspection_2", "inspection_3", "inspection_4", "inspection_5", "inspection_6", "inspection_7", "inspection_8", "inspection_9", "inspection_10");

        $mod_col = "";

        foreach($cols as $col){
            $temp = $row[$col];

            $comps = explode("??||&&", $temp);

            $id = $comps[0];

            if($mod_id == $id){
                $mod_col = $col;
                break;
            }
        }

        $data = $row[$mod_col];

        echo json_encode($data);
    }
    else if($type == "specific_contact"){
        $cat_id = $_POST['cat_id'];
        $mod_id = $_POST['mod_id'];

        $sql = "SELECT * FROM `catalogs` WHERE `id`=$cat_id AND `owner`='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $cols = array("contact_1", "contact_2", "contact_3", "contact_4", "contact_5", "contact_6", "contact_7", "contact_8", "contact_9", "contact_10");

        $mod_col = "";

        foreach($cols as $col){
            $temp = $row[$col];

            $comps = explode("??||&&", $temp);

            $id = $comps[0];

            if($mod_id == $id){
                $mod_col = $col;
                break;
            }
        }

        $data = $row[$mod_col];

        echo json_encode($data);
    }
    else if($type == "update_inspection"){
        $cat_id = $_POST['cat_id'];
        $mod_id = $_POST['mod_id'];
        $out = $_POST['out'];

        $sql = "SELECT * FROM `catalogs` WHERE `id`=$cat_id AND `owner`='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $cols = array("inspection_1", "inspection_2", "inspection_3", "inspection_4", "inspection_5", "inspection_6", "inspection_7", "inspection_8", "inspection_9", "inspection_10");

        $mod_col = "";

        foreach($cols as $col){
            $temp = $row[$col];

            $comps = explode("??||&&", $temp);

            $id = $comps[0];

            if($mod_id == $id){
                $mod_col = $col;
                break;
            }
        }

        $usql = "UPDATE `catalogs` SET `$mod_col` = '$out' WHERE `catalogs`.`id` = $cat_id;";
        mysqli_query($conn, $usql);
        echo json_encode("done");
    }
    else if($type == "update_contact"){
        $cat_id = $_POST['cat_id'];
        $mod_id = $_POST['mod_id'];
        $out = $_POST['out'];

        $sql = "SELECT * FROM `catalogs` WHERE `id`=$cat_id AND `owner`='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $cols = array("contact_1", "contact_2", "contact_3", "contact_4", "contact_5", "contact_6", "contact_7", "contact_8", "contact_9", "contact_10");

        $mod_col = "";

        foreach($cols as $col){
            $temp = $row[$col];

            $comps = explode("??||&&", $temp);

            $id = $comps[0];

            if($mod_id == $id){
                $mod_col = $col;
                break;
            }
        }

        $usql = "UPDATE `catalogs` SET `$mod_col` = '$out' WHERE `catalogs`.`id` = $cat_id;";
        mysqli_query($conn, $usql);
        echo json_encode("done");
    }
?>