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
    // var_dump($lot_row);


    $lot_id = $lot_row['id'];
    $lot_name = $lot_row['name'];
    $lot_description = $lot_row['description'];

    $category = $lot_row['category'];
    $other_category = $lot_row['other_category'];

    $lot_location = $lot_row['lot_location'];

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

    for($l =0; $l<count($all_locations); $l++){
        $curr = $all_locations[$l];

        $comps = explode("??||&&", $curr);

        $id = $comps[0];

        if($id == $lot_location){
            echo $curr;
            break;
        }
    }
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
                Lot Location
            </div>

        </div>

        <div id="lot_details_right_column">
            
            <div class="lot_details_entry">
                <span class="entry_title">Lot Name:</span>
                <span class="entry_answer"><?php echo $lot_name; ?></span>
            </div>

            <div class="lot_details_entry">
                <span class="entry_title">Description:</span>
                <span class="entry_answer"><?php echo $lot_description; ?></span>
            </div>
            
            <div class="lot_details_entry">
                <span class="entry_title">Category:</span>

                <br>

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

                <span class="category_tier category_line1"><?php echo $category_output[0]; ?></span><br>
                <?php 
                    for($i = 1; $i < count($category_output); $i++){
                        $category_name = $category_output[$i];

                        $line_number = $i+1;
                ?>

                <span class="category_tier category_line<?php echo $line_number; ?>">&#8627;<?php echo $category_name; ?></span><br>
                <?php
                    }
                ?>
                <!-- <span class="category_tier category_line1">Category 1</span><br>
                <span class="category_tier category_line2">&#8627;Category 2</span><br>
                <span class="category_tier category_line3">&#8627;Category 3</span><br>
                <span class="category_tier category_line4">&#8627;Category 4</span><br>
                <span class="category_tier category_line5">&#8627;Category Other</span> -->
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

                        <div class="current_info_row">
                            <div class="no_bottom_border current_info_cell current_info_left">
                                Started On : 
                            </div>

                            <div class="no_bottom_border current_info_cell current_info_right">
                                8/24/2019 @ 3:00PM (EST)
                            </div>
                        </div>
                    </div>
                    
                    <div class="lot_info_table middle_table">
                        <div class="lot_info_row">
                            <div class="lot_info_cell large_cell cell_caption">Auction Type :</div>
                            <div class="lot_info_cell second_cell">Timed</div>
                            <div class="lot_info_cell cell_caption">Featured Lot?</div>
                            <div class="lot_info_cell second_cell" "="">Yes</div>
                        </div>
                        <div class="lot_info_row">
                            <div class="lot_info_cell large_cell cell_caption">Starting Bid :</div>
                            <div class="lot_info_cell second_cell">$5.00</div>
                            <div class="lot_info_cell cell_caption">Bid Increment :</div>
                            <div class="lot_info_cell second_cell" "="">$5.00</div>
                        </div>
                        <div class="lot_info_row">
                            <div class="lot_info_cell large_cell cell_caption">Buyer's Premium :</div>
                            <div class="lot_info_cell second_cell">18.00%</div>
                            <div class="lot_info_cell cell_caption">Tax on Hammer :</div>
                            <div class="lot_info_cell second_cell" "="">6.0%</div>
                        </div>
                        <div class="lot_info_row">
                            <div class="lot_info_cell large_cell cell_caption">High Bidder :</div>
                            <div class="lot_info_cell second_cell">J****n</div>
                            <div class="lot_info_cell cell_caption">Bid History :</div>
                            <div class="lot_info_cell second_cell">3 Bids</div>
                        </div>
                        <div class="lot_info_row">
                            <div class="lot_info_cell large_cell cell_caption">Reserve Amount :</div>
                            <div class="lot_info_cell second_cell">$420</div>
                            <div class="lot_info_cell cell_caption">Freezing Enabled :</div>
                            <div class="lot_info_cell second_cell">Yes</div>
                        </div>
                        <div class="lot_info_row">
                            <div class="lot_info_cell large_cell cell_caption">Times the Bid Enabled :</div>
                            <div class="lot_info_cell second_cell">Yes</div>
                            <div class="lot_info_cell cell_caption">Quantity :</div>
                            <div class="lot_info_cell second_cell">10</div>
                        </div>
                    </div>


                    <div class="extra_info_table">

                        <div class="extra_info_row">

                            <div class="extra_info_cell large_cell cell_caption">Units :</div>
                            <div class="extra_info_cell second_cell">10</div>
                            <div class="extra_info_cell cell_caption">Brand :</div>
                            <div class="extra_info_cell second_cell">Dewalt</div>
                            <div class="extra_info_cell cell_caption">Condition :</div>
                            <div class="extra_info_cell second_cell">Good</div>

                        </div>
                    </div>

                    <div class="extra_info_table last_table">

                        <div class="extra_info_row">

                            <div class="extra_info_cell large_cell cell_caption">Size :</div>
                            <div class="extra_info_cell second_cell">Big</div>
                            <div class="extra_info_cell cell_caption">Weight :</div>
                            <div class="extra_info_cell second_cell">Heavy</div>

                        </div>
                    </div>

                </div>
            </div>
        </div>



        

    </div>

        
    <div id="auction_information" class="catalog_information">

        <h2 class="auctions section_heading"><span>Catalog Details</span></h2>

        <ul id="nav_tabs">
            <li class="nav_item active"><a href="#" id="module1" name="auctioneer_and_asset" class="nav_link">Auctioneer Information and Terms and Conditions</a></li>
            <li class="nav_item"><a href="#"  id="module2" name="contact_and_asset_location" class="nav_link">Contact Information and Asset Location</a></li>
            <li class="nav_item"><a href="#" id="module3" name="inspection_and_removal" class="nav_link">Inspection and Removal Times</a></li>
        </ul>

        <div class="module_container module_container_start">

            <div class="auc_module" id="auctioneer_and_asset">
                <div id="auctioneer_info">
                    <h4 class="sign_heading"><span>Auctioneer Information</span></h4>

                    <div id="auctioneer_name_and_logo">
                        <h4 class="auctioneer_name">Crazy Auctioneers</h4>
                        
                        <img src="https://cdn.globalauctionplatform.com/e8969fb0-f056-4154-bbd2-a28a0050dbc5/logo/simple%20furrow%20logo%20for%20bidspotter.jpg" alt="Auctioneer Logo" class="auctioneer_logo">

                        <a href="#" class="auctioneer_website">Visit Auctioneer Webiste</a>

                        <hr class="border_chocolate" />
                        <hr class="border_black" />

                        <div class="affiliation_label">
                            <span>Affiliations</span>
                        </div>
                        <div id="affiliations">
                            <img src="http://bidzwon.com/dev/img/cube_pictures_test/3.png" alt="" class="aff">
                            <img src="http://bidzwon.com/dev/img/cube_pictures_test/4.png" alt="" class="aff">
                            <img src="http://bidzwon.com/dev/img/cube_pictures_test/7.png" alt="" class="aff">
                        </div>
                    </div>

                </div>

                <div id="terms_and_conditions">
                    <h4 class="sign_heading"><span>Terms and Conditions</span></h4>

                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur rem facere libero, pariatur doloremque esse harum molestias obcaecati perspiciatis vitae commodi magni necessitatibus hic laboriosam iste quas dolorem! Deleniti facere harum aperiam officiis ducimus veritatis dicta pariatur nemo fugit reiciendis praesentium sit dolores enim nam ratione quibusdam, consequuntur distinctio obcaecati odit? Iste nisi cumque nam temporibus deleniti alias unde fuga, ullam quibusdam esse eligendi voluptatum! Illum at repellendus perspiciatis pariatur accusamus enim cupiditate vitae accusantium, exercitationem fugiat sit facilis, aliquam placeat molestiae quasi eos provident dicta velit minima et nam eaque nihil qui. Voluptatibus numquam modi ratione. Similique, unde consectetur?
                </div>
            </div>
        </div>

        <div class="module_container">

            <div class="auc_module" id="contact_and_asset_location">
                <div id="asset_location">
                    <h4 class="sign_heading"><span>Asset Location</span></h4>

                    <div class="address">
                    <div>10137 Devonshire, Suite 3051</div>
                    
                    <div>South Lyon, MI, 48178</div>
                    </div>
                    <?php $address = '10137 Devonshire, South Lyon, MI, 48178' ; /* Insert address Here */

                    echo '<iframe width="100%" height="425" frameborder="0" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace(",", "", str_replace(" ", "+", $address)) . '&z=14&output=embed"></iframe>';
                                    ?>

                    <div id="currency_and_timezone">
                        <div class="currency">Currency: <span class="color_chocolate">USD ($)</span></div>
                        <div class="timezone">Timezone: <span class="color_chocolate">Eastern Standard Time (EST)</span></div>
                    </div>
                </div>
                <div id="contact_information">
                    <h4 class="sign_heading"><span>Contact Details</span></h4>

                    <div id="contact_table">
                        <div class="contact_header">
                            <div class="contact_name">
                                Contact Name
                            </div>
                            <div class="contact_phone">
                                Contact Phone Number
                            </div>
                        </div>
                        <div class="contact_record">
                            <div class="contact_name">Billy Bob</div>
                            <div class="contact_phone">123123121</div>
                        </div>
                        <div class="contact_record">
                            <div class="contact_name">Walter White</div>
                            <div class="contact_phone">123123121</div>
                        </div>
                        <div class="contact_record">
                            <div class="contact_name">Jake the Snake</div>
                            <div class="contact_phone">123123121</div>
                        </div>
                        <div class="contact_record">
                            <div class="contact_name">Spongebob</div>
                            <div class="contact_phone">123123121</div>
                        </div>
                        <div class="contact_record">
                            <div class="contact_name">Stephanie</div>
                            <div class="contact_phone">123123121</div>
                        </div>
                        <div class="contact_record">
                            <div class="contact_name">Johnathan</div>
                            <div class="contact_phone">123123121</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="module_container">

            <div class="auc_module" id="inspection_and_removal">
                <div id="inspection_times">

                    <h4 class="sign_heading"><span>Inspection Details</span></h4>

                    <div id="inspection_table">
                        <div class="inspection_header">
                            <div class="insp_cell_head">Inspection Date</div>
                            <div class="insp_cell_head">Start Time</div>
                            <div class="insp_cell_head">End Time</div>
                        </div>
                        <div class="inspection_row">
                            <div class="inspection_cell">8/4/2020</div>
                            <div class="inspection_cell">8:00 AM</div>
                            <div class="inspection_cell">2:00 PM</div>
                        </div>
                        <div class="inspection_row">
                            <div class="inspection_cell">8/9/2020</div>
                            <div class="inspection_cell">8:00 AM</div>
                            <div class="inspection_cell">2:00 PM</div>
                        </div>
                        <div class="inspection_row">
                            <div class="inspection_cell">8/5/2020</div>
                            <div class="inspection_cell">8:00 AM</div>
                            <div class="inspection_cell">2:00 PM</div>
                        </div>
                        <div class="inspection_row">
                            <div class="inspection_cell">8/12/2020</div>
                            <div class="inspection_cell">8:00 AM</div>
                            <div class="inspection_cell">2:00 PM</div>
                        </div>
                        <div class="inspection_row">
                            <div class="inspection_cell">8/15/2020</div>
                            <div class="inspection_cell">8:00 AM</div>
                            <div class="inspection_cell">2:00 PM</div>
                        </div>
                        <div class="inspection_row">
                            <div class="inspection_cell">8/20/2020</div>
                            <div class="inspection_cell">8:00 AM</div>
                            <div class="inspection_cell">2:00 PM</div>
                        </div>
                        <div class="inspection_row">
                            <div class="inspection_cell">8/22/2020</div>
                            <div class="inspection_cell">8:00 AM</div>
                            <div class="inspection_cell">2:00 PM</div>
                        </div>
                        <div class="inspection_row">
                            <div class="inspection_cell">8/25/2020</div>
                            <div class="inspection_cell">8:00 AM</div>
                            <div class="inspection_cell">2:00 PM</div>
                        </div>
                    </div>
                </div>

                <div id="removal_times">

                    <h4 class="sign_heading"><span>Removal Details</span></h4>

                    <div id="removal_table">
                        <div class="removal_header">
                            <div class="remove_cell_head">Removal Date</div>
                            <div class="remove_cell_head">Start Time</div>
                            <div class="remove_cell_head">End Time</div>
                        </div>
                        <div class="removal_row">
                            <div class="removal_cell">8/25/2020</div>
                            <div class="removal_cell">8:00 AM</div>
                            <div class="removal_cell">2:00 PM</div>
                        </div>
                        <div class="removal_row">
                            <div class="removal_cell">8/25/2020</div>
                            <div class="removal_cell">8:00 AM</div>
                            <div class="removal_cell">2:00 PM</div>
                        </div>
                        <div class="removal_row">
                            <div class="removal_cell">8/25/2020</div>
                            <div class="removal_cell">8:00 AM</div>
                            <div class="removal_cell">2:00 PM</div>
                        </div>
                        <div class="removal_row">
                            <div class="removal_cell">8/25/2020</div>
                            <div class="removal_cell">8:00 AM</div>
                            <div class="removal_cell">2:00 PM</div>
                        </div>
                        <div class="removal_row">
                            <div class="removal_cell">8/25/2020</div>
                            <div class="removal_cell">8:00 AM</div>
                            <div class="removal_cell">2:00 PM</div>
                        </div>
                        <div class="removal_row">
                            <div class="removal_cell">8/25/2020</div>
                            <div class="removal_cell">8:00 AM</div>
                            <div class="removal_cell">2:00 PM</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<?php include "../includes/footer.php"; ?>
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