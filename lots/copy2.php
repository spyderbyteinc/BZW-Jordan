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

    // Get catalog and lot id
    $url_cat_id = $_GET['cat_id'];
    $url_lot_id = $_GET['lot_id'];
    $catalog_id = $_POST['form_cat_id'];
    $lot_id = $_POST['form_lot_id'];

    if($url_cat_id != $catalog_id || $url_lot_id != $lot_id){
        $loc = "location: " . $root . "catalogs/manage.php";
        header($loc);
        exit();
    }

    // Get information to copy from modal
    
    $checks = array("name_check", "description_check", "category_check", "starting_bid_check", "bid_increment_type_check", "bid_increment_check", "lot_location_check", "reserve_check", "featured_check", "freezing_check", "quantity_check", "units_check", "brand_check", "condition_check", "size_check", "weight_check", "internal_notes_check", "tags_check");

    $cols = array();

    foreach($checks as $check){
        $curr = str_replace("_check", "", $check);

        if($check == "condition_check"){
            $curr = "lot_condition";
        }
        else if($check == "category_check"){
            $curr = "category";
        }
        else if($check == "bid_increment_type_check"){
            $curr = "increment_type";
        }
        else if($check == "reserve_check"){
            $curr = "reserve_amount";
        }
        else if($check == "featured_check"){
            $curr = "featured_lot";
        }
        else if($check == "freezing_check"){
            $curr = "allow_freeze";
        }

        array_push($cols, $curr);
    }

    $check_assoc = array();

    foreach($checks as $check){
        $curr = $_POST[$check];

        $check_assoc[$check] = $curr;
    };
    
    $values = array();

    // Get lot information from table
    $lot_sql = "SELECT * FROM `lots` WHERE `catalog_id`=$catalog_id AND`id`=$lot_id AND `owner`='$username'";
    $lot_result = mysqli_query($conn, $lot_sql);
    $lot_row = mysqli_fetch_assoc($lot_result);


    $copy_lot_name = $lot_row['name'];

    foreach($cols as $col){
        $curr = $lot_row[$col];

        $values[$col] = $curr;
    }


    $check_keys = array_keys($check_assoc);
    $value_keys = array_keys($values);

    for($k = 0; $k<count($check_keys); $k++){
        $chk_key = $check_keys[$k];
        $val_key = $value_keys[$k];

        $chk_val = $check_assoc[$chk_key];
        $val_val = $values[$val_key];

        if($chk_val == "0" || $chk_val == 0){
            $values[$val_key] = "";
        }
    }

    if($check_assoc['category_check'] == 1 || $check_assoc['category_check'] == "1"){
        // $category1 = $lot_row['category1'];
        // $category2 = $lot_row['category2'];
        // $category3 = $lot_row['category3'];
        // $category4 = $lot_row['category4'];
        $other_category = $lot_row['other_category'];

        echo $other_category;
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
        /* line-height: 40px; */
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
    <h2 class="house_heading section_heading"><span>Copy Lot: <?php echo $copy_lot_name; ?></span></h2>
</div>
    <div class="cancel_button_container">
        <a href="<?php echo $root; ?>lots/manage.php?cat_id=<?php echo $catalog_id; ?>" class="bidzbutton orange cancel_creation">Cancel Lot Creation <i class="fas fa-arrow-right"></i></a>
        
    </div>


        <section class="catalog_create">
            <h4 class="sign_heading"><span>Basic Lot Information</span></h4>


            <form action="<?php echo $root; ?>processes/process_lot_creation.php" method="post" name="lot_creation_form" id="lot_creation_form" >
                <div class="catalog_row signup_row">
                    <div class="col1">
                        <div class="signup_group">
                            <label for="lot_name" class="input_label">Lot Name<span class="required">*</span></label>
                            <input type="text" class="input_text" name="lot_name" id="lot_name" placeholder="Lot Name">
                        </div>
                    </div>
                </div>

                
                <input type="hidden" name="lot_description_helper" id="lot_description_helper">
                <input type="hidden" name="internal_notes_helper" id="internal_notes_helper">
                
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
                            <input type="text" class="input_text" name="condition" id="condition" placeholder="Condition">
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
                

                <input type="hidden" name="lot_creation_check" id="lot_creation_check" value="1">
                <div class="catalog_row signup_row">
                    <p class="saving_lot_disclaimer">Your lot is being created. Please wait.</p>
                    <a  type="submit" class="fancy-submit fancy-button bg-gradient1 cursor_pointer" style="margin:auto;" href="javascript: validate_lot_creation();" id="create_lot_submit" disabled><span>Create Lot</span></a>
                </div>
            </form>
        </section>
    </form>

<?php include "../includes/footer.php"; ?>

    <script src="../js/tags/materialize.js"></script>

 <?php 
    include "category_grab.php";

    $category1 = getCategoryOne();
    $category2 = getCategoryTwo();
    $category3 = getCategoryThree();
    $category4 = getCategoryFour();
?>

<!-- <script>

    var category_1 = '<?php echo $category1; ?>';
    var category_2 = '<?php echo $category2; ?>';
    var category_3 = '<?php echo $category3; ?>';
    var category_4 = '<?php echo $category4; ?>';

    category_1 = JSON.parse(category_1);
    category_2 = JSON.parse(category_2);
    category_3 = JSON.parse(category_3);
    category_4 = JSON.parse(category_4);

    // append 4th tier to category3 array
    for(var i = 0; i < category_4.length; i++){
        var temp = category_4[i];
        var parent = temp.parent;
        var name = temp.name;

        // loop through category3 and get children
        for(var j = 0; j < category_3.length; j++){
            var cat3 = category_3[j];
            var category_id = cat3.id;

            if(category_id == parent){
                var arr = cat3.children;
                arr.push(temp);
                cat3.children = arr;
                break;
            }
        }
    }
    
    // append 3rd tier to category2 array
    for(var i =0; i < category_3.length; i++){
        var temp = category_3[i];
        var parent = temp.parent;
        var name = temp.name;

        // loop through category2 and get children
        for(var j=0; j<category_2.length; j++){
            var cat2 = category_2[j];
            var category_id = cat2.id;

            if(category_id == parent){
                var arr = cat2.children;
                arr.push(temp);
                cat2.children = arr;
                break;
            }
        }
    }

    // append 2nd tier to category1 array
    for(var i = 0; i<category_2.length; i++){
        var temp = category_2[i];
        var parent = temp.parent;
        var name = temp.name;

        // loop through category2 and get children
        for(var j =0; j<category_1.length; j++){
            var cat1 = category_1[j];
            var category_id = cat1.id;

            if(category_id == parent){
                var arr = cat1.children;
                arr.push(temp);
                cat1.children = arr;
                break;
            }
        }
    }

    // category setup variables
    var select_option_blank = `<option class="select" name="select" value="">Select Category</option>`;
    var select_option_other = `<option value="0">Other</option>`;

    var category1_select = $("#category_tier1");
    var category2_select = $("#category_tier2");
    var category3_select = $("#category_tier3");
    var category4_select = $("#category_tier4");
    var category_other = $("#category_other");


    var category2_holder = $("#category_tier2_holder");
    var category3_holder = $("#category_tier3_holder");
    var category4_holder = $("#category_tier4_holder");
    var categoryOther_holder = $("#category_other_holder");

    category1_select.empty();
    category2_select.empty();
    category3_select.empty();
    category4_select.empty();
    
    category1_select.append(select_option_blank);
    category2_select.append(select_option_blank);
    category3_select.append(select_option_blank);
    category4_select.append(select_option_blank);

    var category_input = $("#category_value");

    function clear_and_hide_holders(tier){
        category_other.val("");

        if(tier == 1){
            category2_holder.hide();
            category3_holder.hide();
            category4_holder.hide();

            category2_select.val("");
            category3_select.val("");
            category4_select.val("");
        }
        else if(tier == 2){
            category3_holder.hide();
            category4_holder.hide();

            category3_select.val("");
            category4_select.val("");
        }
        else if(tier == 3){
            category4_holder.hide();

            category4_select.val("");
        }
    }

    // setup category 1 select options
    for(var c = 0; c<category_1.length; c++) {
        var temp = category_1[c];

        var id = temp.id;
        var name = temp.name;

        var option = `<option value="${id}" name="${id}">${name}</option>`;
        category1_select.append(option);
    }
    category1_select.append(select_option_other);


    // changing select option handlers
    $("#category_tier1").change(function(){

        clear_and_hide_holders(1);
        var chosen_id = $(this).val();

        if(chosen_id == 0){
            var previous = 0
            
            category_input.val(previous);

            categoryOther_holder.show();

            clear_and_hide_holders(1);

            return;
        }
        else{
            categoryOther_holder.hide();
        }
        
        category2_holder.show();

        category2_select.empty();
        category2_select.append(select_option_blank);

        var count = 0;
        // get all tier2 categories that has id as parent
        for(var i=0; i<category_2.length; i++){
            var curr = category_2[i];
            var curr_id = curr.id;
            var parent = curr.parent;
            var name = curr.name;

            if(chosen_id == parent){
                count++;
                // add to tier2 category select
                var option_name = chosen_id + "-" + curr_id;

                var option = `<option value="${curr_id}" name="${option_name}">${name}</option>`;
                category2_select.append(option);
            }
        }
        if(count > 0){
            category2_select.append(select_option_other);

            category_input.val(-1);
        }
        else if(count == 0){
            var seq = $(this).find('option:selected').attr("name");
            
            category_input.val(seq);

            category2_select.val("");
            category3_select.val("");
            category4_select.val("");
            category2_holder.hide();
            category3_holder.hide();
            category4_holder.hide();
        }

    });

    $("#category_tier2").change(function(){

        var chosen_id = $(this).val();
        var old_name = $("#category_tier2").find('option:selected').attr("name");

        clear_and_hide_holders(2);

        if(chosen_id == 0){
            var previous = $("#category_tier1").find('option:selected').attr("name") + "-" + 0;

            category_input.val(previous);

            categoryOther_holder.show();
            clear_and_hide_holders(2);
            return;
        }
        else{
            categoryOther_holder.hide();
        }

        category3_holder.show();

        category3_select.empty();
        category3_select.append(select_option_blank);

        var count = 0;
        // get all tier3 categories that has id as parent
        for(var i=0; i<category_3.length; i++){
            var curr = category_3[i];
            var curr_id = curr.id;
            var parent = curr.parent;
            var name = curr.name;

            if(chosen_id == parent){
                count++;
                // add to tier3 category select
                var option_name = old_name + "-" + curr_id;

                var option = `<option value="${curr_id}" name="${option_name}">${name}</option>`;
                category3_select.append(option);
            }
        }
        
        if(count > 0){
            category3_select.append(select_option_other);
            category_input.val(-1);
        }
        else if(count == 0){
            var seq = $(this).find('option:selected').attr("name");
            category_input.val(seq);
            
            category3_select.val("");
            category4_select.val("");
            category3_holder.hide();
            category4_holder.hide();
        }
    });

    $("#category_tier3").change(function() {

        var chosen_id = $(this).val();
        var old_name = $("#category_tier3").find('option:selected').attr("name");

        var count = 0;

        clear_and_hide_holders(3);

        if(chosen_id == 0){
            var previous = $("#category_tier2").find('option:selected').attr("name") + "-0";

            category_input.val(previous);

            categoryOther_holder.show();
            clear_and_hide_holders(3);

            return;
        }
        else{
            categoryOther_holder.hide();
        }

        category4_holder.show();

        category4_select.empty();
        category4_select.append(select_option_blank);

        // get all tier4 categories that has id as parent
        for(var i=0; i<category_4.length; i++){
            var curr = category_4[i];
            var curr_id = curr.id;
            var parent = curr.parent;
            var name = curr.name;

            if(chosen_id == parent){
                count++;
                // add to tier4 category select
                var option_name = old_name + "-" + curr.id;
                var option = `<option value="${curr_id}" name="${option_name}">${name}</option>`;
                category4_select.append(option);
            }
        }
        if(count > 0){
            category4_select.append(select_option_other);
            category_input.val(-1);
        }
        else if(count == 0){
            var seq = $(this).find('option:selected').attr("name");
            category_input.val(seq);
            
            category4_select.val("");
            category4_holder.hide();
        }

    });

    $("#category_tier4").change(function(){

        var chosen_id = $(this).val();

        if(chosen_id == 0){
            var previous = $("#category_tier3").find('option:selected').attr("name") + "-0";

            category_input.val(previous);

            categoryOther_holder.show();
            
            return;
        }
        else{ 
            var seq = $(this).find('option:selected').attr("name");
            
            category_input.val(seq);
            
            categoryOther_holder.hide();
        }
    });
</script> -->

<script>

    
    var lot_name = "<?php echo $values['name']; ?>";
    // var lot_description = `<?php echo $values['description']; ?>`;

    var starting_bid = "<?php echo $values['starting_bid']; ?>";
    var increment_type = "<?php echo $values['increment_type']; ?>";
    var bid_increment = "<?php echo $values['bid_increment']; ?>";

    var lot_location = "<?php echo $values['lot_location']; ?>";

    var reserve_amount = "<?php echo $values['reserve_amount']; ?>";
    var featured_lot = "<?php echo $values['featured_lot']; ?>";
    var allow_freeze = "<?php echo $values['allow_freeze']; ?>";

    var quantity = "<?php echo $values['quantity']; ?>";
    var units = "<?php echo $values['units']; ?>";
    var brand = "<?php echo $values['brand']; ?>";
    var lot_condition = "<?php echo $values['lot_condition']; ?>";
    var size = "<?php echo $values['size']; ?>";
    var weight = "<?php echo $values['weight']; ?>";
    
    var internal_notes = `<?php echo $values['internal_notes']; ?>`;

    var tags = "<?php echo $values['tags']; ?>";

    // populate fields with existing data
    $("#lot_name").val(lot_name);
    // $("#lot_description").val(lot_description);
    
    $("#starting_bid").val(starting_bid);
    $("#bid_increment_type").val(increment_type);
    $("#bid_increment").val(bid_increment);
    $("#starting_bid_increment").val(bid_increment);

    
    $("#lot_location").val(lot_location);

    $("#featured_lot").val(featured_lot);
    $("#allow_freeze").val(allow_freeze);

    if(reserve_amount == "0" || reserve_amount == 0){
        $("#reserve_amount_container").hide();
        $("#reserve_amount").val("");
        $("#reserve_option").val("no");
    }
    else{
        $("#reserve_amount_container").show();
        $("#reserve_amount").val(reserve_amount);
        $("#reserve_option").val("yes");
    }

    $("#quantity").val(quantity);
    $("#unit_type").val(units);
    $("#brand").val(brand);
    $("#condition").val(lot_condition);
    $("#size").val(size);
    $("#weight").val(weight);

    $("#internal_notes").val(internal_notes);

    
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



    $(document).ready(function(){
        $("div.amsify-suggestags-input-area").addClass( "textarea_duplicate" );


        $("#reserve_amount_container").css("display", "none");

    });

    // Tags
    // // $("#tags").tagsInput();
    // $("#tags").tagEditor({
    //     placeholder: "Enter tags..."
    // // });
    // $('#tags').tagify();

    // Tags

    // php tag array to javascript array
    var all_my_tags = tags;
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

    
    $("select.category_select").change(function () {
        $("#category_other").val("");
    });


    function start_loader(){
        $("#loader_outer").css("display", "block");
    }

    function end_loader(){
        $("#loader_outer").css("display", "none");
    }
</script>
<script src="js/lot_creation.js"></script>
<script>
// CKEDITOR.replace('lot_description');
// CKEDITOR.replace('internal_notes');
</script>