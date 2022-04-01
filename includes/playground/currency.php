<?php

    include "includes/connect.php";

    $sql = "SELECT * FROM `currency`";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        echo $row['currency_name'] . " " . $row['currency_abbr'] . " " . $row['symbol'] . "</br>";
    }
?>
<html>
    <body>
    &#20803;
    </body>
</html>