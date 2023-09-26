<?php
include '../config/db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
    <div class="login-container-box">
        <div class="login-container">
            <div class="login-container-header">
                <h2>Login</h2>
            </div>
            <div class="login-container-body">
                <form method="post">
                    <input type="text" id="login-username" name="login-username" placeholder="Username">
                    <input type="password" id="login-password" name="login-password" placeholder="Password">
                </form>
                <button id="login-button" name="login-button">Log In</button>
            </div>
            <div class="login-container-footer">
                <p>Don't have an account? </p><a href="#">register</a>
            </div>
        </div>
    </div>
</body>
</html>