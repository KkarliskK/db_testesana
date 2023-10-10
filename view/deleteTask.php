<?php
include 'include/header.php';

if (isset($_GET['id'])) {
    $taskId = $_GET['id'];

        // API endpoint URL
        $api_url = 'http://localhost/karlis/db_testing/config/api/deleteTaskApi.php?id=' . $taskId;

        // Initialize cURL session
        $ch = curl_init($api_url);

        // Set cURL options
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL session
        $response = curl_exec($ch);

        // Check HTTP status code
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Close cURL session
        curl_close($ch);

        if ($httpCode == 200) {
            // Deletion was successful
            header('Location: tasks.php');
            exit;
        } else {
            // Handle the case where the deletion was not successful
            echo 'Failed to delete task. Status code: ' . $httpCode;
            echo 'cURL Error: ' . curl_error($ch); // Add this line for debugging
        }
}

include 'include/footer.html';
?>
