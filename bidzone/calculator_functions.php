<?php
    $operation = $_POST['operation'];
    $input = $_POST['input'];
    $other = $_POST['other'];

    if($operation == "timestamp_to_datestamp"){
        date_default_timezone_set($other);
        echo date('m/d/Y H:i:s', $input);
        exit();
    }
?>