<?php
include 'db.php';

$database = new Database();

if (isset($_POST)) {
    $taskData = $_POST;

    $addTitle = isset($taskData['title']) ? $taskData['title'] : null;
    $addDescription = isset($taskData['description']) ? $taskData['description'] : null;
    $addDueDate = isset($taskData['due_date']) ? $taskData['due_date'] : null;

    $errors = array(); // Create an empty array to store validation errors

    if (empty($addTitle)) {
        $errors['title'] = "Empty title!";
    }
    if (empty($addDescription)) {
        $errors['description'] = "Empty Description!";
    }
    if (empty($addDueDate)) {
        $errors['due_date'] = "Empty Due Date!";
    } else {
        $today = new DateTime();
        $dueDate = DateTime::createFromFormat('Y-m-d', $addDueDate);

        if ($dueDate === false) {
            $errors['due_date'] = "Invalid Due Date!";
        } else if ($dueDate < $today->setTime(0, 0, 0) && $dueDate->format('Y-m-d') !== $today->format('Y-m-d')) {
            $errors['due_date'] = "Due Date cannot be in the past!";
        }
    }

    if (empty($errors)) {
        $insert = $database->insert("INSERT INTO `tasks` (`title`, `description`, `due_date`) VALUES ('$addTitle', '$addDescription', '$addDueDate')");
        echo json_encode(['status' => 'success', 'message' => 'Task added successfully']);
    } else {
        // Return validation errors in JSON format
        echo json_encode(['status' => 'error', 'errors' => $errors]);
    }
} else {
    echo "Invalid request";
}
?>
