function validate_login() {
    var login_username = $("#login_username").val();
    var login_password = $("#login_password").val();

    if (login_username == "") {
        alert("Please provide the username or email address linked to your account");
        $("#login_username").css("background-color", "lightpink");
        $("#login_username").focus();
        return false;
    }

    if (login_password == "") {
        alert("Please provide the password linked to your account");
        $("#login_password").css("background-color", "lightpink");
        $("#login_password").focus();
        return false;
    }
}