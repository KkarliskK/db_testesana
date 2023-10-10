<?php
include 'include/header.php';
include 'apiClient.php';



// Check if the task ID is provided in the URL
if (isset($_GET['id'])) {
    $taskId = $_GET['id'];


    
    // Retrieve the task data from the database using your TaskManager class
    $task = json_decode(file_get_contents('http://localhost/karlis/db_testing/config/api/getTask.php?id='.$taskId));
    // print_r($task);
    //Check if the task exists
    if ($task) {
        // Handle form submission for editing the task
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve and validate form data
            $newTitle = $_POST['new-title'];
            $newDescription = $_POST['new-description'];
            $newDueDate = $_POST['new-due-date'];

            // Update the task in the database
            $apiUrl = 'http://localhost/karlis/db_testing/config/api/updateApi.php';

            $apiClient = new ApiClient($apiUrl);

            $data = [
                'id' => $taskId,
                'title' => $newTitle,
                'description' => $newDescription,
                'due_date' => $newDueDate,
            ];

            $response = $apiClient->sendPostRequest($data);

// Handle the response
echo $response;
            
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