<?php
include 'include/header.php';
include 'apiClient.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $apiUrl = "http://localhost/karlis/db_testing/config/api/addTaskApi.php"; 

    $title = $_POST["add-title"];
    $description = $_POST["add-description"];
    $dueDate = $_POST["add-due-date"];

    $taskData = [
        "title" => $title,
        "description" => $description,
        "due_date" => $dueDate,
    ];

    $api = new ApiClient($apiUrl);
    $apiResponse = $api->sendPostRequest($taskData);

    if (strpos($apiResponse, "cURL error") === 0) {
        echo $apiResponse;
    } else {
        header('Location: tasks.php');
        echo "Task added successfully!";
    }
}

?>

<div class="form-main-container">
    <div class="form-container">
        <form method="POST" id="add-task">
            <h1>Add new Task</h1>
            <label for="add_title">Title:</label>
            <input type="text" id="add-title" name="add-title" required>

            <label for="add_description">Description:</label>
            <textarea id="add-description" name="add-description"></textarea>

            <label for="add_due_date">Due Date:</label>
            <input type="date" id="add-due-date" name="add-due-date">
            <div class="buttons">
                <button><a class="btn btn-white" id="add-form-submit" name="add-form-submit">Add Task</button></a>
            </div>
        </form>
    </div>
</div>