<div id="advanced_search_modal_container" class="modal_bg">

    <div id="advanced_search_modal" class="modal">
        
        <h2 class="auctions section_heading"><span>Filter Catalogs</span></h2>

        <div class="catalog_row signup_row">
            <div class="col1">
                <div class="signup_group">
                    <label for="catalog_keywords" class="input_label">Catalog Keyword(s)</label>
                    <input type="text" class="input_text" name="catalog_keywords" id="catalog_keywords" placeholder="Catalog Keyword(s)">
                </div>
            </div>
        </div>
        
        <div class="catalog_row signup_row">
            <div class="col2">
                <div class="signup_group">
                    <label for="auction_date" class="input_label">Auction Date</label>
                    <input type="text" class="input_text" name="auction_date" id="auction_date" placeholder="Auction Date">
                </div>
            </div>
            <div class="col2">
                <div class="signup_group">
                    <label for="charity_event" class="input_label">Charity Event?</label>
                    <select class="input_text input_select" name="charity_event" id="charity_event">
                        <option value="no" selected>No</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="catalog_row signup_row">
            <div class="col1">
                <div class="signup_group">
                    <label for="auction_location" class="input_label">Auction Location</label>
                    <select class="input_text input_select" name="auction_location" id="auction_location" >
                        <option value="">Auction Location</option>
                        <option value="1">Location 1</option>
                    </select>
                </div>
            </div>
        </div>

        <h2 class="auctions section_heading"><span>Filter Lots</span></h2>

        <div class="catalog_row signup_row">
            <div class="col1">
                <div class="signup_group">
                    <label for="lot_keywords" class="input_label">Lot Keyword(s)</label>
                    <input type="text" class="input_text" name="lot_keywords" id="lot_keywords" placeholder="Lot Keyword(s)">
                </div>
            </div>
        </div>
        
        <div class="catalog_row signup_row">
            <div class="col2">
                <div class="signup_group">
                    <label for="zipcode_distance" class="input_label">Distance From ZipCode</label>
                    <div class="zipcode_distance_container">
                        <input type="text" class="input_text" name="zipcode_distance" id="zipcode_distance" placeholder="Zipcode">
                        <input type="text" class="input_text" name="zipcode_distance" id="zipcode_distance_miles" placeholder="Miles">
                    </div>
                </div>
            </div>
            <div class="col2">
                <div class="signup_group">
                    <label for="lot_status" class="input_label">Lot Status</label>
                    <select class="input_text input_select" name="lot_status" id="lot_status" >
                        <option value="open">Open</option>
                        <option value="closed">Closed</option>
                        <option value="published">Published</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="catalog_row signup_row">
            <div class="col1">
                <div class="signup_group">
                    <label for="asset_location" class="input_label">Asset Location</label>
                    <select class="input_text input_select" name="asset_location" id="asset_location" >
                        <option value="">Auction Location</option>
                        <option value="1">Location 1</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="catalog_row signup_row">
            <div class="col4_alt">
                <div class="signup_group">
                    <label for="category_tier1" class="input_label">Category - Tier 1</label>
                    <select class="input_text input_select" name="category_tier1" id="category_tier1" >
                        <option value="">Auction Location</option>
                        <option value="1">Location 1</option>
                    </select>
                </div>
            </div>
            <div class="col4_alt">
                <div class="signup_group">
                    <label for="category_tier2" class="input_label">Category - Tier 2</label>
                    <select class="input_text input_select" name="category_tier2" id="category_tier2" >
                        <option value="">Auction Location</option>
                        <option value="1">Location 1</option>
                    </select>
                </div>
            </div>
            <div class="col4_alt">
                <div class="signup_group">
                    <label for="category_tier3" class="input_label">Category - Tier 3</label>
                    <select class="input_text input_select" name="category_tier3" id="category_tier3" >
                        <option value="">Auction Location</option>
                        <option value="1">Location 1</option>
                    </select>
                </div>
            </div>
            <div class="col4_alt">
                <div class="signup_group">
                    <label for="category_tier4" class="input_label">Category - Tier 4</label>
                    <select class="input_text input_select" name="category_tier4" id="category_tier4" >
                        <option value="">Auction Location</option>
                        <option value="1">Location 1</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="catalog_row signup_row">
            <div class="col1">
                <label for="tags">Tags</label>
                <h1>Tags</h1>
            </div>
        </div>

        <div class="action_buttons">
            <a href="#" class="bidzbutton orange"><i class="fas fa-search"></i> Search</a>
            <a href="#" class="bidzbutton red"><i class="fas fa-undo-alt"></i> Reset Form</a>
        </div>
    </div>
</div>