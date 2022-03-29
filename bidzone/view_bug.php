<?php
    if(!isset($_GET['id']) | $_GET['id'] == ""){
        header("location: bugs.php");
        exit();
    }
    else{
        $id = $_GET['id'];
    }

    include "includes/connect.php";

    $sql = "SELECT * FROM `bugs` WHERE `id`=$id";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if($num == 0){
        header("location: bugs.php");
        exit();
    }

    $row = mysqli_fetch_assoc($result);

    $title = $row['title'];
    $url = $row['url'];
    $author = $row['author'];
    $description = $row['description'];
    $pictures = $row['pictures'];
    $done = $row['done'];

    $pics = explode("??||&&", $pictures);
?>
<?php include "includes/header.php"; ?>

<main id="content" class="bugs_table">
    <h1 class="page_heading">Bug Details</h1>
    <div class="top_button">
        
        <a href="#" id="go_back_button" class="bidzbutton create_button orange">Back to Bug Tracker</a>
        <?php if($done == 0) : ?>
            <a href="bug_mark.php?id=<?php echo $id; ?>" class="bidzbutton xbox" id="mark_as_done">Mark as Done</a>
        <?php else : ?>
            <a href="bug_mark.php?id=<?php echo $id; ?>" class="bidzbutton red" id="mark_as_done">Mark as Undone</a>
        <?php endif ; ?>

    </div>
    <h2 class="bug_title"><strong>Title:</strong> <?php echo $title; ?></h2>
    <h3 class="bug_author"><strong>Author:</strong> <?php echo $author; ?></h3>
    <h3 class="bug_author"><strong>URL:</strong> <?php echo $url; ?></h3>


    <p class="bug_description"><strong>Description:</strong> <?php echo $description; ?></p>

    <h3 class="bug_title"><strong>Pictures:</strong></h3>
    <?php
        foreach($pics as $image){
            if($image != ""){
                ?>
                <img class="bug_picture" src="<?php echo $image; ?>" alt="Bug picture">
                <br>
                <?php
            }
        }
    ?>
</main>

<?php include "includes/footer.php"; ?>