<?php
include 'include/header.php';

if (isset($_GET['id'])) {
    $taskId = $_GET['id'];

    // API endpoint URL
    $api_url = 'http://localhost/karlis/db_testing/config/api/checkTaskApi.php?id=' . $taskId;

    // Initialize cURL session
    $ch = curl_init($api_url);

    // Set cURL options for a PUT request
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT'); // Use PUT method for update
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Follow redirects
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    // Execute cURL session
    $response = curl_exec($ch);

    // Check HTTP status code
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Close cURL session
    curl_close($ch);

    if ($httpCode == 404) {
        // Update was successful
        header('Location: tasks.php');
        exit;
    } else {
        // Handle the case where the update was not successful
        echo 'Failed to update task status. Status code: ' . $httpCode;
        echo 'cURL Error: ' . curl_error($ch); // Add this line for debugging
    }
}

include 'include/footer.html';
?>
