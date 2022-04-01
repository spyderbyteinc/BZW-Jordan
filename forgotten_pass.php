<?php include "includes/header.php"; ?>
<?php include "includes/connect.php"; ?>

<?php

if(isset($_GET['forgotten'])){
    $forgot = $_GET['forgotten'];

    if($forgot == "bad"){
        ?>
        <script>
            alert("Error encountered changing password");
            window.location.href = "<?php echo $root; ?>";
        </script>
        <?php
    }
}

?>



<section class="forgotten_password_section" id="forgotten_password">
    <h2 class="auctions section_heading"><span>Forgotten Password</span></h2>

    <form id="forgotten_submit"  action="processes/process_forgotten_password.php" method="post">
    <div id="enter_username">
        
        <p class="section_heading">Please enter your email address or username:</p>

        <div class="fgt_section">
            <label for="username">Username / Email</label>
            <input type="text" name="username" id="username">
        </div>

        <p class="section_heading" id="wrong_username">The username or email address provided does not exist</p>
        <p class="section_heading" id="empty_username">Please enter a valid email address or useranme</p>

        <a href="#" class="bidzbutton next_button" id="show_questions">Next</a>

    </div>


    <div id="security_questions">
        
        <p class="section_heading">Please answer both of the following security questions:</p>

        <div class="fgt_section">
            <label for="answer1" id="question1_label"></label>
            <input type="text" name="answer1" id="answer1">
        </div>

        <br>

        <div class="fgt_section">
            <label for="answer2" id="question2_label"></label>
            <input type="text" name="answer2" id="answer2">
        </div>

        <p class="section_heading" id="empty_answers">Answers for each question are required</p>
        <p class="section_heading" id="wrong_answers">One or both of your answers are incorrect</p>

        <input type="hidden" name="username_placeholder" id="username_placeholder">

        <a href="#" class="bidzbutton next_button" id="show_password_change">Next</a>
    </div>

    <div id="new_password">
        <p class="section_heading">Please choose a new password:</p>
        
        <div class="fgt_section">
            <label for="password">New Password:</label>
            <input type="password" name="password" id="password">
        </div>

        <br>

        <div class="fgt_section">
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" id="confirm_password">
        </div>

        <p class="section_heading" id="empty_password">Password cannot be blank</p>
        <p class="section_heading" id="mismatch_password">Given passwords don't match</p>

        <a href="#" class="bidzbutton next_button" id="submit_new_password">Submit New Password</a>

        </form>
    </div>
</section>


<?php include "includes/footer.php"; ?>
<script>

    // Click for username / email
    $("#show_questions").click(function(e){
        e.preventDefault();


        $("#empty_username, #wrong_username").css("display", "none");
        var username = $("#username").val();

        if(username == ""){
            $("#empty_username").css("display", "block");
            return false;
        }


        $.post("forgotten_ajax.php",
        {
            username: username,
            type: "username"
        },
        function(data, status){
            if(data == "no_match"){
                $("#wrong_username").css("display", "block");
            }
            else{
               

                var dts = data.split("||??&&");

                var uname = dts[0];
                var qs = dts[1];
                var qts = qs.split("=");
                var question1 = qts[0];
                var question2 = qts[1];

                var us = uname.split("??||");
                $("#username_placeholder").val(us[1]);

                $.post("forgotten_ajax.php",
                {
                    question1: question1,
                    question2: question2,
                    type: "questions"
                },
                function(ques, status){
                    var n_questions = ques.split("||??&&");
                    var n_question1 = n_questions[0];
                    var n_question2 = n_questions[1];

                    $("#question1_label").html(n_question1);
                    $("#question2_label").html(n_question2);
                });

                $("#security_questions").slideToggle();

                $("#enter_username").slideToggle(); 
            }
        });



    });

    // Click for security questions
    $("#show_password_change").click(function(e){
        e.preventDefault();

        $("#wrong_answers, #empty_answers").css("display", "none");

        var answer1 = $("#answer1").val();
        var answer2 = $("#answer2").val();

        if(answer1 == "" || answer2 == ""){
            $("#empty_answers").css("display", "block");
            return false;
        }

        
        $.post("forgotten_ajax.php",
        {
            answer1: answer1,
            answer2: answer2,
            type: "answers"
        },
        function(data, status){
            if(data == "bad"){
                $("#wrong_answers").css("display", "block");
            }
            else if(data == "good"){

                $("#security_questions").slideToggle();

                $("#new_password").slideToggle();
            }
        });
    });

    // Click for new password
    $("#submit_new_password").click(function(e){
        e.preventDefault();

        $("#mismatch_password, #empty_password").css("display", "none");

        var pass_one = $("#password").val();
        var pass_two = $("#confirm_password").val();

        if(pass_one == "" || pass_two == ""){
            $("#empty_password").css("display", "block");
            return;
        }

        if(pass_one != pass_two){
            $("#mismatch_password").css("display", "block");
            return;
        }

        document.getElementById("forgotten_submit").submit();
    });
</script>