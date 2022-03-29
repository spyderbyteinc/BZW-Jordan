<?php
    session_start();



    if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
        $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('HTTP/1.1 301 Moved Permanently');
        header('Location: ' . $location);
        exit;
    }
    
    $root = "https://bidzwon.com/dev/";

    include "connect.php";


    include "global/helper_functions.php";
    include "global/catalog_status.php";
    include "global/lot_status.php";
    include "global/catalog_countdown.php";
    include "global/lot_completion.php";

    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/dev/helpers/date_conversion.php";
    include_once($path);

    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/dev/helpers/display_time.php";
    include_once($path);
    
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/dev/helpers/country_state.php";
    include_once($path);

    $logged_in = false;
    if(isset($_COOKIE['username'])){
        $username = $_COOKIE['username'];
        $logged_in = true;
    }
    else if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $logged_in = true;
    }
    else{
        $username = null;
        $logged_in = false;
    }

    if(isset($_GET['login_error'])){
        $login = $_GET['login_error'];
        if($login == 0){
            ?>
                <script>
                    alert("You must be logged in to view this page");
                </script>
            <?php
        }
    }


    if($logged_in){
        $verified_sql = "SELECT * FROM accounts WHERE username = '$username'";
        $ver_result = mysqli_query($conn, $verified_sql);
        $row = mysqli_fetch_assoc($ver_result);

        $first_name = $row['first_name'];
        $last_name = $row['last_name'];

        $account_type = $row['type'];

        if($account_type == "seller" || $account_type == "buyer"){
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $email_verified = $row['email_verified'];
            $seller_auth = $row['seller_auth'];
        }
    }
    // $self = $_SERVER['PHP_SELF'];
    // $filename = str_replace("/dev/", "", $self);
    // echo $filename;
    $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    $url = str_replace($root, "", $url);

    // generate array of invalid files for non-sellers
    $seller_blacklist = array("seller/house_accounts.php", "catalogs/create.php", "catalogs/manage.php", "catalogs/featured_image.php", "lots/manage.php", "lots/create.php", "catalogs/sort_lots.php", "lots/edit.php", "lots/pictures.php", "catalogs/edit.php");


    if($seller_auth != 1){
        for($i = 0; $i<count($seller_blacklist); $i++){
            $current_page = $seller_blacklist[$i];
            if (strpos($url, $current_page) !== false) {
                ?>
                <script>
                    window.location = "<?php echo $root; ?>";
                </script>
                <?php
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $root; ?>favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $root; ?>favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $root; ?>favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $root; ?>favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $root; ?>favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $root; ?>favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $root; ?>favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $root; ?>favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $root; ?>favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $root; ?>favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $root; ?>favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $root; ?>favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $root; ?>favicons/favicon-16x16.png">
    <!-- <link rel="manifest" href="<?php echo $root; ?>favicons/manifest.json"> -->


    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- <link rel="stylesheet" href="<?php echo $root; ?>css/all.css"> -->
    <script src="https://kit.fontawesome.com/baba242fa7.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    
    <link href="http://code.jquery.com/ui/1.9.2/themes/smoothness/jquery-ui.css" rel="stylesheet" />

    <!-- <link rel="stylesheet" href="<?php echo $root; ?>css/datepicker.min.css"> -->
    <link rel="stylesheet" href="<?php echo $root; ?>css/sortable.css">
    <link rel="stylesheet" href="<?php echo $root; ?>css/buttons.css">
    <link rel="stylesheet" href="<?php echo $root; ?>css/special_elem.css">
    <link rel="stylesheet" href="<?php echo $root; ?>css/style.css">

    <title>BidZWon</title>

</head>
<body>
    <div id="sidebar_items">
        <h4 class="messages"><a href="#">Instant Messaging</a></h4>
        <h4 class="bid_placement"><a href="#">Bid Status</a></h4>
    </div>
    <div id="login_modal"  class="modal_bg">
        <div id="login_modal_content" class="modal">
            <h4>Account Log In</h4>


            <form action="<?php echo $root; ?>processes/process_login.php" method="post" name="login_form" id="login_form" onsubmit="return validate_login();">

                <div class="signup_row login_row">
                    <div class="full_col">
                        <div class="signup_group">
                            <label for="login_username" class="input_label">Username or Email</label>
                            <input type="text" class="input_text" name="login_username" id="login_username" placeholder="Username or Email">
                        </div>
                    </div>
                </div>

                <div class="signup_row login_row">
                    <div class="full_col">
                        <div class="signup_group">
                            <label for="login_password" class="input_label">Password</label>
                            <input type="password" class="input_text" name="login_password" id="login_password" placeholder="Password">
                            <div class="hide-show" id="show_password">
                                <span class="show" title="Show Password"><i class="fas fa-eye"></i></span>
                            </div>
                            <div class="hide-show" id="hide_password">
                                <span class="show" title="Hide Password"><i class="fas fa-eye-slash"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="signup_row login_row">
                    <div class="full_col login_options">
                        <div class="pretty p-default">
                            <input type="checkbox" id="remember_me_login"/>
                            <div class="state p-primary">
                                <label class="font_reset">Remember Me</label>
                            </div>
                        </div>
                        
                        <div class="forgot_password"><a href="<?php echo $root; ?>forgotten_pass.php">Forgot Password?</a></div>
                    </div>
                </div>

                <input type="hidden" name="remem_checkbox" id="remem_checkbox" value="0">

                <input type="hidden" name="location" id="location" value="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">

                <div class="signup_row login_row">
                    <button class="fancy-submit fancy-button bg-gradient1" style="margin:auto;"><span>Log In</span></button>
                    <!--<a href="#" id="login_button" class="bidzbutton chocolate" href="javascript: validate_login();">Log In</a>-->
                </div>

                
                <div class="signup_row login_row mauto">
                    <span>Don't have an account? <a href="<?php echo $root; ?>registration.php">Create Account</a></span>
                </div>
                
                <div class="signup_row login_row mauto">
                    <span><a href="#" id="cancel_login" class="bidzbutton orange">Cancel</a></span>
                </div>
            </form>
        </div>
    </div>

    <header id="header">

        <div id="top_header">
            <div id="top_content">
                <ul id="top_information">
                    <li class="top_option">How to Buy</li>
                    <li class="top_option">How to Sell</li>
                </ul>

                <ul id="other_information">
                    <li class="top_option">Support</li>
                    <li class="top_option">About Us</li>
                    <li class="top_option">Contact Us</li>
                    <li class="top_option">Blog</li>
                </ul>
            </div>
        </div>

        <div id="middle_header">
            <div id="middle_content">
                <a href="<?php echo $root; ?>"><h1 class="logo"><img src="<?php echo $root; ?>img/logo6.png" alt="BidZWon"></h1></a>

                <div class="search_field">
                    <form action="#" class="search">
                        <input type="text" class="search__input" placeholder="Search">
                        <button class="search__button">
                            <svg class="search__icon">
                                <use xlink:href="<?php echo $root; ?>img/search_sprite.svg#icon-search"></use>
                            </svg>
                        </button>

                        <div id="search_drop">

                            <div id="search_content">

                                <div id="search_header">
                                    <p class="recent">Recent Searches</p>

                                    <p class="recent">Advanced Search</p>
                                </div>
                                <div id="recent_searches">

                                    <h1>Hello</h1>
                                    <h1>Hello</h1>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>


                <?php if($logged_in) : ?>
                    <div class="dropdown">
                        <!-- <?php echo $first_name . " " . $last_name; ?> <a href="<?php echo $root; ?>processes/process_logout.php">Logout</a> -->
                        <a href="#" class="header_buttons bidzbutton black account_links" id="account_links"><?php echo $first_name . " " . $last_name; ?> <i class="fa fa-caret-down ml-10 font-15"></i></a>
                        <div class="dropdown-content" id="myDropdown">
                            <a href="#">My Account</a>
                            <a href="#">Settings</a>
                            <a href="<?php echo $root; ?>processes/process_logout.php">Logout</a>
                        </div>
                    </div>
                <?php else : ?>
                    <a href="<?php echo $root; ?>registration.php" class="header_buttons bidzbutton black sign_up_open">Sign Up</a>
                    <a href="#" class="header_buttons login_open bidzbutton black">Log In</a>
                <?php endif ; ?>
            </div>
        </div>

        <div id="bottom_header">
            
            <div class="nav">
                <ul id="nav_links">
                    <li class="nav_item"><a  href="<?php echo $root; ?>">Home</a></li>
                    <li class="nav_item"><a href="<?php echo $root; ?>browse/browse.php">All Auctions</a></li>
                    <li class="nav_item"><a href="#">Buying</a>
                        <ul class="submenu">
                            <li><a href="#">Timed Auctions</a></li>
                            <li><a href="#">Fixed Price Items</a></li>
                            <li><a href="#">Browse By Category</a></li>
                            <li><a href="#">Browse By Location</a></li>
                            <li><a href="#">Auto Search</a></li>
                        </ul>
                    </li>
                    <?php if($seller_auth == 1) : ?>
                    <li class="nav_item"><a href="#">Selling</a>
                        <ul class="submenu">
                            <li><a href="<?php echo $root; ?>seller/seller_dashboard.php">Seller Dashboard</a></li>
                            <li><a href="<?php echo $root; ?>seller/house_accounts.php">House Accounts</a></li>
                            <li><a href="<?php echo $root; ?>catalogs/create.php">Create Catalog</a></li>
                            <li><a href="<?php echo $root; ?>catalogs/manage.php">Manage Catalogs</a></li>
                            <li><a href="#">Past Catalogs</a></li>
                            <li><a href="#">Statistics</a></li>
                        </ul>
                    </li>
                    <?php else : ?>
                    <li class="nav_item"><a href="#">Register To Sell</a>
                    </li>
                    <?php endif ; ?>
                    <!-- <li class="nav_item"><a href="#">Register To Sell</a>
                        <ul class="submenu">
                            <li><a href="#">Sell Items at Auction</a></li>
                            <li><a href="#">Sell Fixed Price Items</a></li>
                        </ul>
                    </li>  -->
                    <li class="nav_item"><a href="#">Message Center</a></li>
                    <li class="nav_item"><a href="#">Invoices</a></li>
                    <li class="nav_item"><a href="#">Help</a>
                        <ul class="submenu">
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">How To Buy</a></li>
                            <li><a href="#">How To Sell</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        
        <?php if($email_verified != 1 && $logged_in && $account_type != "house") : ?>
            <div id="confirm_email_notification">
                <div id="email_notification_text">
                    <p>In order to complete the sign up process, and be able to register for auctions, you must <a href="<?php echo $root; ?>email_confirmation.php">verify your email address</a></p>
                </div>
            </div>
        <?php endif ; ?>
    </header>
<script src="<?php echo $root; ?>js/validators/login.js"></script>
