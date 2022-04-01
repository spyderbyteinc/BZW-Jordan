<?php include "includes/header.php"; ?>


<?php

if(isset($_GET['forgotten'])){
    $forgot = $_GET['forgotten'];

    if($forgot == "good"){
        ?>
        <script>
            alert("Password successfully changed!");
            window.location.href = "<?php echo $root; ?>";
        </script>
        <?php
    }
}

?>
    <section class="homepage_section" id="auctioneer_scroll">
        <h2 class="auctioneers section_heading"><span>Trusted Selling Partners</span></h2>

        <div id="auctioneer_scroll_area">
            <ul id="scroller">
                <li><img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" height="60px"></li>
                <li><img src="https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE2r0Th?ver=5b7d" height="60px"></li>
                <li><img src="https://www.wyattresearch.com/wp-content/uploads/2015/01/6_logo_predesign.jpg"  height="60px"></li>
                <li><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Facebook_New_Logo_%282015%29.svg/1280px-Facebook_New_Logo_%282015%29.svg.png" height="60px"></li>
                <li><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b3/Time_Magazine_logo.svg/1280px-Time_Magazine_logo.svg.png" height="60px"></li>
                <li><img src="https://www.catholiccharitiesdc.org/wp-content/uploads/2018/10/twitter-logo.png" height="60px"></li>
            </ul> 
        </div>
    </section>

    <br/>

    <section class="homepage_section" id="featured_auctions">
        <h2 class="auctions section_heading"><span>Featured Auctions</span></h2>

        <ul id="auction_categories">
            <li><a class="auc_cat" href="#">Industrial</a></li>
            <li><a class="auc_cat" href="#">Construction</a></li>
            <li><a class="auc_cat" href="#">Transportation</a></li>
            <li><a class="auc_cat" href="#">More</a></li>
        </ul>

        <div class="home_area" id="featured_actions_area"> 
            Featured Auction 1
        </div>
    </section>

    <br/>

    <section class="homepage_section" id="recently_viewed">
        <h2 class="auctions section_heading"><span>Recently Viewed</span></h2>

        <div class="home_area" id="recently_viewed_area"> 
            Recently Viewed 1
        </div>
        
    </section>

    <br/>

    <section class="homepage_section" id="watched_items">
        <h2 class="auctions section_heading"><span>Your Watched Items</span></h2>

        <div class="watched_area" id="watched_items_area"> 
            
            <div class="watching">
                Watched Lots
            </div>

            <div class="watching">
                Watched Auctions
            </div>
        </div>
        
    </section>

    <br/>

    <section class="homepage_section" id="recently_viewed">
        <h2 class="auctions section_heading"><span>Auto Search</span></h2>

        <div class="home_area" id="recently_viewed_area"> 
            Auto-search
        </div>
        
    </section>

<?php include "includes/footer.php"; ?>