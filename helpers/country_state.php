<?php
    include "../includes/connect.php";

    $all_states = array();

    $country_sql = "SELECT * FROM countries";
    $country_result = mysqli_query($conn, $country_sql);

    $country_codes = array();

    $country_string = "<option value=''>Select a Country</option>";

    $country_index = 0;

    while($row = mysqli_fetch_assoc($country_result)){
        
        $country_code = $row['country_code'];
        $country_name = $row['country_name'];

        $country_string = $country_string . "<option name='" . $country_index . "' value='" . $country_code . "'>" . $country_name . "</option>";

        array_push($country_codes, $country_code);
        $country_index++;
    }


    $state_index = 0;

    foreach($country_codes as $code){
        $state_sql = "SELECT * FROM states WHERE country='$code'";
        $state_result = mysqli_query($conn, $state_sql);

        $state_string = "<option class='select' value=''>Select a State/Province</option>";

        while($state_row = mysqli_fetch_assoc($state_result)){
            $state_code = $state_row['code'];
            $state_name = $state_row['name'];


            $state_string = $state_string . "<option name='" . $state_index . "' value='" . $state_code . "'>" . $state_name . "</option>";
        }

        $state_index++;

        $all_states[$code] = $state_string;
    }

?>
<script>
    var country_drop = "<?php echo $country_string; ?>";

    var all_states = new Array();
    var all_countries = new Array();

    <?php foreach($country_codes as $code) : ?>
        all_countries.push("<?php echo $code; ?>");
    <?php endforeach ; ?>

    <?php foreach($all_states as $st) : ?>
        all_states.push("<?php echo $st; ?>");
    <?php endforeach ; ?>

</script>