<?php
include 'db.php';

$database = new Database();

// Create an empty array to store validation errors
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $userData = $_POST;

    $username = isset($userData['username']) ? $userData['username'] : null;
    $password = isset($userData['password']) ? $userData['password'] : null;

    if (empty($username)) {
        $errors['username'] = "Username is required.";
    }
    if (empty($password)) {
        $errors['password'] = "Password is required.";
    }

    if (empty($errors)) {
        // No validation errors, proceed with authentication
        $query = "SELECT * FROM `users` WHERE `username` = '$username'";
        $result = $database->select($query);

        if ($result && count($result) > 0) {
            $user = $result[0];
            $hashedPassword = $user['password'];

            if (password_verify($password, $hashedPassword)) {
                // Authentication succeeded
                echo json_encode(['status' => 'success', 'message' => 'Login successful']);
            } else {
                $errors['password'] = "Invalid password.";
            }
        } else {
            $errors['username'] = "User not found.";
        }
    }

    if (!empty($errors)) {
        // Output validation errors in JSON format
        echo json_encode(['status' => 'error', 'errors' => $errors]);
    }
} else {
    echo "Invalid request.";
}
?>
