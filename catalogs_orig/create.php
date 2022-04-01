<?php include "../includes/header.php"; ?>

<section class="catalog_section" id="create_catalog">
    <h2 class="auctions section_heading"><span>Create Catalog</span></h2>

    <div id="create_catalog_container">
        <div class="tab">
            <a href="create.php?step=1"><button class="tablinks" id="navbutton1">Step 1 - Basic Catalog Information</button></a>
            <a href="create.php?step=2"><button class="tablinks" id="navbutton2">Step 2 - Lot Setup</button></a>
            <a href="create.php?step=3"><button class="tablinks" id="navbutton3">Step 3 - Lot Pictures</button></a>
            <a href="create.php?step=4"><button class="tablinks" id="navbutton4">Step 4 - Sort Lots</button></a>
        </div>

        <div id="Step1" class="tabcontent">
            <p><?php include "create_modules/catalog_basic.php"; ?></p>

            <div class="navigation">
                <p class="disclaimer">NOTE: Pressing the 'next' button will save your progress. You can always return to this step or a previous step</p>
                <div class="buttons">
                    <a class="btn btn_navigation visibility_hidden">Previous</a>

                    <!-- <a class="btn btn_navigation">Next &rarr;</a> -->
                    <a href="#" class="bidzbutton black font15">Next &rarr;</a>
                </div>
            </div>
        </div>

        <div id="Step2" class="tabcontent">
            <p><?php include "create_modules/lot_setup.php"; ?></p>
            
            <div class="navigation">
                <p class="disclaimer">NOTE: Pressing the 'next' or 'previous' buttons will save your progress. You can always return to this step or a previous step</p>
                <div class="buttons">
                    <a href="#" class="bidzbutton black font15">&larr; Previous</a>

                    <a href="#" class="bidzbutton black font15">Next &rarr;</a>
                </div>
            </div>
        </div>

        <div id="Step3" class="tabcontent">
            <p><?php include "create_modules/lot_pictures.php"; ?></p>
            
            <div class="navigation">
                <p class="disclaimer">NOTE: Pressing the 'next' or 'previous' buttons will save your progress. You can always return to this step or a previous step</p>
                <div class="buttons">
                    <a href="#" class="bidzbutton black font15">&larr; Previous</a>

                    <a href="#" class="bidzbutton black font15">Next &rarr;</a>
                </div>
            </div>
        </div>

        <div id="Step4" class="tabcontent">
            <p><?php include "create_modules/sort_lots.php"; ?></p>
            
            <div class="navigation">
                <p class="disclaimer">NOTE: Pressing the 'next' button will save your progress. You can always return to this step or a previous step</p>
                <div class="buttons">
                    <a href="#" class="bidzbutton black font15">&larr; Previous</a>

                    <a href="#" class="bidzbutton black font15">Next &rarr;</a>
                </div>
            </div>
        </div>

        <div style="clear:both;"></div>
    </div>
</section>

<script>

    function openTab(tabName){
        tabcontent = document.getElementsByClassName("tabcontent");

        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        
        document.getElementById(tabName).style.display = "block";

        var buttonID = tabName.replace("Step", "navbutton");

        document.getElementById(buttonID).classList.add("active");
    }

</script>
<?php
    if(!isset($_GET['step'])){
        $step = 1;
    }
    else{
        $step = $_GET['step'];
    }

    $stepName = "Step" . $step;
?>

<script>
    openTab("<?php echo $stepName; ?>");
</script>

<?php include "../includes/footer.php"; ?>

<script>

$(".start_time_drop").html(start_time);

function change_start_time(){
    $(".start_time_drop").each(function(){
        var v = $(this).val();
        if(v == ""){
            $(this).html(start_time);
        }
    });
}
function change_end_time(){
    $(".end_time_drop").each(function(){
        var v = $(this).val();
        if(v == ""){
            $(this).html(end_time);
        }
    });
}

function change_country(){
  $(".country_drop").each(function(){
    var v = $(this).val();
    if(v == ""){
        $(this).html(country_drop);
    }
  });

  
  $(".country_drop").change(function(){
        var name = $(this).find('option:selected').attr("name");
        var id = $(this).attr("id");

        var mod = id.replace("_asset_country", "");
        
        var state_name = mod + "_asset_state";
        var static_name = mod + "_asset_state_static";

        var selector = '[name ="' + state_name + '"]';
        var static_selector = '[name ="' + static_name + '"]';

        if(all_states[name] == "<option class='select' value=''>Select a State/Province</option>"){ 
            $(static_selector).css("display","block");
            $(selector).css("display","none");
            $(selector).html("");
        }
        else{
            $(selector).css("display","block");
            $(selector).html(all_states[name]);
            $(static_selector).css("display","none");
        }
        //module1_asset_state
    });

    $("#asset_country").change(function(){
        var name = $(this).find('option:selected').attr("name");
        
        if(all_states[name] == "<option class='select' value=''>Select a State/Province</option>"){
            $("#asset_state_static").css("display","block");
            $("#asset_state").css("display","none");
            $("#asset_state").html("");
        }
        else{
            $("#asset_state").css("display","block");
            $("#asset_state").html(all_states[name]);
            $("#asset_state_static").css("display","none");
        }
    });
}

// Code for sorting lots
$( function() {
    $( "#switch_area" ).sortable({
       stop         : function(event,ui){ 
           var inorder = $("#switch_area").sortable("toArray");
           //changeLotNumbers(inorder);
        }
    });
    $( "#switch_area" ).disableSelection();
  } );


change_country();
change_start_time();
change_end_time();

// Code for adding address modules
$(document).on('click', '.address_add', function() {
    var all_children = $(".address_area").children();

    var name_ids = [];
    var nm = "";
    var name_id = "";
    var new_name_id = 0;

    all_children.each(function(){
        var nm = $(this).find(".address_add").attr('name');
        var name_id = nm.replace("address", "");
        var new_name_id = parseInt(name_id);
        name_ids.push(new_name_id);
    });


    
    var max_name_id = Math.max.apply(null, name_ids)
    var rname_id = parseInt(max_name_id) + 1;
    var new_name = "address" + rname_id;

    var count = $(".address_area").children().length;


    if(count > 4){
        
        return;
    }    
    
    var op_module = "address" + max_name_id + "_module";
    var module_name = "module" + rname_id + "_";
    
    var mymodule = "address" + rname_id + "_module";
    var location = "address_location" + rname_id;
    var controls = "adddress_location" + rname_id + "_controls";

    var address = '<div id="' + mymodule + '" class="address_module"><div id="' + location + '" class="catalog_address_location"><div class="catalog_row signup_row"><div class="col2"><div class="signup_group"><label for="' + module_name + 'address1" class="input_label">Address 1</label><input type="text" class="input_text"  name="' + module_name + 'address1" id="' + module_name + 'address1" placeholder="Address 1"></div></div><div class="col2"><div class="signup_group"><label for="' + module_name + 'address2" class="input_label">Address 2</label><input type="text" class="input_text"  name="' + module_name + 'address2" id="' + module_name + 'address2" placeholder="Address 2"></div></div></div><div class="catalog_row signup_row"><div class="col3"><div class="signup_group"><label for="' + module_name + 'asset_country" class="input_label">Country</label><select class="input_text input_select country_drop" name="' + module_name + 'asset_country" id="' + module_name + 'asset_country"><option value="">Select a Country</option></select></div></div><div class="col3"><div class="signup_group"><label for="' + module_name + 'asset_city" class="input_label">City</label><input type="text" class="input_text" name="' + module_name + 'asset_city" id="' + module_name + 'asset_city" placeholder="City"></div></div><div class="col3"><div class="signup_group"><label for="' + module_name + 'asset_state" class="input_label">State / Province</label><select class="input_text input_select" name="' + module_name + 'asset_state" id="' + module_name + 'asset_state"><option class="select" value="">Select a State/Province</option></select><input style="display:none;" type="text" class="input_text ship_state" name="' + module_name + 'asset_state_static" id="' + module_name + 'asset_state_static" placeholder="State / Province"></div></div></div></div><div id="' + controls + '" class="row_operations"><span name="' + new_name + '" class="add address_add"><i class="fas fa-plus"></i></span><span name="' + new_name + '" class="trash address_delete"><i class="far fa-trash-alt"></i></span></div></div>';


    $("#address_number").val(rname_id);

    $(this).closest(".address_module").after(address);

    //$(this).closest(".catalog_row").after(inspect);
        
    var count = $(".address_area").children().length;
    if(count >= 5){
        $(".address_area").children().last().find(".address_add").css("visibility", "hidden");
    }

    
    change_country();
    select_color();
    
});
// Code for deleting address modules

$(document).on('click', '.address_delete', function() {
    
    var name = $(this).attr('name');
    var s = name.replace("address", "");
    var selector = "#address" + s + "_module";
    $(selector).remove();
    
    var count = $(".address_area").children().length;
    if(count < 5){
        $(".address_area").children().find(".address_add").css("visibility", "visible");
    }
});

// Code for adding contact rows

$(document).on('click', '.contact_add', function() {

    var all_children = $(".contact_area").children();

    var name_ids = [];
    var nm = "";
    var name_id = "";
    var new_name_id = 0;

    all_children.each(function(){
        var nm = $(this).find(".contact_add").attr('name');
        var name_id = nm.replace("contact", "");
        var new_name_id = parseInt(name_id);
        name_ids.push(new_name_id);
    });


    var max_name_id = Math.max.apply(null, name_ids)
    var rname_id = parseInt(max_name_id) + 1;
    var new_name = "contact" + rname_id;

    var count = $(".contact_area").children().length;


    var module_name = "module" + rname_id + "_";

    if(count > 9){
        
        return;
    }    


    var contact = '<div name="' + new_name + '" class="catalog_row signup_row"><div class="col6"><div class="signup_group"><label for="' + module_name + 'contact_name2" class="input_label">Contact Name</label><input type="text" class="input_text" name="' + module_name + 'contact_name2" id="' + module_name + 'contact_name2" placeholder="Contact Name"></div></div><div class="col6"><div class="signup_group"><label for="' + module_name + 'contact_phone2" class="input_label">Contact Phone</label><input type="text" class="input_text" name="' + module_name + 'contact_phone2" id="' + module_name + 'contact_phone2" placeholder="Contact Phone"></div></div><div class="col5 row_operations"><span class="add contact_add" name="' + new_name + '"><i class="fas fa-plus"></i></span><span class="trash contact_delete" name="' + new_name + '"><i class="far fa-trash-alt"></i></span></div></div>';

    
    $("#contact_number").val(rname_id);
    
    $(this).closest(".catalog_row").after(contact);
        
    var count = $(".contact_area").children().length;

    if(count >= 10){
        $(".contact_area").children().last().find(".contact_add").css("visibility", "hidden");
    }
});

// Code for deleting contact rows
$(document).on('click', '.contact_delete', function() {
    
    var name = $(this).attr('name');
    var selector = "[name=" + name + "]";
    $(selector).remove();
    
    var count = $(".contact_area").children().length;
    if(count < 10){
        $(".contact_area").children().find(".contact_add").css("visibility", "visible");
    }
});

// Code for adding inspection rows

$(document).on('click', '.inspect_add', function() {
    var all_children = $(".inspect_area").children();

    var name_ids = [];
    var nm = "";
    var name_id = "";
    var new_name_id = 0;

    all_children.each(function(){
        var nm = $(this).find(".inspect_add").attr('name');
        var name_id = nm.replace("inspect", "");
        var new_name_id = parseInt(name_id);
        name_ids.push(new_name_id);
    });


    var max_name_id = Math.max.apply(null, name_ids)
    var rname_id = parseInt(max_name_id) + 1;
    var new_name = "inspect" + rname_id;

    var count = $(".inspect_area").children().length;

    var module_name = "module" + rname_id + "_";

    if(count > 9){
        
        return;
    }    
    
    var inspect = '<div name="' + new_name + '" class="catalog_row signup_row"><div class="col4"><div class="signup_group"><label for="' + module_name + 'inspection_date" class="input_label">Inspection Date</label><input type="text" class="date input_text date_picker"  onkeypress="return false" name="' + module_name + 'inspection_date" id="' + module_name + 'inspection_date" placeholder="mm/dd/yyyy"></div></div><div class="col4"><div class="signup_group"><label for="' + module_name + 'inspection_start_time" class="input_label">Inspection Start Time</label><select class="input_text input_select start_time_drop" name="' + module_name + 'inspection_start_time" id="' + module_name + 'inspection_start_time"><option class="select" value="">Select a Start Time</option><option value="1">8:00 AM</option></select></div></div><div class="col4"><div class="signup_group"><label for="' + module_name + 'inspection_end_time" class="input_label">Inspection End Time</label><select class="input_text input_select end_time_drop" name="' + module_name + 'inspection_end_time" id="' + module_name + 'inspection_end_time"><option class="select" value="">Select a End Time</option><option value="1">8:00 AM</option></select></div></div><div class="col5 row_operations"><span class="add inspect_add" name="' + new_name + '"><i class="fas fa-plus"></i></span><span class="trash inspect_delete" name="' + new_name + '"><i class="far fa-trash-alt"></i></span></div></div>';


    $(this).closest(".catalog_row").after(inspect);
        
    $("#inspect_number").val(rname_id);

    var count = $(".inspect_area").children().length;
    if(count >= 10){
        $(".inspect_area").children().last().find(".inspect_add").css("visibility", "hidden");
    }
    
    
    $(".date").datepicker({
        autoClose: true,
        viewStart: 2
    });
    change_start_time();
    change_end_time();

});


// Code for deleting inspection rows
$(document).on('click', '.inspect_delete', function() {
    
    var name = $(this).attr('name');
    var selector = "[name=" + name + "]";
    $(selector).remove();
    
    var count = $(".inspect_area").children().length;
    if(count < 10){
        $(".inspect_area").children().find(".inspect_add").css("visibility", "visible");
    }
});

// Code for adding removal rows
  $(document).on('click', '.removal_add', function() {
        var all_children = $(".removal_area").children();

        var name_ids = [];
        var nm = "";
        var name_id = "";
        var new_name_id = 0;

        all_children.each(function(){
            var nm = $(this).find(".removal_add").attr('name');
            var name_id = nm.replace("removal", "");
            var new_name_id = parseInt(name_id);
            name_ids.push(new_name_id);
        });

        
        var max_name_id = Math.max.apply(null, name_ids)
        var rname_id = parseInt(max_name_id) + 1;
        var new_name = "removal" + rname_id;

        var module_name = "module" + rname_id + "_";

        var count = $(".removal_area").children().length;
        

        if(count > 9){
            
            return;
        }
        

        var removal = '<div name="' + new_name + '" class="catalog_row signup_row"><div class="col4"><div class="signup_group"><label for="' + module_name + 'removal_date" class="input_label">Removal Date</label><input type="text" class="date input_text date_picker" name="' + module_name + 'removal_date" id="' + module_name + 'removal_date"  onkeypress="return false" placeholder="mm/dd/yyyy"></div></div><div class="col4"><div class="signup_group"><label for="' + module_name + 'removal_start_time" class="input_label">Removal Start Time</label><select class="input_text input_select start_time_drop" name="' + module_name + 'removal_start_time" id="' + module_name + 'removal_start_time"><option class="select" value="">Select a Start Time</option><option value="1">8:00 AM</option></select></div></div><div class="col4"><div class="signup_group"><label for="' + module_name + 'inspection_end_time" class="input_label">Removal End Time</label><select class="input_text input_select end_time_drop" name="' + module_name + 'removal_end_time" id="' + module_name + 'removal_end_time"><option class="select" value="">Select a End Time</option><option value="1">8:00 AM</option></select></div></div><div class="col5 row_operations"><span class="add removal_add" name="' + new_name + '" ><i class="fas fa-plus"></i></span><span class="trash removal_delete" name="' + new_name + '"><i class="far fa-trash-alt"></i></span></div></div>';
        
        
        
        $("#removal_number").val(rname_id);
        //$(".removal_area").append(removal);
        
        $(this).closest(".catalog_row").after(removal);
        
        var count = $(".removal_area").children().length;
        if(count >= 10){
            $(".removal_area").children().last().find(".removal_add").css("visibility", "hidden");
        }

        
        $(".date").datepicker({
            autoClose: true,
            viewStart: 2
        });
        change_start_time();
        change_end_time();
    });

    // Code for deleting removal rows
    $(document).on('click', '.removal_delete', function() {
        
        var name = $(this).attr('name');
        var selector = "[name=" + name + "]";
        $(selector).remove();
        
        var count = $(".removal_area").children().length;
        if(count < 10){
            $(".removal_area").children().find(".removal_add").css("visibility", "visible");
        }
    });


    $(document).ready(function(){

        $(".date_picker").datepicker({
            autoClose: true,
            viewStart: 2
        });


    });
</script>

<script type="text/javascript">
  var fileobj;
  function upload_file(e) {
    e.preventDefault();
    fileobj = e.dataTransfer.files[0];
    ajax_file_upload(fileobj);
  }
 
  function file_explorer() {
    document.getElementById('selectfile').click();
    document.getElementById('selectfile').onchange = function() {
        fileobj = document.getElementById('selectfile').files[0];
      ajax_file_upload(fileobj);
    };
  }
 
  function ajax_file_upload(file_obj) {
    if(file_obj != undefined) {
        var form_data = new FormData();                  
        form_data.append('file', file_obj);
      $.ajax({
        type: 'POST',
        url: 'ajax.php',
        contentType: false,
        processData: false,
        data: form_data,
        success:function(response) {
          alert(response);
          $('#selectfile').val('');
        }
      });
    }
  }
</script>



<script>
        $("#add_location_details").click(function(e){
            e.preventDefault();
            $(".add_location_modal").css("display", "block");
        });
        $("#add_onsite_contact").click(function(e){
            e.preventDefault();
            $(".add_contact_modal").css("display", "block");
        });
        $("#add_removal_details").click(function(e){
            e.preventDefault();
            $(".add_removal_modal").css("display", "block");
        });
        $("#add_inspect_details").click(function(e){
            e.preventDefault();
            $(".add_inspection_modal").css("display", "block");
        });


        $(".close_modal").click(function(e){
            e.preventDefault();
            
            $(".add_location_modal").css("display", "none");
            $(".add_contact_modal").css("display", "none");
            $(".add_removal_modal").css("display", "none");
            $(".add_inspection_modal").css("display", "none");
            
            $(".edit_location_modal").css("display", "none");
            $(".edit_contact_modal").css("display", "none");
            $(".edit_removal_modal").css("display", "none");
            $(".edit_inspection_modal").css("display", "none");
        });
    </script>