<?php include "../includes/header.php"; ?>
<?php include "../includes/connect.php"; ?>

<?php
    if(isset($_POST['add_house_trigger'])){
        $username_entered = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = md5($_POST['password']);
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);

        $question1 = mysqli_real_escape_string($conn, $_POST['question1']);
        $answer1 = mysqli_real_escape_string($conn, $_POST['answer1']);
        $question2 = mysqli_real_escape_string($conn, $_POST['question2']);
        $answer2 = mysqli_real_escape_string($conn, $_POST['answer2']);

        $owner = $username;

        $house_sql = "INSERT INTO `house` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `question1`, `answer1`, `question2`, `answer2`, `owner`) VALUES (NULL, '$username_entered', '$email', '$password', '$first_name', '$last_name', '$question1', '$answer1', '$question2', '$answer2', '$owner');";
        
        mysqli_query($conn, $house_sql);

        $ip = $_SERVER['REMOTE_ADDR'];

        $account_type = "house";
        $account_sql = "INSERT INTO `accounts` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `type`, `IP_address`) VALUES (NULL, '$username_entered', '$email', '$password', '$first_name', '$last_name', '$account_type','$ip')";

        mysqli_query($conn, $account_sql);

        ?>
        <script>
            window.location.assign("house_accounts.php");
        </script>
        <?php
    }
    else if(isset($_POST['edit_house_trigger'])){
        $first_name = mysqli_real_escape_string($conn, $_POST['edit_first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['edit_last_name']);
        $username_entered = mysqli_real_escape_string($conn, $_POST['edit_username']);
        $email = mysqli_real_escape_string($conn, $_POST['edit_email']);
        $id = $_POST['edit_id'];
        
        $sql = "SELECT * FROM `house` WHERE `id` = $id;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $owner = $row['owner'];

        if($username != $owner){
            return;
        }
        $orig_username = $_POST['original_username'];

        $house_update_sql = "UPDATE `house` SET `email` = '$email', `username` = '$username_entered', `first_name` = '$first_name', `last_name` = '$last_name' WHERE `house`.`id` = $id;";
        mysqli_query($conn, $house_update_sql);

        $ip = $_SERVER['REMOTE_ADDR'];

        $account_update_sql = "UPDATE `accounts` SET `username` = '$username_entered', `email` = '$email', `first_name`= '$first_name', `last_name`='$last_name',`IP_address`='$ip' WHERE `accounts`.`username` = '$orig_username';";
        mysqli_query($conn, $account_update_sql);
        
        ?>
        <script>
            window.location.assign("house_accounts.php");
        </script>
        <?php
    }
    else if(isset($_GET['delete_house'])){
        $delete_id = $_GET['delete_house'];
        $sql = "SELECT * FROM house WHERE id=$delete_id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $username_entered = $row['username'];
            $owner = $row['owner'];
        }

        if($username == $owner){

            $delete_house_sql = "DELETE FROM `house` WHERE `house`.`username` = '$username_entered'";
            mysqli_query($conn, $delete_house_sql);

            $delete_account_sql = "DELETE FROM `accounts` WHERE `accounts`.`username` = '$username_entered'";
            mysqli_query($conn, $delete_account_sql);
            
            ?>
            <script>
                window.location.assign("house_accounts.php");
            </script>
            <?php
        }
    }
?>

<div id="add_house_modal_container">

    <div id="add_house_modal">
        <h1>Create House Account</h1>

        <form action="" method="post" name="add_house_account_form" id="add_house_account_form">
            <div class="catalog_row signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="first_name" class="input_label">First Name</label>
                        <input type="text" class="input_text" name="first_name" id="first_name" placeholder="First Name">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="last_name" class="input_label">Last Name</label>
                        <input type="text" class="input_text" name="last_name" id="last_name" placeholder="Last Name">
                    </div>
                </div>
            </div>
            <div class="catalog_row signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="username" class="input_label">Username</label>
                        <input type="text" class="input_text" name="username" id="username" placeholder="Username">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="email" class="input_label">Email</label>
                        <input type="text" class="input_text" name="email" id="email" placeholder="Email">
                    </div>
                </div>
            </div>
            <div class="catalog_row signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="password" class="input_label">Password</label>
                        <input type="password" class="input_text" name="password" id="password" placeholder="Password">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="confirm" class="input_label">Confirm Password</label>
                        <input type="password" class="input_text" name="confirm" id="confirm" placeholder="Confirm Password">
                    </div>
                </div>
            </div>


            <div class="catalog_row signup_row">
                <div class="col2">
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
                <div class="col2">
                    <div class="signup_group">
                        <label for="answer1" class="input_label">Security Answer 1 <span class="required">*</span></label>
                        <input type="text" class="input_text"  name="answer1" id="answer1" placeholder="Answer to Security Question">
                    </div>
                </div>
            </div>
            
            <div class="catalog_row signup_row">
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

            <input type="hidden" name="add_house_trigger" id="add_house_trigger" value="1">
            
                
            <div class="catalog_row signup_row operations">
                <div class="col1 buttons">
                    <a class="bidzbutton devart" href="javascript: validate_house();">Add House Account</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="edit_house_modal_container">
    <div id="edit_house_modal">
        <h1>Edit House Account</h1>
        
    <form action="" method="post" name="edit_house_account_form" id="edit_house_account_form">
            <div class="catalog_row signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="edit_first_name" class="input_label">First Name</label>
                        <input type="text" class="input_text" name="edit_first_name" id="edit_first_name" placeholder="First Name">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="edit_last_name" class="input_label">Last Name</label>
                        <input type="text" class="input_text" name="edit_last_name" id="edit_last_name" placeholder="Last Name">
                    </div>
                </div>
            </div>
            <div class="catalog_row signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="edit_username" class="input_label">Username</label>
                        <input type="text" class="input_text" name="edit_username" id="edit_username" placeholder="Username">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="edit_email" class="input_label">Email</label>
                        <input type="text" class="input_text" name="edit_email" id="edit_email" placeholder="Email">
                    </div>
                </div>
            </div>

            <input type="hidden" name="edit_house_trigger" id="edit_house_trigger" value="1">
            
            <input type="hidden" name="edit_id" id="edit_id">


            <input type="hidden" name="original_username" id="original_username">
            <input type="hidden" name="original_email" id="original_email">
                
            <div class="catalog_row signup_row operations">
                <div class="col1 buttons">
                    <a class="bidzbutton devart" href="javascript: validate_edit_house();">Edit House Account</a>

                    <a href="#" class="bidzbutton orange close_modal">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

<section class="house_accounts" id="house_accounts">

    <h2 class="house_heading section_heading"><span>Manage House Accounts</span></h2>

    <div class="add_button">
        <a href="#" id="add_house_account" class="bidzbutton"><i class="fas fa-user-friends"></i> Add House Account</a>
    </div>

    <div class="table">
        <div class="table-row table-header">
            <div class="table-head">First Name</div>
            <div class="table-head">Last Name</div>
            <div class="table-head">Username</div>
            <div class="table-head">Email</div>
            <div class="table-head">Edit</div>
            <div class="table-head">Delete</div>
        </div>

        <?php
            if(!$username){
                $username = -1;
            }

            $ids = array();
            $first = array();
            $last = array();
            $usernames = array();
            $emails = array();

            $table_sql = "SELECT * FROM house WHERE `owner`='$username' ORDER BY id";
            $result = mysqli_query($conn, $table_sql);
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $username_entered = $row['username'];
                $email = $row['email'];

                array_push($ids, $id);
                array_push($first, $first_name);
                array_push($last, $last_name);
                array_push($usernames, $username_entered);
                array_push($emails, $email);
                ?>

                <div class="table-row">
                    <div class="table-cell"><?php echo $first_name; ?></div>
                    <div class="table-cell"><?php echo $last_name; ?></div>
                    <div class="table-cell"><?php echo $username_entered; ?></div>
                    <div class="table-cell"><?php echo $email; ?></div>

                    <div class="table-cell"><a class="edit_house_modal_button" name="edit_house_<?php echo $id; ?>" style="color:black;"  href="#"><i class="fas fa-edit cursor_pointer"></i></a></div>
                    <div class="table-cell"><a name="delete_house_<?php echo $id; ?>" style="color:black;" href="?delete_house=<?php echo $id; ?>"><i class="far fa-trash-alt cursor_pointer"></i></a></div>
                </div>

                <?php
            }
        ?>
    </div>

</section>

<?php include "../includes/footer.php"; ?>

<!-- Add current house accounts to array of objects -->
<script>
    <?php
        $js_ids = json_encode($ids);
        $js_first = json_encode($first);
        $js_last = json_encode($last);
        $js_username = json_encode($usernames);
        $js_email = json_encode($emails);

        echo "var start_ids = " . $js_ids . ";\n";
        echo "var start_first = " . $js_first . ";\n";
        echo "var start_last = " . $js_last . ";\n";
        echo "var start_username = " . $js_username . ";\n";
        echo "var start_email = " . $js_email . ";\n";
    ?>

    
    // Create Constructors
    function House(id, first_name, last_name, username, email) {
        this.id = id;
        this.first_name = first_name;
        this.last_name = last_name;
        this.username = username;
        this.email = email;
    }

    var house_accounts = [];

    for(var h = 0; h < start_ids.length; h++){
        var curr_id = start_ids[h];
        var curr_first = start_first[h];
        var curr_last = start_last[h];
        var curr_username = start_username[h];
        var curr_email = start_email[h];


        const house_object = new House(curr_id, curr_first, curr_last, curr_username, curr_email);

        house_accounts.push(house_object);
    }

    console.log(house_accounts);


</script>

<script>
    $(".close_modal").click(function(){
        $("#add_house_modal_container").hide();
        $("#edit_house_modal_container").hide();
    });

    $("#add_house_account").click(function(){
        $("#add_house_modal_container").show();
    });
    
    
    $(".edit_house_modal_button").click(function(){
        $("#edit_house_modal_container").show();
        
        var name = $(this).attr("name");

        var id = name.replace("edit_house_", "");

        var obj;

        for(var h = 0; h<house_accounts.length; h++){
            var curr_house = house_accounts[h];

            var curr_id = curr_house.id;

            if(curr_id === id){
                obj = curr_house;
            }
        }

        console.log(obj);
        
        var id = obj.id;
        var first_name = obj.first_name;
        var last_name = obj.last_name;
        var username = obj.username;
        var email = obj.email;

        $("#edit_first_name").val(first_name);
        $("#edit_last_name").val(last_name);
        $("#edit_username").val(username);
        $("#edit_email").val(email);
        $("#edit_id").val(id);

        $("#original_username").val(username);
        $("#original_email").val(email);
    });

    // Reset input
    $("input").click(function(){
        $(this).css("background-color", "whitesmoke");
    });

    $("input").keypress(function(){
        $("input").css("background-color", "whitesmoke");
    });
    
    $("select").change(function () {
        $(this).css("background-color", "whitesmoke");
    });
    
    function validate_house(){
        var first_name = $("#first_name").val();
        var last_name = $("#last_name").val();
        var username = $("#username").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var confirm_password = $("#confirm").val();

        var question1 = $("#question1").val();
        var answer1 = $("#answer1").val();
        var question2 = $("#question2").val();
        var answer2 = $("#answer2").val();

        if(first_name == ""){
            alert("Please enter the first name");
            $("#first_name").css("background-color", "lightpink");
            $("#first_name").focus();
            return;
        }

        if(last_name == ""){
            alert("Please enter the last name");
            $("#last_name").css("background-color", "lightpink");
            $("#last_name").focus();
            return;
        }

        var username_flag = false;
        if(username == ""){
            alert("Please enter a unique username");
            $("#username").css("background-color", "lightpink");
            $("#username").focus();
            return;
        }
        else{
            $.ajax({
                type: 'POST',
                url: "../ajax/sign_up/username.php",
                async: false,
                dataType: "html",
                data: {
                    'username': username
                },
                success: function (msg) {
                    if (msg != "0") {
                        alert("Username already exists");
                        $("#username").css("background-color", "lightpink");
                        $("#username").focus();
                        username_flag = true;
                    }
                }
            });
            if (username_flag) {
                return;
            }
        }

        var email_flag = false;
        if(email == ""){
            alert("Please enter a unique email address");
            $("#email").css("background-color", "lightpink");
            $("#email").focus();
            return;
        }
        else {
            var patt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            var result = patt.test(email);
            if (!result) {
                alert("Email must be in traditional email format");
                $("#email").css("background-color", "lightpink");
                $("#email").focus();
                return;
            }
            else {
                $.ajax({
                    type: 'POST',
                    url: "../ajax/sign_up/email.php",
                    async: false,
                    dataType: "html",
                    data: {
                        'email': email
                    },
                    success: function (msg) {
                        if (msg != "0") {
                            alert("Email already exists");
                            $("#email").css("background-color", "lightpink");
                            $("#email").focus();
                            email_flag = true;
                        }
                    }
                });
                if (email_flag) {
                    return;
                }
            }
        }

        if(password == ""){
            alert("Please enter a password");
            $("#password").css("background-color", "lightpink");
            $("#password").focus();
            return;
        }

        if(confirm_password == ""){
            alert("Please confirm your password");
            $("#confirm").css("background-color", "lightpink");
            $("#confirm").focus();
            return;
        }
        else{
            if(confirm_password != password){
                alert("Your password doesn't match");
                $("#confirm").css("background-color", "lightpink");
                $("#confirm").focus();
                return;
            }
        }

        if(question1 == ""){
            alert("Please choose the first security question");
            $("#question1").css("background-color", "lightpink");
            $("#question1").focus();
            return;
        }

        if(answer1 == ""){
            alert("Please answer the first security question");
            $("#answer1").css("background-color", "lightpink");
            $("#answer1").focus();
            return;
        }
    
        if(question2 == ""){
            alert("Please choose the second security question");
            $("#question2").css("background-color", "lightpink");
            $("#question2").focus();
            return;
        }

        if(answer2 == ""){
            alert("Please answer the second security question");
            $("#answer2").css("background-color", "lightpink");
            $("#answer2").focus();
            return;
        }

       
       
        document.add_house_account_form.submit();

    }
    
    function validate_edit_house(){
        var first_name = $("#edit_first_name").val();
        var last_name = $("#edit_last_name").val();
        var username = $("#edit_username").val();
        var email = $("#edit_email").val();

        var orig_username = $("#original_username").val();
        var orig_email = $("#original_email").val();

        if(first_name == ""){
            alert("Please enter the first name");
            $("#edit_first_name").css("background-color", "lightpink");
            $("#edit_first_name").focus();
            return;
        }
        
        if(last_name == ""){
            alert("Please enter the last name");
            $("#edit_last_name").css("background-color", "lightpink");
            $("#edit_last_name").focus();
            return;
        }
        
        var username_flag = false;
        if(username == ""){
            alert("Please enter a unique username");
            $("#edit_username").css("background-color", "lightpink");
            $("#edit_username").focus();
            return;
        }
        else if(username == orig_username){
            // Do nothing
        }
        else{
            $.ajax({
                type: 'POST',
                url: "../ajax/sign_up/username.php",
                async: false,
                dataType: "html",
                data: {
                    'username': username
                },
                success: function (msg) {
                    if (msg != "0") {
                        alert("Username already exists");
                        $("#edit_username").css("background-color", "lightpink");
                        $("#edit_username").focus();
                        username_flag = true;
                    }
                }
            });
            if (username_flag) {
                return;
            }
        }

        
        var email_flag = false;
        if(email == ""){
            alert("Please enter a unique email address");
            $("#edit_email").css("background-color", "lightpink");
            $("#edit_email").focus();
            return;
        }
        else if(email == orig_email){
            // Do nothing
        }
        else {
            var patt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            var result = patt.test(email);
            if (!result) {
                alert("Email must be in traditional email format");
                $("#edit_email").css("background-color", "lightpink");
                $("#edit_email").focus();
                return;
            }
            else {
                $.ajax({
                    type: 'POST',
                    url: "../ajax/sign_up/email.php",
                    async: false,
                    dataType: "html",
                    data: {
                        'email': email
                    },
                    success: function (msg) {
                        if (msg != "0") {
                            alert("Email already exists");
                            $("#edit_email").css("background-color", "lightpink");
                            $("#edit_email").focus();
                            email_flag = true;
                        }
                    }
                });
                if (email_flag) {
                    return;
                }
            }
        }

        
        document.edit_house_account_form.submit();
    }
</script>