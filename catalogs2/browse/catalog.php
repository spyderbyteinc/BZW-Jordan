<?php include "../includes/header.php"; ?>
<?php include "../includes/connect.php"; ?>

<section class="browse_section" id="browse_by_catalog">

    <h2 class="auctions section_heading"><span>View Catalog</span></h2>

    <div class="browse_list_and_filter">

            <div id="catalog_information">

                <div id="catalog_left">
                    
                    <div id="catalog_picture">
                        <img src="	https://bidzwon.com/dev/catalogs/featured_img/no_image.png" alt="" class="catalog_image">
                    </div>

                    <div id="register_to_bid_button" class="catalog_button">
                        <a href="#" class="bidzbutton register_to_bid" id="register_to_bid_process_114" name="register_to_bid_process_114"><i class="far fa-check-circle" aria-hidden="true"></i> Register To Bid</a>
                    </div>

                    <div id="message_seller_button" class="catalog_button">
                        <a href="#" class="bidzbutton medblue"><i class="far fa-comments" aria-hidden="true"></i> Message Seller</a>
                    </div>


                </div>
            
                <div id="catalog_right">
                    
                    <div id="catalog_name_and_description" class="catalog_details">
                        <h2 class="catalog_name">Catalog Name</h2>

                        <p class="catalog_description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque eum dignissimos, perspiciatis laborum harum eligendi vitae minima. Vel vitae consequuntur provident a tenetur atque, quis voluptas nihil neque omnis molestias aspernatur, consequatur magni impedit quia culpa necessitatibus esse quam repellendus adipisci! Laborum nisi dolorem fugiat sit quia vel autem ab.</p>
                    </div>

                    <hr class="border_chocolate">
                    <hr class="border_black">

                    <div id="catalog_other_information" class="catalog_details">

                        <div class="catalog_information_row">
                            <span class="auction_type auction_row_item"><span class="color_chocolate">Timed</span> Auction</span>
                            <span class="number_of_lots auction_row_item"><span class="color_chocolate">43</span> Lots</span>
                            <span class="auction_timezone auction_row_item"><span class="color_chocolate">EST</span> Timezone</span>
                            <span class="auction_currency auction_row_item"><span class="color_chocolate">USD</span> Currency</span>
                        </div>


                    </div>

                    <hr class="border_chocolate">
                    <hr class="border_black">

                    <div id="catalog_start_and_end_countdown" class="catalog_details">
                        <p class="catalog_display_status">Auction Not Open Yet</p>
                        <p class="catalog_display_countdown">End Time: <span class="chocolate">1 day, 3 hours, 26 minutes, 30 seconds<span></p>
                    </div>

                    <hr class="border_chocolate">
                    <hr class="border_black">

                    <div id="catalog_asset_location" class="catalog_details">
                        <span id="catalog_asset_location_text">Asset Location(s): <span class="color_chocolate">10137 Devonshire, South Lyon, MI, US</span></span>
                    </div>

                </div>

            </div>
        
    </div>

    <div id="view_by_switch">

        <h2 class="switch_heading">View Lots As:</h2>
        
        <div id="catalog_switch_element">

            <span class="left_label"><i class="fas fa-bars"></i> List</span>

            <!-- Rounded switch -->
            <label class="switch">
                <input type="checkbox" id="registration_question_switch">
                <span class="slider round"></span>
            </label>

            <span class="right_label"><i class="fas fa-th-large"></i> Grid</span>
        </div>

    </div>

    <div id="list_of_lots_in_catalog">

        <div class="single_lot_list">

            <div class="single_lot_left">
                <div class="single_lot_img">
                    <img src="https://bidzwon.com/dev/catalogs/featured_img/no_image.png" class="lot_display_image">
                </div>

                <div class="single_lot_buttons">

                    <a href="#" class="bidzbutton lot_buttons">Jordan</a>
                    <a href="#" class="bidzbutton lot_buttons">Was</a>
                    <a href="#" class="bidzbutton lot_buttons">Here</a>
                
                </div>
            </div>

            <div class="single_lot_right">
                
                <div class="single_lot_row">
                    <h3 class="lot_name">Lot Name</h3>

                    <p class="lot_description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam dignissimos hic ea est! Autem debitis dolores vero quaerat repellat, incidunt odit recusandae labore repellendus ea enim ab, corporis, reprehenderit adipisci.</p>
                </div>

                <hr class="border_chocolate">
                <hr class="border_black">
                
                <div class="single_lot_row">
                    <p>End Time: <span class="chocolate">1 day, 3 hours, 26 minutes, 30 seconds<span></p>
                </div>
                
                <hr class="border_chocolate">
                <hr class="border_black">
                
                <div class="single_lot_row">
                    <span>Asset Location(s): <span class="color_chocolate">10137 Devonshire, South Lyon, MI, US</span></span>
                </div>
                
                
                <hr class="border_chocolate">
                <hr class="border_black">

                <div class="single_lot_row">
                    <span>Category 1 -> Category 2 -> Category 3 -> Category 4</span>
                </div>
            </div>
        </div>

    </div>

</section>


<?php include "../includes/footer.php"; ?>
