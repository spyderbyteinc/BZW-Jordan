<?php
    if ($_SERVER['http'] != "on") {
        $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        header("Location: $url");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Capture Mobile</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />-->
    <style type="text/css">
        #results { padding:20px; text-align:center; }
    </style>

    <style>
            video{
                width: 100% !important;
                height: 750px !important;
            }
            #my_camera{
                width: 100% !important;
                height: 750px !important;
            }
            #capture{
                margin: auto;
                text-align:center;
                width: 100%;
            }

            #result{
                margin:auto;
                margin-top: 50px;
            }
            div#results{
                font-size: 60px;
            }
            #submit_button{
                text-align: center;
                margin-top: 50px;
            }
            .submit_button{
                font-size: 75px;
                padding: 10px;
            }
    </style>

</head>
<body>
  
<div class="container">
    <form method="POST" action="storeImage.php">
        <div class="row">
            <div id="capture">
                <div id="my_camera"></div>
                <br/>
                <input type=button class="submit_button" value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div id="result">
                <div id="results">Your captured image will appear here...</div>
            </div>
        </div>
            <div id="submit_button">
                <button class="submit_button btn btn-success">Submit</button>
            </div>
    </form>
</div>
  
<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90,
        flip_horiz: true,
        constraints: {
            video: true,
            facingMode: "environment"
        }
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
 
</body>
</html>