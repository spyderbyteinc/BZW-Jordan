<?php include "includes/header.php"; ?>
<?php include "includes/connect.php"; ?>

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

<section class="sign_up_section" id="sign_up_form">
    <h2 class="auctions section_heading"><span>Create Buyer Account</span></h2>

      <form action="<?php echo $root; ?>processes/process_sign_up.php" method="post" name="sign_up_form" id="sign_up_form">
        <div id="sign_up_container">

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
                <div class="pretty p-default checkbox-center">
                    <input type="checkbox" id="company_check"/>
                    <div class="state p-primary">
                        <label class="font_reset">Check box if you are registering under a company name</label>
                    </div>
                </div>
            </div>
            
            <div class="signup_row company_details">
                <div class="col3">
                    <div class="signup_group">
                        <label for="company" class="input_label">Company Name <span class="required">*</span></label>
                        <input type="text" class="input_text" name="company" id="company" placeholder="Company Name">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="company_website" class="input_label">Company Website</label>
                        <input type="text" class="input_text"  name="company_website" id="company_website" placeholder="Company Website">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="tax_number" class="input_label">Tax ID No. (EIN)</label>
                        <input type="text" class="input_text"  name="tax_number" id="tax_number" placeholder="Tax Number">
                    </div>
                </div>
            </div>


            <div class="signup_row">
                <div class="col3">
                    <div class="signup_group">
                        <label for="country_code" class="input_label">Phone Country Code <span class="required">*</span></label>
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
                <div class="col3">
                    <div class="signup_group">
                        <label for="phoneNumber" class="input_label">Phone Number <span class="required">*</span></label>
                        <input type="text" pattern="\d*" step="1" class="input_text"  name="phoneNumber" id="phoneNumber"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Phone Number">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="dob" class="input_label">Date of Birth <span class="required">*</span></label>
                        <input type="text" onkeypress="return false" class="input_text" name="dob" id="dob" placeholder="Date of Birth">
                    </div>
                </div>
            </div>



            <h4 class="sign_heading"><span>Account Address</span></h4>


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
                        <label for="address1" class="input_label">Address Line 1 <span class="required">*</span></label>
                        <input type="text" class="input_text" name="address1" id="address1" placeholder="Address Line 1">
                    </div>
                </div>
                <div class="col3">
                    <div class="signup_group">
                        <label for="address2" class="input_label">Address Line 2</label>
                        <input type="text" class="input_text"  name="address2" id="address2" placeholder="Address Line 2">
                    </div>
                </div>
            </div>

            <div class="signup_row">
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
                <div class="col3">
                    <div class="signup_group">
                        <label for="zipcode" class="input_label">Zip Code <span class="required">*</span></label>
                        <input type="text" class="input_text"  name="zipcode" id="zipcode" placeholder="Zip Code">
                    </div>
                </div>
            </div>
            
            

            
            <h4 class="sign_heading"><span>Shipping Address</span></h4>

            <div class="signup_row">
                <div class="pretty p-default checkbox-center">
                    <input type="checkbox" id="shipping_check" />
                    <div class="state p-primary">
                        <label class="font_reset">Check box if account address and shipping address are the same</label>
                    </div>
                </div>
            </div>

            <div class="shipping_information">
                <div class="signup_row">
                    <div class="col3">
                        <div class="signup_group">
                            <label for="shipping_country" class="input_label">Shipping Country <span class="required">*</span></label>
                            <select class="country_drop_shipping country_drop input_text input_select" name="shipping_country" id="shipping_country">
                                <option value="">Select a Country</option>
                                <option value="1">United States of America</option>
                            </select>
                        </div>
                    </div>
                    <div class="col3">
                        <div class="signup_group">
                            <label for="shipping_address1" class="input_label">Shipping Address Line 1 <span class="required">*</span></label>
                            <input type="text" class="input_text" name="shipping_address1" id="shipping_address1" placeholder="Address Line 1">
                        </div>
                    </div>
                    <div class="col3">
                        <div class="signup_group">
                            <label for="shipping_address2" class="input_label">Shipping Address Line 2</label>
                            <input type="text" class="input_text"  name="shipping_address2" id="shipping_address2" placeholder="Address Line 2">
                        </div>
                    </div>
                </div>

                <div class="signup_row">
                    <div class="col3">
                        <div class="signup_group">
                            <label for="shipping_city" class="input_label">Shipping City <span class="required">*</span></label>
                            <input type="text" class="input_text" name="shipping_city" id="shipping_city" placeholder="City">
                        </div>
                    </div>
                    <div class="col3">
                        <div class="signup_group">
                            <label for="shipping_state" class="input_label">Shipping State / Province <span class="required">*</span></label>
                            <select class="state_drop_shipping input_text input_select ship_state" name="shipping_state" id="shipping_state">
                                <option class="select" value="">Select a State/Province</option>
                            </select>
                            <input style="display:none;" type="text" class="state_shipping_static input_text ship_state" name="shipping_state2" id="shipping_state2" placeholder="State / Province">
                        </div>
                    </div>
                    <div class="col3">
                        <div class="signup_group">
                            <label for="shipping_zipcode" class="input_label">Shipping Zip Code <span class="required">*</span></label>
                            <input type="text" class="input_text"  name="shipping_zipcode" id="shipping_zipcode" placeholder="Zip Code">
                        </div>
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
            
            <h4 class="sign_heading"><span>Legal</span></h4>

            <div class="signup_row">
                <div class="pretty p-default checkbox-center">
                    <input type="checkbox" id="anonymous_profile"/>
                    <div class="state p-primary">
                        <label class="font_reset">Check box if you want to keep your profile anonymous</label>
                    </div>
                </div>
            </div>

            <br/>

            <div class="signup_row">
                <div class="pretty p-default checkbox-center">
                    <input type="checkbox" id="condition_agreement"/>
                    <div class="state p-primary">
                        <label class="font_reset">I agree to the terms and conditions</label> <span class="required small">*</span>
                    </div>
                </div>
            </div>

            <br/>

            <div class="signup_row">
                <div class="pretty p-default checkbox-center">
                    <input type="checkbox" id="shipping_services" />
                    <div class="state p-primary">
                        <label class="font_reset">Check box if you plan to use shipping services. If box is checked, you will receive an email prior to auction</label>
                    </div>
                </div>
            </div>
            
            <div class="signup_row">
                <div id="recaptcha"></div>
                <input type="hidden" id="recaptcha_confirmed" name="recaptcha_confirmed" value="no">
            </div>

            <br/>
            
            <div class="signup_row">
                <div class="pretty p-default checkbox-center">
                    <input type="checkbox" id="remember_me" />
                    <div class="state p-primary">
                        <label class="font_reset"><span class="bold">Remember me</span> on this computer</label>
                    </div>
                </div>
            </div>

            <br/>

            <div class="signup_row">
                <a  type="submit" class="fancy-submit fancy-button bg-gradient1 cursor_pointer" style="margin:auto;" href="javascript: validate_sign_up();" id="create_account_submit" disabled><span>Create Account</span></a>
            </div>

        </div>

        <input type="hidden" id="company_checkbox" name="company_checkbox" value="0"/>
        <input type="hidden" id="shipping_checkbox" name="shipping_checkbox" value="0"/>
        <input type="hidden" id="anonymous_checkbox" name="anonymous_checkbox" value="0"/>
        <input type="hidden" id="terms_checkbox" name="terms_checkbox" value="0"/>
        <input type="hidden" id="shipping_services_checkbox" name="shipping_services_checkbox" value="0"/>
        
        <input type="hidden" name="residential_state_det" id="residential_state_det" value="0"/>
        <input type="hidden" name="shipping_state_det" id="shipping_state_det" value="0"/>
        
        <input type="hidden" id="remember_me_checkbox" name="remember_me_checkbox" value="0"/>
    </form>
</section>



<?php include "includes/footer.php"; ?>

<script>
    
    $(".country_drop").html(country_drop);
    
    $(document).ready(function(){

        $("#remember_me").change(function(){
            if($("#remember_me").is(":checked")){
                $("#remember_me_checkbox").val("1");
            }
            else{
                $("#remember_me_checkbox").val("0");
            }
        });

        $("#company_check").change(function(){
            if($("#company_check").is(":checked")){
                $("#company_checkbox").val("1");
            }
            else{
                $("#company_checkbox").val("0");
            }
        });

        $("#shipping_check").change(function(){
            if($("#shipping_check").is(":checked")){
                $("#shipping_checkbox").val("1");
            }
            else{
                $("#shipping_checkbox").val("0");
            }
        });

        $("#anonymous_profile").change(function(){
            if($("#anonymous_profile").is(":checked")){
                $("#anonymous_checkbox").val("1");
            }
            else{
                $("#anonymous_checkbox").val("0");
            }
        });

        $("#condition_agreement").change(function(){
            if($("#condition_agreement").is(":checked")){
                $("#terms_checkbox").val("1");
            }
            else{
                $("#terms_checkbox").val("0");
            }
        });

        $("#shipping_services").change(function(){
            if($("#shipping_services").is(":checked")){
                $("#shipping_services_checkbox").val("1");
            }
            else{
                $("#shipping_services_checkbox").val("0");
            }
        });
        /*
            company_check
            shipping_check
            anonymous_profile
            condition_agreement
            shipping_services
        */

        if($('#company_check').is(':checked')){
            if($("#company_check").is(":checked")){
                $('.company_details').slideDown(500);
                $('.company_details').show();
                $(".company_details").css("display", "flex");
                $("#company_checkbox").val("1");
            }
        }

        $(".country_drop_shipping").change(function(){
            var name = $(this).find('option:selected').attr("name");

            if(all_states[name] == "<option class='select' value=''>Select a State/Province</option>"){
                $(".state_shipping_static").css("display","block");
                $(".state_drop_shipping").css("display","none");
                $(".state_drop_shipping").html("");
            }
            else{
                $(".state_drop_shipping").css("display","block");
                $(".state_drop_shipping").html(all_states[name]);
                $(".state_shipping_static").css("display","none");
            }
        });
        
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

        $("#shipping_check").click(function(){
            if($("#shipping_check").is(":checked")){
                $('.shipping_information').slideUp(500);
                $('.shipping_information').hide();
                $(".shipping_information").css("display", "none");
            }
            else{
                $('.shipping_information').slideDown(500);
                $('.shipping_information').show();
                $(".shipping_information").css("display", "block");
            }
        });

        $("#company_check").click(function(){
            if($("#company_check").is(":checked")){
                $('.company_details').slideDown(500);
                $('.company_details').show();
                $(".company_details").css("display", "flex");
            }
            else{
                $('.company_details').slideUp(500);
                $('.company_details').hide();
                $(".company_details").css("display", "none");
            }
        });

        $("#dob").datepicker({
            autoClose: true,
            viewStart: 2
        });
    });
</script>
<script src="js/validators/sign_up.js"></script>