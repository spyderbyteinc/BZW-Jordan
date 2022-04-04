<?php include "includes/header.php"; ?>
        <input type="text" id="message" />
        <button onclick="transmitMessage()">Send</button>
        <script>
            // Create a new WebSocket.
            var socket  = new WebSocket('ws://localhost:8080');

            // Define the 
            var message = document.getElementById('message');

            function transmitMessage() {
                socket.send( message.value );
            }

            socket.onmessage = function(e) {
                alert( e.data );
            }
        </script>
    </body>
</html>