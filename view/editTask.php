<?php

include 'include/header.php';

// Check if the task ID is provided in the URL
if (isset($_GET['id'])) {
    $taskId = $_GET['id'];
    
    // Retrieve the task data from the database using your TaskManager class
    $taskManager = new Database();
    $task = $taskManager->getTaskById($taskId); // Implement getTaskById method as needed

    // Check if the task exists
    if ($task) {
        // Handle form submission for editing the task
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve and validate form data
            $newTitle = $_POST['new_title'];
            $newDescription = $_POST['new_description'];
            $newDueDate = $_POST['new_due_date'];

            // Update the task in the database
            $taskManager->editTask($taskId, $newTitle, $newDescription, $newDueDate);
            
            // Redirect back to the task list or display a success message
            header('Location: tasks.php');
            exit;
        }

        // Display the task editing form
        include 'editForm.php';
    } else {
        echo 'Task not found.';
    }
} else {
    echo 'Task ID is not provided.';
}

include 'include/footer.html';

?>