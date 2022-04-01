<?php

session_start();
include "../includes/connect.php";
 
// Check if form was submitted
if(isset($_POST['submit'])) {
 
    // Configure upload directory and allowed file types
    $upload_dir = 'bug_uploads'.DIRECTORY_SEPARATOR;
    $allowed_types = array('jpg', 'png', 'jpeg', 'gif');
     
    // Define maxsize for files i.e 2MB
    $maxsize = 2 * 1024 * 1024;
 
    $file_list = "";
        // Loop through each file in files[] array
        foreach ($_FILES['files']['tmp_name'] as $key => $value) {
             
            $file_tmpname = $_FILES['files']['tmp_name'][$key];
            $file_name = $_FILES['files']['name'][$key];
            $file_size = $_FILES['files']['size'][$key];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
 
            // Set upload file path
            $filepath = $upload_dir.$file_name;
 
            // Check file type is allowed or not
            if(in_array(strtolower($file_ext), $allowed_types)) {
 
                // Verify file size - 2MB max
                if ($file_size > $maxsize)        
                    echo "Error: File size is larger than the allowed limit.";
 
                // If file with name already exist then append time in
                // front of name of the file to avoid overwriting of file
                $filepath = $upload_dir.time().$file_name;
                
                    if( move_uploaded_file($file_tmpname, $filepath)) {
                        $file_list = $file_list . "??||&&" . $filepath;
                    }
                    else {                    
                        echo "Error uploading {$file_name} <br />";
                    }
            }
            else {
                 
                // If file extension not valid
                echo "Error uploading {$file_name} ";
                echo "({$file_ext} file type is not allowed)<br / >";
            }
        }
    
        // echo $file_list . ")))))" . $_SESSION['staff_user'];

        $user = $_SESSION['staff_user'];
        $title = mysqli_real_escape_string($conn, $_POST['bug_title']);
        $url = mysqli_real_escape_string($conn, $_POST['bug_url']);
        $description = mysqli_real_escape_string($conn, $_POST['bug_description']);

        $sql = "INSERT INTO `bugs` (`id`, `title`, `url`, `description`, `pictures`, `author`, `done`) VALUES (NULL, '$title', '$url', '$description', '$file_list', '$user', '0')";
        mysqli_query($conn, $sql);
        header("location: bugs.php");
}
 
?>