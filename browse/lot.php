<?php
    include "../includes/connect.php";
    // get lot and catalog id
    if(!isset($_GET['cat_id']) || !isset($_GET['lot_id'])){
        header("location: browse.php");
        exit();
    }
    $catalog_id = $_GET['cat_id'];
    $lot_id = $_GET['lot_id'];

    // determine if catalog is open
    $catalog_status_sql = "SELECT * FROM `catalog_status` WHERE `cat_id`=$catalog_id";
    $catalog_status_result = mysqli_query($conn, $catalog_status_sql);
    $catalog_status_row = mysqli_fetch_assoc($catalog_status_result);

    $catalog_status = $catalog_status_row['status'];

    if($catalog_status != "open" && $catalog_status !="published"){
        header("location: browse.php");
        exit();
    }

    $browse_lot_sql = "SELECT * FROM `lots` WHERE `id`=$lot_id AND `catalog_id`=$catalog_id";
    $browse_lot_result = mysqli_query($conn, $browse_lot_sql);
    $lot_number = mysqli_num_rows($browse_lot_result);

    if($lot_number != 1){
        header("location: browse.php");
        exit();
    }

    $cat_id = $catalog_id;
?>
<?php include "../includes/header.php"; ?>
<?php include "search_modal.php"; ?>
<?php include_once "../helpers/date_conversion.php"; ?>
<?php include "../helpers/asset_location_modal.php"; ?>
<?php include "../helpers/location_output.php"; ?>

<?php
    $lot_row = mysqli_fetch_assoc($browse_lot_result);


    $lot_id = $lot_row['id'];
    $lot_name = $lot_row['name'];
    $lot_description = $lot_row['description'];

    $category = $lot_row['category'];
    $other_category = $lot_row['other_category'];

    $lot_location = $lot_row['lot_location'];

    $current_location = $lot_location;

    $location_sql = "SELECT * FROM `catalogs` WHERE `id`=$cat_id";
    $location_result = mysqli_query($conn, $location_sql);
    $location_row = mysqli_fetch_assoc($location_result);

    $all_locations = array();
    
    for($l=0; $l < 5; $l++){
        $num = $l +1;
        $col = "asset_location_" . $num;

        $temp = $location_row[$col];

        if($temp != -1){
            array_push($all_locations, $temp);
        }
    }

    $location_output = "";
    for($l =0; $l<count($all_locations); $l++){
        $curr = $all_locations[$l];

        $comps = explode("??||&&", $curr);

        $id = $comps[0];

        if($id == $lot_location){
            $location_output = $curr;
            break;
        }
    }

    $location_output = loc_output($location_output);
    
    $map = "https://www.google.com/maps/embed/v1/place?key=AIzaSyAcc17FcMQWYboFujZkLZ5TNA59CAqrBjs&q=" . $location_output;
?>

<section id="lot_details_page" class="lot_details_page">
    
    <h2 class="auctions section_heading"><span>Lot #<?php echo $lot_id; ?> - <?php echo $lot_name; ?></span></h2>

    <div class="button_container">
        <a href="#" class="bidzbutton orange"><i class="fas fa-arrow-left"></i> Back to Catalog</a>
    </div>

    <div id="lot_details_container">

        <div id="lot_details_left_column">
            
            <div id="lot_pagination">

                <a href="#" class="lot_pagination_link" id="lot_pagination_previous"><i class="fas fa-arrow-left"></i> Previous Lot</a>

                <span id="current_lot_id">Lot #<?php echo $lot_id; ?></span>

                <a href="#" class="lot_pagination_link" id="lot_pagination_next">Next Lot <i class="fas fa-arrow-right"></i></a>

            </div>
<!-- 
            <div id="lot_note_taking">
                <a href="#" class="bidzbutton devart"><i class="fas fa-edit"></i> Take Notes</a>
            </div> -->

            <?php
                // Get lot pictures 
                $picture_sql = "SELECT * FROM `lot_picture_order` WHERE `cat_id`=$cat_id AND `lot_id`=$lot_id";
                $picture_result = mysqli_query($conn, $picture_sql);
                $picture_row = mysqli_fetch_assoc($picture_result);
                $picture_list = $picture_row['sequence'];

                $all_pictures = explode("||", $picture_list);

                $picture_links = array();

                for($p = 0; $p<count($all_pictures); $p++){
                    $picture_id = $all_pictures[$p];

                    if($picture_id == ""){
                        continue;
                    }
                    
                    $lot_picture_sql = "SELECT * FROM `lot_pictures` WHERE `id`=$picture_id";
                    $lot_picture_result = mysqli_query($conn, $lot_picture_sql);
                    while($lot_picture_row = mysqli_fetch_assoc($lot_picture_result)){
                        $picture = $lot_picture_row['picture'];
                        $pic_link = "lots/pictures/" . $picture;
                        array_push($picture_links, $pic_link);
                    }
                }

            ?>
            <div id="lot_picture_container">
                <?php if(count($picture_links) == 0) : ?>
                    <img src="<?php echo $root; ?>img/no_image.png" alt="No Image">
                <?php else : ?>
                    <img src="<?php echo $root . $picture_links[0]; ?>" alt="No Image">
                <?php endif ; ?>
                
            </div>

            <?php if(count($picture_links) != 0) : ?>
            <div id="list_of_lot_pictures">
                <?php for($p = 0; $p<count($picture_links); $p++) : 
                    $picture = $picture_links[$p];    
                ?>
                <img src="<?php echo $root . $picture; ?>" alt="No Image">
                <?php endfor ; ?>
            </div>
            <?php endif ; ?>

            <h4 class="sign_heading"><span>Asset Location</span></h4>

            <div id="lot_location_container">
                        
                <iframe
                width="600"
                height="450"
                frameborder="0"
                src="<?php echo $map; ?>" allowfullscreen>
                </iframe>

            </div>

        </div>

        <div id="lot_details_right_column">
            
            <div class="lot_details_basic_information">

                <div class="lot_details_entry">
                    <span class="entry_answer"><?php echo $lot_name; ?></span>
                </div>

                <span class="orange_dash"></span>

                <div class="lot_details_entry">
                    <span class="entry_answer"><?php echo $lot_description; ?></span>
                </div>

                <span class="orange_dash"></span>
                
                <div class="lot_details_entry">

                    <?php 
                        $category;
                        $other_category;
                        
                        $category_output = array();

                        $category_list = explode("-", $category);
                        for($c = 0; $c<count($category_list); $c++){
                            $curr = $category_list[$c];

                            if($curr == 0){
                                array_push($category_output, $other_category);
                            }
                            else{
                                if($c == 0){
                                    $category_sql = "SELECT * FROM `cat_tier1` WHERE `id`=$curr";
                                }
                                else if($c == 1){
                                    $category_sql = "SELECT * FROM `cat_tier2` WHERE `id`=$curr";
                                }
                                else if($c == 2){
                                    $category_sql = "SELECT * FROM `cat_tier3` WHERE `id`=$curr";
                                }
                                else if($c == 3){
                                    $category_sql = "SELECT * FROM `cat_tier4` WHERE `id`=$curr";
                                }

                                $category_result = mysqli_query($conn, $category_sql);
                                $category_row = mysqli_fetch_assoc($category_result);

                                $category_name = $category_row['name'];

                                array_push($category_output, $category_name);
                            }
                        }
                    ?>

                    <span class="category_list">
                        <span class="category_item"><?php echo $category_output[0]; ?></span>
                        <?php
                            for($c = 1; $c<count($category_output); $c++) {
                        ?>
                                <span class="category_seperator category_item">&#11157;</span>
                                <span class="category_item"><?php echo $category_output[$c]; ?></span>
                        <?php  
                            }
                        ?>
                        <!-- <span class="category2">&#11157; Mitchell</span>
                        <span class="category3">&#11157; Halaby</span>
                        <span class="category4">&#11157; TheBest</span> -->
                    </span>
                    <!-- <span class="category_list">Jordan &#11157; Halaby &#11157; Wins</span> -->
                    <!-- <span class="category_tier category_line1">Category 1</span><br>
                    <span class="category_tier category_line2">&#8627;Category 2</span><br>
                    <span class="category_tier category_line3">&#8627;Category 3</span><br>
                    <span class="category_tier category_line4">&#8627;Category 4</span><br>
                    <span class="category_tier category_line5">&#8627;Category Other</span> -->
                </div>
            </div>



            <h4 class="sign_heading bidding_heading"><span>Bidding</span></h4>

            <div id="bidding_container">

                <div id="current_bid">
                    <span class="current_bid_item">Current Bid: $190</span>
                    <span class="seperator">|</span>
                    <span class="current_bid_item">Minimum Bid: $210</span>
                    <span class="seperator">|</span>
                    <span class="current_bid_item">Bid Increment: $10</span>
                </div>

                <div id="leader_information">
                    <span class="bidder_information">Leader: j****y</span>
                    <span class="seperator">|</span>
                    <span class="bidder_information">Bid History: 23 Bids</span>
                </div>
                
                <!-- <div id="lot_ending_countdown">
                    <span class="countdown">End Time: 1 day, 3 hours, 26 minutes, 30 seconds</span>
                </div> -->


                <div class="bidding_buttons">
                    <div class="bid_labels">
                        <span class="bid_proxy_label">Bid</span>
                    </div>

                    <div class="bid_inputs">
                        <input type="text" class="input_text bidding_input" id="proxybid" name="proxybid" placeholder="Enter A Minimum Bid">
                    </div>

                    <div class="bid_labels bid_currency_labels">
                        <span class="currency_label_lot">$ (USD)</span>
                    </div>

                    <div class="bid_button">
                        <a href="#" class="btn place_bid">Place Bid</a>
                    </div>
                </div>


                <div id="lot_ending_countdown">
                        <span class="countdown">Time Remaining: 1 day, 3 hours, 26 minutes, 30 seconds</span>
                    </div>


                <div id="watching_button_container">

                    <div id="catalog_switch_element">
 
                        <span class="left_label color_red"><strong><i class="fas fa-times-circle"></i> Not Watching</strong></span>
                    
                        <!-- Rounded switch -->
                        <label class="switch">
                            <input type="checkbox" id="registration_question_switch" style="background-color: whitesmoke;">
                            <span class="slider round"></span>
                        </label>
                    
                        <span class="right_label dilute color_green"><i class="fas fa-check"></i>Watching</span>

                    </div>

                    <!-- <div id="watching_button_row1" class="watching_button_row">

                        <span id="currently_watching">Currently <span class="watching_label color_green"><i class="far fa-eye"></i>  Watching</span>

                        <a href="#" class="bidzbutton devart" id="watch_button">Watch Lot</a>

                    </div> -->

                
                    <?php if($logged_in) : ?>
                    <div id="watching_button_row2" class="watching_button_row">

                        <a href="#" class="bidzbutton orange" id="registration_button"><i class="far fa-check-circle"></i> Register To Bid</a>

                        <a href="#" class="bidzbutton devart"><i class="fas fa-edit"></i> Take Notes</a>

                        <a href="#" class="bidzbutton medblue" id="message_seller_button"><i class="far fa-comments"></i> Contact Seller</a>

                    </div>
                    <?php else : ?>
                        <div id="watching_button_row2" class="watching_button_row">
                            <p class="logged_out_disclaimer"><a href="#" class="login_open">Log in</a> to register to bid or contact seller</p>
                        </div>
                    <?php endif ; ?>
                
                </div>

            </div>

            <h4 class="sign_heading bidding_heading"><span>Extended Bidding</span></h4>
            <div id="extended_bidding_container">
                <p class="extended_bidding_information">Extended Bidding Enabled, blah blah blah</p>
            </div>

            <h4 class="sign_heading manage_catalog_heading lot_details_heading">
                <span class="catalog_heading">Lot Details</span>
                <span class="catalog_arrow sort_up" style="display: flex;"><a href="#" class="" id="" style="display: flex;"><i class="fas fa-sort-up" aria-hidden="true"></i></a></span>
                <span class="catalog_arrow sort_down" style="display: none;"><a href="#" class="" id="" style="display: block;"><i class="fas fa-sort-down" aria-hidden="true"></i></a></span>
            </h4>


            <div id="lot_details_container">
                <div class="current_info">
                    <div class="current_info_table">


                        <?php
                            // get catalog start timestamp

                            $starts_on_sql = "SELECT * FROM `catalogs` WHERE`id`=$catalog_id";
                            $starts_on_result = mysqli_query($conn, $starts_on_sql);
                            $starts_on_row = mysqli_fetch_assoc($starts_on_result);

                            $start_date = sql_to_date($starts_on_row['start_date']);
                            $start_time = $starts_on_row['start_time'];
                            $catalog_timezone = $starts_on_row['timezone'];

                            $time_sql = "SELECT * FROM `time` WHERE `military_time`=$start_time";
                            $time_result = mysqli_query($conn, $time_sql);
                            $time_row = mysqli_fetch_assoc($time_result);
                            
                            $start_time = $time_row['display_time'];
                        ?>
                        <div class="current_info_row">
                            <div class="no_bottom_border current_info_cell current_info_left">
                                Starts On : 
                            </div>

                            <div class="no_bottom_border current_info_cell current_info_right">
                                <?php echo $start_date; ?> @ <?php echo $start_time; ?> (<?php echo $catalog_timezone; ?>)
                            </div>
                        </div>
                        <div class="current_info_row">
                            <div class="no_bottom_border current_info_cell current_info_left">
                                Time Remaining : 
                            </div>

                            <div class="no_bottom_border current_info_cell current_info_right">
                                <?php echo $start_date; ?> @ <?php echo $start_time; ?> (<?php echo $catalog_timezone; ?>)
                            </div>
                        </div>
                    </div>

                    <?php
                        $catalog_id = $_GET['cat_id'];
                        $lot_id = $_GET['lot_id'];

                        // Populate table with data
                        $catalog_table_sql = "SELECT * FROM `catalogs` WHERE `id`=$catalog_id";
                        $catalog_table_result = mysqli_query($conn, $catalog_table_sql);
                        $catalog_table_row = mysqli_fetch_array($catalog_table_result);

                        $lot_table_sql = "SELECT * FROM `lots` WHERE `id`=$lot_id";
                        $lot_table_result = mysqli_query($conn, $lot_table_sql);
                        $lot_table_row = mysqli_fetch_array($lot_table_result);

                        $auction_type = $catalog_table_row['auction_type'];
                        $bidding_type = 'strict';
                        $featured_lot = $lot_table_row['featured_lot'];


                        $starting_bid = $lot_table_row['starting_bid'];
                        $bid_increment = $lot_table_row['bid_increment'];
                        $increment_type = $lot_table_row['increment_type'];
                        
                        $buyer_premium = $catalog_table_row['buyer_premium'];
                        $tax_on_hammer = "????";

                        $high_bidder = "???";
                        $bid_history = "???";

                        $reserve_amount = $lot_table_row['reserve_amount'];
                        $allow_freeze = $lot_table_row['allow_freeze'];

                        $times_the_bid = $lot_table_row['times_the_bid'];
                        $quantity = $lot_table_row['quantity'];

                        $units = $lot_table_row['units'];
                        $brand = $lot_table_row['brand'];
                        $condition = $lot_table_row['condition'];

                        $size = $lot_table_row['size'];
                        $weight = $lot_table_row['weight'];

                        if($quantity == "") {
                            $quantity = "-";
                        }
                        if($units == ""){
                            $units = "-";
                        }
                        if($brand == ""){
                            $brand = "-";
                        }
                        if($condition == ""){
                            $condition = "-";
                        }
                        if($size == ""){
                            $size = "-";
                        }
                        if($weight == ""){
                            $weight = "-";
                        }
                    ?>
                    
                    <div class="extra_info_table">

                        <div class="extra_info_row">

                            <div class="extra_info_cell large_cell cell_caption">Auction Type :</div>
                            <div class="extra_info_cell second_cell"><?php echo $auction_type; ?></div>
                            <div class="extra_info_cell cell_caption">Featured Lot?</div>
                            <div class="extra_info_cell second_cell"><?php echo $featured_lot; ?></div>
                            <div class="extra_info_cell cell_caption">Bidding Type :</div>
                            <div class="extra_info_cell second_cell"><?php echo $bidding_type; ?></div>

                        </div>
                    </div>

                    <div class="extra_info_table">

                        <div class="extra_info_row">

                            <div class="extra_info_cell large_cell cell_caption">Starting Bid :</div>
                            <div class="extra_info_cell second_cell"><?php echo $starting_bid; ?></div>
                            <div class="extra_info_cell cell_caption">Bid Increment :</div>
                            <div class="extra_info_cell second_cell"><?php echo $bid_increment; ?></div>
                            <div class="extra_info_cell cell_caption">Increment Type:</div>
                            <div class="extra_info_cell second_cell"><?php echo $increment_type; ?></div>

                        </div>
                    </div>
                    <div class="lot_info_table middle_table">
                        <div class="lot_info_row">
                            <div class="lot_info_cell large_cell cell_caption">Buyer's Premium :</div>
                            <div class="lot_info_cell second_cell"><?php echo $buyer_premium; ?></div>
                            <div class="lot_info_cell cell_caption">Tax on Hammer :</div>
                            <div class="lot_info_cell second_cell"><?php echo $tax_on_hammer; ?></div>
                        </div>
                        <div class="lot_info_row">
                            <div class="lot_info_cell large_cell cell_caption">High Bidder :</div>
                            <div class="lot_info_cell second_cell"><?php echo $high_bidder; ?></div>
                            <div class="lot_info_cell cell_caption">Bid History :</div>
                            <div class="lot_info_cell second_cell"><?php echo $bid_history; ?></div>
                        </div>
                        <div class="lot_info_row">
                            <div class="lot_info_cell large_cell cell_caption">Reserve :</div>
                            <div class="lot_info_cell second_cell"><?php echo $reserve_amount; ?></div>
                            <div class="lot_info_cell cell_caption">Freezing Enabled :</div>
                            <div class="lot_info_cell second_cell"><?php echo $allow_freeze; ?></div>
                        </div>
                        <div class="lot_info_row">
                            <div class="lot_info_cell large_cell cell_caption">Times the Bid Enabled :</div>
                            <div class="lot_info_cell second_cell"><?php echo $times_the_bid; ?></div>
                            <div class="lot_info_cell cell_caption">Quantity :</div>
                            <div class="lot_info_cell second_cell"><?php echo $quantity; ?></div>
                        </div>
                    </div>


                    <div class="extra_info_table">

                        <div class="extra_info_row">

                            <div class="extra_info_cell large_cell cell_caption">Units :</div>
                            <div class="extra_info_cell second_cell"><?php echo $units; ?></div>
                            <div class="extra_info_cell cell_caption">Brand :</div>
                            <div class="extra_info_cell second_cell"><?php echo $brand; ?></div>
                            <div class="extra_info_cell cell_caption">Condition :</div>
                            <div class="extra_info_cell second_cell"><?php echo $condition; ?></div>

                        </div>
                    </div>

                    <div class="extra_info_table last_table">

                        <div class="extra_info_row">

                            <div class="extra_info_cell large_cell cell_caption">Size :</div>
                            <div class="extra_info_cell second_cell"><?php echo $size; ?></div>
                            <div class="extra_info_cell cell_caption">Weight :</div>
                            <div class="extra_info_cell second_cell"><?php echo $weight; ?></div>

                        </div>
                    </div>

                </div>
            </div>
        </div>



        

    </div>


    <!-- Handle Catalog Ownership -->

    <?php

        // Catalog Stuff
        $cat_id;

        $catalog_sql = "SELECT * FROM `catalogs` WHERE `id`=$cat_id";
        $catalog_result = mysqli_query($conn, $catalog_sql);
        $catalog_row = mysqli_fetch_assoc($catalog_result);

        $locations = array();
        $location_text = array();

        $contacts = array();
        $inspections = array();
        $removals = array();

        for($c = 1; $c <=10; $c++){
            $key = "contact_" . $c;

            $contact = $catalog_row[$key];

            if($contact != "-1" && $contact != -1){
                array_push($contacts, $contact);
            }
        }

        for($i = 1; $i <= 10; $i++){
            $key = "inspection_" . $i;

            $inspection = $catalog_row[$key];

            if($inspection != "-1" && $inspection != -1){
                array_push($inspections, $inspection);
            }
        }
        for($i = 1; $i <= 10; $i++){
            $key = "removal_" . $i;

            $removal = $catalog_row[$key];

            if($removal != "-1" && $removal != -1){
                array_push($removals, $removal);
            }
        }

        for($i = 1; $i <=5; $i++){
            $key = "asset_location_" . $i;

            $loc = $catalog_row[$key];
            $loc_output = loc_output($loc);

            if($loc != "-1" && $loc != -1){
                array_push($locations, $loc);
                array_push($location_text, $loc_output);
            }
        }


        $location_ids = array();
        $current_location_option = "";
        foreach($locations as $location){
            $comps = explode("??||&&", $location);
            $location_id = $comps[0];

            array_push($location_ids, $location_id);

            if($current_location == $location_id){
                $current_location_option = loc_output($location);
            }
        }


        // echo $current_location;
        // var_dump($locations);
        // var_dump($location_text);
        // var_dump($location_ids);
        // echo $current_location . " -- " . $current_location_option;

        $terms_conditions = $catalog_row['terms_conditions'];
        $owner = $catalog_row['owner'];


        // Seller Stuff

        $seller_sql = "SELECT * FROM `users` WHERE `username`='$owner'";
        $seller_result = mysqli_query($conn, $seller_sql);
        $seller_row = mysqli_fetch_assoc($seller_result);

        $company_name = $seller_row['company_name'];
        $company_logo = $seller_row['company_logo'];
        $company_website = $seller_row['company_website'];
        $company_phone = $seller_row['company_phone'];
              
        // Search the pattern
        if (!preg_match("~^(?:f|ht)tps?://~i", $company_website)) {
                
            // If not exist then add http
            $company_website = "http://" . $company_website;
        }
        
        $affiliation1 = $seller_row['affiliation1'];
        $affiliation2 = $seller_row['affiliation2'];
        $affiliation3 = $seller_row['affiliation3'];
          
        // Declare a variable and initialize 
        // it with URL
    ?>
        
    <div id="auction_information" class="catalog_information">

        <h2 class="auctions section_heading"><span>Catalog Details</span></h2>

        <ul id="nav_tabs">
            <li class="nav_item active"><a href="#" id="module1" name="auctioneer_and_asset" class="nav_link">Auctioneer Information and Terms and Conditions</a></li>
            <li class="nav_item"><a href="#"  id="module2" name="contact_and_asset_location" class="nav_link">Asset Location and Contact Information</a></li>
            <li class="nav_item"><a href="#" id="module3" name="inspection_and_removal" class="nav_link">Inspection and Removal Times</a></li>
        </ul>

        <div class="module_container module_container_start">

            <div class="auc_module" id="auctioneer_and_asset">
                <div id="auctioneer_info">
                    <h4 class="sign_heading"><span>Auctioneer Information</span></h4>

                    <div id="auctioneer_name_and_logo">
                        <h4 class="auctioneer_name"><?php echo $company_name; ?></h4>
                        
                        <?php if($company_logo != "") : ?>
                        
                            <img src="<?php echo $root; ?>img/sellers/<?php echo $company_logo; ?>" alt="Auctioneer Logo" class="auctioneer_logo">
                        <?php endif ; ?>

                        <?php if($company_website != "") : ?>
                            <a href="<?php echo $company_website; ?>" target="_blank" class="auctioneer_website">Visit Auctioneer Webiste (<?php echo $company_website; ?>)</a>
                        <?php endif ; ?>

                        <?php if($company_phone != "") : ?>
                            <span class="company_phone">Comapny Phone #: <?php echo $company_phone; ?></span>
                        <?php endif ; ?>


                        <hr class="border_chocolate" />
                        <hr class="border_black" />

                        <div class="affiliation_label">
                            <span>Affiliations</span>
                        </div>
                        <div id="affiliations">
                            <span class="affiliation"><?php echo $affiliation1; ?></span>
                            <span class="affiliation"><?php echo $affiliation2; ?></span>
                            <span class="affiliation"><?php echo $affiliation3; ?></span>
                            <!-- <img src="http://bidzwon.com/dev/img/cube_pictures_test/3.png" alt="" class="aff">
                            <img src="http://bidzwon.com/dev/img/cube_pictures_test/4.png" alt="" class="aff">
                            <img src="http://bidzwon.com/dev/img/cube_pictures_test/7.png" alt="" class="aff"> -->
                        </div>
                    </div>

                </div>

                <div id="terms_and_conditions">
                    <h4 class="sign_heading"><span>Terms and Conditions</span></h4>

                    <?php echo $terms_conditions; ?>
                </div>
            </div>
        </div>

        <div class="module_container">

            <div class="auc_module" id="contact_and_asset_location">
                <div id="asset_location">
                    <h4 class="sign_heading"><span>Asset Location</span></h4>

                    <iframe id="google_map_embed" width="100%" height="425" frameborder="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAcc17FcMQWYboFujZkLZ5TNA59CAqrBjs&q=<?php echo $current_location_option; ?>"></iframe>

                    <?php if(count($location_ids) > 1) : ?>
                    <div id="map_holder">
                        <select name="map_choser" id="map_choser">
                            <option value="">Choose A Location</option>
                            <?php for($m = 0; $m < count($location_text); $m++) : ?>
                                <?php
                                    $location_name = $location_text[$m];
                                    $location_id = $location_ids[$m];

                                    $current_location;

                                    $selected = "";
                                    if($current_location == $location_id){
                                        $selected = "selected";
                                    }
                                ?>
                                <option value="<?php echo $location_id; ?>" <?php echo $selected; ?>><?php echo $location_name; ?></option>
                            <?php endfor ; ?>
                        </select>
                    </div>
                    <?php else : ?>
                    <?php echo $location_text[0]; ?>
                    <?php endif ; ?>

                    <?php
                        // get currency and timezone
                        $ct_sql = "SELECT * FROM `catalogs` WHERE `id`=$catalog_id";
                        $ct_result = mysqli_query($conn, $ct_sql);
                        $ct_row = mysqli_fetch_assoc($ct_result);

                        $currency = $ct_row['currency'];
                        $timezone = $ct_row['timezone'];

                        $curr_sql = "SELECT * FROM `currency` WHERE `currency_abbr`='$currency'";
                        $curr_result = mysqli_query($conn, $curr_sql);
                        $curr_row = mysqli_fetch_assoc($curr_result);

                        $currency_name = $curr_row['currency_name'];
                        $currency_symbol = $curr_row['symbol'];

                        $time_sql = "SELECT * FROM `timezones` WHERE `zone_code`='$timezone'";
                        $time_result = mysqli_query($conn, $time_sql);
                        $time_row = mysqli_fetch_assoc($time_result);

                        $zone_name = $time_row['zone_name'];

                        $currency_output = $currency_name . " ( " . $currency . " - " . $currency_symbol . " ) "; 

                        $timezone_output = $zone_name;
                    ?>
                    <div id="currency_and_timezone">
                        <div class="currency">Currency: <span class="color_chocolate"><?php echo $currency_output; ?></span></div>
                        <div class="timezone">Timezone: <span class="color_chocolate"><?php echo $timezone_output; ?></span></div>
                    </div>
                </div>


<?php
    // Contact Information

    // var_dump($locations);
    // var_dump($location_ids);

    // contact group arrays
    // $contacts

    $contact_group_1 = array();
    $contact_group_2 = array();
    $contact_group_3 = array();
    $contact_group_4 = array();
    $contact_group_5 = array();

    $location_group_1 = array();
    $location_group_2 = array();
    $location_group_3 = array();
    $location_group_4 = array();
    $location_group_5 = array();

    for($l = 0; $l<count($location_ids); $l++){
        $id = $location_ids[$l];
        $location_string = $locations[$l];

        for($c = 0; $c<count($contacts); $c++){
            $cont = $contacts[$c];

            $comps = explode("??||&&", $cont);
            
            $contact_id = $comps[0];
            $contact_name = $comps[1];
            $contact_phone = $comps[2];
            $contact_location = $comps[3];

            if($id == $contact_location){

                if($l == 0){
                    array_push($contact_group_1, $cont);
                    array_push($location_group_1, $location_string);
                }
                else if($l == 1){
                    array_push($contact_group_2, $cont);
                    array_push($location_group_2, $location_string);
                }
                else if($l == 2){
                    array_push($contact_group_3, $cont);
                    array_push($location_group_3, $location_string);
                }
                else if($l == 3){
                    array_push($contact_group_4, $cont);
                    array_push($location_group_4, $location_string);
                }
                else if($l == 4){
                    array_push($contact_group_5, $cont);
                    array_push($location_group_5, $location_string);
                }
            }
        }
    }

    $all_contacts = array();
    if(count($contact_group_1) > 0){
        array_push($all_contacts, $contact_group_1);
    }
    if(count($contact_group_2) > 0){
        array_push($all_contacts, $contact_group_2);
    }
    if(count($contact_group_3) > 0){
        array_push($all_contacts, $contact_group_3);
    }
    if(count($contact_group_4) > 0){
        array_push($all_contacts, $contact_group_4);
    }
    if(count($contact_group_5) > 0){
        array_push($all_contacts, $contact_group_5);
    }

    $all_locations = array();
    if(count($location_group_1) > 0){
        array_push($all_locations, $location_group_1);
    }
    if(count($location_group_2) > 0){
        array_push($all_locations, $location_group_2);
    }
    if(count($location_group_3) > 0){
        array_push($all_locations, $location_group_3);
    }
    if(count($location_group_4) > 0){
        array_push($all_locations, $location_group_4);
    }
    if(count($location_group_5) > 0){
        array_push($all_locations, $location_group_5);
    }


    // Inspection Informaion

    $inspection_group_1 = array();
    $inspection_group_2 = array();
    $inspection_group_3 = array();
    $inspection_group_4 = array();
    $inspection_group_5 = array();

    $location_group_1 = array();
    $location_group_2 = array();
    $location_group_3 = array();
    $location_group_4 = array();
    $location_group_5 = array();

    for($l = 0; $l<count($location_ids); $l++){
        $id = $location_ids[$l];
        $location_string = $locations[$l];

        for($c = 0; $c<count($inspections); $c++){
            $insp = $inspections[$c];

            $comps = explode("??||&&", $insp);
            
            $inspection_id = $comps[0];
            $inspection_start_date = $comps[1];
            $inspection_end_date = $comps[2];
            $inspection_start_time = $comps[3];
            $inspection_end_time = $comps[4];
            $inspection_location = $comps[5];

            if($id == $inspection_location){

                if($l == 0){
                    array_push($inspection_group_1, $insp);
                    array_push($location_group_1, $location_string);
                }
                else if($l == 1){
                    array_push($inspection_group_2, $insp);
                    array_push($location_group_2, $location_string);
                }
                else if($l == 2){
                    array_push($inspection_group_3, $insp);
                    array_push($location_group_3, $location_string);
                }
                else if($l == 3){
                    array_push($inspection_group_4, $insp);
                    array_push($location_group_4, $location_string);
                }
                else if($l == 4){
                    array_push($inspection_group_5, $insp);
                    array_push($location_group_5, $location_string);
                }
            }
        }
    }

    $all_inspections = array();
    if(count($inspection_group_1) > 0){
        array_push($all_inspections, $inspection_group_1);
    }
    if(count($inspection_group_2) > 0){
        array_push($all_inspections, $inspection_group_2);
    }
    if(count($inspection_group_3) > 0){
        array_push($all_inspections, $inspection_group_3);
    }
    if(count($inspection_group_4) > 0){
        array_push($all_inspections, $inspection_group_4);
    }
    if(count($inspection_group_4) > 0){
        array_push($all_inspections, $inspection_group_5);
    }

    $all_locations_inspect = array();
    if(count($location_group_1) > 0){
        array_push($all_locations_inspect, $location_group_1);
    }
    if(count($location_group_2) > 0){
        array_push($all_locations_inspect, $location_group_2);
    }
    if(count($location_group_3) > 0){
        array_push($all_locations_inspect, $location_group_3);
    }
    if(count($location_group_4) > 0){
        array_push($all_locations_inspect, $location_group_4);
    }
    if(count($location_group_5) > 0){
        array_push($all_locations_inspect, $location_group_5);
    }

    // Removal Information
    $removal_group_1 = array();
    $removal_group_2 = array();
    $removal_group_3 = array();
    $removal_group_4 = array();
    $removal_group_5 = array();

    $location_group_1 = array();
    $location_group_2 = array();
    $location_group_3 = array();
    $location_group_4 = array();
    $location_group_5 = array();

    for($r = 0; $r<count($location_ids); $r++){
        $id = $location_ids[$r];
        $location_string = $locations[$r];

        for($c = 0; $c<count($removals); $c++){
            $rem = $removals[$c];
            
            $comps = explode("??||&&", $rem);

            $removal_id = $comps[0];
            $removal_start_date = $comps[1];
            $removal_end_date = $comps[2];
            $removal_start_time = $comps[3];
            $removal_end_time = $comps[4];
            $removal_location = $comps[5];


            if($id == $removal_location){
                if($r == 0){
                    array_push($removal_group_1, $rem);
                    array_push($location_group_1, $location_string);
                }
                else if($r == 1){
                    array_push($removal_group_2, $rem);
                    array_push($location_group_2, $location_string);
                }
                else if($r == 2){
                    array_push($removal_group_3, $rem);
                    array_push($location_group_3, $location_string);
                }
                else if($r == 3){
                    array_push($removal_group_4, $rem);
                    array_push($location_group_4, $location_string);
                }
                else if($r == 4){
                    array_push($removal_group_5, $rem);
                    array_push($location_group_5, $location_string);
                }
            }
        }
    }

    $all_removals = array();
    if(count($removal_group_1) > 0){
        array_push($all_removals, $removal_group_1);
    }
    if(count($removal_group_2) > 0){
        array_push($all_removals, $removal_group_2);
    }
    if(count($removal_group_3) > 0){
        array_push($all_removals, $removal_group_3);
    }
    if(count($removal_group_4) > 0){
        array_push($all_removals, $removal_group_4);
    }
    if(count($removal_group_5) > 0){
        array_push($all_removals, $removal_group_5);
    }



    $all_locations_removal = array();
    if(count($location_group_1) > 0){
        array_push($all_locations_removal, $location_group_1);
    }
    if(count($location_group_2) > 0){
        array_push($all_locations_removal, $location_group_2);
    }
    if(count($location_group_3) > 0){
        array_push($all_locations_removal, $location_group_3);
    }
    if(count($location_group_4) > 0){
        array_push($all_locations_removal, $location_group_4);
    }
    if(count($location_group_5) > 0){
        array_push($all_locations_removal, $location_group_5);
    }
?>
                <div id="contact_information">
                    <h4 class="sign_heading"><span>Contact Details</span></h4>

                    <?php for($g = 0; $g <count($all_contacts); $g++){

                        $contact = $all_contacts[$g];
                        $location_name = $all_locations[$g][0];

                        // var_dump($contact);
                        // var_dump($location_name);

                        $location_output = loc_output($location_name);
                    ?>

                    <div class="contact_table_group">

                        <div class="contact_table">
                            <div class="contact_header">
                                <div class="location_header"><?php echo $location_output; ?></div>
                            </div>
                        </div>
                        <div class="contact_table">
                            <div class="contact_record">
                                <div class="contact_name bold">
                                    Contact Name
                                </div>
                                <div class="contact_phone bold">
                                    Contact Phone Number
                                </div>
                            </div>
                            <?php for($c = 0; $c<count($contact); $c++){
                                
                                $contact_record = $contact[$c];

                                $contact_info = explode("??||&&", $contact_record);
                                $contact_id = $contact_info[0];
                                $contact_name = $contact_info[1];
                                $contact_phone = $contact_info[2];

                            ?>
                            <div class="contact_record">
                                <div class="contact_name"><?php echo $contact_name; ?></div>
                                <div class="contact_phone"><?php echo $contact_phone; ?></div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                    <br>

                    <?php } ?>


                </div>
            </div>
        </div>

        <div class="module_container">

            <div class="auc_module" id="inspection_and_removal">
                <div id="inspection_times">

                    <h4 class="sign_heading"><span>Inspection Details</span></h4>
                    

                    <?php for($i = 0; $i<count($all_locations_inspect); $i++){
                        $location = $all_locations_inspect[$i][0];
                        $location_output = loc_output($location);

                        $inspection = $all_inspections[$i];
                    ?>

                    <div class="inspection_group">
                        <div class="inspection_table">
                            <div class="inspection_header">
                                <div class="location_header"><?php echo $location_output; ?></div>
                            </div>
                        </div>
                        <div class="inspection_table">
                            <div class="inspection_header">
                                <div class="insp_cell_head">Start Date</div>
                                <div class="insp_cell_head">Start Time</div>
                                <div class="insp_cell_head">End Date</div>
                                <div class="insp_cell_head">End Time</div>
                            </div>
                            <?php
                                for($x = 0; $x<count($inspection); $x++) {
                                    $inspection_record = $inspection[$x];

                                    $comps = explode("??||&&", $inspection_record);

                                    $id = $comps[0];
                                    $start_date = $comps[1];
                                    $end_date = $comps[2];
                                    $start_time = $comps[3];
                                    $end_time = $comps[4];
                                    
                                    if($end_date == "-1" || $end_date == ""){
                                        $end_date = "-";
                                    }

                                    $st_sql = "SELECT * FROM `time` WHERE `military_time`=$start_time";
                                    $st_result = mysqli_query($conn, $st_sql);
                                    $st_row = mysqli_fetch_assoc($st_result);
                                    $start_time = $st_row['display_time'];

                                    $et_sql = "SELECT * FROM `time` WHERE `military_time`=$end_time";
                                    $et_result = mysqli_query($conn, $et_sql);
                                    $et_row = mysqli_fetch_assoc($et_result);
                                    $end_time = $et_row['display_time'];
                            ?>
                            <div class="inspection_row">
                                <div class="inspection_cell"><?php echo $start_date; ?></div>
                                <div class="inspection_cell"><?php echo $start_time; ?></div>
                                <div class="inspection_cell"><?php echo $end_date; ?></div>
                                <div class="inspection_cell"><?php echo $end_time; ?></div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                    <br>

                    <?php } ?>
                    

                    <?php
                        // Get inspection notes
                        $inspection_note_sql = "SELECT * FROM `catalogs` WHERE `id`='$catalog_id'";
                        $inspection_note_result = mysqli_query($conn, $inspection_note_sql);
                        $inspection_note_row = mysqli_fetch_assoc($inspection_note_result);
                        $inspection_note = $inspection_note_row['inspection_notes'];
                    ?>
                    <div class="ins_rem_notes">
                        <div class="ins_rem_label">Inspection Notes:</div>
                        <p class="ins_rem_output"><?php echo $inspection_note; ?></p>
                    </div>
                </div>

                <div id="removal_times">

                    <h4 class="sign_heading"><span>Removal Details</span></h4>

                    <?php for($i = 0; $i<count($all_locations_removal); $i++){
                        $location = $all_locations_removal[$i][0];
                        $location_output = loc_output($location);

                        $removal = $all_removals[$i];
                    ?>

                    <div class="removal_group">                    
                        <div class="removal_table">
                                <div class="removal_header">
                                    <div class="location_header"><?php echo $location_output; ?></div>
                                </div>
                            </div>
                        <div class="removal_table">
                            <div class="removal_header">
                                <div class="remove_cell_head">Start Date</div>
                                <div class="remove_cell_head">Start Time</div>
                                <div class="remove_cell_head">End Date</div>
                                <div class="remove_cell_head">End Time</div>
                            </div>
                            
                            <?php
                                for($x = 0; $x<count($removal); $x++) {
                                    $removal_record = $removal[$x];

                                    $comps = explode("??||&&", $removal_record);

                                    $id = $comps[0];
                                    $start_date = $comps[1];
                                    $end_date = $comps[2];
                                    $start_time = $comps[3];
                                    $end_time = $comps[4];
                                    
                                    if($end_date == "-1" || $end_date == ""){
                                        $end_date = "-";
                                    }

                                    $st_sql = "SELECT * FROM `time` WHERE `military_time`=$start_time";
                                    $st_result = mysqli_query($conn, $st_sql);
                                    $st_row = mysqli_fetch_assoc($st_result);
                                    $start_time = $st_row['display_time'];

                                    $et_sql = "SELECT * FROM `time` WHERE `military_time`=$end_time";
                                    $et_result = mysqli_query($conn, $et_sql);
                                    $et_row = mysqli_fetch_assoc($et_result);
                                    $end_time = $et_row['display_time'];
                            ?>
                            <div class="removal_row">
                                <div class="removal_cell"><?php echo $start_date; ?></div>
                                <div class="removal_cell"><?php echo $start_time; ?></div>
                                <div class="removal_cell"><?php echo $end_date; ?></div>
                                <div class="removal_cell"><?php echo $end_time; ?></div>
                            </div>

                            <?php } ?>
                        </div>

                    </div>

                    <br>
                    
                    <?php } ?>

                    <?php
                        // Get removal notes
                        $removal_note_sql = "SELECT * FROM `catalogs` WHERE `id`='$catalog_id'";
                        $removal_note_result = mysqli_query($conn, $removal_note_sql);
                        $removal_note_row = mysqli_fetch_assoc($removal_note_result);
                        
                        $removal_note = $removal_note_row['removal_notes'];
                    ?>
                    <div class="ins_rem_notes">
                        <div class="ins_rem_label">Removal Notes:</div>
                        <p class="ins_rem_output"><?php echo $removal_note; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<?php include "../includes/footer.php"; ?>
<!-- Handle Location Select input -->
<script>

    var map_iframe_source = "https://www.google.com/maps/embed/v1/place?key=AIzaSyAcc17FcMQWYboFujZkLZ5TNA59CAqrBjs&q=";
    $('#map_choser').on('change', function() {
        var option = $(this).find("option:selected").text();

        var src = map_iframe_source + option;
        $("#google_map_embed").attr("src", src);
    });
</script>
<!-- Handle auction information tabs -->
<script>
    $("#nav_tabs li.nav_item .nav_link").on("click", function(e){
        e.preventDefault();

        var name = $(this).attr("name");

        if($(this).parent().hasClass("active")){
            // do nonmatchingbracket
        }
        else{
            var active_name = $(".active a").attr("name");
            var old_id = "#" + active_name;

            var new_id = "#" + name;


            $(old_id).parent().hide("slide", {direction: "up"}, 1500, function(){
        
                $(new_id).parent().show("slide", {direction: "up"}, 1500);
        
            });

            // reset active button
            $(".active").removeClass("active");
            $(this).parent().addClass("active");

        }
    });
    // $("#module1").click(function(e){
    //     e.preventDefault();

    //     if($(this).parent().hasClass("active")){
    //         // ignore
    //     }
    //     else{
    //         console.log("do something");
    //     }
    // });
</script>
<script>
    // open login button
    $(".login_open").on("click", function(e){
        e.preventDefault();

        $("#login_modal").css("display", "block");
    });
</script>
<!-- Make pictures be square -->
<script>
    var w = $("#list_of_lot_pictures img:first-child").width();


    $("#list_of_lot_pictures img").each(function(){
        $(this).height(w);
    });
</script>