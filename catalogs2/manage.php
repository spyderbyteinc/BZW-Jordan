<?php include "../includes/username.php"; ?>
<?php
    if($username == "" || !isset($username)){
        header("location: ../index.php");
        exit();
    }

    if(isset($_GET['creation'])){
        $creation = $_GET['creation'];
        if($creation == 1){
            ?>
            <script>
                alert("Catalog successfully created");
            </script>
            <?php
        }
    }

    if(isset($_GET['edit'])){
        $edit = $_GET['edit'];
        if($edit == 1){
            ?>
            <script>
                alert("Catalog successfully updated");
            </script>
            <?php
        }
    }
?>
<?php include "../includes/header.php"; ?>

<?php
    include "../helpers/date_conversion.php";
    include "../includes/connect.php";

    $catalogs = array();

    $sql = "SELECT * FROM `catalogs` WHERE `owner`='$username'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $line = $row['id'] . "^^" . $row['catalog_name'] . "^^" . $row['auction_type'] . "^^" . $row['catalog_description'] . "^^" . $row['start_date'] . "^^" . $row['end_date'] . "^^" . $row['asset_location_1'] . "^^" . $row['asset_location_2'] . "^^" . $row['asset_location_3'] . "^^" . $row['asset_location_4'] . "^^" . $row['asset_location_5'];
        array_push($catalogs, $line);
    }
?>

<div class="catalog_creation_header">
    <h2 class="house_heading section_heading"><span>Manage Catalogs</span></h2>
</div>

<div class="create_button_container">
    <a href="create.php" class="bidzbutton create_button"><i class="fas fa-plus"></i> Create a Catalog</a>
</div>

 <div id="manage_catalog_container">
    <div id="manage_catalog_list">
        <?php foreach($catalogs as $cat) : ?>
            <?php
                $comps = explode("^^", $cat);
                $id = $comps[0];
                $catalog_name = $comps[1];
                $auction_type = ucfirst($comps[2]);
                $catalog_description = $comps[3];
                $start_date = sql_to_date($comps[4]);
                $end_date = sql_to_date($comps[5]);
            ?>
            <div class="catalog_item">
                <div class="auction_image_cube">
                    Picture Cube
                </div>

                <div class="details_and_actions">
                    <div class="catalog_details">
                        <div class="row bold">
                            <span><?php echo $catalog_name; ?></span>
                            <span><span class="color_chocolate"><?php echo $auction_type; ?></span> Auction</span>
                            <span><span class="color_chocolate">0</span> Lots</span>
                        </div>
                        <div class="row">
                            <p class="font-18"><?php echo $catalog_description; ?></p>
                        </div>

                        <hr class="border_chocolate">
                        <hr class="border_black">


                        <div class="row bold">
                            <span>Location: <span class="color_chocolate">South Lyon, MI</span></span>
                            <span class="color_black">View all locations</span>
                        </div>
                        
                        <hr class="border_chocolate">
                        <hr class="border_black">

                        

                        <div class="row bold">
                            <span>Bidding Starts: <span class="color_chocolate"><?php echo $start_date; ?></span></span>
                            <span>Bidding Ends: <span class="color_chocolate"><?php echo $end_date; ?></span></span>
                        </div>
                    </div>
                    
                    <hr class="border_chocolate">
                        <hr class="border_black">

                    <div class="catalog_buttons">
                        <a href="<?php echo $root; ?>lots/manage.php?cat_id=<?php echo $id; ?>" class="bidzbutton chocolate catalog_actions"><i class="fas fa-tasks special"></i> <span>Add/Manage Lots</span></a>
                        <a href="#" class="bidzbutton catalog_actions chocolate"><i class="fas fa-random"></i> <span>Sort Lots</span></a>
                        <a href="edit.php?catalog_id=<?php echo $id; ?>" class="bidzbutton catalog_actions chocolate"><i class="fas fa-edit"></i><span>Edit Catalog Details</span></a>
                        <a href="#" class="bidzbutton devart catalog_actions"><i class="fas fa-upload"></i><span>Publish</span></a>
                    </div>
                </div>
            </div>
        <?php endforeach ; ?>
        
    </div>
 </div>

<?php include "../includes/footer.php"; ?>