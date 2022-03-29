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

$("table.ui-datepicker-calendar a").click(function () {
    $("#dob").css("background-color", "whitesmoke");
});

function validate_registration() {
    var account_type_radio = $('input[name=type]:checked').val();
    var company_radio = $('input[name=company]:checked').val();

    var condition_agreement = document.getElementById('condition_agreement').checked;

    var age_conf = document.getElementById("age_confirmation").checked;

    var seller;
    var company;

    if (account_type_radio == "buysell") {
        seller = true;
    }
    else {
        seller = false;
    }

    if (company_radio == "comp_yes") {
        company = true;
    }
    else {
        company = false;
    }

    // alert(company + " " + seller);

    var inputs = ["first_name", "last_name", "phoneNumber", "dob", "address1", "country", "city", "state", "username", "email", "password", "confirm", "question1", "answer1", "question2", "answer2", "company_name"];

    var alerts = [
        "Please enter your first name",
        "Please enter your last name",

        "Please enter your phone number",
        "Please enter your date of birth",

        "Please enter your address",
        "Please enter your country",
        "Please enter your city",
        "Please enter you state",

        "Please enter a unique username",
        "Please enter your email address",

        "Please enter a password",
        "Please confirm your password",

        "Please choose a security question",
        "Please enter an answer to the security question",
        "Please choose a security question",
        "Please enter an answer to the security question",

        "Please enter your company name"
    ]

    for (var i = 0; i < inputs.length; i++) {
        var input = inputs[i];
        var dom = document.getElementById(input);

        // ignore value for age confirmation
        if (i != 3) {
            var valput = dom.value;
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

        // Phone Number
        if (i == 2) {
            al = alerts[i];
            if (valput == "") {
                alert(al);
                dom.style.backgroundColor = "lightpink";
                dom.focus();

                return;
            }
        }


        // Date of Birth
        if (i == 3) {
            if (!age_conf) {
                alert("Please confirm that you are at least 18 years of age");
                $("#age_confirmation").focus();
                return;
            }
            else {

                continue;
            }

            var eighteen = $("#age_check").val();

            al = alerts[i];
            if (valput == "") {
                alert(al);
                dom.style.backgroundColor = "lightpink";
                dom.focus();

                return;
            }
            else if (eighteen == 0 || eighteen == "0") {
                alert("User must be 18 years or older");
                dom.style.backgroundColor = "lightpink";
                dom.focus();
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



        // Residential Address, Country, City, Zipcode
        if (i == 4 || i == 5 || i == 6) {
            al = alerts[i];
            if (valput == "") {
                alert(al);
                dom.style.backgroundColor = "lightpink";
                dom.focus();

                return;
            }
        }


        // Residential State
        if (i == 7) {
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

        var username_flag = false;
        // Username
        if (i == 8) {
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

        var email_flag = false;
        // Email Address
        if (i == 9) {
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


        // Password
        if (i == 10) {
            al = alerts[i];
            if (valput == "") {
                alert(al);
                dom.style.backgroundColor = "lightpink";
                dom.focus();

                return;
            }
        }

        // Confirm Password
        if (i == 11) {
            al = alerts[i];
            var orig = document.getElementById('password').value;
            if (valput == "" || valput != orig) {
                alert(al);
                dom.style.backgroundColor = "lightpink";
                dom.focus();

                return;
            }
        }

        // Question 1, Answer 1, Question 2, Answer 2
        if (i == 12 || i == 13 || i == 14 || i == 15) {
            al = alerts[i];
            if (valput == "") {
                alert(al);
                dom.style.backgroundColor = "lightpink";
                dom.focus();

                return;
            }
        }

        // Company Name
        if (i == 16) {
            al = alerts[i];

            if (company && valput == "") {

                alert(al);
                dom.style.backgroundColor = "lightpink";
                dom.focus();

                return;
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