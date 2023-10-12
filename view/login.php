<?php
include 'include/header.php';
include 'apiClient.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $apiUrl = "http://localhost/karlis/db_testing/config/api/loginApi.php"; 

    $username = isset($_POST["login-username"]) ? $_POST["login-username"] : null;
    $password = isset($_POST["login-password"]) ? $_POST["login-password"] : null;

    if (empty($username) || empty($password)) {
        echo "Please provide both username and password.";
    } else {
        $userData = [
            "username" => $username,
            "password" => $password,
        ];

        $api = new ApiClient($apiUrl);
        $apiResponse = $api->sendPostRequest($userData);

        // Check the API response to determine if login was successful
        if (strpos($apiResponse, "cURL error") === 0) {
            echo "An error occurred while sending the login request.";
        } else {
            // Assuming the API response contains information about the login status
            $loginData = json_decode($apiResponse, true);

            if ($loginData["status"] === "success") {
                session_start();
                $_SESSION['user_id'] = $loginData['user_id']; 
                $_SESSION['username'] = $username; 
                $_SESSION['user_logged_in'] = true;
                // Store other user data if needed
            
                header('Location: tasks.php');
                exit; 
            } else {
                // Login failed, display an error message
                echo "Login failed. Please check your credentials.";
            }
        }
    }
}
?>

<div id="login-container-box" class="login-container-box">
    <div class="login-container">
        <div class="login-container-header">
            <h2>Sign In</h2>
        </div>
        <div class="login-container-body">
        <form method="post" id="login-form">
            <input type="text" id="login-username" name="login-username" placeholder="Username">
            <input type="password" id="login-password" name="login-password" placeholder="Password">
            <div class="buttons">
                <button type="submit" class="btn btn-white" id="login-form-submit" name="login-form-submit">Sign In</button>
            </div>
        </form>
        </div>
        <div class="login-container-footer">
            <p>Don't have an account? </p><a href="http://localhost/karlis/db_testing/view/register.php">Sign Up</a>
        </div>
    </div>
    <div class="alert-container hidden">
        <p id="msgLogin"></p>
        <p id="errLoginUsername"></p>
        <p id="errLoginPassword"></p>
    </div>
</div>

<?php 
include 'include/footer.html';
?>
