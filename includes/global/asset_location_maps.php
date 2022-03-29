<div id="map_modal_group">
    <!-- Multiple Location Modal -->
    <div id="multiple_maps_modal" class="modal_bg location_details_modal">
        <div id="cat_location_dets" class="modal">
            <h4>View Catalog Locations</h4>

            <select name="map_ocation_list" id="map_location_list">
            </select>

            <p id="multi_location_text"></p>

            <iframe
            width="600"
            height="450"
            frameborder="0"
            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAcc17FcMQWYboFujZkLZ5TNA59CAqrBjs&q=-1" allowfullscreen>
            </iframe>

            <div id="close_button"><a href="#" class="close_map_button bidzbutton orange">Close Map</a></div>
        </div>
    </div>


    <!-- Single Location Modal -->
    <div id="single_map_modal" class="modal_bg location_details_modal">
        <div id="cat_location_dets" class="modal">
            <h4>View Catalog Locations</h4>

            <p id="one_location_text" style="display: block;">Please Wait...</p>

            <iframe width="600" height="450" frameborder="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAcc17FcMQWYboFujZkLZ5TNA59CAqrBjs&q=-1" allowfullscreen="">
            </iframe>

            <div id="close_button"><a href="#" class="close_map_button bidzbutton orange">Close Map</a></div>
        </div>
    </div>
    
</div>

<script src="<?php echo $root; ?>js/jquery.js"></script>

<script>

    function location_output(str){

        var comps = str.split("??||&&");

        var address1 = comps[1];
        var address2 = comps[2];
        var city = comps[3];
        var state = comps[4];
        var country = comps[5];
        
        var output = "";

        if(address2 == -1){
            output = address1 + ", " + city + ", " + state + ", " + country;
        }
        else{
            output = address1 + ", " + address2 + ", " + city + ", " + state + ", " + country;
        }

        return output;
    }

    $(".close_map_button").on('click', function(e){
        e.preventDefault();

        $("#single_map_modal").css("display","none");
        $("#multiple_maps_modal").css("display", "none");
    });

    function show_map(type, amount, id){
        if(amount == "single"){
            $("#multiple_maps_modal").css("display", "none");
            $("#single_map_modal").css("display", "block");
        }
        else if(amount == "multiple"){
            $("#multiple_maps_modal").css("display", "block");
            $("#single_map_modal").css("display", "none");
            
            var empty_option = `<option value="-1">Choose a location</option>`;

            $("#multiple_maps_modal").show();
            $("#multiple_maps_modal select#map_location_list").empty();

            $("#multiple_maps_modal select#map_location_list").append(empty_option);
        }
        else{
            return;
        }



        $.ajax({
            type: 'POST',
            url: "<?php echo $root; ?>/ajax/map_processor.php",
            async: false,
            dataType: "json",
            data: {
                type: type,
                amount: amount,
                id: id
            },
            success: function (out) {
                if(out == "-1" || out == -1){
                    alert("Please do not mess with our system");
                    return;
                }
                
                if(amount == "multiple"){
                    for(var o =0; o < out.length; o++){
                        var loc_string = out[o];

                        var entry = location_output(loc_string);

                        var option = `<option value="${o}">${entry}</option>`;
                        $("#multiple_maps_modal select#map_location_list").append(option);
                    }

                    $("#map_location_list").change(function () {
                        var id = $(this).val();

                        if(id == -1 || id == "-1"){
                            var location = "-1";
                        }
                        else{
                            var location = $("#map_location_list option:selected").text();
                        }

                        var map_string = "https://www.google.com/maps/embed/v1/place?key=AIzaSyAcc17FcMQWYboFujZkLZ5TNA59CAqrBjs&q=" + location;
                        
                        $("#multiple_maps_modal iframe").attr("src", map_string);
                    });
                }
                else if(amount == "single"){
                    var loc_string = out[0];
                    var entry = location_output(loc_string);

                    $("#one_location_text").text(entry);

                    
                    var map_string = "https://www.google.com/maps/embed/v1/place?key=AIzaSyAcc17FcMQWYboFujZkLZ5TNA59CAqrBjs&q=" + entry;
                    $("#single_map_modal iframe").attr("src", map_string);
                }
                else{
                    $("#single_map_modal").css("display","none");
                    $("#multiple_maps_modal").css("display", "none");
                }
            }
        });
    }

</script>