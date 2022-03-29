<?php
    if(!isset($_GET['id']) | $_GET['id'] == ""){
        header("location: .all_users.php");
        exit();
    }
    else{
        $id = $_GET['id'];
    }

    include "includes/connect.php";

    $sql = "SELECT * FROM `users` WHERE `id`=$id AND `seller`=1";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count == 0){
        header("location: all_users.php");
    }
    $row = mysqli_fetch_assoc($result);
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $username = $row['username'];
    $email = $row['email'];
    $country_code = $row['country_code'];
    $phoneNumber = $row['phoneNumber'];
    $address1 = $row['address1'];
    $address2 = $row['address2'];
    $country = $row['country'];
    $city = $row['city'];
    $state = $row['state'];
    $state_sql = "SELECT * FROM `states` WHERE `code`='$state' AND `country`='$country'";
    $res = mysqli_query($conn, $state_sql);
    $row2 = mysqli_fetch_assoc($res);
    $state = $row2['name'];

    $country_sql = "SELECT * FROM `countries` WHERE `country_code` = '$country'";
    $res = mysqli_query($conn, $country_sql);
    $row3 = mysqli_fetch_assoc($res);
    $country = $row3['country_name'];

    $code_sql = "SELECT * FROM `countries` WHERE `id` = $country_code";
    $res = mysqli_query($conn, $code_sql);
    $row4 = mysqli_fetch_assoc($res);
    $country_code = $row4['country_name'];

    $seller_auth = $row['seller_auth'];
    if($seller_auth == 1){
        $verified = "yes";
    }
    else{
        $verified = '<a href="#">no</a>';
    }


    $company_name = $row['company_name'];
    $company_website = $row['company_website'];
    $company_ein = $row['company_ein'];
    $company_phone = $row['company_phone'];
    $company_non_profit = $row['company_non_profit'];

    $company_logo = $row['company_logo'];
    $affiliation1 = $row['affiliation1'];
    $affiliation2 = $row['affiliation2'];
    $affiliation3 = $row['affiliation3'];
    $what_selling = $row['what_selling'];

    $website_display = $company_website;
    if(strpos($company_website, 'http://') === 0 || strpos($company_website, 'https://') === 0){
        $company_website = $company_website;
    }
    else{
        $company_website = "//" . $company_website;
    }

    $question1 = $row['question1'];
    $answer1 = $row['answer1'];
    $question2 = $row['question2'];
    $answer2 = $row['answer2'];
    
    // question retrieval
    $one = "SELECT * FROM `security_question1` WHERE `id`=$question1";
    $res_one = mysqli_query($conn, $one);
    $row1 = mysqli_fetch_assoc($res_one);
    $question1 = $row1['question'];

    $two = "SELECT * FROM `security_question2` WHERE `id`=$question2";
    $res_two = mysqli_query($conn, $two);
    $row2 = mysqli_fetch_assoc($res_two);
    $question2 = $row2['question'];
?>
<?php include "includes/header.php"; ?>


<main id="content" class="seller_record">
        <h1 class="page_heading">Seller Account - <?php echo $first_name . " " . $last_name; ?></h1>
        
        <div class="mb-4 text-center mt-4"><a href="all_users.php" class="btn btn-warning">Back to List</a></div>
        
        <div class="record_item">
                <p class="table_mid_header">Personal Information</p>
                
                <div class="table">

                    <div class="table-row first_section">
                        <div class="table-cell bold">First Name</div>
                        <div class="table-cell right_align"><?php echo $first_name; ?></div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold">Last Name</div>
                        <div class="table-cell right_align"><?php echo $last_name; ?></div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold">Username</div>
                        <div class="table-cell right_align"><?php echo $username; ?></div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold">Phone Number</div>
                        <div class="table-cell right_align"><?php echo $phoneNumber; ?></div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold">Email</div>
                        <div class="table-cell right_align"><?php echo $email; ?></div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold">Country Code</div>
                        <div class="table-cell right_align"><?php echo $country_code; ?></div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold">Address 1</div>
                        <div class="table-cell right_align"><?php echo $address1; ?></div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold">Address 2</div>
                        <div class="table-cell right_align"><?php echo $address2; ?></div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold">City</div>
                        <div class="table-cell right_align"><?php echo $city; ?></div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold">State</div>
                        <div class="table-cell right_align"><?php echo $state; ?></div>
                    </div>
                    <div class="table-row last_section">
                        <div class="table-cell bold">Country</div>
                        <div class="table-cell right_align"><?php echo $country; ?></div>
                    </div>
                </div>
                
                <p class="table_mid_header">Company Information</p>
                
                <div class="table">

                    <div class="table-row first_section">
                        <div class="table-cell bold">Company Name</div>
                        <div class="table-cell right_align"><?php echo $company_name; ?></div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold">Company Website</div>
                        <div class="table-cell right_align"><a target="_blank" href="<?php echo $company_website; ?>"><?php echo $website_display; ?></a></div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold">Company EIN</div>
                        <div class="table-cell right_align"><?php echo $company_ein; ?></div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold">Company Phone</div>
                        <div class="table-cell right_align"><?php echo $company_phone; ?></div>
                    </div>
                    <div class="table-row last_section">
                        <div class="table-cell bold">Company Non Profit?</div>
                        <div class="table-cell right_align"><?php echo $company_non_profit; ?></div>
                    </div>
                </div>
                
                <p class="table_mid_header">Seller Information</p>
                
                <div class="table">

                    <div class="table-row first_section">
                        <div class="table-cell bold">Verified?</div>
                        <div class="table-cell right_align"><?php echo $verified; ?></div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold">Company Logo</div>
                        <div class="table-cell right_align"><a target="_blank" href="<?php echo $root; ?>img/sellers/<?php echo $company_logo; ?>"><?php echo $company_logo; ?></a></div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold">Affiliation 1</div>
                        <div class="table-cell right_align"><?php echo $affiliation1; ?></div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold">Affiliation 2</div>
                        <div class="table-cell right_align"><?php echo $affiliation2; ?></div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold">Affiliation 3</div>
                        <div class="table-cell right_align"><?php echo $affiliation3; ?></div>
                    </div>
                    <div class="table-row last_section">
                        <div class="table-cell bold">Selling Plans</div>
                        <div class="table-cell right_align"><?php echo $what_selling; ?></div>
                    </div>
                </div>
                
                <p class="table_mid_header">Security Information</p>
                
                <div class="table">

                    <div class="table-row first_section">
                        <div class="table-cell bold">Question 1</div>
                        <div class="table-cell right_align"><?php echo $question1; ?></div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold">Answer 1</div>
                        <div class="table-cell right_align"><?php echo $answer1; ?></div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold">Question 2</div>
                        <div class="table-cell right_align"><?php echo $question2; ?></div>
                    </div>
                    <div class="table-row last_section">
                        <div class="table-cell bold">Answer 2</div>
                        <div class="table-cell right_align"><?php echo $answer2; ?></div>
                    </div>
                </div>
            </div>

            <br><br><br><br><br>
</main>