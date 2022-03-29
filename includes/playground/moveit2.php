<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/sortable.css">
    <title>Document</title>
</head>
<body>
    
    <div id="switch_area">

    <div id="s0" class="switch_item">
            <span>Item # 1</span>
            <img src="img/sortable/apple.jpg" alt="Apple">
            <span class="lotnum">Lot 1</span>
        </div>
        <div id="s1" class="switch_item">
            <span>Item # 2</span>
            <img src="img/sortable/costco.jpg" alt="Costco">
            <span class="lotnum">Lot 2</span>
        </div>
        <div id="s2" class="switch_item">
            <span>Item # 3</span>
            <img src="img/sortable/facebook.jpg" alt="Facebook">
            <span class="lotnum">Lot 3</span>
        </div>
        <div id="s3" class="switch_item">
            <span>Item # 4</span>
            <img src="img/sortable/google.jpg" alt="Google">
            <span class="lotnum">Lot 4</span>
        </div>
        <div id="s4" class="switch_item">
            <span>Item # 5</span>
            <img src="img/sortable/microsoft.jpg" alt="Microsoft">
            <span class="lotnum">Lot 5</span>
        </div>
        <div id="s5" class="switch_item">
            <span>Item # 6</span>
            <img src="img/sortable/monster.jpg" alt="Monster">
            <span class="lotnum">Lot 6</span>
        </div>
        <div id="s6" class="switch_item">
            <span>Item # 7</span>
            <img src="img/sortable/netflix.png" alt="Netflix">
            <span class="lotnum">Lot 7</span>
        </div><div id="s7" class="switch_item">
            <span>Item # 1</span>
            <img src="img/sortable/apple.jpg" alt="Apple">
            <span class="lotnum">Lot 1</span>
        </div>
        <div id="s8" class="switch_item">
            <span>Item # 2</span>
            <img src="img/sortable/costco.jpg" alt="Costco">
            <span class="lotnum">Lot 2</span>
        </div>
        <div id="s9" class="switch_item">
            <span>Item # 3</span>
            <img src="img/sortable/facebook.jpg" alt="Facebook">
            <span class="lotnum">Lot 3</span>
        </div>
        <div id="s10" class="switch_item">
            <span>Item # 4</span>
            <img src="img/sortable/google.jpg" alt="Google">
            <span class="lotnum">Lot 4</span>
        </div>
        <div id="s11" class="switch_item">
            <span>Item # 5</span>
            <img src="img/sortable/microsoft.jpg" alt="Microsoft">
            <span class="lotnum">Lot 5</span>
        </div>
        <div id="s12" class="switch_item">
            <span>Item # 6</span>
            <img src="img/sortable/monster.jpg" alt="Monster">
            <span class="lotnum">Lot 6</span>
        </div>
        <div id="s13" class="switch_item">
            <span>Item # 7</span>
            <img src="img/sortable/netflix.png" alt="Netflix">
            <span class="lotnum">Lot 7</span>
        </div>

    </div>
</body>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>

        // var idsInOrder = $("#sortable2").sortable("toArray");
        //-----------------^^^^
        // console.log(idsInOrder);
  $( function() {
    $( "#switch_area" ).sortable({
       stop         : function(event,ui){ 
           var inorder = $("#switch_area").sortable("toArray");
           changeLotNumbers(inorder);
           console.log(inorder);
        }
    });
    $( "#switch_area" ).disableSelection();
  } );

  function changeLotNumbers(inorder){
        //alert(inorder);
    $("div.switch_item").each(function(index, element){
        var item = inorder[index];
        var selector = "#" + item + " span.lotnum";
        var num = index + 1
        $(selector).html("Lot " + num);
    });
  }
  </script>
</html>