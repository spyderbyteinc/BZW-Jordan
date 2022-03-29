<div id="registration_question_container">
    <div id="registration_question_modal">

        <h1 class="registration_header">Registration Questions</h1>

        <br>

        <form action="<?php echo $root; ?>browse/browse.php" method="post" id="registration_question_form">

            <input type="hidden" name="catalog_id" id="catalog_id">
            <div id="all_question_list">
<!-- 
                 <div class="registration_row" id="registration_question_1">
                    <div class="catalog_row signup_row">
                        <div class="col1">
                            <div class="signup_group">
                                <label for="registration_question_1" class="input_label">Question 1 Text:</label>
                                <input type="text" class="input_text" name="registration_question_1" id="registration_question_1" placeholder="Answer">
                            </div>
                        </div>
                    </div>
                </div>   -->
            </div>

                <div class="registration_button_container">

                    <a href="#" class="bidzbutton devart" id="submit_registration_questions">Submit</a>
                    
                    <a href="#" class="bidzbutton orange" id="cancel_registration_question">Cancel</a>
                </div>
        </form>
    </div>
</div>
<script>


    $("#cancel_registration_question").click(function(e){
        e.preventDefault();

        // delete questions from question modal
        $("#all_question_list .registration_row").remove();

        $("#registration_question_container").css("display", "none");
    });

    var question_list;

    var approval_div = `
        <div class="approved_container">
            <span class="approval_icon">
                <i class="fas fa-check-circle"></i>
            </span>
            <span class="approval_text"> Registration</br>Approved</span>
        </div>
    `;

    var pending_div = `
        <div class="pending_container">
            <span class="pending_icon">
                <i class="fas fa-hourglass-half"></i>
            </span>
            <span class="pending_text"> Registration</br>Pending</span>
        </div>
    `;

    $( ".register_to_bid" ).on( "click", function(e) {
        e.preventDefault();
        
        var name = $(this).attr("name");
        
        var id = name.replace("register_to_bid_process_", "");

        $("#catalog_id").val(id);



        $.ajax({
            type: 'POST',
            url: "getQuestions.php",
            async: false,
            dataType: "json",
            data: {
                'id': id
            },
            success: function (out) {
                console.log(out);
                question_list = out;
                
                if(out.length == 0){
                    console.log("good to go 2");

                    var catalog_id = $("#catalog_id").val();
                    $.ajax({
                        type: 'POST',
                        url: "submit_questions.php",
                        async: false,
                        dataType: "html",
                        data: {
                            'catalog_id': catalog_id,
                            'operation': 'approve'

                        },
                        success: function (status) {
                            console.log(status);
                            if(status == "approval_done"){
                                alert("You are now registered for this catalog");

                                var id = "#register_to_bid_process_" + catalog_id;
                                $(id).parent().html(approval_div);

                                return;
                            }
                            else if(status == "approval_twice"){
                                alert("You cannot register for this catalog twice");
                                return;
                            }
                        }
                    });

                    return;
                }

                $("#registration_question_container").css("display", "block");

                // $("#all_question_list").append(literal_question);

                for(var q = 0; q<out.length; q++){

                    var question = out[q];

                    var comps = question.split("??||&&");
                    var question_text = comps[1];

                    var literal_question = `
                        <div class="registration_row" id="registration_question_container_${q}">
                            <div class="catalog_row signup_row">
                                <div class="col1">
                                    <div class="signup_group">
                                        <label for="registration_question_${q}" class="input_label">${question_text}</label>
                                        <input type="text" class="input_text reg_question_focus" required name="registration_question_${q}" id="registration_question_${q}" placeholder="Answer">
                                    </div>
                                </div>
                            </div>
                        </div>  
                    `;
                    
                    $("#all_question_list").append(literal_question);
                }

            }
        });
    });

    $("#submit_registration_questions").click(function(e){
        e.preventDefault();

        console.log(question_list);

        var valid = true;

        var answers = [];

        var catalog_id = $("#catalog_id").val();

        for(var v=0; v<question_list.length; v++){
            var question_id = "#registration_question_" + v;

            var question_answer = $(question_id).val();


            if(question_answer == ""){
                valid = false;
                $(question_id).css("background-color", "lightpink");
            }
            else{
                answers.push(question_answer);
            }
        }

        if(!valid){
            alert("You have not answered all of the questions");
            return;
        }
        else{
            console.log(answers);
            $.ajax({
                type: 'POST',
                url: "submit_questions.php",
                async: false,
                dataType: "html",
                data: {
                    'catalog_id': catalog_id,
                    'operation': 'pending',

                    'answers': answers
                },
                success: function (status) {
                    if(status == "done"){
                        // delete questions from question modal
                        $("#all_question_list .registration_row").remove();

                        $("#registration_question_container").css("display", "none");


                        alert("You are now registered for this catalog");

                        var id = "#register_to_bid_process_" + catalog_id;
                        $(id).parent().html(pending_div);
                    }
                    else if(status == "pending_twice"){

                        // delete questions from question modal
                        $("#all_question_list .registration_row").remove();

                        $("#registration_question_container").css("display", "none");

                        alert("You cannot register for this catalog twice");
                        location.reload();
                    }
                }
            });

        }
    });

    $(document).on('click', '.reg_question_focus', function () {
       var id = $(this).attr('id');
       var selector = "#" + id;

       $(selector).css("background-color", "whitesmoke");
    });
</script>