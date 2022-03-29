<?php include "../includes/connect.php"; ?>
<?php include "../includes/username.php"; ?>


<?php 
    // Get all accounts from database
    $ids = array();
    $usernames = array();
    $emails = array();
    $firsts = array();
    $lasts = array();
    $sql = "SELECT * FROM `house` WHERE `owner`='$username'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $username = $row['username'];
        $email = $row['email'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];

        array_push($ids, $id);
        array_push($usernames, $username);
        array_push($emails, $email);
        array_push($firsts, $first_name);
        array_push($lasts, $last_name);
    }
?>

<!-- Main House Account Modal -->
<div id="house_account_modal_container" class="catalog_modal">

    <div class="modal_content house_account_modal">
    
        <h2 class="house_heading section_heading"><span>Manage House Accounts</span></h2>
        
        <div class="button_container">
            <a href="#" class="bidzbutton" id="open_creator"><i class="fas fa-user-friends"></i> Add House Account</a>

            <a href="#" class="bidzbutton orange" id="close_manager">Close</a>
        </div>

        <div class="table" id="house_account_list">
            <div class="table-row table-header">
                <div class="table-head">First Name</div>
                <div class="table-head">Last Name</div>
                <div class="table-head">Username</div>
                <div class="table-head">Email</div>
                
                <div class="table-head">Edit</div>
                <div class="table-head">Delete</div>
            </div>

            <!-- House account list goes here -->

        </div>
    </div>
</div>

<!-- Edit House Account Modal -->

<div id="edit_house_modal_container">
    <div id="edit_house_modal">
        <h1>Edit House Account</h1>
        
            <div class="catalog_row signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="edit_first_name" class="input_label">First Name <span class="required">*</span></label>
                        <input type="text" class="input_text" name="edit_first_name" id="edit_first_name" placeholder="First Name">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="edit_last_name" class="input_label">Last Name <span class="required">*</span></label>
                        <input type="text" class="input_text" name="edit_last_name" id="edit_last_name" placeholder="Last Name">
                    </div>
                </div>
            </div>
            <div class="catalog_row signup_row">
                <div class="col2">
                    <div class="signup_group">
                        <label for="edit_username" class="input_label">Username <span class="required">*</span></label>
                        <input type="text" class="input_text" name="edit_username" id="edit_username" placeholder="Username">
                    </div>
                </div>
                <div class="col2">
                    <div class="signup_group">
                        <label for="edit_email" class="input_label">Email <span class="required">*</span></label>
                        <input type="text" class="input_text" name="edit_email" id="edit_email" placeholder="Email">
                    </div>
                </div>
            </div>

            <input type="hidden" name="edit_id" id="edit_id">

            <input type="hidden" name="original_username" id="original_username">
            <input type="hidden" name="original_email" id="original_email">

            <div class="catalog_row signup_row operations">
                <div class="col1 buttons">
                    <a class="bidzbutton devart" href="#" id="edit_house_submit">Edit House Account</a>

                    <a href="#" class="bidzbutton orange close_modal" id="close_edit_house_account_modal">Cancel</a>
                </div>
            </div>
    </div>
</div>


<!-- Add House Account Modal -->
<div id="house_account_creator_container" class="catalog_modal">
    <div class="modal_content add_house_account_modal">
        <h1>Create House Account</h1>

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
                    <input type="text" class="input_text" name="last_name" id="last_name" placeholder="Last Name">
                </div>
            </div>
        </div>

        <div class="catalog_row signup_row">
            <div class="col2">
                <div class="signup_group">
                    <label for="username" class="input_label">Username <span class="required">*</span></label>
                    <input type="text" class="input_text" name="username" id="username" placeholder="Username">
                </div>
            </div>
            <div class="col2">
                <div class="signup_group">
                    <label for="email" class="input_label">Email <span class="required">*</span></label>
                    <input type="text" class="input_text" name="email" id="email" placeholder="Email">
                </div>
            </div>
        </div>

        <div class="catalog_row signup_row">
            <div class="col2">
                <div class="signup_group">
                    <label for="password" class="input_label">Password <span class="required">*</span></label>
                    <input type="text" class="input_text" name="password" id="password" placeholder="Password">
                </div>
            </div>
            <div class="col2">
                <div class="signup_group">
                    <label for="confirm" class="input_label">Confirm Password <span class="required">*</span></label>
                    <input type="text" class="input_text" name="confirm" id="confirm" placeholder="Confirm Password">
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

                
        <div class="catalog_row signup_row operations">
            <div class="col1 buttons">
                <a class="bidzbutton devart" href="#" id="add_house_account_action">Add House Account</a>

                <a href="#" class="bidzbutton orange " id="close_house_account_creator">Cancel</a>
            </div>
        </div>
    </div>
</div>
<!-- <script src="<?php echo $root; ?>js/jquery.js"></script> -->
<script>
    <?php
        $js_ids = json_encode($ids);
        $js_first = json_encode($firsts);
        $js_last = json_encode($lasts);
        $js_username = json_encode($usernames);
        $js_email = json_encode($emails);

        echo "var start_ids = " . $js_ids . ";\n";
        echo "var start_first = " . $js_first . ";\n";
        echo "var start_last = " . $js_last . ";\n";
        echo "var start_username = " . $js_username . ";\n";
        echo "var start_email = " . $js_email . ";\n";
    ?>

    var house_accounts = [];
    
    // Create Constructors
    function House(id, first_name, last_name, username, email) {
        this.id = id;
        this.first_name = first_name;
        this.last_name = last_name;
        this.username = username;
        this.email = email;
    }

    for(var h = 0; h < start_ids.length; h++){
        var curr_id = start_ids[h];
        var curr_first = start_first[h];
        var curr_last = start_last[h];
        var curr_username = start_username[h];
        var curr_email = start_email[h];


        const house_object = new House(curr_id, curr_first, curr_last, curr_username, curr_email);

        house_accounts.push(house_object);
    }

    draw_house();

    function draw_house_front(){
        $(".house_picker").empty();

        for(var h =0; h<house_accounts.length; h++){
            var curr = house_accounts[h];

            var id = curr.id;
            var first_name = curr.first_name;
            var last_name = curr.last_name;
            var username = curr.username;
            var email = curr.email;

            var tile = `
            <div class="house_node">
                <img name="${id}" src="../img/checkmark.png" alt="">
                <span>${first_name} ${last_name}</span>
                <span>${username}</span>
                <span>${email}</span>
            </div>`;

            $(".house_picker").append(tile);
        }

        var house_leftover = house_accounts.length % 3;
        if(house_leftover != 0){
            house_leftover = 3 - house_leftover;
        }

        for(var i =0; i < house_leftover; i++){
            var empty_tile = `<div class="house_node visibility_hidden"></div>`;
            $(".house_picker").append(empty_tile);
        }

    }

    function draw_house(){

        draw_house_front();
        
        $("#house_account_list").empty();

        var start_template = `
            <div class="table-row table-header">
                <div class="table-head">First Name</div>
                <div class="table-head">Last Name</div>
                <div class="table-head">Username</div>
                <div class="table-head">Email</div>
                
                <div class="table-head">Edit</div>
                <div class="table-head">Delete</div>
            </div>
        `;

        $("#house_account_list").append(start_template);

        for(var i =0; i < house_accounts.length; i++){
            var obj = house_accounts[i];

            var id = obj.id;
            var first_name = obj.first_name;
            var last_name = obj.last_name;
            var username = obj.username;
            var email = obj.email;

            var template = `
                <div class="table-row">
                    <div class="table-cell">${first_name}</div>
                    <div class="table-cell">${last_name}</div>
                    <div class="table-cell">${username}</div>
                    <div class="table-cell">${email}</div>

                    <div class="table-cell"><a class="edit_house_modal_button" name="edit_house_${id}" style="color:black;" href="#"><i class="fas fa-edit cursor_pointer"></i></a></div>

                    <div class="table-cell"><a class="delete_house_modal_button" name="delete_house_${id}" style="color:black;" href="#"> <i class="far fa-trash-alt cursor_pointer"></i> </a></div>
                </div>
            `;

            $("#house_account_list").append(template);
        }
    }
</script>

<script>

    $("#close_edit_house_account_modal").click(function(e){
        e.preventDefault();

        $("#edit_house_modal_container").css("display", "none");
    });

    $("#close_manager").click(function(e){
        e.preventDefault();

        $("#house_account_modal_container").css("display", "none");

        $("#manage_house_account_button").focus();
    });

    $("#close_house_account_creator").click(function(e){
        e.preventDefault();

        $("#house_account_creator_container").css("display", "none");
    });

    $("#open_creator").click(function(e){
        e.preventDefault();

        // clear out all fields
        $("#first_name").val("");
        $("#last_name").val("");
        $("#username").val("");
        $("#email").val("");
        $("#password").val("");
        $("#confirm").val("");
        $("#question1").val("");
        $("#answer1").val("");
        $("#question2").val("");
        $("#answer2").val("");


        $("#house_account_creator_container").css("display", "block");
    });

    $(document).on("click", "a.delete_house_modal_button", function(e){
        e.preventDefault();
    
        var name = $(this).attr("name");
        var id = name.replace("delete_house_", "");

        var v = $("#active_house_accounts").val();
        var rep = "||" + id + "||";
        var newt = v.replace(rep, "||");
        $("#active_house_accounts").val(newt);

        for(var h = 0; h<house_accounts.length; h++){
            var obj = house_accounts[h];

            if(obj.id == id){
                house_accounts.splice(h, 1);

                draw_house();
                break;
            }
        }

        // remove from db
        $.ajax({
                type: 'POST',
                url: 'ajax_house.php',
                data: {
                    type: "delete",
                    id: id
                },
                success: function (data) {
                }
            });
    });
    
    $(document).on("click", "a.edit_house_modal_button", function(e){
        e.preventDefault();
               
        var name = $(this).attr("name");

        var id = name.replace("edit_house_", "");

        $("#edit_house_modal_container").css("display", "block");

        var first;
        var last;
        var email;
        var username;
        // Get house account object
        for(var h = 0; h < house_accounts.length; h++){
            var obj = house_accounts[h];

            if(obj.id == id){
                first = obj.first_name;
                last = obj.last_name;
                username = obj.username;
                email = obj.email;

                $("#edit_id").val(id);
                $("#original_email").val(email);
                $("#original_username").val(username);

                $("#edit_first_name").val(first);
                $("#edit_last_name").val(last);
                $("#edit_username").val(username);
                $("#edit_email").val(email);

                return;
            }

        }
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

       
       return 1;

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

        
       
       return 1;
    }

    $("#edit_house_submit").click(function(e){
        e.preventDefault();

        var v = validate_edit_house();

        if(v == 1){
            var first_name = $("#edit_first_name").val();
            var last_name = $("#edit_last_name").val();
            var username = $("#edit_username").val();
            var email = $("#edit_email").val()

            var id = $("#edit_id").val();

            $.ajax({
                type: 'POST',
                url: 'ajax_house.php',
                data: {
                    type: "edit",
                    edit_id: id,
                    edit_first_name: first_name,
                    edit_last_name: last_name,
                    edit_username: username,
                    edit_email: email,
                    original_username: $("#original_username").val()
                },
                success: function (data) {
                    var comps = data.split("??||&&");

                    var id = comps[0];
                    var first = comps[1];
                    var last = comps[2];
                    var username = comps[3];
                    var email = comps[4];

                    // Get house object corresponding to id
                    for(var h = 0; h < house_accounts.length; h++){
                        var curr = house_accounts[h];

                        if(curr.id == id){
                            curr.first_name = first;
                            curr.last_name = last;
                            curr.email = email;
                            curr.username = username;

                            house_accounts[h] = curr;

                            break;
                        }
                    }

                    draw_house();
                }
            });
            $("#edit_house_modal_container").css("display", "none");
        }

    });

    $("#add_house_account_action").click(function(e){
        e.preventDefault();

        var v = validate_house();
       
        if(v == 1){
            var first_name = $("#first_name").val();
            var last_name = $("#last_name").val();
            var username = $("#username").val();
            var email = $("#email").val();
            var password = $("#password").val();

            var question1 = $("#question1").val();
            var answer1 = $("#answer1").val();

            var question2 = $("#question2").val();
            var answer2 = $("#answer2").val();

            $.ajax({
                type: 'POST',
                url: 'ajax_house.php',
                data: {
                    type: "add",

                    first_name: first_name,
                    last_name: last_name,
                    username: username,
                    email: email,

                    password: password,
                    question1: question1,
                    answer1: answer1,
                    question2: question2,
                    answer2: answer2

                },
                success: function (data) {
                    var comps = data.split("??||&&");

                    var id = comps[0];
                    var first = comps[1];
                    var last = comps[2];
                    var username = comps[3];
                    var email = comps[4];

                    var house_object = new House(id, first, last, username, email);
                    house_accounts.push(house_object);

                    draw_house();
                }
            });
            
            $("#house_account_creator_container").css("display", "none");
        }

    });

</script>