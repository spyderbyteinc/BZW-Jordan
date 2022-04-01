<?php
    include "../includes/connect.php";

    include "../includes/username.php";

    $catalog_id = $_POST['catalog_id'];
    $operation = $_POST['operation'];
    // INSERT INTO `catalog_registration` (`id`, `user`, `cat_id`, `status`, `question1`, `answer1`, `question2`, `answer2`, `question3`, `answer3`, `question4`, `answer4`, `question5`, `answer5`, `question6`, `answer6`, `question7`, `answer7`, `question8`, `answer8`, `question9`, `answer9`, `question10`, `answer10`) VALUES (NULL, 'jhalaby', '12', 'pending', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1');


    if($operation == "approve"){

        $already_exists_sql = "SELECT * FROM `catalog_registration` WHERE `user`='$username' AND `cat_id`='$catalog_id'";
        $already_exists_result = mysqli_query($conn, $already_exists_sql);
        $num_rows = mysqli_num_rows($already_exists_result);

        if($num_rows > 0){
            echo "approval_twice";
            exit();
        }

        $sql = "INSERT INTO `catalog_registration` (`id`, `user`, `cat_id`, `status`, `question1`, `answer1`, `question2`, `answer2`, `question3`, `answer3`, `question4`, `answer4`, `question5`, `answer5`, `question6`, `answer6`, `question7`, `answer7`, `question8`, `answer8`, `question9`, `answer9`, `question10`, `answer10`) VALUES (NULL, '$username', '$catalog_id', 'approved', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1', '-1');";

        mysqli_query($conn, $sql);

        echo "approval_done";
        exit();
    }
    else if($operation == "pending"){
        $already_exists_sql = "SELECT * FROM `catalog_registration` WHERE `user`='$username' AND `cat_id`='$catalog_id'";
        $already_exists_result = mysqli_query($conn, $already_exists_sql);
        $num_rows = mysqli_num_rows($already_exists_result);

        if($num_rows > 0){
            echo "pending_twice";
            exit();
        }

        $output_arr = array();

        $answer_arr = $_POST['answers'];
        
        $answer_fin = array(-1,-1,-1,-1,-1,-1,-1,-1,-1,-1);

        for($a = 0; $a<count($answer_arr); $a++){
            $answer = $answer_arr[$a];

            $answer_fin[$a] = mysqli_real_escape_string($conn, $answer);
        }

        // get all questions from the table
        $question_sql = "SELECT * FROM `catalogs` WHERE `id`=$catalog_id";
        $question_result = mysqli_query($conn, $question_sql);
        $question_row = mysqli_fetch_assoc($question_result);

        $question_fin = array(-1,-1,-1,-1,-1,-1,-1,-1,-1,-1);

        for($q=0; $q<count($answer_arr); $q++){
            $index = $q+1;
            $question_number = "question_" . $index;
            $question_text = $question_row[$question_number];

            $question_comps = explode("??||&&", $question_text);
            $question_text = $question_comps[1];

            $question_fin[$q] = mysqli_real_escape_string($conn, $question_text);
        }

        // array_push($output_arr, $question_fin, $answer_fin);

        // echo json_encode($output_arr);

        // exit();

        $question1 = $question_fin[0];
        $question2 = $question_fin[1];
        $question3 = $question_fin[2];
        $question4 = $question_fin[3];
        $question5 = $question_fin[4];
        $question6 = $question_fin[5];
        $question7 = $question_fin[6];
        $question8 = $question_fin[7];
        $question9 = $question_fin[8];
        $question10 = $question_fin[9];

        $answer1 = $answer_fin[0];
        $answer2 = $answer_fin[1];
        $answer3 = $answer_fin[2];
        $answer4 = $answer_fin[3];
        $answer5 = $answer_fin[4];
        $answer6 = $answer_fin[5];
        $answer7 = $answer_fin[6];
        $answer8 = $answer_fin[7];
        $answer9 = $answer_fin[8];
        $answer10 = $answer_fin[9];

        $pending_sql = "INSERT INTO `catalog_registration` (`id`, `user`, `cat_id`, `status`, `question1`, `answer1`, `question2`, `answer2`, `question3`, `answer3`, `question4`, `answer4`, `question5`, `answer5`, `question6`, `answer6`, `question7`, `answer7`, `question8`, `answer8`, `question9`, `answer9`, `question10`, `answer10`) VALUES (NULL, '$username', '$catalog_id', 'pending', '$question1', '$answer1', '$question2', '$answer2', '$question3', '$answer3', '$question4', '$answer4', '$question5', '$answer5', '$question6', '$answer6', '$question7', '$answer7', '$question8', '$answer8', '$question9', '$answer9', '$question10', '$answer10');";

        mysqli_query($conn, $pending_sql);

        echo "done";

        exit();
    }
?>