<?php
    session_start();
    
    include "../helpers/date_conversion.php";

    include "../includes/connect.php";

    // make sure form is submitted
    if(isset($_POST['terms_checkbox'])){

        $state_det = $_POST['residential_state_det'];
        $ship_state_det = $_POST['shipping_state_det'];

        $company_checkbox = $_POST['company_checkbox'];
        $shipping_checkbox = $_POST['shipping_checkbox'];
        $anonymous_checkbox = $_POST['anonymous_checkbox'];
        $shipping_services_checkbox = $_POST['shipping_services_checkbox'];

        // POST values
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];

        $company = $_POST['company'];
        $company_website = $_POST['company_website'];
        $tax_number = $_POST['tax_number'];

        $country_code = $_POST['country_code'];
        $phoneNumber = $_POST['phoneNumber'];
        $dob = $_POST['dob'];
        $dob = date_to_sql($dob);
        
        $country = $_POST['country'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $state2 = $_POST['state2'];
        $zipcode = $_POST['zipcode'];

        $det_state;
        
        if($state_det == "state"){
            $det_state = $state;
        }
        else if($state_det == "state2"){
            $det_state = $state2;
        }

        if($shipping_checbox == 0){
            $shipping_country = $_POST['shipping_country'];
            $shipping_address1 = $_POST['shipping_address1'];
            $shipping_address2 = $_POST['shipping_address2'];
            $shipping_city = $_POST['shipping_city'];
            $shipping_state = $_POST['shipping_state'];
            $shipping_state2 = $_POST['shipping_state2'];
            $shipping_zipcode = $_POST['shipping_zipcode'];
            
            $det_ship_state;
    
            if($ship_state_det == "shipping_state"){
                $det_ship_state = $shipping_state;
            }
            else if($ship_state_det == "shipping_state2"){
                $det_ship_state = $shipping_state2;
            }
        }
        else{
            $shipping_country = $country;
            $shipping_address1 = $address1;
            $shipping_address2 = $address2;
            $shipping_city = $city;
            $det_ship_state = $det_state;
            $shipping_zipcode = $zipcode;
        }

        // shipping and residential state
        $det_ship_state;
        $det_state;

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = md5($password);


        $question1 = $_POST['question1'];
        $answer1 = $_POST['answer1'];
        $answer1 = md5($answer1);
        $question2 = $_POST['question2'];
        $answer2 = $_POST['answer2'];
        $answer2 = md5($answer2);

        // make sure recaptcha is checked
        $recap = $_POST['recaptcha_confirmed'];
        $terms = $_POST['terms_checkbox'];

        if($recap && $terms){

            $confirmation_code = mt_rand(100000, 999999);


            $sql = "INSERT INTO `users` (`id`, `username`, `email`, `first_name`, `last_name`, `password`, `created_timestamp`, `terms_check`, `company_check`, `shipping_check`, `anonymous_check`, `ship_service_check`, `residential_country`, `residential_address1`, `residential_address2`, `residential_city`, `residential_state`, `residential_zipcode`, `shipping_country`, `shipping_address1`, `shipping_address2`, `shipping_city`, `shipping_state`, `shipping_zipcode`, `phone_country_code`, `phone_number`, `dob`, `company_name`, `company_website`, `company_ein`, `security_question_1`, `security_answer_1`, `security_question_2`, `security_answer_2`, `rating`, `active`, `email_verified`, `confirmation_code`) VALUES (NULL, '$username', '$email', '$first_name', '$last_name', '$password', CURRENT_TIMESTAMP, '$terms', '$company_checkbox', '$shipping_checkbox', '$anonymous_checkbox', '$shipping_services_checkbox', '$country', '$address1', '$address2', '$city', '$det_state', '$zipcode', '$shipping_country', '$shipping_address1', '$shipping_address2', '$shipping_city', '$det_ship_state', '$shipping_zipcode', '$country_code', '$phoneNumber', '$dob', '$company', '$company_website', '$tax_number', '$question1', '$answer1', '$question2', '$answer2', '100.00', '1', '0', '$confirmation_code');";

            mysqli_query($conn, $sql);

            $remember = $_POST['remember_me_checkbox'];

            if($remember == 0){
                // No remember - create Session
                $_SESSION['username'] = $username;
            }
            else{
                // Remember - create Cookie
                $cookie_name = "username";
                $cookie_value = $username;

                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
            }

            /*
            if(isset($_COOKIE['username'])){
                echo "cookie: " . $_COOKIE['username'];
            }
            else if(isset($_SESSION['username'])){
                echo "session: " . $_SESSION['username'];
            }*/


            $to = $email;
            $subject = "Verify your BidZWon account";
            
            $email_message = '<html><head><title>Verify your BidZWon account</title><style>p.heading{font-size: 24px;font-weight: bold;}p.message_body{font-size: 18px;text-align: justify;}p.message_body1{font-size: 18px;text-align: justify;}p.message_body2{text-align: center;}p.message_body2 span.pin{font-size: 24px;font-weight: bold;}.container{width: 800px;margin: auto;}a{color: chocolate;}h1.logo{text-align: center;border-bottom: 3px solid chocolate;padding-bottom: 20px;}h1.logo img{width: 60%;margin: auto;}.footer{background: rgba(119, 136, 153, 0.25);border-top: 2px solid chocolate;display: flex;justify-content: space-around;align-items: center;font-size: 18px;color: chocolate;font-weight: bold;padding: 15px 0;border-bottom: 2px solid chocolate;}p.salutation{font-size: 24px;font-weight: bold;}.footer img{width: 60%;}.footer span.right{width: 240px;}</style></head><body><div class="container"><h1 class="logo"><img src="' . $root . 'img/logo6.png" alt="BidZWon"></h1><p class="heading">Hello ' . $first_name . ',</p><p class="message_body1">Thank you for creating an account with BidZWon. Welcome to our platform, we\'re glad you\'re here. You have one step remaining to complete the sign up process and activate your account.  You will be unable to register to bid until this process is complete.</p><p class="message_body">Below, is a six-digit PIN that must be entered on <a href="' . $root . 'email_confirmation.php">this webpage</a></p><p class="message_body2">Your PIN is <span class="pin">' . $confirmation_code . '</span></p><p class="message_body">Once this is complete, you will be allowed to register for aunctions on <a href="' . $root  . '">BidZWon.com</a></p><p class="message_body">Thank you for your patronage, and happy bidding!</p><p class="salutation">- The BidZWon Team</p><div class="footer"><span class="left">BidZWon is a product of SpyderByte inc.</span><span class="right"><a href="https://spyderbyte.co/dev/img/logo.png"><img src="https://spyderbyte.co/dev/img/logo.png" alt="SpyderByte"></a></span></div></div></body></html>';

            
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\\r";


            // More headers
            $headers .= 'From: <verify@bidzwon.com>' . "\r\n";

            mail($to,$subject,$email_message,$headers,"-f verify@bidzwon.com");

            header("location: ../email_confirmation.php");
            /*
            $to = $email;
            $subject = "Verify your BidZWon account";

            $link = $root . "email_confirmation.php";
            $message = "
            <html>
            <head>
            <title>HTML email</title>
            </head>
            <body>
            
            </body>
            </html>
            ";

            $msg = "Hello " . $first_name . ", </br></br>Thank you for creating an account with BidZWon. Welcome to our platform, we're glad you're here. You have one step remaining to complete the sign up process and activate your account.  You will be unable to register to bid until this process is complete.</br></br>Below, is a six-digit PIN that must be entered on the following webpage: <a href='$link'>" . $link . "</a></br></br>Your PIN is " . $confirmation_code . "</br></br>Once this is complete, you will be allowed to register for aunctions on <a href='$root'>BidZWon.com</a></br></br>Thank you for your patronage, and happy bidding!</br></br>- The BidZWon Team";
            
            echo $msg;

            echo $message;

            //header("location: ../index.php");

            */
        }
    }
?>