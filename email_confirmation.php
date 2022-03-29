<?php include "includes/header.php"; ?>
<?php include "includes/connect.php"; ?>

<?php
    if(!$logged_in){
        header("location: index.php");
    }
    else{
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $first_name = $row['first_name'];
        $email = $row['email'];
    }

    if(isset($_GET['error'])){
        ?>
            <script>
                alert("Invalid Confirmation Credentials");
                location.replace("email_confirmation.php");
            </script>
        <?php
    }
?>

<section class="confirm_email" id="confirm_email">

    <h2 class="auctions section_heading"><span>Confirm Your Email Address</span></h2>

    <div id="confirm_container">
        <h3 class="confirm_greeting">Hi <?php echo $first_name; ?>,</h3>

        <p class="confirm_body">Thank you for creating an account with BidZWon.com. To complete the sign up process, and to have the ability to register for auctions, we require you to confirm the email account that you supplied during account creation.</p>

        <p class="confirm_body">We have sent you an email (to <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>) containing a six-digit code that must be entered in the following box to complete this process.</p>

        <form action="<?php echo $root; ?>processes/process_confirm_email.php" method="post" name="email_confirm" id="email_confirm">
            <div class="confirm_form">
                <label for="confirm_token" class="confirm_token_label">Confirmation Code:</label>
                <input type="number" name="confirm_token" id="confirm_token" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==6) return false;" placeholder="######">

                <input type="hidden" name="username" value="<?php echo $username; ?>">
                
                <a href="javascript: validate_email_confirm();" class="bidzbutton chocolate confirm_submit">Submit</a>

                <p class="resend_body">Haven't received your confirmation email? <a href="#" class="resend_confirmation">Resend code</a></p>
            </div>
        </form>
    </div>

</section>


<?php include "includes/footer.php"; ?>

<script src="js/validators/sign_up.js"></script>

<script>
    $("input").click(function () {
        $(this).css("background-color", "whitesmoke");
    });
    
    $("input").keypress(function () {
        $(this).css("background-color", "whitesmoke");
    });

    function validate_email_confirm(){
        $confirm_token = $("#confirm_token").val();
        $confirm_password = $("#confirm_password").val();

        if($confirm_token == ""){
            alert("Token is required for authentication");
            document.getElementById("confirm_token").style.backgroundColor = "lightpink";
            document.getElementById("confirm_token").focus();
        }
        else if($confirm_token.length != 6){
            alert("Token length must be 6");
            document.getElementById("confirm_token").style.backgroundColor = "lightpink";
            document.getElementById("confirm_token").focus();
        }
        else if($confirm_password == ""){
            alert("Password confirm is a required field");
            document.getElementById("confirm_password").style.backgroundColor = "lightpink";
            document.getElementById("confirm_password").focus();
        }
        else{
            document.email_confirm.submit();
        }
    }
</script>