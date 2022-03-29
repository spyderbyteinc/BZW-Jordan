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


    $(".date_picker").keydown(function (e) {
        return false;
    });

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


    $(".date_picker").datepicker({
        changeYear: true,
        changeMonth: true,
        yearRange: range,
        onSelect: function (dateText) {
            $(this).css("background-color", "whitesmoke");

            var id = $(this).attr("id");

            var this_date = date_formatter(dateText);

            if (id == "start_date") {
                var start_date = this_date;
                var end_date_val = $("#end_date").val();

                if (end_date_val != "") {
                    var end_date = date_formatter(end_date_val);

                    if (start_date > end_date) {
                        alert("The catalog end date must be after the start date");

                        $("#start_date").css("background-color", "lightpink");
                        $("#end_date").css("background-color", "lightpink");

                        date_error = true;
                    }
                    else {
                        $("#start_date").css("background-color", "whitesmoke");
                        $("#end_date").css("background-color", "whitesmoke");

                        date_error = false;
                    }
                }
                else {
                    $("#start_date").css("background-color", "whitesmoke");
                    $("#end_date").css("background-color", "whitesmoke");

                    date_error = false;
                }
            }
            else if (id == "end_date") {
                var end_date = this_date;
                var start_date_val = $("#start_date").val();

                if (start_date_val != "") {
                    var start_date = date_formatter(start_date_val);

                    if (start_date > end_date) {
                        alert("The catalog end date must be after the start date");

                        $("#start_date").css("background-color", "lightpink");
                        $("#end_date").css("background-color", "lightpink");

                        date_error = true;
                    }
                    else {
                        $("#start_date").css("background-color", "whitesmoke");
                        $("#end_date").css("background-color", "whitesmoke");

                        date_error = false;
                    }
                }
                else {
                    $("#start_date").css("background-color", "whitesmoke");
                    $("#end_date").css("background-color", "whitesmoke");

                    date_error = false;
                }
            }

            if (id == "start_date" || id == "end_date") {
                var dte = this_date;

                var today = new Date();
                var year = today.getFullYear();
                var month = today.getMonth();
                var day = today.getDate();
                today = new Date(year, month, day);

                if (dte < today) {
                    alert("The catalog cannot begin or end before today's date");
                    if (id == "start_date") {
                        $("#start_date").css("background-color", "lightpink");
                    }
                    else if (id == "end_date") {
                        $("#end_date").css("background-color", "lightpink");
                    }

                    date_error = true;
                }

                var start_date_selector = $("#start_date").val();
                var end_date_selector = $("#end_date").val();

                if (start_date_selector && end_date_selector) {
                    $("#add_location_details").removeClass("display_none");
                    $("#asset_location_disclaimer").removeClass("display_none");
                    $("#asset_location_disclaimer2").css("display", "none");
                }
            }


            if (id == "inspection_start_date") {
                var start_date = this_date;
                var end_date_val = $("#inspection_end_date").val();

                if (end_date_val != "") {
                    var end_date = date_formatter(end_date_val);

                    if (start_date > end_date) {
                        alert("The inspection end date must be after the start date");

                        $("#inspection_start_date").css("background-color", "lightpink");
                        $("#inspection_end_date").css("background-color", "lightpink");

                        inspection_date_error = true;
                    }
                    else {
                        $("#inspection_start_date").css("background-color", "whitesmoke");
                        $("#inspection_end_date").css("background-color", "whitesmoke");

                        inspection_date_error = false;
                    }

                }
                else {
                    $("#inspection_start_date").css("background-color", "whitesmoke");
                    $("#inspection_end_date").css("background-color", "whitesmoke");

                    inspection_date_error = false;
                }
            }
            else if (id == "inspection_end_date") {
                var end_date = this_date;
                var start_date_val = $("#inspection_start_date").val();

                if (start_date_val != "") {
                    var start_date = date_formatter(start_date_val);


                    if (start_date > end_date) {
                        alert("The inspection end date must be after the start date");

                        $("#inspection_start_date").css("background-color", "lightpink");
                        $("#inspection_end_date").css("background-color", "lightpink");

                        inspection_date_error = true;
                    }
                    else {
                        $("#inspection_start_date").css("background-color", "whitesmoke");
                        $("#inspection_end_date").css("background-color", "whitesmoke");

                        inspection_date_error = false;
                    }
                }
                else {
                    $("#inspection_start_date").css("background-color", "whitesmoke");
                    $("#inspection_end_date").css("background-color", "whitesmoke");

                    inspection_date_error = false;
                }
            }



            if (id == "edit_inspection_start_date") {
                var start_date = this_date;
                var end_date_val = $("#edit_inspection_end_date").val();

                if (end_date_val != "") {
                    var end_date = date_formatter(end_date_val);

                    if (start_date > end_date) {
                        alert("The inspection end date must be after the start date");

                        $("#edit_inspection_start_date").css("background-color", "lightpink");
                        $("#edit_inspection_end_date").css("background-color", "lightpink");

                        inspection_date_error = true;
                    }
                    else {
                        $("#edit_inspection_start_date").css("background-color", "whitesmoke");
                        $("#edit_inspection_end_date").css("background-color", "whitesmoke");

                        inspection_date_error = false;
                    }

                }
                else {
                    $("#edit_inspection_start_date").css("background-color", "whitesmoke");
                    $("#edit_inspection_end_date").css("background-color", "whitesmoke");

                    inspection_date_error = false;
                }
            }
            else if (id == "edit_inspection_end_date") {
                var end_date = this_date;
                var start_date_val = $("#edit_inspection_start_date").val();

                if (start_date_val != "") {
                    var start_date = date_formatter(start_date_val);


                    if (start_date > end_date) {
                        alert("The inspection end date must be after the start date");

                        $("#edit_inspection_start_date").css("background-color", "lightpink");
                        $("#edit_inspection_end_date").css("background-color", "lightpink");

                        inspection_date_error = true;
                    }
                    else {
                        $("#edit_inspection_start_date").css("background-color", "whitesmoke");
                        $("#edit_inspection_end_date").css("background-color", "whitesmoke");

                        inspection_date_error = false;
                    }
                }
                else {
                    $("#edit_inspection_start_date").css("background-color", "whitesmoke");
                    $("#edit_inspection_end_date").css("background-color", "whitesmoke");

                    inspection_date_error = false;
                }
            }


            if (id == "removal_start_date") {
                var start_date = this_date;
                var end_date_val = $("#removal_end_date").val();

                if (end_date_val != "") {
                    var end_date = date_formatter(end_date_val);

                    if (start_date > end_date) {
                        alert("The removal end date must be after the start date");

                        $("#removal_start_date").css("background-color", "lightpink");
                        $("#removal_end_date").css("background-color", "lightpink");

                        removal_date_error = true;
                    }
                    else {
                        $("#removal_start_date").css("background-color", "whitesmoke");
                        $("#removal_end_date").css("background-color", "whitesmoke");

                        removal_date_error = false;
                    }

                }
                else {
                    $("#removal_start_date").css("background-color", "whitesmoke");
                    $("#removal_end_date").css("background-color", "whitesmoke");

                    removal_date_error = false;
                }
            }
            else if (id == "removal_end_date") {
                var end_date = this_date;
                var start_date_val = $("#removal_start_date").val();

                if (start_date_val != "") {
                    var start_date = date_formatter(start_date_val);


                    if (start_date > end_date) {
                        alert("The removal end date must be after the start date");

                        $("#removal_start_date").css("background-color", "lightpink");
                        $("#removal_end_date").css("background-color", "lightpink");

                        removal_date_error = true;
                    }
                    else {
                        $("#removal_start_date").css("background-color", "whitesmoke");
                        $("#removal_end_date").css("background-color", "whitesmoke");

                        removal_date_error = false;
                    }
                }
                else {
                    $("#removal_start_date").css("background-color", "whitesmoke");
                    $("#removal_end_date").css("background-color", "whitesmoke");

                    removal_date_error = false;
                }
            }

            if (id == "removal_start_date") {
                var start_date = this_date;
                var end_date_val = $("#end_date").val();

                if (end_date_val != "") {
                    var end_date = date_formatter(end_date_val);

                    if (start_date < end_date) {
                        alert("The removal start date cannot be until after the auction has ended");
                        $("#removal_start_date").css("background-color", "lightpink");
                        removal_date_error = true;
                    }
                }
            }

            if (id == "edit_removal_start_date") {
                var start_date = this_date;
                var end_date_val = $("#edit_removal_end_date").val();

                if (end_date_val != "") {
                    var end_date = date_formatter(end_date_val);

                    if (start_date > end_date) {
                        alert("The removal end date must be after the start date");

                        $("#edit_removal_start_date").css("background-color", "lightpink");
                        $("#edit_removal_end_date").css("background-color", "lightpink");

                        removal_date_error = true;
                    }
                    else {
                        $("#edit_removal_start_date").css("background-color", "whitesmoke");
                        $("#edit_removal_end_date").css("background-color", "whitesmoke");

                        removal_date_error = false;
                    }

                }
                else {
                    $("#edit_removal_start_date").css("background-color", "whitesmoke");
                    $("#edit_removal_end_date").css("background-color", "whitesmoke");

                    removal_date_error = false;
                }
            }
            else if (id == "edit_removal_end_date") {
                var end_date = this_date;
                var start_date_val = $("#edit_removal_start_date").val();

                if (start_date_val != "") {
                    var start_date = date_formatter(start_date_val);


                    if (start_date > end_date) {
                        alert("The removal end date must be after the start date");

                        $("#edit_removal_start_date").css("background-color", "lightpink");
                        $("#edit_removal_end_date").css("background-color", "lightpink");

                        removal_date_error = true;
                    }
                    else {
                        $("#edit_removal_start_date").css("background-color", "whitesmoke");
                        $("#edit_removal_end_date").css("background-color", "whitesmoke");

                        removal_date_error = false;
                    }
                }
                else {
                    $("#edit_removal_start_date").css("background-color", "whitesmoke");
                    $("#edit_removal_end_date").css("background-color", "whitesmoke");

                    removal_date_error = false;
                }
            }
        }
    });

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
});