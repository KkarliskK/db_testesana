<?php
include 'db.php';

$database = new Database();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userData = $_POST;

    $addName = !empty($userData['name']) ? $userData['name'] : null;
    $addUsername = !empty($userData['username']) ? $userData['username'] : null;
    $addPassword = !empty($userData['password']) ? $userData['password'] : null;

    if (empty($addName) || empty($addUsername) || empty($addPassword)) {
        echo json_encode(['status' => 'error', 'message' => 'Please provide all required information.']);
    } else {
        // Check if the username is already in use
        $query = "SELECT * FROM `users` WHERE `username` = '$addUsername'";
        $result = $database->select($query);

        if ($result && count($result) > 0) {
            echo json_encode(['status' => 'error', 'message' => 'Username already in use.']);
        } else {
            // Hash the password
            $hashedPassword = password_hash($addPassword, PASSWORD_BCRYPT);

            // Insert the user into the database
            $insert = $database->insert("INSERT INTO `users` (`name`, `username`, `password`) VALUES ('$addName', '$addUsername', '$hashedPassword')");

            if ($insert) {
                echo json_encode(['status' => 'success', 'message' => 'User registered successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error registering user']);
            }
        }
    }
}else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>
