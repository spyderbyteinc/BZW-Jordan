<?php

    include "includes/connect.php";

    if(isset($_POST['notes'])){
        $note = $_POST['editor1'];

        $sql = "UPDATE `note_test` SET `vchar` = '$note', `text` = '$note' WHERE `note_test`.`id` = 2;";
        $result = mysqli_query($conn, $sql);
    }

    $sql = "SELECT * FROM `note_test` WHERE `id` = 2";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $note_text = $row['text'];
        $note_vchar = $row['vchar'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../css/buttons.css">
    <style>
        textarea{
            width: 500px;
            height: 500px;
            margin-top: 250px;
            margin-left: 250px;
            visibility: hidden;
        }
        #cke_editor1{
            width: 600px;
            margin:auto;
            margin-top: 25px;
        }
        #drag_me{
            background-color: chocolate;
            width: 600px;
            padding-top: 15px;
            text-align: center;
            border-radius: 5px;
            box-shadow: 5px 6px 8px #888888;
            border: 1px solid black;
            cursor: move;
        }
        #drag_me img{
            height: 100px;
        }
        #drag_me form{
        }
        #drag_me form .note_nav{
            cursor: default;
            height: 65px;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        #drag_me a.bidzbutton{
            font-size: 26px;
        }

        .bidzbutton{
            text-decoration: none;
            color: #666;
            border-radius: 5px;
            padding: 7px;
        }
    </style>
    <title>Document</title>
</head>
<body>

        <div id="drag_me">
            <img src="http://bidzwon.com/dev/img/logo6.png" alt="BidZWon">
            <div class="note_label">
                <h2>Enter Notes For: Lot # / Lot Name</h2>
            </div>
            <form action="" method="post">

                <textarea id="editor1" name="editor1" class="form-control"><?php echo $note_text; ?></textarea> 

                <div class="note_nav">
                    <a class="bidzbutton dark_grey cancel_button" href="#">Cancel</a>
                    <a class="bidzbutton medblue save_button" href="#">Save</a>
                    <a class="bidzbutton orange yellow_button" href="#">Yellow</a>
                    <a class="bidzbutton black black_button" href="#">Black</a>
                </div>

                <input type="hidden" name="notes" value="1">
            </form>
        </div>
</body>
</html>
<script src="http://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());

    CKEDITOR.replace('editor1');
    $( "#drag_me" ).draggable({ cancel: "div.note_nav" });
</script>