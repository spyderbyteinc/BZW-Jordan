<div id="advanced_search_modal_container" class="modal_bg">

    <div id="advanced_search_modal" class="modal">
        
        <h2 class="auctions section_heading"><span>Advanced Search</span></h2>

        <div class="catalog_row signup_row">
            <div class="col1">
                <div class="signup_group">
                    <label for="keywords" class="input_label">Keyword(s) - Comma Separated</label>
                    <input type="text" class="input_text" name="keywords" id="keywords" placeholder="Keyword(s) - Comma Separated">
                </div>
            </div>
        </div>
        
        <div class="catalog_row signup_row">
            <div class="col2">
                <div class="signup_group">
                    <label for="auction_date" class="input_label">Auction Date</label>
                    <input type="text" class="input_text" name="auction_date" id="auction_date" placeholder="Auction Date">
                </div>
            </div>
            <div class="col2">
                <div class="signup_group">
                    <label for="auction_type" class="input_label">Auction Type</label>
                    <select class="input_text input_select" name="auction_type" id="auction_type">
                        <option value="timed" selected>Timed</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="catalog_row signup_row">
            <div class="col2">
                <div class="signup_group">
                    <label for="zipcode_distance" class="input_label">Distance From ZipCode</label>
                    <div class="zipcode_distance_container">
                        <input type="text" class="input_text" name="zipcode_distance" id="zipcode_distance" placeholder="Zipcode" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        <input type="text" class="input_text" name="zipcode_miles" id="zipcode_miles" placeholder="Miles" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                    </div>
                </div>
            </div>
            <div class="col2">
                <div class="signup_group">
                    <label for="catalog_status" class="input_label">Catalog Status</label>
                    <select class="input_text input_select" name="catalog_status" id="catalog_status" >
                        <option value="all">All</option>
                        <option value="open" selected>Open</option>
                        <option value="closed">Closed</option>
                        <option value="published">Published</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="catalog_row signup_row">
            <div class="col2">
                <div class="signup_group">
                    <label for="category_tier1" class="input_label">Category - Tier 1</label>
                    <select class="input_text input_select" name="category_tier1" id="category_tier1" >
                        <option value="">Select Category</option>
                        <?php
                            $cat1_sql = "SELECT * FROM `cat_tier1`";
                            $cat1_result = mysqli_query($conn, $cat1_sql);
                            
                            while($cat1_row = mysqli_fetch_assoc($cat1_result)){
                                $cat1_id = $cat1_row['id'];
                                $cat1_name = $cat1_row['name'];

                                ?>
                                
                                <option value="<?php echo $cat1_id; ?>"><?php echo $cat1_name; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col2 dis_on_load">
                <div class="signup_group">
                    <label for="category_tier2" class="input_label">Category - Tier 2</label>
                    <select class="input_text input_select" name="category_tier2" id="category_tier2" >
                        <option value="">Select Category</option>
                        <option value="1">Location 1</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="catalog_row signup_row">
            <div class="col2 dis_on_load">
                <div class="signup_group">
                    <label for="category_tier3" class="input_label">Category - Tier 3</label>
                    <select class="input_text input_select" name="category_tier3" id="category_tier3" >
                        <option value="">Select Category</option>
                        <option value="1">Location 1</option>
                    </select>
                </div>
            </div>
            <div class="col2 dis_on_load">
                <div class="signup_group">
                    <label for="category_tier4" class="input_label">Category - Tier 4</label>
                    <select class="input_text input_select" name="category_tier4" id="category_tier4" >
                        <option value="">Select Category</option>
                        <option value="1">Location 1</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="action_buttons">
            <a href="#" class="bidzbutton"><i class="fas fa-search"></i> Search</a>
            <a href="#" class="bidzbutton orange" id="close_advanced_search">Cancel</a>
            <a href="#" class="bidzbutton red" id="reset_advanced_search"><i class="fas fa-undo-alt"></i> Reset Form</a>
        </div>
    </div>
</div>

<script src="<?php echo $root; ?>js/jquery.js"></script>
<script src="<?php echo $root; ?>js/jquery_ui.js"></script>


<!-- Basic Functionality -->
<script>
    $(document).ready(function(){
       
        var d = new Date();
        var y = d.getFullYear();
        var r = y + 3;

        var range = "-80:" + r;

        $("#auction_date").datepicker({
            changeYear: true,
            changeMonth: true,
            yearRange: range,
            onSelect: function (dateText) {
            }
        });

        
        var category_tier1 = $("#category_tier1");
    
        var category_tier2 = $("#category_tier2");
        var category_tier2_label = category_tier2.parent().parent();

        var category_tier3 = $("#category_tier3");
        var category_tier3_label = category_tier3.parent().parent();

        var category_tier4 = $("#category_tier4");
        var category_tier4_label = category_tier4.parent().parent();

        function drawChildren(number, children){
            var blank_option = `
                <option value="">Select Category</option>
            `;

            var select = "#category_tier" + number;
            $(select).empty();

            $(select).append(blank_option);

            for(var o = 0; o<children.length; o++){
                var current = children[o];

                var id = current.id;
                var name = current.name;
                
                var option = `
                    <option value="${id}">${name}</option>
                `;

                $(select).append(option);
            }
        }

        function findChildrenFromTree(category, value){
            
            for(var c = 0; c < category.length; c++){
                var current = category[c];
                var id = current.id;
                
                var children = current.children;

                if(value == id){
                    return children;
                }
            }
        }
        category_tier3.change(function(e){
            e.preventDefault();

            var sel3 = $(this).val();
            
            var children = findChildrenFromTree(category3, sel3);

            
            category_tier4.val("");
            category_tier4.css("display", "none");
            category_tier4_label.css("display", "none");
            
            console.log(children);

            if(sel3 != "" && children.length != 0){
                category_tier4.css("display","block");
                category_tier4_label.css("display", "block");
                
                drawChildren("4", children);
            }
        });
        category_tier2.change(function(e){
            e.preventDefault();

            var sel2 = $(this).val();

            var children = findChildrenFromTree(category2, sel2);

            
            category_tier3.val("");
            category_tier3.css("display", "none");
            category_tier3_label.css("display", "none");

            category_tier4.val("");
            category_tier4.css("display", "none");
            category_tier4_label.css("display", "none");
            
            console.log(children);

            if(sel2 != "" && children.length != 0){
                category_tier3.css("display","block");
                category_tier3_label.css("display", "block");
                
                drawChildren("3", children);
            }
            

        });
        category_tier1.change(function(e){
            e.preventDefault();

            var sel1 = $(this).val();

            var children = findChildrenFromTree(category1, sel1);


            category_tier2.val("");
            category_tier2.css("display","none");
            category_tier2_label.css("display", "none");

            category_tier3.val("");
            category_tier3.css("display", "none");
            category_tier3_label.css("display", "none");

            category_tier4.val("");
            category_tier4.css("display", "none");
            category_tier4_label.css("display", "none");
            
            console.log(children);
            if(sel1 != "" && children.length != 0){
                category_tier2.css("display","block");
                category_tier2_label.css("display", "block");

                drawChildren("2", children);
            }

        });
    })
</script>

<!-- Get categories tree -->
<?php

    class Category{
        public $id = "";
        public $name = "";
        public $parent = "";
        public $children = "";
    }

    $category1 = array();
    $category1_sql = "SELECT * FROM `cat_tier1`";
    $category1_result = mysqli_query($conn, $category1_sql);
    while($category1_row = mysqli_fetch_assoc($category1_result)){
        
        $temp = new Category();
        $temp->id = $category1_row['id'];
        $temp->name = $category1_row['name'];
        $temp->parent = 0;
        $temp->children = array();

        array_push($category1, $temp);
    }

    $category2 = array();
    $category2_sql = "SELECT * FROM `cat_tier2`";
    $category2_result = mysqli_query($conn, $category2_sql);
    while($category2_row = mysqli_fetch_assoc($category2_result)){
        
        $temp = new Category();
        $temp->id = $category2_row['id'];
        $temp->name = $category2_row['name'];
        $temp->parent = $category2_row['parent'];
        $temp->children = array();

        array_push($category2, $temp);
    }

    $category3 = array();
    $category3_sql = "SELECT * FROM `cat_tier3`";
    $category3_result = mysqli_query($conn, $category3_sql);
    while($category3_row = mysqli_fetch_assoc($category3_result)){
        
        $temp = new Category();
        $temp->id = $category3_row['id'];
        $temp->name = $category3_row['name'];
        $temp->parent = $category3_row['parent'];
        $temp->children = array();

        array_push($category3, $temp);
    }

    $category4 = array();
    $category4_sql = "SELECT * FROM `cat_tier4`";
    $category4_result = mysqli_query($conn, $category4_sql);
    while($category4_row = mysqli_fetch_assoc($category4_result)){
        
        $temp = new Category();
        $temp->id = $category4_row['id'];
        $temp->name = $category4_row['name'];
        $temp->parent = $category4_row['parent'];
        $temp->children = array();


        array_push($category4, $temp);
    }

    $category1 = json_encode($category1);
    $category2 = json_encode($category2);
    $category3 = json_encode($category3);
    $category4 = json_encode($category4);
?>
<script>
    // category constructior
    function Category(id, name, parent) {
        this.id = id;
        this.name = name;
        this.parent = parent;
    }
    var category1 = JSON.parse('<?php echo $category1; ?>');
    var category2 = JSON.parse('<?php echo $category2; ?>');
    var category3 = JSON.parse('<?php echo $category3; ?>');
    var category4 = JSON.parse('<?php echo $category4; ?>');

    // append 4th tier to category3 array
    for(var i = 0; i < category4.length; i++){
        var temp = category4[i];
        var parent = temp.parent;
        var name = temp.name;

        // loop through category3 and get children
        for(var j = 0; j < category3.length; j++){
            var cat3 = category3[j];
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
    for(var i =0; i < category3.length; i++){
        var temp = category3[i];
        var parent = temp.parent;
        var name = temp.name;

        // loop through category2 and get children
        for(var j=0; j<category2.length; j++){
            var cat2 = category2[j];
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
    for(var i = 0; i<category2.length; i++){
        var temp = category2[i];
        var parent = temp.parent;
        var name = temp.name;

        // loop through category2 and get children
        for(var j =0; j<category1.length; j++){
            var cat1 = category1[j];
            var category_id = cat1.id;

            if(category_id == parent){
                var arr = cat1.children;
                arr.push(temp);
                cat1.children = arr;
                break;
            }
        }
    }
</script>

<!-- Form clear and close -->
<script>
    // clear out form on load and clear and cancel
    function clearout(){
        var keywords = $("#keywords");
        var auction_date = $("#auction_date");
        var auction_type = $("#auction_type");
        var zipcode_distance = $("#zipcode_distance");
        var zipcode_miles= $("#zipcode_miles");
        var catalog_status = $("#catalog_status");
        var category_tier1 = $("#category_tier1");
        var category_tier2 = $("#category_tier2");
        var category_tier3 = $("#category_tier3");
        var category_tier4 = $("#category_tier4");

        keywords.val("");
        auction_date.val("");
        auction_type.val("timed");
        zipcode_distance.val("");
        zipcode_miles.val("");
        catalog_status.val("open");
        category_tier1.val("");
        category_tier2.val("");
        category_tier3.val("");
        category_tier4.val("");

        $( ".dis_on_load" ).each(function() {
            $( this ).css("display", "none");
        });
    }
    clearout();
    $("#reset_advanced_search").click(function(e){
        e.preventDefault();

        clearout();
    });
    $("#close_advanced_search").click(function(e){
        e.preventDefault();

        clearout();
        $("#advanced_search_modal_container").css("display", "none");
    });
</script>