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
                <div class="add_button">
                    <a href="#" id="add_location_details" class="bidzbutton"><i class="fas fa-plus"></i> Add Asset Location Information</a>
                    <ul id="location_list">
                        
                    </ul>
                </div>
            </div>
            
            <h4 class="sign_heading"><span>Miscellaneous Details</span></h4>

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
                <div class="add_button">
                    <a href="#" id="add_inspect_details" class="bidzbutton"><i class="fas fa-plus"></i> Add Inspection Information</a>

                    <ul id="inspection_list">
                        
                    </ul>
                </div>
            </div>

            
            <h4 class="sign_heading"><span>Removal Dates and Times</span></h4>

                
            <p class="sign_up_disclaimer">Removal time and date is based on asset location</p>

            <div class="removal_area">
                <div class="add_button">
                    <a href="#" id="add_removal_details" class="bidzbutton"><i class="fas fa-plus"></i> Add Removal Information</a>
                    <ul id="removal_list">
                    
                    </ul>
                </div>
            </div>
            

            
            <h4 class="sign_heading"><span>Onsite Contact Information</span></h4>

            <div class="contact_area">
                <div class="add_button">
                    <a href="#" id="add_onsite_contact" class="bidzbutton"><i class="fas fa-plus"></i> Add Contact Information</a>
                    <ul id="contact_list">
                        
                    </ul>
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

    <!-- Contact Information -->
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

            <input type="hidden" name="edit_contact_number" id="edit_contact_number" value="">
            
            <div class="catalog_row signup_row operations">
                <div class="col1">
                    <a href="#" class="bidzbutton devart" onClick="save_edit_contact(event)">Edit Onsite Contact</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="contact_num" id="contact_num" value="0">

    <script>

        function save_edit_contact(event){
            event.preventDefault();

            var edit_name_field = document.getElementById("edit_contact_name");
            var edit_phone_field = document.getElementById("edit_contact_phone");

            var number = document.getElementById("edit_contact_number").value;

            var new_name = edit_name_field.value;
            var new_phone = edit_phone_field.value;

            
            var hidden_name_selector = "contact_name_" + number;
            var hidden_phone_selector = "contact_phone_" + number;

            var contact_name_entry = "contact_name_entry_" + number;
            var contact_phone_entry = "contact_phone_entry_" + number;

            // Output fields
            var hidden_name_field  = document.getElementById(hidden_name_selector);
            var hidden_phone_field = document.getElementById(hidden_phone_selector);
            var contact_name_field = document.getElementById(contact_name_entry);
            var contact_phone_field = document.getElementById(contact_phone_entry);

            hidden_name_field.value = new_name;
            hidden_phone_field.value = new_phone;
            
            var name_hidden = '<input type="hidden" name="contact_name_' + number + '" id="contact_name_' + number + '" value="' + new_name + '">';
            var phone_hidden = '<input type="hidden" name="contact_phone_' + number + '" id="contact_phone_' + number + '" value="' + new_phone + '">';

            contact_name_field.innerHTML = new_name + name_hidden;
            contact_phone_field.innerHTML = new_phone + phone_hidden;
            
            var edit_modal = document.getElementById("edit_contact_modal");
            edit_modal.style.display = "none";
        }

        function edit_contact(num){
            var edit_modal = document.getElementById("edit_contact_modal");
            edit_modal.style.display = "block";

            var name_selector = "contact_name_" + num;
            var phone_selector = "contact_phone_" + num;

            var name_field = document.getElementById(name_selector);
            var phone_field = document.getElementById(phone_selector);


            var edit_name_field = document.getElementById("edit_contact_name");
            var edit_phone_field = document.getElementById("edit_contact_phone");
           
            document.getElementById("edit_contact_number").value = num;

            var entered_name = name_field.value;
            var entered_phone = phone_field.value;

            edit_name_field.value = entered_name;
            edit_phone_field.value = entered_phone;
            
        }

        function delete_contact(num){
            var selector = "contact_module_" + num;
            document.getElementsByName(selector)[0].remove();

            document.getElementById("add_onsite_contact").style.display = "inline-block";
            
        }
        function add_contact(event){
            event.preventDefault();

            var counter = document.getElementById("contact_num")

            var parent = document.getElementById("contact_list");
            var name_field = document.getElementById("contact_name");
            var phone_field = document.getElementById("contact_phone");

            var name = name_field.value;
            var phone = phone_field.value;
            
            if(name == "" || phone == ""){
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

            var out = '<li class="contact_item" name="contact_module_' + num + '"><span><strong>Name: </strong><span class="name" id="contact_name_entry_' + num + '">' + name + name_hidden + '</span><strong>Phone: </strong><span class="phone" id="contact_phone_entry_' + num + '">' + phone + phone_hidden + '</span></span> <span class="operations"><i class="fas fa-edit cursor_pointer" onClick="edit_contact(' + num + ')"></i><i class="far fa-trash-alt cursor_pointer" onClick="delete_contact(' + num + ')"></i></span></li>';

            parent.innerHTML += out;

            // Close modal
            name_field.value = "";
            phone_field.value = "";

            
            if(list_num >= 9){
                document.getElementById("add_onsite_contact").style.display = "none";
            }
            document.getElementById("add_contact_modal").style.display = "none";
        }
    </script>

    <!-- Inspection Information -->

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
            
            <input type="hidden" name="edit_inspection_number" id="edit_inspection_number" value="">

            <div class="catalog_row signup_row operations">
                <div class="col1">
                    <a href="#" class="bidzbutton devart" onClick="save_edit_inspection(event)">Edit inspection Information</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="inspection_num" id="inspection_num" value="0">
    
    <script>
        function delete_inspection(num){
            var selector = "inspection_module_" + num;
            document.getElementsByName(selector)[0].remove();
            document.getElementById("add_inspect_details").style.display = "inline-block";
        }
        function add_inspection(event){
            event.preventDefault();

            var counter = document.getElementById("inspection_num");

            var parent = document.getElementById("inspection_list");
            var date_field = document.getElementById("inspection_date");
            var start_field = document.getElementById("inspection_start_time");
            var end_field = document.getElementById("inspection_end_time");

            var date = date_field.value;
            var start_time = start_field.value;
            var end_time = end_field.value;

            if(date == "" || start_time == "" || end_time == ""){
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

            var out_start = mil_time_to_disp(start_time);
            var out_end = mil_time_to_disp(end_time);

            var out = '<li class="inspection_item" name="inspection_module_' + num + '"><span><strong>Date: </strong><span class="date" id="inspection_date_entry_' + num + '">' + date + date_hidden + '</span><strong>Start Time: </strong><span class="time" id="inspection_start_entry_' + num + '">' + out_start + start_hidden + '</span><strong>End Time: </strong><span class="time" id="inspection_end_entry_' + num + '">' + out_end + end_hidden + '</span></span><span class="operations"><i class="fas fa-edit cursor_pointer" onClick="edit_inspection(' + num + ')"></i><i class="far fa-trash-alt cursor_pointer" onClick="delete_inspection(' + num + ')"></i></span></li>';

            parent.innerHTML += out;

            // Close modal
            date_field.value = "";
            start_field.value = "";
            end_field.value = "";
            
            if(list_num >= 9){
                document.getElementById("add_inspect_details").style.display = "none";
            }
            document.getElementById("add_inspection_modal").style.display = "none";
        }
        function save_edit_inspection(event){
            event.preventDefault();

            var edit_date_field = document.getElementById("edit_inspection_date");
            var edit_start_field = document.getElementById("edit_inspection_start_time");
            var edit_end_field = document.getElementById("edit_inspection_end_time");

            var number = document.getElementById("edit_inspection_number").value;

            var new_date  = edit_date_field.value;
            var new_start = edit_start_field.value;
            var new_end = edit_end_field.value;

            var hidden_date_selector = "inspection_date_" + number;
            var hidden_start_selector = "inspection_start_" + number;
            var hidden_end_selector = "inspection_end_" + number;

            var inspection_date_entry = "inspection_date_entry_" + number;
            var inspection_start_entry = "inspection_start_entry_" + number;
            var inspection_end_entry  = "inspection_end_entry_" + number;

            // Output Fields
            var hidden_date_field = document.getElementById(hidden_date_selector);
            var hidden_start_field = document.getElementById(hidden_start_selector);
            var hidden_end_field = document.getElementById(hidden_end_selector);

            var inspection_date_field = document.getElementById(inspection_date_entry);
            var inspection_start_field = document.getElementById(inspection_start_entry);
            var inspection_end_field = document.getElementById(inspection_end_entry);

            hidden_date_field.value = new_date;
            hidden_start_field.value = new_start;
            hidden_end_field.value = new_end;

            
            var date_hidden = '<input type="hidden" name="inspection_date_' + number + '" id="inspection_date_' + number + '" value="' + new_date + '">';
            var start_hidden = '<input type="hidden" name="inspection_start_' + number + '" id="inspection_start_' + number + '" value="' + new_start + '">';
            var end_hidden = '<input type="hidden" name="inspection_end_' + number + '" id="inspection_end_' + number + '" value="' + new_end + '">';

            var out_start = mil_time_to_disp(new_start);
            var out_end = mil_time_to_disp(new_end);

            inspection_date_field.innerHTML = new_date + date_hidden;
            inspection_start_field.innerHTML = out_start + start_hidden;
            inspection_end_field.innerHTML = out_end + end_hidden;

            var edit_modal = document.getElementById("edit_inspection_modal");
            edit_modal.style.display = "none";
        }
        function edit_inspection(num){
            var edit_modal = document.getElementById("edit_inspection_modal");
            edit_modal.style.display = "block";

            var date_selector = "inspection_date_" + num;
            var start_selector = "inspection_start_" + num;
            var end_selector = "inspection_end_" + num;

            var date_field = document.getElementById(date_selector);
            var start_field =  document.getElementById(start_selector);
            var end_field =  document.getElementById(end_selector);

            var edit_date_field =  document.getElementById("edit_inspection_date");
            var edit_start_field =  document.getElementById("edit_inspection_start_time");
            var edit_end_field =  document.getElementById("edit_inspection_end_time");

            document.getElementById("edit_inspection_number").value = num;
            
            var entered_date = date_field.value;
            var entered_start = start_field.value;
            var entered_end = end_field.value;

            edit_date_field.value = entered_date;
            edit_start_field.value = entered_start;
            edit_end_field.value = entered_end;

        }
    </script>

    <!-- Removal Information -->
    
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
            
            <input type="hidden" name="edit_removal_number" id="edit_removal_number" value="">

            <div class="catalog_row signup_row operations">
                <div class="col1">
                    <a href="#" class="bidzbutton devart" onClick="save_edit_removal(event)">Edit Removal Information</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="removal_num" id="removal_num" value="0">

    <script>
        function delete_removal(num){
            var selector = "removal_module_" + num;
            document.getElementsByName(selector)[0].remove();
            document.getElementById("add_removal_details").style.display = "inline-block"
        }
        function save_edit_removal(event){
            event.preventDefault();

            var edit_date_field = document.getElementById("edit_removal_date");
            var edit_start_field = document.getElementById("edit_removal_start_time");
            var edit_end_field = document.getElementById("edit_removal_end_time");

            var number = document.getElementById("edit_removal_number").value;

            var new_date  = edit_date_field.value;
            var new_start = edit_start_field.value;
            var new_end = edit_end_field.value;

            var hidden_date_selector = "removal_date_" + number;
            var hidden_start_selector = "removal_start_" + number;
            var hidden_end_selector = "removal_end_" + number;

            var removal_date_entry = "removal_date_entry_" + number;
            var removal_start_entry = "removal_start_entry_" + number;
            var removal_end_entry  = "removal_end_entry_" + number;

            // Output Fields
            var hidden_date_field = document.getElementById(hidden_date_selector);
            var hidden_start_field = document.getElementById(hidden_start_selector);
            var hidden_end_field = document.getElementById(hidden_end_selector);

            var removal_date_field = document.getElementById(removal_date_entry);
            var removal_start_field = document.getElementById(removal_start_entry);
            var removal_end_field = document.getElementById(removal_end_entry);

            hidden_date_field.value = new_date;
            hidden_start_field.value = new_start;
            hidden_end_field.value = new_end;

            
            var date_hidden = '<input type="hidden" name="removal_date_' + number + '" id="removal_date_' + number + '" value="' + new_date + '">';
            var start_hidden = '<input type="hidden" name="removal_start_' + number + '" id="removal_start_' + number + '" value="' + new_start + '">';
            var end_hidden = '<input type="hidden" name="removal_end_' + number + '" id="removal_end_' + number + '" value="' + new_end + '">';

            var out_start = mil_time_to_disp(new_start);
            var out_end = mil_time_to_disp(new_end);

            removal_date_field.innerHTML = new_date + date_hidden;
            removal_start_field.innerHTML = out_start + start_hidden;
            removal_end_field.innerHTML = out_end + end_hidden;

            var edit_modal = document.getElementById("edit_removal_modal");
            edit_modal.style.display = "none";
        }
        function edit_removal(num){
            var edit_modal = document.getElementById("edit_removal_modal");
            edit_modal.style.display = "block";

            var date_selector = "removal_date_" + num;
            var start_selector = "removal_start_" + num;
            var end_selector = "removal_end_" + num;

            var date_field = document.getElementById(date_selector);
            var start_field =  document.getElementById(start_selector);
            var end_field =  document.getElementById(end_selector);

            var edit_date_field =  document.getElementById("edit_removal_date");
            var edit_start_field =  document.getElementById("edit_removal_start_time");
            var edit_end_field =  document.getElementById("edit_removal_end_time");

            document.getElementById("edit_removal_number").value = num;
            
            var entered_date = date_field.value;
            var entered_start = start_field.value;
            var entered_end = end_field.value;

            edit_date_field.value = entered_date;
            edit_start_field.value = entered_start;
            edit_end_field.value = entered_end;

        }
        function add_removal(event){
            event.preventDefault();

            var counter = document.getElementById("removal_num");

            var parent = document.getElementById("removal_list");
            var date_field = document.getElementById("removal_date");
            var start_field = document.getElementById("removal_start_time");
            var end_field = document.getElementById("removal_end_time");

            var date = date_field.value;
            var start_time = start_field.value;
            var end_time = end_field.value;

            if(date == "" || start_time == "" || end_time == ""){
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

            var out_start = mil_time_to_disp(start_time);
            var out_end = mil_time_to_disp(end_time);

            var out = '<li class="removal_item" name="removal_module_' + num + '"><span><strong>Date: </strong><span class="date" id="removal_date_entry_' + num + '">' + date + date_hidden + '</span><strong>Start Time: </strong><span class="time" id="removal_start_entry_' + num + '">' + out_start + start_hidden + '</span><strong>End Time: </strong><span class="time" id="removal_end_entry_' + num + '">' + out_end + end_hidden + '</span></span><span class="operations"><i class="fas fa-edit cursor_pointer" onClick="edit_removal(' + num + ')"></i><i class="far fa-trash-alt cursor_pointer" onClick="delete_removal(' + num + ')"></i></span></li>';

            parent.innerHTML += out;

            // Close modal
            date_field.value = "";
            start_field.value = "";
            end_field.value = "";
            
            if(list_num >= 9){
                document.getElementById("add_removal_details").style.display = "none";
            }
            document.getElementById("add_removal_modal").style.display = "none";
        }
    </script>
    
    
    <!-- Location Information -->

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

    <input type="hidden" name="location_num" id="location_num" value="0">

    <script>
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


        }
        function delete_location(num){
            var selector = "location_module_" + num;
            document.getElementsByName(selector)[0].remove();
            document.getElementById("add_location_details").style.display = "inline-block";
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
            $time_sql = "SELECT * FROM `time`";
            $time_result = mysqli_query($conn, $time_sql);
            while($row = mysqli_fetch_assoc($time_result)){
                $line = $row['military_time'] . "||" . $row['display_time'];
                ?>
                times.push("<?php echo $line; ?>");
                <?php
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