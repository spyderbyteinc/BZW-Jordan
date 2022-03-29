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
<section class="seller_sign_up" id="seller_sign_up">
    <h2 class="auctions page_heading"><span>Create Seller Account</span></h2>
<!--     
    <form action="<?php echo $root; ?>processes/process_sign_up.php" method="post" name="sign_up_form" id="sign_up_form"> -->
      
    <h4 class="sign_heading"><span>Personal Information</span></h4>
    
    <div class="sign_up_container">

        <div class="catalog_row signup_row">
            <div class="col2">
                <div class="signup_group">
                    <label for="first_name" class="input_label">First Name <span class="required">*</span></label>
                    <input type="text" class="input_text" name="first_name" id="first_name" placeholder="First Name">
                </div>
            </div>
            <div class="col2">
                <div class="signup_group">
                    <label for="last_name" class="input_label">Last Name <span class="required">*</span></label>
                    <input type="text" class="input_text"    name="last_name" id="last_name" placeholder="Last Name">
                </div>
            </div>
        </div>


        <div class="catalog_row signup_row">
            <div class="col2">
                <div class="signup_group">
                    <label for="phone_number" class="input_label">Phone Number <span class="required">*</span></label>
                    <input type="text" class="input_text" name="phone_number" id="phone_number" placeholder="Phone Number">
                </div>
            </div>
            <div class="col2">
                <div class="signup_group">
                    <label for="email_address" class="input_label">Email Address <span class="required">*</span></label>
                    <input type="email" class="input_text"    name="email_address" id="email_address" placeholder="Email Address">
                </div>
            </div>
        </div>
    </div>
    
    <h4 class="sign_heading"><span>Username and Password</span></h4>
    
    <div class="sign_up_container">
        <div class="signup_row catalog_row">
            <div class="col3">
                <div class="signup_group">
                    <label for="username" class="input_label">Username <span class="required">*</span></label>
                    <input type="text" class="input_text" name="username" id="username" placeholder="Username">
                </div>
            </div>
            <div class="col3">
                <div class="signup_group">
                    <label for="password" class="input_label">Password <span class="required">*</span></label>
                    <input type="password" class="input_text"  name="password" id="password" placeholder="Password">
                </div>
            </div>
            <div class="col3">
                <div class="signup_group">
                    <label for="confirm_password" class="input_label">Confirm Password <span class="required">*</span></label>
                    <input type="text" class="input_text"  name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                </div>
            </div>
        </div>
        
        <div class="catalog_row signup_row">
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
        
        <div class="signup_row catalog_row">
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
    </div>


    <h4 class="sign_heading"><span>Basic Company Information</span></h4>

    <div class="sign_up_container">

        <p class="logo_disclaimer">The following fields are only required if you are registering as a company.</p>

        <div class="catalog_row signup_row">
            <div class="col2">
                <div class="signup_group">
                    <label for="company_name" class="input_label">Company Name</label>
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

        
        <div class="catalog_row signup_row">
            <div class="col2">
                <div class="signup_group">
                    <label for="company_ein" class="input_label">Company EIN</label>
                    <input type="text" class="input_text"    name="company_ein" id="company_ein" placeholder="Company EIN">
                </div>
            </div>
            <div class="col2">
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

                
        <div class="catalog_row signup_row">
            <div class="col2">
                <div class="signup_group">
                    <label for="company_phone" class="input_label">Company Phone Number</label>
                    <input type="text" class="input_text"    name="company_phone" id="company_phone" placeholder="Company Phone Number">
                </div>
            </div>
            <div class="col2">
                <div class="signup_group">
                    <label for="company_email" class="input_label">Company Email Address</label>
                    <input type="text" class="input_text"    name="company_email" id="company_email" placeholder="Company Email Address">
                </div>
            </div>
        </div>


    </div>

    
    <h4 class="sign_heading"><span>Company Logo</span></h4>

    <div class="sign_up_container">
        
        <p class="logo_disclaimer">If you would like your company logo to appear on your catalogs, upload it here. This is optional, but recommended.</p>
            
        <div class="catalog_row signup_row">
            <div class="col1">
                <div class="signup_group">
                    <input type="file" class=""    name="company_logo" id="company_logo" placeholder="">
                </div>
            </div>
        </div>
    </div>
    
    <h4 class="sign_heading"><span>Company Affiliations</span></h4>

    <div class="sign_up_container">
        <p class="affiliations">If you are affiliated with another organization, please specify below (maximum of 3).</p>

        
        <div class="signup_row catalog_row">
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
    </div>
    
    <h4 class="sign_heading"><span>Account Address</span></h4>

    <div class="sign_up_container">
        <div class="catalog_row signup_row">
            <div class="col3">
                <div class="signup_group">
                    <label for="company_country" class="input_label">Country <span class="required">*</span></label>
                    <select class="country_drop_residence country_drop input_text input_select" name="company_country" id="company_country">
                        <option value="">Select a Country</option>
                    </select>
                </div>
            </div>
            <div class="col3">
                <div class="signup_group">
                    <label for="company_address1" class="input_label">Address Line 1 <span class="required">*</span></label>
                    <input type="text" class="input_text" name="company_address1" id="company_address1" placeholder="Address Line 1">
                </div>
            </div>
            <div class="col3">
                <div class="signup_group">
                    <label for="company_address2" class="input_label">Address Line 2</label>
                    <input type="text" class="input_text"  name="company_address2" id="company_address2" placeholder="Address Line 2">
                </div>
            </div>
        </div>

        <div class="catalog_row signup_row">
            <div class="col3">
                <div class="signup_group">
                    <label for="company_city" class="input_label">City <span class="required">*</span></label>
                    <input type="text" class="input_text" name="company_city" id="company_city" placeholder="City">
                </div>
            </div>
            <div class="col3">
                <div class="signup_group">
                    <label for="company_state" class="input_label">State / Province <span class="required">*</span></label>
                    <select class="state_drop_residence input_text input_select res_state" name="company_state" id="company_state">
                        <option class="select" value="">Select a State/Province</option>
                    </select>
                    <input style="display:none;" type="text" class="state_residence_static input_text res_state" name="company_state2" id="company_state2" placeholder="State / Province">
                </div>
            </div>
            <div class="col3">
                <div class="signup_group">
                    <label for="company_zipcode" class="input_label">Zip Code <span class="required">*</span></label>
                    <input type="text" class="input_text"  name="company_zipcode" id="company_zipcode" placeholder="Zip Code">
                </div>
            </div>
        </div>

    </div>

    
    <h4 class="sign_heading"><span>Miscellaneous</span></h4>

    <div class="sign_up_container">
        <div class="catalog_row signup_row">
            <div class="col1">
                <div class="signup_group">
                    <label for="what_selling" class="input_label">OPTIONAL: What Are You Planning on Selling?</label>
                    <textarea class="input_text" name="what_selling" id="what_selling" rows="3" placeholder="What are you planning on selling?"></textarea>
                </div>
            </div>
        </div>
    </div>
    


    <h4 class="sign_heading"><span>Legal</span></h4>

    <div class="sign_up_container">
    
        <div class="catalog_row signup_row">
            <div class="pretty p-default checkbox-center">
                <input type="checkbox" id="condition_agreement"/>
                <div class="state p-primary">
                    <label class="font_reset">I agree to the terms and conditions</label> <span class="required small">*</span>
                </div>
            </div>
        </div>
        
        <div class="catalog_row signup_row">
            <div id="recaptcha"></div>
            <input type="hidden" id="recaptcha_confirmed" name="recaptcha_confirmed" value="no">
        </div>

    </div>
    
    <br>

    <div class="sign_up_container">
        <p class="disclaim_application">When you are done filling out this form, please submit the application so that we can approve you as a seller on BidZWon. Thank you.</p>
    </div>

    <br>
    <div class="sign_up_container sign_up_submit_area">
        <a type="submit" class="fancy-submit fancy-button bg-gradient1 cursor_pointer" style="margin:auto;" id="create_account_submit" disabled=""><span>Submit Application</span></a>
    </div>
</section>



<?php include "includes/footer.php"; ?>

<script>
    
    $(".country_drop").html(country_drop);

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


    });
</script>