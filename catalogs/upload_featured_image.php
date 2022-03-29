<?php include "../includes/username.php"; ?>
<?php include "../includes/connect.php"; ?>
<?php
    if (!empty($_FILES["picture_upload"]["name"])){
        $picture_upload = $_FILES['picture_upload'];

        $target_dir = "featured_img/";
        $fi = time() . $_FILES['picture_upload']['name'];
        $target_file = $target_dir . $fi;
        
        $picture_upload = $fi;

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["picture_upload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["picture_upload"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        }
        else{
            move_uploaded_file($_FILES["picture_upload"]["tmp_name"], $target_file);
        }
    }
    else{
        $picture_upload = "";
    }


    $catalog_id = $_POST['catalog_id'];

    

    $sql = "SELECT * FROM `catalog_pictures` WHERE `cat_id`=$catalog_id";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);


    // either add row or update row depeending on if it already exists
    if($num == 0){
        $insert_sql = "INSERT INTO `catalog_pictures` (`id`, `cat_id`, `picture`) VALUES (NULL, '$catalog_id', '$picture_upload');";
        $insert_result = mysqli_query($conn, $insert_sql);
    }
    else{
        $update_sql = "UPDATE `catalog_pictures` SET `picture` = '$picture_upload' WHERE `catalog_pictures`.`cat_id` = $catalog_id;";
        $update_result = mysqli_query($conn, $update_sql);
    }

    header("location: featured_image.php?success=1&cat_id=" . $catalog_id);

?>