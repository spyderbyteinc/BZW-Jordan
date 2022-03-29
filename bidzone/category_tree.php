<?php include "includes/header.php"; ?>

        <main id="content" class="category_tree">
            <h1 class="page_heading">Category Tree</h1>

            <a href="#" class="bidzbutton add_tier_button" id="add_tier1_button" name="add_tier1">Add Tier 1 Category</a>
            <table class="table1">
                <tr>
                    <th>Category Tier 1</th>
                    <th>Category Tier 2</th>
                    <th>Category Tier 3</th>
                    <th>Category Tier 4</th>
                </tr>
            </table>

        <table class="table2">
    <?php
    
        $tier1_sql = "SELECT * FROM `cat_tier1`";
        $tier1_result = mysqli_query($conn, $tier1_sql);
        while($row1 = mysqli_fetch_assoc($tier1_result)){
            $tier1_id = $row1['id'];
            $tier1_name = $row1['name'];


            $span = '<span class="category_actions"><a class="add_tier" href="#" name="add_tier2_' . $tier1_id . '"><i class="fas fa-plus"></i></a><a class="edit_tier" href="#" name="edit_tier1_' . $tier1_id . '"><i class="fas fa-pen"></i></a></span>';
            ?>

            
            <tr class="red">
                <?php
                echo "<th class='category_heading'><span class='tier_name'>" . $tier1_name . "</span>" . $span . "</th>";
                ?>
                <th></th>
                <th></th>
                <th></th>
            </tr>

            <?php
            
            $tier2_sql = "SELECT * FROM `cat_tier2` WHERE `parent` = $tier1_id";
            $tier2_result = mysqli_query($conn, $tier2_sql);
            while($row2 = mysqli_fetch_assoc($tier2_result)){
                $tier2_id = $row2['id'];
                $tier2_name = $row2['name'];
                
            $span = '<span class="category_actions"><a class="add_tier" href="#" name="add_tier3_' . $tier2_id . '"><i class="fas fa-plus"></i></a><a class="edit_tier" href="#" name="edit_tier2_' . $tier2_id . '"><i class="fas fa-pen"></i></a></span>';
                ?>

                <tr class="green">
                    <td></td>
                    <?php
                        echo "<th class='category_heading'><span class='tier_name'>" . $tier2_name . "</span>" . $span . "</th>";
                    ?>

                    <th></th>
                    <th></th>
                </tr>
                
                <?php

                $tier3_sql = "SELECT * FROM `cat_tier3` WHERE `parent`=$tier2_id";
                $tier3_result = mysqli_query($conn, $tier3_sql);
                while($row3 = mysqli_fetch_assoc($tier3_result)){
                    $tier3_id = $row3['id'];
                    $tier3_name = $row3['name'];

                    $span = '<span class="category_actions"><a class="add_tier" href="#" name="add_tier4_' . $tier3_id . '"><i class="fas fa-plus"></i></a><a class="edit_tier" href="#" name="edit_tier3_' . $tier3_id . '"><i class="fas fa-pen"></i></a></span>';
                    ?>

                        <tr class="blue">
                            <td></td>
                            <td></td>
                            <?php
                                echo "<th class='category_heading'><span class='tier_name'>" . $tier3_name . "</span>" . $span . "</th>";
                            ?>

                            <th></th>
                        </tr>
                    <?php

                    $tier4_sql = "SELECT * FROM `cat_tier4` WHERE `parent`=$tier3_id";
                    $tier4_result = mysqli_query($conn, $tier4_sql);
                    while($row4 = mysqli_fetch_assoc($tier4_result)){
                        $tier4_id = $row4['id'];
                        $tier4_name = $row4['name'];

                        
                        
                            $span = '<span class="category_actions"><a class="edit_tier" href="#" name="edit_tier4_' . $tier4_id . '"><i class="fas fa-pen"></i></a></span>';
                        ?>

                            <tr class="purple">
                                <td></td>
                                <td></td>
                                <td></td>
                                <?php
                                    echo "<th class='category_heading'><span class='tier_name'>" . $tier4_name . "</span>". $span . "</th>";
                                ?>
                            </tr>

                        <?php
                    }
                }
            }
        }
    ?>
        
    </table>
        </main>


<!-- Edit Tier Modal -->
<div id="edit_tier_modal_container" class="modal_bg">
    <div id="edit_tier_modal" class="modal">
        <h3 class="modal_heading">Edit Category Name</h3>

        <label for="category_name" class="category_name">Tier <span id="tier_id">X</span> - Original Category Name: <span class="chocolate" id="tier_original_name">XXX</span></label>
        <input type="text" id="category_name" name="category_name" placeholder="Enter Category Name">

        <div class="category_buttons">
            <a id="save_category" name="" href="#" class="bidzbutton devart">Save</a>
            <a id="cancel_category" href="#" class="bidzbutton orange cancel">Cancel</a>
        </div>
    </div>
</div>

<!-- Add Tier 1 Modal -->
<div id="add_tier1_modal_container" class="modal_bg">
    <div id="add_tier1_modal" class="modal">
        <h3 class="modal_heading">Add Tier 1 Category</h3>

        <label for="tier1_name" class="tier1_name">Tier 1 Name</label>
        <input type="text" name="tier1_name" id="tier1_name" placeholder="Enter Category Name">
        
        <div class="category_buttons">
            <a id="save_tier1" href="#" class="bidzbutton devart">Save</a>
            <a id="cancel_category" href="#" class="bidzbutton orange cancel">Cancel</a>
        </div>
    </div>
</div>
<!-- Add Tier 2 Modal -->
<div id="add_tier2_modal_container" class="modal_bg">
    <div id="add_tier2_modal" class="modal">
        <h3 class="modal_heading">Add Tier 2 Category</h3>

        <p class="tier_row">Tier 1: <span class="chocolate" id="tier1_on_tier2">Helo World</span></p>

        <label for="teir2_name" class="tier2_name">Tier 2 Name</label>
        <input type="text" name="tier2_name" id="tier2_name" placeholder="Enter Category Name">

        <input type="hidden" name="tier2_parent" id="tier2_parent" value="">

        <div class="category_buttons">
            <a id="save_tier2" href="#" class="bidzbutton devart">Save</a>
            <a id="cancel_category" href="#" class="bidzbutton orange cancel">Cancel</a>
        </div>
    </div>
</div>
<!-- Add Tier 3 Modal -->
<div id="add_tier3_modal_container" class="modal_bg">
    <div id="add_tier3_modal" class="modal">
        <h3 class="modal_heading">Add Tier 3 Category</h3>
        
        <p class="tier_row">&rarr; Tier 1: <span class="chocolate" id="tier1_on_tier3">Helo World</span></p>
        
        <p class="tier_row">&rarr; &rarr; Tier 2: <span class="chocolate" id="tier2_on_tier3">Eels on Wheels</span></p>
        
        <label for="teir3_name" class="tier3_name">Tier 3 Name</label>
        <input type="text" name="tier3_name" id="tier3_name" placeholder="Enter Category Name">

        <input type="hidden" name="tier3_parent" id="tier3_parent" value="">
        
        <div class="category_buttons">
            <a id="save_tier3" href="#" class="bidzbutton devart">Save</a>
            <a id="cancel_category" href="#" class="bidzbutton orange cancel">Cancel</a>
        </div>
    </div>
</div>
<!-- Add Tier 4 Modal -->
<div id="add_tier4_modal_container" class="modal_bg">
    <div id="add_tier4_modal" class="modal">
        <h3 class="modal_heading">Add Tier 4 Category</h3>

        <p class="tier_row">&rarr; Tier 1: <span class="chocolate" id="tier1_on_tier4">Helo World</span></p>
        
        <p class="tier_row">&rarr; &rarr; Tier 2: <span class="chocolate" id="tier2_on_tier4">Eels on Wheels</span></p>

        <p class="tier_row">&rarr; &rarr; &rarr; Tier 3: <span class="chocolate" id="tier3_on_tier4">Hamburgers</span></p>
        
        <input type="hidden" name="tier4_parent" id="tier4_parent" value="">
        
        
        <label for="teir4_name" class="tier4_name">Tier 4 Name</label>
        <input type="text" name="tier4_name" id="tier4_name" placeholder="Enter Category Name">

        <div class="category_buttons">
            <a id="save_tier4" href="#" class="bidzbutton devart">Save</a>
            <a id="cancel_category" href="#" class="bidzbutton orange cancel">Cancel</a>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>

<!-- Handle Open and Close Modals and get data -->
<script>
    $(document).ready(function(){
        $(".cancel").on("click", function(e){
            e.preventDefault();

            $(".modal_bg").css("display", "none");
        });


        $("#add_tier1_button").click(function(e){
            e.preventDefault();

            $("#add_tier1_modal_container").css("display", "block");
        });

        $(".add_tier").on("click", function(e){
            e.preventDefault();

            var name = $(this).attr("name");
            var comps = name.split("_");

            var tier_name = comps[1];
            var tier_id = comps[2];


            if(tier_name == "tier2"){
                $("#add_tier2_modal_container").css("display", "block");
                var level = 2;
                $("#tier2_parent").val(tier_id);
            }
            else if(tier_name == "tier3"){
                $("#add_tier3_modal_container").css("display", "block");
                var level = 3;
                $("#tier3_parent").val(tier_id);
            }
            else if(tier_name == "tier4"){
                $("#add_tier4_modal_container").css("display", "block");
                var level = 4;
                $("#tier4_parent").val(tier_id);
            }
            else{
                // do nothing
            }

            var result = add_ajax(level, tier_id);

            if(level == 2){
                $("#tier1_on_tier2").text(result);
            }
            else if(level == 3){
                var names = result.split("??||&&");
                var name1 = names[0];
                var name2 = names[1];

                $("#tier1_on_tier3").text(name1);
                $("#tier2_on_tier3").text(name2);
            }
            else if(level == 4){
                var names = result.split("??||&&");
                var name1 = names[0];
                var name2 = names[1];
                var name3 = names[2];

                $("#tier1_on_tier4").text(name1);
                $("#tier2_on_tier4").text(name2);
                $("#tier3_on_tier4").text(name3);
            }
        });

        $(".edit_tier").on("click", function(e){
            e.preventDefault();

            var name = $(this).attr("name");
            var comps = name.split("_");

            var tier_name = comps[1];
            var tier_id = comps[2];

            var tier = tier_name.replace("tier", "");

            $("#edit_tier_modal_container").css("display", "block");
            $("#edit_tier_modal_container #tier_id").text(tier);

            var category_name = edit_ajax(tier_name, tier_id);

            $("#tier_original_name").text(category_name);
            $("#category_name").val(category_name);

            var identifier = tier_name + "??||&&" + tier_id;

            $("#save_category").attr("name", identifier);
        });
    });

    function add_ajax(level, tier_id){
        var result = false;
        
        $.ajax({
            type: 'POST',
            url: "handle_category.php",
            async: false,
            dataType: "html",
            data: {
                'operation': 'add',
                'level': level,
                'tier_id': tier_id
            },
            success: function (name) {
                result = name;
            }
        });

        return result;
    }

    function edit_ajax(tier_name, tier_id){
        var result = false;

        $.ajax({
            type: 'POST',
            url: "handle_category.php",
            async: false,
            dataType: "html",
            data: {
                'operation': 'edit',
                'tier_name': tier_name,
                'tier_id': tier_id
            },
            success: function (name) {
                result = name;
            }
        });

        return result;
    }
</script>
<!-- Handle modal submission -->
<script>
    $("#save_category").click(function(e){
        e.preventDefault();

        var name = $(this).attr("name");

        var val = $("#category_name").val();

        if(val == ""){
            alert("Please provide the category name");
            return;
        }
        
        var comps = name.split("??||&&");
        var level = comps[0];
        var id = comps[1];

        $.ajax({
            type: 'POST',
            url: "handle_category.php",
            async: false,
            dataType: "html",
            data: {
                'operation': 'save_edit',
                'level': level,
                'tier_id': id,
                'value': val
            },
            success: function (msg) {
                if(msg == "done"){
                    location.reload();
                }
            }
        });
    });

    $("#save_tier1").click(function(e){
        e.preventDefault();

        var val = $("#tier1_name").val();

        if(val == ""){
            alert("Please provide the category name");
            return;
        }

        $.ajax({
            type: 'POST',
            url: "handle_category.php",
            async: false,
            dataType: "html",
            data: {
                'operation': 'save_add_tier1',
                'value': val
            },
            success: function (msg) {
                if(msg == "done"){
                    location.reload();
                }
            }
        });
    });

    $("#save_tier2").click(function(e){
        e.preventDefault();

        var parent = $("#tier2_parent").val();

        var val = $("#tier2_name").val();
        
        if(val == ""){
            alert("Please provide the category name");
            return;
        }

        save_rest_of_tiers(2, val, parent);
    });
    $("#save_tier3").click(function(e){
        e.preventDefault();

        var parent = $("#tier3_parent").val();

        var val = $("#tier3_name").val();
        
        if(val == ""){
            alert("Please provide the category name");
            return;
        }
        save_rest_of_tiers(3, val, parent);
    });
    $("#save_tier4").click(function(e){
        e.preventDefault();

        var parent = $("#tier4_parent").val();

        var val = $("#tier4_name").val();
        
        if(val == ""){
            alert("Please provide the category name");
            return;
        }
        save_rest_of_tiers(4, val, parent);
    });

    function save_rest_of_tiers(level, val, parent){
        $.ajax({
            type: 'POST',
            url: "handle_category.php",
            async: false,
            dataType: "html",
            data: {
                'operation': 'save_add_all_tiers',
                'value': val,
                'level': level,
                'parent': parent
            },
            success: function (msg) {
                if(msg == "done"){
                    location.reload();
                }
            }
        });
    }
</script>