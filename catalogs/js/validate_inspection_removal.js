var check_inspection_removal = $("#check_inspection_removal");

$("#inspection_start_time, #inspection_end_time").change(function () {
    validate_inspection_create();

    console.log('jordan');
});

function validate_inspection_create() {
    var test;

    var inspection_start_date = $("#inspection_start_date").val();
    var inspection_end_date = $("#inspection_end_date").val();

    var inspection_start_time = $("#inspection_start_time").val();
    var inspection_end_time = $("#inspection_end_time").val();



    var inspection_start_date_DOM = $("#inspection_start_date");
    var inspection_end_date_DOM = $("#inspection_end_date");

    var inspection_start_time_DOM = $("#inspection_start_time");
    var inspection_end_time_DOM = $("#inspection_end_time");

    if (inspection_start_date && inspection_end_date && inspection_start_date > inspection_end_date) {
        alert("Start date must be before or on the end date");
        inspection_start_date_DOM.css("background-color", "lightpink");
        inspection_end_date_DOM.css("background-color", "lightpink");

        check_inspection_removal.val("1");
    }
    else if (inspection_start_time && inspection_start_date == inspection_end_date && inspection_start_time > inspection_end_time) {
        alert("Start time must be before or equivalent to the end time");
        inspection_start_time_DOM.css("background-color", "lightpink");
        inspection_end_time_DOM.css("background-color", "lightpink");

        check_inspection_removal.val("1");

        console.log("something");
    }
    else if (inspection_start_time && inspection_end_time && !inspection_end_date && inspection_start_time > inspection_end_time) {
        alert("Start time must be before or equivalent to the end time if you don't provide end date");
        inspection_start_time_DOM.css("background-color", "lightpink");
        inspection_end_time_DOM.css("background-color", "lightpink");

        check_inspection_removal.val("1");
    }
    else {
        inspection_start_date_DOM.css("background-color", "whitesmoke");
        inspection_end_date_DOM.css("background-color", "whitesmoke");
        inspection_start_time_DOM.css("background-color", "whitesmoke");
        inspection_end_time_DOM.css("background-color", "whitesmoke");

        check_inspection_removal.val("0");
    }
}

$("#edit_inspection_start_time, #edit_inspection_end_time").change(function () {
    validate_inspection_edit();
});

function validate_inspection_edit() {
    var inspection_start_date = $("#edit_inspection_start_date").val();
    var inspection_end_date = $("#edit_inspection_end_date").val();

    var inspection_start_time = $("#edit_inspection_start_time").val();
    var inspection_end_time = $("#edit_inspection_end_time").val();


    var edit_inspection_start_date_DOM = $("#edit_inspection_start_date");
    var edit_inspection_end_date_DOM = $("#edit_inspection_end_date");

    var edit_inspection_start_time_DOM = $("#edit_inspection_start_time");
    var edit_inspection_end_time_DOM = $("#edit_inspection_end_time");

    if (inspection_start_date && inspection_end_date && inspection_start_date > inspection_end_date) {
        alert("Inspeciton start date must be before or on the end date");
        edit_inspection_start_date_DOM.css("background-color", "lightpink");
        edit_inspection_end_date_DOM.css("background-color", "lightpink");
        check_inspection_removal.val("1");
    }
    else if (inspection_start_time && inspection_end_time && inspection_start_date == inspection_end_date && inspection_start_time > inspection_end_time) {
        alert("Inspection start time must be before or equivalent to the end time");
        edit_inspection_start_time_DOM.css("background-color", "lightpink");
        edit_inspection_end_time_DOM.css("background-color", "lightpink");
        check_inspection_removal.val("1");
    }
    else if(inspection_start_time && inspection_end_time && !inspection_end_date && inspection_start_time > inspection_end_time){
        alert("Start time must be before or equivalent to the end time if you don't provide end date");
        edit_inspection_start_time_DOM.css("background-color", "lightpink");
        edit_inspection_end_time_DOM.css("background-color", "lightpink");
        check_inspection_removal.val("1");
    }
    else {
        edit_inspection_start_date_DOM.css("background-color", "whitesmoke");
        edit_inspection_end_date_DOM.css("background-color", "whitesmoke");
        edit_inspection_start_time_DOM.css("background-color", "whitesmoke");
        edit_inspection_end_time_DOM.css("background-color", "whitesmoke");
        check_inspection_removal.val("0");
    }
}

$("#removal_start_time, #removal_end_time").change(function () {
    validate_removal_create();
});

function validate_removal_create() {
    var removal_start_date = $("#removal_start_date").val();
    var removal_end_date = $("#removal_end_date").val();

    var removal_start_time = $("#removal_start_time").val();
    var removal_end_time = $("#removal_end_time").val();

    var start_date = $("#start_date").val();
    var end_date = $("#end_date").val();


    var removal_start_date_DOM = $("#removal_start_date");
    var removal_end_date_DOM = $("#removal_end_date");

    var removal_start_time_DOM = $("#removal_start_time");
    var removal_end_time_DOM = $("#removal_end_time");


    var end_date_vis = end_date;

    if (start_date) {
        start_date = date_formatter(start_date).getTime();
    }
    if (end_date) {
        end_date = date_formatter(end_date).getTime();
    }

    if (removal_start_date) {
        removal_start_date = date_formatter(removal_start_date).getTime();
    }
    if (removal_end_date) {
        removal_end_date = date_formatter(removal_end_date).getTime();
    }

    // removal start date < (before) end_date
    if (end_date && removal_start_date && removal_start_date < end_date) {
        alert("Removal date must be after the auction has closed (" + end_date_vis + ")");
        removal_start_date_DOM.css("background-color", "lightpink");
        removal_end_date_DOM.css("background-color", "lightpink");
        check_inspection_removal.val("1");
    }
    // removal start date > removal end date
    else if (removal_start_date && removal_end_date && removal_start_date > removal_end_date) {
        alert("Removal start date must be on or before the end date");
        removal_start_date_DOM.css("background-color", "lightpink");
        removal_end_date_DOM.css("background-color", "lightpink");
        check_inspection_removal.val("1");
    }
    // start time is after end time
    else if (removal_start_time && removal_end_time && removal_start_date == removal_end_date && removal_start_time > removal_end_time) {
        alert("Removal start time must be before or equivalent to the end time");
        removal_start_time_DOM.css("background-color", "lightpink");
        removal_end_time_DOM.css("background-color", "lightpink");
        check_inspection_removal.val("1");
    }
    // start time is after end time if there is no end date
    else if(removal_start_time && removal_end_time && !removal_end_date && removal_start_time > removal_end_time){
        
        alert("Removal start time must be before or equivalent to the end time");
        removal_start_time_DOM.css("background-color", "lightpink");
        removal_end_time_DOM.css("background-color", "lightpink");
        check_inspection_removal.val("1");
    }
    else {
        removal_start_date_DOM.css("background-color", "whitesmoke");
        removal_end_date_DOM.css("background-color", "whitesmoke");
        removal_start_time_DOM.css("background-color", "whitesmoke");
        removal_end_time_DOM.css("background-color", "whitesmoke");
        check_inspection_removal.val("0");
    }
}

$("#edit_removal_start_time, #edit_removal_end_time").change(function () {
    validate_removal_edit();
});

function validate_removal_edit() {
    var removal_start_date = $("#edit_removal_start_date").val();
    var removal_end_date = $("#edit_removal_end_date").val();

    var removal_start_time = $("#edit_removal_start_time").val();
    var removal_end_time = $("#edit_removal_end_time").val();

    var start_date = $("#start_date").val();
    var end_date = $("#end_date").val();


    var edit_removal_start_date_DOM = $("#edit_removal_start_date");
    var edit_removal_end_date_DOM = $("#edit_removal_end_date");

    var edit_removal_start_time_DOM = $("#edit_removal_start_time");
    var edit_removal_end_time_DOM = $("#edit_removal_end_time");

    var end_date_vis = end_date;

    if (start_date) {
        start_date = date_formatter(start_date).getTime();
    }
    if (end_date) {
        end_date = date_formatter(end_date).getTime();
    }

    if (removal_start_date) {
        removal_start_date = date_formatter(removal_start_date).getTime();
    }
    if (removal_end_date) {
        removal_end_date = date_formatter(removal_end_date).getTime();
    }

    // removal start date < (before) end_date
    if (end_date && removal_start_date && removal_start_date < end_date) {
        alert("Removal date must be after the auction has closed (" + end_date_vis + ")");
        edit_removal_start_date_DOM.css("background-color", "lightpink");
        edit_removal_end_date_DOM.css("background-color", "lightpink");
        check_inspection_removal.val("1");
    }
    // removal start date > removal end date
    else if (removal_start_date && removal_end_date && removal_start_date > removal_end_date) {
        alert("Removal start date must be on or before the end date");
        edit_removal_start_date_DOM.css("background-color", "lightpink");
        edit_removal_end_date_DOM.css("background-color", "lightpink");
        check_inspection_removal.val("1");
    }
    // start time is after end time
    else if (removal_start_time && removal_end_time && removal_start_date == removal_end_date && removal_start_time > removal_end_time) {
        alert("Removal start time must be before or equivalent to the end time");
        edit_removal_start_time_DOM.css("background-color", "lightpink");
        edit_removal_end_time_DOM.css("background-color", "lightpink");
        check_inspection_removal.val("1");
    }
    // start time is after end time if there is no end date
    else if(removal_start_time && removal_end_time && !removal_end_date && removal_start_time > removal_end_time){
        alert("Removal start time must be before or equivalent to the end time");
        edit_removal_start_time_DOM.css("background-color", "lightpink");
        edit_removal_end_time_DOM.css("background-color", "lightpink");
        check_inspection_removal.val("1");
    }
    else {
        edit_removal_start_date_DOM.css("background-color", "whitesmoke");
        edit_removal_end_date_DOM.css("background-color", "whitesmoke");
        edit_removal_start_time_DOM.css("background-color", "whitesmoke");
        edit_removal_end_time_DOM.css("background-color", "whitesmoke");
        check_inspection_removal.val("0");
    }
}
