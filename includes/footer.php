<?php
    $root = "http://localhost/bidzwon/";

?>
    <br/>

<?php
    $root = "http://localhost/bidzwon/";

    include $root . "includes/connect.php";
    include "global/asset_location_maps.php"; 

    // Login GET Processing
    if(isset($_GET['login'])){
        $login_option = $_GET['login'];

        if($login_option == 0){
            ?>
                <script>
                    
                    var login_modal = document.getElementById('login_modal');
                    // alert("User authentication failed");
                    login_modal.style.display = "block";
                </script>
            <?php
        }
        else if($login_option == 1 || $login_option == 2){
            ?>
                <script>
                    // alert("User authentication success");
                </script>
            <?php
        }
    }
?>
<footer id="footer">
    Footer Content Goes Here
</footer>
</body>

<script src="<?php echo $root; ?>js/jquery.js"></script>
<!-- <script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script> -->
<script src="<?php echo $root; ?>js/jquery_ui.js"></script>
<script src="<?php echo $root; ?>js/all.js"></script>
<script src="<?php echo $root; ?>js/infslider.js"></script>
<!-- <script src="<?php echo $root; ?>js/datepicker.min.js"></script> -->
<script src="<?php echo $root; ?>js/jR3DCarousel.js"></script>
<!-- <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script> -->

<script src="<?php echo $root;?>ckeditor/ckeditor.js"></script>
<script src="<?php echo $root; ?>js/script.js"></script>

<script>
    $(document).ready(function(){

        $("#account_links, .dropdown-content").hover(
            function() {
                document.getElementById("myDropdown").classList.toggle("show");
            }, function() {
                document.getElementById("myDropdown").classList.toggle("show");
            }
        );

        var picture_modal = document.getElementById('picture_modal_bg');
        var addLot_modal = document.getElementById('addLotModal_background');
        var login_modal = document.getElementById('login_modal');
        var sign_up_modal = document.getElementById('sign_up_modal');

        var account_links = document.getElementById('account_links');

        
        window.onclick = function(event) {
            /*
            if(event.target == login_modal){
                login_modal.style.display = "none";
            }
            
            else if(event.target == addLot_modal){
                addLot_modal.style.display = "none";
            }
            else if(event.target == picture_modal){
                picture_modal.style.display = "none";
            // }*/
            // if(event.target == account_links){
            //     console.log(event.target);
            // }
        }

        $("#cancel_lot_setup").click(function(e){
            e.preventDefault();
            addLot_modal.style.display = "none";
            return false;
        });

        $("#cancel_pictures").click(function(e){
            e.preventDefault();
            picture_modal.style.display = "none";
            return false;
        });

        $("#cancel_login").click(function(){
            login_modal.style.display = "none";
        });

        $(".login_open").click(function(){
            login_modal.style.display = "block";
        });

        // $(".sign_up_open").click(function(){
        //     sign_up_modal.style.display = "block";
        // });
        // $("#cancel_sign_up").click(function(){
        //     sign_up_modal.style.display = "none";
        // });
    });
</script>

<script>
    $("#remember_me_login").change(function(){
        if($("#remember_me_login").is(":checked")){
            $("#remem_checkbox").val("1");
        }
        else{
            $("#remem_checkbox").val("0");
        }
    });


    var password = document.querySelector( "#login_password" );

    $("#show_password span").click(function(e){
        e.preventDefault();

        $("#show_password").hide();

        $("#hide_password").css("display", "flex");

        password.type = "text";
    });
    
    $("#hide_password span").click(function(e){
        e.preventDefault();

        $("#show_password").css("display", "flex");

        $("#hide_password").hide();

        password.type = "password";
    });
    
    // function select_color(){
    //     $("select").css("color", '#666');

    //     $('select').each(function () {
    //         var v = $(this).val();
    //         if(v != ""){
    //             $(this).css("color", "black");
    //         }
    //     });

    //     $('select').on('change', function(){ //attach event handler to select's change event. 
    //                                         //use a more specific selector

    //         if ($(this).val() === ""){ //checking to see which option has been picked

    //             $(this).css("color", '#666"'); 
    //         } else {                   // add or remove class accordingly
    //             $(this).css("color", 'black'); 
    //         }

    //     });
    // }

    $(document).ready(function(){
        
        $("select").css("color", '#666');

        $('select').each(function () {
            var v = $(this).val();
            if(v != ""){
                $(this).css("color", "black");
            }
        });

        $('select').on('change', function(){ //attach event handler to select's change event. 
                                            //use a more specific selector

            if ($(this).val() === ""){ //checking to see which option has been picked

                $(this).css("color", '#666"'); 
            } else {                   // add or remove class accordingly
                $(this).css("color", 'black'); 
            }

        });
    });

</script>
</html>