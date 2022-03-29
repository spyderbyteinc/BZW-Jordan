<?php
    if(!isset($_GET['id']) | $_GET['id'] == ""){
        header("location: .all_users.php");
        exit();
    }
    else{
        $id = $_GET['id'];
    }

    include "includes/connect.php";

    $sql = "SELECT * FROM `house` WHERE `id`=$id";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count == 0){
        header("location: all_users.php");
    }
    $row = mysqli_fetch_assoc($result);
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $username = $row['username'];
    $email = $row['email'];
    $owner = $row['owner'];

    $question1 = $row['question1'];
    $answer1 = $row['answer1'];
    $question2 = $row['question2'];
    $answer2 = $row['answer2'];

    // question retrieval
    $one = "SELECT * FROM `security_question1` WHERE `id`=$question1";
    $res_one = mysqli_query($conn, $one);
    $row1 = mysqli_fetch_assoc($res_one);
    $question1 = $row1['question'];

    $two = "SELECT * FROM `security_question2` WHERE `id`=$question2";
    $res_two = mysqli_query($conn, $two);
    $row2 = mysqli_fetch_assoc($res_two);
    $question2 = $row2['question'];

?>
<?php include "includes/header.php"; ?>

    <main id="content" class="seller_record">
        <h1 class="page_heading">House Account - <?php echo $first_name . " " . $last_name; ?></h1>
        
        <div class="mb-4 text-center mt-4"><a href="all_users.php" class="btn btn-warning">Back to List</a></div>

        <div class="record_item">
                <p class="table_mid_header">Personal Information</p>
                
                <div class="table">

                    <div class="table-row first_section">
                        <div class="table-cell bold">First Name</div>
                        <div class="table-cell right_align"><?php echo $first_name; ?></div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold">Last Name</div>
                        <div class="table-cell right_align"><?php echo $last_name; ?></div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold">Username</div>
                        <div class="table-cell right_align"><?php echo $username; ?></div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold">Email</div>
                        <div class="table-cell right_align"><?php echo $email; ?></div>
                    </div>
                    <div class="table-row last_section">
                        <div class="table-cell bold">Owner</div>
                        <div class="table-cell right_align"><a href="#" class="house_link"><?php echo $owner; ?></a></div>
                    </div>
                </div>

                <p class="table_mid_header">Security Information</p>
                
                <div class="table">

                    <div class="table-row first_section">
                        <div class="table-cell bold">Question 1</div>
                        <div class="table-cell right_align"><?php echo $question1; ?></div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold">Answer 1</div>
                        <div class="table-cell right_align"><?php echo $answer1; ?></div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell bold">Question 2</div>
                        <div class="table-cell right_align"><?php echo $question2; ?></div>
                    </div>
                    <div class="table-row last_section">
                        <div class="table-cell bold">Answer 2</div>
                        <div class="table-cell right_align"><?php echo $answer2; ?></div>
                    </div>
                </div>
            </div>

            <br><br><br><br><br>
    </main>
<?php include "includes/footer.php"; ?>