<?php include "../includes/header.php"; ?>
<?php include "../includes/connect.php"; ?>
<?php include "search_modal.php"; ?>

<section class="browse_section" id="browse_section">

    <h2 class="auctions section_heading"><span>Browse Auctions</span></h2>

    <div class="search_button_container">
        <a href="#" class="bidzbutton" id="advanced_search_button"><i class="fas fa-search"></i> Advanced Search</a>
        
        <a href="" class="bidzbutton red" id="reset_search_button"><i class="fas fa-undo-alt"></i> Reset Search</a>
    </div>

    <div id="catalogs_and_lots">

        <div class="cat_group">

            <div class="catalog">
                <div class="picture">
                    <img class="catalog_picture" src="" alt="Image">
                </div>
                <div class="details">
                    <div class="row row1">
                        <span class="catalog_name">Catalog Name</span>
                    </div>
                    <hr class="border_chocolate">
                    <hr class="border_black">
                    <div class="row row2">
                        <span class="auction_type"><span class="chocolate">Timed</span> Auction</span>
                        <span class="number_lots"><span class="chocolate">33</span> Lots</span>
                    </div>
                    <div class="row row3">
                        <p class="catalog_description">Catalog Description is nice to have if you are intending to have a fully functional system. This will show up on several pages, so don't forget about it!</p>
                    </div>
                    <div class="row row4">
                        <span class="asset_location">Asset Location(s): <span class="chocolate">South Lyon, MI 48178</span></span>
                    </div>
                    <hr class="border_chocolate">
                    <hr class="border_black">
                    <div class="row row5">
                        <span class="bidding_starts">Bidding Starts: <span class="chocolate">8/5/2020</span></span>
                        <span class="bidding_ends">Bidding Ends: <span class="chocolate">8/7/2020</span></span>
                    </div>
                    <hr class="border_chocolate">
                    <hr class="border_black">
                    <div class="row row6">
                        <span class="register_bid">
                            <a href="#" class="bidzbutton"><i class="far fa-check-circle"></i> Register To Bid</a>
                        </span>

                        <span class="view_lots">
                            <a href="#" class="bidzbutton devart"><i class="far fa-eye"></i> View Catalog</a>
                        </span>

                        <span class="message_seller">
                            <a href="#" class="bidzbutton medblue"><i class="far fa-comments"></i> Message Seller</a>
                        </span>
                    </div>
                </div>

                <div class="lot_drop_down">
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>

            <div class="lots">
                <div class="lot_arrow_left">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="lot_lister">
                    <div class="lot_mod">
                        <div class="picture">
                            <img src="" alt="Lot Pic" class="lot_pic">
                        </div>
                        <div class="lot_name row">Lot Name - <span class="chocolate">Lot ID#</span></div>
                        <div class="lot_description row"><p class="desc">This is a description for a lot</p></div>
                        <div class="asset_location row"><span class="chocolate">South Lyon, MI 48178</span></div>
                        <div 
                        class="ending_datetime row">
                            <span class="startbid">Bidding Started: <span class="chocolate">6/6/2021</span></span>
                            <span class="endbid">Bidding Ends: <span class="chocolate">8/4/2021</span></span> 
                        </div>
                        <div class="bid_information row">
                            <span class="bid_title">Current Bid:</span>
                            <span class="current_bid"><span class="chocolate">$90.00 (USD)</span> - <span class="chocolate">j*****y</span> - <span class="chocolate">10 Bids</span></span>
                        </div>
                        <div class="browse_bid_button">
                            
                                <span class="but_row1">

                                    <a href="#" class="bidzbutton devart"><i class="far fa-arrow-alt-circle-right"></i> View Lot</a>

                                    <a href="#" class="bidzbutton chocolate"><i class="far fa-eye"></i> Watch Item</a>
                                </span>
                                
                                <span class="but_row2">
                                    <a href="#" class="bidzbutton"><i class="fas fa-gavel"></i> Bid on Lot</a>
                                </span>
                        </div>
                    </div>
                    <div class="lot_mod">
                        <div class="picture">
                            <img src="" alt="Lot Pic" class="lot_pic">
                        </div>
                        <div class="lot_name row">Lot Name - <span class="chocolate">Lot ID#</span></div>
                        <div class="lot_description row"><p class="desc">This is a description for a lot</p></div>
                        <div class="asset_location row"><span class="chocolate">South Lyon, MI 48178</span></div>
                        <div 
                        class="ending_datetime row">
                            <span class="startbid">Bidding Started: <span class="chocolate">6/6/2021</span></span>
                            <span class="endbid">Bidding Ends: <span class="chocolate">8/4/2021</span></span> 
                        </div>
                        <div class="bid_information row">
                            <span class="bid_title">Current Bid:</span>
                            <span class="current_bid"><span class="chocolate">$90.00 (USD)</span> - <span class="chocolate">j*****y</span> - <span class="chocolate">10 Bids</span></span>
                        </div>
                        <div class="browse_bid_button">
                            
                                <span class="but_row1">

                                    <a href="#" class="bidzbutton devart"><i class="far fa-arrow-alt-circle-right"></i> View Lot</a>

                                    <a href="#" class="bidzbutton chocolate"><i class="far fa-eye"></i> Watch Item</a>
                                </span>
                                
                                <span class="but_row2">
                                    <a href="#" class="bidzbutton"><i class="fas fa-gavel"></i> Bid on Lot</a>
                                </span>
                        </div>
                    </div>
                    <div class="lot_mod">
                        <div class="picture">
                            <img src="" alt="Lot Pic" class="lot_pic">
                        </div>
                        <div class="lot_name row">Lot Name - <span class="chocolate">Lot ID#</span></div>
                        <div class="lot_description row"><p class="desc">This is a description for a lot</p></div>
                        <div class="asset_location row"><span class="chocolate">South Lyon, MI 48178</span></div>
                        <div class="ending_datetime row">
                            <!-- <span class="startbid">Bidding Started: <span class="chocolate">6/6/2021</span></span> -->
                            <span class="endbid">Bidding Ends: <span class="chocolate">12 Hours, 10 Minutes, 34 Seconds</span></span> 
                        </div>
                        <div class="bid_information row">
                            <span class="bid_title">Current Bid:</span>
                            <span class="current_bid"><span class="chocolate">$90.00 (USD)</span> - <span class="chocolate">j*****y</span> - <span class="chocolate">10 Bids</span></span>
                        </div>
                        <div class="browse_bid_button">
                            
                                <span class="but_row1">

                                    <a href="#" class="bidzbutton devart"><i class="far fa-arrow-alt-circle-right"></i> View Lot</a>

                                    <a href="#" class="bidzbutton chocolate"><i class="far fa-eye"></i> Watch Item</a>
                                </span>
                                
                                <span class="but_row2">
                                    <a href="#" class="bidzbutton"><i class="fas fa-gavel"></i> Bid on Lot</a>
                                </span>
                        </div>
                    </div>
                </div>
                <div class="lot_arrow_right">

                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
        </div>

    </div>
</section>


<?php include "../includes/footer.php"; ?>