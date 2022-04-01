

<div id="addLotModal_background" class="modal_bg">
    <div id="addLotModal" class="modal">

        <h4>Add Lot Details</h4>

        
        <div class="catalog_row signup_row">
            <div class="col1">
                <div class="signup_group">
                    <label for="lot_name" class="input_label">Lot Name</label>
                    <input type="text" class="input_text" name="lot_name" id="lot_name" placeholder="Lot Name">
                </div>
            </div>
        </div>

        
        <div class="catalog_row signup_row">
            <div class="col1">
                <div class="signup_group">
                    <label for="lot_description" class="input_label">Lot Description</label>
                    <textarea class="input_text" name="lot_description" id="lot_description" rows="3" placeholder="Lot Description"></textarea>
                </div>
            </div>
        </div>

        
        <h4 class="sign_heading"><span>Bidding Information</span></h4>

        <div class="catalog_row signup_row">
            <div class="col2">
                <div class="signup_group">
                    <label for="starting_bid" class="input_label">Starting Bid</label>
                    <select class="input_text input_select" name="starting_bid" id="starting_bid">
                        <option class="select" value="">Select Starting Bid</option>
                        <option value="1">$5.00</option>
                    </select>
                </div>
            </div>
            <div class="col2">
                <div class="signup_group">
                    <label for="bid_increment" class="input_label">Bid Increment</label>
                    <select class="input_text input_select" name="bid_increment" id="bid_increment">
                        <option class="select" value="">Select Bid Increment</option>
                        <option value="1">$5.00</option>
                    </select>
                </div>
            </div>
        </div>


        <h4 class="sign_heading"><span>Lot Category</span></h4>

        <div class="catalog_row signup_row">
            <div class="col2">
                <div class="signup_group">
                    <label for="category_tier1" class="input_label">Category - Tier 1</label>
                    <select class="input_text input_select" name="category_tier1" id="category_tier1">
                        <option class="select" value="">Select Category</option>
                        <option value="1">Industrial</option>
                    </select>
                </div>
            </div>
            <div class="col2">
                <div class="signup_group">
                    <label for="category_tier2" class="input_label">Category - Tier 2</label>
                    <select class="input_text input_select" name="category_tier2" id="category_tier2">
                        <option class="select" value="">Select Category</option>
                        <option value="1">Industrial</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="catalog_row signup_row">
            <div class="col2">
                <div class="signup_group">
                    <label for="category_tier3" class="input_label">Category - Tier 3</label>
                    <select class="input_text input_select" name="category_tier3" id="category_tier3">
                        <option class="select" value="">Select Category</option>
                        <option value="1">Industrial</option>
                    </select>
                </div>
            </div>
            <div class="col2">
                <div class="signup_group">
                    <label for="category_tier4" class="input_label">Category - Tier 4</label>
                    <select class="input_text input_select" name="category_tier4" id="category_tier4">
                        <option class="select" value="">Select Category</option>
                        <option value="1">Industrial</option>
                    </select>
                </div>
            </div>
        </div>

        
        <div class="catalog_row signup_row">
            <div class="col1">
                <div class="signup_group">
                    <label for="category_other" class="input_label">Other Category - Please Specify</label>
                    <input type="text" class="input_text" name="category_other" id="category_other" placeholder="Other Category">
                </div>
            </div>
        </div>

        
        <h4 class="sign_heading"><span>Lot Location</span></h4>
        
        <div class="catalog_row signup_row">
            <div class="col1">
                <div class="signup_group">
                    <label for="lot_location" class="input_label">Lot Location</label>
                    <select class="input_text input_select" name="lot_location" id="lot_location">
                        <option value="1" selected>Location 1</option>
                        <option value="2">Location 2</option>
                        <option value="3">Location 3</option>
                    </select>
                </div>
            </div>
        </div>
        
        <h4 class="sign_heading"><span>Lot Specific Details</span></h4>

        <div class="catalog_row signup_row">
            <div class="col2">
                <div class="signup_group">
                    <label for="quantity" class="input_label">Quantity</label>
                    <input type="text" class="input_text" name="quantity" id="quantity" placeholder="Quantity">
                </div>
            </div>
            <div class="col2">
                <div class="signup_group">
                    <label for="units" class="input_label">Units</label>
                    <select class="input_text input_select" name="units" id="units">
                        <option class="select" value="">Select Unit Type</option>
                        <option value="1">Pieces</option>
                        <option value="2">Pallets</option>
                        <option value="3">Box</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="catalog_row signup_row">
            <div class="col2">
                <div class="signup_group">
                    <label for="brand" class="input_label">Brand</label>
                    <input type="text" class="input_text" name="brand" id="brand" placeholder="Brand">
                </div>
            </div>
            <div class="col2">
                <div class="signup_group">
                    <label for="condition" class="input_label">Condition</label>
                    <input type="text" class="input_text" name="condition" id="condition" placeholder="Condition">
                </div>
            </div>
        </div>
        
        <div class="catalog_row signup_row">
            <div class="col1">
                <div class="signup_group">
                    <label for="tags" class="input_label">Select Tags for Search - Comma Separated</label>
                    <textarea class="input_text" name="tags" id="tags" rows="3" placeholder="Tags"></textarea>
                </div>
            </div>
        </div>

        
        <div class="catalog_row signup_row">
            <div class="col1">
                <div class="signup_group buttons">
                    <a href="#" class="btn save_button">Save Lot</a>
                    <a href="#" id="cancel_lot_setup" class="btn cancel_button">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>

<h2 class="create_catalog_heading">Add Lot with Details</h2>

    <section class="catalog_create">
        <div class="lot_operations">
            <button class="add_lot">Add Lot</button>
        </div>

        <div class="lot_list">
            <div class="lot_item">
                <span class="lot_name">Lot 1</span>
                <span class="lot_options">
                    <span class="edit"><i class="fas fa-edit"></i></span>   
                    <span class="trash"><i class="far fa-trash-alt"></i></span>
                </span>
            </div>
            <div class="lot_item">
                <span class="lot_name">Lot 2</span>
                <span class="lot_options">
                    <span class="edit"><i class="fas fa-edit"></i></span>   
                    <span class="trash"><i class="far fa-trash-alt"></i></span>
                </span>
            </div>
            <div class="lot_item">
                <span class="lot_name">Lot 3</span>
                <span class="lot_options">
                    <span class="edit"><i class="fas fa-edit"></i></span>   
                    <span class="trash"><i class="far fa-trash-alt"></i></span>
                </span>
            </div>
            <div class="lot_item">
                <span class="lot_name">Lot 4</span>
                <span class="lot_options">
                    <span class="edit"><i class="fas fa-edit"></i></span>   
                    <span class="trash"><i class="far fa-trash-alt"></i></span>
                </span>
            </div>
            <div class="lot_item">
                <span class="lot_name">Lot 5</span>
                <span class="lot_options">
                    <span class="edit"><i class="fas fa-edit"></i></span>   
                    <span class="trash"><i class="far fa-trash-alt"></i></span>
                </span>
            </div>
            <div class="lot_item">
                <span class="lot_name">Lot 3</span>
                <span class="lot_options">
                    <span class="edit"><i class="fas fa-edit"></i></span>   
                    <span class="trash"><i class="far fa-trash-alt"></i></span>
                </span>
            </div>
            <div class="lot_item">
                <span class="lot_name">Lot 4</span>
                <span class="lot_options">
                    <span class="edit"><i class="fas fa-edit"></i></span>   
                    <span class="trash"><i class="far fa-trash-alt"></i></span>
                </span>
            </div>
            <div class="lot_item">
                <span class="lot_name">Lot 5</span>
                <span class="lot_options">
                    <span class="edit"><i class="fas fa-edit"></i></span>   
                    <span class="trash"><i class="far fa-trash-alt"></i></span>
                </span>
            </div>
        </div>
    </section>