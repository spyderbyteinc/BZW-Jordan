$(document).ready(function () {

    // Country state change
    $("#asset_country").change(function () {
        var name = $(this).find('option:selected').attr("name");

        if (all_states[name] == "<option class='select' value=''>Select a State/Province</option>") {
            $("#asset_state_static").css("display", "block");
            $("#asset_state").css("display", "none");
            $("#asset_state").html("");
        }
        else {
            $("#asset_state").css("display", "block");
            $("#asset_state").html(all_states[name]);
            $("#asset_state_static").css("display", "none");
        }
    });
    $("#edit_asset_country").change(function () {
        var name = $(this).find('option:selected').attr("name");

        if (all_states[name] == "<option class='select' value=''>Select a State/Province</option>") {
            $("#edit_asset_state_static").css("display", "block");
            $("#edit_asset_state").css("display", "none");
            $("#edit_asset_state").html("");
        }
        else {
            $("#edit_asset_state").css("display", "block");
            $("#edit_asset_state").html(all_states[name]);
            $("#edit_asset_state_static").css("display", "none");
        }
    });


    // $(".date_picker").keydown(function (e) {
    //     return false;
    // });

    // Date Pickers
    var d = new Date();
    var y = d.getFullYear();
    var r = y + 3;

    var range = "-80:" + r;

    // $(".date").datepicker({
    //     changeYear: true,
    //     changeMonth: true,
    //     yearRange: range,
    //     onSelect: function (dateText) {
    //         $(this).css("background-color", "whitesmoke");
    //     }
    // });

    var current_day;


    function date_formatter(dateText) {
        var comps = dateText.split("/");

        var month = comps[0] - 1;
        var day = comps[1];
        var year = comps[2];

        var thisDate = new Date(year, month, day);

        return thisDate;
    }


    // Start and End time selectors
    $(".start_time_drop").html(start_time);
    $(".end_time_drop").html(end_time);

    // Hide buttons
    $("#add_inspect_details, #add_removal_details, #add_onsite_contact").css("display", "none");

    // House
    var house_accounts = document.getElementById("active_house_accounts").value;

    // Handle House Account Selection
    $(document).on("click", ".house_node", function () {
        console.log(this);
        var img = $(this).find("img");
        var house_id = img.attr("name");

        var closure = img.css("display");


        // Add to list - not checked
        if (closure == "none") {
            var orig = $("#active_house_accounts").val();

            var output = orig + house_id + "||";

            $("#active_house_accounts").val(output);

            img.css("display", "block");
        }
        else {
            var orig = $("#active_house_accounts").val();

            var sub = "||" + house_id + "||";

            var output = orig.replace(sub, "||");

            $("#active_house_accounts").val(output);

            img.css("display", "none");
        }
    });

    var valid_time;

    function whether_is_today(myDate) {
        const today = new Date();
        var myDate_date = myDate.getDate();
        var myDate_month = myDate.getMonth();
        var myDate_year = myDate.getFullYear();

        var today_date = today.getDate();
        var today_month = today.getMonth();
        var today_year = today.getFullYear();


        if (myDate_date == today_date && myDate_month == today_month && myDate_year == today_year) {
            return true;
        }
        else {
            return false;
        }
    }
    function check_open_time(current_day) {
        console.log(current_day);
        if (current_day) {

            var isToday = whether_is_today(current_day);

            var start_time = $("#start_time").val();
            var end_time = $("#end_time").val();

            var start_date = date_formatter($("#start_date").val());
            var end_date = date_formatter($("#end_date").val());

            start_date = start_date.getTime();
            end_date = end_date.getTime();

            // console.log(start_date.getTime());
            // console.log(end_date.getTime());
            if (isToday) {


                if (start_time) {

                    var time_date = new Date();
                    var time_hours = time_date.getHours();
                    var time_minutes = time_date.getMinutes();

                    // add 0 to the beginning of the minutes and hour
                    var len_time_minutes = time_minutes.toString().length;
                    if (len_time_minutes == 1) {
                        time_minutes = 0 + "" + time_minutes;
                    }
                    var len_time_hours = time_hours.toString().length;
                    if (len_time_hours == 1) {
                        time_hours = 0 + "" + time_hours;
                    }


                    var right_now = time_hours + "" + time_minutes;

                    // console.log(start_time);
                    // console.log(right_now);

                    if (start_time >= right_now) {
                        if (end_time) {
                            if (start_time <= end_time) {
                                console.log("three");
                                $("#check_time").val(0)
                                $("#start_time").css("background-color", "lightpink");
                                return;
                            }
                            else {
                                console.log("four");
                                $("#check_time").val(1);
                                $("#start_time").css("background-color", "whitesmoke");
                                return;
                            }
                        }

                        console.log("one");
                        $("#check_time").val(1);
                        return;
                    }
                    else {
                        // console.log(right_now);
                        // console.log(start_time);
                        alert("Please make sure that your given starting date and time are after the current date and time");

                        console.log("good times roll");
                        $("#check_time").val(0);

                        $("#start_time").css("background-color", "lightpink");

                        return;
                    }
                }
            }
            else if (start_date == end_date) {
                console.log("wussup");
            }
            else {
                console.log("two");
                $("#check_time").val(1);
                return;
            }
        }

        // else {
        //     alert("Please define the date that bidding opens");

        //     $("#start_date").css("background-color", "lightpink");
        // }

        // $("#check_time").val(0);
    }

    // Bidding Opens Check If Time is Valid
    $("#start_time").change(function (e) {
        // e.preventDefault();
        // var det = check_open_time(current_day);

        // var today = new Date();
        // var year = today.getFullYear();
        // var month = today.getMonth();
        // var day = today.getDate();
        // today = new Date(year, month, day);
    });

    function setDatepickerPos(input, inst) {
        var id = $(input).attr('id');
        
        if(id == "start_date" || id == "end_date"){
            return;
        }
        var rect = input.getBoundingClientRect();
        // use 'setTimeout' to prevent effect overridden by other scripts
        setTimeout(function () {
            var scrollTop = $("body").scrollTop();
    	    inst.dpDiv.css({ top: rect.top + input.offsetHeight + scrollTop });
        }, 0);
    }
    $(".date_picker").datepicker({
        changeYear: true,
        changeMonth: true,
        yearRange: range,
	    inline: true,
	    beforeShow: function (input, inst) { setDatepickerPos(input, inst) },
        onSelect: function (dateText) {
            $(this).css("background-color", "whitesmoke");

            var id = $(this).attr("id");

            var this_date = date_formatter(dateText);

            if (id == "start_date" || id == "end_date") {
                validate_dates();
            }

            if (id == "inspection_start_date" || id == "inspection_end_date") {
                validate_inspection_create();
            }

            if (id == "edit_inspection_start_date" || id == "edit_inspection_end_date") {
                validate_inspection_edit();
            }

            if (id == "removal_start_date" || id == "removal_end_date") {
                validate_removal_create();
            }

            if (id == "edit_removal_start_date" || id == "edit_removal_end_date") {
                validate_removal_edit();
            }
        }
    });

    // if ($("#add_inspection_modal").is(":visible")) {

    //     $('body').css('overflow', 'hidden');
    // }
    // else {
    //     $('body').css('overflow', 'scroll');
    // }

    $("#inspection_start_date, #inspection_end_date, #removal_start_date, #removal_end_date, #edit_inspection_start_date, #edit_inspection_end_date, #edit_removal_start_date, #edit_removal_end_date").focus(function () {

        var id = "#" + $(this).attr("id");

        var input_height = $(this).height();

        // Get modal size for position
        var modal_object = $(this).closest(".modal_content");
        var modal_pos = modal_object.position();
        var modaL_top = modal_pos.top;
        var modal_left = modal_pos.left;

        // Get input position
        var pos = $(id).position();
        var top_pos = pos.top;
        var left_pos = pos.left;

        top_pos = top_pos + modaL_top + input_height + 5;
        left_pos = left_pos + modal_left;

        top_pos = top_pos + "px";
        left_pos = left_pos + "px";

        var position_rule = " position: fixed !important";
        var top_rule = " top: " + top_pos + " !important;";
        var left_rule = " left: " + left_pos + " !important;";
        var inline_rule = " display: inline !important;";

        var orig = $("#ui-datepicker-div").attr('style');
        orig = orig + top_rule + left_rule + inline_rule + position_rule;

        // $("#ui-datepicker-div").css('top', top_pos + ' !important');
        // $("#ui-datepicker-div").attr('style', 'top: ' + top_pos + ' !important');
        // $("#ui-datepicker-div").attr('style', 'left: ' + left_pos + ' !important');
        // $("#ui-datepicker-div").css('position', 'absolute !important');
        // $("#ui-datepicker-div").css('display', 'inline !important');


        $("#ui-datepicker-div").attr('style', orig);
    });
});