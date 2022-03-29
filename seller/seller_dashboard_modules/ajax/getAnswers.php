<?php
    include "../../../includes/connect.php";

    $action = $_POST['action'];
    $catalog_id = $_POST['catalog_id'];
    $username = $_POST['username'];

    if($action == "recieve"){

        $sql = "SELECT * FROM `catalog_registration` WHERE `cat_id`=$catalog_id AND `user`='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $status = $row['status'];

        $output = array();

        $id = $row['id'];

        $question1 = $row['question1'];
        $question2 = $row['question2'];
        $question3 = $row['question3'];
        $question4 = $row['question4'];
        $question5 = $row['question5'];
        $question6 = $row['question6'];
        $question7 = $row['question7'];
        $question8 = $row['question8'];
        $question9 = $row['question9'];
        $question10 = $row['question10'];

        $answer1 = $row['answer1'];
        $answer2 = $row['answer2'];
        $answer3 = $row['answer3'];
        $answer4 = $row['answer4'];
        $answer5 = $row['answer5'];
        $answer6 = $row['answer6'];
        $answer7 = $row['answer7'];
        $answer8 = $row['answer8'];
        $answer9 = $row['answer9'];
        $answer10 = $row['answer10'];

        
        if($question1 == "-1" && $question2 == "-1" && $answer1 == "-1" && $answer2 == "-1"){
            $output['success'] = "error";

            echo(json_encode($output));

            exit();
        }
        else{
            $start_questions = array($question1, $question2, $question3, $question4, $question5, $question6, $question7, $question8, $question9, $question10);
            $start_answers = array($answer1, $answer2, $answer3, $answer4, $answer5, $answer6, $answer7, $answer8, $answer9, $answer10);

            $questions = array();
            foreach($start_questions as $ques){
                if($ques == "-1" || $ques == -1){
                    continue;
                }
                else{
                    array_push($questions, $ques);
                }
            }

            $answers = array();
            foreach($start_answers as $ans){
                if($ans == "-1" || $ans == -1){
                    continue;
                }
                else{
                    array_push($answers, $ans);
                }
            }

            $output['success'] = 'success';
            $output['questions'] = $questions;
            $output['answers'] = $answers;
            $output['id'] = $id;

            $output['status'] = $status;

            echo json_encode($output);

            exit();
        }
    }
    else if($action == "approve"){

        $output = array();

        $id = $_POST['id'];

        // check if record is pending
        $check_sql = "SELECT * FROM `catalog_registration` WHERE `id` = $id AND `cat_id`=$catalog_id AND `user`='$username'";
        $check_result = mysqli_query($conn, $check_sql);
        $check_row = mysqli_fetch_assoc($check_result);

        $status = $check_row['status'];

        if($status != "pending"){
            $output['success'] = "error";
            echo json_encode($output);
            exit();
        }


        $sql = "UPDATE `catalog_registration` SET `status` = 'approved' WHERE `id` = $id AND `cat_id`=$catalog_id AND `user`='$username';";
        $result = mysqli_query($conn, $sql);
        
        $output['success'] = "success";
        echo json_encode($output);
    }
    else if($action == "deny"){
        $output = array();

        $id = $_POST['id'];
        // check if record is pending
        $check_sql = "SELECT * FROM `catalog_registration` WHERE `id` = $id AND `cat_id`=$catalog_id AND `user`='$username'";
        $check_result = mysqli_query($conn, $check_sql);
        $check_row = mysqli_fetch_assoc($check_result);

        $status = $check_row['status'];

        if($status != "pending"){
            $output['success'] = "error";
            echo json_encode($output);
            exit();
        }

        $sql = "UPDATE `catalog_registration` SET `status` = 'denied' WHERE `id` = $id AND `cat_id`=$catalog_id AND `user`='$username';";
        $result = mysqli_query($conn, $sql);
        
        $output['success'] = "success";
        echo json_encode($output);
    }
?>