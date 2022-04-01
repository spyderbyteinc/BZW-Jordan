<?php include "includes/header.php"; ?>
    
</body>

<script src="js/jquery.js"></script>
<script>
    
    var interval = 1000;  // 1000 = 1 second, 3000 = 3 seconds
    function doAjax() {
        $.ajax({
                type: 'POST',
                url: 'increment2.php',
                data: {fname:"jordan", lname:"halaby", msg_subject:"Test", message:"Hello World"},
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