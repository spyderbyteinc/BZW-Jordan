<?php
    session_start();

    include "../includes/username.php"; 
    include "../includes/connect.php";

    if($username == "" || !isset($username)){
        header("location: ../index.php?login_error=0");
        exit();
    }
    
    include "../helpers/date_conversion.php";

    if(!isset($_GET['catalog_id'])){
        header("location: manage.php");
        exit();
    }

    $catalog_id = $_GET['catalog_id'];

    $_SESSION['catalog_id'] = $catalog_id;

    $sql = "SELECT * FROM `catalogs` WHERE `owner`='$username' AND `id`='$catalog_id'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count == 0){
        header("location: manage.php");
        exit();
    }

    $_SESSION["catalog_id"] = $catalog_id;

    
    $row_catalog = mysqli_fetch_assoc($result);

    if($row_catalog['published'] == 1 || $row_catalog['published'] == "1"){
        header("location: manage.php");
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
    
    while($row_currency = mysqli_fetch_assoc($currency_result)){
        $cur = $row_currency['currency_name'] . "||" . $row_currency['currency_abbr'];
        
        array_push($all_currency, $cur);
    }

    $all_timezones = array();
    $timezone_sql = "SELECT * FROM timezones";
    $timezone_result = mysqli_query($conn, $timezone_sql);

    while($row_timezone = mysqli_fetch_assoc($timezone_result)){
        $tim = $row_timezone['zone_code'] . "||" . $row_timezone['zone_name'];

        array_push($all_timezones, $tim);
    }
?>

<div class="catalog_creation_header">
    <h2 class="house_heading section_heading"><span>Edit Catalog Details</span></h2>
</div>
    <div class="cancel_button_container">
        <a href="<?php echo $root; ?>catalogs/manage.php" class="bidzbutton orange cancel_creation"><i class="fas fa-arrow-left"></i> Cancel Catalog Edit</a>
        
    </div>
    <!-- <form action="<?php echo $root; ?>processes/process_catalog_creation.php" name="catalog_creation_form" id="catalog_creation_form" method="post"> -->
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
            
            <h4 class="sign_heading"><span>Miscellaneous Details</span></h4>

            <div class="catalog_row signup_row">
                <div class="col2">
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
                <div class="col2">
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
            </div>
            <div class="catalog_row signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="buyer_premium" class="input_label">Buyer Premium (%)<span class="required">*</span></label>
                        <input class="input_text" placeholder="Buyer Premium (%)" type="number" name="buyer_premium" id="buyer_premium">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="allow_freeze" class="input_label">Allow Freezing?<span class="required">*</span></label>
                        <select class="input_text input_select" name="allow_freeze" id="allow_freeze">
                            <option value="">Allow Freezing?</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
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
                        while($row_house = mysqli_fetch_assoc($house_result)){
                            $id = $row_house['id'];
                            $first_name = $row_house['first_name'];
                            $last_name = $row_house['last_name'];
                            $user = $row_house['username'];
                            $email = $row_house['email'];
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
                <p class="saving_catalog_disclaimer">Your catalog is being updated. Please wait.</p>
                <a  type="submit" class="fancy-submit fancy-button bg-gradient1 cursor_pointer" style="margin:auto;" href="#" id="edit_account_submit" disabled><span>Update Catalog</span></a>
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
                        <label for="registration_question" class="input_label">Registration Question<span class="required">*</span></label>
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
                        <label for="edit_registration_question" class="input_label">Registration Question<span class="required">*</span></label>
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
                        <label for="contact_name" class="input_label">Contact Name<span class="required">*</span></label>
                        <input type="text" class="input_text" name="contact_name" id="contact_name" placeholder="Contact Name">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="contact_phone" class="input_label">Contact Phone<span class="required">*</span></label>
                        <input type="text" class="input_text" name="contact_phone" id="contact_phone" placeholder="Contact Phone">
                    </div>
                </div>
            </div>
            
            <div class="catalog_row signup_row">
                <div class="col1">
                    <div class="signup_group">
                        <label for="contact_location" class="input_label">Asset Location Address<span class="required">*</span></label>
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
                        <label for="edit_contact_name" class="input_label">Contact Name<span class="required">*</span></label>
                        <input type="text" class="input_text" name="edit_contact_name" id="edit_contact_name" placeholder="Contact Name">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="edit_contact_phone" class="input_label">Contact Phone<span class="required">*</span></label>
                        <input type="text" class="input_text" name="edit_contact_phone" id="edit_contact_phone" placeholder="Contact Phone">
                    </div>
                </div>
            </div>
            
            <div class="catalog_row signup_row">
                <div class="col1">
                    <div class="signup_group">
                        <label for="edit_contact_location" class="input_label">Asset Location Address<span class="required">*</span></label>
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
                        <label for="inspection_start_date" class="input_label">Inspection Start Date<span class="required">*</span></label>
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
                        <label for="inspection_start_time" class="input_label">Inspection Start Time<span class="required">*</span></label>
                        <select class="input_text input_select start_time_drop" name="inspection_start_time" id="inspection_start_time">
                            <option class="select" value="">Select a Start Time</option>
                        </select>
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="inspection_end_time" class="input_label">Inspection End Time<span class="required">*</span></label>
                        <select class="input_text input_select end_time_drop" name="inspection_end_time" id="inspection_end_time">
                            <option class="select" value="">Select a End Time</option>
                        </select>
                    </div>
                </div>
            </div>

            
            <div class="catalog_row signup_row">
                <div class="col1">
                    <div class="signup_group">
                        <label for="inspection_location" class="input_label">Asset Location Address<span class="required">*</span></label>
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
                        <label for="edit_inspection_start_date" class="input_label">Inspection Start Date<span class="required">*</span></label>
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
                        <label for="edit_inspection_start_time" class="input_label">Inspection Start Time<span class="required">*</span></label>
                        <select class="input_text input_select start_time_drop" name="edit_inspection_start_time" id="edit_inspection_start_time">
                            <option class="select" value="">Select a Start Time</option>
                            <option value="1">8:00 AM</option>
                        </select>
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="edit_inspection_end_time" class="input_label">Inspection End Time<span class="required">*</span></label>
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
                        <label for="edit_inspection_location" class="input_label">Asset Location Address<span class="required">*</span></label>
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
                        <label for="removal_start_date" class="input_label">Removal Start Date<span class="required">*</span></label>
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
                        <label for="removal_start_time" class="input_label">Removal Start Time<span class="required">*</span></label>
                        <select class="input_text input_select start_time_drop" name="removal_start_time" id="removal_start_time">
                            <option class="select" value="">Select a Start Time</option>
                            <option value="1">8:00 AM</option>
                        </select>
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="removal_end_time" class="input_label">Removal End Time<span class="required">*</span></label>
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
                        <label for="removal_location" class="input_label">Asset Location Address<span class="required">*</span></label>
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
                        <label for="edit_removal_start_date" class="input_label">Removal Start Date<span class="required">*</span></label>
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
                        <label for="edit_removal_start_time" class="input_label">Removal Start Time<span class="required">*</span></label>
                        <select class="input_text input_select start_time_drop" name="edit_removal_start_time" id="edit_removal_start_time">
                            <option class="select" value="">Select a Start Time</option>
                            <option value="1">8:00 AM</option>
                        </select>
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="edit_removal_end_time" class="input_label">Removal End Time<span class="required">*</span></label>
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
                        <label for="edit_removal_location" class="input_label">Asset Location Address<span class="required">*</span></label>
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
                        <label for="asset_address1" class="input_label">Address 1<span class="required">*</span></label>
                        <input type="text" class="input_text"  name="asset_address1" id="asset_address1" placeholder="Address 1">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="asset_address2" class="input_label">Address 2 - Not Required</label>
                        <input type="text" class="input_text"  name="asset_address2" id="asset_address2" placeholder="Address 2">
                    </div>
                </div>
            </div>

            <div class="catalog_row signup_row">
                <div class="col3">
                    <div class="signup_group">
                        <label for="asset_country" class="input_label">Country<span class="required">*</span></label>
                        <select class="input_text input_select country_drop" name="asset_country" id="asset_country">
                            <option value="">Select a Country</option>
                        </select>
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="asset_city" class="input_label">City<span class="required">*</span></label>
                        <input type="text" class="input_text" name="asset_city" id="asset_city" placeholder="City">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="asset_state" class="input_label">State / Province<span class="required">*</span></label>
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
                        <label for="edit_asset_address1" class="input_label">Address 1<span class="required">*</span></label>
                        <input type="text" class="input_text"  name="edit_asset_address1" id="edit_asset_address1" placeholder="Address 1">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="edit_asset_address2" class="input_label">Address 2 - Not Required</label>
                        <input type="text" class="input_text"  name="edit_asset_address2" id="edit_asset_address2" placeholder="Address 2">
                    </div>
                </div>
            </div>

            <div class="catalog_row signup_row">
                <div class="col3">
                    <div class="signup_group">
                        <label for="edit_asset_country" class="input_label">Country<span class="required">*</span></label>
                        <select class="input_text input_select country_drop" name="edit_asset_country" id="edit_asset_country">
                            <option value="">Select a Country</option>
                        </select>
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="edit_asset_city" class="input_label">City<span class="required">*</span></label>
                        <input type="text" class="input_text" name="edit_asset_city" id="edit_asset_city" placeholder="City">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="edit_asset_state" class="input_label">State / Province<span class="required">*</span></label>
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

<!-- <script src="js/catalog_create.js"></script> -->
<script>
    // Start and End time selectors
    $(".start_time_drop").html(start_time);
    $(".end_time_drop").html(end_time);

    // Hide Add Information buttons
    $("#add_inspect_details").css("display", "none");
    $("#add_removal_details").css("display", "none");
    $("#add_onsite_contact").css("display", "none");

    // Handle House Account Selection
    $(".house_node").click(function () {
        var img = $(this).find("img");
        var house_id = img.attr("name");

        var closure = img.css("display");


        // Add to list - not checked
        if (closure == "none") {
            var orig = $("#active_house_accounts").val();

            var output = orig + house_id + "||";

            $("#active_house_accounts").val(output);

            img.css("display", "block");
        }
        else {
            var orig = $("#active_house_accounts").val();

            var sub = "||" + house_id + "||";

            var output = orig.replace(sub, "||");

            $("#active_house_accounts").val(output);

            img.css("display", "none");
        }
    });
    
    var date_error = false;
    var inspection_date_error = false;
    var removal_date_error = false;


    // Date Pickers
    var d = new Date();
    var y = d.getFullYear();
    var r = y + 3;

    var range = "-80:" + r;

    // $(".date").datepicker({
    //     changeYear: true,
    //     changeMonth: true,
    //     yearRange: range,
    //     onSelect: function (dateText) {
    //         $(this).css("background-color", "whitesmoke");
    //     }
    // });
    

    function date_formatter(dateText) {
        var comps = dateText.split("/");

        var month = comps[0] - 1;
        var day = comps[1];
        var year = comps[2];

        var thisDate = new Date(year, month, day);

        return thisDate;
    }

    $(".date_picker").datepicker({
        changeYear: true,
        changeMonth: true,
        yearRange: range,
        onSelect: function (dateText) {
            $(this).css("background-color", "whitesmoke");
            
            var id = $(this).attr("id");

            var this_date = date_formatter(dateText);

            if (id == "start_date") {
                var start_date = this_date;
                var end_date_val = $("#end_date").val();

                if (end_date_val != "") {
                    var end_date = date_formatter(end_date_val);

                    if (start_date > end_date) {
                        alert("The catalog end date must be after the start date");

                        $("#start_date").css("background-color", "lightpink");
                        $("#end_date").css("background-color", "lightpink");

                        date_error = true;
                    }
                    else {
                        $("#start_date").css("background-color", "whitesmoke");
                        $("#end_date").css("background-color", "whitesmoke");

                        date_error = false;
                    }
                }
                else {
                    $("#start_date").css("background-color", "whitesmoke");
                    $("#end_date").css("background-color", "whitesmoke");

                    date_error = false;
                }
            }
            else if (id == "end_date") {
                var end_date = this_date;
                var start_date_val = $("#start_date").val();

                if (start_date_val != "") {
                    var start_date = date_formatter(start_date_val);

                    if (start_date > end_date) {
                        alert("The catalog end date must be after the start date");

                        $("#start_date").css("background-color", "lightpink");
                        $("#end_date").css("background-color", "lightpink");

                        date_error = true;
                    }
                    else {
                        $("#start_date").css("background-color", "whitesmoke");
                        $("#end_date").css("background-color", "whitesmoke");

                        date_error = false;
                    }
                }
                else {
                    $("#start_date").css("background-color", "whitesmoke");
                    $("#end_date").css("background-color", "whitesmoke");

                    date_error = false;
                }
            }


            if (id == "inspection_start_date") {
                var start_date = this_date;
                var end_date_val = $("#inspection_end_date").val();

                if (end_date_val != "") {
                    var end_date = date_formatter(end_date_val);

                    if (start_date > end_date) {
                        alert("The inspection end date must be after the start date");

                        $("#inspection_start_date").css("background-color", "lightpink");
                        $("#inspection_end_date").css("background-color", "lightpink");

                        inspection_date_error = true;
                    }
                    else {
                        $("#inspection_start_date").css("background-color", "whitesmoke");
                        $("#inspection_end_date").css("background-color", "whitesmoke");

                        inspection_date_error = false;
                    }

                }
                else {
                    $("#inspection_start_date").css("background-color", "whitesmoke");
                    $("#inspection_end_date").css("background-color", "whitesmoke");

                    inspection_date_error = false;
                }
            }
            else if (id == "inspection_end_date") {
                var end_date = this_date;
                var start_date_val = $("#inspection_start_date").val();

                if (start_date_val != "") {
                    var start_date = date_formatter(start_date_val);


                    if (start_date > end_date) {
                        alert("The inspection end date must be after the start date");

                        $("#inspection_start_date").css("background-color", "lightpink");
                        $("#inspection_end_date").css("background-color", "lightpink");

                        inspection_date_error = true;
                    }
                    else {
                        $("#inspection_start_date").css("background-color", "whitesmoke");
                        $("#inspection_end_date").css("background-color", "whitesmoke");

                        inspection_date_error = false;
                    }
                }
                else {
                    $("#inspection_start_date").css("background-color", "whitesmoke");
                    $("#inspection_end_date").css("background-color", "whitesmoke");

                    inspection_date_error = false;
                }
            }



            if (id == "edit_inspection_start_date") {
                var start_date = this_date;
                var end_date_val = $("#edit_inspection_end_date").val();

                if (end_date_val != "") {
                    var end_date = date_formatter(end_date_val);

                    if (start_date > end_date) {
                        alert("The inspection end date must be after the start date");

                        $("#edit_inspection_start_date").css("background-color", "lightpink");
                        $("#edit_inspection_end_date").css("background-color", "lightpink");

                        inspection_date_error = true;
                    }
                    else {
                        $("#edit_inspection_start_date").css("background-color", "whitesmoke");
                        $("#edit_inspection_end_date").css("background-color", "whitesmoke");

                        inspection_date_error = false;
                    }

                }
                else {
                    $("#edit_inspection_start_date").css("background-color", "whitesmoke");
                    $("#edit_inspection_end_date").css("background-color", "whitesmoke");

                    inspection_date_error = false;
                }
            }
            else if (id == "edit_inspection_end_date") {
                var end_date = this_date;
                var start_date_val = $("#edit_inspection_start_date").val();

                if (start_date_val != "") {
                    var start_date = date_formatter(start_date_val);


                    if (start_date > end_date) {
                        alert("The inspection end date must be after the start date");

                        $("#edit_inspection_start_date").css("background-color", "lightpink");
                        $("#edit_inspection_end_date").css("background-color", "lightpink");

                        inspection_date_error = true;
                    }
                    else {
                        $("#edit_inspection_start_date").css("background-color", "whitesmoke");
                        $("#edit_inspection_end_date").css("background-color", "whitesmoke");

                        inspection_date_error = false;
                    }
                }
                else {
                    $("#edit_inspection_start_date").css("background-color", "whitesmoke");
                    $("#edit_inspection_end_date").css("background-color", "whitesmoke");

                    inspection_date_error = false;
                }
            }


            if (id == "removal_start_date") {
                var start_date = this_date;
                var end_date_val = $("#removal_end_date").val();

                if (end_date_val != "") {
                    var end_date = date_formatter(end_date_val);

                    if (start_date > end_date) {
                        alert("The removal end date must be after the start date");

                        $("#removal_start_date").css("background-color", "lightpink");
                        $("#removal_end_date").css("background-color", "lightpink");

                        removal_date_error = true;
                    }
                    else {
                        $("#removal_start_date").css("background-color", "whitesmoke");
                        $("#removal_end_date").css("background-color", "whitesmoke");

                        removal_date_error = false;
                    }

                }
                else {
                    $("#removal_start_date").css("background-color", "whitesmoke");
                    $("#removal_end_date").css("background-color", "whitesmoke");

                    removal_date_error = false;
                }
            }
            else if (id == "removal_end_date") {
                var end_date = this_date;
                var start_date_val = $("#removal_start_date").val();

                if (start_date_val != "") {
                    var start_date = date_formatter(start_date_val);


                    if (start_date > end_date) {
                        alert("The removal end date must be after the start date");

                        $("#removal_start_date").css("background-color", "lightpink");
                        $("#removal_end_date").css("background-color", "lightpink");

                        removal_date_error = true;
                    }
                    else {
                        $("#removal_start_date").css("background-color", "whitesmoke");
                        $("#removal_end_date").css("background-color", "whitesmoke");

                        removal_date_error = false;
                    }
                }
                else {
                    $("#removal_start_date").css("background-color", "whitesmoke");
                    $("#removal_end_date").css("background-color", "whitesmoke");

                    removal_date_error = false;
                }
            }

            if (id == "edit_removal_start_date") {
                var start_date = this_date;
                var end_date_val = $("#edit_removal_end_date").val();

                if (end_date_val != "") {
                    var end_date = date_formatter(end_date_val);

                    if (start_date > end_date) {
                        alert("The removal end date must be after the start date");

                        $("#edit_removal_start_date").css("background-color", "lightpink");
                        $("#edit_removal_end_date").css("background-color", "lightpink");

                        removal_date_error = true;
                    }
                    else {
                        $("#edit_removal_start_date").css("background-color", "whitesmoke");
                        $("#edit_removal_end_date").css("background-color", "whitesmoke");

                        removal_date_error = false;
                    }

                }
                else {
                    $("#edit_removal_start_date").css("background-color", "whitesmoke");
                    $("#edit_removal_end_date").css("background-color", "whitesmoke");

                    removal_date_error = false;
                }
            }
            else if (id == "edit_removal_end_date") {
                var end_date = this_date;
                var start_date_val = $("#edit_removal_start_date").val();

                if (start_date_val != "") {
                    var start_date = date_formatter(start_date_val);


                    if (start_date > end_date) {
                        alert("The removal end date must be after the start date");

                        $("#edit_removal_start_date").css("background-color", "lightpink");
                        $("#edit_removal_end_date").css("background-color", "lightpink");

                        removal_date_error = true;
                    }
                    else {
                        $("#edit_removal_start_date").css("background-color", "whitesmoke");
                        $("#edit_removal_end_date").css("background-color", "whitesmoke");

                        removal_date_error = false;
                    }
                }
                else {
                    $("#edit_removal_start_date").css("background-color", "whitesmoke");
                    $("#edit_removal_end_date").css("background-color", "whitesmoke");

                    removal_date_error = false;
                }
            }
        }
    });

    // Country dropdown
    $(".country_drop").html(country_drop);


    // MODALS
    // Close All Modals
    $(".close_modal").click(function (e) {
        e.preventDefault();

        closeModals();
    });

    function closeModals() {
        $(".add_location_modal").css("display", "none");
        $(".add_contact_modal").css("display", "none");
        $(".add_removal_modal").css("display", "none");
        $(".add_inspection_modal").css("display", "none");
        $(".add_question_modal").css("display", "none");

        $(".edit_location_modal").css("display", "none");
        $(".edit_contact_modal").css("display", "none");
        $(".edit_removal_modal").css("display", "none");
        $(".edit_inspection_modal").css("display", "none");
        $(".edit_question_modal").css("display", "none");

        $("#asset_address1").val("");
        $("#asset_address2").val("");
        $("#asset_country").val("");
        $("#asset_city").val("");
        $("#asset_state").val("");

        $("#inspection_start_date").val("");
        $("#inspection_end_date").val("");
        $("#inspection_start_time").val("");
        $("#inspection_end_time").val("");
        $("#inspection_location").val("");

        $("#removal_start_date").val("");
        $("#removal_end_date").val("");
        $("#removal_start_time").val("");
        $("#removal_end_time").val("");
        $("#removal_location").val("");

        $("#contact_name").val("");
        $("#contact_phone").val("");
        $("#contact_location").val("");

        $("#registration_question").val("");
    }
    // Add Location Modal 
    $("#add_location_details").click(function (e) {
        e.preventDefault();
        $(".add_location_modal").css("display", "block");


        $(".country_drop").html(country_drop);

        $("#asset_country").val('US');

        $("#asset_state").css("display", "block");
        $("#asset_state").html(all_states[0]);
        $("#asset_state_static").css("display", "none");
    });

    // Add Contact Modal
    $("#add_onsite_contact").click(function (e) {
        e.preventDefault();

        var list = get_location_list();

        $("#contact_location").empty();

        $("#contact_location").append(list);

        $(".add_contact_modal").css("display", "block");

    });

    // Add Inspection Modal
    $("#add_inspect_details").click(function (e) {
        e.preventDefault();

        var list = get_location_list();

        $("#inspection_location").empty();

        $("#inspection_location").append(list);

        $(".add_inspection_modal").css("display", "block");

    });

    // Add Removal Modal
    $("#add_removal_details").click(function (e) {
        e.preventDefault();

        var list = get_location_list();

        $("#removal_location").empty();

        $("#removal_location").append(list);

        $(".add_removal_modal").css("display", "block");

    });

    // Add Question Modal
    $("#add_registration_question").click(function (e) {
        e.preventDefault();

        $(".add_question_modal").css("display", "block");
    });

    // COUNTER OBJECTS
    const location_counter = document.getElementById("location_num");
    const question_counter = document.getElementById("question_num");
    const inspection_counter = document.getElementById("inspection_num");
    const removal_counter = document.getElementById("removal_num");
    const contact_counter = document.getElementById("contact_num");

    // Location UI selectors
    const edit_address1_field = document.getElementById("edit_asset_address1");
    const edit_address2_field = document.getElementById("edit_asset_address2");
    const edit_country_field = document.getElementById("edit_asset_country");
    const edit_city_field = document.getElementById("edit_asset_city");
    const edit_state_field = document.getElementById("edit_asset_state");
    const edit_static_state_field = document.getElementById("edit_asset_state_static");

    // ARRAYS OF OBJECTS
    // Locations
    const all_locations = [];
    // Questions
    const all_questions = [];
    // Contacts
    const all_contacts = [];
    // Removals
    const all_removals = [];
    // Inspections
    const all_inspections = [];


    // Location actions - show/hide information buttons
    function location_action() {
        var location_list_number = all_locations.length;

        var inspection_number = document.getElementById("inspection_list").childElementCount;
        var removal_number = document.getElementById("removal_list").childElementCount;
        var contact_number = document.getElementById("contact_list").childElementCount;

        if (location_list_number == 0) {
            $("#asset_location_disclaimer").css("display", "block");
            $("#inspection_location_disclaimer").css("display", "block");
            $("#contact_location_disclaimer").css("display", "block");
            $("#removal_location_disclaimer").css("display", "block");

            $("#add_inspect_details").css("display", "none");
            $("#add_removal_details").css("display", "none");
            $("#add_onsite_contact").css("display", "none");
            $(".special_notes").css("display", "none");

        }
        else {
            $("#asset_location_disclaimer").css("display", "none");
            $("#inspection_location_disclaimer").css("display", "none");
            $("#contact_location_disclaimer").css("display", "none");
            $("#removal_location_disclaimer").css("display", "none");

            $(".special_notes").css("display", "flex");

            if (inspection_number < 10) {
                $("#add_inspect_details").css("display", "inline-block");
            }
            if (removal_number < 10) {
                $("#add_removal_details").css("display", "inline-block");
            }
            if (contact_number < 10) {
                $("#add_onsite_contact").css("display", "inline-block");
            }
        }
    }

    // Removal Actions
    function removal_actions() {
        var removal_number = document.getElementById("removal_list").childElementCount;

        if (removal_number == 0) {
            $("#multiple_removal_disclaimer").css("display", "block");
        }
        else {
            $("#multiple_removal_disclaimer").css("display", "none");
        }
    }

    // Inspection Operations
    const edit_inspection_start_date_field = document.getElementById("edit_inspection_start_date");
    const edit_inspection_end_date_field = document.getElementById("edit_inspection_end_date");
    const edit_inspection_start_time_field = document.getElementById("edit_inspection_start_time");
    const edit_inspection_end_time_field = document.getElementById("edit_inspection_end_time");
    const edit_inspection_location_field = document.getElementById("edit_inspection_location");
    $("#submit_inspection_form").click(function (e) {
        add_inspection(e);
    });
    $(document).on('click', '.edit_inspection', function (e) {
        var list = get_location_list();

        $("#edit_inspection_location").empty();

        $("#edit_inspection_location").append(list);

        retrieve_inspection(e, this);
    });
    $("#save_edit_inspection").click(function (e) {
        save_edit_inspection(e);
    });
    $(document).on('click', '.delete_inspection', function (e) {
        delete_inspection(e, this);
    });
    function add_inspection(e) {
        e.preventDefault();

        // UI Selectors
        const start_date_field = document.getElementById("inspection_start_date");
        const end_date_field = document.getElementById("inspection_end_date");
        const start_time_field = document.getElementById("inspection_start_time");
        const end_time_field = document.getElementById("inspection_end_time");
        const location_field = document.getElementById("inspection_location");

        const start_date = start_date_field.value;
        const end_date = end_date_field.value;
        const start_time = start_time_field.value;
        const end_time = end_time_field.value;
        const location = location_field.value;

        if (start_date == "" || start_time == "" || end_time == "" || location == "" || inspection_date_error) {
            alert("Please complete the form");
            return;
        }

        const id = parseInt(inspection_counter.value) + 1;
        inspection_counter.value = id;

        const inspection_object = new Inspection(id, start_date, end_date, start_time, end_time, location);

        all_inspections.push(inspection_object);

        closeModals();

        var disp_end_date = end_date;

        if (end_date == "") {
            disp_end_date = start_date;
        }

        const output = `
            <li class="inspection_item" name="inspection_module_${id}">
                <span class="location_alert">
                    <i class="fas fa-exclamation-circle"></i>
                </span>
                <span class="information_content">
                    <strong>Start Date: </strong>
                    <span class="date" id="inspection_start_date_entry_${id}">
                        ${start_date}
                    </span>
                    <strong>End Date: </strong>
                    <span class="date" id="inspection_end_date_entry_${id}">
                        ${disp_end_date}
                    </span>
                    <strong>Start Time: </strong>
                    <span class="time" id="inspection_start_time_entry_${id}">
                        ${mil_time_to_disp(start_time)}
                    </span>
                    <strong>End Time: </strong>
                    <span class="time" id="inspection_end_time_entry_${id}">
                        ${mil_time_to_disp(end_time)}
                    </span>
                    <br>
                    <strong>Location: </strong>
                    <span class="time" id="inspection_location_entry_${id}">
                        <span class="location_display">
                            ${specific_location(location)}
                        </span>
                    </span>
                </span>
                <span class="operations">
                    <i class="fas fa-edit cursor_pointer edit_inspection" name="inspection_${id}"></i>
                    <i class="far fa-trash-alt cursor_pointer delete_inspection" name="inspection_${id}"></i>
                </span>
            </li>
        `;

        document.getElementById("inspection_list").innerHTML += output;
        var num = all_inspections.length;
        if (num >= 10) {
            document.getElementById("add_inspect_details").style.display = "none";
        }
    }
    function retrieve_inspection(e, icon) {
        e.preventDefault();

        let name = $(icon).attr("name");
        name = name.replace("inspection_", "");

        let obj;
        for (var i = 0; i < all_inspections.length + 1; i++) {
            var ins = all_inspections[i];
            if (ins.id == name) {
                obj = ins;
                break;
            }
        }

        $(".edit_inspection_modal").css("display", "block");

        var display_end_date = obj.end_date;
        if(display_end_date == "" || display_end_date == "-1" || display_end_date == -1){
            display_end_date = "";
        }

        edit_inspection_start_date_field.value = obj.start_date;
        edit_inspection_end_date_field.value = display_end_date;
        edit_inspection_start_time_field.value = obj.start_time;
        edit_inspection_end_time_field.value = obj.end_time;
        edit_inspection_location_field.value = obj.id;


        $("#edit_inspection_number").val(obj.id);

    }
    function save_edit_inspection(e) {
        e.preventDefault();

        var num = $("#edit_inspection_number").val();

        var obj;
        for (var i = 0; i < all_inspections.length; i++) {
            var ins = all_inspections[i];
            if (ins.id == num) {
                obj = ins;
                break;
            }
        }

        if (edit_inspection_start_date_field.value == "" || edit_inspection_start_time_field.value == "" || edit_inspection_end_time_field.value == "" || edit_inspection_location_field.value == "" || inspection_date_error) {
            alert("Please complete the form");
            return;
        }

        obj.start_date = edit_inspection_start_date_field.value;
        obj.end_date = edit_inspection_end_date_field.value;
        obj.start_time = edit_inspection_start_time_field.value;
        obj.end_time = edit_inspection_end_time_field.value;
        obj.location = edit_inspection_location_field.value;

        var location_display = specific_location(obj.location);

        var end_display = obj.end_date;

        if(obj.end_date == -1 || obj.end_date == "" || obj.end_date == "-1"){
            end_display = obj.start_date;
        }

        document.getElementById("inspection_start_date_entry_" + num).innerHTML = obj.start_date;
        document.getElementById("inspection_end_date_entry_" + num).innerHTML = end_display;
        document.getElementById("inspection_start_time_entry_" + num).innerHTML = mil_time_to_disp(obj.start_time);
        document.getElementById("inspection_end_time_entry_" + num).innerHTML = mil_time_to_disp(obj.end_time);
        $("#inspection_location_entry_" + num).find(".location_display").html(location_display);
        

        var n = "inspection_module_" + obj.id;
        var x = `[name='${n}']`;
        $(x).find(".location_alert").css("display", "none");

        closeModals();
    }
    function delete_inspection(e, icon) {
        e.preventDefault();

        let name = $(icon).attr("name");
        name = name.replace("inspection_", "");

        for (var i = 0; i < all_inspections.length; i++) {
            var ins = all_inspections[i];
            if (ins.id == name) {
                all_inspections.splice(i, 1);
                break;
            }
        }

        icon.parentElement.parentElement.remove();

        document.getElementById("add_inspect_details").style.display = "inline-block";
    }

    // Removal Operatons
    const edit_removal_start_date_field = document.getElementById("edit_removal_start_date");
    const edit_removal_end_date_field = document.getElementById("edit_removal_end_date");
    const edit_removal_start_time_field = document.getElementById("edit_removal_start_time");
    const edit_removal_end_time_field = document.getElementById("edit_removal_end_time");
    const edit_removal_location_field = document.getElementById("edit_removal_location");
    $("#submit_removal_form").click(function (e) {
        add_removal(e);

        removal_actions();
    });
    $(document).on('click', '.edit_removal', function (e) {
        var list = get_location_list();

        $("#edit_removal_location").empty();

        $("#edit_removal_location").append(list);

        retrieve_removal(e, this);

        removal_actions();
    });
    $("#save_edit_removal").click(function (e) {
        save_edit_removal(e);

        removal_actions();
    });
    $(document).on('click', '.delete_removal', function (e) {
        delete_removal(e, this);

        removal_actions();
    });
    function delete_removal(e, icon) {
        e.preventDefault();

        let name = $(icon).attr("name");
        name = name.replace("removal_", "");

        for (var i = 0; i < all_removals.length; i++) {
            var rem = all_removals[i];
            if (rem.id == name) {
                all_removals.splice(i, 1);
                break;
            }
        }

        icon.parentElement.parentElement.remove();

        document.getElementById("add_removal_details").style.display = "inline-block";
    }
    function retrieve_removal(e, icon) {
        e.preventDefault();

        let name = $(icon).attr("name");
        name = name.replace("removal_", "");

        let obj;
        for (var i = 0; i < all_removals.length + 1; i++) {
            var rem = all_removals[i];
            if (rem.id == name) {
                obj = rem;
                break;
            }
        }

        var display_end_date = obj.end_date;
        if(display_end_date == "" || display_end_date == "-1" || display_end_date == -1){
            display_end_date = "";
        }

        $(".edit_removal_modal").css("display", "block");

        edit_removal_start_date_field.value = obj.start_date;
        edit_removal_end_date_field.value = display_end_date;
        edit_removal_start_time_field.value = obj.start_time;
        edit_removal_end_time_field.value = obj.end_time;
        edit_removal_location_field.value = obj.id;

        $("#edit_removal_number").val(obj.id);
    }
    function add_removal(e) {
        e.preventDefault();

        // UI Selectors
        const start_date_field = document.getElementById("removal_start_date");
        const end_date_field = document.getElementById("removal_end_date");
        const start_time_field = document.getElementById("removal_start_time");
        const end_time_field = document.getElementById("removal_end_time");
        const location_field = document.getElementById("removal_location");

        const start_date = start_date_field.value;
        const end_date = end_date_field.value;
        const start_time = start_time_field.value;
        const end_time = end_time_field.value;
        const location = location_field.value;

        if (start_date == "" || start_time == "" || end_time == "" || location == "" || removal_date_error) {
            alert("Please complete the form");
            return;
        }

        const id = parseInt(removal_counter.value) + 1;
        removal_counter.value = id;

        const removal_object = new Removal(id, start_date, end_date, start_time, end_time, location);

        all_removals.push(removal_object);

        closeModals();

        var disp_end_date = end_date;

        if (end_date == "") {
            disp_end_date = start_date;
        }

        const output = `
            <li class="removal_item" name="removal_module_${id}">
                <span class="location_alert">
                    <i class="fas fa-exclamation-circle"></i>
                </span>
                <span class="information_content">
                    <strong>Start Date: </strong>
                    <span class="date" id="removal_start_date_entry_${id}">
                        ${start_date}
                    </span>
                    <strong>End Date: </strong>
                    <span class="date" id="removal_end_date_entry_${id}">
                        ${disp_end_date}
                    </span>
                    <strong>Start Time: </strong>
                    <span class="time" id="removal_start_time_entry_${id}">
                        ${mil_time_to_disp(start_time)}
                    </span>
                    <strong>End Time: </strong>
                    <span class="time" id="removal_end_time_entry_${id}">
                        ${mil_time_to_disp(end_time)}
                    </span>
                    <br>
                    <strong>Location: </strong>
                    <span class="time" id="removal_location_entry_${id}">
                        <span class="location_display">
                            ${specific_location(location)}
                        </span>
                    </span>
                </span>
                <span class="operations">
                    <i class="fas fa-edit cursor_pointer edit_removal" name="removal_${id}"></i>
                    <i class="far fa-trash-alt cursor_pointer delete_removal" name="removal_${id}"></i>
                </span>
            </li>
        `;

        document.getElementById("removal_list").innerHTML += output;
        var num = all_removals.length;
        if (num >= 10) {
            document.getElementById("add_removal_details").style.display = "none";
        }

    }
    function save_edit_removal(e) {
        e.preventDefault();

        var num = $("#edit_removal_number").val();

        var obj;
        for (var i = 0; i < all_removals.length; i++) {
            var rem = all_removals[i];
            if (rem.id == num) {
                obj = rem;
                break;
            }
        }

        if (edit_removal_start_date_field.value == "" || edit_removal_start_time_field.value == "" || edit_removal_end_time_field.value == "" || edit_removal_location_field.value == "" || removal_date_error) {
            alert("Please complete the form");
            return;
        }

        obj.start_date = edit_removal_start_date_field.value;
        obj.end_date = edit_removal_end_date_field.value;
        obj.start_time = edit_removal_start_time_field.value;
        obj.end_time = edit_removal_end_time_field.value;
        obj.location = edit_removal_location_field.value;

        var location_display = specific_location(obj.location);

        document.getElementById("removal_start_date_entry_" + num).innerHTML = obj.start_date;
        document.getElementById("removal_end_date_entry_" + num).innerHTML = obj.end_date;
        document.getElementById("removal_start_time_entry_" + num).innerHTML = mil_time_to_disp(obj.start_time);
        document.getElementById("removal_end_time_entry_" + num).innerHTML = mil_time_to_disp(obj.end_time);
        $("#removal_location_entry_" + num).find(".location_display").html(location_display);


        var n = "removal_module_" + obj.id;
        var x = `[name='${n}']`;
        $(x).find(".location_alert").css("display", "none");

        closeModals();
    }

    // Location Operations
    $("#submit_location_form").click(function (e) {
        add_location(e);

        location_action();
    });
    $("#save_edit_location").click(function (e) {
        save_edit_location(e);

        location_action();
    });
    $(document).on('click', '.delete_location', function (e) {
        delete_location(e, this);

        location_action();
    });
    $(document).on('click', '.edit_location', function (e) {
        retrieve_location(e, this);

        location_action();
    });
    function retrieve_location(e, icon) {
        e.preventDefault();

        let name = $(icon).attr("name");
        name = name.replace("location_", "");

        let obj;
        for (var i = 0; i < all_locations.length + 1; i++) {
            var loc = all_locations[i];
            if (loc.id == name) {
                obj = loc;
                break;
            }
        }

        $(".edit_location_modal").css("display", "block");

        var entered_country = obj.country;
        entered_country = all_countries.indexOf(entered_country);

        edit_address1_field.value = obj.address1;
        if (obj.address2 == -1) {
            edit_address2_field.value = "";
        }
        else {
            edit_address2_field.value = obj.address2;
        }
        edit_country_field.value = obj.country;
        edit_city_field.value = obj.city;
        entered_state = obj.state;

        if (all_states[entered_country] == "<option class='select' value=''>Select a State/Province</option>") {
            $("#edit_asset_state_static").css("display", "block");
            $("#edit_asset_state").css("display", "none");
            $("#edit_asset_state").html("");

            $("#edit_asset_state_static").val(entered_state);
        }
        else {
            $("#edit_asset_state").css("display", "block");
            $("#edit_asset_state").html(all_states[entered_country]);
            $("#edit_asset_state_static").css("display", "none");

            $("#edit_asset_state").val(entered_state);
        }

        $("#edit_location_number").val(obj.id);
    }
    function save_edit_location(e) {
        e.preventDefault();

        var num = $("#edit_location_number").val();
        var obj;

        var dynamic_state = $("#edit_asset_state").css("display");
        var state;

        if (dynamic_state == "none") {
            state = $("#edit_asset_state_static").val();
        }
        else {
            state = $("#edit_asset_state").val();
        }

        if (edit_address1_field.value == "" || edit_city_field.value == "" || edit_country_field.value == "" || state == "") {
            alert("Please complete the form");
            return;
        }

        for (var i = 0; i < all_locations.length; i++) {
            var loc = all_locations[i];
            if (loc.id == num) {
                obj = loc;
                break;
            }
        }

        if (edit_address2_field.value == -1) {
            obj.address2 = "";
        }
        else {
            obj.address2 = edit_address2_field.value;
        }
        if (edit_address1_field.value.includes("??") || edit_address1_field.value.includes("||") || edit_address1_field.value.includes("&&") ||
            obj.address2.includes("??") || obj.address2.includes("||") || obj.address2.includes("&&") ||
            edit_country_field.value.includes("??") || edit_country_field.value.includes("||") || edit_country_field.value.includes("&&") ||
            edit_city_field.value.includes("??") || edit_city_field.value.includes("||") || edit_city_field.value.includes("&&") ||
            state.includes("??") || state.includes("||") || state.includes("&&")
        ) {
            alert("Invalid characters provided");
            return;
        }

        obj.address1 = edit_address1_field.value;
        obj.city = edit_city_field.value;
        obj.country = edit_country_field.value;


        obj.state = state;


        var country_display = country_code_to_name(edit_country_field.value);


        document.getElementById("location_address1_entry_" + num).innerHTML = obj.address1;
        document.getElementById("location_address2_entry_" + num).innerHTML = obj.address2;
        document.getElementById("location_city_entry_" + num).innerHTML = obj.city;
        document.getElementById("location_state_entry_" + num).innerHTML = obj.state;
        document.getElementById("location_country_entry_" + num).innerHTML = country_display;


        for (var i = 0; i < all_inspections.length; i++) {
            var cur_ins = all_inspections[i];
            
            if (cur_ins.location == obj.ref) {
                var loc = specific_location(cur_ins.location);
                var spot = cur_ins.id;
                $("#inspection_location_entry_" + spot).find(".location_display").html(loc);
            }
        }

        for (var r = 0; r < all_removals.length; r++) {
            var cur_rem = all_removals[r];

            if (cur_rem.location == obj.ref) {
                var loc = specific_location(cur_rem.location);
                var spot = cur_rem.id;
                $("#removal_location_entry_" + spot).find(".location_display").html(loc);
            }
        }

        for (var c = 0; c < all_contacts.length; c++) {
            var cur_con = all_contacts[c];

            if (cur_con.location == obj.ref) {
                var loc = specific_location(cur_con.location);
                var spot = cur_con.id;
                $("#contact_location_entry_" + spot).find(".location_display").html(loc);
            }
        }

        closeModals();
    }
    function delete_location(e, icon) {
        e.preventDefault();

        let name = $(icon).attr("name");
        name = name.replace("location_", "");

        for (var i = 0; i < all_locations.length; i++) {
            var loc = all_locations[i];
            if (loc.id == name) {
                all_locations.splice(i, 1);
                break;
            }
        }

        icon.parentElement.parentElement.remove();

        document.getElementById("add_location_details").style.display = "inline-block";

        handle_missing_location(name);
    }
    function add_location(e) {
        e.preventDefault();

        // UI Selectors
        const address1_field = document.getElementById("asset_address1");
        const address2_field = document.getElementById("asset_address2");
        const country_field = document.getElementById("asset_country");
        const city_field = document.getElementById("asset_city");
        const dynamic_state_field = document.getElementById("asset_state");
        const static_state_field = document.getElementById("asset_state_static");

        var state_field_disp = dynamic_state_field.style.display;
        var static_state_field_disp = static_state_field.style.display;


        if (state_field_disp == "block") {
            var state_name = "asset_state";
        }
        else if (static_state_field_disp == "block") {
            var state_name = "asset_state_static";
        }

        var state_field = document.getElementById(state_name);

        const address1 = address1_field.value;
        const address2_display = address2_field.value;
        const country = country_field.value;
        const city = city_field.value;
        const state = state_field.value;

        var address2;
        if (address2_display == "") {
            address2 = -1;
        }
        else {
            address2 = address2_display;
        }

        if (address1 == "" || country == "" || city == "" || state == "") {
            alert("Please complete the form");
            return;
        }
        if (address1.includes("??") || address1.includes("||") || address1.includes("&&") ||
            address2_display.includes("??") || address2_display.includes("||") || address2_display.includes("&&") ||
            country.includes("??") || country.includes("||") || country.includes("&&") ||
            city.includes("??") || city.includes("||") || city.includes("&&") ||
            state.includes("??") || state.includes("||") || state.includes("&&")
        ) {
            alert("Invalid characters provided");
            return;
        }

        const id = parseInt(location_counter.value) + 1;

        location_counter.value = id;

        const location_object = new Location(id, address1, address2, country, city, state, id);

        var country_display = country_code_to_name(country);


        all_locations.push(location_object);



        closeModals();

        const output = `
            <li class="location_item" name="location_module_${id}">
                <span>
                    <strong>Address: </strong>
                    <span class="address" id="location_address1_entry_${id}">
                        ${address1}
                    </span>
                    <strong>Address 2: </strong>
                    <span class="address" id="location_address2_entry_${id}">
                        ${address2_display}
                    </span>
                    <strong>City: </strong>
                    <span class="city" id="location_city_entry_${id}">
                        ${city}
                    </span>
                    <strong>State: </strong>
                    <span class="state" id="location_state_entry_${id}">
                        ${state}
                    </span>
                    <strong>Country: </strong>
                    <span class="country" id="location_country_entry_${id}">
                        ${country_display}
                    </span>
                </span>
                <span class="operations">
                    <i class="fas fa-edit cursor_pointer edit_location" name="location_${id}"></i>
                    <i class="far fa-trash-alt cursor_pointer delete_location" name="location_${id}"></i>
                </span>
            </li>`;
        document.getElementById("location_list").innerHTML += output;
        var num = all_locations.length;
        if (num >= 5) {
            document.getElementById("add_location_details").style.display = "none";
        }
    }
    function handle_missing_location(num) {
        // Loop through Contact Information
        for (var i = 0; i < all_contacts.length; i++) {
            cont = all_contacts[i];
            if (cont.location == num) {
                var contact_id = cont.id;

                // Handle missing object 
                cont.location = -1;

                // Handle missing text
                var m = "#contact_location_entry_" + contact_id;
                $(m).find(".location_display").html("ERROR - Missing Location");

                // Show missing icon
                var n = "contact_module_" + contact_id;
                var x = `[name='${n}']`;
                $(x).find(".location_alert").css("display", "flex");
            }
            else {
                continue;
            }
        }

        // Loop through Inspection Information
        for (var i = 0; i < all_inspections.length; i++) {
            var ins = all_inspections[i];
            if (ins.location == num) {
                var inspection_id = ins.id;

                // Handle missing object
                ins.location = -1;

                // Handle missing text
                var m = "#inspection_location_entry_" + inspection_id;
                $(m).find(".location_display").html("ERROR - Missing Location");

                // Show missing icon
                var n = "inspection_module_" + inspection_id;
                var x = `[name='${n}']`;
                $(x).find(".location_alert").css("display", "flex");
            }
            else {
                continue;
            }
        }

        // Loop through Removal Inforamtion
        for (var i = 0; i < all_removals.length; i++) {
            var rem = all_removals[i];
            if (rem.location == num) {
                var removal_id = rem.id;

                // Handle missing object
                rem.location = -1;

                // Handle missing text
                var m = "#removal_location_entry_" + removal_id;
                $(m).find(".location_display").html("ERROR - Missing Location");

                // Show missing icon
                var n = "removal_module_" + removal_id;
                var x = `[name='${n}']`;
                $(x).find(".location_alert").css("display", "flex");

            }
        }
    }

    // Question Operations
    var edit_question_field = document.getElementById("edit_registration_question");
    $("#submit_question_form").click(function (e) {
        add_question(e);
    });
    $(document).on('click', '.edit_question', function (e) {
        retrieve_question(e, this);
    });
    $(document).on('click', '.delete_question', function (e) {
        delete_question(e, this);
    });
    $("#save_edit_question").click(function (e) {
        save_edit_question(e);
    });
    function delete_question(e, icon) {
        e.preventDefault();

        let name = $(icon).attr("name");
        name = name.replace("question_", "");

        for (var i = 0; i < all_questions.length; i++) {
            var quest = all_questions[i];
            if (quest.id == name) {
                all_questions.splice(i, 1);
                break;
            }
        }


        icon.parentElement.parentElement.parentElement.remove();

        document.getElementById("add_registration_question").style.display = "inline-block";
    }
    function save_edit_question(e) {
        e.preventDefault();

        var num = $("#edit_question_number").val();

        var obj;

        for (var i = 0; i < all_questions.length; i++) {
            var quest = all_questions[i];
            if (quest.id == num) {
                obj = quest;
                break;
            }
        }

        if (edit_question_field.value == "") {
            alert("Please complete the form");
            return;
        }
        if (edit_question_field.value.includes("||") || edit_question_field.value.includes("&&")) {
            alert("Invalid characters provided");
            return;
        }

        obj.question = edit_question_field.value;

        document.getElementById("question_entry_" + num).innerHTML = obj.question;

        closeModals();
    }
    function retrieve_question(e, icon) {
        e.preventDefault();

        let name = $(icon).attr("name");
        name = name.replace("question_", "");

        let obj;
        for (var i = 0; i < all_questions.length + 1; i++) {
            var quest = all_questions[i];
            if (quest.id == name) {
                obj = quest;
                break;
            }
        }

        $(".edit_question_modal").css("display", "block");

        edit_question_field.value = obj.question;

        $("#edit_question_number").val(obj.id);
    }
    function add_question(e) {
        e.preventDefault();

        // UI Selector
        const question_field = document.getElementById('registration_question');

        const ques = question_field.value;

        if (ques == "") {
            alert("Please complete the form");
            return;
        }

        

        if (ques.includes("||") || ques.includes("&&")) {
            alert("Invalid characters provided");
            return;
        }

        const id = parseInt(question_counter.value) + 1;
        question_counter.value = id;

        const question_object = new Question(id, ques);

        all_questions.push(question_object);

        closeModals();

        const output = `
            <li class="question_item" name="question_module_${id}">
                <span class="information_content width_100">
                    <strong>Question: </strong>
                    <span class="name" id="question_entry_${id}">
                        ${ques}
                    </span>
                    <span class="operations">
                        <i class="fas fa-edit cursor_pointer edit_question" name="question_${id}"></i>
                        <i class="far fa-trash-alt cursor_pointer delete_question" name="question_${id}"></i>
                    </span>
                </span>
            </li>      
        `;

        document.getElementById("question_list").innerHTML += output;
        var num = all_questions.length;
        if (num >= 10) {
            document.getElementById("add_registration_question").style.display = "none";
        }
    }

    // Contact Operations
    var edit_contact_name_field = document.getElementById('edit_contact_name');
    var edit_contact_phone_field = document.getElementById('edit_contact_phone');
    var edit_contact_location_field = document.getElementById('edit_contact_location');
    $("#submit_contact_form").click(function (e) {
        add_contact(e);
    });
    $(document).on('click', '.edit_contact', function (e) {

        var list = get_location_list();

        $("#edit_contact_location").empty();

        $("#edit_contact_location").append(list);

        retrieve_contact(e, this);
    });
    $("#save_edit_contact").click(function (e) {
        save_edit_contact(e);
    });
    $(document).on('click', '.delete_contact', function (e) {
        delete_contact(e, this);
    });
    function delete_contact(e, icon) {
        e.preventDefault();

        let name = $(icon).attr("name");
        name = name.replace("contact_", "");

        for (var i = 0; i < all_contacts.length; i++) {
            var cont = all_contacts[i];
            if (cont.id == name) {
                all_contacts.splice(i, 1);
                break;
            }
        }

        icon.parentElement.parentElement.remove();

        document.getElementById("add_onsite_contact").style.display = "inline-block";
    }
    function save_edit_contact(e) {
        e.preventDefault();

        var num = $("#edit_contact_number").val();

        var obj;
        for (var i = 0; i < all_contacts.length; i++) {
            var cont = all_contacts[i];
            if (cont.id == num) {
                obj = cont;
                break;
            }
        }

        if (edit_contact_name_field.value == "" || edit_contact_phone_field.value == "" || edit_contact_location_field.value == "") {
            alert("Please complete the form");
            return;
        }
        if (edit_contact_name_field.value.includes("??") || edit_contact_name_field.value.includes("||") || edit_contact_name_field.value.includes("&&") ||
            edit_contact_phone_field.value.includes("??") || edit_contact_phone_field.value.includes("||") || edit_contact_phone_field.value.includes("&&")
        ) {
            alert("Invalid characters provided");
            return;
        }

        obj.name = edit_contact_name_field.value;
        obj.phone = edit_contact_phone_field.value;
        obj.location = edit_contact_location_field.value;


        var location_display = specific_location(obj.location);

        document.getElementById("contact_name_entry_" + num).innerHTML = obj.name;
        document.getElementById("contact_phone_entry_" + num).innerHTML = obj.phone;
        $("#contact_location_entry_" + num).find(".location_display").html(location_display);

        closeModals();

        var n = "contact_module_" + obj.id;
        var x = `[name='${n}']`;
        $(x).find(".location_alert").css("display", "none");

    }
    function retrieve_contact(e, icon) {
        e.preventDefault();

        let name = $(icon).attr("name");
        name = name.replace("contact_", "");

        let obj;

        for (var i = 0; i < all_contacts.length + 1; i++) {
            var cont = all_contacts[i];
            if (cont.id == name) {
                obj = cont;
                break;
            }
        }

        $(".edit_contact_modal").css("display", "block");

        edit_contact_name_field.value = obj.name;
        edit_contact_phone_field.value = obj.phone;
        edit_contact_location_field.value = obj.id;

        $("#edit_contact_number").val(obj.id);

    }
    function add_contact(e) {
        e.preventDefault();

        // UI Selectors
        const name_field = document.getElementById('contact_name');
        const phone_field = document.getElementById('contact_phone');
        const location_field = document.getElementById('contact_location');

        const name = name_field.value;
        const phone = phone_field.value;
        const location = location_field.value;

        if (name == "" || phone == "" || location == "") {
            alert("Please complete the form");
            return;
        }
        if (name.includes("??") || name.includes("||") || name.includes("&&") ||
            phone.includes("??") || phone.includes("||") || phone.includes("&&")
        ) {
            alert("Invalid characters provided");
            return;
        }

        const id = parseInt(contact_counter.value) + 1;
        contact_counter.value = id;

        const contact_object = new Contact(id, name, phone, location);

        all_contacts.push(contact_object);

        var location_display = specific_location(location);

        closeModals();

        const output = `
            <li class="contact_item" name="contact_module_${id}">
                <span class="location_alert">
                    <i class="fas fa-exclamation-circle"></i>
                </span>
                <span class="information_content">
                    <strong>Name: </strong>
                    <span class="name" id="contact_name_entry_${id}">
                        ${name}
                    </span>
                    <strong>Phone: </strong>
                    <span class="name" id="contact_phone_entry_${id}">
                        ${phone}
                    </span>
                    <br>
                    <strong>Location: </strong>
                    <span class="phone" id="contact_location_entry_${id}">
                        <span class="location_display">
                            ${location_display}
                        </span>
                    </span>
                </span>
                <span class="operations">
                    <i class="fas fa-edit cursor_pointer edit_contact" name="contact_${id}"></i>
                    <i class="far fa-trash-alt cursor_pointer delete_contact" name="contact_${id}"></i>
                </span>
            </li>
        `;

        document.getElementById("contact_list").innerHTML += output;
        var num = all_contacts.length;
        if (num >= 10) {
            document.getElementById("add_onsite_contact").style.display = "none";
        }
    }


    // Get specific location by id
    function specific_location(id) {
        for (var i = 0; i < all_locations.length; i++) {
            var currLocation = all_locations[i];
            if (id == currLocation.ref) {
                var address1 = currLocation.address1;
                var address2 = currLocation.address2;
                var city = currLocation.city;
                var state = currLocation.state;
                var country = currLocation.country;

                var country_display = country_code_to_name(country);

                if (address2 == "" || address2 == -1 || address2 == "-1") {
                    return address1 + ", " + city + ", " + state + ", " + country_display;
                }
                else {
                    return address1 + ", " + address2 + ", " + city + ", " + state + ", " + country_display;
                }
            }
        }
        // Error getting location
        return "404";
    }

    // Get list of locations
    function get_location_list() {
        var list = '<option value="">Choose Corresponding Asset Location</option>';
        for (var i = 0; i < all_locations.length; i++) {
            var current_location = all_locations[i];

            var current_address1 = current_location.address1;
            var current_address2 = current_location.address2;
            var current_city = current_location.city;
            var current_state = current_location.state;
            var current_country = current_location.country;

            var current_place;

            if (current_address2 == "" || current_address2 == -1 || current_address2 == "-1") {
                current_place = '<option value="' + current_location.ref + '">' + current_address1 + ", " + current_city + ", " + current_state + ", " + current_country + '</option>';
            }
            else {
                current_place = '<option value="' + current_location.ref + '">' + current_address1 + ", " + current_address2 + ", " + current_city + ", " + current_state + ", " + current_country + '</option>';
            }

            list = list + current_place;
        }

        return list;
    }

    // Country state change
    $("#asset_country").change(function () {
        var name = $(this).find('option:selected').attr("name");

        if (all_states[name] == "<option class='select' value=''>Select a State/Province</option>") {
            $("#asset_state_static").css("display", "block");
            $("#asset_state").css("display", "none");
            $("#asset_state").html("");
        }
        else {
            $("#asset_state").css("display", "block");
            $("#asset_state").html(all_states[name]);
            $("#asset_state_static").css("display", "none");
        }
    });
    $("#edit_asset_country").change(function () {
        var name = $(this).find('option:selected').attr("name");

        if (all_states[name] == "<option class='select' value=''>Select a State/Province</option>") {
            $("#edit_asset_state_static").css("display", "block");
            $("#edit_asset_state").css("display", "none");
            $("#edit_asset_state").html("");
        }
        else {
            $("#edit_asset_state").css("display", "block");
            $("#edit_asset_state").html(all_states[name]);
            $("#edit_asset_state_static").css("display", "none");
        }
    });
    // OBJECT CONSTRUCTORS
    // Location constructor
    function Location(id, address1, address2, country, city, state, ref) {
        this.id = id;
        this.address1 = address1;
        this.address2 = address2;
        this.country = country;
        this.city = city;
        this.state = state;
        this.ref = ref;
    }
    // Question Constructor
    function Question(id, question) {
        this.id = id;
        this.question = question;
    }
    // Contact Constructor
    function Contact(id, name, phone, location) {
        this.id = id;
        this.name = name;
        this.phone = phone;
        this.location = location;
    }
    // Removal Constructor
    function Removal(id, start_date, end_date, start_time, end_time, location) {
        this.id = id;
        this.start_date = start_date;
        this.end_date = end_date;
        this.start_time = start_time;
        this.end_time = end_time;
        this.location = location;
    }
    // Inspection Constructor
    function Inspection(id, start_date, end_date, start_time, end_time, location) {
        this.id = id;
        this.start_date = start_date;
        this.end_date = end_date;
        this.start_time = start_time;
        this.end_time = end_time;
        this.location = location;
    }

    var times = [];

    <?php
        $all_times = array();
        $time_sql = "SELECT * FROM `time`";
        $time_result = mysqli_query($conn, $time_sql);
        while($row_mil = mysqli_fetch_assoc($time_result)){
            $line = $row_mil['military_time'] . "||" . $row_mil['display_time'];
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

    var countries = [];

    <?php
    $country_sql = "SELECT * FROM countries";
    $country_result = mysqli_query($conn, $country_sql);
    while($row_country = mysqli_fetch_assoc($country_result)){
        $line = $row_country['country_code'] . "||" . $row_country['country_name'];
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
        

    $(document).ready(function(){
        // Country dropdown
        $(".country_drop").html(country_drop);
        
        // Start and End time selectors
        $(".start_time_drop").html(start_time);
        $(".end_time_drop").html(end_time);
        
    




    let catalog_name = "<?php echo $row_catalog['catalog_name']; ?>";
    let auction_type = "<?php echo $row_catalog['auction_type']; ?>";
    let charity = "<?php echo $row_catalog['charity']; ?>";
    let catalog_description = `<?php echo $row_catalog['catalog_description']; ?>`;
    let start_date = "<?php echo sql_to_date($row_catalog['start_date']); ?>";
    let start_time2 = "<?php echo $row_catalog['start_time']; ?>";
    let end_date = "<?php echo sql_to_date($row_catalog['end_date']); ?>";
    let end_time2 = "<?php echo $row_catalog['end_time']; ?>";
    let end_increment = "<?php echo $row_catalog['end_increment']; ?>";

    let house_list = "<?php echo $row_catalog['house_list']; ?>";

    let currency = "<?php echo $row_catalog['currency']; ?>";  
    let timezone = "<?php echo $row_catalog['timezone']; ?>";
    let buyer_premium = "<?php echo $row_catalog['buyer_premium']; ?>";
    let allow_freeze = "<?php echo $row_catalog['allow_freeze']; ?>";

    let asset_location_1 = "<?php echo $row_catalog['asset_location_1']; ?>";
    let asset_location_2 = "<?php echo $row_catalog['asset_location_2']; ?>";
    let asset_location_3 = "<?php echo $row_catalog['asset_location_3']; ?>";
    let asset_location_4 = "<?php echo $row_catalog['asset_location_4']; ?>";
    let asset_location_5 = "<?php echo $row_catalog['asset_location_5']; ?>";
    var asset_locations = [asset_location_1, asset_location_2, asset_location_3, asset_location_4, asset_location_5];

    let inspection_1 = "<?php echo $row_catalog['inspection_1']; ?>";
    let inspection_2 = "<?php echo $row_catalog['inspection_2']; ?>";
    let inspection_3 = "<?php echo $row_catalog['inspection_3']; ?>";
    let inspection_4 = "<?php echo $row_catalog['inspection_4']; ?>";
    let inspection_5 = "<?php echo $row_catalog['inspection_5']; ?>";
    let inspection_6 = "<?php echo $row_catalog['inspection_6']; ?>";
    let inspection_7 = "<?php echo $row_catalog['inspection_7']; ?>";
    let inspection_8 = "<?php echo $row_catalog['inspection_8']; ?>";
    let inspection_9 = "<?php echo $row_catalog['inspection_9']; ?>";
    let inspection_10 = "<?php echo $row_catalog['inspection_10']; ?>";
    var inspections = [inspection_1, inspection_2, inspection_3, inspection_4, inspection_5, inspection_6, inspection_7, inspection_8, inspection_9, inspection_10];

    let removal_1 = "<?php echo $row_catalog['removal_1']; ?>";
    let removal_2 = "<?php echo $row_catalog['removal_2']; ?>";
    let removal_3 = "<?php echo $row_catalog['removal_3']; ?>";
    let removal_4 = "<?php echo $row_catalog['removal_4']; ?>";
    let removal_5 = "<?php echo $row_catalog['removal_5']; ?>";
    let removal_6 = "<?php echo $row_catalog['removal_6']; ?>";
    let removal_7 = "<?php echo $row_catalog['removal_7']; ?>";
    let removal_8 = "<?php echo $row_catalog['removal_8']; ?>";
    let removal_9 = "<?php echo $row_catalog['removal_9']; ?>";
    let removal_10 = "<?php echo $row_catalog['removal_10']; ?>";
    var removals = [removal_1, removal_2, removal_3, removal_4, removal_5, removal_6, removal_7, removal_8, removal_9, removal_10];

    let contact_1 = "<?php echo $row_catalog['contact_1']; ?>";
    let contact_2 = "<?php echo $row_catalog['contact_2']; ?>";
    let contact_3 = "<?php echo $row_catalog['contact_3']; ?>";
    let contact_4 = "<?php echo $row_catalog['contact_4']; ?>";
    let contact_5 = "<?php echo $row_catalog['contact_5']; ?>";
    let contact_6 = "<?php echo $row_catalog['contact_6']; ?>";
    let contact_7 = "<?php echo $row_catalog['contact_7']; ?>";
    let contact_8 = "<?php echo $row_catalog['contact_8']; ?>";
    let contact_9 = "<?php echo $row_catalog['contact_9']; ?>";
    let contact_10 = "<?php echo $row_catalog['contact_10']; ?>";
    var contacts = [contact_1, contact_2, contact_3, contact_4, contact_5, contact_6, contact_7, contact_8, contact_9, contact_10];
    
    let question_1 = "<?php echo $row_catalog['question_1']; ?>";
    let question_2 = "<?php echo $row_catalog['question_2']; ?>";
    let question_3 = "<?php echo $row_catalog['question_3']; ?>";
    let question_4 = "<?php echo $row_catalog['question_4']; ?>";
    let question_5 = "<?php echo $row_catalog['question_5']; ?>";
    let question_6 = "<?php echo $row_catalog['question_6']; ?>";
    let question_7 = "<?php echo $row_catalog['question_7']; ?>";
    let question_8 = "<?php echo $row_catalog['question_8']; ?>";
    let question_9 = "<?php echo $row_catalog['question_9']; ?>";
    let question_10 = "<?php echo $row_catalog['question_10']; ?>";
    var questions = [question_1, question_2, question_3, question_4, question_5, question_6, question_7, question_8, question_9, question_10];

    var terms_conditions = `<?php echo $row_catalog['terms_conditions']; ?>`;

    
    let inspection_notes = "<?php echo $row_catalog['inspection_notes']; ?>";
    let removal_notes = "<?php echo $row_catalog['removal_notes']; ?>";

    // Populate Fields
    let catalog_name_DOM = document.getElementById("catalog_name");
    let auction_type_DOM = document.getElementById("auction_type");
    let charity_event_DOM = document.getElementById("charity_event");
    let catalog_description_DOM = document.getElementById("catalog_description");
    let start_date_DOM = document.getElementById("start_date");
    let start_time_DOM = document.getElementById("start_time");
    let end_date_DOM = document.getElementById("end_date");
    let end_time_DOM = document.getElementById("end_time");
    let end_increment_DOM = document.getElementById("end_increment");

    catalog_name_DOM.value = catalog_name;
    auction_type_DOM.value = auction_type;
    charity_event_DOM.value = charity;
    catalog_description_DOM.value = catalog_description;
    start_date_DOM.value = start_date;
    start_time_DOM.value = start_time2;
    end_date_DOM.value = end_date;
    end_time_DOM.value = end_time2;
    end_increment_DOM.value = end_increment;

    document.getElementById("active_house_accounts").value = house_list;

    let currency_DOM = document.getElementById("asset_currency");
    let timezone_DOM = document.getElementById("asset_timezone");
    let buyer_premium_DOM = document.getElementById("buyer_premium");
    let allow_freeze_DOM = document.getElementById("allow_freeze");

    currency_DOM.value = currency;
    timezone_DOM.value = timezone;
    buyer_premium_DOM.value = buyer_premium;
    allow_freeze_DOM.value = allow_freeze;

    document.getElementById("terms_conditions").value = terms_conditions;
    document.getElementById("inspection_notes").value = inspection_notes;
    document.getElementById("removal_notes").value = removal_notes;

    // // ARRAYS OF OBJECTS 2
    // // Locations
    // const all_locations = [];
    // // Questions
    // const all_questions = [];
    // // Contacts
    // const all_contacts = [];
    // // Removals
    // const all_removals = [];
    // // Inspections
    // const all_inspections = [];

        var location_num = $("#location_num");
        var contact_num = $("#contact_num");
        var inspection_num = $("#inspection_num");
        var removal_num = $("#removal_num");
        var question_num = $("#question_num");

        // Loop through locations
        for(var i = 0; i< asset_locations.length; i++){
            var asset = asset_locations[i];

            if(asset == -1 || asset == "-1"){
                // ignore
            }
            else{
                
                let curid = parseInt(location_num.val()) + 1;
                location_num.val(curid);

                var comps = asset.split("??||&&");
                var ref_id = comps[0];
                var loc_id = curid;
                var loc_address1 = comps[1];
                var loc_address2 = comps[2];
                var loc_country = comps[5];
                var loc_city = comps[3];
                var loc_state = comps[4];

                var loc_obj = new Location(loc_id, loc_address1, loc_address2, loc_country, loc_city, loc_state, ref_id);
                all_locations.push(loc_obj);
            }
        }

        // Loop through questions
        for(var i =0; i< questions.length; i++){
            var ques = questions[i];

            if(ques == -1 || ques == "-1"){
                // ignore
            }
            else{
                
                let curid = parseInt(question_num.val()) + 1;
                question_num.val(curid);

                var comps = ques.split("??||&&");
                var ques_id = curid;
                var ques_name = comps[1];

                var ques_obj = new Question(ques_id, ques_name);
                all_questions.push(ques_obj);
            }
        }

        // Loop through contacts
        for(var i = 0; i < contacts.length; i++){
            var cont = contacts[i];

            if(cont == -1 || cont == "-1"){
                // ignore
            }
            else{
                let curid = parseInt(contact_num.val()) + 1;
                contact_num.val(curid);

                var comps = cont.split("??||&&");
                var cont_id = curid;
                var cont_name = comps[1];
                var cont_phone = comps[2];
                var cont_location = comps[3];

                var cont_obj = new Contact(cont_id, cont_name, cont_phone, cont_location);
                all_contacts.push(cont_obj);
            }
        }

        // Loop through inspection
        for(var i =0; i< inspections.length; i++){
            var ins = inspections[i];

            if(ins == -1 || ins == "-1"){
                // ignore
            }
            else{
                let curid = parseInt(inspection_num.val()) + 1;
                inspection_num.val(curid);

                var comps = ins.split("??||&&");
                var ins_id = curid;
                var ins_start_date = comps[1];
                var ins_end_date = comps[2];
                var ins_start_time = comps[3];
                var ins_end_time = comps[4];
                var ins_location = comps[5];

                var ins_obj = new Inspection(ins_id, ins_start_date, ins_end_date, ins_start_time, ins_end_time, ins_location);
                all_inspections.push(ins_obj);
            }
        }

        // Loop through removal
        for(var i=0; i<removals.length; i++){
            var rem = removals[i];

            if(rem == -1|| rem == "-1"){
                // ignore
            }
            else{
                let curid = parseInt(removal_num.val()) + 1;
                removal_num.val(curid);

                var comps = rem.split("??||&&");
                var rem_id = curid;
                var rem_start_date = comps[1];
                var rem_end_date = comps[2];
                var rem_start_time = comps[3];
                var rem_end_time = comps[4];
                var rem_location = comps[5];

                var rem_obj = new Removal(rem_id, rem_start_date, rem_end_date, rem_start_time, rem_end_time, rem_location);
                all_removals.push(rem_obj);
            }
        }

        paint_removals(all_removals);
        function paint_removals(removal_list){
            for(var i= 0; i<removal_list.length; i++){
                var rem = removal_list[i];

                var id = rem.id;
                var start_date = rem.start_date;
                var end_date = rem.end_date;
                var start_time = rem.start_time;
                var end_time = rem.end_time;
                var location = rem.location;

                var disp_end_date = end_date;

                if (end_date == "" || end_date == -1 || end_date == "-1") {
                    disp_end_date = start_date;
                }

                var location_display = specific_location(location);
                
                var err = "";

                if(location_display == "404"){
                    location_display = "ERROR - Missing Location";
                    err = "style=display:flex;";
                }

                const output = `
                    <li class="removal_item" name="removal_module_${id}">
                        <span class="location_alert" ${err}>
                            <i class="fas fa-exclamation-circle"></i>
                        </span>
                        <span class="information_content">
                            <strong>Start Date: </strong>
                            <span class="date" id="removal_start_date_entry_${id}">
                                ${start_date}
                            </span>
                            <strong>End Date: </strong>
                            <span class="date" id="removal_end_date_entry_${id}">
                                ${disp_end_date}
                            </span>
                            <strong>Start Time: </strong>
                            <span class="time" id="removal_start_time_entry_${id}">
                                ${mil_time_to_disp(start_time)}
                            </span>
                            <strong>End Time: </strong>
                            <span class="time" id="removal_end_time_entry_${id}">
                                ${mil_time_to_disp(end_time)}
                            </span>
                            <br>
                            <strong>Location: </strong>
                            <span class="time" id="removal_location_entry_${id}">
                                <span class="location_display">
                                    ${location_display}
                                </span>
                            </span>
                        </span>
                        <span class="operations">
                            <i class="fas fa-edit cursor_pointer edit_removal" name="removal_${id}"></i>
                            <i class="far fa-trash-alt cursor_pointer delete_removal" name="removal_${id}"></i>
                        </span>
                    </li>
                `;

                document.getElementById("removal_list").innerHTML += output;
                var num = all_removals.length;
                if (num >= 10) {
                    document.getElementById("add_removal_details").style.display = "none";
                }
            }
        }

        paint_inspections(all_inspections);

        function paint_inspections(inspection_list){
            for(var i =0; i< inspection_list.length; i++){
                var ins = inspection_list[i];

                var id = ins.id;
                var start_date = ins.start_date;
                var end_date = ins.end_date;
                var start_time = ins.start_time;
                var end_time = ins.end_time;
                var location = ins.location;
                
                var disp_end_date = end_date;

                if (end_date == "" || end_date == -1 || end_date == "-1") {
                    disp_end_date = start_date;
                }

                var location_display = specific_location(location);
                var err = "";


                if(location_display == "404"){
                    location_display = "ERROR - Missing Location";
                    err = "style=display:flex;";
                }

                const output = `
                    <li class="inspection_item" name="inspection_module_${id}">
                        <span class="location_alert" ${err}>
                            <i class="fas fa-exclamation-circle"></i>
                        </span>
                        <span class="information_content">
                            <strong>Start Date: </strong>
                            <span class="date" id="inspection_start_date_entry_${id}">
                                ${start_date}
                            </span>
                            <strong>End Date: </strong>
                            <span class="date" id="inspection_end_date_entry_${id}">
                                ${disp_end_date}
                            </span>
                            <strong>Start Time: </strong>
                            <span class="time" id="inspection_start_time_entry_${id}">
                                ${mil_time_to_disp(start_time)}
                            </span>
                            <strong>End Time: </strong>
                            <span class="time" id="inspection_end_time_entry_${id}">
                                ${mil_time_to_disp(end_time)}
                            </span>
                            <br>
                            <strong>Location: </strong>
                            <span class="time" id="inspection_location_entry_${id}">
                                <span class="location_display">
                                    ${location_display}
                                </span>
                            </span>
                        </span>
                        <span class="operations">
                            <i class="fas fa-edit cursor_pointer edit_inspection" name="inspection_${id}"></i>
                            <i class="far fa-trash-alt cursor_pointer delete_inspection" name="inspection_${id}"></i>
                        </span>
                    </li>
                `;
                
                document.getElementById("inspection_list").innerHTML += output;
                var num = all_inspections.length;
                if (num >= 10) {
                    document.getElementById("add_inspect_details").style.display = "none";
                }
            }
        }
        paint_contacts(all_contacts);

        function paint_contacts(contact_list){
            for(var i=0; i<contact_list.length; i++){
                var cont = contact_list[i];

                var id = cont.id;
                var name = cont.name;
                var phone = cont.phone;
                var location = cont.location;
                
                var location_display = specific_location(location);
                var err = "";

                if(location_display == "404"){
                    location_display = "ERROR - Missing Location";
                    err = "style=display:flex;";
                }

                const output = `
                    <li class="contact_item" name="contact_module_${id}">
                        <span class="location_alert" ${err}>
                            <i class="fas fa-exclamation-circle"></i>
                        </span>
                        <span class="information_content">
                            <strong>Name: </strong>
                            <span class="name" id="contact_name_entry_${id}">
                                ${name}
                            </span>
                            <strong>Phone: </strong>
                            <span class="name" id="contact_phone_entry_${id}">
                                ${phone}
                            </span>
                            <br>
                            <strong>Location: </strong>
                            <span class="phone" id="contact_location_entry_${id}">
                                <span class="location_display">
                                    ${location_display}
                                </span>
                            </span>
                        </span>
                        <span class="operations">
                            <i class="fas fa-edit cursor_pointer edit_contact" name="contact_${id}"></i>
                            <i class="far fa-trash-alt cursor_pointer delete_contact" name="contact_${id}"></i>
                        </span>
                    </li>
                `;

                document.getElementById("contact_list").innerHTML += output;
                var num = all_contacts.length;
                if (num >= 10) {
                    document.getElementById("add_onsite_contact").style.display = "none";
                }
            }
        }

        paint_locations(all_locations);


        function paint_locations(location_list){
            for(var i =0; i< location_list.length; i++){
                var loc = location_list[i];

                var id = loc.id;
                var address1 = loc.address1;
                var address2 = loc.address2;
                var city = loc.city;
                var state = loc.state;
                var country_display = country_code_to_name(loc.country);

                if (address2 == -1) {
                    address2_display = "";
                }
                else {
                    address2_display = address2;
                }
                
                const output = `
                <li class="location_item" name="location_module_${id}">
                    <span>
                        <strong>Address: </strong>
                        <span class="address" id="location_address1_entry_${id}">
                            ${address1}
                        </span>
                        <strong>Address 2: </strong>
                        <span class="address" id="location_address2_entry_${id}">
                            ${address2_display}
                        </span>
                        <strong>City: </strong>
                        <span class="city" id="location_city_entry_${id}">
                            ${city}
                        </span>
                        <strong>State: </strong>
                        <span class="state" id="location_state_entry_${id}">
                            ${state}
                        </span>
                        <strong>Country: </strong>
                        <span class="country" id="location_country_entry_${id}">
                            ${country_display}
                        </span>
                    </span>
                    <span class="operations">
                        <i class="fas fa-edit cursor_pointer edit_location" name="location_${id}"></i>
                        <i class="far fa-trash-alt cursor_pointer delete_location" name="location_${id}"></i>
                    </span>
                </li>`;


                document.getElementById("location_list").innerHTML += output;
                var num = location_list.length;
                if (num >= 5) {
                    document.getElementById("add_location_details").style.display = "none";
                }
            }
        }

        paint_questions(all_questions);
        function paint_questions(question_list){
            for(var i=0; i<question_list.length; i++){
                var ques = question_list[i];

                var id = ques.id;
                var name = ques.question;

                const output = `
                    <li class="question_item" name="question_module_${id}">
                        <span class="information_content width_100">
                            <strong>Question: </strong>
                            <span class="name" id="question_entry_${id}">
                                ${name}
                            </span>
                            <span class="operations">
                                <i class="fas fa-edit cursor_pointer edit_question" name="question_${id}"></i>
                                <i class="far fa-trash-alt cursor_pointer delete_question" name="question_${id}"></i>
                            </span>
                        </span>
                    </li>      
                `;

                document.getElementById("question_list").innerHTML += output;
                var num = all_questions.length;
                if (num >= 10) {
                    document.getElementById("add_registration_question").style.display = "none";
                }
            }
        }

        // Check house list
        $(".house_node").each(function(){
            var img_obj = $(this).find("img");
            var name = img_obj.attr("name");
            var sel = "||" + name + "||";
            if(house_list.includes(sel)){
                img_obj.css("display", "block");
            }
        });

        
        location_action();

        // remove disclaimers
        if(all_locations.length > 0){
            $("#asset_location_disclaimer").css("display", "none");
            $("#inspection_location_disclaimer").css("display", "none");
            $("#removal_location_disclaimer").css("display", "none");
            $("#contact_location_disclaimer").css("display", "none");
        }
        else{
            $("#asset_location_disclaimer").css("display", "block");
            $("#inspection_location_disclaimer").css("display", "block");
            $("#removal_location_disclaimer").css("display", "block");
            $("#contact_location_disclaimer").css("display", "block");
        }

        if(all_removals.length == 0){
            $("#multiple_removal_disclaimer").css("display", "block");
        }
        else{
            $("#multiple_removal_disclaimer").css("display", "none");
        }

        // Reset input fields
        $("input").click(function () {
            $(this).css("background-color", "whitesmoke");
        });
        $("input").keypress(function () {
            $(this).css("background-color", "whitesmoke");
        });
        $("select").change(function () {
            $(this).css("background-color", "whitesmoke");
        });
        $("textarea").click(function () {
            $(this).css("background-color", "whitesmoke");
        });
        $("textarea").keypress(function () {
            $(this).css("background-color", "whitesmoke");
        });
        
        function location_arr_to_str(location_obj) {
            if (typeof location_obj === 'undefined') {
                // does not exist
                return -1;
            }
            else {
                // does exist
                var id = location_obj.id;
                var address1 = location_obj.address1;
                var address2 = location_obj.address2;
                var country = location_obj.country;
                var city = location_obj.city;
                var state = location_obj.state;

                if (address2 == -1 || address2 == "" || address2 == "-1") {
                    return id + "??||&&" + address1 + "??||&&" + -1 + "??||&&" + city + "??||&&" + state + "??||&&" + country;
                }
                else {
                    return id + "??||&&" + address1 + "??||&&" + address2 + "??||&&" + city + "??||&&" + state + "??||&&" + country;
                }
            }
        }

        function contact_arr_to_str(contact_obj) {
            if (typeof contact_obj === 'undefined') {
                // does not exist
                return -1;
            }
            else {
                // does exist
                var id = contact_obj.id;
                var name = contact_obj.name;
                var phone = contact_obj.phone;
                var location = contact_obj.location;

                return id + "??||&&" + name + "??||&&" + phone + "??||&&" + location;
            }
        }

        function removal_arr_to_str(removal_obj) {
            if (typeof removal_obj === 'undefined') {
                // does not exist
                return -1;
            }
            else {
                // does exist
                var id = removal_obj.id;
                var start_date = removal_obj.start_date;
                var end_date = removal_obj.end_date;
                var start_time = removal_obj.start_time;
                var end_time = removal_obj.end_time;
                var location = removal_obj.location;

                if (end_date == "") {
                    end_date = -1;
                }

                return id + "??||&&" + start_date + "??||&&" + end_date + "??||&&" + start_time + "??||&&" + end_time + "??||&&" + location;
            }
        }

        function inspect_arr_to_str(inspection_obj) {
            if (typeof inspection_obj === 'undefined') {
                // does not exist
                return -1;
            }
            else {
                // does exist
                var id = inspection_obj.id;
                var start_date = inspection_obj.start_date;
                var end_date = inspection_obj.end_date;
                var start_time = inspection_obj.start_time;
                var end_time = inspection_obj.end_time;
                var location = inspection_obj.location;

                if (end_date == "") {
                    end_date = -1;
                }

                return id + "??||&&" + start_date + "??||&&" + end_date + "??||&&" + start_time + "??||&&" + end_time + "??||&&" + location;
            }
        }

        function question_arr_to_str(question_obj) {
            if (typeof question_obj === 'undefined') {
                // does not exist
                return -1;
            }
            else {
                // does exist
                var id = question_obj.id;
                var question = question_obj.question;

                return id + "??||&&" + question;
            }
        }
        
        


        // Submit edit account
        $("#edit_account_submit").click(function(e){
            e.preventDefault();
            
            $("#edit_account_submit").css("display", "none");

            var result = validate_catalog_edit();
            
            $(".saving_catalog_disclaimer").css("display", "block");
            
            if (result == "success") {
                ajax_edit();
            }
            else {

                $("#edit_account_submit").css("display", "inline-block");
                $(".saving_catalog_disclaimer").css("display", "none");
            }
        });

        
        function ajax_edit() {
            var location1, location2, location3, location4, location5;
            var inspection1, inspection2, inspection3, inspection4, inspection5, inspection6, inspection7, inspection8, inspection9, inspection10;
            var removal1, removal2, removal3, removal4, removal5, removal6, removal7, removal8, removal9, removal10;
            var contact1, contact2, contact3, contact4, contact5, contact6, contact7, contact8, contact9, contact10;
            var question1, question2, question3, question4, question5, question6, question7, question8, question9, question10;

            // locations
            location1 = location_arr_to_str(all_locations[0]);
            location2 = location_arr_to_str(all_locations[1]);
            location3 = location_arr_to_str(all_locations[2]);
            location4 = location_arr_to_str(all_locations[3]);
            location5 = location_arr_to_str(all_locations[4]);

            // inspections
            inspection1 = inspect_arr_to_str(all_inspections[0]);
            inspection2 = inspect_arr_to_str(all_inspections[1]);
            inspection3 = inspect_arr_to_str(all_inspections[2]);
            inspection4 = inspect_arr_to_str(all_inspections[3]);
            inspection5 = inspect_arr_to_str(all_inspections[4]);
            inspection6 = inspect_arr_to_str(all_inspections[5]);
            inspection7 = inspect_arr_to_str(all_inspections[6]);
            inspection8 = inspect_arr_to_str(all_inspections[7]);
            inspection9 = inspect_arr_to_str(all_inspections[8]);
            inspection10 = inspect_arr_to_str(all_inspections[9]);

            // removals
            removal1 = removal_arr_to_str(all_removals[0]);
            removal2 = removal_arr_to_str(all_removals[1]);
            removal3 = removal_arr_to_str(all_removals[2]);
            removal4 = removal_arr_to_str(all_removals[3]);
            removal5 = removal_arr_to_str(all_removals[4]);
            removal6 = removal_arr_to_str(all_removals[5]);
            removal7 = removal_arr_to_str(all_removals[6]);
            removal8 = removal_arr_to_str(all_removals[7]);
            removal9 = removal_arr_to_str(all_removals[8]);
            removal10 = removal_arr_to_str(all_removals[9]);

            // contacts
            contact1 = contact_arr_to_str(all_contacts[0]);
            contact2 = contact_arr_to_str(all_contacts[1]);
            contact3 = contact_arr_to_str(all_contacts[2]);
            contact4 = contact_arr_to_str(all_contacts[3]);
            contact5 = contact_arr_to_str(all_contacts[4]);
            contact6 = contact_arr_to_str(all_contacts[5]);
            contact7 = contact_arr_to_str(all_contacts[6]);
            contact8 = contact_arr_to_str(all_contacts[7]);
            contact9 = contact_arr_to_str(all_contacts[8]);
            contact10 = contact_arr_to_str(all_contacts[9]);

            // questions
            question1 = question_arr_to_str(all_questions[0]);
            question2 = question_arr_to_str(all_questions[1]);
            question3 = question_arr_to_str(all_questions[2]);
            question4 = question_arr_to_str(all_questions[3]);
            question5 = question_arr_to_str(all_questions[4]);
            question6 = question_arr_to_str(all_questions[5]);
            question7 = question_arr_to_str(all_questions[6]);
            question8 = question_arr_to_str(all_questions[7]);
            question9 = question_arr_to_str(all_questions[8]);
            question10 = question_arr_to_str(all_questions[9]);

            $.post("edit_catalog.php", {
                catalog_name: catalog_name,
                auction_type: auction_type,
                charity_event: charity_event,
                catalog_description: catalog_description,
                start_date: start_date,
                start_time: start_time2,
                end_date: end_date,
                end_time: end_time2,
                end_increment: end_increment,

                location1: location1,
                location2: location2,
                location3: location3,
                location4: location4,
                location5: location5,

                house_accounts: house_accounts,

                currency: currency,
                timezone: timezone,
                buyer_premium: buyer_premium,
                allow_freeze: allow_freeze,

                inspection1: inspection1,
                inspection2: inspection2,
                inspection3: inspection3,
                inspection4: inspection4,
                inspection5: inspection5,
                inspection6: inspection6,
                inspection7: inspection7,
                inspection8: inspection8,
                inspection9: inspection9,
                inspection10: inspection10,

                removal1: removal1,
                removal2: removal2,
                removal3: removal3,
                removal4: removal4,
                removal5: removal5,
                removal6: removal6,
                removal7: removal7,
                removal8: removal8,
                removal9: removal9,
                removal10: removal10,

                contact1: contact1,
                contact2: contact2,
                contact3: contact3,
                contact4: contact4,
                contact5: contact5,
                contact6: contact6,
                contact7: contact7,
                contact8: contact8,
                contact9: contact9,
                contact10: contact10,

                question1: question1,
                question2: question2,
                question3: question3,
                question4: question4,
                question5: question5,
                question6: question6,
                question7: question7,
                question8: question8,
                question9: question9,
                question10: question10,

                terms_conditions: terms_conditions,

                inspection_notes: inspection_notes,
                removal_notes: removal_notes

            }, function (data, status) {
                if (data == "done" && status == "success") {
                    location.replace("manage.php?edit=1");
                }
                else {
                    // TODO - error handling
                }
            });
        }

        function validate_catalog_edit() {
            // Validate create catalog form


            // define field values

            // BASIC INFORMATION section

            let catalog_name_DOM = document.getElementById("catalog_name");
            let auction_type_DOM = document.getElementById("auction_type");
            let charity_event_DOM = document.getElementById("charity_event");
            let catalog_description_DOM = document.getElementById("catalog_description");
            let start_date_DOM = document.getElementById("start_date");
            let start_time_DOM = document.getElementById("start_time");
            let end_date_DOM = document.getElementById("end_date");
            let end_time_DOM = document.getElementById("end_time");
            let end_increment_DOM = document.getElementById("end_increment");

            catalog_name = catalog_name_DOM.value;
            auction_type = auction_type_DOM.value;
            charity_event = charity_event_DOM.value;
            catalog_description = catalog_description_DOM.value;
            start_date = start_date_DOM.value;
            start_time2 = start_time_DOM.value;
            end_date = end_date_DOM.value;
            end_time2 = end_time_DOM.value;
            end_increment = end_increment_DOM.value;

            // ASSET LOCATION section
            // all_locations

            // HOUSE ACCOUNT section
            house_accounts = document.getElementById("active_house_accounts").value;

            // MISCELLANEOUS section
            let currency_DOM = document.getElementById("asset_currency");
            let timezone_DOM = document.getElementById("asset_timezone");
            let buyer_premium_DOM = document.getElementById("buyer_premium");
            let allow_freeze_DOM = document.getElementById("allow_freeze");

            currency = currency_DOM.value;
            timezone = timezone_DOM.value;
            buyer_premium = buyer_premium_DOM.value;
            allow_freeze = allow_freeze_DOM.value;

            // INSPECTION INFORMATION section
            // all_inspections

            // REMOVAL INFORMATION section
            // all_removals

            // CONTACT INFORMATION section
            // all_contacts

            // REGISTRATION QUESTION section
            // all_questions

            inspection_notes = document.getElementById("inspection_notes").value;
            removal_notes = document.getElementById("removal_notes").value;

            // LEGAL section
            let terms_conditions_DOM = document.getElementById("terms_conditions");

            terms_conditions = terms_conditions_DOM.value;

            // ajax_tester();

            // $.post("save_catalog.php", {
            //     locations: catalog_name
            // }, function (data, status) {
            //     alert(data);
            // });

            // validate - in order of appearance

            // BASiC INFORMATION section
            if (catalog_name == "") {
                alert("Please provide a catalog name");
                catalog_name_DOM.style.backgroundColor = "lightpink";
                catalog_name_DOM.focus();
                return;
            }
            if (auction_type == "") {
                alert("Please choose the auction type");
                auction_type_DOM.style.backgroundColor = "lightpink";
                auction_type_DOM.focus();
                return;
            }
            if (charity_event == "") {
                alert("Please specify if this is a charity event");
                charity_event_DOM.style.backgroundColor = "lightpink";
                charity_event_DOM.focus();
                return;
            }
            if (catalog_description == "") {
                alert("Please provide the catalog's description");
                catalog_description_DOM.style.backgroundColor = "lightpink";
                catalog_description_DOM.focus();
                return;
            }


            if (start_date == "") {
                alert("Please provide a start date");
                start_date_DOM.style.backgroundColor = "lightpink";
                start_date_DOM.focus();
                return;
            }
            
            if (date_error) {
                alert("The catalog end date must be after the start date");
                $("#start_date").focus();
                $("#start_date").css("background-color", "lightpink");
                $("#end_date").css("background-color", "lightpink");
                return;
            }
            if (start_time2 == "") {
                alert("Please provide a start time");
                start_time_DOM.style.backgroundColor = "lightpink";
                start_time_DOM.focus();
                return;
            }
            if (end_date == "") {
                alert("Please provide an end date");
                end_date_DOM.style.backgroundColor = "lightpink";
                end_date_DOM.focus();
                return;
            }
            if (end_time2 == "") {
                alert("Please provide an end time");
                end_time_DOM.style.backgroundColor = "lightpink";
                end_time_DOM.focus();
                return;
            }
            if (end_increment == "") {
                alert("Please provide the end increment");
                end_increment_DOM.style.backgroundColor = "lightpink";
                end_increment_DOM.focus();
                return;
            }

            // LOCATION section
            if (all_locations.length == 0) {
                alert("You must provide at least one asset location");
                return;
            }

            // MISCELANEOUS section
            if (currency == "") {
                alert("Please provide the currency of the asset");
                currency_DOM.style.backgroundColor = "lightpink";
                currency_DOM.focus();
                return;
            }
            if (timezone == "") {
                alert("Please provide the timezone of the asset");
                timezone_DOM.style.backgroundColor = "lightpink";
                timezone_DOM.focus();
                return;
            }
            if (buyer_premium == "") {
                alert("Please provide the buyer's premium for this auction");
                buyer_premium_DOM.style.backgroundColor = "lightpink";
                buyer_premium_DOM.focus();
                return;
            }
            if (typeof parseFloat(buyer_premium) != "number") {
                alert("The buyer premium must be a real number");
                buyer_premium_DOM.style.backgroundColor = "lightpink";
                buyer_premium_DOM.focus();
                return;
            }
            if (parseFloat(buyer_premium) > 100) {
                alert("The buyer premium must be a percentage less than 100");
                buyer_premium_DOM.style.backgroundColor = "lightpink";
                buyer_premium_DOM.focus();
                return;
            }
            if (parseFloat(buyer_premium) < 0) {
                alert("The buyer premium must be a percentage greater than 0");
                buyer_premium_DOM.style.backgroundColor = "lightpink";
                buyer_premium_DOM.focus();
                return;
            }

            if (allow_freeze == "") {
                alert("Please specify if you want to enable freezing on this catalog");
                allow_freeze_DOM.style.backgroundColor = "lightpink";
                allow_freeze_DOM.focus();
                return;
            }

            // INSPECTION INFORMATION section
            for (var i = 0; i < all_inspections.length; i++) {
                var ins = all_inspections[i];
                var id = ins.id;
                var loc = ins.location;

                var mod = "inspection_module_" + id;
                var sel = "[name='" + mod + "']";
                var disp = $(sel).find(".location_alert").css("display");

                if (loc == -1 || disp == "flex") {
                    alert("At least one of your inspection details is missing a location");
                    return;
                }
            }

            // REMOVAL INFORMATION section
            if (all_removals.length == 0) {
                alert("You must provide at least one removal time and date");
                return;
            }

            for (var i = 0; i < all_removals.length; i++) {
                var rem = all_removals[i];
                var id = rem.id;
                var loc = rem.location;

                var mod = "removal_module_" + id;
                var sel = "[name='" + mod + "']";
                var disp = $(sel).find(".location_alert").css("display");

                if (loc == -1 || disp == "flex") {
                    alert("At least one of your removal details is missing a location");
                    return;
                }
            }

            // CONTACT INFORMATION section
            for (var i = 0; i < all_contacts.length; i++) {
                var cont = all_contacts[i];
                var id = cont.id;
                var loc = cont.location;

                var mod = "contact_module_" + id;
                var sel = "[name='" + mod + "']";
                var disp = $(sel).find(".location_alert").css("display");

                if (loc == -1 || disp == "flex") {
                    alert("At least one of your contact details is missing a location");
                    return;
                }
            }

            // LEGAL section
            if (terms_conditions == "") {
                alert("Please provide the terms and conditions of this auction");
                terms_conditions_DOM.style.backgroundColor = "lightpink";
                terms_conditions_DOM.focus();
                return;
            }

            return "success";
        }
    });
</script>
