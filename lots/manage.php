<?php
    session_start();


    

    if(!isset($_GET['cat_id']) || $_GET['cat_id'] == ""){
        header("location: ../catalogs/manage.php");
        exit();
    }
    else{

        $_SESSION['lot_catalog'] = $_GET['cat_id'];

        if(!isset($_SESSION['lot_catalog'])){
            $loc = "location: " . $root . "catalogs/manage.php";
            header($loc);
            exit();
        }
    }

    
    $catalog_id = $_GET['cat_id'];

?>
<?php include "../includes/username.php"; ?>
<?php include "../includes/connect.php"; ?>
<?php
    if($username == "" || !isset($username)){
        header("location: ../index.php");
        exit();
    }

    if($_GET['result'] == "true"){
        ?>
        <script>
            alert("Successfully deleted lot");
            window.location.href = "manage.php?cat_id=" + <?php echo $catalog_id; ?>;
        </script>
        <?php
    }
    else if(isset($_GET['del'])){
        ?>
        <script>
            alert("Failure to delete lot");
            window.location.href = "manage.php?cat_id=" + <?php echo $catalog_id; ?>;
        </script>
        <?php
    }

    if(isset($_GET['update_success'])){
        if($_GET['update_success'] == 1){  
        ?>
            <script>
                alert("Successfully updated lot");
            window.location.href = "manage.php?cat_id=" + <?php echo $catalog_id; ?>;
            </script>
            <?php
        }
    }

    $catalog_id = $_GET['cat_id'];


    $sql = "SELECT * FROM `catalogs` WHERE `id`=$catalog_id AND `owner`='$username'";
    $result = mysqli_query($conn, $sql);
    
    $num_rows = mysqli_num_rows($result);



    $catalog_locations = array();

    if($num_rows == 0){
        header("location: ../index.php");
        exit();
    }
    else{
        $_SESSION['lot_catalog'] = $catalog_id;
        $catalog_row = mysqli_fetch_assoc($result);

        
        if($catalog_row['published'] == 1 || $catalog_row['published'] == "1"){
            header("location: manage.php");
            exit();
        }
        
        $catalog_name = $catalog_row['catalog_name'];



        $lot_1 = $catalog_row['asset_location_1'];
        $lot_2 = $catalog_row['asset_location_2'];
        $lot_3 = $catalog_row['asset_location_3'];
        $lot_4 = $catalog_row['asset_location_4'];
        $lot_5 = $catalog_row['asset_location_5'];

        array_push($catalog_locations, $lot_1, $lot_2, $lot_3, $lot_4, $lot_5);
    }
    


    $lot_sql = "SELECT * FROM `lots` WHERE `catalog_id`=$catalog_id AND `status`<>'cancel'";
    $lot_result = mysqli_query($conn, $lot_sql);
    
    $ids = array();
    $names = array();
    $descriptions = array();
    $categories = array();
    $category_others = array();
    $locations = array();

    while($lot_row = mysqli_fetch_assoc($lot_result)){
        $id = $lot_row['id'];
        $lot_id = $lot_row['id'];

        $name = $lot_row['name'];
        $description = $lot_row['description'];
        $category = $lot_row['category'];
        $category_other = $lot_row['other_category'];
        $location = $lot_row['lot_location'];

        array_push($ids, $id);
        array_push($names, $name);
        array_push($descriptions, $description);
        array_push($categories, $category);
        array_push($category_others, $category_other);
        array_push($locations, $location);
    }

    
    // determine which lots are missing a location
    $lot_discrepancy = false;
    $asset_locations = array();
    $missing_lots_id = array();
    $missing_lots_name = array();
    $missing_lots_desc = array();
    foreach($catalog_locations as $loc){
        // get id
        $loc_comps = explode("??||&&", $loc);
        $loc_id = $loc_comps[0];
        array_push($asset_locations, $loc_id);
    }

    for($v = 0; $v < count($locations); $v++){
        $id = $ids[$v];
        $name = $names[$v];
        $desc = $descriptions[$v];
        $loc = $locations[$v];
        
        if(in_array($loc, $asset_locations)){
            // do nothing
        }
        else{
            $lot_discrepancy = true;
            array_push($missing_lots_id, $id);
            array_push($missing_lots_name, $name);
            array_push($missing_lots_desc, $desc);
        }
    }
?>

<?php

    $temp_catalog_id = $catalog_id;

    $temp_catalog_name = $catalog_name;
?>
<?php include "../includes/header.php"; ?>

<?php
    include_once "../helpers/date_conversion.php";
?>
<?php
    $catalog_id = $temp_catalog_id;
    
    $catalog_name = $temp_catalog_name;
?>
<div id="missing_locations_modal_container" class="modal_bg">
    <div class="modal_content copy_lot_modal modal">
        
        <h2 class="copy_heading section_heading"><span>Missing Locations - Quick Fix</span></h2>

        <div class="catalog_row signup_row operations">
            <div class="col1 buttons">
                <a href="#" class="bidzbutton orange no_margin" id="close_missing_locations">Cancel</a>
            </div>
        </div>

        
        <form action="missing.php?cat_id=<?php echo $catalog_id; ?>" id="missing_form" method="post">
            <div id="choose_mass_locations">
                <div class="catalog_row signup_row">
                    <div class="col1">
                        <div class="signup_group">
                            <label for="choose_location" class="input_label">Choose Location</label>
                            <select class="input_text input_select" name="choose_location" id="choose_location" style="color: rgb(102, 102, 102);" required>
                                <option class="select" value="">Choose Location</option>
                                    <?php for($l = 0; $l < count($catalog_locations); $l++){
                                        $location = $catalog_locations[$l];

                                        if($location != -1 && $location != "-1"){
                                            $comps = explode("??||&&", $location);

                                            $loc_id = $comps[0];
                                            $address1 = $comps[1];
                                            $address2 = $comps[2];
                                            $city = $comps[3];
                                            $state = $comps[4];
                                            $country = $comps[5];
                                            $country_code = $country;
                                            $country_sql = "SELECT * FROM `countries` WHERE `country_code`='$country'";
                                            $country_result = mysqli_query($conn, $country_sql);
                                            $country_row = mysqli_fetch_assoc($country_result);
                                            $country = $country_row['country_name'];

                                            $state_sql = "SELECT * FROM `states` WHERE `code`='$state' AND `country`='$country_code'";
                                            $state_result = mysqli_query($conn, $state_sql);
                                            $state_row = mysqli_fetch_assoc($state_result);
                                            $state_num = mysqli_num_rows($state_result);

                                            if($state_num == 0){
                                                $state;
                                            }
                                            else{
                                                $state = $state_row['name'];
                                            }

                                            if($address2 == -1 || $address2 == "-1"){
                                                $ret = $address1 . ", " . $city . ", " . $state . ", " . $country;
                                            }
                                            else{
                                                $ret = $address1 . ", " . $address2 . ", " . $city . ", " . $state . ", " . $country;
                                            }
                                        ?>
                                        
                                        <option value="<?php echo $loc_id; ?>"><?php echo $ret; ?></option>

                                        <?php
                                        }
                                    }
                                    ?>

                            </select>
                        </div>
                    </div>
                
                </div>
            </div>
                
            <hr class="orange no_bottom_border">
            <hr class="black no_bottom_border">

            <br>
            <br>
                
            <div id="copy_list">
                <?php for($c = 0; $c < count($missing_lots_id); $c++){
                    $lot_id = $missing_lots_id[$c];
                    $lot_name = $missing_lots_name[$c];
                    $lot_desc = $missing_lots_desc[$c];

                    ?>

                        <div class="copy_row">
                            <div class="left_side">
                                <p ><span class="bold">Lot Name: </span><?php echo $lot_name; ?></p>
                                <p class="value"><span class="bold">Lot Description: </span><?php echo $lot_desc; ?></p>
                            </div>
                            <div class="right_side">
                                <div class="circle_check_missing_lots" name="lot_<?php echo $lot_id; ?>">
                                    <span class="check_mark circle_mark"></span>
                                    <span class="circle_blank"></span>
                                </div>
                            </div>
                        </div>
                    <?php
                }
                ?>
            </div>


            <?php for($l = 0; $l < count($missing_lots_id); $l++){
                $lot_id = $missing_lots_id[$l];
                $lot_name = $missing_lots_name[$l];
                $lot_desc = $missing_lots_desc[$l];
            ?>
            
                <input type="hidden" name="lot_id_<?php echo $lot_id; ?>" id="lot_id_<?php echo $lot_id; ?>" value="0">

            <?php
            }
            ?>

            <hr class="orange no_bottom_border">
            <hr class="black no_bottom_border">
                
                

            <div class="catalog_row signup_row operations">
                <div class="col1 buttons">
                    <a class="bidzbutton devart no_margin" href="#" id="submit_miss">Submit</a>
                    <a href="#" class="bidzbutton orange no_margin" id="close_missing_locations2">Cancel</a>
                </div>
                
            </div>
        </form>
    </div>
</div>
<div id="cat_location_details_modal" class="modal_bg">
    <div id="cat_location_dets" class="modal">
        <h4>View Catalog Locations</h4>

        <p id="one_location_text"></p>

        <iframe id="single_map_frame" width="600" height="450" frameborder="0" src="" allowfullscreen="">
        </iframe>

        <div id="close_button"><a href="#" class="bidzbutton orange">Close Map</a></div>
    </div>
</div>


<div class="manage_lot_header">

    <h2 class="house_heading section_heading"><span>Manage Lots - For Catalog: <?php echo $catalog_name; ?></span></h2>
</div>

<div class="create_button_container">
    
    <a href="<?php echo $root; ?>catalogs/manage.php" class="bidzbutton orange create_button"><i class="fas fa-arrow-left"></i> Back to Manage Catalogs</a>

    <a href="create.php" class="bidzbutton create_button"><i class="fas fa-plus"></i> Create a Lot</a>
    <a href="<?php echo $root; ?>catalogs/sort_lots.php?cat_id=<?php echo $catalog_id; ?>" class="bidzbutton create_button green"><i class="fas fa-random"></i> Sort Lots</a>

    <?php if($lot_discrepancy) : ?>
        <a href="#" class="bidzbutton red create_button" id="missing_location_fix_button"><i class="fas fa-exclamation-circle "></i>Missing Location - Quick Fix</a>
    <?php endif; ?>

</div>

<?php
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

    function display_location($conn, $str){
        $ret = "";

        $comps = explode("??||&&", $str);

        $id = $comps[0];
        $address1 = $comps[1];
        $address2 = $comps[2];
        $city = $comps[3];
        $state = $comps[4];
        $country = $comps[5];
        $country_code = $country;

        $country_sql = "SELECT * FROM `countries` WHERE `country_code`='$country'";
        $country_result = mysqli_query($conn, $country_sql);
        $country_row = mysqli_fetch_assoc($country_result);
        $country = $country_row['country_name'];

        $state_sql = "SELECT * FROM `states` WHERE `code`='$state' AND `country`='$country_code'";
        $state_result = mysqli_query($conn, $state_sql);
        $state_row = mysqli_fetch_assoc($state_result);
        $state_num = mysqli_num_rows($state_result);

        if($state_num == 0){
            $state;
        }
        else{
            $state = $state_row['name'];
        }

        if($address2 == -1 || $address2 == "-1"){
            $ret = $address1 . ", " . $city . ", " . $state . ", " . $country;
        }
        else{
            $ret = $address1 . ", " . $address2 . ", " . $city . ", " . $state . ", " . $country;
        }

        return $ret;
    }
?>

<div id="lot_container">
    <div id="lot_list">

    <?php
        // Get sequence from table and stick it into an array
        $seq_lots_sql = "SELECT * FROM `lot_sort` WHERE `cat_id` = $catalog_id";
        $seq_lots_result = mysqli_query($conn, $seq_lots_sql);
        $lot_seq_row = mysqli_fetch_assoc($seq_lots_result);
        $lot_sequence = $lot_seq_row['sequence'];

        $lots = explode("||", $lot_sequence);

        $sorted_ids = array();

        for($s = 0; $s < count($lots); $s++){
            $val = $lots[$s];
            
            if($val != ""){
                array_push($sorted_ids, $val);
            }
        }
        

        // all info for sorting
        $sort_ids = array();
        $sort_names = array();
        $sort_descriptions = array();
        $sort_cat_other = array();
        $sort_cat = array();
        $sort_location = array();

        // Sort data by sorted sequence array
        for($v = 0; $v<count($sorted_ids); $v++){
            for($d = 0; $d<count($ids); $d++){

                if($ids[$d] == $sorted_ids[$v]){
                    $id = $ids[$d];
                    $name = $names[$d];
                    $description = $descriptions[$d];
                    $category = $categories[$d];
                    $category_other = $category_others[$d];
                    $location = $locations[$d];

                    array_push($sort_ids, $id);
                    array_push($sort_names, $name);
                    array_push($sort_descriptions, $description);
                    array_push($sort_cat, $category);
                    array_push($sort_cat_other, $category_other);
                    array_push($sort_location, $location);

                }
            }
        }


        $cat_trees = array();
        for($v = 0; $v<count($sort_cat); $v++){
            $cat_item = $sort_cat[$v];
            $cat_other_item = $sort_cat_other[$v];

            $category_tree = category_lookup($conn, $cat_item, $cat_other_item);
            array_push($cat_trees,$category_tree);
        }
    ?>

    <?php 
        for($i = 0; $i < count($sort_ids); $i++){
            // Get details from sorted sequence
            $id = $sort_ids[$i];

            $status_sql = "SELECT * FROM `lots` WHERE `id`=$id";
            $status_result = mysqli_query($conn, $status_sql);
            $status_row = mysqli_fetch_assoc($status_result);

            $lot_status = $status_row['status'];

            if($lot_status == "cancel"){
                continue;
            }

            $name = $sort_names[$i];
            $description = $sort_descriptions[$i];
            $category_other = $sort_cat_other[$i];
            $location = $sort_location[$i];

            
            $initial_desc = $description;

            $description = wordwrap($description, 175);
            $description = explode("\n", $description);

            if($description[0] != $initial_desc){
                $description = $description[0] . "...";
            }
            else{
                $description = $description[0];
            }
        

        $actual_loc = true;
        foreach($catalog_locations as $loc){
            $comps = explode("??||&&", $loc);
            $loc_id = $comps[0];

            if($location == $loc_id){
                $loc_out = display_location($conn, $loc);
                $actual_loc = true;
                break;
            }
            else{
                $actual_loc = false;
            }
        }

        // Search for pictures
        $picture_name = "";
        $pic_sql = "SELECT * FROM `lot_picture_order` WHERE `cat_id`=$catalog_id AND `lot_id`=$id";
        $pic_result = mysqli_query($conn, $pic_sql);
        $pic_num = mysqli_num_rows($pic_result);

        // No Picture entries
        if($pic_num == 0){
            $picture_name = "no_image.png";
        }
        else{
            $pic_row = mysqli_fetch_assoc($pic_result);
            $pic_seq = $pic_row['sequence'];

            // No picture entries
            if($pic_seq == "||"){
                $picture_name = "no_image.png";
            }
            else{
                $seq_arr = explode("||", $pic_seq);
                $picture_id = $seq_arr[1];

                // lookup picture
                $look_sql = "SELECT * FROM `lot_pictures` WHERE `id`=$picture_id";
                $look_result = mysqli_query($conn, $look_sql);
                $look_row = mysqli_fetch_assoc($look_result);
                $picture_name = $look_row['picture'];
            }
        }

        $category_tree = $cat_trees[$i];
    ?>

        <div class="lot_item">
            <div class="lot_inner">
                <div class="lot_picture">
                    <img src="<?php echo $root; ?>lots/pictures/<?php echo $picture_name; ?>" alt="Lot Picture" class="lot_image_primary">
                </div>
                <div class="lot_info">
                    <div class="lot_name"><?php echo $name; ?></div>
                    
                    <div class="border_item">
                        <hr class="border_chocolate">
                        <hr class="border_black">
                    </div>
                    
                    <div class="lot_description"><?php echo $description; ?></div>
                    
                    <div class="border_item">
                        <hr class="border_chocolate">
                        <hr class="border_black">
                    </div>

                    <div class="lot_category"><?php echo $category_tree; ?></div>

                    <div class="border_item">
                        <hr class="border_chocolate">
                        <hr class="border_black">
                    </div>

                    <?php if($actual_loc) : ?>
                    
                        <div class="lot_category"><a href="#" id="show_lot_category" class="manage_lot_map_link" name="<?php echo $loc_out; ?>"><?php echo $loc_out; ?></a></div>
                    
                    <?php else : ?>
                    
                        <div class="lot_category red_error"><i class="fas fa-exclamation-circle"></i> Location not found - please update lot</div>
                
                    <?php endif ; ?>

                    <div class="border_item">
                        <hr class="border_chocolate">
                        <hr class="border_black">
                    </div>

                    <div class="lot_options">
                        <a href="<?php echo $root; ?>lots/edit.php?cat_id=<?php echo $catalog_id; ?>&lot_id=<?php echo $id; ?>" class="bidzbutton"><i class="fas fa-edit"></i> Edit Lot Details</a>
                        <a href="#" class="bidzbutton copy_lot_link" name="copy_lot_<?php echo $id; ?>"><i class="far fa-copy"></i> Copy Lot</a>
                        <a href="<?php echo $root; ?>lots/pictures.php?lot_id=<?php echo $id; ?>" class="bidzbutton"><i class="fas fa-camera-retro"></i> Pictures</a>
                        <a href="#" class="bidzbutton red lot_cancel_button" name="lot_id_<?php echo $id; ?>"><i class="fas fa-ban"></i> Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    </div>
</div>

<?php include "../includes/footer.php"; ?>
<script>

    $("a.lot_cancel_button").click(function(e){
        e.preventDefault();

        var id = $(this).attr("name");

        id = id.replace("lot_id_", "");

        // given lot id, cancel lot
        $.ajax({
            type: 'POST',
            url: 'cancel_lot.php',
            data: {
                type: "cancel",
                id: id
            },
            success: function (data) {
                alert("Successully canceled lot");
                location.reload();
            }
        });
    });

    $(".manage_lot_map_link").click(function(e){
        console.log("here");
        e.preventDefault();

        $("#cat_location_details_modal").css("display", "flex");

        var li = $(this).attr("name");
        var iframe_link = "https://www.google.com/maps/embed/v1/place?key=AIzaSyAcc17FcMQWYboFujZkLZ5TNA59CAqrBjs&q=" + li;
        $("#cat_location_details_modal iframe#single_map_frame").attr("src", iframe_link);
    });

    $("#close_button a").click(function(e){
        e.preventDefault();

        $("#cat_location_details_modal").css("display", "none");
    });

</script>

<!-- Handle Copy Lot Process -->
<div id="copy_lot_modal_container" class="catalog_modal">

    <div class="modal_content copy_lot_modal">
        
        <h2 class="copy_heading section_heading"><span>Copy Lot</span></h2>

        <div class="catalog_row signup_row operations">
            <div class="col1 buttons">
                <a href="#" class="bidzbutton orange no_margin" id="close_house_account_creator">Cancel</a>
            </div>
        </div>
        
        <div class="catalog_row signup_row operations">
            <div class="col1 buttons select_unselect_row">
                <a class="bidzbutton no_margin" href="#" id="copy_select_all">Select All</a>
                <a href="#" class="bidzbutton no_margin" id="copy_un_select_all">Unselect All</a>
            </div>
            
        </div>
        <div id="copy_list">
            <div class="copy_row">
                <div class="left_side">
                    <p class="title">Name</p>
                    <p class="value" id="name_spot">Jordan</p>
                </div>
                <div class="right_side">
                    <div class="circle_check" name="name">
                        <span class="check_mark circle_mark"></span>
                        <span class="circle_blank"></span>
                    </div>
                </div>
            </div>
            <div class="copy_row">
                <div class="left_side">
                    <p class="title">Description</p>
                    <p class="value" id="description_spot">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima, dicta provident nisi magni ducimus quis quo impedit animi. Quae reiciendis, amet magni eum mollitia illo labore numquam quis vitae nihil voluptatum iusto!</p>
                </div>
                <div class="right_side">
                    <div class="circle_check" name="description">
                        <span class="check_mark circle_mark"></span>
                        <span class="circle_blank"></span>
                    </div>
                </div>
            </div>
            <div class="copy_row">
                <div class="left_side">
                    <p class="title">Category</p>
                    <p class="value" id="category_spot"><?php echo $category_tree; ?></p>
                </div>
                <div class="right_side">
                    <div class="circle_check" name="category">
                        <span class="check_mark circle_mark"></span>
                        <span class="circle_blank"></span>
                    </div>
                </div>
            </div>
            <div class="copy_row">
                <div class="left_side">
                    <p class="title">Starting Bid</p>
                    <p class="value" id="starting_bid_spot">100</p>
                </div>
                <div class="right_side">
                    <div class="circle_check" name="starting_bid">
                        <span class="check_mark circle_mark"></span>
                        <span class="circle_blank"></span>
                    </div>
                </div>
            </div>
            <div class="copy_row">
                <div class="left_side">
                    <p class="title">Bid Increment Type</p>
                    <p class="value" id="bid_increment_type_spot">Static</p>
                </div>
                <div class="right_side">
                    <div class="circle_check" name="bid_increment_type">
                        <span class="check_mark circle_mark"></span>
                        <span class="circle_blank"></span>
                    </div>
                </div>
            </div>
            <div class="copy_row">
                <div class="left_side">
                    <p class="title">Bid Increment</p>
                    <p class="value" id="bid_increment_spot">10</p>
                </div>
                <div class="right_side">
                    <div class="circle_check" name="bid_increment">
                        <span class="check_mark circle_mark"></span>
                        <span class="circle_blank"></span>
                    </div>
                </div>
            </div>
            <div class="copy_row">
                <div class="left_side">
                    <p class="title">Lot Location</p>
                    <p class="value" id="location_spot">5270 Mt. Maria, Hubbard Lake, Michigan, United States</p>
                </div>
                <div class="right_side">
                    <div class="circle_check" name="lot_location">
                        <span class="check_mark circle_mark"></span>
                        <span class="circle_blank"></span>
                    </div>
                </div>
            </div>
            <div class="copy_row">
                <div class="left_side">
                    <p class="title">Allow Reserve?</p>
                    <p class="value"  id="reserve_spot">yes - 10</p>
                </div>
                <div class="right_side">
                    <div class="circle_check" name="reserve">
                        <span class="check_mark circle_mark"></span>
                        <span class="circle_blank"></span>
                    </div>
                </div>
            </div>
            <div class="copy_row">
                <div class="left_side">
                    <p class="title">Featured Lot?</p>
                    <p class="value"  id="featured_spot">yes</p>
                </div>
                <div class="right_side">
                    <div class="circle_check" name="featured">
                        <span class="check_mark circle_mark"></span>
                        <span class="circle_blank"></span>
                    </div>
                </div>
            </div>
            <div class="copy_row">
                <div class="left_side">
                    <p class="title">Allow Freezing?</p>
                    <p class="value"  id="freezing_spot">yes</p>
                </div>
                <div class="right_side">
                    <div class="circle_check" name="freezing">
                        <span class="check_mark circle_mark"></span>
                        <span class="circle_blank"></span>
                    </div>
                </div>
            </div>
            <div class="copy_row">
                <div class="left_side">
                    <p class="title">Times the Bid</p>
                    <p class="value"  id="times_the_bid_spot">yes/no</p>
                </div>
                <div class="right_side">
                    <div class="circle_check" name="times_the_bid">
                        <span class="check_mark circle_mark"></span>
                        <span class="circle_blank"></span>
                    </div>
                </div>
            </div>
            <div class="copy_row">
                <div class="left_side">
                    <p class="title">Quantity</p>
                    <p class="value"  id="quantity_spot">100</p>
                </div>
                <div class="right_side">
                    <div class="circle_check" name="quantity">
                        <span class="check_mark circle_mark"></span>
                        <span class="circle_blank"></span>
                    </div>
                </div>
            </div>
            <div class="copy_row">
                <div class="left_side">
                    <p class="title">Units</p>
                    <p class="value" id="units_spot">Boxes</p>
                </div>
                <div class="right_side">
                    <div class="circle_check" name="units">
                        <span class="check_mark circle_mark"></span>
                        <span class="circle_blank"></span>
                    </div>
                </div>
            </div>
            <div class="copy_row">
                <div class="left_side">
                    <p class="title">Brand</p>
                    <p class="value" id="brand_spot">Ford</p>
                </div>
                <div class="right_side">
                    <div class="circle_check" name="brand">
                        <span class="check_mark circle_mark"></span>
                        <span class="circle_blank"></span>
                    </div>
                </div>
            </div>
            <div class="copy_row">
                <div class="left_side">
                    <p class="title">Condition</p>
                    <p class="value" id="condition_spot">Good</p>
                </div>
                <div class="right_side">
                    <div class="circle_check" name="condition">
                        <span class="check_mark circle_mark"></span>
                        <span class="circle_blank"></span>
                    </div>
                </div>
            </div>
            <div class="copy_row">
                <div class="left_side">
                    <p class="title">Size</p>
                    <p class="value" id="size_spot">Huge</p>
                </div>
                <div class="right_side">
                    <div class="circle_check" name="size">
                        <span class="check_mark circle_mark"></span>
                        <span class="circle_blank"></span>
                    </div>
                </div>
            </div>
            <div class="copy_row">
                <div class="left_side">
                    <p class="title">Weight</p>
                    <p class="value" id="weight_spot">Heavy</p>
                </div>
                <div class="right_side">
                    <div class="circle_check" name="weight">
                        <span class="check_mark circle_mark"></span>
                        <span class="circle_blank"></span>
                    </div>
                </div>
            </div>
            <div class="copy_row">
                <div class="left_side">
                    <p class="title">Internal Notes</p>
                    <p class="value" id="internal_notes_spot"></p>
                </div>
                <div class="right_side">
                    <div class="circle_check" name="internal_notes">
                        <span class="check_mark circle_mark"></span>
                        <span class="circle_blank"></span>
                    </div>
                </div>
            </div>
            <div class="copy_row">
                <div class="left_side">
                    <p class="title">Tags</p>
                    <p class="value" id="tags_spot">bill, jordan, ted</p>
                </div>
                <div class="right_side">
                    <div class="circle_check" name="tags">
                        <span class="check_mark circle_mark"></span>
                        <span class="circle_blank"></span>
                    </div>
                </div>
            </div>
        </div>

        <form action="" id="copy_form" method="post">

            <input type="hidden" name="form_cat_id" id="form_cat_id" value="<?php echo $catalog_id; ?>">
            <input type="hidden" name="form_lot_id" id="form_lot_id" value="-1">

            
            <input type="hidden" name="name_check" id="name_check" value="0">
            <input type="hidden" name="description_check" id="description_check" value="0">

            <input type="hidden" name="category_check" id="category_check" value="0">

            <input type="hidden" name="starting_bid_check" id="starting_bid_check" value="0">
            <input type="hidden" name="bid_increment_type_check" id="bid_increment_type_check" value="0">
            <input type="hidden" name="bid_increment_check" id="bid_increment_check" value="0">

            <input type="hidden" name="lot_location_check" id="lot_location_check" value="0">

            <input type="hidden" name="reserve_check" id="reserve_check" value="0">
            <input type="hidden" name="featured_check" id="featured_check" value="0">
            <input type="hidden" name="freezing_check" id="freezing_check" value="0">

            <input type="hidden" name="times_the_bid_check", id="times_the_bid_check" value="0">
            <input type="hidden" name="quantity_check" id="quantity_check" value="0">
            <input type="hidden" name="units_check" id="units_check" value="0">
            <input type="hidden" name="brand_check" id="brand_check" value="0">
            <input type="hidden" name="condition_check" id="condition_check" value="0">
            <input type="hidden" name="size_check" id="size_check" value="0">
            <input type="hidden" name="weight_check" id="weight_check" value="0">

            <input type="hidden" name="internal_notes_check" id="internal_notes_check" value="0">
            <input type="hidden" name="tags_check" id="tags_check" value="0">
                    
            <div class="catalog_row signup_row operations">
                <div class="col1 buttons">
                    <a class="bidzbutton devart no_margin" href="#" id="submit_copy">Submit</a>
                    <a href="#" class="bidzbutton orange no_margin" id="close_house_account_creator2">Cancel</a>
                </div>
                
            </div>
        </form>
    </div>
</div>

<!-- Handle form submission -->
<script>
    $("#submit_copy").click(function(e){
        e.preventDefault();

        $("#copy_form").submit();
    });
</script>


<!-- Handle Button Clicking -->
<script>

    var no_info = "-- NO DATA --";

    var name_spot = $("#name_spot");
    var description_spot = $("#description_spot");
    var category_spot = $("#category_spot");
    var starting_bid_spot = $("#starting_bid_spot");
    var bid_increment_type_spot = $("#bid_increment_type_spot");
    var bid_increment_spot = $("#bid_increment_spot");
    var location_spot = $("#location_spot");
    var reserve_spot = $("#reserve_spot");
    var featured_spot = $("#featured_spot");
    var freezing_spot = $("#freezing_spot");
    var quantity_spot = $("#quantity_spot");
    var times_the_bid_spot = $("#times_the_bid_spot");
    var units_spot = $("#units_spot");
    var brand_spot = $("#brand_spot");
    var condition_spot = $("#condition_spot");
    var size_spot = $("#size_spot");
    var weight_spot = $("#weight_spot");
    var internal_notes_spot = $("#internal_notes_spot");
    var tags_spot = $("#tags_spot");

    var spots = ["name_spot", "description_spot", "starting_bid_spot", "bid_increment_type_spot", "bid_increment_spot", "location_spot", "reserve_spot", "featured_spot", "freezing_spot", "times_the_bid_spot", "quantity_spot", "units_spot", "brand_spot", "condition_spot", "size_spot", "weight_spot", "internal_notes_spot", "tags_spot"];

    var checks = ["name_check", "description_check", "category_check", "starting_bid_check", "bid_increment_type_check", "bid_increment_check", "lot_location_check", "reserve_check", "featured_check", "freezing_check", "times_the_bid_check", "quantity_check", "units_check", "brand_check", "condition_check", "size_check", "weight_check", "internal_notes_check", "tags_check"];

    function clear_fields(){
        
        name_spot.text(no_info);
        description_spot.text(no_info);
        category_spot.text(no_info);
        starting_bid_spot.text(no_info);
        bid_increment_type_spot.text(no_info);
        bid_increment_spot.text(no_info);
        location_spot.text(no_info);
        reserve_spot.text(no_info);
        featured_spot.text(no_info);
        freezing_spot.text(no_info);
        quantity_spot.text(no_info);
        times_the_bid_spot.text(no_info);
        units_spot.text(no_info);
        brand_spot.text(no_info);
        condition_spot.text(no_info);
        size_spot.text(no_info);
        weight_spot.text(no_info);
        internal_notes_spot.text(no_info);
        tags_spot.text(no_info);
    }

    $(document).on("click", ".copy_lot_link", function(e){
        e.preventDefault();

        var name = $(this).attr("name");

        var cat_id = "<?php echo $catalog_id; ?>";

        name = name.replace("copy_lot_", "");

        $("#form_lot_id").val(name);

        var form_path = "copy.php?cat_id=<?php echo $catalog_id; ?>&lot_id=" + name;
        $("#copy_form").attr("action", form_path);

        clear_fields();

        var all_data = [];

        $.ajax({
            type: 'POST',
            url: 'copy_data.php',
            data: {cat_id: cat_id, lot_id: name},
            success: function (data) {
                var info = data['info'];
                var cat = data['cats'];

                console.log(info);

                $("#category_spot").text(cat);

                for(var j = 0; j < info.length; j++){
                    var curr = info[j];
                    var out = curr;
                    var spot = spots[j];

                    if(curr == ""){
                        out = no_info;
                    }
                    
                    if(spot == "tags_spot"){
                        var tag_comp = out.split("??||&&");
                        var output = "";
                        for(var t = 0; t<tag_comp.length; t++){
                            var it = tag_comp[t];
                            if(it == ""){
                                continue;
                            }
                            else{
                                var lim = tag_comp.length -2;
                                if(t == lim){
                                    output = output + it;
                                }
                                else{
                                    output = output + it + ", ";
                                }
                            }
                        }
                        out = output;

                    }
                    var selector = "#" + spot
                    $(selector).text(out);
                }

                $("#copy_lot_modal_container").show();
            },
            complete: function (data) {
            },
            dataType:"json"
        });
        
    });


    $("#close_house_account_creator, #close_house_account_creator2").click(function(e){
        e.preventDefault();

        $("#copy_lot_modal_container").hide();
    });

    function select_unselect(type){
        // 1 - select all
        // 0 - unselect all

        for(var c= 0; c<checks.length; c++){
            var curr = checks[c];

            var selector = "#" + curr;
            $(selector).val(type);
        }
    }

    $("#copy_select_all").click(function(e){
        e.preventDefault();

        $(".circle_mark").css("display", "block");
        $(".circle_blank").css("display", "none");

        select_unselect(1);
    });
    $("#copy_un_select_all").click(function(e){
        e.preventDefault();

        $(".circle_mark").css("display", "none");
        $(".circle_blank").css("display", "block");

        select_unselect(0);
    });

    $(document).on("click", ".circle_check", function(e){
        e.preventDefault();

        var type = $(this).attr("name");
        var selector = "#" + type + "_check";
        var hidden = $(selector);
        var check_val = hidden.val();

        if(check_val == "0"){
            hidden.val("1");

            var mark = $(this).find(".circle_mark");
            mark.css("display", "block");

            var blank = $(this).find(".circle_blank");
            blank.css("display", "none");
        }
        else{
            hidden.val("0");

            var mark = $(this).find(".circle_mark");
            mark.css("display", "none");
            
            var blank = $(this).find(".circle_blank");
            blank.css("display", "block");
        }
    });
</script>

<!-- Missing Locations - Quick Fix -->
<script>
    $("#missing_location_fix_button").click(function(e){
        e.preventDefault();

        $("#missing_locations_modal_container").css("display", "block");
    });
    $("#close_missing_locations, #close_missing_locations2").click(function(e){
        e.preventDefault();
        
        $("#missing_locations_modal_container").css("display", "none");
    });

    $(document).on("click", ".circle_check_missing_lots", function(e){
        e.preventDefault();

        var name = $(this).attr("name");
        var id = name.replace("lot_", "");
        var h_id = "#lot_id_" + id;
        var hidden = $(h_id);
        var check_val = hidden.val();

        if(check_val == "0"){
            hidden.val("1");

            var mark = $(this).find(".circle_mark");
            mark.css("display", "block");

            var blank = $(this).find(".circle_blank");
            blank.css("display", "none");
        }
        else{
            hidden.val("0");

            var mark = $(this).find(".circle_mark");
            mark.css("display", "none");
            
            var blank = $(this).find(".circle_blank");
            blank.css("display", "block");
        }
    });
    
    $("select").change(function () {
        $(this).css("background-color", "whitesmoke");
    });

    $("#submit_miss").click(function(e){
        e.preventDefault();

        var choose_location_val = $("#choose_location").val();

        if(choose_location_val == ""){
            var choose_location = document.getElementById("choose_location");
            alert("Please choose a location");
            choose_location.style.backgroundColor = "lightpink";
            choose_location.focus();
            return;
        }

        $("#missing_form").submit();
    });
</script>