<?php include "includes/header.php"; ?>
    
</body>

<script src="js/jquery.js"></script>
<script>
    
    var interval = 1000;  // 1000 = 1 second, 3000 = 3 seconds
    function doAjax() {
        var d = new Date();

        $.ajax({
                type: 'POST',
                url: 'increment2.php',
                data: {date:d},
                success: function (data) {
                    alert(data);    
                },
                complete: function (data) {
                        // Schedule the next
                        setTimeout(doAjax, interval);
                }
        });
    }
    setTimeout(doAjax, interval);

</script>
</html>