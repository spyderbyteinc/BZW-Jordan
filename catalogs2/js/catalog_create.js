$(document).ready(function () {

    // OBJECT CONSTRUCTORS
    // Location constructor
    function Location(id, address1, address2, country, city, state) {
        this.id = id;
        this.address1 = address1;
        this.address2 = address2;
        this.country = country;
        this.city = city;
        this.state = state;
    }
    // Question Constructor
    function Question(id, question) {
        this.id = id;
        this.question = question;
    }
    // Contact Constructor
    function Contact(id, name, phone, location) {
        this.id = id;
        this.name = name;
        this.phone = phone;
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
    // Inspection Constructor
    function Inspection(id, start_date, end_date, start_time, end_time, location) {
        this.id = id;
        this.start_date = start_date;
        this.end_date = end_date;
        this.start_time = start_time;
        this.end_time = end_time;
        this.location = location;
    }

    // Start and End time selectors
    $(".start_time_drop").html(start_time);
    $(".end_time_drop").html(end_time);

    // Hide Add Information buttons
    $("#add_inspect_details").css("display", "none");
    $("#add_removal_details").css("display", "none");
    $("#add_onsite_contact").css("display", "none");

    // Handle House Account Selection
    $(".house_node").click(function () {
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


    // Date Pickers
    var d = new Date();
    var y = d.getFullYear();
    var r = y + 3;

    var range = "-80:" + r;

    $(".date").datepicker({
        changeYear: true,
        changeMonth: true,
        yearRange: range,
        onSelect: function (dateText) {
            $(this).css("background-color", "whitesmoke");
        }
    });

    $(".date_picker").datepicker({
        changeYear: true,
        changeMonth: true,
        yearRange: range,
        onSelect: function (dateText) {
            $(this).css("background-color", "whitesmoke");
        }
    });

    // Country dropdown
    $(".country_drop").html(country_drop);


    // MODALS
    // Close All Modals
    $(".close_modal").click(function (e) {
        e.preventDefault();

        closeModals();
    });

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

        $("#removal_start_date").val("");
        $("#removal_end_date").val("");
        $("#removal_start_time").val("");
        $("#removal_end_time").val("");
        $("#removal_location").val("");

        $("#contact_name").val("");
        $("#contact_phone").val("");
        $("#contact_location").val("");

        $("#registration_question").val("");
    }
    // Add Location Modal 
    $("#add_location_details").click(function (e) {
        e.preventDefault();
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

        var list = get_location_list();

        $("#contact_location").empty();

        $("#contact_location").append(list);

        $(".add_contact_modal").css("display", "block");

    });

    // Add Inspection Modal
    $("#add_inspect_details").click(function (e) {
        e.preventDefault();

        var list = get_location_list();

        $("#inspection_location").empty();

        $("#inspection_location").append(list);

        $(".add_inspection_modal").css("display", "block");

    });

    // Add Removal Modal
    $("#add_removal_details").click(function (e) {
        e.preventDefault();

        var list = get_location_list();

        $("#removal_location").empty();

        $("#removal_location").append(list);

        $(".add_removal_modal").css("display", "block");

    });

    // Add Question Modal
    $("#add_registration_question").click(function (e) {
        e.preventDefault();

        $(".add_question_modal").css("display", "block");
    });

    // COUNTER OBJECTS
    const location_counter = document.getElementById("location_num");
    const question_counter = document.getElementById("question_num");
    const inspection_counter = document.getElementById("inspection_num");
    const removal_counter = document.getElementById("removal_num");
    const contact_counter = document.getElementById("contact_num");

    // Location UI selectors
    const edit_address1_field = document.getElementById("edit_asset_address1");
    const edit_address2_field = document.getElementById("edit_asset_address2");
    const edit_country_field = document.getElementById("edit_asset_country");
    const edit_city_field = document.getElementById("edit_asset_city");
    const edit_state_field = document.getElementById("edit_asset_state");
    const edit_static_state_field = document.getElementById("edit_asset_state_static");

    // ARRAYS OF OBJECTS
    // Locations
    const all_locations = [];
    // Questions
    const all_questions = [];
    // Contacts
    const all_contacts = [];
    // Removals
    const all_removals = [];
    // Inspections
    const all_inspections = [];


    // Location actions - show/hide information buttons
    function location_action() {
        var location_list_number = $(".location_item").length;

        var inspection_number = document.getElementById("inspection_list").childElementCount;
        var removal_number = document.getElementById("removal_list").childElementCount;
        var contact_number = document.getElementById("contact_list").childElementCount;

        if (location_list_number == 0) {
            $("#asset_location_disclaimer").css("display", "block");
            $("#inspection_location_disclaimer").css("display", "block");
            $("#contact_location_disclaimer").css("display", "block");
            $("#removal_location_disclaimer").css("display", "block");

            $("#add_inspect_details").css("display", "none");
            $("#add_removal_details").css("display", "none");
            $("#add_onsite_contact").css("display", "none");
            $(".special_notes").css("display", "none");

        }
        else {
            $("#asset_location_disclaimer").css("display", "none");
            $("#inspection_location_disclaimer").css("display", "none");
            $("#contact_location_disclaimer").css("display", "none");
            $("#removal_location_disclaimer").css("display", "none");

            $(".special_notes").css("display", "flex");

            if (inspection_number < 10) {
                $("#add_inspect_details").css("display", "inline-block");
            }
            if (removal_number < 10) {
                $("#add_removal_details").css("display", "inline-block");
            }
            if (contact_number < 10) {
                $("#add_onsite_contact").css("display", "inline-block");
            }
        }
    }

    // Removal Actions
    function removal_actions() {
        var removal_number = document.getElementById("removal_list").childElementCount;

        if (removal_number == 0) {
            $("#multiple_removal_disclaimer").css("display", "block");
        }
        else {
            $("#multiple_removal_disclaimer").css("display", "none");
        }
    }

    // Inspection Operations
    const edit_inspection_start_date_field = document.getElementById("edit_inspection_start_date");
    const edit_inspection_end_date_field = document.getElementById("edit_inspection_end_date");
    const edit_inspection_start_time_field = document.getElementById("edit_inspection_start_time");
    const edit_inspection_end_time_field = document.getElementById("edit_inspection_end_time");
    const edit_inspection_location_field = document.getElementById("edit_inspection_location");
    $("#submit_inspection_form").click(function (e) {
        add_inspection(e);
    });
    $(document).on('click', '.edit_inspection', function (e) {
        var list = get_location_list();

        $("#edit_inspection_location").empty();

        $("#edit_inspection_location").append(list);

        retrieve_inspection(e, this);
    });
    $("#save_edit_inspection").click(function (e) {
        save_edit_inspection(e);
    });
    $(document).on('click', '.delete_inspection', function (e) {
        delete_inspection(e, this);
    });
    function add_inspection(e) {
        e.preventDefault();

        // UI Selectors
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

        if (start_date == "" || start_time == "" || end_time == "" || location == "") {
            alert("Please complete the form");
            return;
        }

        const id = parseInt(inspection_counter.value) + 1;
        inspection_counter.value = id;

        const inspection_object = new Inspection(id, start_date, end_date, start_time, end_time, location);

        all_inspections.push(inspection_object);

        closeModals();

        var disp_end_date = end_date;

        if (end_date == "") {
            disp_end_date = start_date;
        }

        const output = `
            <li class="inspection_item" name="inspection_module_${id}">
                <span class="location_alert">
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
                        <span class="location_display">
                            ${specific_location(location)}
                        </span>
                    </span>
                </span>
                <span class="operations">
                    <i class="fas fa-edit cursor_pointer edit_inspection" name="inspection_${id}"></i>
                    <i class="far fa-trash-alt cursor_pointer delete_inspection" name="inspection_${id}"></i>
                </span>
            </li>
        `;

        document.getElementById("inspection_list").innerHTML += output;
        var num = all_inspections.length;
        if (num >= 10) {
            document.getElementById("add_inspect_details").style.display = "none";
        }
    }
    function retrieve_inspection(e, icon) {
        e.preventDefault();

        let name = $(icon).attr("name");
        name = name.replace("inspection_", "");

        let obj;
        for (var i = 0; i < all_inspections.length + 1; i++) {
            var ins = all_inspections[i];
            if (ins.id == name) {
                obj = ins;
                break;
            }
        }

        $(".edit_inspection_modal").css("display", "block");

        edit_inspection_start_date_field.value = obj.start_date;
        edit_inspection_end_date_field.value = obj.end_date;
        edit_inspection_start_time_field.value = obj.start_time;
        edit_inspection_end_time_field.value = obj.end_time;
        edit_inspection_location_field.value = obj.location;

        $("#edit_inspection_number").val(obj.id);

    }
    function save_edit_inspection(e) {
        e.preventDefault();

        var num = $("#edit_inspection_number").val();

        var obj;
        for (var i = 0; i < all_inspections.length; i++) {
            var ins = all_inspections[i];
            if (ins.id == num) {
                obj = ins;
                break;
            }
        }

        if (edit_inspection_start_date_field.value == "" || edit_inspection_start_time_field.value == "" || edit_inspection_end_time_field.value == "" || edit_inspection_location_field.value == "") {
            alert("Please complete the form");
            return;
        }

        obj.start_date = edit_inspection_start_date_field.value;
        obj.end_date = edit_inspection_end_date_field.value;
        obj.start_time = edit_inspection_start_time_field.value;
        obj.end_time = edit_inspection_end_time_field.value;
        obj.location = edit_inspection_location_field.value;

        var location_display = specific_location(obj.location);

        document.getElementById("inspection_start_date_entry_" + num).innerHTML = obj.start_date;
        document.getElementById("inspection_end_date_entry_" + num).innerHTML = obj.end_date;
        document.getElementById("inspection_start_time_entry_" + num).innerHTML = mil_time_to_disp(obj.start_time);
        document.getElementById("inspection_end_time_entry_" + num).innerHTML = mil_time_to_disp(obj.end_time);
        document.getElementById("inspection_location_entry_" + num).innerHTML = location_display;

        var n = "inspection_module_" + obj.id;
        var x = `[name='${n}']`;
        $(x).find(".location_alert").css("display", "none");

        closeModals();
    }
    function delete_inspection(e, icon) {
        e.preventDefault();

        let name = $(icon).attr("name");
        name = name.replace("inspection_", "");

        for (var i = 0; i < all_inspections.length; i++) {
            var ins = all_inspections[i];
            if (ins.id == name) {
                all_inspections.splice(i, 1);
                break;
            }
        }

        icon.parentElement.parentElement.remove();

        document.getElementById("add_inspect_details").style.display = "inline-block";
    }

    // Removal Operatons
    const edit_removal_start_date_field = document.getElementById("edit_removal_start_date");
    const edit_removal_end_date_field = document.getElementById("edit_removal_end_date");
    const edit_removal_start_time_field = document.getElementById("edit_removal_start_time");
    const edit_removal_end_time_field = document.getElementById("edit_removal_end_time");
    const edit_removal_location_field = document.getElementById("edit_removal_location");
    $("#submit_removal_form").click(function (e) {
        add_removal(e);

        removal_actions();
    });
    $(document).on('click', '.edit_removal', function (e) {
        var list = get_location_list();

        $("#edit_removal_location").empty();

        $("#edit_removal_location").append(list);

        retrieve_removal(e, this);

        removal_actions();
    });
    $("#save_edit_removal").click(function (e) {
        save_edit_removal(e);

        removal_actions();
    });
    $(document).on('click', '.delete_removal', function (e) {
        delete_removal(e, this);

        removal_actions();
    });
    function delete_removal(e, icon) {
        e.preventDefault();

        let name = $(icon).attr("name");
        name = name.replace("removal_", "");

        for (var i = 0; i < all_removals.length; i++) {
            var rem = all_removals[i];
            if (rem.id == name) {
                all_removals.splice(i, 1);
                break;
            }
        }

        icon.parentElement.parentElement.remove();

        document.getElementById("add_removal_details").style.display = "inline-block";
    }
    function retrieve_removal(e, icon) {
        e.preventDefault();

        let name = $(icon).attr("name");
        name = name.replace("removal_", "");

        let obj;
        for (var i = 0; i < all_removals.length + 1; i++) {
            var rem = all_removals[i];
            if (rem.id == name) {
                obj = rem;
                break;
            }
        }

        $(".edit_removal_modal").css("display", "block");

        edit_removal_start_date_field.value = obj.start_date;
        edit_removal_end_date_field.value = obj.end_date;
        edit_removal_start_time_field.value = obj.start_time;
        edit_removal_end_time_field.value = obj.end_time;
        edit_removal_location_field.value = obj.location;

        $("#edit_removal_number").val(obj.id);
    }
    function add_removal(e) {
        e.preventDefault();

        // UI Selectors
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

        if (start_date == "" || start_time == "" || end_time == "" || location == "") {
            alert("Please complete the form");
            return;
        }

        const id = parseInt(removal_counter.value) + 1;
        removal_counter.value = id;

        const removal_object = new Removal(id, start_date, end_date, start_time, end_time, location);

        all_removals.push(removal_object);

        closeModals();

        var disp_end_date = end_date;

        if (end_date == "") {
            disp_end_date = start_date;
        }

        const output = `
            <li class="removal_item" name="removal_module_${id}">
                <span class="location_alert">
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
                        <span class="location_display">
                            ${specific_location(location)}
                        </span>
                    </span>
                </span>
                <span class="operations">
                    <i class="fas fa-edit cursor_pointer edit_removal" name="removal_${id}"></i>
                    <i class="far fa-trash-alt cursor_pointer delete_removal" name="removal_${id}"></i>
                </span>
            </li>
        `;

        document.getElementById("removal_list").innerHTML += output;
        var num = all_removals.length;
        if (num >= 10) {
            document.getElementById("add_removal_details").style.display = "none";
        }

    }
    function save_edit_removal(e) {
        e.preventDefault();

        var num = $("#edit_removal_number").val();

        var obj;
        for (var i = 0; i < all_removals.length; i++) {
            var rem = all_removals[i];
            if (rem.id == num) {
                obj = rem;
                break;
            }
        }

        if (edit_removal_start_date_field.value == "" || edit_removal_start_time_field.value == "" || edit_removal_end_time_field.value == "" || edit_removal_location_field.value == "") {
            alert("Please complete the form");
            return;
        }

        obj.start_date = edit_removal_start_date_field.value;
        obj.end_date = edit_removal_end_date_field.value;
        obj.start_time = edit_removal_start_time_field.value;
        obj.end_time = edit_removal_end_time_field.value;
        obj.location = edit_removal_location_field.value;

        var location_display = specific_location(obj.location);

        document.getElementById("removal_start_date_entry_" + num).innerHTML = obj.start_date;
        document.getElementById("removal_end_date_entry_" + num).innerHTML = obj.end_date;
        document.getElementById("removal_start_time_entry_" + num).innerHTML = mil_time_to_disp(obj.start_time);
        document.getElementById("removal_end_time_entry_" + num).innerHTML = mil_time_to_disp(obj.end_time);
        document.getElementById("removal_location_entry_" + num).innerHTML = location_display;


        var n = "removal_module_" + obj.id;
        var x = `[name='${n}']`;
        $(x).find(".location_alert").css("display", "none");

        closeModals();
    }

    // Location Operations
    $("#submit_location_form").click(function (e) {
        add_location(e);

        location_action();
    });
    $("#save_edit_location").click(function (e) {
        save_edit_location(e);

        location_action();
    });
    $(document).on('click', '.delete_location', function (e) {
        delete_location(e, this);

        location_action();
    });
    $(document).on('click', '.edit_location', function (e) {
        retrieve_location(e, this);

        location_action();
    });
    function retrieve_location(e, icon) {
        e.preventDefault();

        let name = $(icon).attr("name");
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

        $("#edit_location_number").val(obj.id);
    }
    function save_edit_location(e) {
        e.preventDefault();

        var num = $("#edit_location_number").val();
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
        }


        for (var i = 0; i < all_locations.length; i++) {
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

        closeModals();
    }
    function delete_location(e, icon) {
        e.preventDefault();

        let name = $(icon).attr("name");
        name = name.replace("location_", "");

        for (var i = 0; i < all_locations.length; i++) {
            var loc = all_locations[i];
            if (loc.id == name) {
                all_locations.splice(i, 1);
                break;
            }
        }

        icon.parentElement.parentElement.remove();

        document.getElementById("add_location_details").style.display = "inline-block";

        handle_missing_location(name);
    }
    function add_location(e) {
        e.preventDefault();

        // UI Selectors
        const address1_field = document.getElementById("asset_address1");
        const address2_field = document.getElementById("asset_address2");
        const country_field = document.getElementById("asset_country");
        const city_field = document.getElementById("asset_city");
        const dynamic_state_field = document.getElementById("asset_state");
        const static_state_field = document.getElementById("asset_state_static");

        var state_field_disp = dynamic_state_field.style.display;
        var static_state_field_disp = static_state_field.style.display;


        if (state_field_disp == "block") {
            var state_name = "asset_state";
        }
        else if (static_state_field_disp == "block") {
            var state_name = "asset_state_static";
        }

        var state_field = document.getElementById(state_name);

        const address1 = address1_field.value;
        const address2_display = address2_field.value;
        const country = country_field.value;
        const city = city_field.value;
        const state = state_field.value;

        var address2;
        if (address2_display == "") {
            address2 = -1;
        }
        else {
            address2 = address2_display;
        }

        if (address1 == "" || country == "" || city == "" || state == "") {
            alert("Please complete the form");
            return;
        }


        if (address1.includes("??") || address1.includes("||") || address1.includes("&&") ||
            address2_display.includes("??") || address2_display.includes("||") || address2_display.includes("&&") ||
            country.includes("??") || country.includes("||") || country.includes("&&") ||
            city.includes("??") || city.includes("||") || city.includes("&&") ||
            state.includes("??") || state.includes("||") || state.includes("&&")
        ) {
            alert("Invalid characters provided");
            return;
        }

        const id = parseInt(location_counter.value) + 1;

        location_counter.value = id;

        const location_object = new Location(id, address1, address2, country, city, state);

        var country_display = country_code_to_name(country);


        all_locations.push(location_object);



        closeModals();

        const output = `
            <li class="location_item" name="location_module_${id}">
                <span>
                    <strong>Address: </strong>
                    <span class="address" id="location_address1_entry_${id}">
                        ${address1}
                    </span>
                    <strong>Address 2: </strong>
                    <span class="address" id="location_address2_entry_${id}">
                        ${address2_display}
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
        document.getElementById("location_list").innerHTML += output;
        var num = all_locations.length;
        if (num >= 5) {
            document.getElementById("add_location_details").style.display = "none";
        }
    }
    function handle_missing_location(num) {
        // Loop through Contact Information
        for (var i = 0; i < all_contacts.length; i++) {
            cont = all_contacts[i];
            if (cont.location == num) {
                var contact_id = cont.id;

                // Handle missing object 
                cont.location = -1;

                // Handle missing text
                var m = "#contact_location_entry_" + contact_id;
                $(m).find(".location_display").html("ERROR - Missing Location");

                // Show missing icon
                var n = "contact_module_" + contact_id;
                var x = `[name='${n}']`;
                $(x).find(".location_alert").css("display", "flex");
            }
            else {
                continue;
            }
        }

        // Loop through Inspection Information
        for (var i = 0; i < all_inspections.length; i++) {
            var ins = all_inspections[i];
            if (ins.location == num) {
                var inspection_id = ins.id;

                // Handle missing object
                ins.location = -1;

                // Handle missing text
                var m = "#inspection_location_entry_" + inspection_id;
                $(m).find(".location_display").html("ERROR - Missing Location");

                // Show missing icon
                var n = "inspection_module_" + inspection_id;
                var x = `[name='${n}']`;
                $(x).find(".location_alert").css("display", "flex");
            }
            else {
                continue;
            }
        }

        // Loop through Removal Inforamtion
        for (var i = 0; i < all_removals.length; i++) {
            var rem = all_removals[i];
            if (rem.location == num) {
                var removal_id = rem.id;

                // Handle missing object
                rem.location = -1;

                // Handle missing text
                var m = "#removal_location_entry_" + removal_id;
                $(m).find(".location_display").html("ERROR - Missing Location");

                // Show missing icon
                var n = "removal_module_" + removal_id;
                var x = `[name='${n}']`;
                $(x).find(".location_alert").css("display", "flex");

            }
        }
    }

    // Question Operations
    var edit_question_field = document.getElementById("edit_registration_question");
    $("#submit_question_form").click(function (e) {
        add_question(e);
    });
    $(document).on('click', '.edit_question', function (e) {
        retrieve_question(e, this);
    });
    $(document).on('click', '.delete_question', function (e) {
        delete_question(e, this);
    });
    $("#save_edit_question").click(function (e) {
        save_edit_question(e);
    });
    function delete_question(e, icon) {
        e.preventDefault();

        let name = $(icon).attr("name");
        name = name.replace("question_", "");

        for (var i = 0; i < all_questions.length; i++) {
            var quest = all_questions[i];
            if (quest.id == name) {
                all_questions.splice(i, 1);
                break;
            }
        }


        icon.parentElement.parentElement.parentElement.remove();

        document.getElementById("add_registration_question").style.display = "inline-block";
    }
    function save_edit_question(e) {
        e.preventDefault();

        var num = $("#edit_question_number").val();

        var obj;

        for (var i = 0; i < all_questions.length; i++) {
            var quest = all_questions[i];
            if (quest.id == num) {
                obj = quest;
                break;
            }
        }

        if (edit_question_field.value == "") {
            alert("Please complete the form");
            return;
        }

        if (edit_question_field.value.includes("||") || edit_question_field.value.includes("&&")) {
            alert("Invalid characters provided");
            return;
        }

        obj.question = edit_question_field.value;

        document.getElementById("question_entry_" + num).innerHTML = obj.question;

        closeModals();
    }
    function retrieve_question(e, icon) {
        e.preventDefault();

        let name = $(icon).attr("name");
        name = name.replace("question_", "");

        let obj;
        for (var i = 0; i < all_questions.length + 1; i++) {
            var quest = all_questions[i];
            if (quest.id == name) {
                obj = quest;
                break;
            }
        }

        $(".edit_question_modal").css("display", "block");

        edit_question_field.value = obj.question;

        $("#edit_question_number").val(obj.id);
    }
    function add_question(e) {
        e.preventDefault();

        // UI Selector
        const question_field = document.getElementById('registration_question');

        const ques = question_field.value;

        if (ques == "") {
            alert("Please complete the form");
            return;
        }

        if (ques.includes("||") || ques.includes("&&")) {
            alert("Invalid characters provided");
            return;
        }

        const id = parseInt(question_counter.value) + 1;
        question_counter.value = id;

        const question_object = new Question(id, ques);

        all_questions.push(question_object);

        closeModals();

        const output = `
            <li class="question_item" name="question_module_${id}">
                <span class="information_content width_100">
                    <strong>Question: </strong>
                    <span class="name" id="question_entry_${id}">
                        ${ques}
                    </span>
                    <span class="operations">
                        <i class="fas fa-edit cursor_pointer edit_question" name="question_${id}"></i>
                        <i class="far fa-trash-alt cursor_pointer delete_question" name="question_${id}"></i>
                    </span>
                </span>
            </li>      
        `;

        document.getElementById("question_list").innerHTML += output;
        var num = all_questions.length;
        if (num >= 10) {
            document.getElementById("add_registration_question").style.display = "none";
        }
    }

    // Contact Operations
    var edit_contact_name_field = document.getElementById('edit_contact_name');
    var edit_contact_phone_field = document.getElementById('edit_contact_phone');
    var edit_contact_location_field = document.getElementById('edit_contact_location');
    $("#submit_contact_form").click(function (e) {
        add_contact(e);
    });
    $(document).on('click', '.edit_contact', function (e) {

        var list = get_location_list();

        $("#edit_contact_location").empty();

        $("#edit_contact_location").append(list);

        retrieve_contact(e, this);
    });
    $("#save_edit_contact").click(function (e) {
        save_edit_contact(e);
    });
    $(document).on('click', '.delete_contact', function (e) {
        delete_contact(e, this);
    });
    function delete_contact(e, icon) {
        e.preventDefault();

        let name = $(icon).attr("name");
        name = name.replace("contact_", "");

        for (var i = 0; i < all_contacts.length; i++) {
            var cont = all_contacts[i];
            if (cont.id == name) {
                all_contacts.splice(i, 1);
                break;
            }
        }

        icon.parentElement.parentElement.remove();

        document.getElementById("add_onsite_contact").style.display = "inline-block";
    }
    function save_edit_contact(e) {
        e.preventDefault();

        var num = $("#edit_contact_number").val();

        var obj;
        for (var i = 0; i < all_contacts.length; i++) {
            var cont = all_contacts[i];
            if (cont.id == num) {
                obj = cont;
                break;
            }
        }

        if (edit_contact_name_field.value == "" || edit_contact_phone_field.value == "" || edit_contact_location_field.value == "") {
            alert("Please complete the form");
            return;
        }
        if (edit_contact_name_field.value.includes("??") || edit_contact_name_field.value.includes("||") || edit_contact_name_field.value.includes("&&") ||
            edit_contact_phone_field.value.includes("??") || edit_contact_phone_field.value.includes("||") || edit_contact_phone_field.value.includes("&&")
        ) {
            alert("Invalid characters provided");
            return;
        }

        obj.name = edit_contact_name_field.value;
        obj.phone = edit_contact_phone_field.value;
        obj.location = edit_contact_location_field.value;


        var location_display = specific_location(obj.location);

        document.getElementById("contact_name_entry_" + num).innerHTML = obj.name;
        document.getElementById("contact_phone_entry_" + num).innerHTML = obj.phone;
        $("#contact_location_entry_" + num).find(".location_display").html(location_display);

        closeModals();

        var n = "contact_module_" + obj.id;
        var x = `[name='${n}']`;
        $(x).find(".location_alert").css("display", "none");

    }
    function retrieve_contact(e, icon) {
        e.preventDefault();

        let name = $(icon).attr("name");
        name = name.replace("contact_", "");

        let obj;

        for (var i = 0; i < all_contacts.length + 1; i++) {
            var cont = all_contacts[i];
            if (cont.id == name) {
                obj = cont;
                break;
            }
        }

        $(".edit_contact_modal").css("display", "block");

        edit_contact_name_field.value = obj.name;
        edit_contact_phone_field.value = obj.phone;
        edit_contact_location_field.value = obj.location;

        $("#edit_contact_number").val(obj.id);

    }
    function add_contact(e) {
        e.preventDefault();

        // UI Selectors
        const name_field = document.getElementById('contact_name');
        const phone_field = document.getElementById('contact_phone');
        const location_field = document.getElementById('contact_location');

        const name = name_field.value;
        const phone = phone_field.value;
        const location = location_field.value;

        if (name == "" || phone == "" || location == "") {
            alert("Please complete the form");
            return;
        }
        if (name.includes("??") || name.includes("||") || name.includes("&&") ||
            phone.includes("??") || phone.includes("||") || phone.includes("&&")
        ) {
            alert("Invalid characters provided");
            return;
        }

        const id = parseInt(contact_counter.value) + 1;
        contact_counter.value = id;

        const contact_object = new Contact(id, name, phone, location);

        all_contacts.push(contact_object);

        var location_display = specific_location(location);

        closeModals();

        const output = `
            <li class="contact_item" name="contact_module_${id}">
                <span class="location_alert">
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
                        <span class="location_display">
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

        document.getElementById("contact_list").innerHTML += output;
        var num = all_contacts.length;
        if (num >= 10) {
            document.getElementById("add_onsite_contact").style.display = "none";
        }
    }


    // Get specific location by id
    function specific_location(id) {
        for (var i = 0; i < all_locations.length; i++) {
            var currLocation = all_locations[i];
            if (id == currLocation.id) {
                var address1 = currLocation.address1;
                var address2 = currLocation.address2;
                var city = currLocation.city;
                var state = currLocation.state;
                var country = currLocation.country;

                var country_display = country_code_to_name(country);

                if (address2 == "" || address2 == -1 || address2 == "-1") {
                    return address1 + ", " + city + ", " + state + ", " + country_display;
                }
                else {
                    return address1 + ", " + address2 + ", " + city + ", " + state + ", " + country_display;
                }
            }
        }
    }

    // Get list of locations
    function get_location_list() {
        var list = '<option value="">Choose Corresponding Asset Location</option>';
        for (var i = 0; i < all_locations.length; i++) {
            var current_location = all_locations[i];

            var current_address1 = current_location.address1;
            var current_address2 = current_location.address2;
            var current_city = current_location.city;
            var current_state = current_location.state;
            var current_country = current_location.country;

            var current_place;

            if (current_address2 == "" || current_address2 == -1 || current_address2 == "-1") {
                current_place = '<option value="' + current_location.id + '">' + current_address1 + ", " + current_city + ", " + current_state + ", " + current_country + '</option>';
            }
            else {
                current_place = '<option value="' + current_location.id + '">' + current_address1 + ", " + current_address2 + ", " + current_city + ", " + current_state + ", " + current_country + '</option>';
            }

            list = list + current_place;
        }

        return list;
    }

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

    $("#create_account_submit").click(function (e) {
        e.preventDefault();

        $("#create_account_submit").css("display", "none");

        var result = validate_catalog_creation();

        $(".saving_catalog_disclaimer").css("display", "block");

        if (result == "success") {
            ajax_create();
        }
        else {

            $("#create_account_submit").css("display", "inline-block");
            $(".saving_catalog_disclaimer").css("display", "none");
        }
    });

    function location_arr_to_str(location_obj) {
        if (typeof location_obj === 'undefined') {
            // does not exist
            return -1;
        }
        else {
            // does exist
            var id = location_obj.id;
            var address1 = location_obj.address1;
            var address2 = location_obj.address2;
            var country = location_obj.country;
            var city = location_obj.city;
            var state = location_obj.state;

            if (address2 == -1 || address2 == "" || address2 == "-1") {
                return id + "??||&&" + address1 + "??||&&" + -1 + "??||&&" + city + "??||&&" + state + "??||&&" + country;
            }
            else {
                return id + "??||&&" + address1 + "??||&&" + address2 + "??||&&" + city + "??||&&" + state + "??||&&" + country;
            }
        }
    }

    function contact_arr_to_str(contact_obj) {
        if (typeof contact_obj === 'undefined') {
            // does not exist
            return -1;
        }
        else {
            // does exist
            var id = contact_obj.id;
            var name = contact_obj.name;
            var phone = contact_obj.phone;
            var location = contact_obj.location;

            return id + "??||&&" + name + "??||&&" + phone + "??||&&" + location;
        }
    }

    function removal_arr_to_str(removal_obj) {
        if (typeof removal_obj === 'undefined') {
            // does not exist
            return -1;
        }
        else {
            // does exist
            var id = removal_obj.id;
            var start_date = removal_obj.start_date;
            var end_date = removal_obj.end_date;
            var start_time = removal_obj.start_time;
            var end_time = removal_obj.end_time;
            var location = removal_obj.location;

            if (end_date == "") {
                end_date = -1;
            }

            return id + "??||&&" + start_date + "??||&&" + end_date + "??||&&" + start_time + "??||&&" + end_time + "??||&&" + location;
        }
    }

    function inspect_arr_to_str(inspection_obj) {
        if (typeof inspection_obj === 'undefined') {
            // does not exist
            return -1;
        }
        else {
            // does exist
            var id = inspection_obj.id;
            var start_date = inspection_obj.start_date;
            var end_date = inspection_obj.end_date;
            var start_time = inspection_obj.start_time;
            var end_time = inspection_obj.end_time;
            var location = inspection_obj.location;

            if (end_date == "") {
                end_date = -1;
            }

            return id + "??||&&" + start_date + "??||&&" + end_date + "??||&&" + start_time + "??||&&" + end_time + "??||&&" + location;
        }
    }

    function question_arr_to_str(question_obj) {
        if (typeof question_obj === 'undefined') {
            // does not exist
            return -1;
        }
        else {
            // does exist
            var id = question_obj.id;
            var question = question_obj.question;

            return id + "??||&&" + question;
        }
    }

    function ajax_create() {
        var location1, location2, location3, location4, location5;
        var inspection1, inspection2, inspection3, inspection4, inspection5, inspection6, inspection7, inspection8, inspection9, inspection10;
        var removal1, removal2, removal3, removal4, removal5, removal6, removal7, removal8, removal9, removal10;
        var contact1, contact2, contact3, contact4, contact5, contact6, contact7, contact8, contact9, contact10;
        var question1, question2, question3, question4, question5, question6, question7, question8, question9, question10;

        // locations
        location1 = location_arr_to_str(all_locations[0]);
        location2 = location_arr_to_str(all_locations[1]);
        location3 = location_arr_to_str(all_locations[2]);
        location4 = location_arr_to_str(all_locations[3]);
        location5 = location_arr_to_str(all_locations[4]);

        // inspections
        inspection1 = inspect_arr_to_str(all_inspections[0]);
        inspection2 = inspect_arr_to_str(all_inspections[1]);
        inspection3 = inspect_arr_to_str(all_inspections[2]);
        inspection4 = inspect_arr_to_str(all_inspections[3]);
        inspection5 = inspect_arr_to_str(all_inspections[4]);
        inspection6 = inspect_arr_to_str(all_inspections[5]);
        inspection7 = inspect_arr_to_str(all_inspections[6]);
        inspection8 = inspect_arr_to_str(all_inspections[7]);
        inspection9 = inspect_arr_to_str(all_inspections[8]);
        inspection10 = inspect_arr_to_str(all_inspections[9]);

        // removals
        removal1 = removal_arr_to_str(all_removals[0]);
        removal2 = removal_arr_to_str(all_removals[1]);
        removal3 = removal_arr_to_str(all_removals[2]);
        removal4 = removal_arr_to_str(all_removals[3]);
        removal5 = removal_arr_to_str(all_removals[4]);
        removal6 = removal_arr_to_str(all_removals[5]);
        removal7 = removal_arr_to_str(all_removals[6]);
        removal8 = removal_arr_to_str(all_removals[7]);
        removal9 = removal_arr_to_str(all_removals[8]);
        removal10 = removal_arr_to_str(all_removals[9]);

        // contacts
        contact1 = contact_arr_to_str(all_contacts[0]);
        contact2 = contact_arr_to_str(all_contacts[1]);
        contact3 = contact_arr_to_str(all_contacts[2]);
        contact4 = contact_arr_to_str(all_contacts[3]);
        contact5 = contact_arr_to_str(all_contacts[4]);
        contact6 = contact_arr_to_str(all_contacts[5]);
        contact7 = contact_arr_to_str(all_contacts[6]);
        contact8 = contact_arr_to_str(all_contacts[7]);
        contact9 = contact_arr_to_str(all_contacts[8]);
        contact10 = contact_arr_to_str(all_contacts[9]);

        // questions
        question1 = question_arr_to_str(all_questions[0]);
        question2 = question_arr_to_str(all_questions[1]);
        question3 = question_arr_to_str(all_questions[2]);
        question4 = question_arr_to_str(all_questions[3]);
        question5 = question_arr_to_str(all_questions[4]);
        question6 = question_arr_to_str(all_questions[5]);
        question7 = question_arr_to_str(all_questions[6]);
        question8 = question_arr_to_str(all_questions[7]);
        question9 = question_arr_to_str(all_questions[8]);
        question10 = question_arr_to_str(all_questions[9]);


        $.post("save_catalog.php", {
            catalog_name: catalog_name,
            auction_type: auction_type,
            charity_event: charity_event,
            catalog_description: catalog_description,
            start_date: start_date,
            start_time: start_time2,
            end_date: end_date,
            end_time: end_time2,
            end_increment: end_increment,

            location1: location1,
            location2: location2,
            location3: location3,
            location4: location4,
            location5: location5,

            house_accounts: house_accounts,

            currency: currency,
            timezone: timezone,
            buyer_premium: buyer_premium,

            inspection1: inspection1,
            inspection2: inspection2,
            inspection3: inspection3,
            inspection4: inspection4,
            inspection5: inspection5,
            inspection6: inspection6,
            inspection7: inspection7,
            inspection8: inspection8,
            inspection9: inspection9,
            inspection10: inspection10,

            removal1: removal1,
            removal2: removal2,
            removal3: removal3,
            removal4: removal4,
            removal5: removal5,
            removal6: removal6,
            removal7: removal7,
            removal8: removal8,
            removal9: removal9,
            removal10: removal10,

            contact1: contact1,
            contact2: contact2,
            contact3: contact3,
            contact4: contact4,
            contact5: contact5,
            contact6: contact6,
            contact7: contact7,
            contact8: contact8,
            contact9: contact9,
            contact10: contact10,

            question1: question1,
            question2: question2,
            question3: question3,
            question4: question4,
            question5: question5,
            question6: question6,
            question7: question7,
            question8: question8,
            question9: question9,
            question10: question10,

            terms_conditions: terms_conditions,

            inspection_notes: inspection_notes,
            removal_notes: removal_notes

        }, function (data, status) {
            if (data == "done" && status == "success") {
                location.replace("manage.php?creation=1");
            }
            else {
                // TODO - error handling
            }
        });
    }

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

    let catalog_name;
    let auction_type;
    let charity_event;
    let catalog_description;
    let start_date;
    let start_time2;
    let end_date;
    let end_time2;
    let end_increment;

    let house_accounts;

    let currency;
    let timezone;
    let buyer_premium;

    let terms_conditions;

    let inspection_notes;
    let removal_notes;


    function validate_catalog_creation() {
        // Validate create catalog form


        // define field values

        // BASIC INFORMATION section

        let catalog_name_DOM = document.getElementById("catalog_name");
        let auction_type_DOM = document.getElementById("auction_type");
        let charity_event_DOM = document.getElementById("charity_event");
        let catalog_description_DOM = document.getElementById("catalog_description");
        let start_date_DOM = document.getElementById("start_date");
        let start_time_DOM = document.getElementById("start_time");
        let end_date_DOM = document.getElementById("end_date");
        let end_time_DOM = document.getElementById("end_time");
        let end_increment_DOM = document.getElementById("end_increment");

        catalog_name = catalog_name_DOM.value;
        auction_type = auction_type_DOM.value;
        charity_event = charity_event_DOM.value;
        catalog_description = catalog_description_DOM.value;
        start_date = start_date_DOM.value;
        start_time2 = start_time_DOM.value;
        end_date = end_date_DOM.value;
        end_time2 = end_time_DOM.value;
        end_increment = end_increment_DOM.value;

        // ASSET LOCATION section
        // all_locations

        // HOUSE ACCOUNT section
        house_accounts = document.getElementById("active_house_accounts").value;

        // MISCELLANEOUS section
        let currency_DOM = document.getElementById("asset_currency");
        let timezone_DOM = document.getElementById("asset_timezone");
        let buyer_premium_DOM = document.getElementById("buyer_premium");

        currency = currency_DOM.value;
        timezone = timezone_DOM.value;
        buyer_premium = buyer_premium_DOM.value;

        // INSPECTION INFORMATION section
        // all_inspections

        // REMOVAL INFORMATION section
        // all_removals

        // CONTACT INFORMATION section
        // all_contacts

        // REGISTRATION QUESTION section
        // all_questions

        inspection_notes = document.getElementById("inspection_notes").value;
        removal_notes = document.getElementById("removal_notes").value;

        // LEGAL section
        let terms_conditions_DOM = document.getElementById("terms_conditions");

        terms_conditions = terms_conditions_DOM.value;

        // ajax_tester();

        // $.post("save_catalog.php", {
        //     locations: catalog_name
        // }, function (data, status) {
        //     alert(data);
        // });

        // validate - in order of appearance

        // BASiC INFORMATION section
        if (catalog_name == "") {
            alert("Please provide a catalog name");
            catalog_name_DOM.style.backgroundColor = "lightpink";
            catalog_name_DOM.focus();
            return;
        }
        if (auction_type == "") {
            alert("Please choose the auction type");
            auction_type_DOM.style.backgroundColor = "lightpink";
            auction_type_DOM.focus();
            return;
        }
        if (charity_event == "") {
            alert("Please specify if this is a charity event");
            charity_event_DOM.style.backgroundColor = "lightpink";
            charity_event_DOM.focus();
            return;
        }
        if (catalog_description == "") {
            alert("Please provide the catalog's description");
            catalog_description_DOM.style.backgroundColor = "lightpink";
            catalog_description_DOM.focus();
            return;
        }


        if (start_date == "") {
            alert("Please provide a start date");
            start_date_DOM.style.backgroundColor = "lightpink";
            start_date_DOM.focus();
            return;
        }
        if (start_time2 == "") {
            alert("Please provide a start time");
            start_time_DOM.style.backgroundColor = "lightpink";
            start_time_DOM.focus();
            return;
        }
        if (end_date == "") {
            alert("Please provide an end date");
            end_date_DOM.style.backgroundColor = "lightpink";
            end_date_DOM.focus();
            return;
        }
        if (end_time2 == "") {
            alert("Please provide an end time");
            end_time_DOM.style.backgroundColor = "lightpink";
            end_time_DOM.focus();
            return;
        }
        if (end_increment == "") {
            alert("Please provide the end increment");
            end_increment_DOM.style.backgroundColor = "lightpink";
            end_increment_DOM.focus();
            return;
        }

        // LOCATION section
        if (all_locations.length == 0) {
            alert("You must provide at least one asset location");
            return;
        }

        // MISCELANEOUS section
        if (currency == "") {
            alert("Please provide the currency of the asset");
            currency_DOM.style.backgroundColor = "lightpink";
            currency_DOM.focus();
            return;
        }
        if (timezone == "") {
            alert("Please provide the timezone of the asset");
            timezone_DOM.style.backgroundColor = "lightpink";
            timezone_DOM.focus();
            return;
        }
        if (buyer_premium == "") {
            alert("Please provide the buyer's premium for this auction");
            buyer_premium_DOM.style.backgroundColor = "lightpink";
            buyer_premium_DOM.focus();
            return;
        }
        if (typeof parseFloat(buyer_premium) != "number") {
            alert("The buyer premium must be a real number");
            buyer_premium_DOM.style.backgroundColor = "lightpink";
            buyer_premium_DOM.focus();
            return;
        }
        if (parseFloat(buyer_premium) > 100) {
            alert("The buyer premium must be a percentage less than 100");
            buyer_premium_DOM.style.backgroundColor = "lightpink";
            buyer_premium_DOM.focus();
            return;
        }
        if (parseFloat(buyer_premium) < 0) {
            alert("The buyer premium must be a percentage greater than 0");
            buyer_premium_DOM.style.backgroundColor = "lightpink";
            buyer_premium_DOM.focus();
            return;
        }

        // INSPECTION INFORMATION section
        for (var i = 0; i < all_inspections.length; i++) {
            var ins = all_inspections[i];
            var id = ins.id;
            var loc = ins.location;

            var mod = "inspection_module_" + id;
            var sel = "[name='" + mod + "']";
            var disp = $(sel).find(".location_alert").css("display");

            if (loc == -1 || disp == "flex") {
                alert("At least one of your inspection details is missing a location");
                return;
            }
        }

        // REMOVAL INFORMATION section
        if (all_removals.length == 0) {
            alert("You must provide at least one removal time and date");
            return;
        }

        for (var i = 0; i < all_removals.length; i++) {
            var rem = all_removals[i];
            var id = rem.id;
            var loc = rem.location;

            var mod = "removal_module_" + id;
            var sel = "[name='" + mod + "']";
            var disp = $(sel).find(".location_alert").css("display");

            if (loc == -1 || disp == "flex") {
                alert("At least one of your removal details is missing a location");
                return;
            }
        }

        // CONTACT INFORMATION section
        for (var i = 0; i < all_contacts.length; i++) {
            var cont = all_contacts[i];
            var id = cont.id;
            var loc = cont.location;

            var mod = "contact_module_" + id;
            var sel = "[name='" + mod + "']";
            var disp = $(sel).find(".location_alert").css("display");

            if (loc == -1 || disp == "flex") {
                alert("At least one of your contact details is missing a location");
                return;
            }
        }

        // LEGAL section
        if (terms_conditions == "") {
            alert("Please provide the terms and conditions of this auction");
            terms_conditions_DOM.style.backgroundColor = "lightpink";
            terms_conditions_DOM.focus();
            return;
        }

        return "success";
    }

});