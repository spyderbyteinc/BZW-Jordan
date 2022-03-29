<?php include "../includes/header.php"; ?>
<?php include "../includes/username.php"; ?>
<?php include "../includes/connect.php"; ?>
<?php include "../helpers/location_output.php"; ?>

<section class="seller_dashboard" id="seller_dashboard">

    <h2 class="auctions section_heading"><span>Seller Dashboard</span></h2>

    <div id="seller_dashboard_table">
        
<!-- Invoices
Category Tree
Manage Catalogs
Statistics
Instant Message
House Accounts
Cancelled Catalogs and Cancelled Lots
Registration Verification for Catalog
Request a category to be added to the tree -->

        <div id="seller_dashboard_table_left">
            <ul id="seller_dashboard_links">
                <li class="navlink active"><a href="#" name="catalog_registration"><i class="far fa-clipboard"></i> Catalog Registration</a></li>
                <li class="navlink"><a href="#" name="category_tree"><i class="fas fa-project-diagram"></i> Category Tree</a></li>
                <li class="navlink"><a href="#" name="manage_catalogs"><i class="fas fa-tasks"></i> Manage Catalogs</a></li>
                <li class="navlink"><a href="#" name="statistics"><i class="fas fa-chart-bar"></i> Statistics</a></li>
                <li class="navlink"><a href="#" name="instant_messaging"><i class="far fa-comments"></i> Instant Messaging</a></li>
                <li class="navlink"><a href="#" name="house_accounts"><i class="fas fa-network-wired"></i> House Accounts</a></li>
                <li class="navlink"><a href="#" name="invoices"><i class="fas fa-file-invoice-dollar"></i> Invoices</a></li>
                <li class="navlink"><a href="#" name="all_buyers"><i class="fas fa-users"></i> All Buyers</a></li>
            </ul>
        </div>

        <div id="seller_dashboard_table_right">
            <div id="catalog_registration_container" class="seller_dashboard_container">
                <?php include "seller_dashboard_modules/catalog_registration.php"; ?>
            </div>
            <div id="category_tree_container" class="seller_dashboard_container">
                hello world
            </div>
        </div>
    </div>
</section>

<?php include "../includes/footer.php"; ?>
<script>
    $(document).ready(function(){
        
        $('.seller_dashboard_container').each(function(i, obj) {
            $(this).css("display", "none");
        });
        
        var name = $("#seller_dashboard_links li.active a").attr("name");
        var show_id = "#" + name + "_container";
        $(show_id).css("display","block");
    });

    $(".navlink a").on("click", function(e){
        var active = $(this).parent().hasClass('active');
        if(active){
            return;
        }

        var name = $(this).attr("name");

        $('li.navlink').each(function(i, obj) {
            $(this).removeClass("active");
        });

        $(this).parent().addClass("active");

        $("#seller_dashboard_table_right").hide("slide", {direction: "left"}, 1500, function(){
            
            $('.seller_dashboard_container').each(function(i, obj) {
                $(this).css("display", "none");
            });

            var container_id = "#" + name + "_container";
            $(container_id).css("display", "block");
        });

        $("#seller_dashboard_table_right").show("slide", {direction: "left"}, 1500);


    });
</script>