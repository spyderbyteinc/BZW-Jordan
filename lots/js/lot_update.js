
// Reset color of input field

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
function handle_disclaimer() {
    $("#update_lot_submit").css("display", "inline-block");
    $(".saving_lot_disclaimer").css("display", "none");
}


// test starting bid <= (less than or equal) to reserve amount
var starting_bid = $("#starting_bid");
var reserve_option = $("#reserve_option");
var reserve_amount = $("#reserve_amount");


reserve_amount.blur(function () {
    var reserve = parseInt(reserve_amount.val());

    var starting = parseInt(starting_bid.val());

    if(reserve == ""){
        // do nothing
        return;
    }

    if(starting == ""){
        // do nothing
        return;
    }

    console.log(reserve, starting);
    if(reserve < starting){
        
        $("#reserve_validated").val(0);
        alert("Reserve amount must be greater than or equal to the starting bid");

        starting_bid.css("background-color", "lightpink");
        reserve_amount.css("background-color", "lightpink");
    }
    else{
        $("#reserve_validated").val(1);

        starting_bid.css("background-color", "whitesmoke");
        reserve_amount.css("background-color", "whitesmoke");
    }
});

starting_bid.blur(function(){

    var starting = parseInt(starting_bid.val());
    
    if(starting == ""){
        // do nothing
        return;
    }
    
    
    
    var option = reserve_option.val();

    if(option == "" || option == "no"){
        // do nothing
        return;
    }

    if(option == "yes"){
        var reserve = parseInt(reserve_amount.val());

        if(reserve == ""){
            // do nothing
            return;
        }

        console.log(reserve, starting);
        if(reserve < starting){
            $("#reserve_validated").val(0);

            alert("Reserve amount must be greater than or equal to the starting bid");

            starting_bid.css("background-color", "lightpink");
            reserve_amount.css("background-color", "lightpink");
        }
        else{
            $("#reserve_validated").val(1);

            starting_bid.css("background-color", "whitesmoke");
            reserve_amount.css("background-color", "whitesmoke");
        }
    }
});


// Handle Lot Creation
$("#update_lot_submit").click(function (e) {
    e.preventDefault();

    $(".saving_lot_disclaimer").css("display", "block");
    $("#update_lot_submit").css("display", "none");

    // List of required fields
    var reqs = ["lot_name", "lot_description", "category", "starting_bid", "bid_increment_type", "bid_increment", "starting_bid_increment", "reserve_option", "lot_location", "featured_lot", "allow_freeze", "times_the_bid", "quantity"];

    var msg = ["Please provide the name of this lot", "Please provide this lot's description", "Please complete the category selection process", "Please provide a starting bid", "Please provide the bidding increment type", "PLease specify the bid increment", "Please specify the starting bid increment", "Please provide if you are allowing a reserve on this lot", "Please choose a the location of this lot from the list", "PLease specify if this is a featured lot", "Please choose if this is a lot that allows freezing", "Please specify if this catalog enables times the bid", "Please provide the quantity of this item, if times the bid is enabled, otherwise not required"];

    for (var i = 0; i < reqs.length; i++) {
        var id = reqs[i];

        
        if(id != "category"){
            var field = document.getElementById(id);
    
            var val = field.value;
        }

        var message = msg[i];

        if (id == "lot_description") {
            var description = $("#cke_lot_description iframe").contents().find("body").text();
            var lot_description = $("#cke_lot_description iframe").contents().find("body").html();
            if (description == "") {

                alert(message);
                field.style.backgroundColor = "lightpink";
                field.focus();
                handle_disclaimer();
                return;
            }
            else {
                $("#lot_description_helper").val(lot_description);
            }
        }

        
        else if (id == "category") {
            var category_value = $("#category_value").val();

            if(category_value == "-1" || category_value == ""){
                alert(message);
                handle_disclaimer();
                return
            }
            else{
                // get 'other' category value

                var comps = category_value.split("-");
                var other = comps[comps.length-1];

                if(other == "0" || other == 0){
                    var other_value = $("#category_other").val();

                    if(other_value == ""){
                        alert("Please provide the other category name");
                        $("#category_other").css("background-color", "lightpink");
                        $("#category_other").focus();
                        handle_disclaimer();
                        return;
                    }
                }
            }
        }


        else if (id == "bid_increment" || id == "starting_bid_increment") {
            if (val == "") {
                var increment_type = $("#bid_increment_type").val();
                if (increment_type == "static") {
                    if (id == "bid_increment") {
                        alert(message);
                        field.style.backgroundColor = "lightpink";
                        field.focus();
                        handle_disclaimer();
                        return;
                    }
                }
                else if (increment_type == "progressive") {
                    if (id == "starting_bid_increment") {
                        alert(message);
                        field.style.backgroundColor = "lightpink";
                        field.focus();
                        handle_disclaimer();
                        return;
                    }
                }
            }
        }
        else if (id == "reserve_option") {
            if (val == "") {
                alert(message);
                field.style.backgroundColor = "lightpink";
                field.focus();
                handle_disclaimer();
                return;
            }
            else if (val == "yes") {
                var reserve_amount = document.getElementById("reserve_amount");
                if (reserve_amount.value == "") {
                    alert("Please provide a reserve amount");
                    reserve_amount.style.backgroundColor = "lightpink";
                    reserve_amount.focus();
                    handle_disclaimer();
                    return;
                }
                else{
                    var reserve_validation = $("#reserve_validated").val();
                    if(reserve_validation == "0"){
                        var starting_bid = document.getElementById("starting_bid");
                        alert("Reserve amount must be greater than or equal to the starting bid");
                        reserve_amount.style.backgroundColor = "lightpink";
                        starting_bid.style.backgroundColor = "lightpink";
                        reserve_amount.focus();
                        handle_disclaimer();
                        return;
                    }
                }
            }
        }
        
        else if (id == "quantity") {
            var times_the_bid = document.getElementById("times_the_bid").value;
            if(times_the_bid == "yes"){
                if(val == ""){
                    alert(message);
                    field.style.backgroundColor = "lightpink";
                    field.focus();
                    handle_disclaimer();
                    return;
                }
            }
        }
        else {
            if (val == "") {
                console.log(id, val, message);
                alert(message);
                field.style.backgroundColor = "lightpink";
                field.focus();
                handle_disclaimer();
                return;
            }
        }
    }

    var interal_notes = $("#cke_internal_notes iframe").contents().find("body").html();

    $("#internal_notes_helper").val(interal_notes);

    document.lot_update_form.submit();
});