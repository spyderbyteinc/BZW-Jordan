<?php include "../includes/username.php"; ?>
<?php include "../includes/connect.php"; ?>
<?php
    if($username == "" || !isset($username)){
        header("location: ../index.php");
        exit();
    }

    if(!isset($_GET['cat_id'])){
        $loc = "location: " . $root . "catalogs/manage.php";
        header($loc);
        exit();
    }
    else{
        $catalog_id = $_GET['cat_id'];
        $_SESSION['lot_catalog'] = $_GET['cat_id'];
    }

    // Get the name of the catalog
    $catalog_sql = "SELECT * FROM `catalogs` WHERE `id`=$catalog_id";
    $catalog_result = mysqli_query($conn, $catalog_sql);
    $catalog_row = mysqli_fetch_assoc($catalog_result);
    $catalog_name = $catalog_row['catalog_name'];

    
    if($catalog_row['published'] == 1 || $catalog_row['published'] == "1"){
        header("location: manage.php");
        exit();
    }

    // Get number of lots in catalog
    $count_sql = "SELECT COUNT(*) as lot_count FROM `lots` WHERE `catalog_id`=$catalog_id";
    $count_result = mysqli_query($conn, $count_sql);
    $count_data = mysqli_fetch_assoc($count_result);
    $count_lots = $count_data['lot_count'];

    // Get lot sequence from table
    $sequence_sql = "SELECT * FROM `lot_sort` WHERE `cat_id`=$catalog_id";
    $sequence_result = mysqli_query($conn, $sequence_sql);
    $sequence_row = mysqli_fetch_assoc($sequence_result);
    $sequence = $sequence_row['sequence'];

?>

<?php
    // Get location string
    
    function get_location_string($loc){
        $comps = explode("??||&&", $loc);

        $address1 = $comps[1];
        $address2 = $comps[2];
        $city = $comps[3];
        $state = $comps[4];
        $country = $comps[5];

        $output = "";

        if($address2 == -1 || $address2 == "-1"){
            $output = $address1 . ", " . $city . ", " . $state . ", " . $country;
        }
        else{
            $output = $address1 . ", " . $address2 . ", " . $city . ", " . $state . ", " . $country;
        }

        return $output;
    }

?>


<?php
    

    // Get location string
    $loc_sql = "SELECT * FROM `catalogs` WHERE `id`=$catalog_id";
    $lot_res = mysqli_query($conn, $loc_sql);
    $lot_row = mysqli_fetch_assoc($lot_res);
    $lot_1 = $lot_row['asset_location_1'];
    $lot_2 = $lot_row['asset_location_2'];
    $lot_3 = $lot_row['asset_location_3'];
    $lot_4 = $lot_row['asset_location_4'];
    $lot_5 = $lot_row['asset_location_5'];

    $starter_locations = array();
    array_push($starter_locations, $lot_1, $lot_2, $lot_3, $lot_4, $lot_5);

    $all_locations = array();
    foreach($starter_locations as $starter){
        if($starter != -1){
            array_push($all_locations, $starter);
        }
    }
?>

<?php include "../includes/header.php"; ?>

<div id="lot_location_details_modal" class="modal_bg">
    <div id="lot_location_dets" class="modal">
        <h4>Lot Location</h4>
        
        <p class="lot_location_detail_address">
            10137 Devonshire, South Lyon, MI, US
        </p>

        <iframe
        width="600"
        height="450"
        frameborder="0"
        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAcc17FcMQWYboFujZkLZ5TNA59CAqrBjs
            &q=10137 Devonshire, South Lyon, MI, US" allowfullscreen>
        </iframe>
        
        <div id="lot_location_details_close_button">
            <a href="#" class="bidzbutton orange close_modal_button">Close Details</a>
        </div>
    </div>
</div>

<div id="lot_details_modal_container" class="modal_bg">
    <div id="lot_details_modal" class="modal">
        <h4 id="lot_name_place">Lot Name</h4>

        <p class="lot_description" id="lot_description_place">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, quisquam perspiciatis? Possimus odit assumenda at corporis! Voluptatum cupiditate animi labore. Provident, aliquam ab! Libero ipsam odit inventore quia tempora odio, amet neque facilis repellat quaerat unde animi sunt ea minima excepturi perspiciatis est voluptatibus, eveniet laboriosam provident nostrum? Voluptatem, unde.
        </p>

        <h5 class="lot_details_heading">Lot Tags</h5>
        <div id="lot_tags">
            <p class="lot_location_detail lot_description" id="lot_tags_place">
           Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam saepe provident voluptate facilis laboriosam aliquam, officiis libero error repudiandae eligendi.
            </p>
        </div>

        <h5 class="lot_details_heading">Bidding Information</h5>
        <div id="lot_bid_information">
            <p class="bid_info_text"><span>Starting Bid: <span class="color_chocolate" id="starting_bid">123</span></span><span>Increment Type: <span class="color_chocolate" id="increment_type">Static</span></span><span>Bid Increment: <span class="color_chocolate" id="bid_increment">$15</span></span></p>
        </div>
        
        <h5 class="lot_details_heading">Category Tree</h5>
        <div id="lot_category_container">
            
        </div>

        <div id="lot_details_close_button">
            <a href="#" class="bidzbutton orange close_modal_button">Close Details</a>
        </div>
    </div>
</div>

<div class="manage_lot_header">
    <h2 class="house_heading section_heading"><span>Sort Lots - For Catalog: <?php echo $catalog_name; ?></span></h2>
</div>


<div class="create_button_container">
    <a href="<?php echo $root; ?>catalogs/manage.php?" class="sort_lot_button bidzbutton orange create_button"><i class="fas fa-arrow-left"></i> Back to Manage Catalogs</a>
    <a href="#" id="save_sorted_lots" class="sort_lot_button bidzbutton save_sorted_pictures devart">Save Sorted Lots <i class="fas fa-random"></i></a>
    <a href="<?php echo $root; ?>lots/manage.php?cat_id=<?php echo $catalog_id; ?>" class="sort_lot_buttton bidzbutton orange create_button">Manage Lots <i class="fas fa-arrow-right"></i></a>
</div>


<?php if($count_lots == 0) : ?>
    <h1 class="no_lots_to_sort">There are currently no lots created for this catalog</h1>
<?php else : ?>
    <p class="font25 no_margin_top" id="sorting_disclaimer">It is strongly recommended that you upload a photo for each of the lots that you are sorting</p>
<?php endif ; ?>

<?php
    // Get sorted data from database
    $seq_comps = explode("||", $sequence);

    $ids = array();
    $names = array();
    $descriptions = array();
    $images = array();
    $locations = array();

    foreach($seq_comps as $seq){
        if($seq == "" || $seq == "||"){
            continue;
        }
        $sql = "SELECT * FROM `lots` WHERE `id`=$seq";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $id = $row['id'];
        $name = $row['name'];
        $description = $row['description'];
        $lot_location = $row['lot_location'];

        array_push($ids, $id);
        array_push($names, $name);
        array_push($descriptions, $description);
        array_push($locations, $lot_location);

        // Get picture from table
        // 1 for exists, 0 for not exists
        $no_pic = 1;

        $pic_sql = "SELECT * FROM `lot_picture_order` WHERE `cat_id`=$catalog_id AND `lot_id`=$id";
        
        $pic_result = mysqli_query($conn, $pic_sql);
        $pic_num_rows = mysqli_num_rows($pic_result);
        $pic_row = mysqli_fetch_assoc($pic_result);
        $pic_val = $pic_row['sequence'];
        if($pic_num_rows == 0 || $pic_val == "" || $pic_val == "||"){
            $no_pic = 0;
        }
        else{
            $no_pic = 1;
        }


        // <img src="http://bidzwon.com/dev/lots/pictures/no_image.png" alt="Lot Picture" class="lot_image_primary">
        if($no_pic == 1){
            $pic_comps = explode("||", $pic_val);
            $picture_id = $pic_comps[1];

            $sql = "SELECT * FROM `lot_pictures` WHERE `id`=$picture_id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $picture = $row['picture'];
        }
        else{
            $picture = "no_image.png";
        }

        
        $picture_entry = $picture;
        
        array_push($images, $picture_entry);
    }
?>


<?php
    // turn sequence from database to form of ??||&&id??||&&id??||&&
    $seq_split = explode("||", $sequence);
    
    $new_split = array();

    foreach($seq_split as $split){
        if($split != ""){
            array_push($new_split, $split);
        }
    }

    $orig_sequence = join("??||&&",$new_split);
?>

<input type="hidden" name="original_sequence" id="original_sequence" value="<?php echo $orig_sequence; ?>">


<div id="lot_sorter_container">
    

    <?php

        // Use arrays of data for each lot module

        for($i = 0; $i<count($ids); $i++){
            $id = $ids[$i];
            $name = $names[$i];
            $description = $descriptions[$i];
            $image = $images[$i];
            $lot_location = $locations[$i]; 

            $lot_number = 0;

            // loop through locations to find location string
            for($l = 0; $l<count($all_locations); $l++){
                $curr = $all_locations[$l];

                $comps = explode("??||&&", $curr);

                $start_id = $comps[0];

                if($lot_location == $start_id){
                    $lot_number = $l;
                    break;
                }
            }
            
            $lot_string = $all_locations[$lot_number];
            
            $output_location = get_location_string($lot_string);

            
            // Shorten up description to 75, change later ? 
            $str = wordwrap($description, 75);
            $str = explode("\n", $str);
            $description_str = $str[0] . '...';
            
            $lot_module_id = "lot_" . $id;
            ?>

            <div class="lot_module" id="<?php echo $lot_module_id; ?>" name="<?php echo $id; ?>">
                <div class="lot_name"><?php echo $name; ?></div>
                <div class="lot_picture">
                    <img src="<?php echo $root; ?>/lots/pictures/<?php echo $image; ?>" alt="Lot Picture" class="lot_picture_image">
                </div>
                <div class="lot_description">
                    <p class="description"><?php echo $description_str; ?></p>
                </div>
                <div class="lot_location_details">
                    <p class="lot_location_detail_address">
                        <?php echo $output_location; ?>
                    </p>
                </div>
                <input type="hidden" name="lot_location_grabber_<?php echo $id; ?>" id="lot_location_grabber_<?php echo $id; ?>" value="<?php echo $output_location; ?>">
                <div class="lot_details_button">
                    <a href="#" name="details_<?php echo $id; ?>" class="bidzbutton black lot_button details_button"><i class="far fa-eye"></i> Details</a>
                    <a href="#" name="map_<?php echo $id; ?>" class="bidzbutton orange lot_button map_button"><i class="fas fa-map-marker-alt"></i> Map</a>
                    <a href="<?php echo $root; ?>lots/edit.php?cat_id=<?php echo $catalog_id; ?>&lot_id=<?php echo $id; ?>" target="_blank" class="bidzbutton green lot_button"><i class="fas fa-pencil-alt"></i> Edit</a>
                </div>
            </div>
            <?php
        }
        
    ?>

    <?php
        $cnt = count($ids) % 3;
        for($i = 0; $i<$cnt; $i++){
            ?>

            <div class="picture_box lot_module empty" style="border:0;"></div>

            <?php
        }
    ?>
</div>
</div>
</div>

.
<?php include "../includes/footer.php"; ?>
<script>


    // Sortable Container
    $( function() {
        $( "#lot_sorter_container" ).sortable({
        stop: function(event,ui){ 
            var inorder = $("#lot_sorter_container").sortable("toArray");
            order_compute(inorder);
            },
            tolerance: "pointer",
            cancel: ".empty"
        });

     } );

     // Order Compute
     function order_compute(order_orig){
        
        var num_lots = <?php echo count($ids); ?>;
        
        var newOrder = [];

        for(var i = 0; i<order_orig.length; i++){
            var current = order_orig[i];

            if(current != ""){
                
                var res = current.replace("lot_", "");
                
                newOrder.push(res);
            }
        }

        if(num_lots == newOrder.length){
            var final_order = newOrder.join("??||&&");
            $("#original_sequence").val(final_order);
        }
        else{
            // TODO
            // Wrong number of lot submitted
        }
     }

     // Click submission of lot sorting
     // Handle save sorted pictures
     $("#save_sorted_lots").click(function(e){
        e.preventDefault();

        //original_sequence
        var seq = $("#original_sequence").val();

        // AJAX Call
        $.ajax({
            type: 'POST',
            url: 'process_lot_sorter.php',
            data: {sequence: seq, num: <?php echo count($ids); ?>},
            success: function (data) {
                // alert(data);    
            },
            complete: function (data) {
                alert("Successfully sorted lots!");
                location.reload();
            }
        });
     });
     
</script>

<script>
        function manipulate_googlemap(address){
            var src = "https://www.google.com/maps/embed/v1/place?key=AIzaSyAcc17FcMQWYboFujZkLZ5TNA59CAqrBjs&q=" + address;
            $("#lot_location_details_modal #lot_location_dets iframe").attr("src", src);
        }


    // Used for clicking on details button
    $(".lot_module .lot_details_button .details_button").on( "click", function(e) {
        e.preventDefault();

        $("#lot_details_modal_container").css("display", "flex");

        // Get lot id from button pressed
        var lot_id = $(this).attr("name");
        lot_id = lot_id.replace("details_", "");
        var catalog_id = "<?php echo $catalog_id; ?>";

        
        // AJAX Call for getting lot details
        $.ajax({
            type: 'POST',
            url: 'get_lot_details.php',
            data: {catalog: catalog_id, lot: lot_id},
            success: function (data) {
                var res = data.split("??||&&");

                var lot_name = res[0];
                var lot_desc = res[1];
                var starting_bid = "$" + res[2];
                var increment_type = res[3];
                var bid_increment = "$" + res[4];
                var lot_tags = res[5];

                if(lot_desc == ""){
                    lot_desc = "No Description Declared";
                }
                if(lot_tags == ""){
                    lot_tags = "No Tags Declared";
                }

                increment_type = increment_type.charAt(0).toUpperCase() + increment_type.slice(1);

                $("#lot_name_place").html(lot_name);
                $("#lot_description_place").html(lot_desc);
                $("#starting_bid").html(starting_bid);
                $("#increment_type").html(increment_type);
                $("#bid_increment").html(bid_increment);
                $("#lot_tags_place").html(lot_tags);
            }
        });

        // AJAX Call for category tree
        $.ajax({
            type: 'POST',
            url: 'get_lot_categories.php',
            data: {lot: lot_id},
            success: function (data) {
                
                // Take data string and split to array
                var res = data.split("??||&&");

                // output array 
                var category_list_array = [];

                // start at 1 to ignore initial seperation
                for(var r = 1; r<res.length; r++){
                    var curr = res[r];

                    if(curr != ""){
                        category_list_array.push(curr);
                    }
                }

                var category_items_output = "";

                for(var c = 0; c < category_list_array.length; c++){
                    var category = category_list_array[c];
                    
                    var par;

                    if(c == 0){
                        par = `<p class='category_item category1_cont'>${category}</p>`;
                    }
                    else if(c == 1){
                        par = `<p class='category_item category2_cont'>${category}</p>`;
                    }
                    else if(c == 2){
                        par = `<p class='category_item category3_cont'>${category}</p>`;
                    }
                    else if(c == 3){
                        par = `<p class='category_item category4_cont'>${category}</p>`;
                    }
                    else if(c == 4){
                        par = `<p class='category_item category5_cont'>${category}</p>`;
                    }
                    else{
                        par = "";
                    }

                    // append to output
                    category_items_output = category_items_output + par;
                }

                $("#lot_category_container").html(category_items_output);
            }
        });


    });

    
    // Used for clicking on map button
    $(".lot_module .lot_details_button .map_button").on( "click", function(e) {
        e.preventDefault();
        
        $("#lot_location_details_modal").css("display", "flex");

        var id = $(this).attr("name");
        id = id.replace("map_", "");
        
        var out = "#lot_location_grabber_" + id;
        var address = $(out).val();

        manipulate_googlemap(address);
    });

    // Close Modals 
    $(".close_modal_button").on("click", function(e){
        e.preventDefault();

        $("#lot_details_modal_container").css("display", "none");
        $("#lot_location_details_modal").css("display", "none");
    });
</script>