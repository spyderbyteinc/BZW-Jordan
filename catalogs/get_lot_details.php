<?php include "../includes/username.php"; ?>
<?php include "../includes/connect.php"; ?>

<?php
    if(isset($_POST['catalog']) && isset($_POST['lot'])){
        $catalog_id = $_POST['catalog'];
        $lot_id = $_POST['lot'];
    }
    else{
        $loc = "location: " . $root . "catalogs/manage.php";
    }

    $sql = "SELECT * FROM `lots` WHERE `id`=$lot_id AND `catalog_id`=$catalog_id AND `owner`='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $lot_name = $row['name'];
    $lot_description = $row['description'];
    $starting_bid = $row['starting_bid'];
    $increment_type = $row['increment_type'];
    $bid_increment = $row['bid_increment'];
    $lot_tags = $row['tags'];

    $output = $lot_name . "??||&&" . $lot_description . "??||&&" . $starting_bid . "??||&&" . $increment_type . "??||&&" . $bid_increment . "??||&&" . $lot_tags;

    echo $output;
?>