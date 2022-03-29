<?php include "../includes/username.php"; ?>
<?php include "../includes/connect.php"; ?>
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
    


    
    $sql = "SELECT * FROM `catalogs` WHERE `owner`='$username' AND `id`='$catalog_id'";
    $result = mysqli_query($conn, $sql);
    $myrow = mysqli_fetch_assoc($result);
    
    if($myrow['published'] == 1 || $myrow['published'] == "1"){
        header("location: manage.php");
        exit();
    }

    if(isset($_SESSION['lot_id'])){
        $lot_id = $_SESSION['lot_id'];
    }
    
    if(!isset($_GET['lot_id']) && !isset($_SESSION['lot_id'])){
        $loc = "location: " . $root . "lots/manage.php?cat_id=" . $catalog_id;
        header($loc);
        exit();
    }  

    if(isset($_GET['lot_id'])){
        $lot_id = $_GET['lot_id'];
        $_SESSION['lot_id'] = $lot_id;
    }
    else if(isset($_SESSION['lot_id'])){
        $lot_id = $_SESSION['lot_id'];
    }

    $check_sql = "SELECT * FROM `lots` WHERE `catalog_id`=$catalog_id AND `id`=$lot_id";
    $check_res = mysqli_query($conn, $check_sql);
    $num = mysqli_num_rows($check_res);

    if($num == 0){
        $loc = "location: " . $root . "lots/manage.php?cat_id=" . $catalog_id;
        header($loc);
        exit();
    }

    $sql = "SELECT * FROM `lots` WHERE `id`=$lot_id AND `catalog_id`=$catalog_id";
    $res = mysqli_query($conn, $sql);
    $name_row = mysqli_fetch_assoc($res);
    $name = $name_row['name'];

    $_SESSION['lot_id'] = $lot_id;

    
    // update lot picture sequence
    $picture_arr = array();
    $picture_sql = "SELECT * FROM `lot_pictures` WHERE `cat_id`=$catalog_id AND `lot_id`=$lot_id";
    $picture_result = mysqli_query($conn, $picture_sql);
    while($picture_row = mysqli_fetch_assoc($picture_result)){
        $picture_id = $picture_row['id'];
        array_push($picture_arr, $picture_id);
    }

    

    // Delete image
    if(isset($_GET['delete_image'])){
        $image_id = $_GET['delete_image'];

        // remove from lot_pictures table
        $delete_image_sql = "DELETE FROM `lot_pictures` WHERE `id`=$image_id AND `cat_id`=$catalog_id AND `lot_id`=$lot_id";
        mysqli_query($conn, $delete_image_sql);

        // remove from sequence table
        $order_sql = "SELECT * FROM `lot_picture_order` WHERE `cat_id`=$catalog_id AND `lot_id`=$lot_id";
        $order_result = mysqli_query($conn, $order_sql);
        $order_row = mysqli_fetch_assoc($order_result);
        $sequence = $order_row['sequence'];

        $rep = "||" . $image_id . "||";
        $sequence = str_replace($rep, "||", $sequence);

        $sequence_sql = "UPDATE `lot_picture_order` SET `sequence` = '$sequence' WHERE `cat_id`=$catalog_id AND `lot_id`=$lot_id";
        mysqli_query($conn, $sequence_sql);
    }
  
    
    $catalog_id_temp = $catalog_id;
?>
<?php include "../includes/header.php"; ?>
<?php
    $catalog_id = $catalog_id_temp;
?>
<script src="../js/dropzone.js"></script>
<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
<style>
    .file_dropper{
        margin-top: 25px;
        padding: 20px;
        background-color: #EEE;
        border: 5px dashed #999;
        height: 300px;
        overflow: auto;
    }
</style>


<div class="manage_lot_header">
    <h2 class="house_heading section_heading"><span>Add and Sort Pictures - For Lot: <?php echo $name; ?></span></h2>
</div>

<div id="loader_outer">
    <div id="loader_container">
        <div class="loader"></div>
    </div>
</div>

<div class="create_button_container">
    <a href="<?php echo $root; ?>lots/manage.php?cat_id=<?php echo $catalog_id; ?>" class="bidzbutton orange create_button"><i class="fas fa-arrow-left"></i > Back to Manage Lots</a>
</div>


<p class="picture_upload_disclaimer font25 no_margin_top">Pictures are automatically saved upon upload</p>


<form action="lot_picture_upload.php" class="file_dropper dropzone drop_form"></form>


<div id="sorting_header" class="manage_lot_header">
    <h2 class="house_heading section_heading"><span>Sort Pictures - For Lot: <?php echo $name; ?></span></h2>
    
    <p class="font25" id="sorting_disclaimer">You can sort the pictures for this lot via drag and drop. The default image for this lot is the first image in the list of pictures (it also has a <span class="color_chocolate">orange border</span> around it). After you are done sorting, please click on the following button to save the order.</p>

    
    <a href="<?php echo $root; ?>lots/manage.php?cat_id=<?php echo $catalog_id; ?>" class="save_sorted_pictures bidzbutton orange create_button"><i class="fas fa-arrow-left"></i> Back to Manage Lots</a>
    
    <a href="#" id="save_sorted_pictures" class="bidzbutton save_sorted_pictures devart">Save Sorted Pictures <i class="fas fa-random"></i></a>


</div>

<div id="picture_viewer">

    <?php

    $sql = "SELECT * FROM `lot_pictures` WHERE `cat_id`=$catalog_id AND `lot_id`=$lot_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $picture_file = $row['picture']; 
    $num = mysqli_num_rows($result);

    ?>

    <?php
        if($num == 0){
            ?>

            <h1 class="mauto">There are currently no pictures for this lot</h1>

            <?php

            // Currently no photos
            // Create Sequence Table Entry
            $check_already_sequence = "SELECT * FROM `lot_picture_order` WHERE `cat_id`=$catalog_id AND `lot_id`=$lot_id";
            $sequence_result = mysqli_query($conn, $check_already_sequence);
            $sequence_num = mysqli_num_rows($sequence_result);

            if($sequence_num == 0){
                $insert_sequence = "INSERT INTO `lot_picture_order` (`id`, `cat_id`, `lot_id`, `sequence`) VALUES (NULL, '$catalog_id', '$lot_id', '||');";
                mysqli_query($conn, $insert_sequence);
            }

        }
    ?>

    <!-- Get sequence from database -->
    <?php
        $sorter_sql = "SELECT * FROM `lot_picture_order` WHERE `cat_id`=$catalog_id AND `lot_id`=$lot_id";

        $sorter_result = mysqli_query($conn, $sorter_sql);
        $row = mysqli_fetch_assoc($sorter_result);
        $sequence = $row['sequence'];
        $sequence_arr = explode("||", $sequence);
        $start_sequence_arr = array();
        for($s = 0; $s<count($sequence_arr); $s++){
            $cur = $sequence_arr[$s];

            if($cur != ""){
                array_push($start_sequence_arr, $cur);
            }
        }

        $sequence_start = join("??||&&", $start_sequence_arr);

    ?>
    


    <input type="hidden" name="original_sequence" id="original_sequence" value="<?php echo $sequence_start; ?>">

    <!-- Get javascript array of sequence -->
    <script>
        var order_js = <?php echo json_encode($sequence_arr); ?>;
        var order_minified = [];
        
        for(var i = 0; i < order_js.length; i ++){
            var cur = order_js[i];
            if(cur != ""){
                order_minified.push(cur);
            }
        }
    </script>

    <!-- Get all pictures from database -->
    <?php
        $all_pictures = array();

        $picture_sql = "SELECT * FROM `lot_pictures` WHERE `cat_id`=$catalog_id AND `lot_id`=$lot_id";
        $picture_result = mysqli_query($conn, $picture_sql);
        $num_of_pictures = mysqli_num_rows($picture_result);
        while($row = mysqli_fetch_assoc($picture_result)){
            $id = $row['id'];
            $picture = $row['picture'];

            $picture_identifier = $id . "??||&&" . $picture;
            array_push($all_pictures, $picture_identifier);
        }


    ?>
    
    <!-- Get pictures array for javascript -->
    <script>
        var picture_js = <?php echo json_encode($all_pictures); ?>;
        var pictures_minified = [];

        for(var i= 0; i < picture_js.length; i++){
            var cur = picture_js[i];
            if(cur !=""){
                pictures_minified.push(cur);
            }
        }
    </script>

    <!-- Get coresponding pictures in order of sequence -->
    <script>
        // pictures_minified
        // order_minified

        var final_picture_id = [];
        var final_picture_link = [];

        for(var o = 0; o < order_minified.length; o++){
            var current_order = order_minified[o];

            for(var p = 0; p < pictures_minified.length; p++){
                var current_picture = pictures_minified[p];

                var comps = current_picture.split("??||&&");
                
                if(comps.length > 2){
                    // TODO: Invalid Picture Name
                }
                else{
                    var pic_id = comps[0];
                    var pic_link = comps[1];
                    
                    if(current_order == pic_id){
                        final_picture_id.push(pic_id);
                        final_picture_link.push(pic_link);
                    }
                }
            }
        }
    </script>

    <script>
        // final_picture_id, final_picture_link
        for(var f = 0; f<final_picture_id.length; f++){
            var fid = final_picture_id[f];
            var flink = final_picture_link[f];

            var border = "";
            if(f == 0){
                border = "border_chocolate";
            }
            else{
                border = "";
            }
            var picture_module = `
                <div class="picture_box ${border}" id="pic_${fid}" name="${fid}">
                    <img src="<?php echo $root; ?>lots/pictures/${flink}" alt="Lot Image">
                
                    <div class="delete_image_button">
                    <a href="pictures.php?delete_image=${fid}" class="delete_image_link"><i class="fas fa-times"></i></a>
                    </div>
                </div>
            `;
        
            document.write(picture_module);
        }
    </script>

    <?php
        $cnt = $num_of_pictures % 4;
        for($i = 0; $i<$cnt; $i++){
            ?>

            <div class="picture_box empty"></div>

            <?php
        }
    ?>
</div>


<?php include "../includes/footer.php"; ?>

<script>
     $( function() {
        $( "#picture_viewer" ).sortable({
        stop: function(event,ui){ 
            var inorder = $("#picture_viewer").sortable("toArray");
            order_compute(inorder);
            },
            tolerance: "pointer",
            cancel: ".empty"
        });

     } );


     function order_compute(order_orig){
         var num_pics = <?php echo $num_of_pictures; ?>;
            var seq = [];
        for(var o = 0; o<order_orig.length; o++){
            var cur = order_orig[o];

            if(cur == "" || cur == "original_sequence"){
                // ignore
            }
            else{
                seq.push(cur);
            }
        }

        if(seq.length == num_pics){

            var newOrder = [];

            for(var n= 0; n<seq.length; n++){
                var cur_id = seq[n];
        
                $("#" + cur_id).attr('style', 'border-color: black !important');

                $(".picture_box").first().attr('style', 'border-color: chocolate !important');

                var res = cur_id.replace("pic_", "");
                
                newOrder.push(res);
            }
            
            var final_order = newOrder.join("??||&&");

            // console.log(final_order);

            $("#original_sequence").val(final_order);
        }
        else{
            // TODO: Handle wrong number of images
        }

     }


     // Handle save sorted pictures
     $("#save_sorted_pictures").click(function(e){
        e.preventDefault();

        //original_sequence
        var seq = $("#original_sequence").val();

        // AJAX Call
        $.ajax({
            type: 'POST',
            url: 'picture_sorter.php',
            dataType: "html",
            data: {sequence: seq, num: picture_js.length},
            success: function (data) {
                // console.log(data);    
            },
            complete: function (data) {
                alert("Saved picture order successfully!");
                location.reload();
            }
        });
     });
</script>