$("input").click(function () {
    $(this).css("background-color", "whitesmoke");
});
$("input").keypress(function () {
    $(this).css("background-color", "whitesmoke");
});
$("select").change(function () {
    $(this).css("background-color", "whitesmoke");
});
$("textarea").click(function () {
    $(this).css("background-color", "whitesmoke");
});
$("textarea").keypress(function () {
    $(this).css("background-color", "whitesmoke");
});

function validate_catalog_creation() {
    // DOM Elements
    var catalog_name_DOM = $("#catalog_name");
    var auction_type_DOM = $("#auction_type");
    var charity_event_DOM = $("#charity_event");
    var catalog_description_DOM = $("#catalog_description");

    var start_date_DOM = $("#start_date");
    var start_time_DOM = $("#start_time");
    var end_date_DOM = $("#end_date");
    var end_time_DOM = $("#end_time");
    var end_increment_DOM = $("#end_increment");

    var asset_currency_DOM = $("#asset_currency");
    var asset_timezone_DOM = $("#asset_timezone");
    var buyer_premium_DOM = $("#buyer_premium");

    var terms_conditions_DOM = $("#terms_conditions");

    // DOM Values
    var catalog_name = catalog_name_DOM.val();
    var auction_type = auction_type_DOM.val();
    var charity_event = charity_event_DOM.val();
    var catalog_description = catalog_description_DOM.val();

    var start_date = start_date_DOM.val();
    var start_time = start_time_DOM.val();
    var end_date = end_date_DOM.val();
    var end_time = end_time_DOM.val();
    var end_increment = end_increment_DOM.val();

    var asset_currency = asset_currency_DOM.val();
    var asset_timezone = asset_timezone_DOM.val();
    var buyer_premium = buyer_premium_DOM.val();

    var terms_conditions = terms_conditions_DOM.val();

    // List Lengths
    var location_count = document.getElementById("location_list").childElementCount;
    var removal_count = document.getElementById("removal_list").childElementCount;

    // Location Alert visible - inspection, removal, contact
    // or
    // Location value = 0
    // Inspection
    var inspection_alert_vis;
    var inspection_missing_location;
    var removal_alert_vis;
    var removal_missing_location;
    var contact_alert_vis;
    var contact_missing_location;
    $(".inspection_item").each(function (index) {
        inspection_alert_vis = $(this).find(".location_alert").css("display");
        inspection_missing_location = $(this).find(".location_missing").val();
    });
    // Removal
    $(".removal_item").each(function (index) {
        removal_alert_vis = $(this).find(".location_alert").css("display");
        removal_missing_location = $(this).find(".location_missing").val();
    });
    // Contact
    $(".contact_item").each(function (index) {
        contact_alert_vis = $(this).find(".location_alert").css("display");
        contact_missing_location = $(this).find(".location_missing").val();
    });


    // Perform Validation
    if (catalog_name == "") {
        alert("Please provide a catalog name");
        catalog_name_DOM.css("background-color", "lightpink");
        catalog_name_DOM.focus();
        return;
    }
    if (auction_type == "") {
        alert("Please choose the auction type");
        auction_type_DOM.css("background-color", "lightpink");
        auction_type_DOM.focus();
        return;
    }
    if (charity_event == "") {
        alert("Please specify if this is a charity event");
        charity_event_DOM.css("background-color", "lightpink");
        charity_event_DOM.focus();
        return;
    }
    if (catalog_description == "") {
        alert("Please provide the catalog's description");
        catalog_description_DOM.css("background-color", "lightpink");
        catalog_description_DOM.focus();
        return;
    }


    if (start_date == "") {
        alert("Please provide a start date");
        start_date_DOM.css("background-color", "lightpink");
        start_date_DOM.focus();
        return;
    }
    if (start_time == "") {
        alert("Please provide a start time");
        start_time_DOM.css("background-color", "lightpink");
        start_time_DOM.focus();
        return;
    }
    if (end_date == "") {
        alert("Please provide an end date");
        end_date_DOM.css("background-color", "lightpink");
        end_date_DOM.focus();
        return;
    }
    if (end_time == "") {
        alert("Please provide an end time");
        end_time_DOM.css("background-color", "lightpink");
        end_time_DOM.focus();
        return;
    }
    if (end_increment == "") {
        alert("Please provide the end increment");
        end_increment_DOM.css("background-color", "lightpink");
        end_increment_DOM.focus();
        return;
    }


    if (location_count == 0) {
        alert("You must provide at least one asset location");
        return;
    }


    if (asset_currency == "") {
        alert("Please provide the currency of the asset");
        asset_currency_DOM.css("background-color", "lightpink");
        asset_currency_DOM.focus();
        return;
    }
    if (asset_timezone == "") {
        alert("Please provide the timezone of the asset");
        asset_timezone_DOM.css("background-color", "lightpink");
        asset_timezone_DOM.focus();
        return;
    }
    if (buyer_premium == "") {
        alert("Please provide the buyer's premium for this auction");
        buyer_premium_DOM.css("background-color", "lightpink");
        buyer_premium_DOM.focus();
        return;
    }
    if (typeof parseFloat(buyer_premium) != "number") {
        alert("The buyer premium must be a real number");
        buyer_premium_DOM.css("background-color", "lightpink");
        buyer_premium_DOM.focus();
        return;
    }
    if (parseFloat(buyer_premium) > 100) {
        alert("The buyer premium must be a percentage less than 100");
        buyer_premium_DOM.css("background-color", "lightpink");
        buyer_premium_DOM.focus();
        return;
    }
    if (parseFloat(buyer_premium) < 0) {
        alert("The buyer premium must be a percentage greater than 0");
        buyer_premium_DOM.css("background-color", "lightpink");
        buyer_premium_DOM.focus();
        return;
    }

    if (inspection_alert_vis == "flex" || inspection_missing_location == "0") {
        alert("One of your inspection entries has an invalid location");
        return;
    }

    if (removal_count == 0) {
        alert("You must provide at least one date and time for removal");
        return;
    }

    if (removal_alert_vis == "flex" || removal_missing_location == "0") {
        alert("One of your removal entries has an invalid location");
    }

    if (contact_alert_vis == "flex" || contact_missing_location == "0") {
        alert("One of your contact entries has an invalid location");
    }

    if (terms_conditions == "") {
        alert("Please provide the terms and conditions of this auction");
        terms_conditions_DOM.css("background-color", "lightpink");
        terms_conditions_DOM.focus();
        return;
    }


    document.catalog_creation_form.submit();


    // end_date.css("background-color", "lightpink");
}