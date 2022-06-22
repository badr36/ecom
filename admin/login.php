<?php
session_start();
    if(isset($_POST['submit']))
    {
        $username = 'admin';
        $password = 'admin36';

        if($_POST['username'] == $username && $_POST['password'] == $password)
        {
            $_SESSION['admin'] = true;
            header("location: index.php");
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/login.css">
    <title>E-SHOP</title>
</head>
<body>
    <div class="container">
        <div class="photo">
            <img src="public/images/admin.png" alt="">
        </div>
        <form class="login-form" method="POST" action="">
            <h2>E-<span>SHOP</span></h2>
            <p>Sign into your account</p>

            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>

            

            <input type="submit" name="submit" value="Login">
        </form>
    </div>
</body>
</html>