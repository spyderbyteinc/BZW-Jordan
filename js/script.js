function changeDropDownHeight() {
    var dropdown = document.getElementById("search_drop");
    var dropdown_height = "-" + dropdown.offsetHeight + "px";
    dropdown.style.bottom = dropdown_height;
}


$(document).ready(function () {
    changeDropDownHeight();

    $('#scroller').infiniteslide({
        'speed': 75
    });

    var field = document.getElementsByClassName('search_field');

    window.onclick = function (event) {
        var target = event.target;
        var parent = target.parentElement;

        /*
        console.log($("html"));
        console.log(event.target);
        if (event.target == search_drop) {
            alert('heyr');
        }*/


        if (event.target.closest(".search_field") == field[0]) {
            $("#search_drop").css("display", "block");
            changeDropDownHeight();
        }
        else {
            $("#search_drop").css("display", "none");
        }
    }
    /*
        $("#search_drop").click(function (event) {
            alert('clicked inside');
            event.stopPropagation();
        });*/

    $('foo').bind('click', function () {
        // inside here, `this` will refer to the foo that was clicked
    });
});