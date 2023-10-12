<?php
include 'include/header.php';
include 'apiClient.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $apiUrl = "http://localhost/karlis/db_testing/config/api/registerApi.php";

    $name = isset($_POST["register-name"]) ? $_POST["register-name"] : "";
    $username = isset($_POST["register-username"]) ? $_POST["register-username"] : "";
    $password = isset($_POST["register-password"]) ? $_POST["register-password"] : "";

    // Check if any required fields are empty
    if (empty($name) || empty($username) || empty($password)) {
        echo "Please fill out all required fields.";
    } else {
        // Check if the passwords match
        $repeatPassword = isset($_POST["repeat-password"]) ? $_POST["repeat-password"] : "";
        if ($password !== $repeatPassword) {
            echo "Passwords do not match.";
        } else {
            $userData = [
                "name" => $name,
                "username" => $username,
                "password" => $password,
            ];

            $api = new ApiClient($apiUrl);
            $apiResponse = $api->sendPostRequest($userData);

            // Check if registration was successful
            if (strpos($apiResponse, "success") !== false) {
                header('Location: tasks.php');
                echo "Registration was successful!";
            } else {
                echo $apiResponse; // Display the error message from the API
            }
        }
    }
}
?>

<div id="register-container-box" class="register-container-box">
    <div class="register-container">
        <div class="register-container-header">
            <h2>Sign Up</h2>
        </div>
        <div class="register-container-body">
            <form method="POST" id="register-form">
                <input type="text" id="register-name" name="register-name" placeholder="Name">
                <input type="text" id="register-username" name="register-username" placeholder="Username">
                <input type="password" id="register-password" name="register-password" placeholder="Password">
                <input type="password" id="repeat-password" name="repeat-password" placeholder="Repeat Password">
                <p style="font-size: 12px; color: red;" id="msgRegister"></p>
                <div class="buttons">
                    <button><a class="btn btn-white" id="register-form-submit" name="register-form-submit">Sign Up</a></button>
                </div>
            </form>
        </div>
        <div class="register-container-footer">
            <p>Already have an account?</p><a href="http://localhost/karlis/db_testing/view/login.php">Sign In</a>
        </div>
    </div>
</div>

<?php
include 'include/footer.html';
?>
