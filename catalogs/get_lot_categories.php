<?php include "../includes/username.php"; ?>
<?php include "../includes/connect.php"; ?>

<?php
    // Get lot id from ajax request
    if(isset($_POST['lot'])){
        $lot_id = $_POST['lot'];
    }
    else{
        $loc = "location: " . $root . "catalogs/manage.php";
    }




    // Handle lot category for popup
    $cat = $_SESSION['lot_catalog'];
    // Get all category values
    $cat_sql = "SELECT * FROM `lots` WHERE `id`=$lot_id AND `catalog_id`=$cat AND `owner`='$username'";
    $cat_result = mysqli_query($conn, $cat_sql);
    $cat_row = mysqli_fetch_assoc($cat_result);

    $category_arr = array();

    $cat1 = $cat_row['category1'];
    $cat2 = $cat_row['category2'];
    $cat3 = $cat_row['category3'];
    $cat4 = $cat_row['category4'];
    $catOther = $cat_row['other_category'];

    if($cat1 != ""){
        array_push($category_arr, $cat1);

    }

    if($cat2 != ""){
        array_push($category_arr, $cat2);

    }
    else{
        array_push($category_arr, -1);
    }

    if($cat3 != ""){
        array_push($category_arr, $cat3);

    }
    else{
        array_push($category_arr, -1);
    }

    if($cat4 != ""){
        array_push($category_arr, $cat4);

    }
    else{
        array_push($category_arr, -1);
    }

    if($catOther != ""){
        array_push($category_arr, $catOther);
    }
    else{
        array_push($category_arr, -1);
    }


    $category_list = array();
    for($c = 0; $c<count($category_arr); $c++){
        $category = $category_arr[$c];

        if($category == -1 || $category == "-1"){
            // ignore
        }
        else if($category === 0 || $category === "0"){
            // ignore
        }
        else{
            if($c == 0){
                $sql0 = "SELECT * FROM `cat_tier1` WHERE `id`=$category";
                $result0 = mysqli_query($conn, $sql0);
                $row0 = mysqli_fetch_assoc($result0);
                $item = $row0['name'];
            }
            else if($c == 1){
                $sql1 = "SELECT * FROM `cat_tier2` WHERE `id`=$category";
                $result1 = mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_assoc($result1);
                $item = $row1['name'];
            }
            else if($c == 2){
                $sql2 = "SELECT * FROM `cat_tier3` WHERE `id`=$category";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $item = $row2['name'];
            }
            else if($c == 3){
                $sql3 = "SELECT * FROM `cat_tier4` WHERE `id`=$category";
                $result3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($result3);
                $item = $row3['name'];
            }
            else if($c == 4){
                $item = $category;
            }

            array_push($category_list, $item);
        }
        
    }

    // ??||&& seperator
    $output = "";

    foreach($category_list as $cat){
        $output = $output . "??||&&" . $cat;
    }

    echo $output;
?>