<?php
$to = "stevehalaby1@gmail.com";
$subject = "Verify your BidZWon account";


$txt = '<html><head><title>Verify your BidZWon account</title><style>p.heading{font-size: 24px;font-weight: bold;}p.message_body{font-size: 18px;text-align: justify;}p.message_body1{font-size: 18px;text-align: justify;}p.message_body2{text-align: center;}p.message_body2 span.pin{font-size: 24px;font-weight: bold;}.container{width: 800px;margin: auto;}a{color: chocolate;}h1.logo{text-align: center;border-bottom: 3px solid chocolate;padding-bottom: 20px;}h1.logo img{width: 60%;margin: auto;}.footer{background: rgba(119, 136, 153, 0.25);border-top: 2px solid chocolate;display: flex;justify-content: space-around;align-items: center;font-size: 18px;color: chocolate;font-weight: bold;padding: 15px 0;border-bottom: 2px solid chocolate;}p.salutation{font-size: 24px;font-weight: bold;}.footer img{width: 60%;}.footer span.right{width: 240px;}</style></head><body><div class="container"><h1 class="logo"><img src="https://bidzwon.com/dev/img/logo6.png" alt="BidZWon"></h1><p class="heading">Hello Jordan,</p><p class="message_body1">Thank you for creating an account with BidZWon. Welcome to our platform, we\'re glad you\'re here. You have one step remaining to complete the sign up process and activate your account.  You will be unable to register to bid until this process is complete.</p><p class="message_body">Below, is a six-digit PIN that must be entered on <a href="https://www.bidzwon.com/dev/email_confirmation.php">this webpage</a></p><p class="message_body2">Your PIN is <span class="pin">123456</span></p><p class="message_body">Once this is complete, you will be allowed to register for aunctions on <a href="https://www.BidZWon.com">BidZWon.com</a></p><p class="message_body">Thank you for your patronage, and happy bidding!</p><p class="salutation">- The BidZWon Team</p><div class="footer"><span class="left">BidZWon is a product of SpyderByte inc.</span><span class="right"><a href="https://spyderbyte.co/dev/img/logo.png"><img src="https://spyderbyte.co/dev/img/logo.png" alt="SpyderByte"></a></span></div></div></body></html>';


// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\\r";


// More headers
$headers .= 'From: <verify@bidzwon.com>' . "\r\n";

mail($to,$subject,$txt,$headers,"-f verify@bidzwon.com");
?>