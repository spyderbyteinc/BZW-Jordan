<?php
    include "../includes/username.php";
    
    include "../includes/connect.php"; 

    $cat_id = $_POST['cat_id'];
    $lot_id = $_POST['lot_id'];

    $ret_arr = array();

    // get all data from table and add to array
    $sql = "SELECT * FROM `lots` WHERE `catalog_id`=$cat_id AND `id`=$lot_id AND `owner`='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    $category = $row['category'];

    $category_other = $row['other_category'];
    
    function category_lookup($conn, $category, $category_other){
        $ret = array();

        $categories = explode("-",$category);
        $len = count($categories);

        for($i =0; $i<$len; $i++){
            $tbl_index = $i+1;
            $category_id = $categories[$i];

            if($category_id == 0){
                array_push($ret, $category_other);
                break;
            }

            $table_name = "cat_tier" . $tbl_index;

            $sql = "SELECT * FROM `" . $table_name . "` WHERE `id`=" . $category_id;
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $category_name = $row['name'];
            array_push($ret, $category_name);
        }

        $result = join(" -> ",$ret);
        return $result;
    }


    $category_tree = category_lookup($conn, $category, $category_other);



    // get location
    $location_output = "";
    $location_id = $row['lot_location'];
    $all_locations = array();

    $loc_sql = "SELECT * FROM `catalogs` WHERE `id`=$cat_id AND `owner`='$username'";
    $loc_result = mysqli_query($conn, $loc_sql);
    $loc_row = mysqli_fetch_assoc($loc_result);
    array_push($all_locations, $loc_row['asset_location_1'], $loc_row['asset_location_2'], $loc_row['asset_location_3'], $loc_row['asset_location_4'], $loc_row['asset_location_5']);

    foreach($all_locations as $loc){
        $comps = explode("??||&&", $loc);
        $locid = $comps[0];
        if($locid == $location_id){
            $address1 = $comps[1];
            $address2 = $comps[2];
            $city = $comps[3];
            $state = $comps[4];
            $country = $comps[5];


            if($address2 == -1 || $address2 == "-1"){
                $ret = $address1 . ", " . $city . ", " . $state . ", " . $country;
            }
            else{
                $ret = $address1 . ", " . $address2 . ", " . $city . ", " . $state . ", " . $country;
            }
            $location_output = $ret;

            break;
        }
        else{
            continue;
        }
    }


    // Output ajax data
    $result = array();

    $res_out;
    $reserve = $row['reserve_amount'];
    if($reserve == 0 || $reserve == '0'){
        $res_out = "No";
    }
    else{
        $res_out = "Yes - " . $reserve;
    }

    $r = array($row['name'], $row['description'], $row['starting_bid'], $row['increment_type'], $row['bid_increment'], $location_output, $res_out, $row['featured_lot'], $row['allow_freeze'], $row['times_the_bid'], $row['quantity'], $row['units'], $row['brand'], $row['lot_condition'], $row['size'], $row['weight'], $row['internal_notes'], $row['tags']);


    $result['info'] = $r;
    $result['cats'] = $category_tree;

    
    echo json_encode($result);
?>