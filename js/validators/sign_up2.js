$("input").click(function () {
    $(this).css("background-color", "whitesmoke");
});
$("select").change(function () {
    $(this).css("background-color", "whitesmoke");
});
$("input").keypress(function () {
    $(this).css("background-color", "whitesmoke");
});
$("#dob").change(function () {
    $(this).css("background-color", "whitesmoke");
});

var inputs = ["first_name", "last_name", "country_code", "phoneNumber", "dob", "country", "address1", "city", "state", "zipcode", "username", "email", "password", "confirm", "question1", "answer1", "question2", "answer2"];

var alerts = [
    // Name Information
    "Please enter your first name",
    "Please enter your last name",

    // Company Information
    // Company Name
    // Tax ID Number

    // Contact Details
    "Please select your phone country code",
    "Please enter your phone number",
    "Please select your date of birth",

    // Residential Address Details
    "Please enter your country of residence",
    "Please enter your residential address",
    // Residential Address 2
    "Please enter your residential city",
    "Please enter your residential state",
    "Please enter your residential zip code",

    /* Shipping Address Details
    "Please enter your country for shipping",
    "Please enter your shipping address",
    // Shipping Address 2
    "Please enter your shipping city",
    "Please enter your shipping state",
    "Please enter your shipping zip code",*/

    // Username, Email and Password
    "Please enter a username",
    "Please enter your email address",
    "Please enter a password",
    "Please confirm the entered password",

    // Security Questions
    "Please select your first security question",
    "Please enter a response to the first security question",
    "Please select your second security question",
    "Please enter a response to the second security qeustion"
];

function validate_sign_up() {
    alert(alerts.length + " " + inputs.length);
    var valid = true;
    var company_check = document.getElementById('company_check').checked;
    var shipping_check = document.getElementById('shipping_check').checked;
    var anonymous_profile = document.getElementById('anonymous_profile').checked;
    var condition_agreement = document.getElementById('condition_agreement').checked;
    var shipping_services = document.getElementById('shipping_services').checked;


    for (var i = 0; i < inputs.length; i++) {
        var ind = inputs[i];

        if (ind == "state") {
            var state_disp = document.getElementById("state").style.display;
            var state2_disp = document.getElementById("state2").style.display;

            var stateField = null;

            if (state_disp == "block") {
                stateField = "state";
            }
            else if (state2_disp == "block") {
                stateField = "state2";
            }


            var state = document.getElementById(stateField).value;
            if (state == "") {
                invalid(i, stateField);
                return;
            }
        }
        else {

            var temp = document.getElementById(ind).value;
            if (temp == "") {
                invalid(i, ind);
                return;
            }
        }

        if (company_check) {
            var temp = document.getElementById('company').value;
            if (temp == "") {
                alert("Please enter company name");
                document.getElementById('company').style.backgroundColor = "lightpink";
            }
        }

        if (!shipping_check) {

        }
    }

    function invalid(i, id) {
        al = alerts[i];
        alert(al);
        document.getElementById(id).style.backgroundColor = "lightpink";
        location.href = "#" + id;
    }

    //document.sign_up_form.submit();

}