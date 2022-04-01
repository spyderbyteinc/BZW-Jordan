<?php include "../includes/username.php"; ?>
<?php
    if($username == "" || !isset($username)){
        header("location: ../index.php");
        exit();
    }
    if(!isset($_SESSION['lot_catalog'])){
        $loc = "location: " . $root . "catalogs/manage.php";
        header($loc);
        exit();
    }

    if(!isset($_GET['cat_id']) || !isset($_GET['lot_id'])){
        $loc = "location: " . $root . "catalogs/manage.php";
        header($loc);
        exit();
    }

    $catalog_id = $_SESSION['lot_catalog'];

    $check_sql = "SELECT * FROM `catalogs` WHERE `id`='$catalog_id' AND `owner`='$username'";
    $result = mysqli_query($conn, $check_sql);
    $num = mysqli_num_rows($result);
    if($num == 0){
        $loc = "location: " . $root . "catalogs/manage.php";
        header($loc);
        exit();
    }

    $row = mysqli_fetch_assoc($result);

    
    
    if($row['published'] == 1 || $row['published'] == "1"){
        header("location: ../catalogs/manage.php");
        exit();
    }
    
    $all_locations = array();
    $asset_location1 = $row['asset_location_1'];
    $asset_location2 = $row['asset_location_2'];
    $asset_location3 = $row['asset_location_3'];
    $asset_location4 = $row['asset_location_4'];
    $asset_location5 = $row['asset_location_5'];

    if($asset_location1 != "-1" && $asset_location1 != -1){
        array_push($all_locations, $asset_location1);
    }

    if($asset_location2 != "-1" && $asset_location2 != -1){
        array_push($all_locations, $asset_location2);
    }
    
    if($asset_location3 != "-1" && $asset_location3 != -1){
        array_push($all_locations, $asset_location3);
    }
    
    if($asset_location4 != "-1" && $asset_location4 != -1){
        array_push($all_locations, $asset_location4);
    }
    
    if($asset_location5 != "-1" && $asset_location5 != -1){
        array_push($all_locations, $asset_location5);
    }

    $one_location = "";
    if(count($all_locations) == 1){
        $one_location = "selected";
    }


    // Category table access
    $all_cat1 = array();
    $cat1_sql = "SELECT * FROM `cat_tier1`";
    $cat1_result = mysqli_query($conn, $cat1_sql);
    while($row = mysqli_fetch_assoc($cat1_result)){
        array_push($all_cat1, $row['id'] . "||" . $row['name']);
    }


    // Get lot information from table
    $lot_id = $_GET['lot_id'];
    $cat_id = $_GET['cat_id'];

    $lot_sql = "SELECT * FROM `lots` WHERE `id`=$lot_id AND `catalog_id`=$cat_id AND `owner`='$username'";
    $lot_result = mysqli_query($conn, $lot_sql);
    $num = mysqli_num_rows($lot_result);
    if($num != 1){
        $loc = "location: " . $root . "catalogs/manage.php";
        header($loc);
        exit();
    }
    $lot = mysqli_fetch_assoc($lot_result);

    // Get current values
    $lot_name = $lot['name'];
    $lot_description = $lot['description'];

    $starting_bid = $lot['starting_bid'];
    $increment_type = $lot['increment_type'];
    $bid_increment = $lot['bid_increment'];

    $category1 = $lot['category1'];
    $category2 = $lot['category2'];
    $category3 = $lot['category3'];
    $category4 = $lot['category4'];
    $other_category = $lot['other_category'];

    $lot_location = $lot['lot_location'];

    $featured_lot = $lot['featured_lot'];
    $allow_freeze = $lot['allow_freeze'];

    $reserve_amount = $lot['reserve_amount'];

    $quantity = $lot['quantity'];
    $units = $lot['units'];
    $brand = $lot['brand'];
    $lot_condition = $lot['lot_condition'];
    $size = $lot['size'];
    $weight = $lot['weight'];

    $internal_notes = $lot['internal_notes'];
    $lot_tags = $lot['tags'];
    $lot_tags_arr = explode(",", $lot_tags);

    // get select values for categories
    // tier2
    $other_option = false;
    if($category1 == 0){
        $other_option = true;
    }
    else{
        $tier2_sql = "SELECT * FROM `cat_tier2` WHERE `parent`=$category1";
        $tier2_result = mysqli_query($conn, $tier2_sql);

        $tier2_options = "";
        while($row = mysqli_fetch_assoc($tier2_result)){
            $id = $row['id'];
            $name = $row['name'];
            $slug = $category1 . "-" . $id;
            $option = "<option value='$id' name='$slug'>$name</option>";
            $tier2_options = $tier2_options . $option;
        }
        $tier2_options = $tier2_options . '<option value="0" name="' . $category1 . '-0">Other</option>';
    }

    //tier3
    if($category2 == 0){
        $other_option = true;
    }
    else{
        $tier3_sql = "SELECT * FROM `cat_tier3` WHERE `parent`=$category2";
        $tier3_result = mysqli_query($conn, $tier3_sql);

        $tier3_options = "";
        while($row = mysqli_fetch_assoc($tier3_result)){
            $id = $row['id'];
            $name = $row['name'];
            $slug =  $category1 . "-" . $category2 . '-' . $id;
            $option = "<option value='$id' name='$slug'>$name</option>";
            $tier3_options = $tier3_options . $option;
        }
        
        $tier3_options = $tier3_options . '<option value="0" name="' . $category1 . '-' . $category2 . '-0">Other</option>';
    }

    if($category3 == 0){
        $other_option = true;
    }
    else{
        $tier4_sql = "SELECT * FROM `cat_tier4` WHERE `parent`=$category3";
        $tier4_result = mysqli_query($conn, $tier4_sql);

        $tier4_options = "";
        while($row = mysqli_fetch_assoc($tier4_result)){
            $id = $row['id'];
            $name = $row['name'];
            $slug = $category1 . "-" . $category2 . "-" . $category3 . '-' . $id;
            $option = "<option value='$id' name='$slug'>$name</option>";
            $tier4_options = $tier4_options . $option;
        }
        $tier4_options = $tier4_options . '<option value="0" name="' . $category1 . '-' . $category2 . '-' . $category3 . '-0">Other</option>';
    }
?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/connect.php"; ?>
<!-- <link rel="stylesheet" href="../css/tags.css"> -->
<!-- <link rel="stylesheet" href="../css/tags/jquery.tag-editor.css"> -->
<!-- <link rel="stylesheet" href="../css/tags/selectize.css"> -->
<!-- <link rel="stylesheet" href="../css/tags/tagify.css"> -->
<link rel="stylesheet" href="../css/tags/suggestags.css">
<style>
    div.tagsinput{
        width: 100% !important; 
        padding: 10px;
        /* min-height: 100px; */
        /* height: 100px; */
        /* line-height: 401 . "-" . $category2 . "-" . $id;
            $option = "<option value='$id' name='$slug'>$name</option>";
            $tier3_options = $tier3_options . $option;
        }
        $tier3_options = $tier3_options . '<option value="0" name="' . $category1 . '-' . $category2 . '-0">Other</option>';px; */
        background: whitesmoke;
        box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
        border-radius: 5px;
        /* padding: 0px 20px 0px 20px; */
        font-size: 1rem;
        color: black;
        outline: none;
        margin: 0;
        border: 1px solid chocolate;
        width: 100%;
    }
</style>

<div class="catalog_creation_header">
    <h2 class="house_heading section_heading"><span>Edit Lot - <?php echo $lot_name; ?></span></h2>
</div>
    <div class="cancel_button_container">
        <a href="<?php echo $root; ?>lots/manage.php?cat_id=<?php echo $catalog_id; ?>" class="bidzbutton orange cancel_creation"><i class="fas fa-arrow-left"></i> Cancel Lot Update</a>
        
    </div>


        <section class="catalog_create">
            <h4 class="sign_heading"><span>Basic Lot Information</span></h4>


            <form action="<?php echo $root; ?>processes/process_lot_update.php" method="post" name="lot_update_form" id="lot_update_form" >
                <div class="catalog_row signup_row">
                    <div class="col1">
                        <div class="signup_group">
                            <label for="lot_name" class="input_label">Lot Name<span class="required">*</span></label>
                            <input type="text" class="input_text" name="lot_name" id="lot_name" placeholder="Lot Name">
                        </div>
                    </div>
                </div>

                <div class="catalog_row signup_row">
                    <div class="col1">
                        <div class="signup_group">
                            <label for="lot_description" class="input_label">Lot Description<span class="required">*</span></label>
                            <textarea class="input_text" name="lot_description" id="lot_description" rows="3" placeholder="Lot Description"></textarea>
                        </div>
                    </div>
                </div>

            
                
                <h4 class="sign_heading"><span>Lot Category</span></h4>
                <div class="catalog_row signup_row">
                    <div class="col2" id="category_tier1_holder">
                        <div class="signup_group">
                            <label for="category_tier1" class="input_label">Category - Tier 1<span class="required">*</span></label>
                            <select class="input_text input_select category_select" name="category_tier1" id="category_tier1">
                                <option class="select" name="select" value="">Select Category</option>
                                <?php foreach($all_cat1 as $cat) : ?>
                                <?php
                                    $dets = explode("||", $cat);
                                    $category_id = $dets[0];
                                    $category_name = $dets[1];
                                ?>
                                <option value="<?php echo $category_id; ?>" name="<?php echo $category_id; ?>"><?php echo $category_name; ?></option>
                                <?php endforeach ; ?>
                                <option value="0">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col2" id="category_tier2_holder">
                        <div class="signup_group">
                            <label for="category_tier2" class="input_label">Category - Tier 2<span class="required">*</span></label>
                            <select class="input_text input_select category_select" name="category_tier2" id="category_tier2">
                                <option value="" name="select" >Select Category</option>
                                <?php echo $tier2_options; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="catalog_row signup_row">
                    <div class="col2" id="category_tier3_holder">
                        <div class="signup_group">
                            <label for="category_tier3" class="input_label">Category - Tier 3<span class="required">*</span></label>
                            <select class="input_text input_select category_select" name="category_tier3" id="category_tier3">
                                <option class="select" value="" name="select" >Select Category</option>
                                <?php echo $tier3_options; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col2" id="category_tier4_holder">
                        <div class="signup_group">
                            <label for="category_tier4" class="input_label">Category - Tier 4<span class="required">*</span></label>
                            <select class="input_text input_select category_select" name="category_tier4" id="category_tier4">
                                <option value="" name="select" >Select Category</option>
                                <?php echo $tier4_options; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="catalog_row signup_row">
                    <div class="col1" id="category_other_holder">
                        <div class="signup_group">
                            <label for="category_other" class="input_label">Other Category - Please Specify<span class="required">*</span></label>
                            <input type="text" class="input_text" name="category_other" id="category_other" placeholder="Other Category">
                        </div>
                    </div>
                </div>

                
                <div id="loader_outer">
                    <div id="loader_container">
                        <div class="loader"></div>
                    </div>
                </div>
                
                <h4 class="sign_heading"><span>Bidding Information</span></h4>
                <div class="catalog_row signup_row">
                    <div class="col3">
                        <div class="signup_group">
                            <label for="starting_bid" class="input_label">Starting Bid<span class="required">*</span></label>
                            <input type="text"  class="input_text" name="starting_bid" id="starting_bid" pattern="\d*" step="1"onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" placeholder="Starting Bid">
                        </div>
                    </div>
                    <div class="col3">
                        <div class="signup_group">
                            <label for="bid_increment_type" class="input_label">Bid Increment Type<span class="required">*</span></label>
                            <select class="input_text input_select" name="bid_increment_type" id="bid_increment_type">
                                <option selected value="static">Static</option>
                            </select>
                        </div>
                    </div>
                    <div class="col3" id="static_incrementation">
                        <div class="signup_group">
                            <label for="bid_increment" class="input_label">Bid Increment<span class="required">*</span></label>
                            <input type="text" class="input_text" name="bid_increment" id="bid_increment" placeholder="Bid Increment" pattern="\d*" step="1"onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" >
                        </div>
                    </div>
                    <div class="col3" id="progressive_incrementation">
                        <div class="signup_group">
                            <label for="starting_bid_increment" class="input_label">Starting Bid Increment<span class="required">*</span></label>
                            <input type="text" class="input_text" name="starting_bid_increment" id="starting_bid_increment" placeholder="Starting Bid Increment" pattern="\d*" step="1"onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" >
                        </div>
                    </div>
                </div>
                <div class="catalog_row signup_row">
                    <div class="col2">
                        <div class="signup_group">
                            <label for="reserve_option" class="input_label">Allow a Reserve?<span class="required">*</span></label>
                            <select name="reserve_option" id="reserve_option" class="input_text input_select">
                                    <option value="">Allow a Reserve?</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col2">
                        <div class="signup_group" id="reserve_amount_container">
                            <label for="reserve_amount" class="input_label">Reserve Amount<span class="required">*</span></label>
                            <input type="text"  class="input_text" name="reserve_amount" id="reserve_amount" pattern="\d*" step="1"onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" placeholder="Reserve Amount">
                        </div>
                    </div>
                </div>

                <h4 class="sign_heading"><span>Lot Location</span></h4>
                <div class="catalog_row signup_row">
                    <div class="col1">
                        <div class="signup_group">
                            <label for="lot_location" class="input_label">Lot Location<span class="required">*</span></label>
                            <select class="input_text input_select" name="lot_location" id="lot_location">
                                <option value="">Select Asset Location</option>
                                <?php foreach($all_locations as $loc) : ?>
                                <?php
                                    $location_details = explode("??||&&", $loc);
                                    $location_id = $location_details[0];
                                    $address1 = $location_details[1];
                                    $address2 = $location_details[2];
                                    $city = $location_details[3];
                                    $state = $location_details[4];
                                    $country = $location_details[5];

                                    $current_location = "";

                                    if($address2 == "-1" || $address2 == -1){
                                        $current_location = $address1 . ", " . $city . ", " . $state . ", " . $country;
                                    }
                                    else{
                                        $current_location = $address1 . ", " . $address2 . ", " . $city . ", " . $state . ", " . $country;
                                    }
                                ?>
                                    <option value="<?php echo $location_id; ?>" <?php echo $one_location; ?>><?php echo $current_location; ?></option>
                                <?php endforeach ; ?>
                            </select>
                        </div>
                    </div>
                </div>

                
                
                <h4 class="sign_heading"><span>Lot Specific Details</span></h4>
                <div class="catalog_row signup_row">
                    <div class="col2">
                        <div class="signup_group">
                            <label for="featured_lot" class="input_label">Featured Lot?<span class="required">*</span></label>
                            <select name="featured_lot" id="featured_lot" class="input_text input_select">
                                    <option value="">Is this a featured lot?</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col2">
                        <div class="signup_group">
                            <label for="allow_freeze" class="input_label">Allow Freezing?<span class="required">*</span></label>
                            <select name="allow_freeze" id="allow_freeze" class="input_text input_select">
                                    <option value="">Allow Freezing?</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="catalog_row signup_row">
                    <div class="col2">
                        <div class="signup_group">
                            <label for="quantity" class="input_label">Quantity<span class="required">*</span></label>
                            <input type="number" class="input_text" name="quantity" id="quantity" placeholder="Quantity" pattern="\d*" step="1"onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" >
                        </div>
                    </div>
                    <div class="col2">
                        <div class="signup_group">
                            <label for="unit_type" class="input_label">Units</label>
                            <input type="text" class="input_text" name="unit_type" id="unit_type" placeholder="Units">
                        </div>
                    </div>
                </div>
                <div class="catalog_row signup_row">
                    <div class="col2">
                        <div class="signup_group">
                            <label for="brand" class="input_label">Brand (Optional, but Highly Recommended)</label>
                            <input type="text" class="input_text" name="brand" id="brand" placeholder="Brand">
                        </div>
                    </div>
                    <div class="col2">
                        <div class="signup_group">
                            <label for="condition" class="input_label">Condition</label>
                            <select class="input_text input_select" name="condition" id="condition">
                                <option value="New">New</option>
                                <option value="Used">Used</option>
                                <option value="Not Specified" selected>Not Specified</option>
                            </select>
                        </div>
                    </div>
                </div>


                <h4 class="sign_heading"><span>Shipping Details</span></h4>
                <span class="center lot_optional_label">(Optional, but Recommended)</span>
                <div class="catalog_row signup_row">
                    <div class="col2">
                        <div class="signup_group">
                            <label for="size" class="input_label">Size</label>
                            <input type="text" class="input_text" name="size" id="size" placeholder="Size">
                        </div>
                    </div>
                    <div class="col2">
                        <div class="signup_group">
                            <label for="weight" class="input_label">Weight</label>
                            <input type="text" class="input_text" name="weight" id="weight" placeholder="Weight">
                        </div>
                    </div>
                </div>
                
                <h4 class="sign_heading"><span>Internal Notes</span></h4>
                <div class="catalog_row signup_row">
                    <div class="col1">
                        <div class="signup_group">
                            <label for="internal_notes" class="input_label">List your internal notes for this lot</label>
                            <textarea class="input_text" name="internal_notes" id="internal_notes" rows="3" placeholder="Internal Notes"></textarea>
                        </div>
                    </div>
                </div>
                
                <h4 class="sign_heading"><span>Search Optimiztion - Tags</span></h4>
                <div class="catalog_row signup_row">
                    <div class="col1">
                        <label for="tags" class="input_label active">Select Tags for Search - Press either the `enter`, 'tab', or the 'comma' key after each tag (Optional, but Highly Recommended)</label>
                        <input type="hidden" name="tags" id="tags" value="">
                        <div class="chips_input"></div>
                    </div>
                </div>
                
                <input type="hidden" name="lot_description_helper" id="lot_description_helper">
                <input type="hidden" name="internal_notes_helper" id="internal_notes_helper">

                <input type="hidden" name="lot_update_check" id="lot_update_check" value="<?php echo $lot_id; ?>">
                
                <div class="catalog_row signup_row">
                    <p class="saving_lot_disclaimer">Your lot is being updated. Please wait.</p>
                    <a  type="submit" class="fancy-submit fancy-button bg-gradient1 cursor_pointer" style="margin:auto;" href="#" id="update_lot_submit" disabled><span>Update Lot</span></a>
                </div>
            </form>
        </section>
    </form>

<?php include "../includes/footer.php"; ?>
<!-- <script src="../js/tags/tags.js"></script> -->

<!-- <script src="../js/tags/jquery.caret.min.js"></script>
<script src="../js/tags/jquery.tag-editor.js"></script> -->

<!-- <script src="../js/tags/selectize.js"></script> -->

<!-- <script src="../js/tags/tagify.js"></script> -->
<script src="../js/tags/materialize.js"></script>



<script>
    // php tag array to javascript array
    var all_my_tags = <?php echo json_encode($lot_tags_arr); ?>;
    all_my_tags = all_my_tags[0];
    var tag_arr = all_my_tags.split("??||&&");

    var chip_holder = [];
    for(var t=0; t<tag_arr.length; t++){

        var tg = tag_arr[t];

        if(tg == "" || tg == "??||&&"){
            continue;
        }
        item = {}
        item ["tag"] = tg;

        chip_holder.push(item);
    }
    $("#tags").val(all_my_tags);
    
    
    $('.chips_input').chips({
        placeholder: 'Enter a tag',
        secondaryPlaceholder: '+Tag',
        
        data: chip_holder,

        onChipAdd: function () {
            val = this.chipsData;
            paintChips(val);
        },
        onChipDelete: function() {
            val = this.chipsData;
            paintChips(val);
        }
    });
    
    function paintChips(arr){
        var output = "";

        for(var i=0; i<arr.length; i++){
            var chinfo = arr[i]['tag'];
            if(chinfo == "??||&&"){
                continue;
            }
            var sect = chinfo + "??||&&";
            output = output + sect;
        }

        $("#tags").val(output);
    }
</script>


<script>
</script>
<script>


    // get javascript variables
    var lot_name = "<?php echo $lot_name; ?>";
    var lot_description = `<?php echo $lot_description; ?>`;

    var starting_bid = "<?php echo $starting_bid; ?>";
    var increment_type = "<?php echo $increment_type; ?>";
    var bid_increment = "<?php echo $bid_increment; ?>";
    
    var category1 = "<?php echo $category1; ?>";
    var category2 = "<?php echo $category2; ?>";
    var category3 = "<?php echo $category3; ?>";
    var category4 = "<?php echo $category4; ?>";
    var other_category = "<?php echo $other_category; ?>";

    var lot_location = "<?php echo $lot_location; ?>";

    var featured_lot = "<?php echo $featured_lot; ?>";
    var allow_freeze = "<?php echo $allow_freeze; ?>";

    var quantity = "<?php echo $quantity; ?>";
    var units = "<?php echo $units; ?>";
    var brand = "<?php echo $brand; ?>";
    var lot_condition = "<?php echo $lot_condition; ?>";
    var size = "<?php echo $size; ?>";
    var weight = "<?php echo $weight; ?>";

    var internal_notes = `<?php echo $internal_notes; ?>`;


    var reserve_amount = "<?php echo $reserve_amount; ?>";


    // populate fields with existing data
    $("#lot_name").val(lot_name);
    $("#lot_description").val(lot_description);
    
    $("#starting_bid").val(starting_bid);
    $("#bid_increment_type").val(increment_type);
    $("#bid_increment").val(bid_increment);
    $("#starting_bid_increment").val(bid_increment);

    // $.post("categories/category1.php",{
    //         id: chosen_id,
    //         name: chosen_name
    //     },
    //     function(data,status){
    //     }
    // );

    $("#category_tier1").val(category1);
    $("#category_tier2");
    $("#category_tier3");
    $("#category_tier4");
    $("#category_other");

    if(category2 != ""){
        $("#category_tier2_holder").css("display", "inline-block");
        $("#category_tier2").val(category2);
    }
    else{
        $("#category_tier2_holder").css("display", "none");
        $("#category_tier3_holder").css("display", "none");
        $("#category_tier4_holder").css("display", "none");
    }

    if(category3 != ""){
        $("#category_tier3_holder").css("display", "inline-block");
        $("#category_tier3").val(category3);
    }
    else{
        $("#category_tier3_holder").css("display", "none");
        $("#category_tier4_holder").css("display", "none");
    }

    if(category4 != ""){
        $("#category_tier4_holder").css("display", "inline-block");
        $("#category_tier4").val(category4);
    }
    else{
        $("#category_tier4_holder").css("display", "none");
    }

    <?php if($other_option) : ?>
        $("#category_other_holder").css('display', 'inline-block');
        $("#category_other").val(other_category);
    <?php endif ; ?>

    $("#lot_location").val(lot_location);

    $("#featured_lot").val(featured_lot);
    $("#allow_freeze").val(allow_freeze);

    $("#quantity").val(quantity);
    $("#unit_type").val(units);
    $("#brand").val(brand);
    $("#condition").val(lot_condition);
    $("#size").val(size);
    $("#weight").val(weight);

    
    $("#internal_notes").val(internal_notes);
</script>

<script>
    $(document).ready(function(){
        $("div.amsify-suggestags-input-area").addClass( "textarea_duplicate" );
        
        if(reserve_amount == 0 || reserve_amount == "0"){
            $("#reserve_amount_container").css('display', "none");
            $("#reserve_option").val("no");
            $("#reserve_amount").val("");
        }
        else{
            $("#reserve_amount_container").css('display', "block");
            $("#reserve_option").val("yes");
            $("#reserve_amount").val(reserve_amount);
        }

        var lot_loc = $("#lot_location").val();
        if(lot_loc == null){
            $("#lot_location").css("background-color", "lightpink");
            $("#lot_location").focus();
            alert("Please choose a the location of this lot from the list");
        }

        $("select").change(function () {
            $(this).css("background-color", "whitesmoke");
        });
    });
    
    // allow reserve option - show reserve amount
    $("#reserve_option").change(function(){
        var reserve_option = $(this).val();

        if(reserve_option == "yes"){
            $("#reserve_amount_container").css("display", "block");
        }
        else{
            $("#reserve_amount_container").css("display", "none");
        }
    });


    $("select.category_select").change(function () {
        $("#category_other").val("");
    });


    // Start with static incrementation
    $("#static_incrementation").css("display", "inline-block");

    // Progressive / static incrementation
    $( "#bid_increment_type" ).change(function() {
        $("#static_incrementation, #progressive_incrementation").css('display', 'none');
        var inc_type = $(this).val();
        if(inc_type == "static"){
            $("#static_incrementation").css("display", "inline-block");
        }
        else if(inc_type == "progressive"){
            $("#progressive_incrementation").css("display", "inline-block");
        }
    });

    // other category visible?
    var other_cat = "<?php echo $other_category; ?>";
    if(other_cat == ""){
        $("#category_other_holder").css("display", "none");
    }
    else{
        $("#category_other").val(other_category);
        $("#category_other_holder").css("display", "block");
    }

    // Category List Propogation
    // Category Tier 1
    $("#category_tier1").change(function(){   
        start_loader();
        // "#category_tier2_holder, #category_tier3_holder, #category_tier4_holder, #category_other_holder"

        var chosen_id = $(this).val();
        var chosen_name = $(this).find('option:selected').attr("name");

        if(chosen_id == ""){
            $("#category_other_holder").css("display", "none");
            $("#category_tier2_holder").css("display", "none");
            $("#category_tier3_holder").css("display", "none");
            $("#category_tier4_holder").css("display", "none");
            return;
        }
        else if(chosen_id == 0 || chosen_id == "0"){
            $("#category_other_holder").css("display", "inline-block");
            $("#category_tier2_holder").css("display", "none");
            $("#category_tier3_holder").css("display", "none");
            $("#category_tier4_holder").css("display", "none");
            end_loader();
            return;
        }
        $.post("categories/category1.php",{
            id: chosen_id,
            name: chosen_name
        },
        function(data,status){
            if(data == -1 || data == "-1"){
                $("#category_tier2_holder, #category_tier3_holder, #category_tier4_holder, #category_other_holder").css("display", "none");
                end_loader();
                return;
            }
            $("#category_tier2_holder, #category_tier3_holder, #category_tier4_holder, #category_other_holder").css("display", "none");

            $("#category_tier2_holder select option").each(function(){
                var nm = $(this).attr("name");
                if(nm != "select"){
                    $(this).remove();
                }
            });
            
            $("#category_tier3_holder select option").each(function(){
                var nm = $(this).attr("name");
                if(nm != "select"){
                    $(this).remove();
                }
            });
            
            $("#category_tier4_holder select option").each(function(){
                var nm = $(this).attr("name");
                if(nm != "select"){
                    $(this).remove();
                }
            });

            $("#category_tier2_holder").find("select").append(data);
            $("#category_tier2_holder").css("display", "inline-block");

            end_loader();
        });
    });

    // Category Tier 2
    $("#category_tier2").change(function(){
        start_loader();

        var chosen_id = $(this).val();
        var chosen_name = $(this).find('option:selected').attr("name");

        if(chosen_id == ""){
            $("#category_other_holder").css("display", "none");
            $("#category_tier3_holder").css("display", "none");
            $("#category_tier4_holder").css("display", "none");
            return;
        }
        else if(chosen_id == 0 || chosen_id == "0"){
            $("#category_other_holder").css("display", "inline-block");
            $("#category_tier3_holder").css("display", "none");
            $("#category_tier4_holder").css("display", "none");

            end_loader();
            return;
        }
        $.post("categories/category2.php",{
            id: chosen_id,
            name: chosen_name
        },
        function(data,status){
            if(data == -1 || data == "-1"){
                $("#category_tier3_holder, #category_tier4_holder, #category_other_holder").css("display", "none");
                end_loader();
                return;
            }
            $("#category_tier3_holder, #category_tier4_holder, #category_other_holder").css("display", "none");
            
            $("#category_tier3_holder select option").each(function(){
                var nm = $(this).attr("name");
                if(nm != "select"){
                    $(this).remove();
                }
            });
            
            $("#category_tier4_holder select option").each(function(){
                var nm = $(this).attr("name");
                if(nm != "select"){
                    $(this).remove();
                }
            });

            $("#category_tier3_holder").find("select").append(data);
            $("#category_tier3_holder").css("display", "inline-block");

            end_loader();
        });
    });

    // Category Tier 3
    $("#category_tier3").change(function(){
        start_loader();

        var chosen_id = $(this).val();
        var chosen_name = $(this).find('option:selected').attr("name");

        if(chosen_id == ""){
            $("#category_other_holder").css("display", "none");
            $("#category_tier4_holder").css("display", "none");
            return;
        }
        else if(chosen_id == 0 || chosen_id == "0"){
            $("#category_other_holder").css("display", "inline-block");
            $("#category_tier4_holder").css("display", "none");
            end_loader();
            return;
        }
        $.post("categories/category3.php",{
            id: chosen_id,
            name: chosen_name
        },
        function(data,status){
            if(data == -1 || data == "-1"){
                $("#category_tier4_holder, #category_other_holder").css("display", "none");
                end_loader();
                return;
            }
            $("#category_tier4_holder, #category_other_holder").css("display", "none");
            
            $("#category_tier4_holder select option").each(function(){
                var nm = $(this).attr("name");
                if(nm != "select"){
                    $(this).remove();
                }
            });

            $("#category_tier4_holder").find("select").append(data);
            $("#category_tier4_holder").css("display", "inline-block");

            end_loader();
        });
    });
    
    // category tier 4
    $("#category_tier4").change(function(){
        var chosen_id = $(this).val();
        if(chosen_id == ""){
            $("#category_other_holder").css("display", "none");
            return;
        }
        else if(chosen_id == 0 || chosen_id == "0"){
            $("#category_other_holder").css("display", "inline-block");

            end_loader();
            return;
        }
        else{
            $("#category_other_holder").css("display", "none");
        }
    });


    function start_loader(){
        $("#loader_outer").css("display", "block");
    }

    function end_loader(){
        $("#loader_outer").css("display", "none");
    }

</script>
<script src="js/lot_update.js"></script>
<!-- Handle WYSIWYG -->
<script>
CKEDITOR.replace('lot_description');
CKEDITOR.replace('internal_notes');
</script>