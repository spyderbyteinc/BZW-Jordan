<?php include "includes/header.php"; ?>

<div id="create_bug_background" class="modal_bg">
    <div id="create_bug_modal" class="modal">
        <h3 class="create_bug_title modal_heading">Create a Bug</h3>

        <form action="bug_submit.php" id="bug_submit" name="bug_submit" method="post" enctype="multipart/form-data">
            <label for`="bug_title">Title:</label>
            <input type="text" name="bug_title" id="bug_title" placeholder="Bug Title" required>

            <label for="bug_url">URL:</label>
            <input type="text" name="bug_url" id="bug_url" placeholder="Bug URL">

            <label for="bug_description">Description:</label>
            <textarea name="bug_description" id="bug_description" placeholder="Bug Description" required></textarea>

            <label for="bug_pictures">Bug Pictures:</label>
            <input type="file" name="files[]" id="bug_pictures" multiple>

            <input type="hidden" name="submit" value="1">

            <div class="category_buttons">
                <!-- <a id="save_bug" class="bidzbutton devart" href="javascript:{}" onclick="document.getElementById('bug_submit').submit;">Save</a> -->
                <input type="submit" value="Save" class="bidzbutton devart" style="width:auto">
                <a id="cancel_bug" href="#" class="bidzbutton orange cancel">Cancel</a>
            </div>
        </form>
    </div>
</div>
        <main id="content" class="bugs_table">
            <h1 class="page_heading">Bug Tracker - Listing</h1>

            <div class="top_button">
                <a href="#" id="create_bug_report" class="bidzbutton create_button medblue"><i class="fas fa-plus"></i> Create Bug</a>
            </div>

            <h2 class="center subtitle">Open Bugs</h2>
            <table class="table table-striped mt-5 ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>URL</th>
                        <th>Author</th>
                        <th>View Bug</th>
                        <th>Mark Done</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                        $sql = "SELECT * FROM `bugs` WHERE `done`=0";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                            $title = $row['title'];
                            $url = $row['url'];
                            $author = $row['author'];

                            ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $url; ?></td>
                                <td><?php echo $author; ?></td>
                                <td><a href="view_bug.php?id=<?php echo $id; ?>" class="bidzbutton orange">View</a></td>
                                <td><a href="bug_mark.php?id=<?php echo $id; ?>" class="bidzbutton xbox">Mark as Done</a></td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>

            <br><br><br><br><br>

            <h2 class="center subtitle">Closed Bugs</h2>
            <table class="table table-striped mt-5 ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>URL</th>
                        <th>Author</th>
                        <th>View Bug</th>
                        <th>Mark Done</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                        $sql = "SELECT * FROM `bugs` WHERE `done`=1";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $title = $row['title'];
                            $url = $row['url'];
                            $author = $row['author']; ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $url; ?></td>
                                <td><?php echo $author; ?></td>
                                <td><a href="view_bug.php?id=<?php echo $id; ?>" class="bidzbutton orange">View</a></td>
                                <td><a href="bug_mark.php?id=<?php echo $id; ?>" class="bidzbutton red">Mark as Undone</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                </tbody>
            </table>

            <br><br><br><br><br>
        </main>


<?php include "includes/footer.php"; ?>
<script>
    $("#cancel_bug").click(function(e){
        e.preventDefault();

        $("#create_bug_background").css("display", "none");
    });


    $("#create_bug_report").click(function(e){
        e.preventDefault();

        $("#create_bug_background").css("display", "block");
    });
</script>