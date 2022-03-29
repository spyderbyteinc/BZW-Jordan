<?php
    // Set the default timezone to use. Available as of PHP 5.1
    
    // Prints: July 1,

    date_default_timezone_set('America/Denver');
    
    // Prints: July 1, 2000 is on a Saturday
    echo mktime(0, 0, 0, 13, 1, 1997);

?>