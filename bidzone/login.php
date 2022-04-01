<?php
    session_start();

    include "includes/connect.php";

    if(isset($_POST['login']) && $_POST['login'] == "yes"){
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username == "" || $password == ""){
            ?>
            <script>
                alert("Please complete the form");
            </script>
            <?php
        }
        else{
            $uhash = md5($username);
            $upass = md5($password);

            $sql = "SELECT * FROM `staff` WHERE `huser`='$uhash' AND `password` = '$upass'";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);

            if($count > 0){
                // Successful log in

                $row = mysqli_fetch_assoc($result);
                $username = $row['username'];
                $_SESSION['staff_user'] = $username;

                header("location: index.php");
            }
            else{
                // not successful log in
            ?>
            <script>
                alert("Credentials are incorrect");
            </script>
            <?php
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="includes/admin_style.css">
    <title>BidZWon | Log In</title>
</head>
<body>

    <div id="login_bg">
        <div class="login_content">
            <form autocomplete="disabled" class="form-signin" action="login.php" method="POST">
                <h1 class="logo"><img src="../img/logo.png" alt="BidZWon"></h1>

                <h1 class="sign-label h3 mb-3 font-weight-normal text-white">Admin - Please sign in</h1>
                <label for="username" class="sr-only">Username</label>
                <input autocomplete="disabled" type="text" id="username" name="username" class="form-control" placeholder="Username" required="" autofocus="">
                
                <label for="password" class="sr-only">Password</label>
                <input autocomplete="new-password" type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
                
                <input type="hidden" name="login" id="login" value="yes">
                <button name="submit" class="sign-button btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </div>
    </div>

</body>
</html>