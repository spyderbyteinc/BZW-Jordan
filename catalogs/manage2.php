<?php include "../includes/username.php"; ?>
<?php
    if($username == "" || !isset($username)){
        header("location: ../index.php");
        exit();
    }

    if(isset($_GET['creation'])){
        $creation = $_GET['creation'];
        if($creation == 1){
            ?>
            <script>
                alert("Catalog successfully created");
                window.location.href = "manage.php";
            </script>
            <?php
        }
    }

    if(isset($_GET['edit'])){
        $edit = $_GET['edit'];
        if($edit == 1){
            ?>
            <script>
                alert("Catalog successfully updated");
                window.location.href = "manage.php";
            </script>
            <?php
        }
    }
?>
<?php include "../includes/header.php"; ?>

<?php
    include "../helpers/date_conversion.php";
    include "../includes/connect.php";

    $catalogs = array();

    $sql = "SELECT * FROM `catalogs` WHERE `owner`='$username' ORDER BY `id`";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $line = $row['id'] . "^^" . $row['catalog_name'] . "^^" . $row['auction_type'] . "^^" . $row['catalog_description'] . "^^" . $row['start_date'] . "^^" . $row['end_date'] . "^^" . $row['asset_location_1'] . "^^" . $row['asset_location_2'] . "^^" . $row['asset_location_3'] . "^^" . $row['asset_location_4'] . "^^" . $row['asset_location_5'] . "^^" . $row['published'];
        array_push($catalogs, $line);
    }
?>

<!-- Location Modal -->

<div id="cat_location_details_modal" class="modal_bg">
    <div id="cat_location_dets" class="modal">
        <h4>View Catalog Locations</h4>

        <select name="location_list" id="location_list">
        </select>

        <p id="one_location_text"></p>

        <iframe
        width="600"
        height="450"
        frameborder="0"
        src="" allowfullscreen>
        </iframe>

        <div id="close_button"><a href="#" class="bidzbutton orange">Close Map</a></div>
    </div>
</div>



<div class="catalog_creation_header">
    <h2 class="house_heading section_heading"><span>Manage Catalogs</span></h2>
</div>

<div class="create_button_container">
    <a href="create.php" class="bidzbutton create_button"><i class="fas fa-plus"></i> Create a Catalog</a>
    <a href="#" class="bidzbutton create_button"><i class="fas fa-hourglass-end"></i> View Completed Catalogs</a>
</div>

<h4 class="sign_heading manage_catalog_heading"><span class="catalog_heading">Staging Catalogs </span><span class="catalog_arrow sort_up"><a href="#" class="sort_up_button"><i class="fas fa-sort-up"></i></a></span><span class="catalog_arrow sort_down"><a href="#" class="sort_down_button"><i class="fas fa-sort-down"></i></a></span></h4>
<h4 class="sign_heading manage_catalog_heading"><span class="catalog_heading">Published Catalogs </span><span class="catalog_arrow sort_up"><a href="#" class="sort_up_button"><i class="fas fa-sort-up"></i></a></span><span class="catalog_arrow sort_down"><a href="#" class="sort_down_button"><i class="fas fa-sort-down"></i></a></span></h4>
<h4 class="sign_heading manage_catalog_heading"><span class="catalog_heading">Open Catalogs </span><span class="catalog_arrow sort_up"><a href="#" class="sort_up_button"><i class="fas fa-sort-up"></i></a></span><span class="catalog_arrow sort_down"><a href="#" class="sort_down_button"><i class="fas fa-sort-down"></i></a></span></h4>



 <div id="manage_catalog_container">
    <div id="manage_catalog_list">
        <?php foreach($catalogs as $cat) : ?>
            <?php
                $comps = explode("^^", $cat);
                $id = $comps[0];
                $catalog_name = $comps[1];
                $auction_type = ucfirst($comps[2]);
                $catalog_description = $comps[3];
                $start_date = sql_to_date($comps[4]);
                $end_date = sql_to_date($comps[5]);

                $published = $comps[11];

                

                $count_lots_sql = "SELECT count(*) as total FROM `lots` WHERE `catalog_id`=$id";
                $count_result = mysqli_query($conn, $count_lots_sql);
                $count_data = mysqli_fetch_assoc($count_result);
                $count_lots = $count_data['total'];

                $lot_label = "Lots";
                if($count_lots == 1){
                    $lot_label = "Lot";
                }

                $location1 = $comps[6];
                $location2 = $comps[7];
                $location3 = $comps[8];
                $location4 = $comps[9];
                $location5 = $comps[10];

                $loc_array = array();

                if($location1 != -1){
                    array_push($loc_array, $location1);
                }

                if($location2 != -1){
                    array_push($loc_array, $location2);
                }

                if($location3 != -1){
                    array_push($loc_array, $location3);
                }

                if($location4 != -1){
                    array_push($loc_array, $location4);
                }

                if($location5 != -1){
                    array_push($loc_array, $location5);
                }

                if(count($loc_array) == 1){
                    $loc_one_only = true;
                    $one_location = $loc_array[0];

                    $one_location_comps = explode("??||&&", $one_location);
                    
                    $one_loc_display = "";
                    if($one_location_comps[2] == -1){
                        $one_loc_display = $one_location_comps[1] . ", " . $one_location_comps[3] . ", " . $one_location_comps[4] . ", " . $one_location_comps[5];
                    }
                    else{
                        $one_loc_display = $one_location_comps[1] . ", " . $one_location_comps[2] . ", " . $one_location_comps[3] . ", " . $one_location_comps[4] . ", " . $one_location_comps[5];
                    }
                }
                else{
                    $loc_one_only = false;
                }


                $loc_ids = array();
                foreach($loc_array as $loc){  
                    $location_comps = explode("??||&&", $loc);
                    if($loc != "-1"){
                        array_push($loc_ids, $location_comps[0]);
                    }
                }

                
                $lot_discrepancy = true;
                // check for all locations
                $lot_loc_sql = "SELECT * FROM `lots` WHERE catalog_id=$id";
                $lot_loc_result = mysqli_query($conn, $lot_loc_sql);
                while($row = mysqli_fetch_assoc($lot_loc_result)){
                    $location = $row['lot_location'];

                    if(in_array($location, $loc_ids)){
                        // good to go

                    }
                    else{
                        $lot_discrepancy = false;
                    }
                }


                // Get picture for current catalog

                $picture_sql = "SELECT * FROM `catalog_pictures` WHERE `cat_id`=$id";
                $picture_result = mysqli_query($conn, $picture_sql);
                $picture_num = mysqli_num_rows($picture_result);

                if($picture_num == 0){
                    $img = $root . "catalogs/featured_img/no_image.png";
                }
                else{
                    $picture_row = mysqli_fetch_assoc($picture_result);
                    $picture_name = $picture_row['picture'];
                    $img = $root . "catalogs/featured_img/" . $picture_name;
                }
            ?>
            <div class="catalog_item">
                <div class="auction_image_cube">
                    <img src="<?php echo $img; ?>" alt="" class="catalog_image">

                    <?php if($published == 0) : ?>
                        <a href="<?php echo $root; ?>catalogs/featured_image.php?cat_id=<?php echo $id; ?>" class="featured_img_button bidzbutton orange"><i class="fas fa-camera-retro"></i> <span>Featured Image</span></a>
                    <?php else : ?>
                        <a href="#" onclick="return false;" class="featured_img_button bidzbutton orange disabled"><i class="fas fa-camera-retro"></i> <span>Featured Image</span></a>
                    <?php endif ; ?>
                </div>

                <div class="details_and_actions">
                    <div class="catalog_details">
                        <div class="row bold">
                            <span><?php echo $catalog_name; ?></span>
                            <span><span class="color_chocolate"><?php echo $auction_type; ?></span> Auction</span>
                            <span><span class="color_chocolate"><?php echo $count_lots; ?></span> <?php echo $lot_label; ?></span>
                        </div>
                        <div class="row">
                            <div class="catalog_description_manage">
                                <p class="font-18"><?php echo $catalog_description; ?></p>
                            </div>
                        </div>

                        <hr class="border_chocolate">
                        <hr class="border_black">

                        <?php if($lot_discrepancy) : ?>
                            
                            <?php if($loc_one_only) : ?>

                                <div class="row bold">
                                    <span>Location: <span class="display_location_modal" name="catalog_number_<?php echo $id; ?>"><?php echo $one_loc_display; ?></span></span>
                                </div>

                            <?php else: ?>
                            
                                <div class="row bold">
                                    <span class=" display_location_modal" name="catalog_number_<?php echo $id; ?>">View all locations for this catalog ( <?php echo count($loc_array); ?> )</span>
                                </div>

                            <?php endif ; ?>
                        <?php else: ?>
                        
                            <div class="row bold">
                                <span class="red_error"><i class="fas fa-exclamation-circle"></i> ERROR - Location missing on one or more lots</span>
                            </div>
                        <?php endif; ?> 

                        
                        <hr class="border_chocolate">
                        <hr class="border_black">

                        <?php if($published == 0) : ?>
                            <div class="row bold">
                                <span>Catalog Status: <span class="color_chocolate">Unpublished</span></span>
                            </div>

                        <?php else : ?>
                            <div class="row bold">
                                <span>Catalog Status: <span class="color_green">Published!</span></span>
                            </div>
                        <?php endif ; ?>

                        <hr class="border_chocolate">
                        <hr class="border_black">
                        

                        <div class="row bold">
                            <span>Bidding Starts: <span class="color_chocolate"><?php echo $start_date; ?></span></span>
                            <span>Bidding Ends: <span class="color_chocolate"><?php echo $end_date; ?></span></span>
                        </div>
                    </div>
                    
                    <hr class="border_chocolate">
                        <hr class="border_black">

                    <?php if($published == 0) : ?>
                        <div class="catalog_buttons">
                            <a href="<?php echo $root; ?>lots/manage.php?cat_id=<?php echo $id; ?>" class="bidzbutton chocolate catalog_actions"><i class="fas fa-tasks special"></i> <span>Add/Manage Lots</span></a>
                            <a href="<?php echo $root; ?>catalogs/sort_lots.php?cat_id=<?php echo $id; ?>" class="bidzbutton catalog_actions chocolate"><i class="fas fa-random"></i> <span>Sort Lots</span></a>
                            <a href="edit.php?catalog_id=<?php echo $id; ?>" class="bidzbutton catalog_actions chocolate"><i class="fas fa-edit"></i><span>Edit Catalog Details</span></a>
                            <a href="#" id="publish_catalog_<?php echo $id; ?>" class="bidzbutton devart catalog_actions publish_catalog"><i class="fas fa-upload"></i><span>Publish</span></a>
                        </div>
                    <?php else : ?>
                        <div class="catalog_buttons disabled_buttons">
                            <a href="#" onclick="return false;" class="bidzbutton chocolate catalog_actions disable"><i class="fas fa-tasks special"></i> <span>Add/Manage Lots</span></a>
                            <a href="#" onclick="return false;" class="bidzbutton catalog_actions chocolate disable"><i class="fas fa-random"></i> <span>Sort Lots</span></a>
                            <a href="#" onclick="return false;" class="bidzbutton catalog_actions chocolate disable"><i class="fas fa-edit"></i><span>Edit Catalog Details</span></a>
                            <a href="#" id="unpublish_catalog_<?php echo $id; ?>" class="bidzbutton devart catalog_actions unpublish_catalog"><i class="fas fa-ban"></i><span>Unublish</span></a>
                        </div>
                    <?php endif ; ?>
                </div>
            </div>
        <?php endforeach ; ?>
        
    </div>
 </div>

<?php include "../includes/footer.php"; ?>
<script>

    $(".publish_catalog").on("click", function(e){
        e.preventDefault();

        var attr_id = $(this).attr("id");

        var id = attr_id.replace("publish_catalog_", "");
        
        $.ajax({
            type: 'POST',
            url: "publish.php",
            async: false,
            dataType: "html",
            data: {
                'id': id
            },
            success: function (key) {
                if(key == 0){
                    alert("Cannot Publish Catalog - Missing Location(s)");
                }
                else if(key == 1){
                    alert("Catalog Successfully Published");
                    location.reload();
                }
                else if(key == 2){
                    alert("Catalog Must Have at Least One Lot");
                }
            }
        });
    });

    var text_array = [];
    var id_array = [];

    $("#close_button a").click(function(e){
        e.preventDefault();

        $("#cat_location_details_modal").css("display", "none");
    });

    $( ".display_location_modal" ).on( "click", function( e ) {
        e.preventDefault();

        var name = $(this).attr("name");

        var cat_id = name.replace("catalog_number_", "");


        $.post("ajax_location.php",{
            id: cat_id
        },
        function(data,status){
            var obj = $.parseJSON(data);
            var len = obj.length;


            $("#cat_location_details_modal").css("display", "flex");

            if(len == 1){
                $("#location_list").css("display", "none");
                $("#one_location_text").css("display", "block");

                var one_loc = convert_loc_to_string(obj[0]);

                $("#one_location_text").text(one_loc);

                manipulate_googlemap(one_loc);
            }
            else{
                var out = "";

                $("#location_list").css("display", "flex");
                $("#one_location_text").css("display", "none");
                
                $("#location_list").html("");
                var startOption = `<option value="">Choose a location</option>`;
                $("#location_list").append(startOption);
                
                for(var i = 0; i<len; i++){
                    var curr = obj[i];
                    var textloc = convert_loc_to_string(curr);
                    var id = i;

                    text_array.push(textloc);
                    id_array.push(id);

                    var innerOption = `<option value="${id}">${textloc}</option>`;
                    $("#location_list").append(innerOption);
                }

                // $("select#location_list").val(0);
                
                $("#cat_location_details_modal #cat_location_dets iframe").attr("src", "https://www.google.com/maps/embed/v1/place?key=AIzaSyAcc17FcMQWYboFujZkLZ5TNA59CAqrBjs&q=-1");

            }
            
        });
    });

    $('select#location_list').on('change', function() {
        var sel = $('select#location_list option:selected').html()
        
        console.log(sel);
        manipulate_googlemap(sel);
    });

    function reset_map(){
    }

    function manipulate_googlemap(address){

        var src = "https://www.google.com/maps/embed/v1/place?key=AIzaSyAcc17FcMQWYboFujZkLZ5TNA59CAqrBjs&q=" + address;
        $("#cat_location_details_modal #cat_location_dets iframe").attr("src", src);
        
    }

    function convert_loc_to_string(loc){
        var comps = loc.split("??||&&");

        var address1 = comps[1];
        var address2 = comps[2];
        var city = comps[3];
        var state = comps[4];
        var country = comps[5];

        if(address2 == -1){
            var output = address1 + ", " + city + ", " + state + ", " + country;
        }
        else{
            var output = address1 + ", " + address2 + ", " + city + ", " + state + ", " + country;
        }

        return output;
    }
</script>