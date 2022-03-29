<?php include "../includes/username.php"; ?>
<?php include "../includes/connect.php"; ?>
<?php
    if($username == "" || !isset($username)){
        header("location: ../index.php");
        exit();
    }

    if(!isset($_GET['cat_id']) || $_GET['cat_id'] == ""){
        header("location: ../catalogs/manage.php");
        exit();
    }
    else{

        $_SESSION['lot_catalog'] = $_GET['cat_id'];

        if(!isset($_SESSION['lot_catalog'])){
            $loc = "location: " . $root . "catalogs/manage.php";
            header($loc);
            exit();
        }
    }

    $catalog_id = $_SESSION['lot_catalog'];

    if($username == "" || !isset($username)){
        header("location: ../index.php");
        exit();
    }

    // Check for catalog ownership
    $ownership_sql = "SELECT * FROM `catalogs` WHERE `id`=$catalog_id AND `owner`='$username'";
    $ownership_result = mysqli_query($conn, $ownership_sql);
    $ownership_num = mysqli_num_rows($ownership_result);
    
    if($ownership_num == 0){
        header("location: ../index.php");
        exit();
    }

    // get catalog information using above sql statement
    $ownership_row = mysqli_fetch_assoc($ownership_result);
    $catalog_name = $ownership_row['catalog_name'];

    
    if($ownership_row['published'] == 1 || $ownership_row['published'] == "1"){
        header("location: manage.php");
        exit();
    }

    if($_GET['success'] == 1){
        ?>
            <script>
                alert("Featured Picture Updated Successfully!");
                window.location.replace("featured_image.php?cat_id=" + <?php echo $catalog_id; ?>);
            </script>
        <?php
    }



    $feat_sql = "SELECT * FROM `catalog_pictures` WHERE `cat_id`=$catalog_id";
    $feat_result = mysqli_query($conn, $feat_sql);
    $feat_num = mysqli_num_rows($feat_result);
    
    if($feat_num == 1){
        $feat_row = mysqli_fetch_assoc($feat_result);
        $picture_name = $feat_row['picture'];
    }
    else{
        $save_button = false;
    }

?>

<?php if($save_button) : ?>
    <style>
        #feat_picture_upload .save_button{
            display: flex;
        }
    </style>
<?php else : ?>
    <style>
        #feat_picture_upload .save_button{
            display: none;
        }
    </style>
<?php endif; ?>

<?php include "../includes/header.php"; ?>

<div class="manage_lot_header">

    <h2 class="house_heading section_heading"><span>Featured Picture - For Catalog: <?php echo $catalog_name; ?></span></h2>

    <div class="create_button_container">
        <a href="http://bidzwon.com/dev/catalogs/manage.php" class="no_margin mb-30 bidzbutton orange create_button"><i class="fas fa-arrow-left"></i> Back to Manage Catalogs</a>
    </div>

    <?php if($feat_num == 0) : ?>

        <p class="picture_upload_disclaimer font25 no_margin_top">There is currently no featured image for this catalog. Please upload below</p>

    <?php else : ?>
        
        <p class="picture_upload_disclaimer font25 no_margin_top">Current Featured Photo:</p>
        
        <div id="photo_container">
        

            <img src="featured_img/<?php echo $picture_name; ?>" alt="Featured Photo" id="featured_photo">
        
        </div>

    <?php endif ; ?>
</div>

<div id="feat_picture_upload">

    <form action="upload_featured_image.php" id="save_featured_picture" method="post" enctype="multipart/form-data">
        <div class="pic_upload_module">
            <input type="file" name="picture_upload" id="picture_upload" class="inputfile inputfile-4" onchange="getFileData(this);" accept=".jpg,.jpeg,.png,.JPG,.JPEG,.PNG" style="background-color: whitesmoke;">
            <label for="picture_upload" class="picture_upload_label">
                <span class="upload_button mtb-20" ><i class="upload_img fas fa-upload"></i></span>Upload This Catalog's Featured Photo... (JPG, JPEG, PNG)</span>

                <span id="upload_confirmation" class="mar_top25"><span id="upload_confirmation_text"></span> <span id="upload_checkmark"> - Uploaded!<i class="ml-10 green-color fas fa-check"></i></span></span>
            </label>
        </div>

        <input type="hidden" name="catalog_id" id="catalog_id" value="<?php echo $catalog_id; ?>">

        <div class="catalog_row signup_row save_button">
            <p class="saving_lot_disclaimer">Your picture is being uploaded. Please wait.</p>
            <a type="submit" class="fancy-submit fancy-button bg-gradient1 cursor_pointer" style="margin:auto;"  id="save_upload_picture" disabled=""><span>Save Upload Picture</span></a>
        </div>
    </form>

</div>

<?php include "../includes/footer.php"; ?>
<script>
    function getFileData(myFile){
        var file = myFile.files[0];  
        var filename = file.name;
        
        $("#upload_confirmation_text").html(filename);
        $("#upload_confirmation").css("display", "block");

        $(".save_button").css("display", "flex");
    }


    $("#save_upload_picture").on('click', function(e) {
        e.preventDefault();

        
        // make sure that picture is uploaded
        var img = $("#picture_upload").val();
        if(img == ""){
            alert("Please Upload a Photo");
            return;
        }
        
        $("#save_upload_picture").css("display", "none");
        $(".saving_lot_disclaimer").css("display", "flex");

        $('#save_featured_picture').submit();
    });

</script>