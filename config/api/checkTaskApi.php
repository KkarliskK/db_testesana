<?php
include 'db.php';

$database = new Database();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the current status of the task
    $currentStatus = $database->select("SELECT `status` FROM `tasks` WHERE `id` = $id");

    if ($currentStatus !== false && isset($currentStatus[0]['status'])) {
        $currentStatusValue = (int)$currentStatus[0]['status'];

        // Toggle the status (0 to 1 or 1 to 0)
        $newStatus = ($currentStatusValue == 0) ? 1 : 0;

        // Update the task status
        $updateStatus = $database->insert("UPDATE `tasks` SET `status` = $newStatus WHERE `id` = $id");

        if ($updateStatus) {
            header('Location: tasks.php'); // Redirect back to the tasks page
            exit;
        } else {
            echo "Failed to update task status.";
        }
    } else {
        echo "Failed to retrieve task status or invalid task ID.";
    }
} else {
    echo "Invalid task ID.";
}

?>