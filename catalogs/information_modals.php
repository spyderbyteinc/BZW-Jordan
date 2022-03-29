
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
                <div class="col1 modal_action_button_container">
                    <a href="#" class="bidzbutton devart"  id="submit_contact_form">Add Onsite Contact</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                    
                    <a href="#" class="bidzbutton red reset_form"><i class="fas fa-undo-alt"></i> Reset Form</a>
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
                <div class="col1 modal_action_button_container">
                    <a href="#" class="bidzbutton devart" id="save_edit_contact">Edit Onsite Contact</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                    
                    <a href="#" class="bidzbutton red reset_form"><i class="fas fa-undo-alt"></i> Reset Form</a>
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
                <div class="col1 modal_action_button_container">
                    <a href="#" class="bidzbutton devart"  id="submit_inspection_form">Add Inspection Information</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                    
                    <a href="#" class="bidzbutton red reset_form"><i class="fas fa-undo-alt"></i> Reset Form</a>
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
                <div class="col1 modal_action_button_container">
                    <a href="#" class="bidzbutton devart"  id="save_edit_inspection">Edit inspection Information</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>

                    <a href="#" class="bidzbutton red reset_form"><i class="fas fa-undo-alt"></i> Reset Form</a>
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
                <div class="col1 modal_action_button_container">
                    <a href="#" class="bidzbutton devart"  id="submit_removal_form">Add Removal Information</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                    
                    <a href="#" class="bidzbutton red reset_form"><i class="fas fa-undo-alt"></i> Reset Form</a>
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
                <div class="col1 modal_action_button_container">
                    <a href="#" class="bidzbutton devart"  id="save_edit_removal">Edit Removal Information</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                    
                    <a href="#" class="bidzbutton red reset_form"><i class="fas fa-undo-alt"></i> Reset Form</a>
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
                <div class="col1 modal_action_button_container">
                    <a href="#" class="bidzbutton devart" id="submit_location_form">Add Location Information</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>

                    <a href="#" class="bidzbutton red reset_form"><i class="fas fa-undo-alt"></i> Reset Form</a>
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
                <div class="col1 modal_action_button_container">
                    <a href="#" class="bidzbutton devart" id="save_edit_location">Edit Location Information</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>

                    <a href="#" class="bidzbutton red reset_form"><i class="fas fa-undo-alt"></i> Reset Form</a>
                </div>
            </div>
        </div>
    </div>
