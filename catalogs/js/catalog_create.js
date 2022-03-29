$(document).ready(function () {

    // Location UI selectors
    const edit_address1_field = document.getElementById("edit_asset_address1");
    const edit_address2_field = document.getElementById("edit_asset_address2");
    const edit_country_field = document.getElementById("edit_asset_country");
    const edit_city_field = document.getElementById("edit_asset_city");
    const edit_state_field = document.getElementById("edit_asset_state");
    const edit_static_state_field = document.getElementById("edit_asset_state_static");


    // Close Modal Button
    $(".close_modal").click(function (e) {
        e.preventDefault();

        show_html_overflow();
        
        closeModals();
    });

    function hide_html_overflow(){
        $("body, html").css("overflow", "hidden");
    }

    function show_html_overflow(){
        $("body, html").css("overflow", "initial");
    }

    // Close modals and reset data
    function closeModals() {
        $(".add_location_modal").css("display", "none");
        $(".add_contact_modal").css("display", "none");
        $(".add_removal_modal").css("display", "none");
        $(".add_inspection_modal").css("display", "none");
        $(".add_question_modal").css("display", "none");

        $(".edit_location_modal").css("display", "none");
        $(".edit_contact_modal").css("display", "none");
        $(".edit_removal_modal").css("display", "none");
        $(".edit_inspection_modal").css("display", "none");
        $(".edit_question_modal").css("display", "none");

        $("#asset_address1").val("");
        $("#asset_address2").val("");
        $("#asset_country").val("");
        $("#asset_city").val("");
        $("#asset_state").val("");

        $("#inspection_start_date").val("");
        $("#inspection_end_date").val("");
        $("#inspection_start_time").val("");
        $("#inspection_end_time").val("");
        $("#inspection_location").val("");
        $("#inspection_start_date").css("background-color", "whitesmoke");
        $("#inspection_end_date").css("background-color", "whitesmoke");
        $("#inspection_start_time").css("background-color", "whitesmoke");
        $("#inspection_end_time").css("background-color", "whitesmoke");
        $("#inspection_location").css("background-color", "whitesmoke");


        $("#removal_start_date").val("");
        $("#removal_end_date").val("");
        $("#removal_start_time").val("");
        $("#removal_end_time").val("");
        $("#removal_location").val("");
        $("#removal_start_date").css("background-color", "whitesmoke");
        $("#removal_end_date").css("background-color", "whitesmoke");
        $("#removal_start_time").css("background-color", "whitesmoke");
        $("#removal_end_time").css("background-color", "whitesmoke");
        $("#removal_location").css("background-color", "whitesmoke");

        $("#contact_name").val("");
        $("#contact_phone").val("");
        $("#contact_location").val("");
        $("#contact_name").css("background-color", "whitesmoke");
        $("#contact_phone").css("background-color", "whitesmoke");
        $("#contact_location").css("background-color", "whitesmoke");

        $("#registration_question").val("");

        show_html_overflow();
    }


    // Get specific location
    function getSpecificLocation(loc) {
        for (var i = 0; i < all_locations.length; i++) {
            var curr = all_locations[i];

            if (curr.id == loc) {
                if (curr.address2 == -1 || curr.address2 == "") {
                    var ret = curr.address1 + ", " + curr.city + ", " + curr.state + ", " + country_code_to_name(curr.country);
                }
                else {
                    var ret = curr.address1 + ", " + curr.address2 + ", " + curr.city + ", " + curr.state + ", " + country_code_to_name(curr.country);
                }

                return ret;
            }
        }

        return -1;
    }


    // Get List of locations
    function getLocationList() {

        var list = `<option value=''>Choose a location</option>`;

        for (var i = 0; i < all_locations.length; i++) {
            var curr = all_locations[i];

            if (curr != -1) {
                var loc = getSpecificLocation(curr.id);
                var list_item = `<option value = '${curr.id}'>${loc}</option>`;

                list = list + list_item;
            }
        }

        return list;
    }

    // Add Location Modal 
    $("#add_location_details").click(function (e) {
        e.preventDefault();

        var start_date_select = $("#start_date").val();
        var end_date_select = $("#end_date").val();

        if (!start_date_select || !end_date_select) {
            alert("Please do not mess with our system");
            $("#add_location_details").css("display", "none");
            return false;
        }

        $(".add_location_modal").css("display", "block");


        $(".country_drop").html(country_drop);

        $("#asset_country").val('US');

        $("#asset_state").css("display", "block");
        $("#asset_state").html(all_states[0]);
        $("#asset_state_static").css("display", "none");
    });

    // Add Contact Modal
    $("#add_onsite_contact").click(function (e) {
        e.preventDefault();

        var loc_len = getArraySize(all_locations);

        if (loc_len == 0) {
            alert("Please do not mess with our system");
            $(this).css("display", "none");
            return false;
        }

        $(".add_contact_modal").css("display", "block");

        var list = getLocationList();

        $("#contact_location").html(list);
    });

    // Add Inspection Modal
    $("#add_inspect_details").click(function (e) {
        e.preventDefault();

        hide_html_overflow();

        var loc_len = getArraySize(all_locations);

        if (loc_len == 0) {
            alert("Please do not mess with our system");
            $(this).css("display", "none");
            return false;
        }

        $(".add_inspection_modal").css("display", "block");

        var list = getLocationList();

        $("#inspection_location").html(list);
    });

    // Add Removal Modal
    $("#add_removal_details").click(function (e) {
        e.preventDefault();

        var loc_len = getArraySize(all_locations);

        hide_html_overflow();

        if (loc_len == 0) {
            alert("Please do not mess with our system");
            $(this).css("display", "none");
            return false;
        }

        $(".add_removal_modal").css("display", "block");

        var list = getLocationList();

        $("#removal_location").html(list);
    });

    // Create Constructors
    function Location(id, address1, address2, country, city, state) {
        this.id = id;
        this.address1 = address1;
        this.address2 = address2;
        this.country = country;
        this.city = city;
        this.state = state;
    }
    // Contact Constructor
    function Contact(id, name, phone, location) {
        this.id = id;
        this.name = name;
        this.phone = phone;
        this.location = location;
    }
    // Inspection Constructor
    function Inspection(id, start_date, end_date, start_time, end_time, location) {
        this.id = id;
        this.start_date = start_date;
        this.end_date = end_date;
        this.start_time = start_time;
        this.end_time = end_time;
        this.location = location;
    }
    // Removal Constructor
    function Removal(id, start_date, end_date, start_time, end_time, location) {
        this.id = id;
        this.start_date = start_date;
        this.end_date = end_date;
        this.start_time = start_time;
        this.end_time = end_time;
        this.location = location;
    }
    // Question Constructor
    function Question(id, question) {
        this.id = id;
        this.question = question;
    }



    var edit_contact_num;
    var edit_location_num;
    var edit_inspection_num;
    var edit_removal_num;
    var edit_question_num;

    // Questions
    $("#add_registration_question").click(function (e) {
        e.preventDefault();

        $(".add_question_modal").css("display", "block");

    });

    // Add Question
    $("#submit_question_form").click(function (e) {
        e.preventDefault();

        var questionLength = getArraySize(all_questions);
        if (questionLength >= 10) {
            alert("Please don\'t mess with our system");
            return;
        }

        var question = $("#registration_question").val();

        if (question == "") {
            alert("Please complete form");
            return;
        }

        console.log(question);
        if(question.includes("??") || question.includes("||") || question.includes("&&")){
            alert("Invalid characters provided");
            return;
        }

        var id = all_questions.length;

        var question_object = new Question(id, question);


        all_questions.push(question_object);

        paintQuestions();
        closeModals();
    });

    // Retrieve Question
    $(document).on('click', '.edit_question', function (e) {
        e.preventDefault();

        let id = $(this).attr('name');
        id = id.replace("question_", "");

        let obj;
        for (var i = 0; i < all_questions.length + 1; i++) {
            var ques = all_questions[i];
            if (ques.id == id) {
                obj = ques;
                break;
            }
        }

        $(".edit_question_modal").css("display", "block");

        var question = obj.question;

        $("#edit_registration_question").val(question);

        edit_question_num = obj.id;
    });

    // Edit Question
    $("#save_edit_question").click(function (e) {
        e.preventDefault();

        var num = edit_question_num;
        var obj;

        var edit_question_field = document.getElementById("edit_registration_question");

        var question = edit_question_field.value;

        if (question == "") {
            alert("Please complete the form");
            return;
        }

        
        if(question.includes("??") || question.includes("||") || question.includes("&&")){
            alert("Invalid characters provided");
            return;
        }

        for (var q = 0; q < all_questions.length; q++) {
            var ques = all_questions[q];
            if (ques.id == num) {
                obj = ques;
                break;
            }
        }

        obj.question = question;

        paintQuestions();

        closeModals();
    });



    // Paint Questions
    function paintQuestions() {
        var final_output = "";

        for (var c = 0; c < all_questions.length; c++) {
            var ques = all_questions[c];

            if (ques == -1) {
                continue;
            }

            var id = ques.id;
            var question = ques.question;

            const output = `
                <li class="question_item" name="question_module_${id}">
                    <span class="information_content width_100">
                        <strong>Question: </strong>
                        <span class="name" id="question_entry_${id}">
                            ${question}
                        </span>
                        <span class="operations">
                            <i class="fas fa-edit cursor_pointer edit_question" name="question_${id}"></i>
                            <i class="far fa-trash-alt cursor_pointer delete_question" name="question_${id}"></i>
                        </span>
                    </span>
                </li>      
            `;
            final_output += output;
        }
        $("#question_list").html(final_output);

        var questionLength = getArraySize(all_questions);

        if (questionLength >= 10) {
            $("#add_registration_question").css("display", "none");
        }
        else {
            $("#add_registration_question").css("display", "inline-block");
        }
    }

    // Paint Contacts
    function paintContacts() {
        var final_output = "";

        for (var c = 0; c < all_contacts.length; c++) {
            var con = all_contacts[c];

            if (con == -1) {
                continue;
            }

            var id = con.id;
            var name = con.name;
            var phone = con.phone;
            var location = con.location;

            var location_display = getSpecificLocation(location);

            var alert_style = "";
            var location_style = "";

            if (location_display == -1) {
                alert_style = "style='display: flex';";
                location_display = "Location is missing, please fix";
                location_style = "style='color: red';";
            }
            const output = `
                <li class="contact_item" name="contact_module_${id}">
                    <span class="location_alert" ${alert_style}>
                        <i class="fas fa-exclamation-circle"></i>
                    </span>
                    <span class="information_content">
                        <strong>Name: </strong>
                        <span class="name" id="contact_name_entry_${id}">
                            ${name}
                        </span>
                        <strong>Phone: </strong>
                        <span class="name" id="contact_phone_entry_${id}">
                            ${phone}
                        </span>
                        <br>
                        <strong>Location: </strong>
                        <span class="phone" id="contact_location_entry_${id}">
                            <span class="location_display" ${location_style}>
                                ${location_display}
                            </span>
                        </span>
                    </span>
                    <span class="operations">
                        <i class="fas fa-edit cursor_pointer edit_contact" name="contact_${id}"></i>
                        <i class="far fa-trash-alt cursor_pointer delete_contact" name="contact_${id}"></i>
                    </span>
                </li>
            `;

            final_output += output;
        }
        $("#contact_list").html(final_output);

        var contactLength = getArraySize(all_contacts);

        if (contactLength >= 10) {
            $("#add_onsite_contact").css("display", "none");
        }
        else {
            $("#add_onsite_contact").css("display", "inline-block");
        }
    }
    // Paint Locations
    function paintLocations() {
        var final_output = "";

        for (var l = 0; l < all_locations.length; l++) {
            var loc = all_locations[l];

            if (loc == -1) {
                continue;
            }

            var id = loc.id;
            var address1 = loc.address1;
            var address2 = loc.address2;
            var country = loc.country;
            var city = loc.city;
            var state = loc.state;


            var country_display = country_code_to_name(country);

            if (address2 == -1 || address2 == "-1") {
                address2 = "";
            }

            var output = `
            <li class="location_item" name="location_module_${id}">
                <span>
                    <strong>Address: </strong>
                    <span class="address" id="location_address1_entry_${id}">
                        ${address1}
                    </span>
                    <strong>Address 2: </strong>
                    <span class="address" id="location_address2_entry_${id}">
                        ${address2}
                    </span>
                    <strong>City: </strong>
                    <span class="city" id="location_city_entry_${id}">
                        ${city}
                    </span>
                    <strong>State: </strong>
                    <span class="state" id="location_state_entry_${id}">
                        ${state}
                    </span>
                    <strong>Country: </strong>
                    <span class="country" id="location_country_entry_${id}">
                        ${country_display}
                    </span>
                </span>
                <span class="operations">
                    <i class="fas fa-edit cursor_pointer edit_location" name="location_${id}"></i>
                    <i class="far fa-trash-alt cursor_pointer delete_location" name="location_${id}"></i>
                </span>
            </li>`;

            final_output += output;
        }
        $("#location_list").html(final_output);

        var locationLength = getArraySize(all_locations);

        if (locationLength >= 1) {
            $("#add_inspect_details, #add_removal_details, #add_onsite_contact, .special_notes").css("display", "inline-block");
            $("#inspection_location_disclaimer, #removal_location_disclaimer, #contact_location_disclaimer, #asset_location_disclaimer").css("display", "none");
        }
        else {
            $("#add_inspect_details, #add_removal_details, #add_onsite_contact, .special_notes").css("display", "none");
            $("#inspection_location_disclaimer, #removal_location_disclaimer, #contact_location_disclaimer, #asset_location_disclaimer").css("display", "block");
        }

        if (locationLength >= 5) {
            $("#add_location_details").css("display", "none");
        }
        else {
            $("#add_location_details").css("display", "inline-block");
        }
    }
    // Paint Inspections
    function paintInspections() {
        var final_output = "";

        for (var c = 0; c < all_inspections.length; c++) {
            var ins = all_inspections[c];

            if (ins == -1) {
                continue;
            }

            var id = ins.id;
            var start_date = ins.start_date;
            var end_date = ins.end_date;
            var start_time = ins.start_time;
            var end_time = ins.end_time;
            var location = ins.location;


            var disp_end_date = end_date;

            if (end_date == "") {
                disp_end_date = start_date;
            }

            var location_display = getSpecificLocation(location);

            var alert_style = "";
            var location_style = "";

            if (location_display == -1) {
                alert_style = "style='display: flex';";
                location_display = "Location is missing, please fix";
                location_style = "style='color: red';";
            }
            const output = `
                <li class="inspection_item" name="inspection_module_${id}">
                    <span class="location_alert" ${alert_style}>
                        <i class="fas fa-exclamation-circle"></i>
                    </span>
                    <span class="information_content">
                        <strong>Start Date: </strong>
                        <span class="date" id="inspection_start_date_entry_${id}">
                            ${start_date}
                        </span>
                        <strong>End Date: </strong>
                        <span class="date" id="inspection_end_date_entry_${id}">
                            ${disp_end_date}
                        </span>
                        <strong>Start Time: </strong>
                        <span class="time" id="inspection_start_time_entry_${id}">
                            ${mil_time_to_disp(start_time)}
                        </span>
                        <strong>End Time: </strong>
                        <span class="time" id="inspection_end_time_entry_${id}">
                            ${mil_time_to_disp(end_time)}
                        </span>
                        <br>
                        <strong>Location: </strong>
                        <span class="time" id="inspection_location_entry_${id}">
                            <span class="location_display" ${location_style}>
                                ${location_display}
                            </span>
                        </span>
                    </span>
                    <span class="operations">
                        <i class="fas fa-edit cursor_pointer edit_inspection" name="inspection_${id}"></i>
                        <i class="far fa-trash-alt cursor_pointer delete_inspection" name="inspection_${id}"></i>
                    </span>
                </li>
            `;

            final_output += output;
        }
        $("#inspection_list").html(final_output);

        var inspectLength = getArraySize(all_inspections);

        if (inspectLength >= 10) {
            $("#add_inspect_details").css("display", "none");
        }
        else {
            $("#add_inspect_details").css("display", "inline-block");
        }
    }
    // Paint Inspections
    function paintRemovals() {
        var final_output = "";

        for (var c = 0; c < all_removals.length; c++) {
            var rem = all_removals[c];

            if (rem == -1) {
                continue;
            }

            var id = rem.id;
            var start_date = rem.start_date;
            var end_date = rem.end_date;
            var start_time = rem.start_time;
            var end_time = rem.end_time;
            var location = rem.location;


            var disp_end_date = end_date;

            if (end_date == "") {
                disp_end_date = start_date;
            }

            var location_display = getSpecificLocation(location);

            var alert_style = "";
            var location_style = "";

            if (location_display == -1) {
                alert_style = "style='display: flex';";
                location_display = "Location is missing, please fix";
                location_style = "style='color: red';";
            }
            const output = `
                <li class="removal_item" name="removal_module_${id}">
                    <span class="location_alert" ${alert_style}>
                        <i class="fas fa-exclamation-circle"></i>
                    </span>
                    <span class="information_content">
                        <strong>Start Date: </strong>
                        <span class="date" id="removal_start_date_entry_${id}">
                            ${start_date}
                        </span>
                        <strong>End Date: </strong>
                        <span class="date" id="removal_end_date_entry_${id}">
                            ${disp_end_date}
                        </span>
                        <strong>Start Time: </strong>
                        <span class="time" id="removal_start_time_entry_${id}">
                            ${mil_time_to_disp(start_time)}
                        </span>
                        <strong>End Time: </strong>
                        <span class="time" id="removal_end_time_entry_${id}">
                            ${mil_time_to_disp(end_time)}
                        </span>
                        <br>
                        <strong>Location: </strong>
                        <span class="time" id="removal_location_entry_${id}">
                            <span class="location_display" ${location_style}>
                                ${location_display}
                            </span>
                        </span>
                    </span>
                    <span class="operations">
                        <i class="fas fa-edit cursor_pointer edit_removal" name="removal_${id}"></i>
                        <i class="far fa-trash-alt cursor_pointer delete_removal" name="removal_${id}"></i>
                    </span>
                </li>
            `;

            final_output += output;
        }
        $("#removal_list").html(final_output);

        var removalLength = getArraySize(all_removals);

        if (removalLength >= 1) {
            $("#multiple_removal_disclaimer").css("display", "none");
        }
        else {
            $("#multiple_removal_disclaimer").css("display", "block");
        }

        if (removalLength >= 10) {
            $("#add_removal_details").css("display", "none");
        }
        else {
            $("#add_removal_details").css("display", "inline-block");
        }
    }


    // Add Contact
    $("#submit_contact_form").click(function (e) {
        e.preventDefault();

        var contactLength = getArraySize(all_contacts);
        if (contactLength >= 10) {
            alert("Please don\'t mess with our system");
            return;
        }

        const contact_name_field = document.getElementById("contact_name");
        const contact_phone_field = document.getElementById("contact_phone");
        const contact_location_field = document.getElementById("contact_location");

        const name = contact_name_field.value;
        const phone = contact_phone_field.value;
        const location = contact_location_field.value;


        // Check if required fields are filled in
        if (name == "" || phone == "" || location == "") {
            alert("Please complete the form");
            return;
        }


        // Make sure that they are not injecting
        if (name.includes("??") || name.includes("||") || name.includes("&&") ||
            phone.includes("??") || phone.includes("||") || phone.includes("&&") ||
            location.includes("??") || location.includes("||") || location.includes("&&")
        ) {
            alert("Invalid characters provided");
            return;
        }


        var id = all_contacts.length;
        const contact_object = new Contact(id, name, phone, location);

        all_contacts.push(contact_object);

        paintContacts();

        closeModals();
    });

    // Add Location
    $("#submit_location_form").click(function (e) {
        e.preventDefault();

        var locationLength = getArraySize(all_locations);
        if (locationLength >= 5) {
            alert("Please don\'t mess with our system");
            return;
        }

        // UI Selectors
        const address1_field = document.getElementById("asset_address1");
        const address2_field = document.getElementById("asset_address2");
        const country_field = document.getElementById("asset_country");
        const city_field = document.getElementById("asset_city");
        const dynamic_state_field = document.getElementById("asset_state");
        const static_state_field = document.getElementById("asset_state_static");

        // Get State from country
        var state_field_disp = dynamic_state_field.style.display;
        var static_state_field_disp = static_state_field.style.display;

        // Get state id
        if (state_field_disp == "block") {
            var state_name = "asset_state";
        }
        else if (static_state_field_disp == "block") {
            var state_name = "asset_state_static";
        }
        var state_field = document.getElementById(state_name);

        // Get data from UI Elements
        const address1 = address1_field.value;
        const address2_display = address2_field.value;
        const country = country_field.value;
        const city = city_field.value;
        const state = state_field.value;

        // Get address 2 information
        var address2;
        if (address2_display == "") {
            address2 = -1;
        }
        else {
            address2 = address2_display;
        }

        // Check if required fields are filled in
        if (address1 == "" || country == "" || city == "" || state == "") {
            alert("Please complete the form");
            return;
        }

        // Make sure that they are not injecting
        if (address1.includes("??") || address1.includes("||") || address1.includes("&&") ||
            address2_display.includes("??") || address2_display.includes("||") || address2_display.includes("&&") ||
            country.includes("??") || country.includes("||") || country.includes("&&") ||
            city.includes("??") || city.includes("||") || city.includes("&&") ||
            state.includes("??") || state.includes("||") || state.includes("&&")
        ) {
            alert("Invalid characters provided");
            return;
        }

        var id = all_locations.length;

        const location_object = new Location(id, address1, address2, country, city, state);

        all_locations.push(location_object);

        $("#highest_location_id").val(id);

        paintLocations();

        closeModals();
    });

    // Add Inspection
    $("#submit_inspection_form").click(function (e) {
        e.preventDefault();

        var inspectionLength = getArraySize(all_inspections);
        if (inspectionLength >= 10) {
            alert("Please don\'t mess with our system");
            return;
        }

        var check_inspection_removal = $("#check_inspection_removal").val();
        if (check_inspection_removal == "1" || check_inspection_removal == 1) {
            alert("Please correct the errors on this form");
            return;
        }

        const start_date_field = document.getElementById("inspection_start_date");
        const end_date_field = document.getElementById("inspection_end_date");
        const start_time_field = document.getElementById("inspection_start_time");
        const end_time_field = document.getElementById("inspection_end_time");
        const location_field = document.getElementById("inspection_location");

        const start_date = start_date_field.value;
        const end_date = end_date_field.value;
        const start_time = start_time_field.value;
        const end_time = end_time_field.value;
        const location = location_field.value;

        // Check if required fields are filled in
        if (start_date == "" || start_time == "" || end_time == "" || location == "" || inspection_date_error) {
            alert("Please complete the form");
            return;
        }
        // Make sure that they are not injecting
        if (start_date.includes("??") || start_date.includes("||") || start_date.includes("&&") ||
            end_date.includes("??") || end_date.includes("||") || end_date.includes("&&") ||
            start_time.includes("??") || start_time.includes("||") || start_time.includes("&&") ||
            end_time.includes("??") || end_time.includes("||") || end_time.includes("&&") ||
            location.includes("??") || location.includes("||") || location.includes("&&")
        ) {
            alert("Invalid characters provided");
            return;
        }

        var id = all_inspections.length;

        const inspection_object = new Inspection(id, start_date, end_date, start_time, end_time, location);

        all_inspections.push(inspection_object);

        paintInspections();

        closeModals();
    });

    // Add Removal
    $("#submit_removal_form").click(function (e) {
        e.preventDefault();

        show_html_overflow();

        var removalLength = getArraySize(all_removals);
        if (removalLength >= 10) {
            alert("Please don\'t mess with our system");
            return;
        }

        var check_inspection_removal = $("#check_inspection_removal").val();
        if (check_inspection_removal == "1" || check_inspection_removal == 1) {
            alert("Please correct the errors on this form");
            return;
        }

        const start_date_field = document.getElementById("removal_start_date");
        const end_date_field = document.getElementById("removal_end_date");
        const start_time_field = document.getElementById("removal_start_time");
        const end_time_field = document.getElementById("removal_end_time");
        const location_field = document.getElementById("removal_location");

        const start_date = start_date_field.value;
        const end_date = end_date_field.value;
        const start_time = start_time_field.value;
        const end_time = end_time_field.value;
        const location = location_field.value;

        // Check if required fields are filled in
        if (start_date == "" || start_time == "" || end_time == "" || location == "" || removal_date_error) {
            alert("Please complete the form");
            return;
        }
        // Make sure that they are not injecting
        if (start_date.includes("??") || start_date.includes("||") || start_date.includes("&&") ||
            end_date.includes("??") || end_date.includes("||") || end_date.includes("&&") ||
            start_time.includes("??") || start_time.includes("||") || start_time.includes("&&") ||
            end_time.includes("??") || end_time.includes("||") || end_time.includes("&&") ||
            location.includes("??") || location.includes("||") || location.includes("&&")
        ) {
            alert("Invalid characters provided");
            return;
        }

        var id = all_removals.length;

        const removal_object = new Removal(id, start_date, end_date, start_time, end_time, location);

        all_removals.push(removal_object);

        paintRemovals();

        closeModals();
    });


    // Retrieve Edit Contact
    $(document).on('click', '.edit_contact', function (e) {
        e.preventDefault();

        let id = $(this).attr('name');
        id = id.replace("contact_", "");

        let obj;
        for (var i = 0; i < all_contacts.length + 1; i++) {
            var con = all_contacts[i];
            if (con.id == id) {
                obj = con;
                break;
            }
        }

        $(".edit_contact_modal").css("display", "block");

        var name = obj.name;
        var phone = obj.phone;
        var location = obj.location;


        var list = getLocationList();

        $("#edit_contact_location").html(list);

        $("#edit_contact_name").val(name);
        $("#edit_contact_phone").val(phone);
        $("#edit_contact_location").val(location);

        edit_contact_num = obj.id;
    });

    // Edit Contact
    $("#save_edit_contact").click(function (e) {
        e.preventDefault();

        var num = edit_contact_num;
        var obj;

        var edit_contact_name_field = document.getElementById("edit_contact_name");
        var edit_contact_phone_field = document.getElementById("edit_contact_phone");
        var edit_contact_location_field = document.getElementById("edit_contact_location");

        var contact_name = edit_contact_name_field.value;
        var contact_phone = edit_contact_phone_field.value;
        var contact_location = edit_contact_location_field.value;

        if (contact_name == "" || contact_phone == "" || contact_location == "") {
            alert("Please complete the form");
            return;
        }

        for (var c = 0; c < all_contacts.length; c++) {
            var con = all_contacts[c];
            if (con.id == num) {
                obj = con;
                break;
            }
        }

        var location_display = getSpecificLocation(contact_location);

        if (contact_name.includes("??") || contact_name.includes("||") || contact_name.includes("&&") ||
            contact_phone.includes("??") || contact_phone.includes("||") || contact_phone.includes("&&") ||
            location_display.includes("??") || location_display.includes("||") || location_display.includes("&&")
        ) {
            alert("Invalid characters provided");
            return;
        }

        obj.name = contact_name;
        obj.phone = contact_phone;
        obj.location = contact_location;

        paintContacts();

        closeModals();
    });


    // Retrieve Edit Inspections
    $(document).on('click', '.edit_inspection', function (e) {
        e.preventDefault();
        let id = $(this).attr('name');
        id = id.replace("inspection_", "");

        let obj;
        for (var i = 0; i < all_inspections.length + 1; i++) {
            var ins = all_inspections[i];
            if (ins.id == id) {
                obj = ins;
                break;
            }
        }

        $(".edit_inspection_modal").css("display", "block");

        var start_date = obj.start_date;
        var end_date = obj.end_date;
        var start_time = obj.start_time;
        var end_time = obj.end_time;
        var location = obj.location;

        var list = getLocationList();

        $("#edit_inspection_location").html(list);


        $("#edit_inspection_start_date").val(start_date);
        $("#edit_inspection_end_date").val(end_date);
        $("#edit_inspection_start_time").val(start_time);
        $("#edit_inspection_end_time").val(end_time);
        $("#edit_inspection_location").val(location);

        edit_inspection_num = obj.id;
    });

    // Edit Inspection
    $("#save_edit_inspection").click(function (e) {
        e.preventDefault();

        var num = edit_inspection_num;
        var obj;


        var check_inspection_removal = $("#check_inspection_removal").val();
        if (check_inspection_removal == "1" || check_inspection_removal == 1) {
            alert("Please correct the errors on this form");
            return;
        }

        var edit_start_date_field = document.getElementById("edit_inspection_start_date");
        var edit_end_date_field = document.getElementById("edit_inspection_end_date");
        var edit_start_time_field = document.getElementById("edit_inspection_start_time");
        var edit_end_time_field = document.getElementById("edit_inspection_end_time");
        var edit_location_field = document.getElementById("edit_inspection_location");

        var start_date = edit_start_date_field.value;
        var end_date = edit_end_date_field.value;
        var start_time = edit_start_time_field.value;
        var end_time = edit_end_time_field.value;
        var location = edit_location_field.value;

        // Check if required fields are filled in
        if (start_date == "" || start_time == "" || end_time == "" || location == "" || inspection_date_error) {
            alert("Please complete the form");
            return;
        }

        for (var i = 0; i < all_inspections.length; i++) {
            var ins = all_inspections[i];

            if (ins.id == num) {
                obj = ins;
                break;
            }
        }

        var location_display = getSpecificLocation(location);

        // Make sure that they are not injecting
        if (start_date.includes("??") || start_date.includes("||") || start_date.includes("&&") ||
            end_date.includes("??") || end_date.includes("||") || end_date.includes("&&") ||
            start_time.includes("??") || start_time.includes("||") || start_time.includes("&&") ||
            end_time.includes("??") || end_time.includes("||") || end_time.includes("&&") ||
            location_display.includes("??") || location_display.includes("||") || location_display.includes("&&")
        ) {
            alert("Invalid characters provided");
            return;
        }

        obj.start_date = start_date;
        obj.end_date = end_date;
        obj.start_time = start_time;
        obj.end_time = end_time;
        obj.location = location;

        paintInspections();

        closeModals();

    });

    // Retrieve Edit Location
    $(document).on('click', '.edit_location', function (e) {
        e.preventDefault();


        $(".country_drop").html(country_drop);

        let name = $(this).attr("name");
        name = name.replace("location_", "");

        let obj;
        for (var i = 0; i < all_locations.length + 1; i++) {
            var loc = all_locations[i];
            if (loc.id == name) {
                obj = loc;
                break;
            }
        }

        $(".edit_location_modal").css("display", "block");

        var entered_country = obj.country;
        entered_country = all_countries.indexOf(entered_country);

        edit_address1_field.value = obj.address1;
        if (obj.address2 == -1) {
            edit_address2_field.value = "";
        }
        else {
            edit_address2_field.value = obj.address2;
        }
        edit_country_field.value = obj.country;
        edit_city_field.value = obj.city;
        entered_state = obj.state;

        if (all_states[entered_country] == "<option class='select' value=''>Select a State/Province</option>") {
            $("#edit_asset_state_static").css("display", "block");
            $("#edit_asset_state").css("display", "none");
            $("#edit_asset_state").html("");

            $("#edit_asset_state_static").val(entered_state);
        }
        else {
            $("#edit_asset_state").css("display", "block");
            $("#edit_asset_state").html(all_states[entered_country]);
            $("#edit_asset_state_static").css("display", "none");

            $("#edit_asset_state").val(entered_state);
        }
        edit_location_num = obj.id;
    });

    // Edit Location
    $("#save_edit_location").click(function (e) {
        e.preventDefault();


        var num = edit_location_num;
        var obj;

        var dynamic_state = $("#edit_asset_state").css("display");
        var state;

        if (dynamic_state == "none") {
            state = $("#edit_asset_state_static").val();
        }
        else {
            state = $("#edit_asset_state").val();
        }

        if (edit_address1_field.value == "" || edit_city_field.value == "" || edit_country_field.value == "" || state == "") {
            alert("Please complete the form");
            return;
        } for (var i = 0; i < all_locations.length; i++) {
            var loc = all_locations[i];
            if (loc.id == num) {
                obj = loc;
                break;
            }
        }

        if (edit_address2_field.value == -1) {
            obj.address2 = "";
        }
        else {
            obj.address2 = edit_address2_field.value;
        }
        if (edit_address1_field.value.includes("??") || edit_address1_field.value.includes("||") || edit_address1_field.value.includes("&&") ||
            obj.address2.includes("??") || obj.address2.includes("||") || obj.address2.includes("&&") ||
            edit_country_field.value.includes("??") || edit_country_field.value.includes("||") || edit_country_field.value.includes("&&") ||
            edit_city_field.value.includes("??") || edit_city_field.value.includes("||") || edit_city_field.value.includes("&&") ||
            state.includes("??") || state.includes("||") || state.includes("&&")
        ) {
            alert("Invalid characters provided");
            return;
        }

        obj.address1 = edit_address1_field.value;
        obj.city = edit_city_field.value;
        obj.country = edit_country_field.value;


        obj.state = state;


        var country_display = country_code_to_name(edit_country_field.value);


        document.getElementById("location_address1_entry_" + num).innerHTML = obj.address1;
        document.getElementById("location_address2_entry_" + num).innerHTML = obj.address2;
        document.getElementById("location_city_entry_" + num).innerHTML = obj.city;
        document.getElementById("location_state_entry_" + num).innerHTML = obj.state;
        document.getElementById("location_country_entry_" + num).innerHTML = country_display;

        paintLocations();
        paintContacts();
        paintInspections();
        paintRemovals();


        closeModals();
    });


    // Retrieve Edit Removals
    $(document).on('click', '.edit_removal', function (e) {
        e.preventDefault();
        let id = $(this).attr('name');
        id = id.replace("removal_", "");

        let obj;
        for (var i = 0; i < all_removals.length + 1; i++) {
            var rem = all_removals[i];
            if (rem.id == id) {
                obj = rem;
                break;
            }
        }

        $(".edit_removal_modal").css("display", "block");

        var start_date = obj.start_date;
        var end_date = obj.end_date;
        var start_time = obj.start_time;
        var end_time = obj.end_time;
        var location = obj.location;

        var list = getLocationList();

        $("#edit_removal_location").html(list);


        $("#edit_removal_start_date").val(start_date);
        $("#edit_removal_end_date").val(end_date);
        $("#edit_removal_start_time").val(start_time);
        $("#edit_removal_end_time").val(end_time);
        $("#edit_removal_location").val(location);

        edit_removal_num = obj.id;
    });

    // Edit Removal
    $("#save_edit_removal").click(function (e) {
        e.preventDefault();

        var num = edit_removal_num;
        var obj;

        var check_inspection_removal = $("#check_inspection_removal").val();
        if (check_inspection_removal == "1" || check_inspection_removal == 1) {
            alert("Please correct the errors on this form");
            return;
        }

        var edit_start_date_field = document.getElementById("edit_removal_start_date");
        var edit_end_date_field = document.getElementById("edit_removal_end_date");
        var edit_start_time_field = document.getElementById("edit_removal_start_time");
        var edit_end_time_field = document.getElementById("edit_removal_end_time");
        var edit_location_field = document.getElementById("edit_removal_location");

        var start_date = edit_start_date_field.value;
        var end_date = edit_end_date_field.value;
        var start_time = edit_start_time_field.value;
        var end_time = edit_end_time_field.value;
        var location = edit_location_field.value;

        // Check if required fields are filled in
        if (start_date == "" || start_time == "" || end_time == "" || location == "" || removal_date_error) {
            alert("Please complete the form");
            return;
        }

        for (var r = 0; r < all_removals.length; r++) {
            var rem = all_removals[r];

            if (rem.id == num) {
                obj = rem;
                break;
            }
        }

        var location_display = getSpecificLocation(location);

        // Make sure that they are not injecting
        if (start_date.includes("??") || start_date.includes("||") || start_date.includes("&&") ||
            end_date.includes("??") || end_date.includes("||") || end_date.includes("&&") ||
            start_time.includes("??") || start_time.includes("||") || start_time.includes("&&") ||
            end_time.includes("??") || end_time.includes("||") || end_time.includes("&&") ||
            location_display.includes("??") || location_display.includes("||") || location_display.includes("&&")
        ) {
            alert("Invalid characters provided");
            return;
        }


        obj.start_date = start_date;
        obj.end_date = end_date;
        obj.start_time = start_time;
        obj.end_time = end_time;
        obj.location = location;

        paintRemovals();
        closeModals();
    });

    // Delete Location
    $(document).on('click', '.delete_location', function (e) {
        e.preventDefault();

        var name = $(this).attr('name');

        var deleteID = name.replace("location_", "");

        for (var l = 0; l < all_locations.length; l++) {
            var curr_loc = all_locations[l];

            if (curr_loc.id == deleteID) {
                all_locations[l] = -1;
                break;
            }
        }

        // inspection - missing location
        for (var i = 0; i < all_inspections.length; i++) {
            var ins = all_inspections[i];

            if (ins['location'] == deleteID) {
                all_inspections[i]['location'] = -1;
            }
        }

        // removal - missing location
        for (var r = 0; r < all_removals.length; r++) {
            var rem = all_removals[r];

            if (rem['location'] == deleteID) {
                all_removals[r]['location'] = -1;
            }
        }

        // contact - missing location
        for (var c = 0; c < all_contacts.length; c++) {
            var con = all_contacts[c];

            if (con['location'] == deleteID) {
                all_contacts[c]['location'] = -1;
            }
        }

        paintLocations();
        paintContacts();
        paintInspections();
        paintRemovals();
    });

    // Delete Contact
    $(document).on('click', '.delete_contact', function (e) {
        e.preventDefault();

        var name = $(this).attr("name");

        var deleteID = name.replace("contact_", "");

        for (var c = 0; c < all_contacts.length; c++) {
            var con = all_contacts[c];

            if (con.id == deleteID) {
                all_contacts[c] = -1;
                break;
            }
        }

        paintContacts();
    });

    // Delete Inspection
    $(document).on('click', '.delete_inspection', function (e) {
        e.preventDefault();

        var name = $(this).attr("name");

        var deleteID = name.replace("inspection_", "");

        for (var i = 0; i < all_inspections.length; i++) {
            var ins = all_inspections[i];

            if (ins.id == deleteID) {
                all_inspections[i] = -1;
                break;
            }
        }

        paintInspections();
    });

    // Delete Inspection
    $(document).on('click', '.delete_removal', function (e) {
        e.preventDefault();

        var name = $(this).attr("name");

        var deleteID = name.replace("removal_", "");

        for (var i = 0; i < all_removals.length; i++) {
            var rem = all_removals[i];

            if (rem.id == deleteID) {
                all_removals[i] = -1;
                break;
            }
        }

        paintRemovals();
    });

    // Delete Question
    $(document).on('click', '.delete_question', function (e) {
        e.preventDefault();

        var name = $(this).attr("name");

        var deleteID = name.replace("question_", "");

        for (var c = 0; c < all_questions.length; c++) {
            var ques = all_questions[c];

            if (ques.id == deleteID) {
                all_questions[c] = -1;
                break;
            }
        }

        paintQuestions();
    });




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