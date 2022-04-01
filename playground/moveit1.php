<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Sortable - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/sortable.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>

        // var idsInOrder = $("#sortable2").sortable("toArray");
        //-----------------^^^^
        // console.log(idsInOrder);
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
  </script>
</head>
<body>
 
<ul id="sortable">
    <li id="s1" class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
        <h2>Item 1</h2>
        <img src="img/sortable/apple.jpg" alt="Apple">
    </li>
    <li id="s2" class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
        <h2>Item 2</h2>
        <img src="img/sortable/costco.jpg" alt="Costco">
    </li>
    <li id="s3" class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
        <h2>Item 3</h2>
        <img src="img/sortable/facebook.jpg" alt="Facebook">
    </li>
    <li id="s4" class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
        <h2>Item 4</h2>
        <img src="img/sortable/google.jpg" alt="Google">
    </li>
    <li id="s5" class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
        <h2>Item 5</h2>
        <img src="img/sortable/microsoft.jpg" alt="Microsoft">
    </li>
    <li id="s6" class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
        <h2>Item 6</h2>
        <img src="img/sortable/monster.jpg" alt="Monster">
    </li>
    <li id="s7" class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
        <h2>Item 7</h2>
        <img src="img/sortable/netflix.png" alt="Netflix">
    </li>
</ul>
 
 
</body>
</html>