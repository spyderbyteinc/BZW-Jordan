<?php
    include "../includes/connect.php";

    $all_currency = array();
    $currency_sql = "SELECT * FROM currency";
    $currency_result = mysqli_query($conn, $currency_sql);
    
    while($row = mysqli_fetch_assoc($currency_result)){
        $cur = $row['currency_name'] . "||" . $row['currency_abbr'];
        
        array_push($all_currency, $cur);
    }

    $all_timezones = array();
    $timezone_sql = "SELECT * FROM timezones";
    $timezone_result = mysqli_query($conn, $timezone_sql);

    while($row = mysqli_fetch_assoc($timezone_result)){
        $tim = $row['zone_code'] . "||" . $row['zone_name'];

        array_push($all_timezones, $tim);
    }
?>
<h2 class="create_catalog_heading">Catalog Information</h2>

    <form action="#" method="post">
        <section class="catalog_create">
            <h4 class="sign_heading"><span>Basic Information</span></h4>

        
            <div class="catalog_row signup_row">
                <div class="col1">
                    <div class="signup_group">
                        <label for="catalog_name" class="input_label">Catalog Name</label>
                        <input type="text" class="input_text" name="catalog_name" id="catalog_name" placeholder="Catalog Name">
                    </div>
                </div>
            </div>
            
            <div class="catalog_row signup_row">
                <div class="col1">
                    <div class="signup_group">
                        <label for="auctioneer_name" class="input_label">Auctioneer/Seller Name</label>
                        <input type="text" class="input_text" name="auctioneer_name" id="auctioneer_name" placeholder="Auctioneer Name">
                    </div>
                </div>
            </div>

            <div class="catalog_row signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="auction_type" class="input_label">Auction Type</label>
                        <select class="input_text input_select" name="auction_type" id="auction_type">
                            <option class="select" value="">Auction Type</option>
                            <option value="1">Timed Auction</option>
                        </select>
                    </div>
                </div>
                
                    
                <div class="col2">
                    <div class="signup_group">
                        <label for="charity_event" class="input_label">Is this a Charity Event?</label>
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
                        <label for="catalog_description" class="input_label">Catalog Description</label>
                        <textarea class="input_text" name="catalog_description" id="catalog_description" rows="3" placeholder="Catalog Description"></textarea>
                    </div>
                </div>
            </div>

            <div class="catalog_row signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="start_date" class="input_label">Start Date</label>
                        <input type="text" class="input_text date_picker" onkeypress="return false"   name="start_date" id="start_date" placeholder="mm/dd/yyyy">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="start_time" class="input_label">Start Time (EST)</label>
                        <select class="input_text input_select start_time_drop" name="start_time" id="start_time">
                            <option class="select" value="">Start Time</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="catalog_row signup_row">
                <div class="col3">
                    <div class="signup_group">
                        <label for="end_date" class="input_label">End Date Beginning</label>
                        <input type="text" class="input_text date_picker"  onkeypress="return false" name="end_date" id="end_date" placeholder="mm/dd/yyyy">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="end_time" class="input_label">End Time Beginning (EST)</label>
                        <select class="input_text input_select end_time_drop" name="end_time" id="end_time">
                            <option value="">End Time</option>
                        </select>
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="end_increment" class="input_label">End Time Increment</label>
                        <select class="input_text input_select" name="end_increment" id="end_increment">
                            <option class="select" value="">Select Increment Time</option>
                            <option value="1">10 Minutes</option>
                        </select>
                    </div>
                </div>
            </div>

            <h4 class="sign_heading"><span>Asset Location</span></h4>

            <div class="address_area">
                <div id="address1_module" class="address_module">
                    <div id="address_location1" class="catalog_address_location">
                        <div class="catalog_row signup_row">
                            <div class="col2">
                                <div class="signup_group">
                                    <label for="module1_address1" class="input_label">Address 1</label>
                                    <input type="text" class="input_text"  name="module1_address1" id="module1_address1" placeholder="Address 1">
                                </div>
                            </div>
                            <div class="col2">
                                <div class="signup_group">
                                    <label for="module1_address2" class="input_label">Address 2</label>
                                    <input type="text" class="input_text"  name="module1_address2" id="module1_address2" placeholder="Address 2">
                                </div>
                            </div>
                        </div>

                        <div class="catalog_row signup_row">
                            <div class="col3">
                                <div class="signup_group">
                                    <label for="module1_asset_country" class="input_label">Country</label>
                                    <select class="input_text input_select country_drop" name="module1_asset_country" id="module1_asset_country">
                                        <option value="">Select a Country</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col3">
                                <div class="signup_group">
                                    <label for="module1_asset_city" class="input_label">City</label>
                                    <input type="text" class="input_text" name="module1_asset_city" id="module1_asset_city" placeholder="City">
                                </div>
                            </div>
                            <div class="col3">
                                <div class="signup_group">
                                    <label for="module1_asset_state" class="input_label">State / Province</label>
                                    <select class="input_text input_select" name="module1_asset_state" id="module1_asset_state">
                                        <option class="select" value="">Select a State/Province</option>
                                    </select>
                                    <input style="display:none;" type="text" class="input_text ship_state" name="module1_asset_state_static" id="module1_asset_state_static" placeholder="State / Province">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="address_location1_controls" class="row_operations">
                        
                        <span name="address1" class="add address_add"><i class="fas fa-plus"></i></span>
                        <span name="address1" class="visibility_hidden trash address_delete"><i class="far fa-trash-alt"></i></span>
                    </div>
                </div>
            </div>
            
            <h4 class="sign_heading"><span>Location Details</span></h4>

            <div class="catalog_row signup_row">
                <div class="col3">
                    <div class="signup_group">
                        <label for="asset_currency" class="input_label">Currency</label>
                        <select class="input_text input_select" name="asset_currency" id="asset_currency">
                            <option class="select" value="">Select a Currency</option>
                            <?php foreach($all_currency as $currency) : ?>
                            <?php
                                $vs = explode("||", $currency);
                                $id = $vs[1];
                                $name = $vs[0];
                            ?>
                            <option value="<?php echo $id; ?>"><?php echo $name . " (" . $id . ")"; ?></option>
                            <?php endforeach ; ?>
                        </select>
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="asset_timezone" class="input_label">TimeZone</label>
                        <select class="input_text input_select" name="asset_timezone" id="asset_timezone">
                            <option value="">Select a TimeZone</option>
                            <?php foreach($all_timezones as $time) : ?>
                            <?php
                                $vs = explode("||", $time);
                                $id = $vs[0];
                                $name = $vs[1];
                            ?>
                            <option value="<?php echo $id; ?>"><?php echo $name . " (" . $id . ")"; ?></option>
                            <?php endforeach ; ?>
                        </select>
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="buyer_premium" class="input_label">Buyer Premium</label>
                        <select class="input_text input_select" name="buyer_premium" id="buyer_premium">
                            <option class="select" value="">Select Buyer Premium</option>
                            <option value="1">18%</option>
                        </select>
                    </div>
                </div>
            </div>

            
            
            <h4 class="sign_heading"><span>Inspection Dates and Times</span></h4>

            <p class="sign_up_disclaimer">Inspection time and date is based on asset location</p>

            <div class="inspect_area">
                <div class="catalog_row signup_row">
                    <div class="col4">
                        <div class="signup_group">
                            <label for="module1_inspection_date1" class="input_label">Inspection Date</label>
                            <input type="text" class="input_text date date_picker" onkeypress="return false"  name="module1_inspection_date" id="module1_inspection_date1" placeholder="mm/dd/yyyy">
                        </div>
                    </div>
                    <div class="col4">
                        <div class="signup_group">
                            <label for="module1_inspection_start_time1" class="input_label">Inspection Start Time</label>
                            <select class="input_text input_select start_time_drop" name="module1_inspection_start_time" id="module1_inspection_start_time1">
                                <option class="select" value="">Select a Start Time</option>
                            </select>
                        </div>
                    </div>
                    <div class="col4">
                        <div class="signup_group">
                            <label for="module1_inspection_end_time" class="input_label">Inspection End Time</label>
                            <select class="input_text input_select end_time_drop" name="module1_inspection_end_time" id="module1_inspection_end_time">
                                <option class="select" value="">Select a End Time</option>
                            </select>
                        </div>
                    </div>
                    <div class="col5 row_operations">
                            <span name="inspect1" class="add inspect_add"><i class="fas fa-plus"></i></span>
                            <span class="trash visibility_hidden"><i class="far fa-trash-alt"></i></span>
                    </div>
                </div>
            </div>

            
            <h4 class="sign_heading"><span>Removal Dates and Times</span></h4>

                
            <p class="sign_up_disclaimer">Removal time and date is based on asset location</p>

            <div class="removal_area">
                <div class="catalog_row signup_row">
                    <div class="col4">
                        <div class="signup_group">
                            <label for="module1_removal_date" class="input_label">Removal Date</label>
                            <input type="text" class="date input_text date_picker"  onkeypress="return false" name="module1_removal_date" id="module1_removal_date" placeholder="mm/dd/yyyy">
                        </div>
                    </div>
                    <div class="col4">
                        <div class="signup_group">
                            <label for="module1_removal_start_time" class="input_label">Removal Start Time</label>
                            <select class="input_text input_select start_time_drop" name="module1_removal_start_time" id="module1_removal_start_time">
                                <option class="select" value="">Select a Start Time</option>
                                <option value="1">8:00 AM</option>
                            </select>
                        </div>
                    </div>
                    <div class="col4">
                        <div class="signup_group">
                            <label for="module1_inspection_end_time" class="input_label">Removal End Time</label>
                            <select class="input_text input_select end_time_drop" name="module1_removal_end_time" id="module1_removal_end_time">
                                <option class="select" value="">Select a End Time</option>
                                <option value="1">8:00 AM</option>
                            </select>
                        </div>
                    </div>
                    <div class="col5 row_operations">
                            <span name="removal1" class="add removal_add"><i class="fas fa-plus"></i></span>
                            <span class="trash visibility_hidden"><i class="far fa-trash-alt"></i></span>
                    </div>
                </div>
            </div>
            

            
            <h4 class="sign_heading"><span>Onsite Contact Information</span></h4>

            <div class="contact_area">
                <div class="catalog_row signup_row">
                    <div class="col6">
                        <div class="signup_group">
                            <label for="module1_contact_name1" class="input_label">Contact Name</label>
                            <input type="text" class="input_text" name="module1_contact_name1" id="module1_contact_name1" placeholder="Contact Name">
                        </div>
                    </div>
                    <div class="col6">
                        <div class="signup_group">
                            <label for="module1_contact_phone1" class="input_label">Contact Phone</label>
                            <input type="text" class="input_text" name="module1_contact_phone1" id="module1_contact_phone1" placeholder="Contact Phone">
                        </div>
                    </div>
                    <div class="col5 row_operations">
                        <span name="contact1" class="add contact_add"><i class="fas fa-plus"></i></span>
                        <span class="trash visibility_hidden"><i class="far fa-trash-alt"></i></span>
                    </div>
                </div>
            </div>

            <!-- Number of modules for address, inspect, removal, and contact data -->
            <input type="hidden" name="address_number" id="address_number" value="1">
            <input type="hidden" name="removal_number" id="removal_number" value="1">
            <input type="hidden" name="inspect_number" id="inspect_number" value="1">
            <input type="hidden" name="contact_number" id="contact_number" value="1">

            
            <h4 class="sign_heading"><span>Legal</span></h4>

            
            <div class="catalog_row signup_row">
                <div class="col1">
                    <div class="signup_group">
                        <label for="terms_conditions" class="input_label">Catalog Terms & Conditions</label>
                        <textarea class="input_text" name="terms_conditions" id="terms_conditions" rows="3" placeholder="Terms and Conditions"></textarea>
                    </div>
                </div>
            </div>
        </section>
    </form>