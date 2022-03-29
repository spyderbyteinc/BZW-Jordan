<section id="catalog_registration_module">


    <h4 class="seller_dashboard_module_heading"><span>Catalog Registration</span></h4>


    <div id="catalog_registration_list">


    <?php
                $catalog_sql = "SELECT * FROM `catalogs` WHERE `owner`='$username' AND `published`=1";
                $catalog_result = mysqli_query($conn, $catalog_sql);
                while ($catalog_row = mysqli_fetch_assoc($catalog_result)) {
                    $catalog_id = $catalog_row['id'];
                    $catalog_name = $catalog_row['catalog_name'];
                    $catalog_description = $catalog_row['catalog_description'];

                    $asset_location_1 = $catalog_row['asset_location_1'];
                    $asset_location_2 = $catalog_row['asset_location_2'];
                    $asset_location_3 = $catalog_row['asset_location_3'];
                    $asset_location_4 = $catalog_row['asset_location_4'];
                    $asset_location_5 = $catalog_row['asset_location_5'];

                    $asset_location_temp = array();
                    array_push($asset_location_temp, $asset_location_1, $asset_location_2, $asset_location_3, $asset_location_4, $asset_location_5);

                    $all_locations = array();

                    foreach ($asset_location_temp as $temp) {
                        if ($temp == "-1" || $temp == -1) {
                            continue;
                        } else {
                            array_push($all_locations, $temp);
                        }
                    } 
                    
                    $num_locations = count($all_locations);

                    $location_output;

                    if($num_locations == 1){
                        $location_output = '<span class="asset_location">Asset Location(s): <a href="#"class="show_location_modal "><span id="" class="location_hover_browse" name="location_button_open_single_map_' . $catalog_id . '">' . loc_output($asset_location_1) . '</span></a></span>';
                    }
                    else{
                        $location_output = '<span class="asset_location">Asset Location(s): <a href="#" class="show_location_modal "><span id="" class="location_hover_browse" name="location_button_open_multiple_map_' . $catalog_id . '">View all locations for this catalog (' . $num_locations . ')</span></a></span>';
                    }

                    // get catalog pictures
                    $pic_sql = "SELECT * FROM `catalog_pictures` WHERE `cat_id`=$catalog_id";
                    $pic_result = mysqli_query($conn, $pic_sql);
                    $pic_row = mysqli_fetch_assoc($pic_result);

                    $picture_link = $pic_row['picture'];

                    if(!$picture_link){
                        $picture_link = "no_image.png";
                    }
                    ?>

        <div class="catalog_block">
            <div class="catalog_item">
                <div class="catalog_contents">

                    <div class="catalog_left">
                        <img src="https://bidzwon.com/dev/catalogs/featured_img/<?php echo $picture_link; ?>" alt="Catalog Image" class="catalog_image">

                        <a href="#" class="bidzbutton devart view_catalog_details"><i class="far fa-eye" aria-hidden="true"></i> View Catalog Details</a>
                    </div>
                    <div class="catalog_right">
                        <h2 class="catalog_name"><?php echo $catalog_name; ?></h2>

                        <span class="catalog_description"><?php echo $catalog_description; ?></span>

                        <p class="asset_location"><?php echo $location_output; ?></p>

                        <p class="catalog_countdown">Ends in: 20min</p>
                    </div>
                </div>
                <div class="catalog_view_more" id="view_more_button_<?php echo $catalog_id; ?>">
                    View Registrants <span class="arrow"><i class="fas fa-chevron-down arrow" aria-hidden="true"></i></span>
                </div>
            </div>


            <div class="list_of_registrants" id="list_of_registrants_container_<?php echo $catalog_id; ?>">
            <?php
                $reg_list = "SELECT * FROM `catalog_registration` WHERE `cat_id`=$catalog_id";
                $reg_result = mysqli_query($conn, $reg_list);
                while ($reg_row = mysqli_fetch_assoc($reg_result)) {
                    $record_id = $reg_row['id'];
                    $record_username = $reg_row['user'];
                    $record_status = $reg_row['status'];

                    $record_status_output = "";
                    
                    if($record_status == "approved"){
                        $record_status_output = '<span class="record_status approved_record"><i class="fas fa-check-circle" aria-hidden="true"></i> Approved</span>';
                    }
                    else if($record_status == "pending"){
                        $record_status_output = '<span class="record_status pending_record"><i class="fas fa-hourglass-half" aria-hidden="true"></i> Pending</span>';
                    }
                    else if($record_status == "denied"){
                        $record_status_output = '<span class="record_status denied_record"><i class="fas fa-exclamation-circle"></i> Denied</span>';
                    }
                    else{
                        $record_status_output = "ERROR";
                    }

                    // see if catalog requires questions
                    $question1 = $reg_row['question1'];
                    $answer1 = $reg_row['answer1'];
                    $question2 = $reg_row['question2'];
                    $answer2 = $reg_row['answer2'];

                    $no_questions = false;
                    if($question1 == "-1" && $answer1 == "-1" && $question2 == "-1" && $answer2 == "-1"){
                        $no_questions = true;
                    }


                    // get user's full name
                    $user_sql = "SELECT * FROM `users` WHERE `username`='$record_username'";
                    $user_result = mysqli_query($conn, $user_sql);
                    $user_row = mysqli_fetch_assoc($user_result);
                    
                    $user_first_name = $user_row['first_name'];
                    $user_last_name = $user_row['last_name'];

                    $user_full_name = $user_first_name . " " . $user_last_name;

                    ?>

                <div class="registrant_record">
                    <div class="record_left">
                        <span class="record_name"><?php echo $user_full_name; ?></span>
                        <span class="record_username"><?php echo $record_username; ?></span>
                        <span id="status_output_<?php echo $record_username; ?>catalog_id_<?php echo $catalog_id; ?>" class="record_status_output"><?php echo $record_status_output; ?></span>
                    </div>
                    <div class="record_right">
                        <?php if(!$no_questions) : ?>
                        <a href="#" id="user_answers_<?php echo $record_username; ?>??||&&catalog_id_<?php echo $catalog_id; ?>" class="view_registration_answers bidzbutton devart view_answers"><i class="far fa-eye"></i> View Answers</a>
                        <?php else : ?>
                        <span class="no_answers_needed">No Answers Needed</span>
                        <?php endif ; ?>
                        <a href="#" class="bidzbutton medblue message_user"><i class="far fa-comments" aria-hidden="true"></i> Message User</a>
                        <a href="#" class="bidzbutton orange view_record_details"><i class="far fa-user-circle"></i> View User Details</a>
                    </div>
                </div>
            

            <?php
                }
            ?>
            </div>
        </div>

        <hr class="orange">
        <hr class="black">
            <?php
                }
            ?>
    </div>


</section>

<!-- View Answers Modal -->
<div id="view_answers_modal_container">
    <div id="view_answers_modal">
        <h2>User Answers</h2>

        <div id="all_question_list">

        </div>

        <hr class="orange">
        
        <br>

        <p id="ethical_disclaimer"><strong>Please Note: </strong>Because of ethical constraints you will not be able to change your mind after you approve or deny a user.</p>

        <br>

        <input type="hidden" name="registration_user" id="registration_user" value="">
        <input type="hidden" name="registration_catalog" id="registration_catalog" value="">
        <input type="hidden" name="registration_id" id="registration_id" value="">

        <div id="action_buttons">
        

        </div>
    </div>
</div>
<script src="<?php echo $root; ?>js/jquery.js"></script>

<script>


    function cancel_button(e){
        e.preventDefault();

        console.log("hello");

        $("#view_answers_modal_container").css("display","none");
    };

</script>
<script>
    $( ".catalog_view_more" ).on( "click", function() {
        var button = $(this);

        var arrow = button.find(".arrow svg");

        var id = $(this).attr("id");

        var catalog_id = id.replace("view_more_button_", "");

        var list_id = "#list_of_registrants_container_" + catalog_id;

        var list_element = $(list_id);

        if(list_element.is(":visible")){
            $(list_element).slideUp(500, function() { 
                $(this).css('display', 'none');
            });

            arrow.css("transform", "rotate(0deg)");
        }
        else{
           $(list_element).slideDown(500, function() { 
                $(this).css('display', 'block');
            });
            arrow.css("transform", "rotate(180deg)");
        }
    });

    $( ".view_registration_answers" ).on( "click", function(e) {
        e.preventDefault();

        var id = $(this).attr("id");

        var comps = id.split("??||&&");
        var username_sect = comps[0];
        var catalog_id_sect = comps[1];

        var username = username_sect.replace("user_answers_", "");
        var catalog_id = catalog_id_sect.replace("catalog_id_", "");

        console.log(username, catalog_id);

        // get question & answer data from table

        $.ajax({
            type: 'POST',
            url: "seller_dashboard_modules/ajax/getAnswers.php",
            async: false,
            dataType: "json",
            data: {
                'action': 'recieve',
                'catalog_id': catalog_id,
                'username': username
            },
            success: function (out) {
                var success = out['success'];
                var status = out['status'];
                
                if(success == "error"){
                    alert("Please do not mess with our system");
                    return;
                }
                
                var questions = out['questions'];
                var answers = out['answers'];
                var id = out['id'];
                
                $("#all_question_list").empty();

                $("#registration_id").val(id);
                $("#registration_user").val(username);
                $("#registration_catalog").val(catalog_id);

                for(var m = 0; m<questions.length; m++){
                    var current_question = questions[m];
                    var current_answer = answers[m];

                    var element = `
                        <div class="registration_row" id="registration_question_1">
                            <div class="col1">
                                <div class="signup_group">
                                    <label for="registration_question_1" class="input_label question_label">${current_question}</label>
                                    <p id="registration_answer_1" class="question_answer">${current_answer}</p>
                                </div>
                            </div>
                        </div>`;

                    $("#all_question_list").append(element);
                    
                }

                var complete = `
                    <a href="#" class="bidzbutton orange" onClick="cancel_button(event)" id="cancel_button">Cancel</a>
                `;

                var pending = `
                    <a href="#" class="bidzbutton devart" onClick="approve_user(event)"  id="approve_user" >Approve User</a>
                    <a href="#" class="bidzbutton orange" onClick="cancel_button(event)" id="cancel_button">Cancel</a>
                    <a href="#" class="bidzbutton red" onClick="deny_user(event)" id="deny_user">Deny User</a>
                `;

                $("#action_buttons").empty();

                if(status == "pending"){
                    $("#action_buttons").append(pending);
                }
                else{
                    $("#action_buttons").append(complete);
                }
                $("#view_answers_modal_container").css("display","block");
            }
        });

    });

    function approve_user(e){
        e.preventDefault();

        var id = $("#registration_id").val();
        var user = $("#registration_user").val();
        var catalog_id = $("#registration_catalog").val();

        $.ajax({
            type: 'POST',
            url: "seller_dashboard_modules/ajax/getAnswers.php",
            async: false,
            dataType: "json",
            data: {
                'id': id,
                'action': 'approve',
                'catalog_id': catalog_id,
                'username': user
            },
            success: function (out) {
                console.log(out);
                var status = out['success'];

                if(status == "error"){
                    alert("Please do not mess with our system");
                    return;
                }
                else if(status == "success"){
                    alert("Successfully approved user for this catalog");
                    performDecision("approve", user, catalog_id);
                }
            }
        });
    };
    
    function deny_user(e){
        e.preventDefault();

        var id = $("#registration_id").val();
        var user = $("#registration_user").val();
        var catalog_id = $("#registration_catalog").val();

        $.ajax({
            type: 'POST',
            url: "seller_dashboard_modules/ajax/getAnswers.php",
            async: false,
            dataType: "json",
            data: {
                'id': id,
                'action': 'deny',
                'catalog_id': catalog_id,
                'username': user
            },
            success: function (out) {
                console.log(out);
                var status = out['success'];

                if(status == "error"){
                    alert("Please do not mess with our system");
                    return;
                }
                else if(status == "success"){
                    alert("Successfully denied user for this catalog");
                    performDecision("deny", user, catalog_id);
                }
            }
        });
    };


    // function for when users click approve or deny
    function performDecision(decision, user, catalog_id){

        $("#view_answers_modal_container").css("display","none");

        var id = "#status_output_" + user + "catalog_id_" + catalog_id;

        console.log(id);
        $(id).empty();

        var approve_span = `<span class="record_status approved_record"><i class="fas fa-check-circle" aria-hidden="true"></i> Approved</span>`;
        
        var deny_span = `<span class="record_status denied_record"><i class="fas fa-exclamation-circle"></i> Denied</span>`;

        if(decision == "approve"){
            $(id).append(approve_span);
        }
        else if(decision == "deny"){
            $(id).append(deny_span);
        }
    }
    
</script>
<!-- Location Map Handler -->
<script>
    $(".show_location_modal").on('click', function(e){
        e.preventDefault();

        var name = $(this).find("span.location_hover_browse").attr("name");

        // location_button_open_multiple_map_110
        // location_button_open_single_map_114
        var details = name.replace("location_button_open_", "");
        var comps = details.split("_map_");
        var type = comps[0];
        var catalog_id = comps[1];

        show_map("catalog", type, catalog_id);
    });
</script>