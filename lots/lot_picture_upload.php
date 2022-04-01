<?php
session_start();

include "../includes/connect.php"; 

$catalog_id = $_SESSION['lot_catalog'];
$lot_id = $_SESSION['lot_id'];

$ds          = "||";  //1
 
$storeFolder = 'uploads';   //2

$num_sql = "SELECT * FROM `lot_picture_order` WHERE `cat_id`='$catalog_id' AND `lot_id`='$lot_id'";
$num_result = mysqli_query($conn, $num_sql);
$num_count = mysqli_num_rows($num_result);

if($num_count == 0){
    $insert_sql = "INSERT INTO `lot_picture_order` (`id`, `cat_id`, `lot_id`, `sequence`) VALUES (NULL, '$catalog_id', '$lot_id', '||');";
    mysqli_query($conn, $insert_sql);
}
 
if (!empty($_FILES)) {
     
    $allowed = ["jpg", "jpeg", "png", "gif"];
    $ext = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed)) {
        $error = "$ext file type not allowed - " . $_FILES["file-upload"]["name"];
    }
    else{
        $tempFile = $_FILES['file']['tmp_name'];          //3             
      
        $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
         
        $fname = time() . $_FILES['file']['name'];
        $targetFile =  "pictures/". $fname;  //5

        $count_sql = "SELECT * FROM `lot_pictures` WHERE `cat_id`='$catalog_id' AND `lot_id`='$lot_id'";
        $result = mysqli_query($conn, $count_sql);
        $num = mysqli_num_rows($result);

        $default = 0;
        if($num == 0){
            $default = 1;
        }
        else{
            $default = 0;
        }
     
        $sql = "INSERT INTO `lot_pictures` (`id`, `cat_id`, `lot_id`, `picture`) VALUES (NULL, '$catalog_id', '$lot_id', '$fname');";

        mysqli_query($conn, $sql);

        $new_id = mysqli_insert_id($conn);

        move_uploaded_file($tempFile,$targetFile); //6
        
        $id_sql = "SELECT * FROM `lot_pictures` WHERE `picture`='$fname'";
        $id_result = mysqli_query($conn, $id_sql);
        $id_row = mysqli_fetch_assoc($id_result);

        $seq_sql = "SELECT * FROM `lot_picture_order` WHERE `cat_id`='$catalog_id' AND `lot_id`='$lot_id'";

        $seq_result = mysqli_query($conn, $seq_sql);
        $seq_row = mysqli_fetch_assoc($seq_result);
        $orig_sequence = $seq_row['sequence'];

        $additional_sequence = $orig_sequence . $new_id . "||";

        
        $additional_sql = "UPDATE `lot_picture_order` SET `sequence` = '$additional_sequence' WHERE `cat_id` = '$catalog_id' AND `lot_id`='$lot_id';";
        mysqli_query($conn, $additional_sql);
    }

}

?>   