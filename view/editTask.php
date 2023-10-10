<?php
include 'include/header.php';
include 'apiClient.php';


if (isset($_GET['id'])) {
    $taskId = $_GET['id'];


    $task = json_decode(file_get_contents('http://localhost/karlis/db_testing/config/api/getTask.php?id='.$taskId));
    // print_r($task);

    if ($task) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $newTitle = $_POST['new-title'];
            $newDescription = $_POST['new-description'];
            $newDueDate = $_POST['new-due-date'];


            $apiUrl = 'http://localhost/karlis/db_testing/config/api/updateApi.php';

            $apiClient = new ApiClient($apiUrl);

            $data = [
                'id' => $taskId,
                'title' => $newTitle,
                'description' => $newDescription,
                'due_date' => $newDueDate,
            ];

            $response = $apiClient->sendPostRequest($data);

echo $response;

            header('Location: tasks.php');
            exit;
        }



        include 'editForm.php';
    } else {
        echo 'Task not found.';
    }
} else {
    echo 'Task ID is not provided.';
}

include 'include/footer.html';

?>