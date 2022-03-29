<?php include "../includes/username.php"; ?>
<?php
    if($username == "" || !isset($username)){
        header("location: ../index.php?login_error=0");
        exit();
    }
?>

<?php include "../includes/header.php"; ?>


<?php
    include "../includes/connect.php";

    include $root . "helpers/country_state.php";


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
<div class="catalog_creation_header">
    <h2 class="house_heading section_heading"><span>Create Catalog</span></h2>
</div>

    <form action="<?php echo $root; ?>processes/process_catalog_creation.php" name="catalog_creation_form" id="catalog_creation_form" method="post">
        <section class="catalog_create">
            <h4 class="sign_heading"><span>Basic Information</span></h4>

        
            <div class="catalog_row signup_row">
                <div class="col1">
                    <div class="signup_group">
                        <label for="catalog_name" class="input_label">Catalog Name<span class="required">*</span></label>
                        <input type="text" class="input_text" name="catalog_name" id="catalog_name" placeholder="Catalog Name">
                    </div>
                </div>
            </div>
            
            <!-- <div class="catalog_row signup_row">
                <div class="col1">
                    <div class="signup_group">
                        <label for="auctioneer_name" class="input_label">Auctioneer/Seller Name</label>
                        <input type="text" class="input_text" name="auctioneer_name" id="auctioneer_name" placeholder="Auctioneer Name">
                    </div>
                </div>
            </div> -->

            <div class="catalog_row signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="auction_type" class="input_label">Auction Type<span class="required">*</span></label>
                        <select class="input_text input_select" name="auction_type" id="auction_type">
                            <option class="select" value="">Auction Type</option>
                            <option value="timed">Timed Auction</option>
                        </select>
                    </div>
                </div>
                
                    
                <div class="col2">
                    <div class="signup_group">
                        <label for="charity_event" class="input_label">Is this a Charity Event?<span class="required">*</span></label>
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
                        <label for="catalog_description" class="input_label">Catalog Description<span class="required">*</span></label>
                        <textarea class="input_text" name="catalog_description" id="catalog_description" rows="3" placeholder="Catalog Description"></textarea>
                    </div>
                </div>
            </div>

            <div class="catalog_row signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="start_date" class="input_label">Start Date<span class="required">*</span></label>
                        <input type="text" class="input_text date_picker" onkeypress="return false"   name="start_date" id="start_date" placeholder="mm/dd/yyyy">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="start_time" class="input_label">Start Time (EST)<span class="required">*</span></label>
                        <select class="input_text input_select start_time_drop" name="start_time" id="start_time">
                            <option class="select" value="">Start Time</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="catalog_row signup_row">
                <div class="col3">
                    <div class="signup_group">
                        <label for="end_date" class="input_label">End Date Beginning<span class="required">*</span></label>
                        <input type="text" class="input_text date_picker"  onkeypress="return false" name="end_date" id="end_date" placeholder="mm/dd/yyyy">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="end_time" class="input_label">End Time Beginning (EST)<span class="required">*</span></label>
                        <select class="input_text input_select end_time_drop" name="end_time" id="end_time">
                            <option value="">End Time</option>
                        </select>
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="end_increment" class="input_label">End Time Increment<span class="required">*</span></label>
                        <select class="input_text input_select" name="end_increment" id="end_increment">
                            <option class="select" value="">Select Increment Time</option>
                            <?php

                                for($i = 5; $i <= 30; $i = $i+5){
                                    $val = $i;
                                    $out = $i . " Minutes";

                                    echo "<option value='$val'>$out</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <h4 class="sign_heading"><span>Asset Location</span></h4>

            <div class="address_area">
                <div class="add_button">
                    <a href="#" id="add_location_details" class="bidzbutton"><i class="fas fa-plus"></i> Add Asset Location Information</a>
                    <ul id="location_list">
                        
                    </ul>

                    <p class="disclaimer_center_par color_chocolate" id="asset_location_disclaimer">You are required to enter at least one asset location</p>
                </div>
            </div>
            
            <h4 class="sign_heading"><span>Active House Accounts</span></h4>
            
            <p class="disclaimer_center_par color_chocolate">Please click on the house accounts that you want to be active on this catalog</p>

            <div class="catalog_row signup_row house_picker">

                <?php
                    
                    $count_sql = "SELECT COUNT(*) AS cnt FROM house WHERE `owner`='$username' ORDER BY id";
                    $count_result = mysqli_query($conn, $count_sql);
                    $count_row = mysqli_fetch_assoc($count_result);
                    $count = $count_row['cnt'];

                    if($count != 0){
                            
                        $house_count = 0;
                        $house_sql = "SELECT * FROM house WHERE `owner`='$username' ORDER BY id";
                        $house_result = mysqli_query($conn, $house_sql);
                        while($row = mysqli_fetch_assoc($house_result)){
                            $id = $row['id'];
                            $first_name = $row['first_name'];
                            $last_name = $row['last_name'];
                            $user = $row['username'];
                            $email = $row['email'];
                            $house_count++;
                            ?>

                                <div class="house_node">
                                    <img name="<?php echo $id; ?>" src="../img/checkmark.png" alt="">
                                    <span><?php echo $first_name . " " . $last_name; ?></span>
                                    <span><?php echo $user; ?></span>
                                    <span><?php echo $email; ?></span>
                                </div>

                            <?php
                        }

                        $house_leftover = $house_count%3;
                        if($house_leftover != 0){
                            $house_leftover =  3-$house_leftover;
                        }
                    }
                    else{
                        ?>

                        <p class="disclaimer_center_par">You currently have no house accounts associated with this seller's account. If you wish to create house accounts, click <a href="<?php echo $root;?>seller/house_accounts.php">here</a></p>

                        <?php
                    }
                ?>

                    <?php
                        for($i=0; $i < $house_leftover; $i++){

                            ?>
                                <div class="house_node visibility_hidden">
                                </div>
                            <?php
                        }

                    ?>
                    <input type="hidden" name="active_house_accounts" id="active_house_accounts" value="||">
            </div>

            <h4 class="sign_heading"><span>Miscellaneous Details</span></h4>

            <div class="catalog_row signup_row">
                <div class="col3">
                    <div class="signup_group">
                        <label for="asset_currency" class="input_label">Currency<span class="required">*</span></label>
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
                        <label for="asset_timezone" class="input_label">TimeZone<span class="required">*</span></label>
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
                        <label for="buyer_premium" class="input_label">Buyer Premium (%)<span class="required">*</span></label>
                        <input class="input_text" placeholder="Buyer Premium (%)" type="number" name="buyer_premium" id="buyer_premium">
                    </div>
                </div>
            </div>

            
            
            <h4 class="sign_heading"><span>Inspection Dates and Times</span></h4>

            <p class="sign_up_disclaimer">Inspection time and date is based on asset location (this is optional)</p>

            <div class="inspect_area">
                <div class="add_button">
                    <a href="#" id="add_inspect_details" class="bidzbutton"><i class="fas fa-plus"></i> Add Inspection Information</a>

                    <ul id="inspection_list">
                        
                    </ul>
                    
                    <p class="disclaimer_center_par color_chocolate" id="inspection_location_disclaimer">You must specify an asset location above before you can create inspection dates and times</p>

                    <div class="catalog_row signup_row special_notes">
                        <div class="col1">
                            <div class="signup_group">
                                <label for="inspection_notes" class="input_label float_left">Inspection Notes - Optional</label>
                                <textarea class="input_text" name="inspection_notes" id="inspection_notes" rows="3" placeholder="Inspection Notes"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <h4 class="sign_heading"><span>Removal Dates and Times</span></h4>

                
            <p class="sign_up_disclaimer">Removal time and date is based on asset location. At least one of these are required<span class="required">*</span></p>

            <div class="removal_area">
                <div class="add_button">
                    <a href="#" id="add_removal_details" class="bidzbutton"><i class="fas fa-plus"></i> Add Removal Information</a>
                    <ul id="removal_list">
                    
                    </ul>
                    
                    <p class="disclaimer_center_par color_chocolate" id="removal_location_disclaimer">You must specify an asset location above before you can create removal dates and times</p>

                    <p class="disclaimer_center_par color_chocolate" id="multiple_removal_disclaimer">You must list at least one removal date and time</p>

                    <div class="catalog_row signup_row special_notes">
                        <div class="col1">
                            <div class="signup_group">
                                <label for="removal_notes" class="input_label float_left">Removal Notes - Optional</label>
                                <textarea class="input_text" name="removal_notes" id="removal_notes" rows="3" placeholder="Removal Notes"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            

            
            <h4 class="sign_heading"><span>Onsite Contact Information</span></h4>

            
            <p class="sign_up_disclaimer">Contact information is optional, but strongly encouraged</p>

            <div class="contact_area">
                <div class="add_button">
                    <a href="#" id="add_onsite_contact" class="bidzbutton"><i class="fas fa-plus"></i> Add Contact Information</a>
                    <ul id="contact_list">
                        
                    </ul>
                    
                    <p class="disclaimer_center_par color_chocolate" id="contact_location_disclaimer">You must specify an asset location above before you can create contact information</p>
                </div>
            </div>


            <h4 class="sign_heading"><span>Registration Questions</span></h4>

            <p class="sign_up_disclaimer">These questions are asked to the buyer when they attempt to register for this auction</p>
            <div class="question_area">
                <div class="add_button">
                    <a href="#" id="add_registration_question" class="bidzbutton"><i class="fas fa-plus"></i> Add Registration Question</a>

                    <ul id="question_list">
                    </ul>
                </div>
            </div>


            
            <h4 class="sign_heading"><span>Legal</span></h4>

            
            <div class="catalog_row signup_row">
                <div class="col1">
                    <div class="signup_group">
                        <label for="terms_conditions" class="input_label">Catalog Terms & Conditions<span class="required">*</span></label>
                        <textarea class="input_text" name="terms_conditions" id="terms_conditions" rows="3" placeholder="Terms and Conditions"></textarea>
                    </div>
                </div>
            </div>

            <input type="hidden" name="confirm_creation" id="confirm_creation" value="1"/>
            
            <div class="catalog_row signup_row">
                <p class="saving_catalog_disclaimer">Your catalog is being created. Please wait.</p>
                <a  type="submit" class="fancy-submit fancy-button bg-gradient1 cursor_pointer" style="margin:auto;" href="#" id="create_account_submit" disabled><span>Create Catalog</span></a>
            </div>
        </section>


        <input type="hidden" name="question_num" id="question_num" value="0">
        <input type="hidden" name="contact_num" id="contact_num" value="0">
        <input type="hidden" name="inspection_num" id="inspection_num" value="0">
        <input type="hidden" name="removal_num" id="removal_num" value="0">
        <input type="hidden" name="location_num" id="location_num" value="0">

    </form>

    <!-- Question Modals -->
    <div id="add_question_modal" class="add_question_modal catalog_modal">
        <div class="modal_content question_modal width_550">
            <h1>Add Registration Question</h1>

            
            <div class="catalog_row signup_row">
                <div class="col1">
                    <div class="signup_group">
                        <label for="registration_question" class="input_label">Registration Question</label>
                        <input type="text" class="input_text" name="registration_question" id="registration_question" placeholder="Question">
                    </div>
                </div>
            </div>
            

            <div class="catalog_row signup_row operations">
                <div class="col1">
                    <a href="#" class="bidzbutton devart" id="submit_question_form">Add Registration Question</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>
    
    <div id="edit_question_modal" class="edit_question_modal catalog_modal">
        <div class="modal_content question_modal width_550">
            <h1>Edit Registration Question</h1>

            
            <div class="catalog_row signup_row">
                <div class="col1">
                    <div class="signup_group">
                        <label for="edit_registration_question" class="input_label">Registration Question</label>
                        <input type="text" class="input_text" name="edit_registration_question" id="edit_registration_question" placeholder="Question">
                    </div>
                </div>
            </div>
            
            <input type="hidden" name="edit_question_number" id="edit_question_number" value="">

            <div class="catalog_row signup_row operations">
                <div class="col1">
                    <a href="#" class="bidzbutton devart"  id="save_edit_question">Edit Registration Question</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Modals -->
    <div id="add_contact_modal" class="add_contact_modal catalog_modal">
        <div class="modal_content contact_modal">
            <h1>Add Onsite Contact</h1>

            
            <div class="catalog_row signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="contact_name" class="input_label">Contact Name</label>
                        <input type="text" class="input_text" name="contact_name" id="contact_name" placeholder="Contact Name">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="contact_phone" class="input_label">Contact Phone</label>
                        <input type="text" class="input_text" name="contact_phone" id="contact_phone" placeholder="Contact Phone">
                    </div>
                </div>
            </div>
            
            <div class="catalog_row signup_row">
                <div class="col1">
                    <div class="signup_group">
                        <label for="contact_location" class="input_label">Asset Location Address</label>
                        <select name="contact_location" id="contact_location" class="input_text height_42">
                        </select>
                    </div>
                </div>
            </div>

            <div class="catalog_row signup_row operations">
                <div class="col1">
                    <a href="#" class="bidzbutton devart"  id="submit_contact_form">Add Onsite Contact</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>
    
    <div id="edit_contact_modal" class="edit_contact_modal catalog_modal">
        <div class="modal_content contact_modal">
            <h1>Edit Onsite Contact</h1>

            
            <div class="catalog_row signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="edit_contact_name" class="input_label">Contact Name</label>
                        <input type="text" class="input_text" name="edit_contact_name" id="edit_contact_name" placeholder="Contact Name">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="edit_contact_phone" class="input_label">Contact Phone</label>
                        <input type="text" class="input_text" name="edit_contact_phone" id="edit_contact_phone" placeholder="Contact Phone">
                    </div>
                </div>
            </div>
            
            <div class="catalog_row signup_row">
                <div class="col1">
                    <div class="signup_group">
                        <label for="edit_contact_location" class="input_label">Asset Location Address</label>
                        <select name="edit_contact_location" id="edit_contact_location" class="input_text height_42">
                        </select>
                    </div>
                </div>
            </div>

            <input type="hidden" name="edit_contact_number" id="edit_contact_number" value="">
            
            <div class="catalog_row signup_row operations">
                <div class="col1">
                    <a href="#" class="bidzbutton devart" id="save_edit_contact">Edit Onsite Contact</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Inspection Modals -->
    <div id="add_inspection_modal" class="add_inspection_modal catalog_modal">
        <div class="modal_content inspection_modal">
            <h1>Add Inspection Information</h1>

            
            <div class="catalog_row signup_row">
                
            <div class="col2">
                    <div class="signup_group">
                        <label for="inspection_start_date" class="input_label">Inspection Start Date</label>
                        <input type="text" class="input_text date date_picker" onkeypress="return false"  name="inspection_start_date" id="inspection_start_date" placeholder="mm/dd/yyyy">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="inspection_end_date" class="input_label">Inspection End Date - Not Required</label>
                        <input type="text" class="input_text date date_picker" onkeypress="return false"  name="inspection_end_date" id="inspection_end_date" placeholder="mm/dd/yyyy">
                    </div>
                </div>
            </div>
            <div class="catalog_row signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="inspection_start_time" class="input_label">Inspection Start Time</label>
                        <select class="input_text input_select start_time_drop" name="inspection_start_time" id="inspection_start_time">
                            <option class="select" value="">Select a Start Time</option>
                        </select>
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="inspection_end_time" class="input_label">Inspection End Time</label>
                        <select class="input_text input_select end_time_drop" name="inspection_end_time" id="inspection_end_time">
                            <option class="select" value="">Select a End Time</option>
                        </select>
                    </div>
                </div>
            </div>

            
            <div class="catalog_row signup_row">
                <div class="col1">
                    <div class="signup_group">
                        <label for="inspection_location" class="input_label">Asset Location Address</label>
                        <select name="inspection_location" id="inspection_location" class="input_text height_42">
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="catalog_row signup_row operations">
                <div class="col1">
                    <a href="#" class="bidzbutton devart"  id="submit_inspection_form">Add Inspection Information</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>

    <div id="edit_inspection_modal" class="edit_inspection_modal catalog_modal">
        <div class="modal_content inspection_modal">
            <h1>Edit inspection Information</h1>

            
            <div class="catalog_row signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="edit_inspection_start_date" class="input_label">Inspection Start Date</label>
                        <input type="text" class="date input_text date_picker"  onkeypress="return false" name="edit_inspection_start_date" id="edit_inspection_start_date" placeholder="mm/dd/yyyy">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="edit_inspection_end_date" class="input_label">Inspection End Date - Not Required</label>
                        <input type="text" class="date input_text date_picker"  onkeypress="return false" name="edit_inspection_end_date" id="edit_inspection_end_date" placeholder="mm/dd/yyyy">
                    </div>
                </div>
            </div>
            <div class="catalog_row signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="edit_inspection_start_time" class="input_label">Inspection Start Time</label>
                        <select class="input_text input_select start_time_drop" name="edit_inspection_start_time" id="edit_inspection_start_time">
                            <option class="select" value="">Select a Start Time</option>
                            <option value="1">8:00 AM</option>
                        </select>
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="edit_inspection_end_time" class="input_label">Inspection End Time</label>
                        <select class="input_text input_select end_time_drop" name="edit_inspection_end_time" id="edit_inspection_end_time">
                            <option class="select" value="">Select a End Time</option>
                            <option value="1">8:00 AM</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="catalog_row signup_row">
                <div class="col1">
                    <div class="signup_group">
                        <label for="edit_inspection_location" class="input_label">Asset Location Address</label>
                        <select name="edit_inspection_location" id="edit_inspection_location" class="input_text height_42">
                        </select>
                    </div>
                </div>
            </div>
            
            <input type="hidden" name="edit_inspection_number" id="edit_inspection_number" value="">

            <div class="catalog_row signup_row operations">
                <div class="col1">
                    <a href="#" class="bidzbutton devart"  id="save_edit_inspection">Edit inspection Information</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Removal Modals -->
    <div id="add_removal_modal" class="add_removal_modal catalog_modal">
        <div class="modal_content removal_modal">
            <h1>Add Removal Information</h1>

            
            <div class="catalog_row signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="removal_start_date" class="input_label">Removal Start Date</label>
                        <input type="text" class="date input_text date_picker"  onkeypress="return false" name="removal_start_date" id="removal_start_date" placeholder="mm/dd/yyyy">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="removal_end_date" class="input_label">Removal End Date - Not Required</label>
                        <input type="text" class="date input_text date_picker"  onkeypress="return false" name="removal_end_date" id="removal_end_date" placeholder="mm/dd/yyyy">
                    </div>
                </div>
            </div>
                
            <div class="catalog_row signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="removal_start_time" class="input_label">Removal Start Time</label>
                        <select class="input_text input_select start_time_drop" name="removal_start_time" id="removal_start_time">
                            <option class="select" value="">Select a Start Time</option>
                            <option value="1">8:00 AM</option>
                        </select>
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="removal_end_time" class="input_label">Removal End Time</label>
                        <select class="input_text input_select end_time_drop" name="removal_end_time" id="removal_end_time">
                            <option class="select" value="">Select a End Time</option>
                            <option value="1">8:00 AM</option>
                        </select>
                    </div>
                </div>
            </div>

            
            <div class="catalog_row signup_row">
                <div class="col1">
                    <div class="signup_group">
                        <label for="removal_location" class="input_label">Asset Location Address</label>
                        <select name="removal_location" id="removal_location" class="input_text height_42">
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="catalog_row signup_row operations">
                <div class="col1">
                    <a href="#" class="bidzbutton devart"  id="submit_removal_form">Add Removal Information</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>
    
    <div id="edit_removal_modal" class="edit_removal_modal catalog_modal">
        <div class="modal_content removal_modal">
            <h1>Edit Removal Information</h1>

            
            <div class="catalog_row signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="edit_removal_start_date" class="input_label">Removal Start Date</label>
                        <input type="text" class="date input_text date_picker"  onkeypress="return false" name="edit_removal_start_date" id="edit_removal_start_date" placeholder="mm/dd/yyyy">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="edit_removal_end_date" class="input_label">Removal End Date - Not Required</label>
                        <input type="text" class="date input_text date_picker"  onkeypress="return false" name="edit_removal_end_date" id="edit_removal_end_date" placeholder="mm/dd/yyyy">
                    </div>
                </div>
            </div>
            <div class="catalog_row signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="edit_removal_start_time" class="input_label">Removal Start Time</label>
                        <select class="input_text input_select start_time_drop" name="edit_removal_start_time" id="edit_removal_start_time">
                            <option class="select" value="">Select a Start Time</option>
                            <option value="1">8:00 AM</option>
                        </select>
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="edit_removal_end_time" class="input_label">Removal End Time</label>
                        <select class="input_text input_select end_time_drop" name="edit_removal_end_time" id="edit_removal_end_time">
                            <option class="select" value="">Select a End Time</option>
                            <option value="1">8:00 AM</option>
                        </select>
                    </div>
                </div>
            </div>
            
            
            <div class="catalog_row signup_row">
                <div class="col1">
                    <div class="signup_group">
                        <label for="edit_removal_location" class="input_label">Asset Location Address</label>
                        <select name="edit_removal_location" id="edit_removal_location" class="input_text height_42">
                        </select>
                    </div>
                </div>
            </div>
            
            <input type="hidden" name="edit_removal_number" id="edit_removal_number" value="">

            <div class="catalog_row signup_row operations">
                <div class="col1">
                    <a href="#" class="bidzbutton devart"  id="save_edit_removal">Edit Removal Information</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Location Modals -->
    <div id="add_location_modal" class="add_location_modal catalog_modal">
        <div class="modal_content location_modal">
            <h1>Add Assset Location Information</h1>

            
            <div class="catalog_row signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="asset_address1" class="input_label">Address 1</label>
                        <input type="text" class="input_text"  name="asset_address1" id="asset_address1" placeholder="Address 1">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="asset_address2" class="input_label">Address 2</label>
                        <input type="text" class="input_text"  name="asset_address2" id="asset_address2" placeholder="Address 2">
                    </div>
                </div>
            </div>

            <div class="catalog_row signup_row">
                <div class="col3">
                    <div class="signup_group">
                        <label for="asset_country" class="input_label">Country</label>
                        <select class="input_text input_select country_drop" name="asset_country" id="asset_country">
                            <option value="">Select a Country</option>
                        </select>
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="asset_city" class="input_label">City</label>
                        <input type="text" class="input_text" name="asset_city" id="asset_city" placeholder="City">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="asset_state" class="input_label">State / Province</label>
                        <select class="input_text input_select" name="asset_state" id="asset_state">
                            <option class="select" value="">Select a State/Province</option>
                        </select>
                        <input style="display:none;" type="text" class="input_text ship_state" name="asset_state_static" id="asset_state_static" placeholder="State / Province">
                    </div>
                </div>
            </div>
            
            <div class="catalog_row signup_row operations">
                <div class="col1">
                    <a href="#" class="bidzbutton devart" id="submit_location_form">Add Location Information</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>
    
    <div id="edit_location_modal" class="edit_location_modal catalog_modal">
        <div class="modal_content location_modal">
            <h1>Edit Assset Location Information</h1>

            
            <div class="catalog_row signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="edit_asset_address1" class="input_label">Address 1</label>
                        <input type="text" class="input_text"  name="edit_asset_address1" id="edit_asset_address1" placeholder="Address 1">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="edit_asset_address2" class="input_label">Address 2</label>
                        <input type="text" class="input_text"  name="edit_asset_address2" id="edit_asset_address2" placeholder="Address 2">
                    </div>
                </div>
            </div>

            <div class="catalog_row signup_row">
                <div class="col3">
                    <div class="signup_group">
                        <label for="edit_asset_country" class="input_label">Country</label>
                        <select class="input_text input_select country_drop" name="edit_asset_country" id="edit_asset_country">
                            <option value="">Select a Country</option>
                        </select>
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="edit_asset_city" class="input_label">City</label>
                        <input type="text" class="input_text" name="edit_asset_city" id="edit_asset_city" placeholder="City">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="edit_asset_state" class="input_label">State / Province</label>
                        <select class="input_text input_select" name="edit_asset_state" id="edit_asset_state">
                            <option class="select" value="">Select a State/Province</option>
                        </select>
                        <input style="display:none;" type="text" class="input_text ship_state" name="edit_asset_state_static" id="edit_asset_state_static" placeholder="State / Province">
                    </div>
                </div>
            </div>
            
            <input type="hidden" name="edit_location_number" id="edit_location_number" value="">

            <div class="catalog_row signup_row operations">
                <div class="col1">
                    <a href="#" class="bidzbutton devart" id="save_edit_location">Edit Location Information</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>


    <?php include "../includes/footer.php"; ?>
<script src="js/catalog_create.js"></script>
<script>
    var countries = [];

    <?php
    $country_sql = "SELECT * FROM countries";
    $country_result = mysqli_query($conn, $country_sql);
    while($row = mysqli_fetch_assoc($country_result)){
        $line = $row['country_code'] . "||" . $row['country_name'];
        ?>
        countries.push("<?php echo $line; ?>");
        <?php
    }

    ?>

    function country_code_to_name(code){
        for(var i= 0; i<countries.length; i++){
            var res = countries[i].split("||");
            var cd = res[0];
            var cname = res[1];

            if(cd == code){
                return cname;
            }
        }
    }

    var times = [];

    <?php
        $all_times = array();
        $time_sql = "SELECT * FROM `time`";
        $time_result = mysqli_query($conn, $time_sql);
        while($row = mysqli_fetch_assoc($time_result)){
            $line = $row['military_time'] . "||" . $row['display_time'];
            array_push($all_times, $line);
            ?>
            times.push("<?php echo $line; ?>");
            <?php
        }

        function get_display_from_mil($mil){
            foreach($all_times as $t){
                $t_comps = explode("||", $t);

                $mi = $t_comps[0];
                $disp = $t_comps[1];

                if($mi == $mil){
                    return $disp;
                }
            }
        }
    ?>

    function mil_time_to_disp(mil){
        for(var i=0; i<times.length; i++){
            var res = times[i].split("||");
            var mi = res[0];
            var disp = res[1];

            if(mil == mi){
                return disp;
            }
        }
    }
</script>