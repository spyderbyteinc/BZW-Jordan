<?php
    include "../includes/connect.php";

    $start_time_string = "<option value=''>Start Time</option>";
    $end_time_string = "<option value=''>End Time</option>";
    
    $time_sql = "SELECT * FROM `time`";
    $time_result = mysqli_query($conn, $time_sql);


    while($row = mysqli_fetch_assoc($time_result)){
        $military_time = $row['military_time'];
        $display_time = $row['display_time'];
        
        $start_time_string = $start_time_string . "<option name='" . $military_time . "' value='" . $military_time . "'>" . $display_time . "</option>";

        
        $end_time_string = $end_time_string . "<option name='" . $military_time . "' value='" . $military_time . "'>" . $display_time . "</option>";
    }
?>
<script>
    var start_time = "<?php echo $start_time_string; ?>";
    var end_time = "<?php echo $end_time_string; ?>";
</script>