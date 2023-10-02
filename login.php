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
    <div id="login-container-box" class="login-container-box">
        <div class="login-container">
            <div class="login-container-header">
                <h2>Sign In</h2>
            </div>
            <div class="login-container-body">
                <form method="post">
                    <input type="text" id="login-username" name="login-username" placeholder="Username">
                    <input type="password" id="login-password" name="login-password" placeholder="Password">
                </form>
                <div class="buttons">
                    <a class="btn btn-white">Sign In</a>
                </div>
            </div>
            <div class="login-container-footer">
                <p>Don't have an account? </p><button onclick="registerSwitch()">Sign Up</button>
            </div>
        </div>
    </div>

    <div id="register-container-box" class="register-container-box hidden">
        <div class="register-container">
            <div class="register-container-header">
                <h2>Sign Up</h2>
            </div>
            <div class="register-container-body">
                <form id="register-form">
                    <input type="text" id="register-username" name="register-username" placeholder="Username">
                    <input type="password" id="register-password" name="register-password" placeholder="Password">
                    <input type="password" id="repeat-password" name="repeat-password" placeholder="Repeat Password">
                </form>
                <div class="buttons">
                    <a class="btn btn-white">Sign Up</a>
                </div>
            </div>
            <div class="register-container-footer">
                <p>Already have an account?</p><button onclick="registerSwitch()">Sign In</button>
            </div>
        </div>
    </div>

    <script src="../public/functions.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</body>
</html>