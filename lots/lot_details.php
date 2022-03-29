<?php include "../includes/header.php"; ?>
<div id="note_modal">
    <div id="drag_me">
        <img src="http://bidzwon.com/dev/img/logo6.png" alt="BidZWon">
        <div class="note_label">
            <h2>Enter Notes For: Lot # / Lot Name</h2>
            <span>* You can drag this window around the screen</span>
        </div>
        <form action="" method="post">

            <textarea id="editor1" name="editor1" class="form-control"><?php echo $note_text; ?></textarea> 

            <div class="note_nav">
                <a class="bidzbutton black black_button note_modal_close" href="#">Close</a>
                <a class="bidzbutton medblue save_button" href="#">Save</a>
            </div>

            <input type="hidden" name="notes" value="1">
        </form>
    </div>
</div>

<div id="image_modal">
    <div id="image_container">

        <div class="nav_icon prev_icon" name="7"><i class="fas fa-arrow-circle-left"></i></div>
        
        <img src="<?php echo $root; ?>img/cube_pictures_test/1.png" class="main_picture deselect" name="1"  alt="Modal Image">

        
        <div class="nav_icon next_icon" name="2"><i class="fas fa-arrow-circle-right"></i></div>

        <div class="bottom_picture_list">
            <div class="picture_icons">
                <img class="bottom_picture deselect" name="0" src="<?php echo $root; ?>img/cube_pictures_test/1.png" alt="">
                <img class="bottom_picture deselect" name="1" src="<?php echo $root; ?>img/cube_pictures_test/2.png" alt="">
                <img class="bottom_picture deselect" name="2" src="<?php echo $root; ?>img/cube_pictures_test/3.png" alt="">
                <img class="bottom_picture deselect" name="3" src="<?php echo $root; ?>img/cube_pictures_test/4.png" alt="">
                <img class="bottom_picture deselect" name="4" src="<?php echo $root; ?>img/cube_pictures_test/5.jpg" alt="">
                <img class="bottom_picture deselect" name="5" src="<?php echo $root; ?>img/cube_pictures_test/6.png" alt="">
                <img class="bottom_picture deselect" name="6" src="<?php echo $root; ?>img/cube_pictures_test/7.png" alt="">
                <img class="bottom_picture deselect" name="7" src="<?php echo $root; ?>img/cube_pictures_test/3.png" alt="">
            </div>
        </div>
    </div>
</div>
<div id="lot_details_page">

    <h2 class="auctions section_heading"><span>Lot Details</span></h2>
    <div id="current_lot_info"> 
        <div class="lot_details">Lot #</div>
        <div class="lot_details">Lot Name</div>
        <div class="lot_details"><a href="#" class="catalog_name">Catalog Name</a></div>
        <div class="lot_details">Timed Auction</div>
    </div>

    <div id="lot_category">
        <ul id="category_display">
            <li class="static_category_label">Category: </li>
            <li>Category 1 &rarr;</li>
            <li>Category 2 &rarr;</li>
            <li>Category 3 &rarr;</li>
            <li>Category 4</li>
        </ul>
    </div>
    <div id="lot_description">
        <span class="lot_desc">Lot Description:</span> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis ullam mollitia, reprehenderit esse harum minima sit facilis consectetur excepturi nemo velit eligendi libero tenetur, nisi explicabo fugit quibusdam vero accusantium?
    </div>
    
    
    <h2 class="auctions section_heading"><span>Bidding</span></h2>

    <div id="bidding">
        <div class="bid_left">
            <div class="take_notes">
                <span class="click"><a class="open_notes" href="#">Click Here</span></a> to Create / Edit Notes For This Lot
            </div>
            <div class="lot_navigation_left">
                <a href="" class="lot_nav nav_left"><span>&larr; Prevous Lot (# 28)</span></a>
                <a href="" class="lot_nav nav_right"><span>Next Lot (# 30) &rarr;</span></a>
            </div>
            <div class="carousel-demo"></div>
            <div class="carousel_pictures">
                <div class="picture_table">
                    <div class="picture_row">
                        <div class="picture_cell"><img name="0" class="thumbnail" src="<?php echo $root; ?>img/cube_pictures_test/1.png" alt="Image 1"></div>
                        <div class="picture_cell"><img name="1"   class="thumbnail" src="<?php echo $root; ?>img/cube_pictures_test/2.png" alt="Image 1"></div>
                        <div class="picture_cell"><img name="2"   class="thumbnail" src="<?php echo $root; ?>img/cube_pictures_test/3.png" alt="Image 1"></div>
                    </div>
                    <div class="picture_row">
                        <div class="picture_cell"><img name="3"  class="thumbnail"  src="<?php echo $root; ?>img/cube_pictures_test/4.png" alt="Image 1"></div>
                        <div class="picture_cell"><img name="4"   class="thumbnail" src="<?php echo $root; ?>img/cube_pictures_test/5.jpg" alt="Image 1"></div>
                        <div class="picture_cell"><img name="5"   class="thumbnail" src="<?php echo $root; ?>img/cube_pictures_test/6.png" alt="Image 1"></div>
                    </div>
                    <div class="picture_row">
                        <div class="picture_cell"><img name="6"  class="thumbnail"  src="<?php echo $root; ?>img/cube_pictures_test/7.png" alt="Image 1"></div>
                        <div class="picture_cell"><img name="7"  class="thumbnail"  src="<?php echo $root; ?>img/cube_pictures_test/3.png" alt="Image 1"></div>
                        <div class="picture_cell"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bid_right">

            <div class="current_info">
                <div class="bid_status">
                    <h3 class="outbid_message">You Have Been <span class="color_red bold">Outbid</span></h3>
                    <h3 class="winning_message">You Are the <span class="color_green bold">High Bidder</span></h3>
                    <h3 class="open_message">This Lot is Open For Bidding</h3>
                </div>
                <div class="current_info_table">
                    <div class="current_info_row">
                        <div class="current_info_cell current_info_left">
                            Current Bid :
                        </div>
                        <div class="current_info_cell current_info_right">
                            $11.00
                        </div>
                    </div>

                    <div class="current_info_row">
                        <div class="current_info_cell current_info_left">
                            Ends In : 
                        </div>
                        <div class="current_info_cell current_info_right">
                            1 day, 3 hours, 26 minutes, 30 seconds
                        </div>
                    </div>

                    <div class="current_info_row">
                        <div class="no_bottom_border current_info_cell current_info_left">
                            Starts On : 
                        </div>

                        <div class="no_bottom_border current_info_cell current_info_right">
                            8/24/2019 @ 3:00PM (EST)
                        </div>
                    </div>
                </div>
                
                <div class="lot_info_table">
                    <div class="lot_info_row">
                        <div class="lot_info_cell large_cell cell_caption">Starting Bid :</div>
                        <div class="lot_info_cell second_cell">$5.00</div>
                        <div class="lot_info_cell cell_caption">Bid Increment :</div>
                        <div class="lot_info_cell second_cell"">$5.00</div>
                    </div>
                    <div class="lot_info_row">
                        <div class="lot_info_cell large_cell cell_caption">Buyer's Premium :</div>
                        <div class="lot_info_cell second_cell">18.00%</div>
                        <div class="lot_info_cell cell_caption">Tax on Hammer :</div>
                        <div class="lot_info_cell second_cell"">6.0%</div>
                    </div>
                    <div class="lot_info_row">
                        <div class="lot_info_cell large_cell cell_caption">High Bidder :</div>
                        <div class="lot_info_cell second_cell">J****n</div>
                        <div class="lot_info_cell cell_caption">Bid History :</div>
                        <div class="lot_info_cell second_cell">3 Bids</div>
                    </div>
                </div>

            </div>
            <!--
            <h2 class="bid_label">Current Bid : <span class="color_chocolate black_border">$11.00</span></h2>
            <h2 class="bid_label time_remaining">Ends In: <span class="color_chocolate black_border">1 day, 3 hours, 26 minutes, 30 seconds</span></h2>
            <h2 class="bid_label">Starts On: <span class="color_chocolate black_border">8/24/2019 @ 3:00PM (EST)</span></h2>
-->
            <hr class="border_chocolate" />
            <hr class="border_black" />

            <div class="bidding_buttons">
                <div class="bid_labels">
                    <span class="bid_proxy_label">Bid</span>
                </div>

                <div class="bid_inputs">
                    <input type="text" class="input_text lot_input" id="proxybid" name="proxybid" placeholder="Enter A Minimum Bid">
                </div>

                <div class="bid_labels bid_currency_labels">
                    <span class="currency_label_lot">$ (USD)</span>
                </div>

                <div class="bid_button">
                    <a href="#" class="btn place_bid">Place Bid</a>
                </div>
            </div>
            <!--
            <div class="lot_bidding_info_table">
                <div class="lot_bidding_row">
                    <div class="lot_cell">Starting Bid: $5.00</div>
                    <div class="lot_cell">Bid Increment: $5.00</div>
                </div>
                <div class="lot_bidding_row">
                    <div class="lot_cell">Buyer's Premium 18.00%</div>
                    <div class="lot_cell">Sale's Tax: 6.0%</div>
                </div>
                <div class="lot_bidding_row">
                    <div class="lot_cell">High Bidder: Jordan/ j****n</div>
                    <div class="lot_cell">Bid History: 3 Bids</div>
                </div>
            </div>
            -->
            <br/>
            <hr class="border_chocolate" />
            <hr class="border_black" />
            <br/>
            <div class="lot_participation_buttons">
                <div class="register_button">
                    <a class="bidzbutton" href="#"><i class="far fa-check-circle"></i> Register To Bid</a>
                </div>

                <div class="watch_button">
                    <a class="bidzbutton devart" href="#">Watch Lot <i class="far fa-eye"></i></a>
                </div>
            </div>
            <div class="number_watching">
                <span class="color_chocolate">32 Users</span> Watching This Item
            </div>
        </div>
    </div>

    <!--
    -->

    <div id="auction_information">

        <ul id="nav_tabs">
            <li class="nav_item active"><a href="#" id="module1" class="nav_link">Auctioneer Information and Lot Details</a></li>
            <li class="nav_item"><a href="#"  id="module2" class="nav_link">Contact Information and Asset Location</a></li>
            <li class="nav_item"><a href="#" id="module3" class="nav_link">Inspection and Removal Times</a></li>
            <li class="nav_item"><a href="#" id="module4" class="nav_link">Terms and Conditions</a></li>
        </ul>
    </div>
    <div class="ourmodule" id="auctioneer_and_asset">
        <div id="auctioneer_info">
            <h4 class="sign_heading"><span>Auctioneer Information</span></h4>

            <div id="auctioneer_name_and_logo">
                <h4 class="auctioneer_name">Crazy Auctioneers</h4>
                
                <img src="https://cdn.globalauctionplatform.com/e8969fb0-f056-4154-bbd2-a28a0050dbc5/logo/simple%20furrow%20logo%20for%20bidspotter.jpg" alt="Auctioneer Logo" class="auctioneer_logo">

                <hr class="border_chocolate" />
                <hr class="border_black" />

                <div class="affiliation_label">
                    <span>Affiliations</span>
                </div>
                <div id="affiliations">
                    <img src="http://bidzwon.com/dev/img/cube_pictures_test/3.png" alt="" class="aff">
                    <img src="http://bidzwon.com/dev/img/cube_pictures_test/4.png" alt="" class="aff">
                    <img src="http://bidzwon.com/dev/img/cube_pictures_test/7.png" alt="" class="aff">
                </div>
                
                <hr class="border_chocolate" />
                <hr class="border_black" />

                <span class="color_chocolate auctioneer_phone">248-912-7636</span>
                <a href="#" class="auctioneer_website">Visit Auctioneer Webiste</a>
            </div>

        </div>

        <div id="lot_details">
            <h4 class="sign_heading"><span>Additional Lot Details</span></h4>

            Lot Details go here
        </div>
    </div>

    <div class="ourmodule" id="contact_and_asset_location">
        <div id="asset_location">
            <h4 class="sign_heading"><span>Asset Location</span></h4>

            <div class="address">
               <div>10137 Devonshire, Suite 3051</div>
               
               <div>South Lyon, MI, 48178</div>
            </div>
            <?php $address = '10137 Devonshire, South Lyon, MI, 48178' ; /* Insert address Here */

            echo '<iframe width="100%" height="425" frameborder="0" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace(",", "", str_replace(" ", "+", $address)) . '&z=14&output=embed"></iframe>';
                            ?>

            <div id="currency_and_timezone">
                <div class="currency">Currency: <span class="color_chocolate">USD ($)</span></div>
                <div class="timezone">Timezone: <span class="color_chocolate">Eastern Standard Time (EST)</span></div>
            </div>
        </div>
        <div id="contact_information">
            <h4 class="sign_heading"><span>Contact Details</span></h4>

            <div id="contact_table">
                <div class="contact_header">
                    <div class="contact_name">
                        Contact Name
                    </div>
                    <div class="contact_phone">
                        Contact Phone Number
                    </div>
                </div>
                <div class="contact_record">
                    <div class="contact_name">Billy Bob</div>
                    <div class="contact_phone">123123121</div>
                </div>
                <div class="contact_record">
                    <div class="contact_name">Walter White</div>
                    <div class="contact_phone">123123121</div>
                </div>
                <div class="contact_record">
                    <div class="contact_name">Jake the Snake</div>
                    <div class="contact_phone">123123121</div>
                </div>
                <div class="contact_record">
                    <div class="contact_name">Spongebob</div>
                    <div class="contact_phone">123123121</div>
                </div>
                <div class="contact_record">
                    <div class="contact_name">Stephanie</div>
                    <div class="contact_phone">123123121</div>
                </div>
                <div class="contact_record">
                    <div class="contact_name">Johnathan</div>
                    <div class="contact_phone">123123121</div>
                </div>
            </div>
        </div>
    </div>

    <div class="ourmodule" id="inspection_and_removal">
        <div id="inspection_times">

            <h4 class="sign_heading"><span>Inspection Details</span></h4>

            <div id="inspection_table">
                <div class="inspection_header">
                    <div class="insp_cell_head">Inspection Date</div>
                    <div class="insp_cell_head">Start Time</div>
                    <div class="insp_cell_head">End Time</div>
                </div>
                <div class="inspection_row">
                    <div class="inspection_cell">8/4/2020</div>
                    <div class="inspection_cell">8:00 AM</div>
                    <div class="inspection_cell">2:00 PM</div>
                </div>
                <div class="inspection_row">
                    <div class="inspection_cell">8/9/2020</div>
                    <div class="inspection_cell">8:00 AM</div>
                    <div class="inspection_cell">2:00 PM</div>
                </div>
                <div class="inspection_row">
                    <div class="inspection_cell">8/5/2020</div>
                    <div class="inspection_cell">8:00 AM</div>
                    <div class="inspection_cell">2:00 PM</div>
                </div>
                <div class="inspection_row">
                    <div class="inspection_cell">8/12/2020</div>
                    <div class="inspection_cell">8:00 AM</div>
                    <div class="inspection_cell">2:00 PM</div>
                </div>
                <div class="inspection_row">
                    <div class="inspection_cell">8/15/2020</div>
                    <div class="inspection_cell">8:00 AM</div>
                    <div class="inspection_cell">2:00 PM</div>
                </div>
                <div class="inspection_row">
                    <div class="inspection_cell">8/20/2020</div>
                    <div class="inspection_cell">8:00 AM</div>
                    <div class="inspection_cell">2:00 PM</div>
                </div>
                <div class="inspection_row">
                    <div class="inspection_cell">8/22/2020</div>
                    <div class="inspection_cell">8:00 AM</div>
                    <div class="inspection_cell">2:00 PM</div>
                </div>
                <div class="inspection_row">
                    <div class="inspection_cell">8/25/2020</div>
                    <div class="inspection_cell">8:00 AM</div>
                    <div class="inspection_cell">2:00 PM</div>
                </div>
            </div>
        </div>

        <div id="removal_times">

            <h4 class="sign_heading"><span>Removal Details</span></h4>

            <div id="removal_table">
                <div class="removal_header">
                    <div class="remove_cell_head">Removal Date</div>
                    <div class="remove_cell_head">Start Time</div>
                    <div class="remove_cell_head">End Time</div>
                </div>
                <div class="removal_row">
                    <div class="removal_cell">8/25/2020</div>
                    <div class="removal_cell">8:00 AM</div>
                    <div class="removal_cell">2:00 PM</div>
                </div>
                <div class="removal_row">
                    <div class="removal_cell">8/25/2020</div>
                    <div class="removal_cell">8:00 AM</div>
                    <div class="removal_cell">2:00 PM</div>
                </div>
                <div class="removal_row">
                    <div class="removal_cell">8/25/2020</div>
                    <div class="removal_cell">8:00 AM</div>
                    <div class="removal_cell">2:00 PM</div>
                </div>
                <div class="removal_row">
                    <div class="removal_cell">8/25/2020</div>
                    <div class="removal_cell">8:00 AM</div>
                    <div class="removal_cell">2:00 PM</div>
                </div>
                <div class="removal_row">
                    <div class="removal_cell">8/25/2020</div>
                    <div class="removal_cell">8:00 AM</div>
                    <div class="removal_cell">2:00 PM</div>
                </div>
                <div class="removal_row">
                    <div class="removal_cell">8/25/2020</div>
                    <div class="removal_cell">8:00 AM</div>
                    <div class="removal_cell">2:00 PM</div>
                </div>
            </div>
        </div>
    </div>

    <div class="ourmodule" id="terms_and_conditions">
        <h4 class="sign_heading"><span>Terms & Conditions</span></h4>

        <p class="terms">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste ea incidunt ab aliquid expedita similique illo! Recusandae tempore commodi, dolore, sapiente deserunt consectetur, nulla atque dolor facere doloribus obcaecati est dicta amet ut ullam sint quasi. Quam minima iste atque qui quas. Suscipit odio explicabo pariatur aliquid esse placeat quae quisquam reprehenderit, non cum illum incidunt sequi nostrum labore. Repudiandae saepe tempore provident deserunt, beatae optio quas quibusdam quaerat assumenda perferendis dolores labore dicta asperiores dolorem ex hic est. Placeat quos repellat consequuntur quia, dolor similique sunt natus consectetur magni quod delectus cumque reiciendis! Deserunt cumque natus dignissimos nihil aut animi itaque ullam, et repudiandae debitis voluptatibus atque doloremque porro maiores dolore nisi soluta fuga ducimus distinctio sapiente? Iste id minima, at alias aut fugit, maxime voluptate sapiente architecto dicta eius sequi suscipit dolore autem magni molestias! Repellendus neque laudantium possimus fugit soluta voluptas voluptatum assumenda, vitae iure quod ea at vero laborum officiis commodi adipisci accusantium aliquid eligendi. Quo iste eveniet velit dolorem quis voluptatum nam, odio at libero enim perspiciatis explicabo. Explicabo quia sed alias rerum qui cupiditate harum non fugiat architecto quas nulla id odit reiciendis reprehenderit, laboriosam itaque perspiciatis! Ipsam, aut deserunt? Commodi repellendus itaque asperiores.s</p>
    </div>
</div>

<?php include "../includes/footer.php"; ?>

<script>

var grabber = [
    '<?php echo $root; ?>img/cube_pictures_test/1.png',
    '<?php echo $root; ?>img/cube_pictures_test/2.png',
    '<?php echo $root; ?>img/cube_pictures_test/3.png',
    '<?php echo $root; ?>img/cube_pictures_test/4.png',
    '<?php echo $root; ?>img/cube_pictures_test/5.jpg',
    '<?php echo $root; ?>img/cube_pictures_test/6.png',
    '<?php echo $root; ?>img/cube_pictures_test/7.png',
    '<?php echo $root; ?>img/cube_pictures_test/3.png',
];

var slides = [
    {src: '<?php echo $root; ?>img/cube_pictures_test/1.png'},
    {src: '<?php echo $root; ?>img/cube_pictures_test/2.png'},
    {src: '<?php echo $root; ?>img/cube_pictures_test/3.png'},
    {src: '<?php echo $root; ?>img/cube_pictures_test/4.png'},
    {src: '<?php echo $root; ?>img/cube_pictures_test/5.jpg'},
    {src: '<?php echo $root; ?>img/cube_pictures_test/6.png'},
    {src: '<?php echo $root; ?>img/cube_pictures_test/7.png'},
    {src: '<?php echo $root; ?>img/cube_pictures_test/3.png'}
];

var end = grabber.length -1;

CKEDITOR.replace('editor1');
$( "#drag_me" ).draggable({ cancel: "div.note_nav" });

var myCarousel = $('.carousel-demo').jR3DCarousel({
  width : 600,        
  height: 450,    
  autoplay: true,
  slides: slides,
  animationInterval: 1500,
  animation: "slide3D"
});


$( ".thumbnail" ).hover(
  function() {
    var name = $(this).attr("name");
    myCarousel.showSlide(name);
    myCarousel.pauseCarousel();
  }, function() {
    myCarousel.playCarousel();
  }
);

window.onblur = function(){
    myCarousel.pauseCarousel();
};

window.onfocus = function(){
    myCarousel.playCarousel();
};


$( ".carousel-demo" ).hover(
  function() {
    myCarousel.pauseCarousel();
  }, function() {
    myCarousel.playCarousel();
  }
);

function navGallery(name){
    var v = name+1;
    $("#image_modal img.main_picture").attr("name",name);

    var next = v;
    if(next >= slides.length){
        next = 0;
    }
    $("#image_modal .next_icon").attr("name", next);
    var prev = v-2;
    if(prev < 1){
        prev = end;
    }
    $("#image_modal .prev_icon").attr("name", prev);

    picSelect();
}

$(".bottom_picture_list .picture_icons img.bottom_picture").click(function(){
    var name = $(this).attr("name");
    var sc = grabber[name];
    
    $("#image_modal img.main_picture").attr("src",sc);


    $("#image_modal img.main_picture").attr("name",name);
    
    var v = parseInt(name) + 1;
    var next = v;
    if(next >= slides.length){
        next = 0;
    }
    $("#image_modal .next_icon").attr("name", next);

    var prev = v-2;
    if(prev < 0){
        prev = end;
    }
    $("#image_modal .prev_icon").attr("name", prev);

    picSelect();
});

$(".jR3DCarouselSlide img").click(function(){
    var s = $(this).attr("src");
    $("#image_modal img.main_picture").attr("src",s);
    $("#image_modal").css("display", "block");

    var n = parseInt($(this).parent().prevAll().length);
    var v = n+1;
    $("#image_modal img.main_picture").attr("name",n);

    var next = v;
    if(next >= slides.length){
        next = 0;
    }
    $("#image_modal .next_icon").attr("name", next);
    var prev = v-2;
    if(prev < 1){
        prev = end;
    }
    $("#image_modal .prev_icon").attr("name", prev);


    picSelect();
});

$(".thumbnail").click(function(){
    var s = $(this).attr("src");
    $("#image_modal img.main_picture").attr("src",s);
    $("#image_modal").css("display", "block");

    var n = parseInt($(this).attr("name"));

    navGallery(n);
});

$(".prev_icon").click(function(){
    var name = parseInt($(this).attr("name"));
    var sc = grabber[name];
    $("#image_modal img.main_picture").attr("src",sc);

    navGallery(name);
});

$(".next_icon").click(function(){
    var name = parseInt($(this).attr("name"));
    var sc = grabber[name];
    $("#image_modal img.main_picture").attr("src",sc);

    navGallery(name);
});

function picSelect(){
    var current = $("#image_modal img.main_picture").attr("name");

    var c = parseInt(current);
    $(".bottom_picture_list .picture_icons").find("img").css("border", "3px solid black");
    $(".bottom_picture_list .picture_icons").find("img").eq(c).css("border", "3px solid chocolate");
}

var pic = document.getElementById('image_modal');

$(document).ready(function(){
    window.onclick = function(event) {
        if(event.target == pic){
            pic.style.display = "none";
        }
    }
});
$("a.nav_link").click(function(event){
    event.preventDefault();
    var cl = $(this).parent().hasClass("active");

    var one = $("#auctioneer_and_asset").css("display");
    var two = $("#contact_and_asset_location").css("display");
    var three = $("#inspection_and_removal").css("display");
    var four = $("#terms_and_conditions").css("display");

    var remove;
    if(one == "flex"){
        remove = "#auctioneer_and_asset";
    }
    else if(two == "flex"){
        remove = "#contact_and_asset_location";
    }
    else if(three == "flex"){
        remove = "#inspection_and_removal";
    }
    else if(four == "block"){
        remove = "#terms_and_conditions";
    }


    if(!cl){
        $("li.nav_item").removeClass("active");
        $(this).parent().addClass("active");
        var id = $(this).attr('id');

        if(id == "module1"){
            $("#auctioneer_and_asset").css("display", "flex");
        }
        else if(id == "module2"){
            $("#contact_and_asset_location").css("display", "flex");
        }
        else if(id == "module3"){
            $("#inspection_and_removal").css("display", "flex");
        }
        else if(id == "module4"){
            $("#terms_and_conditions").css("display", "block");
        }
        /*
        if(id == "module1"){
            $("#auctioneer_and_asset").slideDown({
                start: function () {
                    $(this).css({
                    display: "flex"
                    })
                }
            });
            //$("#auctioneer_and_asset").css("display", "flex");
        }
        else if(id == "module2"){
            $("#contact_and_asset_location").slideDown({
                start: function () {
                    $(this).css({
                    display: "flex"
                    })
                }
            });
            //$("#contact_and_asset_location").css("display", "flex");
        }
        else if(id == "module3"){
            $("#inspection_and_removal").slideDown({
                start: function () {
                    $(this).css({
                    display: "flex"
                    })
                }
            });
            //$("#inspection_and_removal").css("display", "flex");
        }
        else if(id == "module4"){
            $("#terms_and_conditions").slideDown({
                start: function () {
                    $(this).css({
                    display: "block"
                    })
                }
            });
            //$("#terms_and_conditions").css("display", "block");
        }*/
        
        $(remove).css("display", "none");
    }
});

$(".note_modal_close").click(function(){
    $("#note_modal").css("display","none");
});
$(".open_notes").click(function(){
    $("#note_modal").css("display","block");
});
</script>