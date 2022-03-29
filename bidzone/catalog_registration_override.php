<?php include "includes/header.php"; ?>

        <main id="content">
            <h1 class="page_heading">Catalog Registration Override</h1>

            <div id="filter_section">

                <h3 class="filter_heading">Filter By:</h3>
                
                <div class="catalog_switch_element">
                        
                        <span id="no_watching_label_<?php echo $lot_id; ?>" class="left_label color_red bold"><i class="fa-solid fa-sim-card"></i>Catalog</span>

                        <!-- Rounded switch -->
                        <label class="switch">
                            <input type="checkbox" id="watching_switch_catalog_<?php echo $catalog_id; ?>??||&&lotname_<?php echo $lot_id; ?>" class="watching_catalog_switch" style="background-color: whitesmoke;" name="watching_switch_<?php echo $catalog_id; ?>_<?php echo $lot_id; ?>">
                            <span class="slider round"></span>
                        </label>

                        <span id="yes_watching_label_<?php echo $lot_id; ?>" class="right_label dilute color_green"><i class="fa-solid fa-users"></i>User</span>

                    </div>

                    <div id="search_form">
                        <input type="text" name="search_field" id="search_field" placeholder="Search For Catalog">
                    </div>
            </div>
            
            <?php
                $sql = "SELECT * FROM `catalogs`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $catalog_id = $row['id'];
                    $catalog_name = $row['catalog_name'];
                    $catalog_description = $row['catalog_description'];

                    $catalog_owner = $row['owner'];

                    $owner_sql = "SELECT * FROM `accounts` WHERE `username`='$catalog_owner'";
                    $owner_result = mysqli_query($conn, $owner_sql);
                    $owner_row = mysqli_fetch_assoc($owner_result);

                    $owner_first_name = $owner_row['first_name'];
                    $owner_last_name = $owner_row['last_name'];

                    $status_sql = "SELECT * FROM `catalog_status` WHERE `cat_id`=$catalog_id";
                    $status_result =mysqli_query($conn, $status_sql);
                    $status_row = mysqli_fetch_assoc($status_result);

                    $catalog_status = $status_row['status']; ?>
            
            <div id="list_of_catalogs">
                <div class="catalog_section">

                    <div class="catalog_item">
                        <h3 class="catalog_name"><?php echo $catalog_name; ?></h3>
                        <p class="catalog_description"><?php echo $catalog_description; ?></p>
                        <p class="catalog_countdown"><span class="status"><?php echo $catalog_status; ?></span> -- <span class="countdown">Starts in 20min</span></p>
                        <p class="catalog_owner"><?php echo $owner_first_name . " " . $owner_last_name; ?> (<?php echo $catalog_owner; ?>)</p>
                    </div>

                    <?php
                        $user_sql = "SELECT * FROM `catalog_registration` WHERE `cat_id`=$catalog_id";
                    $user_result = mysqli_query($conn, $user_sql);
                    while ($user_row = mysqli_fetch_assoc($user_result)) {
                        $user = $user_row['user'];
                        $user_status = $user_row['status'];

                        $user_name_sql = "SELECT * FROM `accounts` WHERE `username`='$user'";
                        $user_name_result = mysqli_query($conn, $user_name_sql);
                        $user_name_row = mysqli_fetch_assoc($user_name_result);

                        $user_first_name = $user_name_row['first_name'];
                        $user_last_name = $user_name_row['last_name'];
                    ?>

                    <div class="user_item">

                        <input type="hidden" class="hidden_data" name="username_<?php echo $user; ?>??||&&catalog_<?php echo $catalog_id; ?>">
                        <span class="user_name"><?php echo $user_first_name . " " . $user_last_name; ?></span>
                        <span class="user_username"><?php echo $user; ?></span>

                        <?php if($user_status == "approved") : ?>

                            <span class="user_status approved"><i class="fas fa-check-circle" aria-hidden="true"></i> Approved</span>
                            <a href="#" class="bidzbutton medblue override_pending">Pending</a>
                            <a href="#" class="bidzbutton red override_denial">Deny</a>

                        <?php elseif($user_status == "denied") : ?>

                            <span class="user_status denied"><i class="fas fa-exclamation-circle" aria-hidden="true"></i> Denied</span>
                            <a href="#" class="bidzbutton medblue override_pending">Pending</a>
                            <a href="#" class="bidzbutton devart override_approval">Approve</a>
                        
                        <?php elseif($user_status == "pending") : ?>

                            <span class="user_status pending"><i class="fas fa-hourglass-half" aria-hidden="true"></i> Pending</span>
                            <a href="#" class="bidzbutton devart override_approval">Approve</a>
                            <a href="#" class="bidzbutton red override_denial">Deny</a>

                        <?php endif ; ?>
                        <a href="#" class="bidzbutton orange view_answers" name="username_<?php echo $user; ?>??||&&catalog_<?php echo $catalog_id; ?>">View Answers</a>
                    </div>

                        <?php
                    }
                    ?>
                </div>
            </div>

            <?php
                }
            ?>
        </main>

<!-- View Answers Modal -->
<div id="view_answers_modal_container" class="modal_container">
    <div id="view_answers_modal">
        <h2>User Answers</h2>

        <div id="all_question_list">

        </div>
        

        <input type="hidden" name="registration_user" id="registration_user" value="">
        <input type="hidden" name="registration_catalog" id="registration_catalog" value="">
        <input type="hidden" name="registration_id" id="registration_id" value="">

        <div id="action_buttons">
                <a href="#" class="bidzbutton orange close_modal">Close</a>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>
<!-- Handle Pending/Approval/Denial Buttons -->
<script>
    function perform_override(type, name){
        var comps = name.split("??||&&");
        var username = comps[0].replace("username_", "");
        var catalog_id = comps[1].replace("catalog_", "");

        $.ajax({
            type: 'POST',
            url: "ajax/override_catalog_approval.php",
            async: false,
            dataType: "json",
            data: {
                'type': type,
                'username': username,
                "catalog_id": catalog_id
            },
            success: function (out) {
                location.reload();
            }
        });
    }

    $(".override_pending").on("click", function(e){
        e.preventDefault();

        var name = $(this).parent().find("input.hidden_data").attr("name");

        var type = "pending";

        perform_override(type, name);
    });
    $(".override_approval").on("click", function(e){
        e.preventDefault();

        var name = $(this).parent().find("input.hidden_data").attr("name");

        var type = "approved";

        perform_override(type, name);
    });
    $(".override_denial").on("click", function(e){
        e.preventDefault();

        var name = $(this).parent().find("input.hidden_data").attr("name");

        var type = "denied";

        perform_override(type, name);
    });
</script>
<script>
    $(".close_modal").on("click", function(e){
        e.preventDefault();

        $(".modal_container").hide();
    });

    $(".view_answers").on("click", function(e){
        e.preventDefault();

        var name = $(this).attr("name");

        var comps = name.split("??||&&");

        var username = comps[0].replace("username_", "");
        var catalog_id = comps[1].replace("catalog_", "");

        $("#view_answers_modal_container").css("display", "block");

        
        $.ajax({
            type: 'POST',
            url: "ajax/getAnswers.php",
            async: false,
            dataType: "json",
            data: {
                'username': username,
                "catalog_id": catalog_id
            },
            success: function (out) {
                var questions = out['questions'];
                var answers = out['answers'];

                for(var l=0; l<questions.length; l++){
                    var current_question = questions[l];
                    var current_answer = answers[l];

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
            }
        });

        console.log(username, catalog_id);
    });
</script>