<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = $_POST;
    $database = new Database();

    $taskID = isset($data['id']) ? $data['id'] : null;
    $newTitle = isset($data['title']) ? $data['title'] : null;
    $newDescription = isset($data['description']) ? $data['description'] : null;
    $newDueDate = isset($data['due_date']) ? $data['due_date'] : null;

    $errors = array(); // Create an empty array to store validation errors

    if (empty($newTitle)) {
        $errors['title'] = "Title is empty";
    }
    if (empty($newDescription)) {
        $errors['description'] = "Description is empty";
    }
    if (empty($newDueDate)) {
        $errors['due_date'] = "Due date is empty";
    } else {
        $today = new DateTime();
        $dueDate = DateTime::createFromFormat('Y-m-d', $newDueDate);

        if ($dueDate === false) {
            $errors['due_date'] = "Invalid Due Date!";
        } else if ($dueDate < $today->setTime(0, 0, 0) && $dueDate->format('Y-m-d') !== $today->format('Y-m-d')) {
            $errors['due_date'] = "Due Date cannot be in the past!";
        }
    }

    if (empty($errors)) {
        $update = $database->editTask($taskID, $newTitle, $newDescription, $newDueDate);
        echo json_encode(['status' => 'success', 'message' => 'Task updated successfully']);
    } else {
        // Return validation errors in JSON format
        echo json_encode(['status' => 'error', 'errors' => $errors]);
    }
} else {
    echo "Invalid request";
}
?>
