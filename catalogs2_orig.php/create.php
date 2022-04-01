<?php include "../includes/username.php"; ?>
<?php
    if($username == "" || !isset($username)){
        header("location: ../index.php");
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
                <a  type="submit" class="fancy-submit fancy-button bg-gradient1 cursor_pointer" style="margin:auto;" href="javascript: validate_catalog_creation();" id="create_account_submit" disabled><span>Create Catalog</span></a>
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
                    <a href="#" class="bidzbutton devart" onClick="add_question(event)" >Add Registration Question</a>

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
                    <a href="#" class="bidzbutton devart" onClick="save_edit_question(event)">Edit Registration Question</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Question Operations -->
    
    <script>
    
        function add_question(e){
            e.preventDefault();

            var counter = document.getElementById("question_num");
            var parent = document.getElementById("question_list");

            var question = $("#registration_question").val();

            if(question == ""){
                alert("Please complete the form");
                return;
            }

            var num = parseInt(counter.value) + 1;

            var list_num = document.getElementById("question_list").childElementCount;

            if(list_num > 9){
                document.getElementById("add_registration_question").style.display = "none";
                return;
            }

            counter.value = num;

            var out = '<li class="question_item" name="question_module_' + num + '"><span class="information_content width_100"><strong>Question: </strong><span class="name" id="question_entry_' + num + '">' + question + '<input type="hidden" name="question_' + num + '" id="question_' + num + '" value="' + question + '"></span><span class="operations"><i class="fas fa-edit cursor_pointer" onclick="edit_question(' + num + ')"></i><i class="far fa-trash-alt cursor_pointer" onclick="delete_question(' + num + ')"></i></span></span></li>';

            parent.innerHTML += out;

            // Close Modal
            $("#registration_question").val("");

            if(list_num >= 9){
                document.getElementById("add_registration_question").style.display = "none";
            }
            
            document.getElementById("add_question_modal").style.display = "none";
        }

        function edit_question(num){
            var edit_modal = document.getElementById("edit_question_modal");
            edit_modal.style.display = "block";

            var question_selector = "question_" + num;

            var question_field = document.getElementById(question_selector);

            var edit_question_field = document.getElementById("edit_registration_question");

            document.getElementById("edit_question_number").value = num;

            var entered_question = question_field.value;

            edit_question_field.value = entered_question;
        }

        function save_edit_question(e){
            e.preventDefault();

            var edit_question_field = document.getElementById("edit_registration_question");

            var number = document.getElementById("edit_question_number").value;

            var new_question = edit_question_field.value;

            if(new_question == ""){
                alert("Please complete the form");
                return;
            }

            var hidden_question_selector = "question_" + number;

            var question_entry = "question_entry_" + number;

            var hidden_question_field = document.getElementById(hidden_question_selector);

            var question_field = document.getElementById(question_entry);

            hidden_question_field.value = new_question;

            var question_hidden = '<input type="hidden" name="question_' + number + '" id="question_' + number + '" value="' + new_question + '">';

            question_field.innerHTML = new_question + question_hidden;

            var edit_modal = document.getElementById("edit_question_modal");
            edit_modal.style.display = "none";
        }
        
        function delete_question(num){
            var selector = "question_module_" + num;
            document.getElementsByName(selector)[0].remove();

            document.getElementById("add_registration_question").style.display = "inline-block";
            
            location_action();
            
        }

    </script>
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
                    <a href="#" class="bidzbutton devart" onClick="add_contact(event)" >Add Onsite Contact</a>

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
                    <a href="#" class="bidzbutton devart" onClick="save_edit_contact(event)">Edit Onsite Contact</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Contact Operations -->
    <script>

        function save_edit_contact(event){
            event.preventDefault();

            var edit_name_field = document.getElementById("edit_contact_name");
            var edit_phone_field = document.getElementById("edit_contact_phone");
            var edit_location_field = document.getElementById("edit_contact_location");

            var number = document.getElementById("edit_contact_number").value;

            var new_name = edit_name_field.value;
            var new_phone = edit_phone_field.value;
            var new_location = edit_location_field.value;

            if(new_name == "" || new_phone == "" || new_location == ""){
                alert("Please complete the form");
                return;
            }
            
            var hidden_name_selector = "contact_name_" + number;
            var hidden_phone_selector = "contact_phone_" + number;
            var hidden_location_selector = "contact_location_" + number;

            var contact_name_entry = "contact_name_entry_" + number;
            var contact_phone_entry = "contact_phone_entry_" + number;
            var contact_location_entry = "contact_location_entry_" + number;

            // Output fields
            var hidden_name_field  = document.getElementById(hidden_name_selector);
            var hidden_phone_field = document.getElementById(hidden_phone_selector);
            var hidden_location_field = document.getElementById(hidden_location_selector);

            var contact_name_field = document.getElementById(contact_name_entry);
            var contact_phone_field = document.getElementById(contact_phone_entry);
            var contact_location_field = document.getElementById(contact_location_entry);

            hidden_name_field.value = new_name;
            hidden_phone_field.value = new_phone;
            hidden_location_field.value = new_location;
            
            var name_hidden = '<input type="hidden" name="contact_name_' + number + '" id="contact_name_' + number + '" value="' + new_name + '">';
            var phone_hidden = '<input type="hidden" name="contact_phone_' + number + '" id="contact_phone_' + number + '" value="' + new_phone + '">';
            var location_hidden = '<input type="hidden" class="location_missing" name="contact_location_' + number + '" id="contact_location_' + number + '" value="' + new_location + '">';


            var location_display = location_addr[new_location];

            contact_name_field.innerHTML = new_name + name_hidden;
            contact_phone_field.innerHTML = new_phone + phone_hidden;
            contact_location_field.innerHTML = '<span class="location_display">' + location_display + '</span>' + location_hidden;

            
            var moduled = "contact_module_" + number;
            var sel = '[name="' + moduled + '"]';
            $(sel).find("span.location_alert").css("display", "none");
            
            var edit_modal = document.getElementById("edit_contact_modal");
            edit_modal.style.display = "none";
            
            location_action();
        }

        function edit_contact(num){
            var edit_modal = document.getElementById("edit_contact_modal");
            edit_modal.style.display = "block";

            
            var list = get_location_list();

            $("#edit_contact_location").empty();

            $("#edit_contact_location").append(list);


            var name_selector = "contact_name_" + num;
            var phone_selector = "contact_phone_" + num;
            var location_selector = "contact_location_" + num;

            var name_field = document.getElementById(name_selector);
            var phone_field = document.getElementById(phone_selector);
            var location_field = document.getElementById(location_selector);


            var edit_name_field = document.getElementById("edit_contact_name");
            var edit_phone_field = document.getElementById("edit_contact_phone");
            var edit_location_field = document.getElementById("edit_contact_location");
           
            document.getElementById("edit_contact_number").value = num;

            var entered_name = name_field.value;
            var entered_phone = phone_field.value;
            var entered_location = location_field.value;

            edit_name_field.value = entered_name;
            edit_phone_field.value = entered_phone;
            edit_location_field.value = entered_location;
            
            
            location_action();
        }

        function delete_contact(num){
            var selector = "contact_module_" + num;
            document.getElementsByName(selector)[0].remove();

            document.getElementById("add_onsite_contact").style.display = "inline-block";
            
            location_action();
            
        }

        function add_contact(event){
            
            event.preventDefault();

            var counter = document.getElementById("contact_num");

            var parent = document.getElementById("contact_list");
            var name_field = document.getElementById("contact_name");
            var phone_field = document.getElementById("contact_phone");
			var location_field = document.getElementById("contact_location");

            var name = name_field.value;
            var phone = phone_field.value;
			var location = location_field.value;
            
            if(name == "" || phone == "" || location == ""){
                alert("Please complete form");
                return;
            }

            var num = parseInt(counter.value) + 1;

            var list_num = document.getElementById("contact_list").childElementCount;

            if(list_num > 9){
                document.getElementById("add_contact_modal").style.display = "none";
                return;
            }
            counter.value = num;

            var name_hidden = '<input type="hidden" name="contact_name_' + num + '" id="contact_name_' + num + '" value="' + name + '">';
            var phone_hidden = '<input type="hidden" name="contact_phone_' + num + '" id="contact_phone_' + num + '" value="' + phone + '">';
            var location_hidden = '<input type="hidden" class="location_missing" name="contact_location_' + num + '" id="contact_location_' + num + '" value="' + location + '">';

            var location_display = location_addr[location];

            var out = '<li class="contact_item" name="contact_module_' + num + '"><span class="location_alert"><i class="fas fa-exclamation-circle"></i></span><span class="information_content"><strong>Name: </strong><span class="name" id="contact_name_entry_' + num + '">' + name + name_hidden + '</span><strong>Phone: </strong><span class="name" id="contact_phone_entry_' + num + '">' + phone + phone_hidden + '</span><br><strong>Location: </strong><span class="phone" id="contact_location_entry_' + num + '"><span class="location_display">' + location_display + '</span>' + location_hidden + '</span></span><span class="operations"><i class="fas fa-edit cursor_pointer" onClick="edit_contact(' + num + ')"></i><i class="far fa-trash-alt cursor_pointer" onClick="delete_contact(' + num + ')"></i></span></li>';

            parent.innerHTML += out;

            // Close modal
            name_field.value = "";
            phone_field.value = "";
			location_field.value = "";

            
            if(list_num >= 9){
                document.getElementById("add_onsite_contact").style.display = "none";
            }
            document.getElementById("add_contact_modal").style.display = "none";
            
            location_action();
        }
    </script>

    <!-- Inspection Modals -->

    <div id="add_inspection_modal" class="add_inspection_modal catalog_modal">
        <div class="modal_content inspection_modal">
            <h1>Add Inspection Information</h1>

            
            <div class="catalog_row signup_row">
                
                <div class="col3">
                    <div class="signup_group">
                        <label for="inspection_date" class="input_label">Inspection Date</label>
                        <input type="text" class="input_text date date_picker" onkeypress="return false"  name="inspection_date" id="inspection_date" placeholder="mm/dd/yyyy">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="inspection_start_time" class="input_label">Inspection Start Time</label>
                        <select class="input_text input_select start_time_drop" name="inspection_start_time" id="inspection_start_time">
                            <option class="select" value="">Select a Start Time</option>
                        </select>
                    </div>
                </div>
                <div class="col3">
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
                    <a href="#" class="bidzbutton devart" onClick="add_inspection(event)">Add Inspection Information</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>

    <div id="edit_inspection_modal" class="edit_inspection_modal catalog_modal">
        <div class="modal_content inspection_modal">
            <h1>Edit inspection Information</h1>

            
            <div class="catalog_row signup_row">
                <div class="col4">
                    <div class="signup_group">
                        <label for="edit_inspection_date" class="input_label">Inspection Date</label>
                        <input type="text" class="date input_text date_picker"  onkeypress="return false" name="edit_inspection_date" id="edit_inspection_date" placeholder="mm/dd/yyyy">
                    </div>
                </div>
                <div class="col4">
                    <div class="signup_group">
                        <label for="edit_inspection_start_time" class="input_label">Inspection Start Time</label>
                        <select class="input_text input_select start_time_drop" name="edit_inspection_start_time" id="edit_inspection_start_time">
                            <option class="select" value="">Select a Start Time</option>
                            <option value="1">8:00 AM</option>
                        </select>
                    </div>
                </div>
                <div class="col4">
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
                    <a href="#" class="bidzbutton devart" onClick="save_edit_inspection(event)">Edit inspection Information</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Inspection Operations -->
    <script>
        function delete_inspection(num){
            var selector = "inspection_module_" + num;
            document.getElementsByName(selector)[0].remove();
            document.getElementById("add_inspect_details").style.display = "inline-block";
            
            location_action();
        }
        function add_inspection(event){
            event.preventDefault();

            var counter = document.getElementById("inspection_num");

            var parent = document.getElementById("inspection_list");
            var date_field = document.getElementById("inspection_date");
            var start_field = document.getElementById("inspection_start_time");
            var end_field = document.getElementById("inspection_end_time");
            var location_field = document.getElementById("inspection_location");

            var date = date_field.value;
            var start_time = start_field.value;
            var end_time = end_field.value;
            var location = location_field.value;

            if(date == "" || start_time == "" || end_time == "" || location == ""){
                alert("Please complete form");
                return;
            }

            var num = parseInt(counter.value) + 1;

            var list_num = document.getElementById("inspection_list").childElementCount;

            if(list_num > 9){
                document.getElementById("add_inspection_modal").style.display = "none";
                return;
            }
            counter.value = num;

            var date_hidden = '<input type="hidden" name="inspection_date_' + num + '" id="inspection_date_' + num + '" value="' + date + '">';
            var start_hidden = '<input type="hidden" name="inspection_start_' + num + '" id="inspection_start_' + num + '" value="' + start_time + '">';
            var end_hidden = '<input type="hidden" name="inspection_end_' + num + '" id="inspection_end_' + num + '" value="' + end_time + '">';
            var location_hidden = '<input type="hidden" class="location_missing" name="inspection_location_' + num + '" id="inspection_location_' + num + '" value="' + location + '">';

            var out_start = mil_time_to_disp(start_time);
            var out_end = mil_time_to_disp(end_time);

            var location_display = location_addr[location];

            var out = '<li class="inspection_item" name="inspection_module_' + num + '"><span class="location_alert"><i class="fas fa-exclamation-circle"></i></span><span class="information_content"><strong>Date: </strong><span class="date" id="inspection_date_entry_' + num + '">' + date + date_hidden + '</span><strong>Start Time: </strong><span class="time" id="inspection_start_entry_' + num + '">' + out_start + start_hidden + '</span><strong>End Time: </strong><span class="time" id="inspection_end_entry_' + num + '">' + out_end + end_hidden + '</span><br><strong>Location: </strong><span class="time" id="inspection_location_entry_' + num + '"><span class="location_display">' + location_display + '</span>' + location_hidden + '</span></span><span class="operations"><i class="fas fa-edit cursor_pointer" onClick="edit_inspection(' + num + ')"></i><i class="far fa-trash-alt cursor_pointer" onClick="delete_inspection(' + num + ')"></i></span></li>';

            parent.innerHTML += out;

            // Close modal
            date_field.value = "";
            start_field.value = "";
            end_field.value = "";
            location_field.value = "";

            if(list_num >= 9){
                document.getElementById("add_inspect_details").style.display = "none";
            }
            document.getElementById("add_inspection_modal").style.display = "none";
            
            location_action();
        }
        function save_edit_inspection(event){
            event.preventDefault();

            var edit_date_field = document.getElementById("edit_inspection_date");
            var edit_start_field = document.getElementById("edit_inspection_start_time");
            var edit_end_field = document.getElementById("edit_inspection_end_time");
            var edit_location_field = document.getElementById("edit_inspection_location");

            var number = document.getElementById("edit_inspection_number").value;

            var new_date  = edit_date_field.value;
            var new_start = edit_start_field.value;
            var new_end = edit_end_field.value;
            var new_location = edit_location_field.value;


            if(new_date == "" || new_start == "" || new_end == "" || new_location == ""){
                alert("Please complete the form");
                return;
            }

            var hidden_date_selector = "inspection_date_" + number;
            var hidden_start_selector = "inspection_start_" + number;
            var hidden_end_selector = "inspection_end_" + number;
            var hidden_location_selector = "inspection_location_" + number;

            var inspection_date_entry = "inspection_date_entry_" + number;
            var inspection_start_entry = "inspection_start_entry_" + number;
            var inspection_end_entry  = "inspection_end_entry_" + number;
            var inspection_location_entry = "inspection_location_entry_" + number;

            // Output Fields
            var hidden_date_field = document.getElementById(hidden_date_selector);
            var hidden_start_field = document.getElementById(hidden_start_selector);
            var hidden_end_field = document.getElementById(hidden_end_selector);
            var hidden_location_field = document.getElementById(hidden_location_selector);

            var inspection_date_field = document.getElementById(inspection_date_entry);
            var inspection_start_field = document.getElementById(inspection_start_entry);
            var inspection_end_field = document.getElementById(inspection_end_entry);
            var inspection_location_field = document.getElementById(inspection_location_entry);

            hidden_date_field.value = new_date;
            hidden_start_field.value = new_start;
            hidden_end_field.value = new_end;
            hidden_location_field.value = new_location;

            
            var date_hidden = '<input type="hidden" name="inspection_date_' + number + '" id="inspection_date_' + number + '" value="' + new_date + '">';
            var start_hidden = '<input type="hidden" name="inspection_start_' + number + '" id="inspection_start_' + number + '" value="' + new_start + '">';
            var end_hidden = '<input type="hidden" name="inspection_end_' + number + '" id="inspection_end_' + number + '" value="' + new_end + '">';
            var location_hidden = '<input type="hidden" name="inspection_location_' + number + '" class="location_missing" id="inspection_location_' + number + '" value="' + new_location + '">';

            var out_start = mil_time_to_disp(new_start);
            var out_end = mil_time_to_disp(new_end);
            
            var location_display = location_addr[new_location];

            inspection_date_field.innerHTML = new_date + date_hidden;
            inspection_start_field.innerHTML = out_start + start_hidden;
            inspection_end_field.innerHTML = out_end + end_hidden;
            inspection_location_field.innerHTML = '<span class="location_display">' + location_display + '</span>' + location_hidden;

            
            var moduled = "inspection_module_" + number;
            var sel = '[name="' + moduled + '"]';
            $(sel).find("span.location_alert").css("display", "none");

            var edit_modal = document.getElementById("edit_inspection_modal");
            edit_modal.style.display = "none";
            
            location_action();
        }

        function edit_inspection(num){
            var edit_modal = document.getElementById("edit_inspection_modal");
            edit_modal.style.display = "block";

            var list = get_location_list();

            $("#edit_inspection_location").empty();

            $("#edit_inspection_location").append(list);



            var date_selector = "inspection_date_" + num;
            var start_selector = "inspection_start_" + num;
            var end_selector = "inspection_end_" + num;
            var location_selector = "inspection_location_" + num;

            var date_field = document.getElementById(date_selector);
            var start_field =  document.getElementById(start_selector);
            var end_field =  document.getElementById(end_selector);
            var location_field = document.getElementById(location_selector);

            var edit_date_field =  document.getElementById("edit_inspection_date");
            var edit_start_field =  document.getElementById("edit_inspection_start_time");
            var edit_end_field =  document.getElementById("edit_inspection_end_time");
            var edit_location_field = document.getElementById("edit_inspection_location");

            document.getElementById("edit_inspection_number").value = num;
            
            var entered_date = date_field.value;
            var entered_start = start_field.value;
            var entered_end = end_field.value;
            var entered_location = location_field.value;

            edit_date_field.value = entered_date;
            edit_start_field.value = entered_start;
            edit_end_field.value = entered_end;
            edit_location_field.value = entered_location;

            location_action();
        }
    </script>

    <!-- Removal Modals -->
    
    <div id="add_removal_modal" class="add_removal_modal catalog_modal">
        <div class="modal_content removal_modal">
            <h1>Add Removal Information</h1>

            
            <div class="catalog_row signup_row">
                <div class="col4">
                    <div class="signup_group">
                        <label for="removal_date" class="input_label">Removal Date</label>
                        <input type="text" class="date input_text date_picker"  onkeypress="return false" name="removal_date" id="removal_date" placeholder="mm/dd/yyyy">
                    </div>
                </div>
                <div class="col4">
                    <div class="signup_group">
                        <label for="removal_start_time" class="input_label">Removal Start Time</label>
                        <select class="input_text input_select start_time_drop" name="removal_start_time" id="removal_start_time">
                            <option class="select" value="">Select a Start Time</option>
                            <option value="1">8:00 AM</option>
                        </select>
                    </div>
                </div>
                <div class="col4">
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
                    <a href="#" class="bidzbutton devart" onClick="add_removal(event)">Add Removal Information</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>

    
    <div id="edit_removal_modal" class="edit_removal_modal catalog_modal">
        <div class="modal_content removal_modal">
            <h1>Edit Removal Information</h1>

            
            <div class="catalog_row signup_row">
                <div class="col4">
                    <div class="signup_group">
                        <label for="edit_removal_date" class="input_label">Removal Date</label>
                        <input type="text" class="date input_text date_picker"  onkeypress="return false" name="edit_removal_date" id="edit_removal_date" placeholder="mm/dd/yyyy">
                    </div>
                </div>
                <div class="col4">
                    <div class="signup_group">
                        <label for="edit_removal_start_time" class="input_label">Removal Start Time</label>
                        <select class="input_text input_select start_time_drop" name="edit_removal_start_time" id="edit_removal_start_time">
                            <option class="select" value="">Select a Start Time</option>
                            <option value="1">8:00 AM</option>
                        </select>
                    </div>
                </div>
                <div class="col4">
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
                    <a href="#" class="bidzbutton devart" onClick="save_edit_removal(event)">Edit Removal Information</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Removal Operations -->
    <script>
        function delete_removal(num){
            var selector = "removal_module_" + num;
            document.getElementsByName(selector)[0].remove();
            document.getElementById("add_removal_details").style.display = "inline-block";

            location_action();
        }
        function save_edit_removal(event){
            event.preventDefault();

            var edit_date_field = document.getElementById("edit_removal_date");
            var edit_start_field = document.getElementById("edit_removal_start_time");
            var edit_end_field = document.getElementById("edit_removal_end_time");
            var edit_location_field = document.getElementById("edit_removal_location");

            var number = document.getElementById("edit_removal_number").value;

            var new_date  = edit_date_field.value;
            var new_start = edit_start_field.value;
            var new_end = edit_end_field.value;
            var new_location = edit_location_field.value;

            if(new_date == "" || new_start == "" || new_end == "" || new_location == ""){
                alert("Please complete the form");
                return;
            }

            var hidden_date_selector = "removal_date_" + number;
            var hidden_start_selector = "removal_start_" + number;
            var hidden_end_selector = "removal_end_" + number;
            var hidden_location_selector = "removal_location_" + number;

            var removal_date_entry = "removal_date_entry_" + number;
            var removal_start_entry = "removal_start_entry_" + number;
            var removal_end_entry  = "removal_end_entry_" + number;
            var removal_location_entry = "removal_location_entry_" + number;

            // Output Fields
            var hidden_date_field = document.getElementById(hidden_date_selector);
            var hidden_start_field = document.getElementById(hidden_start_selector);
            var hidden_end_field = document.getElementById(hidden_end_selector);
            var hidden_location_field = document.getElementById(hidden_location_selector);

            var removal_date_field = document.getElementById(removal_date_entry);
            var removal_start_field = document.getElementById(removal_start_entry);
            var removal_end_field = document.getElementById(removal_end_entry);
            var removal_location_field = document.getElementById(removal_location_entry);

            hidden_date_field.value = new_date;
            hidden_start_field.value = new_start;
            hidden_end_field.value = new_end;
            hidden_location_field.value = new_location;

            
            var date_hidden = '<input type="hidden" name="removal_date_' + number + '" id="removal_date_' + number + '" value="' + new_date + '">';
            var start_hidden = '<input type="hidden" name="removal_start_' + number + '" id="removal_start_' + number + '" value="' + new_start + '">';
            var end_hidden = '<input type="hidden" name="removal_end_' + number + '" id="removal_end_' + number + '" value="' + new_end + '">';
            var location_hidden = '<input type="hidden" class="location_missing"  name="removal_location_' + number + '" id="removal_location_' + number + '" value="' + new_location + '">';

            var out_start = mil_time_to_disp(new_start);
            var out_end = mil_time_to_disp(new_end);


            var location_display = location_addr[new_location];

            removal_date_field.innerHTML = new_date + date_hidden;
            removal_start_field.innerHTML = out_start + start_hidden;
            removal_end_field.innerHTML = out_end + end_hidden;
            removal_location_field.innerHTML = '<span class="location_display">' + location_display + '</span>' + location_hidden;

            
            var moduled = "removal_module_" + number;
            var sel = '[name="' + moduled + '"]';
            $(sel).find("span.location_alert").css("display", "none");

            var edit_modal = document.getElementById("edit_removal_modal");
            edit_modal.style.display = "none";
            
            location_action();
        }
        function edit_removal(num){
            var edit_modal = document.getElementById("edit_removal_modal");
            edit_modal.style.display = "block";
            
            var list = get_location_list();

            $("#edit_removal_location").empty();

            $("#edit_removal_location").append(list);

            var date_selector = "removal_date_" + num;
            var start_selector = "removal_start_" + num;
            var end_selector = "removal_end_" + num;
            var location_selector = "removal_location_" + num;

            var date_field = document.getElementById(date_selector);
            var start_field =  document.getElementById(start_selector);
            var end_field =  document.getElementById(end_selector);
            var location_field = document.getElementById(location_selector);

            var edit_date_field =  document.getElementById("edit_removal_date");
            var edit_start_field =  document.getElementById("edit_removal_start_time");
            var edit_end_field =  document.getElementById("edit_removal_end_time");
            var edit_location_field = document.getElementById("edit_removal_location");

            document.getElementById("edit_removal_number").value = num;
            
            var entered_date = date_field.value;
            var entered_start = start_field.value;
            var entered_end = end_field.value;
            var entered_location = location_field.value;

            edit_date_field.value = entered_date;
            edit_start_field.value = entered_start;
            edit_end_field.value = entered_end;
            edit_location_field.value = entered_location;
            
            location_action();

        }
        function add_removal(event){
            event.preventDefault();

            var counter = document.getElementById("removal_num");

            var parent = document.getElementById("removal_list");
            var date_field = document.getElementById("removal_date");
            var start_field = document.getElementById("removal_start_time");
            var end_field = document.getElementById("removal_end_time");
            var location_field = document.getElementById("removal_location");

            var date = date_field.value;
            var start_time = start_field.value;
            var end_time = end_field.value;
            var location = location_field.value;

            if(date == "" || start_time == "" || end_time == "" || location == ""){
                alert("Please complete form");
                return;
            }

            var num = parseInt(counter.value) + 1;

            var list_num = document.getElementById("removal_list").childElementCount;

            if(list_num > 9){
                document.getElementById("add_removal_modal").style.display = "none";
                return;
            }
            counter.value = num;

            var date_hidden = '<input type="hidden" name="removal_date_' + num + '" id="removal_date_' + num + '" value="' + date + '">';
            var start_hidden = '<input type="hidden" name="removal_start_' + num + '" id="removal_start_' + num + '" value="' + start_time + '">';
            var end_hidden = '<input type="hidden" name="removal_end_' + num + '" id="removal_end_' + num + '" value="' + end_time + '">';
            var location_hidden = '<input type="hidden" class="location_missing" name="removal_location_' + num + '" id="removal_location_' + num + '" value="' + location + '">';

            var out_start = mil_time_to_disp(start_time);
            var out_end = mil_time_to_disp(end_time);


            var location_display = location_addr[location];

            var out = '<li class="removal_item" name="removal_module_' + num + '"><span class="location_alert"><i class="fas fa-exclamation-circle"></i></span><span class="information_content"><strong>Date: </strong><span class="date" id="removal_date_entry_' + num + '">' + date + date_hidden + '</span><strong>Start Time: </strong><span class="time" id="removal_start_entry_' + num + '">' + out_start + start_hidden + '</span><strong>End Time: </strong><span class="time" id="removal_end_entry_' + num + '">' + out_end + end_hidden + '</span><br><strong>Location: </strong><span class="time" id="removal_location_entry_' + num + '"><span class="location_display">' + location_display + '</span>' + location_hidden + '</span></span><span class="operations"><i class="fas fa-edit cursor_pointer" onClick="edit_removal(' + num + ')"></i><i class="far fa-trash-alt cursor_pointer" onClick="delete_removal(' + num + ')"></i></span></li>';

            parent.innerHTML += out;

            // Close modal
            date_field.value = "";
            start_field.value = "";
            end_field.value = "";
            location_field.value = "";

            if(list_num >= 9){
                document.getElementById("add_removal_details").style.display = "none";
            }
            document.getElementById("add_removal_modal").style.display = "none";
            
            location_action();
        }
    </script>
    
    
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
                    <a href="#" class="bidzbutton devart" onClick="add_location(event)">Add Location Information</a>

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
                    <a href="#" class="bidzbutton devart" onClick="save_edit_location(event)">Add Location Information</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>


    <?php include "../includes/footer.php"; ?>

    <!-- Location Operations -->
    <script>
        var location_addr = [];


        $("#add_inspect_details").css("display", "none");
        $("#add_removal_details").css("display", "none");
        $("#add_onsite_contact").css("display", "none");
        
        function location_action(){
            var location_list_number = $(".location_item").length;

            var inspection_number = document.getElementById("inspection_list").childElementCount;
            var removal_number = document.getElementById("removal_list").childElementCount;
            var contact_number = document.getElementById("contact_list").childElementCount;
            
            if(location_list_number == 0){
                $("#asset_location_disclaimer").css("display", "block");
                $("#inspection_location_disclaimer").css("display","block");
                $("#contact_location_disclaimer").css("display","block");
                $("#removal_location_disclaimer").css("display","block");

                $("#add_inspect_details").css("display", "none");
                $("#add_removal_details").css("display", "none");
                $("#add_onsite_contact").css("display", "none");

            }
            else{
                $("#asset_location_disclaimer").css("display", "none");
                $("#inspection_location_disclaimer").css("display","none");
                $("#contact_location_disclaimer").css("display","none");
                $("#removal_location_disclaimer").css("display","none");

                if(inspection_number < 10){
                    $("#add_inspect_details").css("display", "inline-block");
                }
                if(removal_number < 10){
                    $("#add_removal_details").css("display", "inline-block");
                }
                if(contact_number < 10){
                    $("#add_onsite_contact").css("display", "inline-block");
                }
            }
        }
        
        function save_edit_location(event){
            event.preventDefault();

            var edit_address1_field = document.getElementById("edit_asset_address1");
            var edit_address2_field = document.getElementById("edit_asset_address2");
            var edit_country_field = document.getElementById("edit_asset_country");
            var edit_city_field = document.getElementById("edit_asset_city");

            var edit_state_select_field = document.getElementById("edit_asset_state"); 
            var edit_static_state_field = document.getElementById("edit_asset_state_static");

            var edit_state_field_sel = "";

            
            if(edit_state_select_field.style.display == "block"){
                edit_state_field_sel = "edit_asset_state";
            }
            else if(edit_static_state_field.style.display == "block"){
                edit_state_field_sel = "edit_asset_state_static";
            }

            var edit_state_field = document.getElementById(edit_state_field_sel);
            

            var number = document.getElementById("edit_location_number").value;

            var new_address1 = edit_address1_field.value;
            var new_address2 = edit_address2_field.value;
            var new_country = edit_country_field.value;
            var new_city = edit_city_field.value;
            var new_state = edit_state_field.value;

            if(new_address1 == "" || new_country == "" || new_city == "" || new_state == ""){
                alert("Please complete the form");
                return;
            }


            var hidden_address1_selector = "location_address1_" + number;
            var hidden_address2_selector = "location_address2_" + number;
            var hidden_country_selector = "location_country_" + number;
            var hidden_city_selector = "location_city_" + number;
            var hidden_state_selector = "location_state_" + number;

            var location_address1_entry = "location_address1_entry_" + number;
            var location_address2_entry = "location_address2_entry_" + number;
            var location_country_entry = "location_country_entry_" + number;
            var location_city_entry = "location_city_entry_" + number;
            var location_state_entry = "location_state_entry_" + number;

            // Output fields
            var hidden_address1_field = document.getElementById(hidden_address1_selector);
            var hidden_address2_field = document.getElementById(hidden_address2_selector);
            var hidden_country_field = document.getElementById(hidden_country_selector);
            var hidden_city_field = document.getElementById(hidden_city_selector);
            var hidden_state_field = document.getElementById(hidden_state_selector);
            
            var location_address1_field = document.getElementById(location_address1_entry);
            var location_address2_field = document.getElementById(location_address2_entry);
            var location_country_field = document.getElementById(location_country_entry);
            var location_city_field = document.getElementById(location_city_entry);
            var location_state_field = document.getElementById(location_state_entry);

            hidden_address1_field.value = new_address1;
            hidden_address2_field.value = new_address2;
            hidden_country_field.value = new_country;
            hidden_city_field.value = new_city;
            hidden_state_field.value = new_state;

            var out_country = country_code_to_name(new_country);
            
            var address1_hidden = '<input type="hidden" name="location_address1_' + number + '" id="location_address1_' + number + '" value="' + new_address1 + '">';
            var address2_hidden = '<input type="hidden" name="location_address2_' + number + '" id="location_address2_' + number + '" value="' + new_address2 + '">';
            var country_hidden = '<input type="hidden" name="location_country_' + number + '" id="location_country_' + number + '" value="' + new_country + '">';
            var city_hidden = '<input type="hidden" name="location_city_' + number + '" id="location_city_' + number + '" value="' + new_city + '">';
            var state_hidden = '<input type="hidden" name="location_state_' + number + '" id="location_state_' + number + '" value="' + new_state + '">';


            location_address1_field.innerHTML = new_address1 + address1_hidden;
            location_address2_field.innerHTML = new_address2 + address2_hidden;
            location_country_field.innerHTML = out_country + country_hidden;
            location_city_field.innerHTML = new_city + city_hidden;
            location_state_field.innerHTML = new_state + state_hidden;

            var edit_modal = document.getElementById("edit_location_modal");
            edit_modal.style.display = "none";
            
            location_action();
        }
        function edit_location(num){
            var edit_modal = document.getElementById("edit_location_modal");
            edit_modal.style.display = "block";

            var address1_selector = "location_address1_" + num;
            var address2_selector = "location_address2_" + num;
            var country_selector = "location_country_" + num;
            var city_selector = "location_city_" + num;
            var state_selector = "location_state_" + num;

            var address1_field = document.getElementById(address1_selector);
            var address2_field = document.getElementById(address2_selector);
            var country_field = document.getElementById(country_selector);
            var city_field = document.getElementById(city_selector);
            var state_field = document.getElementById(state_selector);

            var edit_address1_field =  document.getElementById("edit_asset_address1");
            var edit_address2_field = document.getElementById("edit_asset_address2");
            var edit_country_field = document.getElementById("edit_asset_country");
            var edit_city_field = document.getElementById("edit_asset_city");
            var edit_state_field =  document.getElementById("edit_asset_state");
            var edit_static_state_field =  document.getElementById("edit_asset_state_static");

            document.getElementById("edit_location_number").value = num;

            var entered_country = country_field.value;
            var entered_country = all_countries.indexOf(entered_country);

            var entered_state = state_field.value;
            var entered_address1 = address1_field.value;
            var entered_address2 = address2_field.value;
            var e_country = country_field.value;
            var entered_city = city_field.value;

            edit_address1_field.value = entered_address1;
            edit_address2_field.value = entered_address2;
            edit_country_field.value = e_country;
            edit_city_field.value = entered_city;
            

            if(all_states[entered_country] == "<option class='select' value=''>Select a State/Province</option>"){
                $("#edit_asset_state_static").css("display","block");
                $("#edit_asset_state").css("display","none");
                $("#edit_asset_state").html("");

                $("#edit_asset_state_static").val(entered_state);
            }
            else{
                $("#edit_asset_state").css("display","block");
                $("#edit_asset_state").html(all_states[entered_country]);
                $("#edit_asset_state_static").css("display","none");
                
                $("#edit_asset_state").val(entered_state);
            }


            location_action();

        }
        function delete_location(num){

            // Loop Through Contact Information
            var contact_len = $("#contact_num").val();
            for(var c = 1; c <= contact_len; c++){
                var mod = "#contact_location_" + c;
                var len = $(mod).length;
                if(len != 0){
                    var v = $(mod).val();
                    if(v == num){
                        var moduled = "contact_module_" + c;
                        var sel = '[name="' + moduled + '"]';
                        $(sel).find("span.location_alert").css("display", "flex");

                        var myhidden = "#contact_location_" + c;
                        $(myhidden).val("0");

                        var dd = "#contact_location_entry_" + c;
                        $(dd).find(".location_display").html("ERROR - Missing Location");
                    }
                }
                else{
                    continue;
                }
            }

            // Loop Through Inspection Information
            var inspection_len = $("#inspection_num").val();
            for(var c = 1; c <= inspection_len; c++){
                var mod = "#inspection_location_" + c;
                var len = $(mod).length;
                if(len != 0){
                    var v = $(mod).val();
                    if(v == num){
                        var moduled = "inspection_module_" + c;
                        var sel = '[name="' + moduled + '"]';
                        $(sel).find("span.location_alert").css("display", "flex");
                        
                        var myhidden = "#inspection_location_" + c;
                        $(myhidden).val("0");

                        var dd = "#inspection_location_entry_" + c;
                        $(dd).find(".location_display").html("ERROR - Missing Location");
                    }
                }
                else{
                    continue;
                }
            }

            // Loop Through Removal Information
            var removal_len = $("#removal_num").val();
            for(var c = 1; c <= removal_len; c++){
                var mod = "#removal_location_" + c;
                var len = $(mod).length;
                if(len != 0){
                    var v = $(mod).val();
                    if(v == num){
                        var moduled = "removal_module_" + c;
                        var sel = '[name="' + moduled + '"]';
                        $(sel).find("span.location_alert").css("display", "flex");
                        
                        var myhidden = "#removal_location_" + c;
                        $(myhidden).val("0");

                        var dd = "#removal_location_entry_" + c;
                        $(dd).find(".location_display").html("ERROR - Missing Location");
                    }
                }
                else{
                    continue;
                }
            }


            var selector = "location_module_" + num;
            document.getElementsByName(selector)[0].remove();
            document.getElementById("add_location_details").style.display = "inline-block";

            location_action();
        }
        function add_location(event){
            event.preventDefault();

            var counter = document.getElementById("location_num");

            var parent = document.getElementById("location_list");
            var address1_field = document.getElementById("asset_address1");
            var address2_field = document.getElementById("asset_address2");
            var country_field = document.getElementById("asset_country");
            var city_field = document.getElementById("asset_city");
            var state_field = document.getElementById("asset_state");
            var static_state_field  = document.getElementById("asset_state_static");

            var state_field_disp = state_field.style.display;
            var static_state_field_disp = static_state_field.style.display;


            if(state_field_disp == "block"){
                var state_name = "asset_state";
            }
            else if(static_state_field_disp == "block"){
                var state_name = "asset_state_static";
            }
            var state_det_field = document.getElementById(state_name);

            var address1 = address1_field.value;
            var address2 = address2_field.value;
            var country = country_field.value;
            var city = city_field.value;
            var state = state_det_field.value;

            if(address1 == "" || country == "" || city == "" || state == ""){
                alert("Please complete the form");
                return;
            }

            var num = parseInt(counter.value) + 1;

            var list_num = document.getElementById("location_list").childElementCount;

            if(list_num > 4){
                document.getElementById("add_location_modal").style.display = "none";
                return;
            }

            counter.value = num;

            
            var address1_hidden = '<input type="hidden" name="location_address1_' + num + '" id="location_address1_' + num + '" value="' + address1 + '">';
            var address2_hidden = '<input type="hidden" name="location_address2_' + num + '" id="location_address2_' + num + '" value="' + address2 + '">';
            var country_hidden = '<input type="hidden" name="location_country_' + num + '" id="location_country_' + num + '" value="' + country + '">';
            var city_hidden = '<input type="hidden" name="location_city_' + num + '" id="location_city_' + num + '" value="' + city + '">';
            var state_hidden = '<input type="hidden" name="location_state_' + num + '" id="location_state_' + num + '" value="' + state + '">';

            var out_country = country_code_to_name(country);

            var out = '<li class="location_item" name="location_module_' + num + '"><span><strong>Address: </strong><span class="address" id="location_address1_entry_' + num + '">' + address1 + address1_hidden + '</span><strong>Address 2: </strong><span class="address" id="location_address2_entry_' + num + '">' + address2 + address2_hidden + '</span><strong>City: </strong><span class="city" id="location_city_entry_' + num + '">' + city + city_hidden + '</span><strong>State: </strong><span class="state" id="location_state_entry_' + num + '">' + state + state_hidden + '</span><strong>Country: </strong><span class="country" id="location_country_entry_' + num + '">' + out_country + country_hidden + '</span></span><span class="operations"><i class="fas fa-edit cursor_pointer" onClick="edit_location(' + num + ')"></i><i class="far fa-trash-alt cursor_pointer" onClick="delete_location(' + num + ')"></i></span></li>';

            parent.innerHTML += out;

            var line;

            if(address2 == ""){
                line = address1 + ', ' + city + ', ' + state + ', ' + country;
            }
            else{
                line = address1 + ', ' + address2 + ', ' + city + ', ' + state + ', ' + country;
            }

            location_addr[num] = line;

            // Close modal
            address1_field.value = "";
            address2_field.value = "";
            country_field.value = "";
            city_field.value = "";
            state_field.value = "";
            static_state_field.value = "";

            if(list_num >= 4){
                document.getElementById("add_location_details").style.display = "none";
            }
            document.getElementById("add_location_modal").style.display = "none";

            location_action();
        }
    </script>

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

        function get_location_list(){
            var loc_number = $("#location_num").val();
            
            // <option value="1">10137 Devonshire, South Lyon, MI, United States</option>
            var list = '<option value="">Choose Corresponding Asset Location</option>';

            for(var i =1; i<=loc_number; i++){
                var moduled = "location_module_" + i;
                var sel = '[name="' + moduled + '"]';
                var len = $(sel).length;
                if(len != 0){
                    var address1_selector = "#location_address1_" + i;
                    var address2_selector = "#location_address2_" + i;
                    var city_selector = "#location_city_" + i;
                    var state_selector = "#location_state_" + i;
                    var country_selector = "#location_country_" + i;


                    var address1 = $(address1_selector).val();
                    var address2 = $(address2_selector).val();
                    var city = $(city_selector).val();
                    var state = $(state_selector).val();
                    var country = $(country_selector).val();

                    var line = "";

                    if(address2 == ""){
                        line = '<option value="' + i + '">' + address1 + ', ' + city + ', ' + state + ', ' + country + '</option>';
                    }
                    else{
                        line = '<option value="' + i + '">' + address1 + ', ' + address2 + ', ' + city + ', ' + state + ', ' + country + '</option>';
                    }

                    list = list + line;
                }
                else{
                    continue;
                }
            }

            return list;
        }

        $("#add_registration_question").click(function(e){
            e.preventDefault();
            
            $(".add_question_modal").css("display", "block");
        });

        // Add Information Buttons
            // Add Asset Location Information
            // Add Inspection Information
            // Add Removal Information
            // Add Contact Information
        $("#add_location_details").click(function(e){
            e.preventDefault();
            $(".add_location_modal").css("display", "block");


            $(".country_drop").html(country_drop);

            $("#asset_country").val('US');
            
            $("#asset_state").css("display","block");
            $("#asset_state").html(all_states[0]);
            $("#asset_state_static").css("display","none");
        });
        $("#add_onsite_contact").click(function(e){
            e.preventDefault();
            
            var list = get_location_list();

            $("#contact_location").empty();

            $("#contact_location").append(list);

            $(".add_contact_modal").css("display", "block");
        });
        $("#add_removal_details").click(function(e){
            e.preventDefault();

            var list = get_location_list();

            $("#removal_location").empty();

            $("#removal_location").append(list);

            $(".add_removal_modal").css("display", "block");
        });
        $("#add_inspect_details").click(function(e){
            e.preventDefault();

            var list = get_location_list();

            $("#inspection_location").empty();

            $("#inspection_location").append(list);

            $(".add_inspection_modal").css("display", "block");
        });

        $("#asset_country").change(function(){
            var name = $(this).find('option:selected').attr("name");
            
            if(all_states[name] == "<option class='select' value=''>Select a State/Province</option>"){
                $("#asset_state_static").css("display","block");
                $("#asset_state").css("display","none");
                $("#asset_state").html("");
            }
            else{
                $("#asset_state").css("display","block");
                $("#asset_state").html(all_states[name]);
                $("#asset_state_static").css("display","none");
            }
        });


        $(".start_time_drop").html(start_time);
        $(".end_time_drop").html(end_time);

        var d = new Date();
        var y = d.getFullYear();
        var r = y+3;

        var range = "-80:" + r;

        $( ".date" ).datepicker({
            changeYear: true,
            changeMonth: true,
            yearRange: range,
            onSelect: function(dateText) {
                $(this).css("background-color", "whitesmoke");
            }
        });
        
        $( ".date_picker" ).datepicker({
            changeYear: true,
            changeMonth: true,
            yearRange: range,
            onSelect: function(dateText) {
                $(this).css("background-color", "whitesmoke");
            }
        });
            
        $(".country_drop").html(country_drop);
        
        $(".close_modal").click(function(e){
            e.preventDefault();
            
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

            $("#inspection_date").val("");
            $("#inspection_start_time").val("");
            $("#inspection_end_time").val("");
            $("#inspection_location").val("");

            $("#removal_date").val("");
            $("#removal_start_time").val("");
            $("#removal_end_time").val("");
            $("#removal_location").val("");

            $("#contact_name").val("");
            $("#contact_phone").val("");
            $("#contact_location").val("");

            $("#registration_question").val("");
        });

        $(".house_node").click(function(){
            var img = $(this).find("img");
            var house_id = img.attr("name");

            var closure = img.css("display");


            // Add to list - not checked
            if(closure == "none"){
                var orig = $("#active_house_accounts").val();

                var output = orig + house_id + "||";

                $("#active_house_accounts").val(output);

                img.css("display", "block");
            }
            else{
                var orig = $("#active_house_accounts").val();

                var sub = "||" + house_id + "||";

                var output = orig.replace(sub, "||");

                $("#active_house_accounts").val(output);

                img.css("display", "none");
            }

        });
    </script>


<script src="../js/validators/catalog_creation.js"></script>