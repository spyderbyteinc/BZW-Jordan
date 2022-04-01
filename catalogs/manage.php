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

    if(isset($_GET['unpublish'])){
        $unpublish = $_GET['unpublish'];
        if($unpublish == "-1"){
            ?>
            <script>
                alert("Please Don't Mess with Our System");
                window.location.href = "manage.php";
            </script>
            <?php
        }
    }

    if(isset($_GET['preview'])){
        $preview = $_GET['preview'];
        if($preview == "-1"){
            ?>
            <script>
                alert("Please Don't Mess with Our System");
                window.location.href = "manage.php";
            </script>
            <?php
        }
    }
?>
<?php include "../includes/header.php"; ?>

<?php
    include_once "../helpers/date_conversion.php";
    include_once "../helpers/datetime.php";
    include_once "../helpers/asset_location_modal.php";
    include "../includes/connect.php";

    $catalogs = array();

    $sql = "SELECT * FROM `catalogs` WHERE `owner`='$username' ORDER BY `id`";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $line = $row['id'] . "^^" . $row['catalog_name'] . "^^" . $row['auction_type'] . "^^" . $row['catalog_description'] . "^^" . $row['start_date'] . "^^" . $row['end_date'] . "^^" . $row['asset_location_1'] . "^^" . $row['asset_location_2'] . "^^" . $row['asset_location_3'] . "^^" . $row['asset_location_4'] . "^^" . $row['asset_location_5'] . "^^" . $row['published'] . "^^" .$row['preview'];
        array_push($catalogs, $line);
    }
?>


<div class="catalog_creation_header">
    <h2 class="house_heading section_heading"><span>Manage Catalogs</span></h2>
</div>

<div class="create_button_container">
    <a href="create.php" class="bidzbutton create_button"><i class="fas fa-plus"></i> Create a Catalog</a>
    <a href="#" class="bidzbutton create_button"><i class="fas fa-hourglass-end"></i> View Completed Catalogs</a>
</div>

<h4 class="sign_heading manage_catalog_heading">
    <span class="catalog_heading">Staging Catalogs </span>
    <span class="catalog_arrow sort_up"><a href="#" class="sort_up_button" id="staging_up_button"><i class="fas fa-sort-up"></i></a></span>
    <span class="catalog_arrow sort_down"><a href="#" class="sort_down_button" id="staging_down_button"><i class="fas fa-sort-down"></i></a></span>
</h4>

<div id="staging_catalogs_container" class="catalog_container">

</div>

<h4 class="sign_heading manage_catalog_heading">
    <span class="catalog_heading">Published Catalogs </span>
    <span class="catalog_arrow sort_up"><a href="#" class="sort_up_button" id="published_up_button"><i class="fas fa-sort-up"></i></a></span>
    <span class="catalog_arrow sort_down"><a href="#" class="sort_down_button" id="published_down_button"><i class="fas fa-sort-down"></i></a></span>
</h4>

<div id="published_catalogs_container" class="catalog_container">

</div>

<h4 class="sign_heading manage_catalog_heading">
    <span class="catalog_heading">Open Catalogs </span>
    <span class="catalog_arrow sort_up"><a href="#" class="sort_up_button" id="open_up_button"><i class="fas fa-sort-up"></i></a></span>
    <span class="catalog_arrow sort_down"><a href="#" class="sort_down_button" id="open_down_button"><i class="fas fa-sort-down"></i></a></span>
</h4>

<div id="open_catalogs_container" class="catalog_container">

</div>

<h4 class="sign_heading manage_catalog_heading">
    <span class="catalog_heading">Cancelled Catalogs</span>
    <span class="catalog_arrow sort_up"><a href="#" class="sort_up_button" id="cancelled_up_button"><i class="fas fa-sort-up"></i></a></span>
    <span class="catalog_arrow sort_down"><a href="#" class="sort_down_button" id="cancelled_down_button"><i class="fas fa-sort-down"></i></a></span>
</h4>

<div id="cancelled_catalogs_container" class="catalog_container">

</div>

<script>
    var catalogs = [];
    var stages = [];
</script>

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

                $preview = $comps[12];
                
                $stage_sql = "SELECT * FROM `catalog_status` WHERE `cat_id`=$id";
                $stage_result = mysqli_query($conn, $stage_sql);
                $stage_row = mysqli_fetch_assoc($stage_result);

                $stage = $stage_row['status'];
                

                $myday = explode("/", $start_date);
                $myMonth = $myday[0];
                $myDate = $myday[1];
                $myYear = $myday[2];

                $month_name = month_convert($myMonth);

                $start_error = 'no';
                
                $str = $myDate  . " " . $month_name . " " . $myYear;
                $start_time = datetime2($id);
                $current_time = strtotime("now");
                if($current_time > $start_time){

                    if($published == "0"){
                        $start_error = 'yes';
                    }
                }


                $myEnd = explode("/", $end_date);
                $endMonth = $myEnd[0];
                $endDate = $myEnd[1];
                $endYear = $myEnd[2];
                $month_name = month_convert($endMonth);

                $end_error = "no";

                $str = $endDate . " " . $month_name . " " . $endYear;
                $end_time = datetime_end($id);
                $current_time = strtotime("now");
                if($current_time > $end_time){
                    if($published == "0"){
                        $end_error = "yes";
                    }
                }


                $count_lots_sql = "SELECT count(*) as total FROM `lots` WHERE `catalog_id`=$id AND `status`<>'cancel'";
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
                $lot_loc_sql = "SELECT * FROM `lots` WHERE catalog_id=$id AND `status`<>'cancel'";
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
            <script>


            var stage = "<?php echo $stage; ?>";

            var item = `<div class="catalog_item">
                <div class="auction_image_cube">
                    <img src="<?php echo $img; ?>" alt="" class="catalog_image">


                    <?php if($stage == "published") : ?>
                        <div class="auction_sidebar_list">
                    <?php else : ?>
                        <div class="auction_sidebar_list_stage">
                    <?php endif ; ?>


                    <?php if($published == 0 && $stage != "cancel") : ?>
                        <a href="<?php echo $root; ?>catalogs/featured_image.php?cat_id=<?php echo $id; ?>" class="featured_img_button bidzbutton orange"><i class="fas fa-camera-retro"></i> <span>Featured Image</span></a>
                    <?php elseif($stage == "cancel") : ?>
                        <a href="#" onclick="return false;" class="featured_img_button bidzbutton orange disabled"><i class="fas fa-camera-retro"></i> <span>Featured Image</span></a>
                    <?php else  : ?>
                        <a href="#" onclick="return false;" class="featured_img_button bidzbutton orange disabled"><i class="fas fa-camera-retro"></i> <span>Featured Image</span></a>
                    <?php endif ; ?>

                    <?php if($published == 0 && $stage != "cancel" && $preview == 0) : ?>
                    <a href="<?php echo $root; ?>catalogs/preview_action.php?cat_id=<?php echo $id; ?>&action=enable" class="featured_img_button bidzbutton xbox"><i class="far fa-eye"></i><span>Enable PreView</span></a>
                    <?php elseif($published == 0 && $stage != "cancel"): ?>
                    <a href="<?php echo $root; ?>catalogs/preview_action.php?cat_id=<?php echo $id; ?>&action=disable" class="featured_img_button bidzbutton"><i class="fas fa-eye-slash"></i><span>Disable PreView</span></a>
                    <?php endif ; ?>

                    


                    </div>
                </div>

                <div class="details_and_actions">
                    <div class="catalog_details">
                        <div class="row bold">
                            <span><?php echo $catalog_name; ?></span>
                            <span><span class="color_chocolate"><?php echo $auction_type; ?></span> Auction</span>

                            <?php if($count_lots == 0) : ?>
                            <span><span class="red_error"><?php echo $count_lots; ?></span> <?php echo $lot_label; ?></span>
                            <?php else  : ?>
                            <span><span class="color_chocolate"><?php echo $count_lots; ?></span> <?php echo $lot_label; ?></span>
                            <?php endif ; ?>
                        </div>
                        <div class="row">
                            <div class="catalog_description_manage">
                                <p class="font-18"><?php echo $catalog_description; ?></p>
                            </div>
                        </div>


                        <?php if($count_lots == 0) : ?>
                        
                            <hr class="border_chocolate">
                            <hr class="border_black">

                            <div class="row bold">
                                <span class="red_error"><i class="fas fa-exclamation-circle"></i> ERROR - Must have at least one lot in order to publish catalog</span>
                            </div>
                        <?php endif ; ?>


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

                        <div class="catalog_details">

                            <hr class="border_chocolate">
                            <hr class="border_black">
                        </div>

                        <?php if($published == 0) : ?>
                            <div class="row bold">
                                <?php if($preview == 1) : ?>
                                <span>Catalog Status: <span class="color_chocolate">Unpublished - preview</span></span>
                                <?php else : ?>
                                <span>Catalog Status: <span class="color_chocolate">Unpublished - <?php echo $stage; ?></span></span>
                                <?php endif ; ?>
                            </div>

                        <?php else : ?>
                            <div class="row bold">
                                <?php if ($stage == "published") : ?>
                                <span>Catalog Status: <span class="color_green">Published</span></span>
                                <?php else : ?>
                                <span>Catalog Status: <span class="color_green">Published - <?php echo $stage; ?></span></span>
                                <?php endif ; ?>
                            </div>
                        <?php endif ; ?>

                        <div class="catalog_details">
                            <hr class="border_chocolate">
                            <hr class="border_black">
                        </div>
                        

                        <div class="row bold">
                            <?php if($start_error == "no") : ?>
                            <span>Bidding Starts: <span class="color_chocolate"><?php echo $start_date; ?></span></span>
                            <?php else : ?>
                            <span>Bidding Starts: <span class="red_error"><?php echo $start_date; ?> (Time has Passed)</span></span>
                            <?php endif ; ?>

                            <?php if($end_error == "no") : ?>
                            <span>Bidding Ends: <span class="color_chocolate"><?php echo $end_date; ?></span></span>
                            <?php else : ?>
                            <span>Bidding Ends: <span class="red_error"><?php echo $end_date; ?> (Time has passed)</span></span>
                            <?php endif ; ?>
                        </div>

                        <div class="catalog_details">
                            <hr class="border_chocolate">
                            <hr class="border_black">
                        </div>


                        <div class="row bold catalog_details">
                            <span>Currency: <span class="color_chocolate">USD</span></span>
                            <span>Timezone: <span class="color_chocolate">EST</span></span>
                        </div>


                    <div class="catalog_details">
                        <hr class="border_chocolate">
                        <hr class="border_black">
                    </div>

                    <?php
                        $time_error_message = "";

                        if($start_error == "yes" && $end_error == "yes"){
                            $time_error_message = "&time_error=3";
                        }
                        else if($start_error == "yes"){
                            $time_error_message = "&time_error=1";
                        }
                        else if($end_error == "yes"){
                            $time_error_message = "&time_error=2";
                        }
                    ?>

                    <?php // opening buttons container ?>
                        <?php if($published == 0 && $stage != "cancel") : ?>
                            <div class="catalog_action_buttons">
                        <?php elseif($published == 0 && $stage == "cancel") : ?>
                            <div class="catalog_action_buttons disabled_buttons">
                        <?php else : ?>
                            <div class="catalog_action_buttons disabled_buttons">
                        <?php endif ; ?>


                    <?php // Edit Catalog Details button ?>
                        <?php if($published == 0 && $stage != "cancel") : ?>
                            <a href="edit.php?catalog_id=<?php echo $id; ?><?php echo $time_error_message; ?>" class="bidzbutton catalog_actions chocolate"><i class="fas fa-edit"></i><span>Edit Catalog Details</span></a>
                        <?php elseif($published == 0 && $stage == "cancel") : ?>
                            <a href="#" onclick="return false;" class="bidzbutton catalog_actions chocolate disable"><i class="fas fa-edit"></i><span>Edit Catalog Details</span></a>
                        <?php else : ?>
                            <a href="#" onclick="return false;" class="bidzbutton catalog_actions chocolate disable"><i class="fas fa-edit"></i><span>Edit Catalog Details</span></a>
                        <?php endif ; ?>
                    
                    <?php // Edit Contact information ?>
                            <a href="#" class="bidzbutton catalog_actions chocolate manage_contact_information" name="contact_information_<?php echo $id; ?>"><i class="fas fa-address-book"></i><span>Contact Information</span></a>
                    
                    <?php // Edit Inspection Information ?>
                            <a href="#" class="bidzbutton catalog_actions chocolate manage_inspection_information" name="inspection_information_<?php echo $id; ?>"><i class="fas fa-search-plus"></i><span>Inspection Information</span></a>
                           
                    </div>
                    

                    <?php // opening buttons container ?>
                        <?php if($published == 0 && $stage != "cancel") : ?>
                            <div class="catalog_action_buttons">
                        <?php elseif($published == 0 && $stage == "cancel") : ?>
                            <div class="catalog_action_buttons disabled_buttons">
                        <?php else : ?>
                            <div class="catalog_action_buttons disabled_buttons">
                        <?php endif ; ?>
                        
                        <?php // Add/Manage Lots button ?>
                            <?php if($published == 0 && $stage != "cancel") : ?>
                                <a href="<?php echo $root; ?>lots/manage.php?cat_id=<?php echo $id; ?>" class="bidzbutton chocolate catalog_actions"><i class="fas fa-tasks special"></i> <span>Add/Manage Lots</span></a>
                            <?php elseif($published == 0 && $stage == "cancel") : ?>
                                <a href="#" onclick="return false;" class="bidzbutton chocolate catalog_actions disable"><i class="fas fa-tasks special"></i> <span>Add/Manage Lots</span></a>
                            <?php else : ?>
                                <a href="#" onclick="return false;" class="bidzbutton chocolate catalog_actions disable"><i class="fas fa-tasks special"></i> <span>Add/Manage Lots</span></a>
                            <?php endif ; ?>

                        <?php // Sort Lots button ?>
                            <?php if($published == 0 && $stage != "cancel") : ?>
                                <a href="<?php echo $root; ?>catalogs/sort_lots.php?cat_id=<?php echo $id; ?>" class="bidzbutton catalog_actions chocolate"><i class="fas fa-random"></i> <span>Sort Lots</span></a>
                            <?php elseif($published == 0 && $stage == "cancel") : ?>
                                <a href="#" onclick="return false;" class="bidzbutton catalog_actions chocolate disable"><i class="fas fa-random"></i> <span>Sort Lots</span></a>
                            <?php else : ?>
                                <a href="#" onclick="return false;" class="bidzbutton catalog_actions chocolate disable"><i class="fas fa-random"></i> <span>Sort Lots</span></a>
                            <?php endif ; ?>
                            
                    <?php // Publish / Unpublish button ?>
                        <?php if($published == 0 && $stage != "cancel") : ?>
                            <a href="#" id="publish_catalog_<?php echo $id; ?>" class="bidzbutton devart catalog_actions publish_catalog"><i class="fas fa-upload"></i><span>Publish</span></a>
                        <?php elseif($published == 0 && $stage == "cancel") : ?>
                            <a href="#" onclick="return false;" id="unpublish_catalog" class="bidzbutton devart catalog_actions unpublish_catalog disable"><i class="fas fa-ban"></i><span>Unublish</span></a>
                        <?php else : ?>
                            <?php if($stage != "open") : ?>
                            <a href="<?php echo $root; ?>catalogs/unpublish.php?id=<?php echo $id; ?>" id="unpublish_catalog_<?php echo $id; ?>" class="bidzbutton devart catalog_actions unpublish_catalog"><i class="fas fa-ban"></i><span>Unublish</span></a>
                            <?php else :?>
                            <a href="#" onclick="return false;" id="unpublish_catalog" class="bidzbutton devart catalog_actions unpublish_catalog disable"><i class="fas fa-ban"></i><span>Unublish</span></a>
                            <?php endif; ?>
                        <?php endif ; ?>
                            
                    
                    
                    <?php // Cancel button ?>
                        <?php if($stage == "open" ) : ?>
                            <a href="<?php echo $root; ?>catalogs/featured_image.php?cat_id=<?php echo $id; ?>" class="catalog_actions bidzbutton red "><i class="fas fa-ban"></i> <span>Request Cancellation</span></a>
                        <?php elseif($stage == "cancel") : ?>
                            <a href="<?php echo $root; ?>catalogs/cancel_catalog.php?" onClick="return false;" class="catalog_actions bidzbutton red disabled"><i class="fas fa-ban"></i> <span>Cancel Catalog</span></a>
                        <?php else: ?>
                            <a href="<?php echo $root; ?>catalogs/cancel_catalog.php?cat_id=<?php echo $id; ?>" class="catalog_actions bidzbutton red "><i class="fas fa-ban"></i> <span>Cancel Catalog</span></a>
                        <?php endif ; ?>
                            
                    </div>
                </div>
                </div>
            </div>`;

            catalogs.push(item);
            stages.push(stage);
            </script>
        <?php endforeach ; ?>
        
    </div>
 </div>


 <input type="hidden" name="current_locations_array" id="current_locations_array">

 <div id="manage_inspection_information_modal_container" class="modal_bg" >

    <div id="manage_inspection_information_modal" class="modal manage_modal">
        <h2 class="section_heading"><span>Manage Inspection Information</span></h2>
            <div class="button_container">
                <a href="#" class="bidzbutton" id="open_creator_inspection"><i class="fas fa-plus"></i>Add Inspection</a>

                <a href="#" class="bidzbutton orange close_my_modal" id="close_manager_inspection">Close</a>
                
                <input type="hidden" name="inspect_catalog_id" id="inspect_catalog_id">
                <input type="hidden" name="inspect_number_check" id="inspect_number_check">
            </div>
            <div class="table" id="inspection_list">

            </div>
    </div>
</div>

 <div id="manage_contact_information_modal_container" class="modal_bg">
        <div id="manage_contact_information_modal" class="modal manage_modal">
            <h2 class="section_heading"><span>Manage Contact Information</span></h2>
            <div class="button_container">
            <a href="#" class="bidzbutton" id="open_creator_contact"><i class="fas fa-plus"></i>Add Contact</a>

            <a href="#" class="bidzbutton orange close_my_modal" id="close_manager_contact">Close</a>

            <input type="hidden" name="contact_catalog_id" id="contact_catalog_id">
            <input type="hidden" name="contact_number_check" id="contact_number_check" value="">

        </div>
            <div class="table" id="contact_list">
                <!-- Append table rows -->
            </div>
        </div>
    </div>
 </div>

<?php include "information_modals.php"; ?>

<?php include "../includes/footer.php"; ?>

<!-- Validate Inspection, Edit Inspection, Removal, Edit Removal Forms -->
<script src="js/validate_inspection_removal.js"></script>
<script>

    // Start and End time selectors
    $(".start_time_drop").html(start_time);
    $(".end_time_drop").html(end_time);
    
    var d = new Date();
    var y = d.getFullYear();
    var r = y + 3;

    var range = "-80:" + r;

    function date_formatter(dateText) {
        var comps = dateText.split("/");

        var month = comps[0] - 1;
        var day = comps[1];
        var year = comps[2];

        var thisDate = new Date(year, month, day);

        return thisDate;
    }

    $(".date_picker").keydown(function (e) {
        return false;
    });

    function setDatepickerPos(input, inst) {
        var id = $(input).attr('id');
        
        if(id == "start_date" || id == "end_date"){
            return;
        }
        var rect = input.getBoundingClientRect();
        // use 'setTimeout' to prevent effect overridden by other scripts
        setTimeout(function () {
            var scrollTop = $("body").scrollTop();
    	    inst.dpDiv.css({ top: rect.top + input.offsetHeight + scrollTop });
        }, 0);
    }

    $(".date_picker").datepicker({
        changeYear: true,
        changeMonth: true,
        yearRange: range,
        inline: true,
        beforeShow: function (input, inst) { setDatepickerPos(input, inst) },
        onSelect: function (dateText) {
            $(this).css("background-color", "whitesmoke");

            var id = $(this).attr("id");

            var this_date = date_formatter(dateText);

            if (id == "start_date" || id == "end_date") {
                validate_dates();
            }

            
            if (id == "inspection_start_date" || id == "inspection_end_date") {
                validate_inspection_create();
            }

            if (id == "edit_inspection_start_date" || id == "edit_inspection_end_date") {
                validate_inspection_edit();
            }

            if (id == "removal_start_date" || id == "removal_end_date") {
                validate_removal_create();
            }

            if (id == "edit_removal_start_date" || id == "edit_removal_end_date") {
                validate_removal_edit();
            }
        }
    });

    var open = [];
    var staging = [];
    var published = [];
    var cancel = [];
    
    for(var c = 0; c < catalogs.length; c++){
        var catalog = catalogs[c];
        var stage = stages[c];

        if(stage == "open"){
            open.push(catalog);
        }
        else if(stage == "published"){
            published.push(catalog);
        }
        else if(stage == "staging"){
            staging.push(catalog);
        }
        else if(stage == "cancel"){
            cancel.push(catalog);
        }
    }

    paint(staging, "#staging_catalogs_container");
    paint(open, "#open_catalogs_container");
    paint(published, "#published_catalogs_container");
    paint(cancel, "#cancelled_catalogs_container");

    function paint(arr, type){
        for(var a =0; a<arr.length; a++){
            var curr = arr[a];

            $(type).append(curr);
        }
    }
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
                else if(key == 3){
                    alert("Catalog cannot be published after given start date or end date");
                }
                else{
                    console.log(key);
                }
            }
        });
    });

    var text_array = [];
    var id_array = [];

    $("#close_button a").click(function(e){
        e.preventDefault();

        $("#SINGLE_cat_location_details_modal").hide();
        $("#MULTI_cat_location_details_modal").hide();
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


            if(len == 1){
                $("#SINGLE_cat_location_details_modal").show();

                $("#location_list").css("display", "none");
                $("#one_location_text").css("display", "block");

                var one_loc = convert_loc_to_string(obj[0]);

                console.log(one_loc);

                $("#one_location_text").text(one_loc);

                manipulate_googlemap(one_loc);
            }
            else{
                $("#MULTI_cat_location_details_modal").show();

                var out = "";

                $("#location_list").css("display", "flex");
                $("#multi_location_text").css("display", "none");
                
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
                
                $("#MULTI_cat_location_details_modal #cat_location_dets iframe").attr("src", "https://www.google.com/maps/embed/v1/place?key=AIzaSyAcc17FcMQWYboFujZkLZ5TNA59CAqrBjs&q=-1");

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
        $("#MULTI_cat_location_details_modal #cat_location_dets iframe").attr("src", src);
        $("#SINGLE_cat_location_details_modal #cat_location_dets iframe").attr("src", src);
        
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
<!-- Collapsable Catalogs -->
<script>
    $("#staging_up_button").click(function(e){
        e.preventDefault();

        $("#staging_down_button").css("display", "block");
        $("#staging_down_button").parent().css("display", "block");
        
        $("#staging_up_button").parent().css("display", "none");

        $("#staging_catalogs_container").slideUp(1500);    
    });

    $("#staging_down_button").click(function(e){
        e.preventDefault();

        $("#staging_down_button").parent().css("display", "none");
        
        $("#staging_up_button").css("display", "flex");
        $("#staging_up_button").parent().css("display", "flex");

        $("#staging_catalogs_container").slideDown(1500); 
    });
    
    $("#published_up_button").click(function(e){
        e.preventDefault();

        $("#published_down_button").css("display", "block");
        $("#published_down_button").parent().css("display", "block");
        
        $("#published_up_button").parent().css("display", "none");

        $("#published_catalogs_container").slideUp(1500);    
    });

    $("#published_down_button").click(function(e){
        e.preventDefault();

        $("#published_down_button").parent().css("display", "none");
        
        $("#published_up_button").css("display", "flex");
        $("#published_up_button").parent().css("display", "flex");

        $("#published_catalogs_container").slideDown(1500); 
    });
    
    $("#open_up_button").click(function(e){
        e.preventDefault();

        $("#open_down_button").css("display", "block");
        $("#open_down_button").parent().css("display", "block");
        
        $("#open_up_button").parent().css("display", "none");

        $("#open_catalogs_container").slideUp(1500);    
    });

    $("#open_down_button").click(function(e){
        e.preventDefault();

        $("#open_down_button").parent().css("display", "none");
        
        $("#open_up_button").css("display", "flex");
        $("#open_up_button").parent().css("display", "flex");

        $("#open_catalogs_container").slideDown(1500); 
    });
    
    $("#cancelled_up_button").click(function(e){
        e.preventDefault();

        $("#cancelled_down_button").css("display", "block");
        $("#cancelled_down_button").parent().css("display", "block");
        
        $("#cancelled_up_button").parent().css("display", "none");

        $("#cancelled_catalogs_container").slideUp(1500);    
    });

    $("#cancelled_down_button").click(function(e){
        e.preventDefault();

        $("#cancelled_down_button").parent().css("display", "none");
        
        $("#cancelled_up_button").css("display", "flex");
        $("#cancelled_up_button").parent().css("display", "flex");

        $("#cancelled_catalogs_container").slideDown(1500); 
    });
</script>
<!-- Close Button operation -->
<script>
    $( ".close_my_modal" ).on( "click", function(e) {
        e.preventDefault();
        $("#manage_contact_information_modal_container").hide();
        $("#manage_inspection_information_modal_container").hide();
    });
    $( ".close_modal" ).on( "click", function(e) {
        e.preventDefault();

        close_top_modals();
    });
    
    function close_top_modals(){

        reset_modals();

        $("#add_contact_modal").hide();
        $("#edit_contact_modal").hide();
        $("#add_inspection_modal").hide();
        $("#edit_inspection_modal").hide();
    }
</script>
<!-- Show Manage contact and inspection modal and populate with data -->
<script>
    
    // convert military time to standard
    function mil_to_standard(mil){
        var ent_hour = mil.substring(0, 2);
        var ent_min = mil.substring(2, 4);
        var amfm = "";

        if(ent_hour < 12){
            ampm = "AM";
        }
        else{
            ampm = "PM"
        }

        var disp_hour = ent_hour % 12;
        if(disp_hour == 0){
            disp_hour = 12;
        }

        var out = disp_hour + ":" + ent_min + " " + ampm;

        return out;
    }
    $(document).ready(function(){

        $(".manage_inspection_information").on("click", function(e) {
            e.preventDefault();

            var ins, locs;

            $("#manage_inspection_information_modal_container").show();

            var name = $(this).attr("name");
            var id = name.replace("inspection_information_", "");

            $("#inspect_catalog_id").val(id);

            $.ajax({
                type: 'POST',
                dataType: 'json',
                cache: false,
                url: 'manage_information.php',
                data: {id: id, type: "inspection"},
                success: function(data){
                    setup_inspection(data);
                }
            });

        });
        function setup_inspection(data){
            var locs = data['locations'];
            var cons = data['inspection'];

            $("#current_locations_array").val(JSON.stringify(locs));
            
            $("#inspection_list").empty();
            
            var table_header = `
                <div class="table-row table-header">
                    <div class="table-head">Start Date</div>
                    <div class="table-head">End Date</div>
                    <div class="table-head">Start Time</div>
                    <div class="table-head">End Time</div>
                    <div class="table-head">Location</div>
                    
                    <div class="table-head">Edit</div>
                    <div class="table-head">Delete</div>
                </div>`;

            $("#inspection_list").append(table_header);

            for (var key in cons) {
                var value = cons[key];
                
                var comps = value.split("??||&&");
                
                var id = comps[0];
                var start_date = comps[1];
                var end_date = comps[2];
                var start_time = mil_to_standard(comps[3]);
                var end_time = mil_to_standard(comps[4]);
                var loc = comps[5];


                if(end_date == "-1" || end_date == -1){
                    end_date = `<span style="display: flex; justify-content: center;">--</span>`;
                }

                var location = getLocation(locs, loc);
 
                var item = 
                    `<div class="table-row" id="inspection_module_${id}">
                        <div class="table-cell">${start_date}</div>
                        <div class="table-cell">${end_date}</div>
                        <div class="table-cell">${start_time}</div>
                        <div class="table-cell">${end_time}</div>
                        <div class="table-cell">${location}</div>

                        <div class="table-cell"><a class="edit_inspection_modal_button" name="edit_inspection_${id}" style="color:black;" href="#"><i class="fas fa-edit cursor_pointer" aria-hidden="true"></i></a></div>

                        <div class="table-cell"><a class="delete_inspection_modal_button" name="delete_inspection_${id}" style="color:black;" href="#"> <i class="far fa-trash-alt cursor_pointer" aria-hidden="true"></i></a> </div>
                    </div>`;
                $("#inspection_list").append(item);
            }
        }

        var current_locations;

        $(".manage_contact_information").on("click", function(e) {
            e.preventDefault();
            
            var cons, locs;

            $("#manage_contact_information_modal_container").show();

            var name = $(this).attr("name");
            var id = name.replace("contact_information_", "");

            $("#contact_catalog_id").val(id);

            $.ajax({
                type: 'POST',
                dataType: 'json',
                cache: false,
                url: 'manage_information.php',
                data: {id: id, type: "contact"},
                success: function(data){
                    setup_contact(data);
                }
            });
        });

        function setup_contact(data){
            // separate incoming data into location array and contact array'
            var locs = data['locations'];
            var cons = data['contacts'];

            
            $("#current_locations_array").val(JSON.stringify(locs));

            $("#contact_list").empty();
            var table_header = `
                <div class="table-row table-header">
                    <div class="table-head">Contact Name</div>
                    <div class="table-head">Contact Phone</div>
                    <div class="table-head">Contact Location</div>
                    
                    <div class="table-head">Edit</div>
                    <div class="table-head">Delete</div>
                </div>`;

            $("#contact_list").append(table_header);

            var comps;
            var largest_key = 0;

            var num = 0;

            for (var key in cons) {
                num++;

                var value = cons[key];
                
                comps = value.split("??||&&");
                
                
                var id = comps[0];
                var name = comps[1];
                var phone = comps[2];
                var loc = comps[3];


                var location = getLocation(locs, loc);

                var item = 
                    `<div class="table-row" id="contact_module_${id}">
                        <div class="table-cell">${name}</div>
                        <div class="table-cell">${phone}</div>
                        <div class="table-cell">${location}</div>

                        <div class="table-cell"><a class="edit_contact_modal_button" name="edit_contact_${id}" style="color:black;" href="#"><i class="fas fa-edit cursor_pointer" aria-hidden="true"></i></a></div>

                        <div class="table-cell"><a class="delete_contact_modal_button" name="delete_contact_${id}" style="color:black;" href="#"> <i class="far fa-trash-alt cursor_pointer" aria-hidden="true"></i></a> </div>
                    </div>`;
                $("#contact_list").append(item);
            }
            // add name to update button for add index
            // open_creator_contact
            // var next_index = parseInt(largest_key) + 1;
            // var name = "next_contact_" + next_index;
            $("#contact_number_check").val(num);
             
            if(num >=10){
                $("#open_creator_contact").hide();
            }
            else{
                $("#open_creator_contact").show();
            }
        }

        function getLocation(locations, loc_id){
            for(var key in locations){
                var value = locations[key];

                var comps = value.split("??||&&");
                var id = comps[0];

                if(id == loc_id){
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
                        output = address1 +  ", " + address2 + ", " + city + ", " + state + ", " + country;
                    }

                    return output;
                }
            }
        }
    });

</script>
<!-- Add contact and inspection modals on button click -->
<script>
    

    function location_to_select_option(location){
        var comps = location.split("??||&&");

        var id = comps[0];
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
            output = address1 +  ", " + address2 + ", " + city + ", " + state + ", " + country;
        }

        var ret = `<option value="${id}">${output}</option>`;
        return ret;
    }

    function create_location_list(id, container){

        $(container).empty();
        var select_default = `<option value="">Choose Corresponding Asset Location</option>`;
        $(container).append(select_default);


        // get list of locations from database
        // $.ajax({
        //     type: 'POST',
        //     dataType: 'json',
        //     cache: false,
        //     url: 'manage_information.php',
        //     data: {id: id, type: "location"},
        //     success: function(data){
        //         for(var i =0; i<data.length; i++){
        //             var record = data[i];
        //             var select_option = location_to_select_option(record);
        //             $(container).append(select_option);
        //         }
        //     }
        // });

        var current_locations = $("#current_locations_array").val();
        var list_of_locations = JSON.parse(current_locations);

        for (var key in list_of_locations) {
            var value = list_of_locations[key];
            
            var select_option = location_to_select_option(value);
            $(container).append(select_option);
        }
    }
    
    $("#open_creator_contact").click(function(e){
        e.preventDefault();

        $("#add_contact_modal").show();

        var id = $("#contact_catalog_id").val();

        create_location_list(id, "#contact_location");
    });

    $("#open_creator_inspection").click(function(e){
        e.preventDefault();

        $("#add_inspection_modal").show();

        var id = $("#inspect_catalog_id").val();

        create_location_list(id, "#inspection_location");
    });
</script>

<script>
    
    var num_contact = $("#contact_number_check").val();

    console.log(num_contact);
    if(num_contact >= 10){
        $("#open_creator_contact").hide();
    }
</script>
<!-- Submit add contact and inspection modals -->
<script>
    $("#submit_inspection_form").click(function(e){
        var cat_id = $("#inspect_catalog_id").val();

        // get number of entries
        $.ajax({
            type: 'POST',
            cache: false,
            url: 'manage_information.php',
            data: {cat_id: cat_id, type: "inspect_number"},
            success: function(data){
                handle_inspect_number(data);
            }
        });

        console.log("hello world");
        var num_check = $("#inspect_number_check").val();

        if(num_check >= 10){
            return;
        }

        var start_date = $("#inspection_start_date").val();
        var end_date = $("#inspection_end_date").val();
        var start_time = $("#inspection_start_time").val();
        var end_time = $("#inspection_end_time").val();
        var location = $("#inspection_location").val();


        if(start_date > end_date && end_date){
            console.log("Start date / End date error");
            return;
        }
        if(start_time > end_time){
            console.log("Start time / End time error");
            return;
        }


        if (start_date == "" || start_time == "" || end_time == "" || location == "") {
            alert("Please complete the form");
            return;
        }

      
        // save data to database
        $.ajax({
            type: 'POST',
            cache: false,
            url: 'manage_information.php',
            data: {cat_id: cat_id, start_date: start_date, end_date: end_date, start_time: start_time, end_time: end_time, location: location, type: "save_inspect"},
            success: function(data){
                var details = data.split("??||&&");
                var location = details[0];
                var id = details[1];
                
                var item = 
                    `<div class="table-row" id="inspection_module_${id}">
                        <div class="table-cell">${start_date}</div>
                        <div class="table-cell">${end_date}</div>
                        <div class="table-cell">${start_time}</div>
                        <div class="table-cell">${end_time}</div>
                        <div class="table-cell">${location}</div>

                        <div class="table-cell"><a class="edit_inspection_modal_button" name="edit_inspection_${id}" style="color:black;" href="#"><i class="fas fa-edit cursor_pointer" aria-hidden="true"></i></a></div>

                        <div class="table-cell"><a class="delete_inspection_modal_button" name="delete_inspection_${id}" style="color:black;" href="#"> <i class="far fa-trash-alt cursor_pointer" aria-hidden="true"></i></a> </div>
                    </div>`;
                $("#inspection_list").append(item);
            }
        });
        
        num_check++;
        $("#inspect_number_check").val(num_check);

        if(num_check >= 10){
            $("#open_creator_inspection").hide();
        }
        close_top_modals();
    });
    $("#submit_contact_form").click(function(e){
        var cat_id = $("#contact_catalog_id").val();

        // get number of entries
        $.ajax({
            type: 'POST',
            cache: false,
            url: 'manage_information.php',
            data: {cat_id: cat_id, type: "contact_number"},
            success: function(data){
                if(data >= 10){
                    handle_contact_number(data);
                }
            }
        });

        var num_check = $("#contact_number_check").val();

        if(num_check >= 10){
            return;
        }



        var name = $("#contact_name").val();
        var phone = $("#contact_phone").val();
        var location = $("#contact_location").val();

        if (name == "" || phone == "" || location == "") {
            alert("Please complete the form");
            return;
        }
        if (name.includes("??") || name.includes("||") || name.includes("&&") ||
            phone.includes("??") || phone.includes("||") || phone.includes("&&")) 
        {
            alert("Invalid characters provided");
            return;
        }



        // save data to database
        $.ajax({
            type: 'POST',
            cache: false,
            url: 'manage_information.php',
            data: {cat_id: cat_id, name: name, phone: phone, location: location, type: "save_contact"},
            success: function(data){
                var details = data.split("??||&&");
                var location = details[0];
                var id = details[1];
                console.log(details);
                var item = 
                    `<div class="table-row" id="contact_module_${id}">
                        <div class="table-cell">${name}</div>
                        <div class="table-cell">${phone}</div>
                        <div class="table-cell">${location}</div>

                        <div class="table-cell"><a class="edit_contact_modal_button" name="edit_contact_${id}" style="color:black;" href="#"><i class="fas fa-edit cursor_pointer" aria-hidden="true"></i></a></div>

                        <div class="table-cell"><a class="delete_contact_modal_button" name="delete_contact_${id}" style="color:black;" href="#"> <i class="far fa-trash-alt cursor_pointer" aria-hidden="true"></i></a> </div>
                    </div>`;
                $("#contact_list").append(item);
            }
        });

        num_check++;
        $("#contact_number_check").val(num_check);

        if(num_check >= 10){
            $("#open_creator_contact").hide();
        }
        close_top_modals();
    });

    function handle_contact_number(number){
        $("#contact_number_check").val(number);
    }

    function handle_inspect_number(number){
        $("#inspect_number_check").val(number);
    }
</script>
<!-- Delete contact and inspection modules -->
<script>
    // TODO: confirmation modal for deleting
    $(document).on('click','.delete_contact_modal_button',function(e) {
        e.preventDefault();

        var name = $(this).attr('name');
        var del_id = name.replace("delete_contact_", "");
        var cat_id = $("#contact_catalog_id").val();


        $.ajax({
            type: 'POST',
            cache: false,
            url: 'manage_information.php',
            data: {cat_id: cat_id, del_id: del_id, type: "delete_contact"},
            success: function(data){
                var del = data.replace("delete_contact_", "");

                var id = "#contact_module_" + del;

                $(id).remove();
            }
        });

        var num_check = $("#contact_number_check").val();
        num_check--;
        
        $("#contact_number_check").val(num_check);
        $("#open_creator_contact").show();
    });

    $(document).on('click','.delete_inspection_modal_button',function(e) {
        e.preventDefault();

        var name = $(this).attr("name");
        var del_id = name.replace("delete_inspection_", "");
        var cat_id = $("#inspect_catalog_id").val();

        console.log(name);
        $.ajax({
            type: 'POST',
            cache: false,
            url: 'manage_information.php',
            data: {cat_id: cat_id, del_id: del_id, type: "delete_inspection"},
            success: function(data){
                var del = data.replace("delete_inspection_", "");

                var id = "#inspection_module_" + del;

                $(id).remove();

                console.log(id);
            }
        });

        var num_check = $("#inspect_number_check").val();
        num_check--;
        
        $("#inspect_number_check").val(num_check);
        $("#open_creator_inspection").show();
    });

</script>
<!-- Edit contact and inspection modules -->
<script>
    var mod_id = 0;
    
    $(document).on('click','.edit_inspection_modal_button',function(e) {
        e.preventDefault();

        var name = $(this).attr('name');
        mod_id = name.replace("edit_inspection_", "");

        var cat_id = $("#inspect_catalog_id").val();

        $("#edit_inspection_modal").show();

        create_location_list(cat_id, "#edit_inspection_location");

        // get info from table
        $.ajax({
            type: 'POST',
            dataType: 'json',
            cache: false,
            url: 'manage_information.php',
            data: {cat_id: cat_id, mod_id: mod_id, type: "specific_inspection"},
            // success: function(data){
            //     console.log(data);   
            // }

            success: populate_edit_inspect
        });

    });
    
    $(document).on('click','.edit_contact_modal_button',function(e) {
        e.preventDefault();

        var name = $(this).attr("name");
        mod_id = name.replace("edit_contact_", "");

        var cat_id = $("#contact_catalog_id").val();

        $("#edit_contact_modal").show();

        create_location_list(cat_id, "#edit_contact_location");


        // get info from table
        $.ajax({
            type: 'POST',
            dataType: 'json',
            cache: false,
            url: 'manage_information.php',
            data: {cat_id: cat_id, mod_id: mod_id, type: "specific_contact"},
            // success: function(data){
                
            // }

            success: populate_edit_contact
        });

    });

    function populate_edit_contact(data){
        

        var comps = data.split("??||&&");

        var id = comps[0];
        var name = comps[1];
        var phone = comps[2];
        var location = comps[3];


        $("#edit_contact_name").val(name);
        $("#edit_contact_phone").val(phone);
        $("#edit_contact_location").val(location);

        console.log(location);
    }

    function populate_edit_inspect(data){
        var comps = data.split("??||&&");

        var id = comps[0];
        var start_date = comps[1];
        var end_date = comps[2];
        var start_time = comps[3];
        var end_time = comps[4];
        var location = comps[5];

        if(end_date == -1 || end_date == "-1"){
            end_date = "";
        }

        $("#edit_inspection_start_date").val(start_date);
        $("#edit_inspection_end_date").val(end_date);
        $("#edit_inspection_start_time").val(start_time);
        $("#edit_inspection_end_time").val(end_time);
        $("#edit_inspection_location").val(location);
    }

    $("#save_edit_inspection").click(function(e){
        e.preventDefault();

        var cat_id = $("#inspect_catalog_id").val();

        var start_date = $("#edit_inspection_start_date").val();
        var end_date = $("#edit_inspection_end_date").val();
        var start_time = $("#edit_inspection_start_time").val();
        var end_time = $("#edit_inspection_end_time").val();
        var location = $("#edit_inspection_location").val();

        if(start_date == "" || start_time == "" || end_time == "" || location == ""){
            alert("Please complete the form");
            return;
        }

        if(end_date == "" || end_date == "-1"){
            end_date = -1;
        }

        var out = mod_id + "??||&&" + start_date + "??||&&" + end_date + "??||&&" + start_time + "??||&&" + end_time + "??||&&" + location;

        $.ajax({
            type: 'POST',
            cache: false,
            url: 'manage_information.php',
            data: {cat_id: cat_id, mod_id: mod_id, out: out, type: "update_inspection"},
            success: function(data){
                console.log(data);
            }
        });

        var row_id = "#inspection_module_" + mod_id;
        var row = $(row_id);

        var location_output = "";

        var current_locations = $("#current_locations_array").val();
        var list_of_locations = JSON.parse(current_locations);

        for(var key in list_of_locations){
            var value = list_of_locations[key];

            var comps = value.split("??||&&");

            var loc_id = comps[0];

            if(location == loc_id){
                location_output = convert_loc_to_string(value);
            }
        }

        if(end_date == "-1" || end_date == -1){
            end_date = `<span style="display: flex; justify-content: center;">--</span>`;
        }
        
        row.children().eq(0).html(start_date);
        row.children().eq(1).html(end_date);
        row.children().eq(2).html(mil_to_standard(start_time));
        row.children().eq(3).html(mil_to_standard(end_time));
        row.children().eq(4).html(location_output);

        // close modal
        reset_modals();
        close_top_modals();
    })
    $("#save_edit_contact").click(function(e){
        e.preventDefault();

        var cat_id = $("#contact_catalog_id").val();
        
        var name = $("#edit_contact_name").val();
        var phone = $("#edit_contact_phone").val();
        var location = $("#edit_contact_location").val();

        if (name == "" || phone == "" || location == "") {
            alert("Please complete the form");
            return;
        }
        if (name.includes("??") || name.includes("||") || name.includes("&&") ||
            phone.includes("??") || phone.includes("||") || phone.includes("&&")) 
        {
            alert("Invalid characters provided");
            return;
        }

        console.log(mod_id);
        console.log(name, phone, location);

        var out = mod_id + "??||&&" + name + "??||&&" + phone + "??||&&" + location;

        $.ajax({
            type: 'POST',
            cache: false,
            url: 'manage_information.php',
            data: {cat_id: cat_id, mod_id: mod_id, out: out, type: "update_contact"},
            success: function(data){
                console.log(data);
            }
        });

        var row_id = "#contact_module_" + mod_id;
        var row = $(row_id);


        var location_output = "";

        var current_locations = $("#current_locations_array").val();
        var list_of_locations = JSON.parse(current_locations);

        for (var key in list_of_locations) {
            var value = list_of_locations[key];
            
            var comps = value.split("??||&&");

            var loc_id = comps[0];

            if(location == loc_id){
                location_output = convert_loc_to_string(value);
            }
        }

        
        row.children().eq(0).html(name);
        row.children().eq(1).html(phone);
        row.children().eq(2).html(location_output);

        // close modal
        reset_modals();
        close_top_modals();
    });
</script>
<!-- RESET modals -->
<script>
    var fields = ["contact_name", "contact_phone", "contact_location", "edit_contact_name", "edit_contact_phone", "edit_contact_location", "inspection_start_date", "inspection_end_date", "inspection_start_time", "inspection_end_time", "inspection_location", "edit_inspection_start_date", "edit_inspection_end_date", "edit_inspection_start_time", "edit_inspection_end_time", "edit_inspection_location"];
    $( ".reset_form" ).on( "click", function(e) {
        e.preventDefault();

        reset_modals();
    });

    function reset_modals(){

        for(var f = 0; f<fields.length; f++){
            var curr_field = fields[f];
            var field_id = "#" + curr_field;

            $(field_id).val("");
            $(field_id).css("background-color", "whitesmoke");
        }
    }
</script>