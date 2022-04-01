$(document).ready(function () {


    $("input").click(function () {

        var click_id = this.id;
        if (click_id == "start_date" || click_id == "end_date") {
            return;
        }
        $(this).css("background-color", "whitesmoke");
    });
    $("input").keypress(function () {
        $(this).css("background-color", "whitesmoke");
    });
    $("select").change(function () {

        var select_id = this.id;

        if (select_id == "start_time" || select_id == "end_time") {
            return;
        }

        $(this).css("background-color", "whitesmoke");

        // if (select_id == "start_time") {
        //     var check_time = $("#check_time").val();
        //     if (check_time != 1) {
        //         $(this).css("background-color", "lightpink");
        //     }
        //     else {
        //         $(this).css("background-color", "whitesmoke");
        //     }
        // }
    });
    $("textarea").click(function () {
        $(this).css("background-color", "whitesmoke");
    });
    $("textarea").keypress(function () {
        $(this).css("background-color", "whitesmoke");
    });



    $("#create_account_submit").dblclick(function () {
        return false;
    });

    $("#create_account_submit").click(function (e) {
        e.preventDefault();

        $("#create_account_submit").css("display", "none");

        $(".saving_catalog_disclaimer").css("display", "flex");


        var catalog_name = $("#catalog_name").val();
        var auction_type = $("#auction_type").val();
        var charity_event = $("#charity_event").val();
        var catalog_description = $("#catalog_description").val();

        var start_date = $("#start_date").val();
        var start_time = $("#start_time").val();
        var end_date = $("#end_date").val();
        var end_time = $("#end_time").val();
        var end_increment = $("#end_increment").val();

        var check_time = $("#check_time").val();

        var location_length = getArraySize(all_locations);

        var asset_currency = $("#asset_currency").val();
        var asset_timezone = $("#asset_timezone").val();
        var buyer_premium = $("#buyer_premium").val();
        var allow_freeze = $("#allow_freeze").val();

        var extended_bidding = $("#extended_bidding").val();
        var extended_type = $("#extended_type").val();
        var extended_time_remaining = $("#extended_time_remaining").val();
        var extended_minutes_jump = $("#extended_minutes_jump").val();
        var extended_minutes_increment = $("#extended_minutes_increment").val();

        var bid_increment = $("#bid_increment").val();

        var times_the_bid = $("#times_the_bid").val();

        var removal_length = getArraySize(all_removals);

        var terms_conditions = $("#terms_conditions").val();
        var inspection_notes = $("#inspection_notes").val();
        var removal_notes = $("#removal_notes").val();

        var inspection_notes = $("#cke_inspection_notes iframe").contents().find("body").html();
        var removal_notes = $("#cke_removal_notes iframe").contents().find("body").html();

        var active_house_accounts = $("#active_house_accounts").val();

        var highest_location_id = $("#highest_location_id").val();


        if (catalog_name == "") {
            alert("Please provide the catalog name");
            $("#catalog_name").focus();
            $("#catalog_name").css("background-color", "lightpink");
            submission_error();
            return;
        }

        if (auction_type == "") {
            alert("Please provide the auction type");
            $("#auction_type").focus();
            $("#auction_type").css("background-color", "lightpink");
            submission_error();
            return;
        }
        else if (auction_type != "timed") {
            alert("Please do not mess with our system");
            $("#auction_type").focus();
            $("#auction_type").css("background-color", "lightpink");
            submission_error();
            return;
        }

        if (charity_event == "") {
            alert("Please provide whether or not this is a charity event");
            $("#charity_event").focus();
            $("#charity_event").css("background-color", "lightpink");
            submission_error();
            return;
        }
        else if (charity_event != "yes" && charity_event != "no") {
            alert("Please do not mess with our system");
            $("#charity_event").focus();
            $("#charity_event").css("background-color", "lightpink");
            submission_error();
            return;
        }

        var description = $("#cke_catalog_description iframe").contents().find("body").text();
        var catalog_description = $("#cke_catalog_description iframe").contents().find("body").html();
        if (description == "") {
            alert("Please provide the catalog description");
            $("#catalog_description").focus();
            $("#catalog_description").css("background-color", "lightpink");
            submission_error();
            return;
        }

        if (start_date == "") {
            alert("Please provide the catalog start date");
            $("#start_date").focus();
            $("#start_date").css("background-color", "lightpink");
            submission_error();
            return;
        }

        if (date_error) {
            alert("The catalog end date must be after the start date");
            $("#start_date").focus();
            $("#start_date").css("background-color", "lightpink");
            $("#end_date").css("background-color", "lightpink");

            submission_error();
            return;
        }

        if (start_time == "") {
            alert("Please provide the catalog start time");
            $("#start_time").focus();
            $("#start_time").css("background-color", "lightpink");
            submission_error();
            return;
        }

        if (check_time == 1) {
            alert("Please revise your start date, end date, start time, and end time to today's date or");
            $("#start_date").focus();
            submission_error();
            return;
        }


        if (end_date == "") {
            alert("Please provide the catalog end date");
            $("#end_date").focus();
            $("#end_date").css("background-color", "lightpink");
            submission_error();
            return;
        }

        if (end_time == "") {
            alert("Please provide the catalog end time");
            $("#end_time").focus();
            $("#end_time").css("background-color", "lightpink");
            submission_error();
            return;
        }


        if (end_increment == "") {
            alert("Please provide the catalog ending increment");
            $("#end_increment").focus();
            $("#end_increment").css("background-color", "lightpink");
            submission_error();
            return;
        }

        if (asset_currency == "") {
            alert("Please provide the asset currency");
            $("#asset_currency").focus();
            $("#asset_currency").css("background-color", "lightpink");
            submission_error();
            return;
        }
        if (asset_timezone == "") {
            alert("Please provide the asset timezone");
            $("#asset_timezone").focus();
            $("#asset_timezone").css("background-color", "lightpink");
            submission_error();
            return;
        }
        if (buyer_premium == "") {
            alert("Please provide the buyer's premium for this auction");
            $("#buyer_premium").css("background-color", "lightpink");
            $("#buyer_premium").focus();
            submission_error();
            return;
        }
        if (typeof parseFloat(buyer_premium) != "number") {
            alert("The buyer premium must be a real number");
            $("#buyer_premium").css("background-color", "lightpink");
            $("#buyer_premium").focus();
            submission_error();
            return;
        }
        if (parseFloat(buyer_premium) > 100) {
            alert("The buyer premium must be a percentage less than 100");
            $("#buyer_premium").css("background-color", "lightpink");
            $("#buyer_premium").focus();
            submission_error();
            return;
        }
        if (parseFloat(buyer_premium) < 0) {
            alert("The buyer premium must be a percentage greater than 0");
            $("#buyer_premium").css("background-color", "lightpink");
            $("#buyer_premium").focus();
            submission_error();
            return;
        }


        if (bid_increment == "") {
            alert("Please specify the default value for bid increment");
            $("#bid_increment").focus();
            $("#bid_increment").css("background-color", "lightpink");
            submission_error();
            return;
        }

        if(times_the_bid == ""){
            alert("Please specify if this catalog enables times the bid");
            $("#times_the_bid").focus();
            $("#times_the_bid").css("background-color", "lightpink");
            submission_error();
            return;

        }
        if (allow_freeze == "") {
            alert("Please specify if you want to enable freezing on this catalog");
            $("#allow_freeze").focus();
            $("#allow_freeze").css("background-color", "lightpink");
            submission_error();
            return;
        }

        // extended bidding check
        if (extended_bidding == "") {
            alert("Please specify if you want to enable extended bidding on this catalog");
            $("#extended_bidding").focus();
            $("#extended_bidding").css("background-color", "lightpink");
            submission_error();
            return;
        }
        else if (extended_bidding == "yes") {
            if (extended_type == "") {
                alert("Please specify the extended bidding type");
                $("#extended_type").focus();
                $("#extended_type").css("background-color", "lightpink");
                submission_error();
                return;
            }
            else {
                if (extended_time_remaining == "") {
                    alert("Please provide the time remaining when extended bidding is enabled");
                    $("#extended_time_remaining").focus();
                    $("#extended_time_remaining").css("background-color", "lightpink");
                    submission_error();
                    return;
                }

                if (extended_type == "jump") {
                    if (extended_minutes_jump == "") {
                        alert("Please provide the minutes to jump to");
                        $("#extended_minutes_jump").focus();
                        $("#extended_minutes_jump").css("background-color", "lightpink");
                        submission_error();
                        return;
                    }
                }
                else if (extended_type == "increment") {
                    if (extended_minutes_increment == "") {
                        alert("Please provide the minutes to increment to");
                        $("#extended_minutes_increment").focus();
                        $("#extended_minutes_increment").css("background-color", "lightpink");
                        submission_error();
                        return;
                    }

                }
            }
        }

        // asset location
        if (location_length == 0) {
            alert("Please provide at least one asset location");
            $("#add_location_details").focus();
            submission_error();
            return;
        }

        // check for missing inspection location
        for (var i = 0; i < all_inspections.length; i++) {
            var ins = all_inspections[i];

            if (ins['location'] == -1) {
                alert("You are missing a location on one or more of your inspection date/time");
                $("#add_inspect_details").focus();
                submission_error();
                return;
            }
        }

        // check for missing removal location
        for (var r = 0; r < all_removals.length; r++) {
            var rem = all_removals[r];

            if (rem['location'] == -1) {
                alert("You are missing a location on one or more of your removal date/time");
                $("#add_removal_details").focus();
                submission_error();
                return;
            }
        }

        if (removal_length == 0) {
            alert("Please provide at least one time period for asset removal");
            $("#add_removal_details").focus();
            submission_error();
            return;
        }

        // check for missing contact location
        for (var c = 0; c < all_contacts.length; c++) {
            var con = all_contacts[c];

            if (con['location'] == -1) {
                alert("You are missing a location on one or more of your contacts");
                $("#add_onsite_contact").focus();
                submission_error();
                return;
            }
        }


        var terms = $("#cke_terms_conditions iframe").contents().find("body").text();
        var terms_conditions = $("#cke_terms_conditions iframe").contents().find("body").html();
        if (terms == "") {
            alert("Please provide the terms and conditions for this catalog");
            $("#terms_conditions").focus();
            $("#terms_conditions").css("background-color", "lightpink");
            submission_error();
            return;
        }


        if (!allow_registration_questions) {
            all_questions = [-1, -1, -1, -1, -1, -1, -1, -1, -1, -1];
        }

        $.post("save_catalog.php", {
            catalog_name: catalog_name,
            auction_type: auction_type,
            charity_event: charity_event,

            catalog_description: catalog_description,

            start_date: start_date,
            start_time: start_time,
            end_date: end_date,
            end_time: end_time,
            end_increment: end_increment,

            active_house_accounts: active_house_accounts,

            asset_currency: asset_currency,
            asset_timezone: asset_timezone,
            buyer_premium: buyer_premium,
            allow_freeze: allow_freeze,

            bid_increment: bid_increment,

            times_the_bid: times_the_bid,

            extended_bidding: extended_bidding,
            extended_type: extended_type,
            extended_time_remaining: extended_time_remaining,
            extended_minutes_increment: extended_minutes_increment,
            extended_minutes_jump: extended_minutes_jump,

            highest_location_id: highest_location_id,
            
            locations: all_locations,
            inspections: all_inspections,
            removals: all_removals,
            contacts: all_contacts,
            questions: all_questions,

            terms_conditions: terms_conditions,

            inspection_notes: inspection_notes,
            removal_notes: removal_notes


        }, function (data, status) {
            if (data == "done") {
                window.location.replace("manage.php");
            }
            else {
                console.log(data);
            }
        });
    });

    function submission_error() {
        $(".saving_catalog_disclaimer").css("display", "none");
        $("#create_account_submit").css("display", "flex");
    }

    // Get size of arrays
    function getArraySize(arr) {
        var count = 0;

        for (var a = 0; a < arr.length; a++) {
            var curr = arr[a];

            if (curr != -1) {
                count++;
            }
        }

        return count;
    }
});