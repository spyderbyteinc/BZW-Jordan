<?php
    include "../includes/connect.php";

    $username = $_POST['username'];
    $catalog_id = $_POST['catalog_id'];

    $sql = "SELECT * FROM `catalog_registration` WHERE `user`='$username' AND `cat_id`=$catalog_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $output = array();

    $questions = array();
    $answers = array();

    for($a=1; $a<=10; $a++){
        $question_column = "question" . $a;
        $answer_column = "answer" . $a;

        $question = $row[$question_column];
        $answer = $row[$answer_column];

        if(($question == "-1" || $question == -1) && ($answer == "-1" || $answer == -1)){
            continue;
        }

        array_push($questions, $question);
        array_push($answers, $answer);
    }

    $output['questions'] = $questions;
    $output['answers'] = $answers;

    echo json_encode($output);
?>