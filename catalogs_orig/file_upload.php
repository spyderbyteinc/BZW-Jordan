<?php
$ds          = "||";  //1
 
$storeFolder = 'uploads';   //2
 
if (!empty($_FILES)) {
     
    $allowed = ["jpg", "jpeg", "png", "gif"];
    $ext = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed)) {
        $error = "$ext file type not allowed - " . $_FILES["file-upload"]["name"];
    }
    else{
        $tempFile = $_FILES['file']['tmp_name'];          //3             
      
        $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
         
        $targetFile =  "../uploads/". time() . $_FILES['file']['name'];  //5
     
        move_uploaded_file($tempFile,$targetFile); //6
    }

}
?>   