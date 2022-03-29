<?php include "../includes/header.php"; ?>
<?php include "../includes/connect.php"; ?>
<?php include "search_modal.php"; ?>
<?php include_once "../helpers/date_conversion.php"; ?>
<?php include "../helpers/asset_location_modal.php"; ?>
<?php include "../helpers/location_output.php"; ?>
<?php
    // TODO: Catalogs designated as preview

    // Get catalogs that are published or open
    $sql = "SELECT * FROM `catalogs` WHERE `published`=1";
    $result = mysqli_query($conn, $sql);

    
    $id_s = array();
    $catalog_name_s = array();
    $auction_type_s = array();
    $catalog_description_s = array();
    $start_date_s = array();
    $end_date_s = array();
    $locations = array();
    $location_count_s = array();
    $lot_number_s = array();
    $image_s = array();
    $status_s = array();
    $timezone_s = array();

    $lot_checked_array = array();

    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];

        // get catalog_status
        $status_sql = "SELECT * FROM `catalog_status` WHERE `cat_id`=$id";
        $status_result = mysqli_query($conn, $status_sql);
        $status_row = mysqli_fetch_assoc($status_result);

        $catalog_status = $status_row['status'];

        if($catalog_status == "closed" || $catalog_status == "cancel"){
            continue;
        }

        // get catalog image
        $img_sql = "SELECT * FROM `catalog_pictures` WHERE `cat_id`=$id";
        $img_result = mysqli_query($conn, $img_sql);
        $img_row = mysqli_fetch_assoc($img_result);
        $img = $img_row['picture'];
        
        if($img == ""){
            $img = "no_image.png";
        }


        $catalog_name = $row['catalog_name'];
        $auction_type = $row['auction_type'];
        $catalog_description = $row['catalog_description'];
        $start_date = sql_to_date($row['start_date']);
        $end_date = sql_to_date($row['end_date']);
        $asset_location_1 = $row['asset_location_1'];
        $asset_location_2 = $row['asset_location_2'];
        $asset_location_3 = $row['asset_location_3'];
        $asset_location_4 = $row['asset_location_4'];
        $asset_location_5 = $row['asset_location_5'];

        $timezone = $row['timezone'];

        $status_sql = "SELECT * FROM `catalog_status` WHERE `cat_id`=$id";
        $status_result = mysqli_query($conn, $status_sql);
        $status_row = mysqli_fetch_assoc($status_result);

        $status = $status_row['status'];


        $location_count = 0;

        $asset_location = array();

        if($asset_location_1 != "-1" && $asset_location_1 != -1){
            $location_count++;
            array_push($asset_location, $asset_location_1);
        }
        if($asset_location_2 != "-1" && $asset_location_2 != -1){
            $location_count++;
            array_push($asset_location, $asset_location_2);
        }
        if($asset_location_3 != "-1" && $asset_location_3 != -1){
            $location_count++;
            array_push($asset_location, $asset_location_3);
        }
        if($asset_location_4 != "-1" && $asset_location_4 != -1){
            $location_count++;
            array_push($asset_location, $asset_location_4);
        }
        if($asset_location_5 != "-1" && $asset_location_5 != -1){
            $location_count++;
            array_push($asset_location, $asset_location_5);
        }

        // Get number of lots
        $lot_number = lot_number($conn, $id);

        array_push($id_s, $id);
        array_push($catalog_name_s, $catalog_name);
        array_push($auction_type_s, $auction_type);
        array_push($catalog_description_s, $catalog_description);
        array_push($start_date_s, $start_date);
        array_push($end_date_s, $end_date);
        array_push($locations, $asset_location);
        array_push($location_count_s, $location_count);
        array_push($lot_number_s, $lot_number);
        array_push($image_s, $img);
        array_push($status_s, $status);
        array_push($timezone_s, $timezone);
    }

    // get all location end timestamp and put in associative array
    $all_countdowns = array();
    $all_cat_ids = array();
    $lot_countdown_sql = "SELECT * FROM `lot_countdown`";
    $lot_countdown_result = mysqli_query($conn, $lot_countdown_sql);
    while($lot_countdown_row = mysqli_fetch_assoc($lot_countdown_result)){
        $lot_countdown_cat_id = $lot_countdown_row['cat_id'];
        $lot_countdown_lot_id = $lot_countdown_row['lot_id'];
        $lot_countdown_end_time = $lot_countdown_row['end_time'];

        $temp = array($lot_countdown_cat_id, $lot_countdown_lot_id, $lot_countdown_end_time);

        array_push($all_cat_ids, $lot_countdown_cat_id);
        array_push($all_countdowns, $temp);
    }

    $all_cat_ids = uniqueize($all_cat_ids);

    $grouped_countdowns = array();
    for($c = 0; $c<count($all_cat_ids); $c++){
        $temp = array();

        $cat_id = $all_cat_ids[$c];

        for($d = 0; $d<count($all_countdowns); $d++){
            $countdown = $all_countdowns[$d];

            $countdown_cat_id = $countdown[0];

            if($countdown_cat_id == $cat_id){
                array_push($temp, $countdown);
            }
        }

        $grouped_countdowns[$cat_id] = $temp;
    }

    // unique-ize array
    function uniqueize($arr){
        $ret = array();

        foreach($arr as $a){
            if(!in_array($a, $ret)){
                array_push($ret, $a);
            }
        }

        return $ret;
    }
    function lot_number($conn, $id){
        $sql = "SELECT * FROM `lots` WHERE `catalog_id`=$id AND `status`<>'cancel'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);

        return $num;
    }

    // handle catalog open countdown
    $catalog_open_countdown = getCatalogOpenCountdown();

    $remaining_arr = array();
    $catalog_remainings = json_decode($catalog_open_countdown);
    foreach($catalog_remainings as $rem){
        $cat_id = $rem->catalog_id;
        $cat_rem = $rem->time_remaining;

        $remaining_arr[$cat_id] = $cat_rem;
    }

    $countdown_indexes = array();
    $countdown_placeholder = array();
    // countdown place
    $countdown_arr = json_decode($catalog_open_countdown, true);
    for($c = 0; $c < count($countdown_arr); $c++){
        $current = $countdown_arr[$c];
        $catalog_id = $current['catalog_id'];
        $time = $current['time_remaining'];
        $time_output_start = time_to_countdown($time);

        // echo $time_output_start;
        array_push($countdown_placeholder, $time_output_start);
        array_push($countdown_indexes, $catalog_id);
    }

    function getIndexOfArrayItem($arr, $item){
        for($i = 0; $i<count($arr); $i++){
            $current = $arr[$i];
            if($item == $current){
                return $i;
            }
        }

        return -1;
    }

    $countdown_array = array();
    for($i = 0; $i<count($id_s); $i++){
        $id = $id_s[$i];

        $index = getIndexOfArrayItem($countdown_indexes, $id);
        if($index != -1){
            $placeholder = $countdown_placeholder[$index];
        }
        else{
            $placeholder = -1;
        }
        array_push($countdown_array, $placeholder);
    }

?>
<script>
    
    function handleTimeCountdown(distance){
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        var output = "";
        if(days <= 0 && hours <= 0 && minutes <= 0 && seconds <= 0){
            output = -1;
        }
        else{
            output = days + "D " + hours + "H " + minutes + "M " + seconds + "S ";
        }
        
        return output;
    }
</script>
<section class="browse_section" id="browse_section">

    <h2 class="auctions section_heading"><span>Browse Auctions</span></h2>

    <div class="search_button_container">
        <a href="#" class="bidzbutton" id="advanced_search_button"><i class="fas fa-search"></i> Advanced Search</a>
        
        <a href="" class="bidzbutton red" id="reset_search_button"><i class="fas fa-undo-alt"></i> Reset Search</a>

        <a href="" class="bidzbutton green" id="filter_button"><i class="fas fa-filter"></i> Filter</a>
    </div>

    <div id="catalogs_and_lots">

        <?php
            if(count($id_s) == 0){
                ?>
                    <h2 class="no_catalogs_published">There are currently no catalogs published. Please check in later for more information. We appologize for any inconvenience</h2>
                <?php
            }

            for($i = 0; $i<count($id_s); $i++){

                $id = $id_s[$i];
                $catalog_name = $catalog_name_s[$i];
                $auction_type = $auction_type_s[$i];
                $catalog_description = $catalog_description_s[$i];
                $start_date = $start_date_s[$i];
                $end_date = $end_date_s[$i];

                $timezone = $timezone_s[$i];

                $lot_number = $lot_number_s[$i];

                $asset_location_s = $locations[$i];
                $location_count = $location_count_s[$i];

                $catalog_image = $image_s[$i];

                $auction_type = ucfirst($auction_type);
                
                $stage = $status_s[$i];

                $location_output = "";

                $countdown = $countdown_array[$i];

                if($countdown == -1){
                    $countdown_output = "Auction in Progress";
                }
                else{
                    $countdown_output = $countdown;
                }

                if($location_count == 1){
                    $location_output = loc_output($asset_location_s[0]);


                }
                else{
                    $location_output = "View all locations for this catalog (" . $location_count . ")";
                }

                $catalog_image = $root . "catalogs/featured_img/" . $catalog_image;

    
                // get catalog registration status
                $registration_sql = "SELECT * FROM `catalog_registration` WHERE `user`='$username' AND `cat_id`=$id";
                $registration_result = mysqli_query($conn, $registration_sql);
                $registration_row = mysqli_fetch_assoc($registration_result);
                $registration_status = $registration_row['status'];
        ?>

        <div class="cat_group" name="catalog_group_<?php echo $id; ?>">

            <input type="hidden" class="catalog_countdown_tracker" name="catalog_countdown_tracker" id="catalog_countdown_<?php echo $id; ?>" value="<?php echo $remaining_arr[$id]; ?>">

            <div class="catalog">
                <div class="picture">
                    <img class="catalog_picture object_fit_contain" src="<?php echo $catalog_image; ?>" alt="Image">
                </div>
                <div class="details">
                    <div class="row row1">
                        <span class="catalog_name"><?php echo $catalog_name; ?></span>
                    </div>
                    <hr class="border_chocolate">
                    <hr class="border_black">
                    <div class="row row2">
                        <span class="auction_type"><span class="chocolate"><?php echo $auction_type; ?></span> Auction</span>
                        <span class="number_lots"><span class="chocolate"><?php echo $lot_number; ?></span> Lots</span>
                    </div>
                    <div class="row row3">
                        <p class="catalog_description"><?php echo $catalog_description; ?></p>
                    </div>
                    <div class="row row4">
                        <span class="asset_location">Asset Location(s): <a href="#" name="location_number_<?php echo $location_count; ?>" class="location_modal_button_<?php echo $id; ?> show_location_modal "><span id="" name="catalog_name_<?php echo $id; ?>" class="location_hover_browse"><?php echo $location_output; ?></span></a></span>
                    </div>
                    <hr class="border_chocolate">
                    <hr class="border_black">
                    <div class="row row5">
                        <span class="bidding_starts">Bidding Starts: <span class="chocolate"><?php echo $start_date; ?></span></span>
                        <span class="bidding_ends">Bidding Ends: <span class="chocolate"><?php echo $end_date; ?></span></span>
                    </div>
                    <?php if($stage == "open") : ?>
                        <div class="row">
                            <span class="bidding_countdown"><?php echo $countdown_output; ?></span>
                        </div>
                    <?php else: ?>
                        <div class="row">
                            <span class="bidding_countdown" id="bidding_countdown_display_<?php echo $id; ?>">Bidding Opens in: <?php echo $countdown_output; ?></span>
                        </div>
                    <?php endif; ?>

                    <hr class="border_chocolate">
                    <hr class="border_black">
                    <div class="row row6">
                        <span class="register_bid">
                            <?php if($registration_status == "approved") : ?>
                                <div class="approved_container">
                                    <span class="approval_icon">
                                        <i class="fas fa-check-circle"></i>
                                    </span>
                                    <span class="approval_text"> Registration</br>Approved</span>
                                </div>
                            <?php elseif($registration_status == "pending") : ?>
                                <div class="pending_container">
                                    <span class="pending_icon">
                                        <i class="fas fa-hourglass-half"></i>
                                    </span>
                                    <span class="pending_text"> Registration</br>Pending</span>
                                </div>
                            <?php elseif($registration_status == "denied") : ?>
                                <div class="denied_container">
                                    <span class="denied_icon">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </span>
                                    <span class="denied_text"> Registration</br>Denied</span>
                                </div>
                            <?php elseif(!$logged_in) : ?>
                                <div class="not_logged_in_container">
                                    <span class="not_logged_in_text"><span class="chocolate"><a href="#" class="login_open">Log in</a></span> to register to bid or contact seller</span>
                                </div>
                            <?php else : ?>
                                <a href="#" class="bidzbutton register_to_bid orange" id="register_to_bid_process_<?php echo $id; ?>" name="register_to_bid_process_<?php echo $id; ?>"><i class="far fa-check-circle"></i> Register To Bid</a>
                            <?php endif ; ?>
                        </span>

                        
                        <?php if($logged_in) : ?>
                        <span class="message_seller">
                            <a href="#" class="bidzbutton medblue"><i class="far fa-comments"></i> Contact Seller</a>
                        </span>
                        <?php endif ; ?>

                        <span class="view_lots">
                            <a href="#" class="bidzbutton devart"><i class="far fa-eye"></i> Open Catalog</a>
                        </span>


                    </div>
                </div>

                <div class="lot_drop_down">
                    <span class="drop_down_container" id="hide_show_<?php echo $id; ?>">
                        <span class="replace_hidden" id="replace_hidden_<?php echo $id; ?>"><span class="hide_show_lots">Hide Featured Lots</span> <i class="fas fa-chevron-up"></i></span>

                        <span class="replace_show" id="replace_show_<?php echo $id; ?>"><span class="hide_show_lots">Show Featured Lots</span> <i class="fas fa-chevron-down"></i></span>
                    </span>

                    <!-- Value 0 for showing, value 1 for hidden -->
                    <input type="hidden" name="showing_lots_<?php echo $id; ?>" id="showing_lots_<?php echo $id; ?>" value="1">
                </div>
            </div>

            <div class="lot_container_lister" id="lot_number_<?php echo $id; ?>">

                <div class="lots" >
                    <div class="lot_arrow_left lot_arrow" name="lot_arrow_left">
                        <i class="fas fa-chevron-left"></i>
                    </div>

                    <div class="scrolling-wrapper lot_lister">
                        <?php

                            $lot_sql = "SELECT * FROM `lots` WHERE `catalog_id`=$id AND `featured_lot`='yes' AND `status`<>'cancel'";
                            $lot_result = mysqli_query($conn, $lot_sql);
                            while ($lot_row = mysqli_fetch_assoc($lot_result)) {
                                $lot_id = $lot_row['id'];
                                $lot_name = $lot_row['name'];
                                $lot_description = $lot_row['description'];
                                $lot_location = $lot_row['lot_location'];
                                $start_date;
                                $end_date;
                                $status = $lot_row['status'];

                                $current_bid = $lot_row['current_bid'];
                                $lot_winner = $lot_row['winnner'];

                                $bid_info = "";
                                if ($status == "published") {
                                    $bid_info = "Bidding Not Started";
                                } else {
                                    $bid_info = $current_bid . " - " . $lot_winner . " - " . "x bids";
                                }

                                $catalog_id = $id;

                                // get list of lots that are being watched
                                $watching_sql = "SELECT * FROM `watching` WHERE `catalog_id`=$catalog_id AND `lot_id`=$lot_id AND `username`='$username'";
                                $watching_result = mysqli_query($conn, $watching_sql);
                                $watching_row = mysqli_fetch_assoc($watching_result);
                                $watching_count = mysqli_num_rows($watching_result);
                                $watching_lot = $watching_row['lot_id'];
                                
                                if($watching_count == 1){
                                    $watching_output = $catalog_id . "??||&&" . $watching_lot;
                                    array_push($lot_checked_array, $watching_output);
                                }

                                // get first picture from 
                                $picture_sql = "SELECT * FROM `lot_picture_order` WHERE `cat_id`=$id AND `lot_id`=$lot_id";
                                $picture_result = mysqli_query($conn, $picture_sql);
                                $picture_row = mysqli_fetch_assoc($picture_result);

                                $picture_sequence = $picture_row['sequence'];
                                $picture_name = "null";

                                if($picture_sequence == "" || $picture_sequence == "||"){
                                    $picture_name = $root . "img/no_image.png";
                                }
                                else{
                                    $picture_comps = explode("||", $picture_sequence);
                                    $pic_id = $picture_comps[1];

                                    $pic_sql = "SELECT * FROM `lot_pictures` WHERE `id`=$pic_id AND `cat_id`=$id AND `lot_id`=$lot_id";
                                    $pic_result = mysqli_query($conn, $pic_sql);
                                    $pic_row = mysqli_fetch_assoc($pic_result);
                                    $picture = $pic_row['picture'];

                                    $picture_name = $root . "lots/pictures/" . $picture;
                                }

                                // get lot location
                                $location_sql = "SELECT * FROM `catalogs` WHERE `id`=$id";
                                $location_result = mysqli_query($conn, $location_sql);
                                $location_row = mysqli_fetch_assoc($location_result);

                                $all_locations = array();

                                $asset_location_1 = $location_row['asset_location_1'];
                                $asset_location_2 = $location_row['asset_location_2'];
                                $asset_location_3 = $location_row['asset_location_3'];
                                $asset_location_4 = $location_row['asset_location_4'];
                                $asset_location_5 = $location_row['asset_location_5'];

                                array_push($all_locations, $asset_location_1, $asset_location_2, $asset_location_3, $asset_location_4, $asset_location_5);

                                $location_entry = "";

                                for($l = 0; $l<count($all_locations); $l++){
                                    $current_location = $all_locations[$l];

                                    if($current_location == -1 || $current_location == "-1"){
                                        continue;
                                    }

                                    $location_comps = explode("??||&&", $current_location);
                                    $location_id = $location_comps[0];

                                    if($location_id == $lot_location){
                                        // $location_entry = nl2br(loc_output_word_break($current_location));

                                        $address1 = $location_comps[1];
                                        $address2 = $location_comps[2];
                                        $city = $location_comps[3];
                                        $state = $location_comps[4];
                                        $country = $location_comps[5];

                                        if($address2 == -1){
                                            $output = $address1 . "\n" . $city . ", " . $state . ", " . $country;
                                        }
                                        else{
                                            $output = $address1 . "\n" . $address2 . "\n" . $city . ", " . $state . ", " . $country;
                                        }

                                        $location_entry = $output;
                                        break;
                                    }
                                }


                            $lot_countdown = 0;

                            if($status == "open"){
                                $countdown_item = $grouped_countdowns[$id];

                                foreach($countdown_item as $item){
                                    $item_lot_id = $item[1];

                                    if($item_lot_id == $lot_id){
                                        $lot_countdown = $item[2];
                                    }
                                }
                            }

                            $date = new DateTime("now", new DateTimeZone($timezone) );
                            $now = $date->format('Y-m-d H:i:s');
                            $timestamp = strtotime($now);

                            $lot_countdown = $lot_countdown * 1000;
                            $today = $timestamp * 1000;

                            $remaining_time = $lot_countdown - $today;

                        ?>


                        <div class="card">
                            
                            <div class="lot_mod lot_justify">
                                <div>
                                    <div class="picture">
                                        <img src="<?php echo $picture_name; ?>" alt="Lot Pic" class="lot_pic">
                                    </div>

                                    <hr>


                                    <div class="lot_name row"><?php echo $lot_name; ?> - <span class="chocolate">Lot ID: <?php echo $lot_id; ?></span></div>
                                    <div class="lot_description row"><p class="desc"><?php echo $lot_description; ?></p></div>
                                    <div class="asset_location row"><span class="chocolate"><?php echo $location_entry; ?></span></div>

                                    <div id="ending_lot_contianer_lot_<?php echo $lot_id; ?>_catalog_<?php echo $catalog_id; ?>">

                                    
                                        <?php if($status == "open") : ?>
                                            <div class="ending_datetime row time_remaining_row">
                                                <span class="time_remaining_label">Time Remaining:</span>
                                                <span class="time_remaining_val" id="lot_time_reamining_output_<?php echo $lot_id; ?>"></span>

                                                <input type="hidden" class="lot_time_rem_holder" id="lot_time_rem_holder_<?php echo $lot_id; ?>">
                                            </div>

                                        <?php else : ?>
                                        <div class="ending_datetime row">
                                            <span class="startbid">Bidding Started: <span class="chocolate"><?php echo $start_date; ?></span></span>
                                            <span class="endbid">Bidding Ends: <span class="chocolate"><?php echo $end_date; ?></span></span> 
                                        </div>
                                        <?php endif ; ?>
                                
                                    </div>


                                    <div class="bid_information row">
                                        <span class="bid_title">Current Bid:</span>
                                        
                                        <span class="current_bid"><span class="chocolate"><?php echo $bid_info; ?></span></span>

                                        <!-- <span class="current_bid"><span class="chocolate">$90.00 (USD)</span> - <span class="chocolate">j*****y</span> - <span class="chocolate">10 Bids</span></span> -->
                                    </div>
                                </div>

                                <div class="browse_bid_button">
                                    
                                    <br>

                                    <hr class="width_100">

                                        <span class="card_action_row watching_row" id="watching_row_id_<?php echo $lot_id; ?>">

                                            <!-- <a href="#" class="bidzbutton chocolate"><i class="far fa-eye"></i> Watch Item</a> -->
                                            
                                            <p class="watching_label">Watching?</p>

                                            <div class="catalog_switch_element">
                        
                                                <span id="no_watching_label_<?php echo $lot_id; ?>" class="left_label color_red bold"><i class="fas fa-times-circle"></i>No</span>

                                                <!-- Rounded switch -->
                                                <label class="switch">
                                                    <input type="checkbox" id="watching_switch_catalog_<?php echo $catalog_id; ?>??||&&lotname_<?php echo $lot_id; ?>" class="watching_catalog_switch" style="background-color: whitesmoke;" name="watching_switch_<?php echo $catalog_id; ?>_<?php echo $lot_id; ?>">
                                                    <span class="slider round"></span>
                                                </label>

                                                <span id="yes_watching_label_<?php echo $lot_id; ?>" class="right_label dilute color_green"><i class="fas fa-check"></i>Yes</span>

                                            </div>

                                        </span>
                                        <span class="card_action_row">

                                            <a href="<?php echo $root; ?>browse/lot.php?cat_id=<?php echo $catalog_id; ?>&lot_id=<?php echo $lot_id; ?>" class="bidzbutton devart"><i class="far fa-arrow-alt-circle-right"></i> View Lot</a>

                                        </span>
                                        
                                        <?php if($registration_status == "approved") : ?>

                                        <span class="card_action_row">
                                            <a href="#" class="bidzbutton orange"><i class="fas fa-gavel"></i> Bid on Lot</a>
                                        </span>

                                        <?php endif ; ?>
                                </div>
                            </div>
                        </div>
                        
                        <script>
                            var lot_id = <?php echo $lot_id; ?>;
                            var remaining_time = <?php echo $remaining_time; ?>;

                            if(remaining_time > 0){

                                var countdown_space = "#lot_time_reamining_output_" + lot_id;

                                var countdown_out = handleTimeCountdown(remaining_time);

                                var hidden_space = "#lot_time_rem_holder_" + lot_id;

                                $(countdown_space).html(countdown_out);

                                $(hidden_space).val(remaining_time);
                            }
                        </script>

                        <?php } ?>
                        
                        <div class="card card_container">
                            <div class="card lot_card_special">
                                <div class="lot_mod view_all_lots">
                                    <div class="view_all_lots_container icon_container">
                                        <i class="far fa-eye" aria-hidden="true"></i>
                                        <p class="view_all_text">View All Lots in Catalog</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lot_arrow_right lot_arrow" name="lot_arrow_right">

                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>

            </div>
        </div>

        <?php
            }
        ?>

    </div>
</section>


<?php include "../includes/footer.php"; ?>
<!-- Handle Scroll Buttons -->
<script>
    // $("#lot_arrow_left svg").hover(function(){
    //     $(this).css("background-color", "yellow");
    // }, function(){
    //     $(this).css("background-color", "pink");
    // });

    $(document).ready(function() {
        $(".lot_arrow svg").mouseenter(function() {
            var id = $(this).parent().attr("name");

                $(this).find("path, polygon, circle").attr("fill", "chocolate");

            // $(this).parent().parent().find(".scrolling-wrapper .card:first-child").css("color", "green");
        });
        $(".lot_arrow svg").mouseleave(function() {
            var id = $(this).parent().attr("name");


            $(this).find("path, polygon, circle").attr("fill", "black");

        });
    });
</script>
<script>

    // Handle scrolling lots
    // var width = $(".card").outerWidth(true);

    var width, right_scroll_param, left_scroll_param;

    function start_slider(){
        width = getWidth();
        right_scroll_param = "+=" + width + "px"; 
        left_scroll_param = "-=" + width + "px"; 
    
    }



    $(".lot_arrow_right").click(function() {
      event.preventDefault();
      $('.lot_lister').animate({
        scrollLeft: right_scroll_param
      }, "slow");

   });
    $(".lot_arrow_left").click(function() {
      event.preventDefault();
      $('.lot_lister').animate({
        scrollLeft: left_scroll_param
      }, "slow");

   });

   // Handle Show and Hide Lots
   $( ".drop_down_container" ).on( "click", function() {

       var id_item = $(this).attr("id");
       var id = id_item.replace("hide_show_", "");

       var id_showing = "#showing_lots_" + id;
       var id_container = "#lot_number_" + id;

       var showing_item = $(id_showing).val();

       var replace_hidden = "#replace_hidden_" + id;
       var replace_show = "#replace_show_" + id;
       
       if(showing_item == "0" || showing_item == 0){
            $(id_showing).val(1);
            $(id_container).slideUp(500, function() { 
                $(this).css('display', 'none');
            });

            $(replace_hidden).css("display", "none");
            $(replace_show).css("display", "flex");
       }
       else{
           $(id_showing).val(0);
           $(id_container).slideDown(500, function() { 
                $(this).css('display', 'flex');
            });

            $(replace_hidden).css("display", "flex");
            $(replace_show).css("display", "none");
       }

       
       width = getWidth();
       start_slider();
    });

    function getWidth(){
       var width = $(".card").outerWidth(true);

       var scrolling_wrapper = $(".lot_container_lister").width();
    
       var ret = (scrolling_wrapper - 42)/3;


       return ret;
    }
</script>
<!-- Convert location string to pretty string -->
<script>

    function prettify_location(loc){
        
        var comps = loc.split("??||&&");

        var id = comps[0];
        var address1 = comps[1];
        var address2 = comps[2];
        var city = comps[3];
        var state = comps[4];
        var country = comps[5];

        var output = "";

        if(address2 == -1){
            output = address1 + ", " + city + ", " + state + ", " + country;
        }
        else{
            output = address1 + ", " + address2 + ", " + city + ", " + state + ", " + country;
        }

        return output;
    }
</script>
<!-- Convert array of php locations to json -->
<script>
    var locs = <?php echo json_encode($locations); ?>;
    var all_ids = <?php echo json_encode($id_s); ?>;

</script>

<!-- Handle Location Modal -->
<script>

    var multi_list = [];

    // show modals
    $(".show_location_modal").on("click", function(e){
        e.preventDefault();

        var name = $(this).attr("name");

        var catalog_id = $(this).find("span").attr("name");
        catalog_id = catalog_id.replace("catalog_name_", "");

        var count = name.replace("location_number_", "");
            

        if(count == 1){
            $("#SINGLE_cat_location_details_modal").show();   
            
            var location_entry = "";

            for(var l =0; l<locs.length; l++){
                var curr = locs[l];
                var loc_id = all_ids[l];
                

                if(catalog_id == loc_id){
                    var loc = curr[0];
                    var single_entry = prettify_location(loc);

                    var map_string = "https://www.google.com/maps/embed/v1/place?key=AIzaSyAcc17FcMQWYboFujZkLZ5TNA59CAqrBjs&q=" + single_entry;

                    $("p#one_location_text").text(single_entry);
                    $("#SINGLE_cat_location_details_modal iframe").attr("src", map_string);
                }
            }
        }
        else{
            var empty_option = `<option value="-1">Choose a location</option>`;

            $("#MULTI_cat_location_details_modal").show();
            $("#MULTI_cat_location_details_modal select#location_list").empty();

            $("#MULTI_cat_location_details_modal select#location_list").append(empty_option);

            var location_entry = [];

            for(var m =0; m<locs.length; m++){
                var curr = locs[m];
                var loc_id = all_ids[m];

                if(catalog_id == loc_id){
                    for(var j = 0; j<curr.length; j++){
                        var loc_string = curr[j];
                        var entry = prettify_location(loc_string);
                        multi_list.push(entry);

                        var option = `<option value="${j}">${entry}</option>`;
                        $("#MULTI_cat_location_details_modal select#location_list").append(option);
                    }
                }
            }
        }
    });

    $("#MULTI_cat_location_details_modal select#location_list").change(function(){
        var value = $(this).val();

        var output = multi_list[value];

        var map_string = "https://www.google.com/maps/embed/v1/place?key=AIzaSyAcc17FcMQWYboFujZkLZ5TNA59CAqrBjs&q=" + output;
        $("#MULTI_cat_location_details_modal iframe").attr("src", map_string);
    });

    // close map button
    $("#close_button a").click(function(e){
        e.preventDefault();

        multi_list = [];

        $("#MULTI_cat_location_details_modal").hide();
        $("#SINGLE_cat_location_details_modal").hide(); 
    });
</script>
<!-- Handle catalog open countdown -->
<script>
    var starting_time = <?php echo $catalog_open_countdown; ?>;

    // var all_time_openings = <?php echo $catalog_open_countdown; ?>;

    // for(var a = 0; a < all_time_openings; a++){
    //     var time_remain = all_time_openings[a];

    //     console.log(time_remain);
    // }


    // here is the formula for countdown
    // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    // var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    // var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    

    function getIndexFromJSON(myjson, current){
        var catalogID = current.catalog_id;

        var index;

        for(var i = 0; i < myjson.length; i++){
            var item = myjson[i];

            var cat_id = item.catalog_id;

            if(catalogID == cat_id){
                index = i;
            }
        }

        return index;
    }

    function open_catalog_dynamically(id){
        
        $.post("../includes/global/catalog_open.php",{
            id: id
        },
        function(data,status){
        });
    }


    var l = setInterval(function(){

        $( ".lot_time_rem_holder" ).each(function() {
            var myid = $(this).attr("id");
            var hidden_id = "#" + myid;
            var lot_id = myid.replace("lot_time_rem_holder_", "");
            
            var current_time = $(hidden_id).val();
        
            
            var new_time = current_time - 1000;

            var new_time_out = handleTimeCountdown(new_time);

            $(hidden_id).val(new_time);

            var display_id = "#lot_time_reamining_output_" + lot_id;
            
            $(display_id).html(new_time_out);
        });

    }, 1000);

    var open_status = [];

    
    function handleLots(list_of_lots, catalog_id){
        for(var v = 0; v < list_of_lots.length; v++){
            var curr = list_of_lots[v];


            var lot_id = curr[0];
            var end_time = curr[1];

            var output_div = "#ending_lot_contianer_lot_" + lot_id + "_catalog_" + catalog_id;
            
            var lot_countdown = `
                <div class="ending_datetime row time_remaining_row">
                    <span class="time_remaining_label">Time Remaining:</span>
                    <span class="time_remaining_val" id="lot_time_reamining_output_${lot_id}"></span>

                    <input type="hidden" class="lot_time_rem_holder" id="lot_time_rem_holder_${lot_id}" value="${end_time}">
                </div>
            `;

            $(output_div).html(lot_countdown);
            
        }
    }

    function getLots(catalog_id){

        $.ajax({
            type: 'POST',
            url: "<?php echo $root; ?>includes/global/get_lot_countdown.php",
            async: false,
            dataType: "JSON",
            data: {
                'catalog_id': catalog_id
            },
            success: function (out) {
                handleLots(out, catalog_id);
            }
        });
    }

    function start_lots( hidden_id, output, catalog_id){
        // open up
        $(hidden_id).val(-1);
        $(output).text("Auction in Progress");

        if(jQuery.inArray(catalog_id, open_status) !== -1){
            // do nothing
        }
        else{
            open_status.push(catalog_id);
            open_catalog_dynamically(catalog_id);

            // get all lot ids within this catalog
            getLots(catalog_id);

        }

    }
    var c = setInterval(function(){
        $(".catalog_countdown_tracker").each(function() {
            var id = $(this).attr("id");
            var catalog_id = id.replace("catalog_countdown_", "");
            var hidden_id = "#" + id;

            var time = $(hidden_id).val();
            
            if(time > 0) {
                time = time - 1000;
                var time_out = handleTimeCountdown(time);
                $(hidden_id).val(time);

                var output = "#bidding_countdown_display_" + catalog_id;

                if(time > 0){
                    $(output).text("Bidding Opens in: " + time_out);
                }
                else{
                    start_lots(hidden_id, output, catalog_id);
                }
            }
            else{
                start_lots(hidden_id, output, catalog_id);
            }
        });
    },1000);

    // var x = setInterval(function() {
        
    //     for(var i =0; i < starting_time.length; i++){
    //         var curr = starting_time[i];

    //         var catalog_id = curr.catalog_id;
    //         var time_remaining = curr.time_remaining;

    //         var remain = handleTimeCountdown(time_remaining);

    //         var out_id = "#bidding_countdown_display_" + catalog_id;

    //         var index = getIndexFromJSON(starting_time, curr);

    //         if(starting_time[index].time_remaining == -1){
    //             continue;
    //         }
    //         if(remain == -1){
    //             $(out_id).text("Auction in Progress");

    //             open_catalog_dynamically(catalog_id);
    //             starting_time[index].time_remaining = -1;
    //             continue;
    //         }


    //         var single = starting_time[index];
    //         var time_remaining = single.time_remaining;
    //         var new_time = parseInt(time_remaining) - 1000;

    //         starting_time[index].time_remaining = new_time;

    //         $(out_id).text("Bidding Opens in: " + remain);
    //     }
    // }, 1000);
</script>

<!-- Handle change of watching switch -->
<script>

    $(document).ready(function(){

        $('.watching_catalog_switch').on('change', function() {
            var switch_id = $(this).attr('id');
            var switch_status = $(this).is(":checked");

            var username = "<?php echo $username; ?>";
            
            var switch_comps = switch_id.split("??||&&");
            
            var switch_catalog_id = switch_comps[0].replace("watching_switch_catalog_", "");
            var switch_lot_id = switch_comps[1].replace("lotname_", "");

            var yes_label_id = "#yes_watching_label_" + switch_lot_id;
            var yes_element = $(yes_label_id);

            var no_label_id = "#no_watching_label_" + switch_lot_id;
            var no_element = $(no_label_id);

            if(switch_status == true){
                watching_switch_on(switch_catalog_id, switch_lot_id, username);
                
                yes_element.addClass("bold");
                yes_element.removeClass("dilute");
                
                no_element.addClass("dilute");
                no_element.removeClass("bold");
            }
            else if(switch_status == false){
                watching_switch_off(switch_catalog_id, switch_lot_id, username);

                yes_element.removeClass("bold");
                yes_element.addClass("dilute");
                
                no_element.removeClass("dilute");
                no_element.addClass("bold");
            }
        });

        function watching_switch_on(catalog_id, lot_id, username){
            $.ajax({
                type: 'POST',
                url: "../helpers/watching_query.php",
                async: false,
                dataType: "html",
                data: {
                    'status': 'on',
                    'catalog_id': catalog_id,
                    'lot_id': lot_id,
                    'username': username
                },
                success: function (msg) {
                }
            });
        }
        function watching_switch_off(catalog_id, lot_id, username){
            
            $.ajax({
                type: 'POST',
                url: "../helpers/watching_query.php",
                async: false,
                dataType: "html",
                data: {
                    'status': 'off',
                    'catalog_id': catalog_id,
                    'lot_id': lot_id,
                    'username': username
                },
                success: function (msg) {
                }
            });
            
        }
        
    });

</script>

<!-- Toggle Checkboxes for currently watching -->
<script type='text/javascript'>

    <?php
        $temp_array = json_encode($lot_checked_array);
        echo "var js_lot_checked_array = ". $temp_array . ";\n";
    ?>

    var js_lot_checked_array = js_lot_checked_array;

    for(var w = 0; w<js_lot_checked_array.length; w++){
        var element = js_lot_checked_array[w];
        var comps = element.split("??||&&");

        var catalog_id = comps[0];
        var lot_id = comps[1];
        
        var name = "watching_switch_" + catalog_id + "_" + lot_id;
        var checkbox_id = 'input[name=' + name + ']';
        $(checkbox_id).attr('checked', true);

    }


</script>

<script>
    // open login button
    $(".login_open").on("click", function(e){
        e.preventDefault();

        $("#login_modal").css("display", "block");
    });
</script>

<?php include "registration_questions.php"; ?>