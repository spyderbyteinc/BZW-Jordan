<?php include "includes/header.php"; ?>

        <main id="content" class="seller_table">
            <h1 class="page_heading">Seller Approval - All Records</h1>

            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM `users` WHERE `seller`=1 AND (`seller_auth`=0 OR `seller_auth` = -1)";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                            $first_name = $row['first_name'];
                            $last_name = $row['last_name'];
                            $username = $row['username'];
                            $email = $row['email'];
                            $phone = $row['phoneNumber'];

                            $seller_auth = $row['seller_auth'];

                    ?>
                    <tr>
                        <th scope="row"><?php echo $id; ?></th>
                        <td><?php echo $first_name; ?></td>
                        <td><?php echo $last_name; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $phone; ?></td>

                        <?php if($seller_auth == 0) : ?>
                            <td><a href="seller_record.php?id=<?php echo $id; ?>" class="btn btn-warning">View Record</a></td>
                        <?php elseif($seller_auth == -1) : ?>
                            <td><a href="seller_record.php?id=<?php echo $id; ?>" class="btn btn-danger">Denied</a></td>
                        <?php endif ; ?>
                    </tr>
                    <?php 
                        }
                    ?>
                </tbody>
            </table>
            <br><br><br><br><br><br><br>
        </main>


<?php include "includes/footer.php"; ?>