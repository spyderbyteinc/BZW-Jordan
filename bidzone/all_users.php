<?php include "includes/header.php"; ?>

        <main id="content" class="seller_table">
            <h1 class="page_heading">All Users</h1>

            <div class="input_holder">
                <div class="signup_group">
                    <label class="input_label" for="filter">Filter Through Users</label>
                    <input class="input_text" type="text" name="filter" id="filter" placeholder="Type For Filter">
                </div>
            </div>
            
            <div class="flexible flexible_anom" id="buyer_label"><a href="#" class="dropper" id="toggle_buyer"><h2 class="page_heading2">Buyers</h2><span class="icon up"><i class="fas fa-sort-up"></i></span><span class="icon down"><i class="fas fa-sort-down"></i></span></a></div>
            <div id="table_buyer">
                <table id="" class="table table-striped mt-5">
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
                            $sql = "SELECT * FROM `users` WHERE `seller`=0";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                                    $id = $row['id'];
                                    $first_name = $row['first_name'];
                                    $last_name = $row['last_name'];
                                    $username = $row['username'];
                                    $email = $row['email'];
                                    $phoneNumber = $row['phoneNumber'];
                                ?>
                        <tr>
                            <td class="id_col"><?php echo $id; ?></td>
                            <td><?php echo $first_name; ?></td>
                            <td><?php echo $last_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $phoneNumber; ?></td>
                            <td class="view_record"><a href="user_buyer.php?id=<?php echo $id; ?>" class="btn btn-warning">View Record</a></td>
                        </tr>
                        
                        <?php } ?>
                        
                    </tbody>
                </table>
            </div>

            
            <div class="flexible flexible_anom" id="seller_label"><a href="#" class="dropper" id="toggle_seller"><h2 class="page_heading2">Sellers</h2><span class="icon up"><i class="fas fa-sort-up"></i></span><span class="icon down"><i class="fas fa-sort-down"></i></span></a></div>
            <div id="table_seller">
            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Verified?</th>
                    </tr>
                </thead>
                <tbody>
                        <?php 
                            $sql = "SELECT * FROM `users` WHERE `seller`=1";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                                    $id = $row['id'];
                                    $first_name = $row['first_name'];
                                    $last_name = $row['last_name'];
                                    $username = $row['username'];
                                    $email = $row['email'];
                                    $seller_auth = $row['seller_auth'];

                                    if($seller_auth == 1){
                                        $verified = "yes";
                                    }
                                    else{
                                        $verified = '<a href="#">no</a>';
                                    }
                                ?>
                        <tr>
                            <td class="id_col"><?php echo $id; ?></td>
                            <td><?php echo $first_name; ?></td>
                            <td><?php echo $last_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $verified; ?></td>
                            <td class="view_record"><a href="user_seller.php?id=<?php echo $id; ?>" class="btn btn-warning">View Record</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="flexible flexible_anom" id="house_label"><a href="#" class="dropper" id="toggle_house"><h2 class="page_heading2">House</h2><span class="icon up"><i class="fas fa-sort-up"></i></span><span class="icon down"><i class="fas fa-sort-down"></i></span></a></div>
            <div id="table_house">
                <table id="" class="table table-striped mt-5">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Owner</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM `house`";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                                    $id = $row['id'];
                                    $first_name = $row['first_name'];
                                    $last_name = $row['last_name'];
                                    $username = $row['username'];
                                    $email = $row['email'];
                                    $owner = $row['owner'];

                                    $owner_sql = "SELECT * FROM `users` WHERE `username`='$owner'";
                                    $owner_result = mysqli_query($conn, $owner_sql);
                                    $owner_row = mysqli_fetch_assoc($owner_result);
                                    $owner_id = $owner_row['id']; 
                                ?>

                                <tr>
                                    <td class="id_col"><?php echo $id; ?></td>
                                    <td><?php echo $first_name; ?></td>
                                    <td><?php echo $last_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td class="view_record"><a href="user_seller.php?id=<?php echo $owner_id; ?>" class="house_link"><?php echo $owner; ?></a></td>
                                    <td class="view_record"><a href="user_house.php?id=<?php echo $id; ?>" class="btn btn-warning">View Record</a></td>
                                </tr>

                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>


            <br><br><br><br><br><br><br>
        </main>
<?php include "includes/footer.php"; ?>
<!-- Handler Slide Up/Down -->
<script>
    var buyer_vis = true;
    var seller_vis = true;
    var house_vis = true;

    $("a#toggle_buyer").click(function(e){
        e.preventDefault();

        if(buyer_vis){
            buyer_vis = false;
            $("#table_buyer").slideUp("slow");
            $("#buyer_label").removeClass("flexible_anom");
            $("#buyer_label span.up").css("display", "none");
            $("#buyer_label span.down").css("display", "flex");
        }
        else{
            buyer_vis = true;
            $("#table_buyer").slideDown("slow");
            $("#buyer_label").addClass("flexible_anom");
            $("#buyer_label span.up").css("display", "flex");
            $("#buyer_label span.down").css("display", "none");
        }
    });
    $("a#toggle_seller").click(function(e){
        e.preventDefault();

        if(seller_vis){
            seller_vis = false;
            $("#table_seller").slideUp("slow");
            $("#seller_label").removeClass("flexible_anom");
            $("#seller_label span.up").css("display", "none");
            $("#seller_label span.down").css("display", "flex");
        }
        else{
            seller_vis = true;
            $("#table_seller").slideDown("slow");
            $("#seller_label").addClass("flexible_anom");
            $("#seller_label span.up").css("display", "flex");
            $("#seller_label span.down").css("display", "none");
        }
    });
    $("a#toggle_house").click(function(e){
        e.preventDefault();

        if(house_vis){
            house_vis = false;
            $("#table_house").slideUp("slow");
            $("#house_label").removeClass("flexible_anom");
            $("#house_label span.up").css("display", "none");
            $("#house_label span.down").css("display", "flex");
        }
        else{
            house_vis = true;
            $("#table_house").slideDown("slow");
            $("#house_label").addClass("flexible_anom");
            $("#house_label span.up").css("display", "flex");
            $("#house_label span.down").css("display", "none");
        }
    });
</script>
<!-- Filter through accounts via bar -->
<script>
    
    $("input#filter").keyup(function(){
        var val = $("input#filter").val().toLowerCase();
        filter("buyer", val);
        filter("seller", val);
        filter("house", val);
    });

    function filter(table, imp){
        var selector = "#table_" + table + " tbody tr";
        $(selector).each(function (i, row) {
            var match = false;

            $(this).find('td').each(function (j, cell) {
                var link_exists = $(this).hasClass("view_record");
                var id_exists = $(this).hasClass("id_col");
                if(!link_exists && !id_exists){
                    var innerText = $(this).html().toLowerCase();
                    
                    var inc = innerText.includes(imp);
                    if(inc){
                        match = true;
                        return;
                    }
                }
            });

            if(!match){
                $(this).hide();
            }
            else{
                $(this).show();
            }
        });
    }
</script>