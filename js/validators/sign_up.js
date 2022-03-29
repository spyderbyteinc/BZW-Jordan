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

function validate_sign_up() {
    var company_check = document.getElementById('company_check').checked;
    var shipping_check = document.getElementById('shipping_check').checked;
    var anonymous_profile = document.getElementById('anonymous_profile').checked;
    var condition_agreement = document.getElementById('condition_agreement').checked;
    var shipping_services = document.getElementById('shipping_services').checked;

    var alerts = [
        // Name Information
        "Please enter your first name",
        "Please enter your last name",

        // Company Information
        "Please enter your company name",
        // Company Website
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

        // Shipping Address Details
        "Please enter your country for shipping",
        "Please enter your shipping address",
        // Shipping Address 2
        "Please enter your shipping city",
        "Please enter your shipping state",
        "Please enter your shipping zip code",


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
    var inputs = ["first_name", "last_name", "company", "country_code", "phoneNumber", "dob", "country", "address1", "city", "state", "zipcode", "shipping_country", "shipping_address1", "shipping_city", "shipping_state", "shipping_zipcode", "username", "email", "password", "confirm", "question1", "answer1", "question2", "answer2"];

    for (var i = 0; i < inputs.length; i++) {

        var input = inputs[i];
        var dom = document.getElementById(input);
        var valput = dom.value;


        // Question 1, Answer 1, Question 2, Answer 2
        if (i == 20 || i == 21 || i == 22 || i == 23) {
            al = alerts[i];
            if (valput == "") {
                alert(al);
                dom.style.backgroundColor = "lightpink";
                dom.focus();

                return;
            }
        }

        // Confirm Password
        if (i == 19) {
            al = alerts[i];
            var orig = document.getElementById('password').value;
            if (valput == "" || valput != orig) {
                alert(al);
                dom.style.backgroundColor = "lightpink";
                dom.focus();

                return;
            }
        }

        // Password
        if (i == 18) {
            al = alerts[i];
            if (valput == "") {
                alert(al);
                dom.style.backgroundColor = "lightpink";
                dom.focus();

                return;
            }
        }

        var email_flag = false;

        // Email Address
        if (i == 17) {
            if (valput == "") {
                al = alerts[i];
                alert(al);
                dom.style.backgroundColor = "lightpink";
                dom.focus();

                return;
            }
            else {
                var patt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                var result = patt.test(valput);
                if (!result) {
                    alert("Email must be in traditional email format");
                    dom.style.backgroundColor = "lightpink";
                    dom.focus();

                    return;
                }
                else {
                    $.ajax({
                        type: 'POST',
                        url: "ajax/sign_up/email.php",
                        async: false,
                        dataType: "html",
                        data: {
                            'email': valput
                        },
                        success: function (msg) {
                            if (msg != "0") {
                                alert("Email already exists");
                                dom.style.backgroundColor = 'lightpink';
                                dom.focus();
                                email_flag = true;
                            }
                        }
                    });
                    if (email_flag) {
                        return;
                    }
                }
            }
        }

        var username_flag = false;
        // Username
        if (i == 16) {
            al = alerts[i];
            if (valput == "") {
                alert(al);
                dom.style.backgroundColor = "lightpink";
                dom.focus();

                return;
            }
            else {
                $.ajax({
                    type: 'POST',
                    url: "ajax/sign_up/username.php",
                    async: false,
                    dataType: "html",
                    data: {
                        'username': valput
                    },
                    success: function (msg) {
                        if (msg != "0") {
                            alert("Username already exists");
                            dom.style.backgroundColor = 'lightpink';
                            dom.focus();
                            username_flag = true;
                        }
                    }
                });
                if (username_flag) {
                    return;
                }
            }
        }

        // Shipping State
        if (i == 14) {
            if (!shipping_check) {
                var state_disp = document.getElementById("shipping_state").style.display;
                var state2_disp = document.getElementById("shipping_state2").style.display;

                var stateField = null;

                if (state_disp == "block") {
                    stateField = "shipping_state";
                    $("#shipping_state_det").val("shipping_state");
                }
                else if (state2_disp == "block") {
                    stateField = "shipping_state2";
                    $("#shipping_state_det").val("shipping_state2");
                }


                var state = document.getElementById(stateField).value;

                if (state == "") {
                    al = alerts[i];
                    alert(al);
                    document.getElementById(stateField).style.backgroundColor = "lightpink";
                    document.getElementById(stateField).focus();
                    return;
                }
            }
        }

        // Shipping Addresss, Country, City Zipcode
        if (i == 11 || i == 12 || i == 13 || i == 15) {
            if (!shipping_check) {
                al = alerts[i];
                if (valput == "") {
                    alert(al);
                    dom.style.backgroundColor = "lightpink";
                    dom.focus();

                    return;
                }
            }
        }

        // Residential Address, Country, City, Zipcode
        if (i == 6 || i == 7 || i == 8 || i == 10) {
            al = alerts[i];
            if (valput == "") {
                alert(al);
                dom.style.backgroundColor = "lightpink";
                dom.focus();

                return;
            }
        }

        // Residential State
        if (i == 9) {
            var state_disp = document.getElementById("state").style.display;
            var state2_disp = document.getElementById("state2").style.display;

            var stateField = null;

            if (state_disp == "block") {
                stateField = "state";
                $("#residential_state_det").val("state");
            }
            else if (state2_disp == "block") {
                stateField = "state2";
                $("#residential_state_det").val("state2");
            }


            var state = document.getElementById(stateField).value;
            if (state == "") {
                al = alerts[i];
                alert(al);
                document.getElementById(stateField).style.backgroundColor = "lightpink";
                document.getElementById(stateField).focus();
                return;
            }
        }

        // First and Last names
        if (i == 0 || i == 1) {
            al = alerts[i];
            if (valput == "") {
                alert(al);
                dom.style.backgroundColor = "lightpink";
                dom.focus();
                return;
            }
        }

        // Company Information
        if (i == 2 && company_check) {
            al = alerts[i];
            if (valput == "") {
                alert(al);
                dom.style.backgroundColor = "lightpink";
                dom.focus();

                return;
            }
        }

        // Country Code
        if (i == 3) {
            al = alerts[i];
            if (valput == "") {
                alert(al);
                dom.style.backgroundColor = "lightpink";
                dom.focus();

                return;
            }
        }

        // Phone Number
        if (i == 4) {
            al = alerts[i];
            if (valput == "") {
                alert(al);
                dom.style.backgroundColor = "lightpink";
                dom.focus();

                return;
            }
        }

        // Date of Birth
        if (i == 5) {
            al = alerts[i];
            if (valput == "") {
                alert(al);
                dom.style.backgroundColor = "lightpink";
                dom.focus();

                return;
            }
            else {
                var patt = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
                var result = patt.test(valput);
                if (!result) {
                    alert("Date must be in date format");
                    dom.style.backgroundColor = "lightpink";
                    dom.focus();

                    return;
                }
            }
        }
    }
    if (grecaptcha && grecaptcha.getResponse().length !== 0) {
        if (condition_agreement) {
            document.sign_up_form.submit();
        }
        else {
            alert("Please agree to the terms and conditions");
        }
    }
    else {
        alert("Please confirm that you are not a robot");
        return;
    }
}