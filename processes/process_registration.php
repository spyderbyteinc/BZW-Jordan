<?php
    session_start();
    
    include "../helpers/date_conversion.php";

    include "../includes/connect.php";
    

    if(!isset($_POST['confirm_registration'])){
        header("location: ../registration.php");
        exit();
    }

    // // Post Variables
    $state_det = $_POST['residential_state_det'];


    $seller = $_POST['type'];
    $company = $_POST['company'];

    $account_type = "";

    if($seller == "buysell"){
        $seller = 1;
        $account_type = "seller";
    }
    else{
        $seller = 0;
        $account_type = "buyer";
    }

    if($company == "comp_yes"){
        $company = 1;
    }
    else{
        $company = 0;
    }

    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);

    $country_code = mysqli_real_escape_string($conn, $_POST['country_code']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);

    $address1 = mysqli_real_escape_string($conn, $_POST['address1']);
    $address2 = mysqli_real_escape_string($conn, $_POST['address2']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $state2 = mysqli_real_escape_string($conn, $_POST['state2']);

    $det_state;

    if($state_det == "state"){
        $det_state = $state;
    }
    else{
        $det_state = $state2;
    }

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);

    $question1 = $_POST['question1'];
    $answer1 = $_POST['answer1'];
    $question2 = $_POST['question2'];
    $answer2 = $_POST['answer2'];

    $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
    $company_website = mysqli_real_escape_string($conn, $_POST['company_website']);
    $company_ein = mysqli_real_escape_string($conn, $_POST['company_ein']);
    $company_phone = mysqli_real_escape_string($conn, $_POST['company_phone']);
    $company_non_profit = mysqli_real_escape_string($conn, $_POST['company_non_profit']);

    $company_logo;

    $affiliation1 = mysqli_real_escape_string($conn, $_POST['affiliation1']);
    $affiliation2 = mysqli_real_escape_string($conn, $_POST['affiliation2']);
    $affiliation3 = mysqli_real_escape_string($conn, $_POST['affiliation3']);

    $what_selling = mysqli_real_escape_string($conn, $_POST['what_selling']);

    // Handle File Upload
    if (!empty($_FILES["company_logo"]["name"])){
        $company_logo = $_FILES['company_logo'];

        $target_dir = "../img/sellers/";
        $fi = time() . $_FILES['company_logo']['name'];
        $target_file = $target_dir . $fi;
        
        $company_logo = $fi;

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["company_logo"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["company_Logo"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        }
        else{
            move_uploaded_file($_FILES["company_logo"]["tmp_name"], $target_file);
        }
    }
    else{
        $company_logo = "";
    }

    $ip = $_SERVER['REMOTE_ADDR'];

    // Accounts Table
    $account_sql = "INSERT INTO `accounts` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `type`, `IP_address`) VALUES (NULL, '$username', '$email', '$password', '$first_name', '$last_name', '$account_type', '$ip')";

    mysqli_query($conn, $account_sql);



    // INSERT INTO `users` (`id`, `username`, `email`, `password`, `seller`, `company`, `first_name`, `last_name`, `country_code`, `phoneNumber`, `dob`, `age_check`, `address1`, `address2`, `country`, `city`, `state`, `question1`, `answer1`, `question2`, `answer2`, `company_name`, `company_website`, `company_ein`, `company_phone`, `company_non_profit`, `company_logo`, `affiliation1`, `affiliation2`, `affiliation3`, `what_selling`, `terms_check`, `created_timestamp`, `seller_auth`, `rating`, `email_verified`, `confirmation_code`) VALUES (NULL, 'jhalaby', 'jhalaby@emich.edu', '71603a2a25ec0996e665467cc270db97', '1', '1', 'Jordan', 'Halaby', '1', '2489127636', '1994-09-09', '1', '10137 Devonshire', '', 'US', 'South Lyon', 'MI', '1', '23bb133b153547613a191d4086f9cb58', '5', '9fc0ef03a75ae028da276f05cdfe5374', 'SpyderByte', 'spyderbyte.co', '', '', '', '', 'AFF 1', 'AFF 2', 'AFF 3', 'I will be selling a variety of products', '1', CURRENT_TIMESTAMP, '0', '100', '0', '123456');


    // Users Table
    $confirmation_code = mt_rand(100000, 999999);

    $sql = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `seller`, `company`, `first_name`, `last_name`, `country_code`, `phoneNumber`, `dob`, `age_check`, `address1`, `address2`, `country`, `city`, `state`, `question1`, `answer1`, `question2`, `answer2`, `company_name`, `company_website`, `company_ein`, `company_phone`, `company_non_profit`, `company_logo`, `affiliation1`, `affiliation2`, `affiliation3`, `what_selling`, `terms_check`, `created_timestamp`, `seller_auth`, `rating`, `email_verified`, `confirmation_code`) VALUES (NULL, '$username', '$email', '$password', '$seller', '$company', '$first_name', '$last_name', '$country_code', '$phoneNumber', '1', '1', '$address1', '$address2', '$country', '$city', '$det_state', '$question1', '$answer1', '$question2', '$answer2', '$company_name', '$company_website', '$company_ein', '$company_phone', '$company_non_profit', '$company_logo', '$affiliation1', '$affiliation2', '$affiliation3', '$what_selling', '1', CURRENT_TIMESTAMP, '0', '100', '0', '$confirmation_code');";

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
?>