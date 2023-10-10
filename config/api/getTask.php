<?php
include 'db.php';


$database = new Database();

if (isset($_GET['id'])) {
    $taskId = $_GET['id'];

    $getSingle = $database->getTaskById($taskId);

echo json_encode($getSingle);
}

?>