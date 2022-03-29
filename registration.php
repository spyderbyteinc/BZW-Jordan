<?php include "includes/header.php"; ?>
<?php include "includes/connect.php"; ?>

<?php if($logged_in == true){
    ?>
    <script>
        window.location = "index.php";
    </script>
    <?php
}
?>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>

<script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('recaptcha', {
            'sitekey' : '6LdxlboUAAAAAPvygVqDufSpAPVlCojmVBUUF9Ai',
            'callback' : correctCaptcha
        });
      };
      var correctCaptcha = function(response) {
             document.getElementById('recaptcha_confirmed').value='yes';
         };

    window.onload = function() {
        var $recaptcha = document.querySelector('#g-recaptcha-response');

        if($recaptcha) {
            $recaptcha.setAttribute("required", "required");
        }
    };
    </script>

<div id="termsandconditions_modal_container">
    <div id="termsandconditions_modal" class="modal">
        <h4>Terms and Conditions</h4>

        <div id="terms">
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
            <p>Hello World</p>
        </div>

        <div class="button"><a href="#" class="bidzbutton orange" id="close_terms">Close</a></div>
    </div>
</div>

<section class="registration_section" id="registration_form">
    <h2 class="auctions section_heading"><span>Create BidZWon Account</span></h2>

    <form action="<?php echo $root; ?>processes/process_registration.php" method="post" name="sign_up_form" id="sign_up_form" enctype="multipart/form-data">
      
        <div id="sign_up_container">

            <h4 class="sign_heading"><span>Account Type</span></h4>

            <div class="signup_row">
                <p class="registration_disclaimer">Please choose the type of account that you wish to create</p>
            </div>
                
            <br>
                
            <fieldset id="account_type_radio_box">
                <div class="signup_row">
                    <div class="account_type_radio">
                        <input type="radio" name="type" id="buyer_type" value="buyer" checked> Buyer
                        <input type="radio" name="type" id="buysell_type" value="buysell"> Buyer & Seller
                    </div>
                </div>
            </fieldset>
            
            <div class="signup_row">
                <p class="registration_disclaimer account_type_disclaimer" id="more_type_requirements">There are optional fields at the bottom of this form</p>
            </div>
            
            <div class="signup_row">
                <p class="registration_disclaimer account_type_disclaimer">NOTE: Your account can be upgraded to include selling privledges at any time</p>
            </div>
            
            
            <h4 class="sign_heading"><span>Company Registration</span></h4>

            <div class="signup_row">
                <p class="registration_disclaimer account_type_disclaimer">Are you registering as a company?</p>
            </div>
                
                <br>
                    
            <fieldset id="company_radio_box">
                <div class="signup_row">
                    <div class="account_type_radio">
                        <input type="radio" name="company" id="comp_yes" value="comp_yes"> Yes
                        <input type="radio" name="company" id="comp_no" value="comp_no" checked> No
                    </div>
                </div>
            </fieldset>
            
            <div class="signup_row">
                <p class="registration_disclaimer account_type_disclaimer" id="more_company_requirements">There is additional information required at the bottom of this form</p>
            </div>

            <h4 class="sign_heading"><span>Personal Information</span></h4>
            
            <div class="signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="first_name" class="input_label">First Name <span class="required">*</span></label>
                        <input type="text" class="input_text" name="first_name" id="first_name" placeholder="First Name">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="last_name" class="input_label">Last Name <span class="required">*</span></label>
                        <input type="text" class="input_text"  name="last_name" id="last_name" placeholder="Last Name">
                    </div>
                </div>
            </div>

            
            <div class="signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="country_code" class="input_label">Phone Country Code</label>
                        <select class="input_text input_select" name="country_code" id="country_code">
                            <option class="select" value="">Select Your Country Code</option>
                            <?php
                                $country_code_SQL = "SELECT * FROM countries";
                                $country_code_result = mysqli_query($conn, $country_code_SQL);
                                while($row = mysqli_fetch_assoc($country_code_result)) : ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['country_name']; ?> (<?php echo $row['phone_code']; ?>)</option>
                            <?php endwhile ; ?>
                        </select>
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="phoneNumber" class="input_label">Phone Number <span class="required">*</span></label>
                        <input type="text" pattern="\d*" step="1" class="input_text"  name="phoneNumber" id="phoneNumber"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Phone Number">
                    </div>
                </div>
            </div>
            
            <div class="signup_row">
                <div class="pretty p-default checkbox-center">
                    <input type="checkbox" id="age_confirmation" />
                    <div class="state p-primary">
                        <label class="font_reset">Please confirm that you are at least <span class="bold">18 years of age</span> at time of registration</label>
                    </div>
                </div>
            </div>

            <input type="hidden" name="age_confirmation_check" id="age_confirmation_check" value="0">

            <div class="signup_row">
                <p class="registration_disclaimer account_type_disclaimer" id="age_requirements">You must be 18 years or older to register with us</p>
            </div>

            <input type="hidden" name="age_check" id="age_check" value="0">
            
            <h4 class="sign_heading"><span>Account Address</span></h4>


            <div class="signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="address1" class="input_label">Address Line 1 <span class="required">*</span></label>
                        <input type="text" class="input_text" name="address1" id="address1" placeholder="Address Line 1">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="address2" class="input_label">Address Line 2</label>
                        <input type="text" class="input_text"  name="address2" id="address2" placeholder="Address Line 2">
                    </div>
                </div>
            </div>

            <div class="signup_row">
                <div class="col3">
                    <div class="signup_group">
                        <label for="country" class="input_label">Country <span class="required">*</span></label>
                        <select class="country_drop_residence country_drop input_text input_select" name="country" id="country">
                            <option value="">Select a Country</option>
                        </select>
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="city" class="input_label">City <span class="required">*</span></label>
                        <input type="text" class="input_text" name="city" id="city" placeholder="City">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="state" class="input_label">State / Province <span class="required">*</span></label>
                        <select class="state_drop_residence input_text input_select res_state" name="state" id="state">
                            <option class="select" value="">Select a State/Province</option>
                        </select>
                        <input style="display:none;" type="text" class="state_residence_static input_text res_state" name="state2" id="state2" placeholder="State / Province">
                    </div>
                </div>
            </div>

            
            <h4 class="sign_heading"><span>Username and Password</span></h4>

            <div class="signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="username" class="input_label">Username <span class="required">*</span></label>
                        <input type="text" class="input_text" name="username" id="username" placeholder="Username">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="email" class="input_label">Email Address <span class="required">*</span></label>
                        <input type="email" class="input_text"  name="email" id="email" placeholder="Email Address">
                    </div>
                </div>
            </div>
            

            <div class="signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="password" class="input_label">Create Password <span class="required">*</span></label>
                        <input type="password" class="input_text" name="password" id="password" placeholder="Password">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="confirm" class="input_label">Confirm Password <span class="required">*</span></label>
                        <input type="password" class="input_text"  name="confirm" id="confirm" placeholder="Confirm Password">
                    </div>
                </div>
            </div>

            
            <div class="signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="question1" class="input_label">Security Question 1 <span class="required">*</span></label>
                        <select class="input_text input_select" name="question1" id="question1">
                            <option value="">Select a Security Question</option>
                            <?php
                                $security1_SQL = "SELECT * FROM security_question1";
                                $security1_Result = mysqli_query($conn, $security1_SQL);
                                while($row = mysqli_fetch_assoc($security1_Result)) : ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['question']; ?></option>
                                <?php endwhile ; ?>
                        </select>
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="answer1" class="input_label">Security Answer 1 <span class="required">*</span></label>
                        <input type="text" class="input_text"  name="answer1" id="answer1" placeholder="Answer to Security Question">
                    </div>
                </div>
            </div>
            
            <div class="signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="question2" class="input_label">Security Question 2 <span class="required">*</span></label>
                        <select class="input_text input_select" name="question2" id="question2">
                            <option value="">Select a Security Question</option>
                            <?php
                                $security2_SQL = "SELECT * FROM security_question2";
                                $security2_Result = mysqli_query($conn, $security2_SQL);
                                while($row = mysqli_fetch_assoc($security2_Result)) : ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['question']; ?></option>
                                <?php endwhile ; ?>
                        </select>
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="answer2" class="input_label">Security Answer 2 <span class="required">*</span></label>
                        <input type="text" class="input_text"  name="answer2" id="answer2" placeholder="Answer to Security Question">
                    </div>
                </div>
            </div>

            <div id="company_information">

                <h4 class="sign_heading"><span>Company Information</span></h4>

                    
                    
                <div class="signup_row">
                    <div class="col2">
                        <div class="signup_group">
                            <label for="company_name" class="input_label">Company Name <span class="required">*</span></label>
                            <input type="text" class="input_text" name="company_name" id="company_name" placeholder="Company Name">
                        </div>
                    </div>
                    <div class="col2">
                        <div class="signup_group">
                            <label for="company_website" class="input_label">Company Website</label>
                            <input type="text" class="input_text"    name="company_website" id="company_website" placeholder="Company Website">
                        </div>
                    </div>
                </div>

                
                <div class="signup_row">
                    <div class="col3">
                        <div class="signup_group">
                            <label for="company_ein" class="input_label">Company EIN</label>
                            <input type="text" class="input_text"    name="company_ein" id="company_ein" placeholder="Company EIN">
                        </div>
                    </div>
                    <div class="col3">
                        <div class="signup_group">
                            <label for="company_phone" class="input_label">Company Phone Number</label>
                            <input type="text" class="input_text"    name="company_phone" id="company_phone" placeholder="Company Phone Number">
                        </div>
                    </div>
                    <div class="col3">
                        <div class="signup_group">
                                <label for="company_non_profit" class="input_label">Is Your Organization Non-Profit?</label>
                            <select class="input_text input_select" name="company_non_profit" id="company_non_profit">
                                <option value="">Non-Profit?</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                </div>  
            </div>

            <div id="seller_information">

                <h4 class="sign_heading"><span>Seller Information</span></h4>

                <div class="signup_row">
                    <p class="registration_disclaimer logo_disclaimer">If you would like your company logo to appear on your catalogs, upload it here. This is optional, but recommended.</p>
                </div>
            
                <div class="signup_row">
                    <div class="col1">
                        <div class="signup_group">
                            <input type="file" class="" accept=".jpg,.jpeg,.png,.JPG,.JPEG,.PNG"    name="company_logo" id="company_logo" placeholder="">
                        </div>
                    </div>
                </div>

                <div class="sign_up_row align_center">
                    <img src="#" alt="Your Image" id="logo_preview">
                </div>

                <div class="signup_row">
                    
                    <p class="registration_disclaimer logo_disclaimer">If you are affiliated with other organizations, please specify below (maximum of 3).</p>

                    
                </div>
                
                <div class="signup_row mar_top25">
                    <div class="col3">
                        <div class="signup_group">
                            <label for="affiliation1" class="input_label">Affiliation 1</label>
                            <input type="text" class="input_text" name="affiliation1" id="affiliation1" placeholder="Affiliation Name">
                        </div>
                    </div>
                    <div class="col3">
                        <div class="signup_group">
                            <label for="affiliation2" class="input_label">Affiliation 2</label>
                            <input type="text" class="input_text"  name="affiliation2" id="affiliation2" placeholder="Affiliation Name">
                        </div>
                    </div>
                    <div class="col3">
                        <div class="signup_group">
                            <label for="affiliation3" class="input_label">Affiliation 3</label>
                            <input type="text" class="input_text"  name="affiliation3" id="affiliation3" placeholder="Affiliation Name">
                        </div>
                    </div>
                </div>
                    
                <div class="signup_row mar_top25">
                    <div class="col1">
                        <div class="signup_group">
                            <label for="what_selling" class="input_label">OPTIONAL: What Are You Planning on Selling?</label>
                            <textarea class="input_text" name="what_selling" id="what_selling" rows="3" placeholder="What are you planning on selling?"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            
            <h4 class="sign_heading"><span>Legal</span></h4>

            
            <div class="signup_row">
                <div class="pretty p-default checkbox-center" id="terms_agree">
                    <input type="checkbox" id="condition_agreement"/>
                    <div class="state p-primary">
                        <label class="font_reset">I agree to the terms and conditions</label> <span class="required small">*</span>
                    </div>
                </div>

                <div id="terms_link"><a href="#" class="terms_link" id="show_terms">View Terms and Conditions</a></div>
            </div>

            
            <input type="hidden" name="residential_state_det" id="residential_state_det" value="0"/>
            
            <div class="signup_row">
                <div id="recaptcha"></div>
                <input type="hidden" id="recaptcha_confirmed" name="recaptcha_confirmed" value="no">
            </div>
            
            <div class="signup_row">
                <div class="pretty p-default checkbox-center">
                    <input type="checkbox" id="remember_me" />
                    <div class="state p-primary">
                        <label class="font_reset"><span class="bold">Remember me</span> on this computer</label>
                    </div>
                </div>
            </div>

            
            <input type="hidden" id="remember_me_checkbox" name="remember_me_checkbox" value="0"/>

            <input type="hidden" name="confirm_registration" id="confirm_registration" value="1"/>

            <div class="signup_row">
                <p id="finished_seller" class="registration_disclaimer logo_disclaimer">After you have created your account, we will review your information in order for you to be approved to sell on BidZWon. Thank you.</p>
            </div>

            <div class="signup_row">
                <a  type="submit" class="fancy-submit fancy-button bg-gradient1 cursor_pointer" style="margin:auto;" href="javascript: validate_registration();" id="create_account_submit" disabled><span>Create Account</span></a>
            </div>
        </div>
    </form>
</section>


<?php include "includes/footer.php"; ?>

<script>

    $("#remember_me").change(function(){
        if($("#remember_me").is(":checked")){
            $("#remember_me_checkbox").val("1");
        }
        else{
            $("#remember_me_checkbox").val("0");
        }
    });

    $("#age_confirmation").change(function(){
        if($("#age_confirmation").is(":checked")){
            $("#age_confirmation_check").val("1");
        }
        else{
            $("#age_confirmation_check").val("0");
        }
    });

    $("#country_code").val("1");

    
    $(".country_drop").html(country_drop);

    $(".country_drop_residence").val('US');

    $(".state_drop_residence").css("display","block");
    $(".state_drop_residence").html(all_states[0]);
    $(".state_residence_static").css("display","none");


    $(document).ready(function(){

        $(".country_drop_residence").change(function(){
            var name = $(this).find('option:selected').attr("name");

            if(all_states[name] == "<option class='select' value=''>Select a State/Province</option>"){
                $(".state_residence_static").css("display","block");
                $(".state_drop_residence").css("display","none");
                $(".state_drop_residence").html("");
            }
            else{
                $(".state_drop_residence").css("display","block");
                $(".state_drop_residence").html(all_states[name]);
                $(".state_residence_static").css("display","none");
            }
        });
        
        $('#company_radio_box input[type=radio]').change(function(){
            var sel = $(this).val();

            if(sel == "comp_yes"){
                $("#company_information").show();
                $("#more_company_requirements").show();
            }
            else{
                $("#company_information").hide();
                $("#more_company_requirements").hide();
            }
        });


        $('#account_type_radio_box input[type=radio]').change(function(){
            var sel = $(this).val();

            if(sel == "buysell"){
                $("#seller_information").show();
                $("#finished_seller").show();
                $("#more_type_requirements").show();
            }
            else{
                $("#seller_information").hide();
                $("#finished_seller").hide();
                $("#more_type_requirements").hide();
            }
        });

        
        $( ".datepicker" ).datepicker({
            changeYear: true,
            changeMonth: true,
            yearRange: "-80:",
            onSelect: function(dateText) {
                $(this).css("background-color", "whitesmoke");

                var today = new Date();
                var birthDate = new Date(dateText);
                
                var age = today.getFullYear() - birthDate.getFullYear();
                var m = today.getMonth() - birthDate.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                
                if(age < 18){
                    $("#age_requirements").show();
                    $("#age_check").val(0);
                }
                else{
                    $("#age_requirements").hide();
                    $("#age_check").val(1);
                }
            }
        });
    });

    $("#logo_preview").hide();

    function readURL(input) {
        if (input.files && input.files[0]) {
            
            $("#logo_preview").show();

            var reader = new FileReader();
            
            reader.onload = function(e) {
            $('#logo_preview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#company_logo").change(function() {
        readURL(this);
    });

    $("#close_terms").click(function(e){
        e.preventDefault();

        $("#termsandconditions_modal_container").css("display", "none");
    
        $("#terms_agree").css("display", "block");
        $("#terms_link").css("display", "none");
    });

    $("#show_terms").click(function(e){
        e.preventDefault();

        $("#termsandconditions_modal_container").css("display", "block");
    });
</script>
<script src="js/validators/registration.js"></script>