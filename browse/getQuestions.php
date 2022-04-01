<?php
    include "../includes/connect.php";

    $cat_id = $_POST['id'];

    $sql = "SELECT * FROM `catalogs` WHERE `id`=$cat_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    $all_questions = array();

    for($q = 0; $q<10; $q++){
        $q_id = $q+1;

        $name = "question_" . $q_id;

        $question = $row[$name];

        if($question != "-1" && $question != -1){
            array_push($all_questions, $question);
        }
    }
    
    echo json_encode($all_questions);
?>