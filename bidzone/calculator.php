<?php include "includes/header.php"; ?>
<?php
    // get list of timezones
    $timezone_sql = "SELECT * FROM `timezones` ORDER BY `id` ASC";
    $timezone_result = mysqli_query($conn, $timezone_sql);
    $all_zones = array();
    while($timezone_row = mysqli_fetch_assoc($timezone_result)){
        $zone_code = $timezone_row['zone_code'];
        $zone_name = $timezone_row['zone_name'];

        $zone_option = "<option value='$zone_code'>$zone_name</option>";

        array_push($all_zones, $zone_option);
    }
?>
        <main id="content">
            <h1 class="page_heading">Calculator</h1>

            <div id="calculator_grid">

                <div class="calculator_tile">
                    <h3 class="tile_heading">Timestamp -> Datestamp</h3>

                    <input type="number" name="timestamp_input" id="timestamp_input" placeholder="Enter Timestamp">

                    <br><br>

                    <select name="timestamp_input_other" id="timestamp_input_other">
                        <option value="">Choose a Timezone</option>
                        <?php
                            foreach($all_zones as $zone_entry){
                                echo $zone_entry;
                            }
                        ?>
                    </select>

                    <br><br>

                    <a href="#" id="timestamp_to_datestamp" name="timestamp_input" class="calculator_operation bidzbutton orange">Convert!</a>

                    <p class="calculator_result" id="timestamp_to_datestamp_output"><-- NO DATA --></p>
                </div>

                <!-- <div class="calculator_tile" id="timestamp_to_datestamp">
                    <h3 class="tile_heading">Timestamp -> Datestamp</h3>

                    <input type="text" name="timestamp" id="timestamp">

                    <a href="#" class="bidzbutton orange">Convert!</a>
                </div>

                <div class="calculator_tile" id="timestamp_to_datestamp">
                    <h3 class="tile_heading">Timestamp -> Datestamp</h3>

                    <input type="text" name="timestamp" id="timestamp">

                    <a href="#" class="bidzbutton orange">Convert!</a>
                </div>


                <div class="calculator_tile" id="timestamp_to_datestamp">
                    <h3 class="tile_heading">Timestamp -> Datestamp</h3>

                    <input type="text" name="timestamp" id="timestamp">

                    <a href="#" class="bidzbutton orange">Convert!</a>
                </div>

                <div class="calculator_tile" id="timestamp_to_datestamp">
                    <h3 class="tile_heading">Timestamp -> Datestamp</h3>

                    <input type="text" name="timestamp" id="timestamp">

                    <a href="#" class="bidzbutton orange">Convert!</a>
                </div> -->
            </div>


        </main>

<?php include "includes/footer.php"; ?>
<script>
    // $("#timestamp_submit").click(function(e){
    //     e.preventDefault();

    //     $.ajax({
    //         type: 'POST',
    //         url: "handle_category.php",
    //         async: false,
    //         dataType: "html",
    //         data: {
    //             'operation': 'add',
    //             'level': level,
    //             'tier_id': tier_id
    //         },
    //         success: function (name) {
    //             result = name;
    //         }
    //     });

    //     return result;
    // });
    $( "a.calculator_operation" ).on( "click", function(e) {
        e.preventDefault();

        var id = $(this).attr('id');
        var name = $(this).attr('name');

        var input = $("#" + name).val();

        if(input == ""){
            return false;
        }

        var other = "";
        if(name == "timestamp_input"){
            other = $("#timestamp_input_other").val();
        }
        
        $.ajax({
            type: 'POST',
            url: "calculator_functions.php",
            async: false,
            dataType: "html",
            data: {
                'operation': id,
                "input": input,
                "other": other
            },
            success: function (out) {
                console.log(out);

                var output = "#" + id + "_output";
                $(output).text(out);
            }
        });

    });
</script>