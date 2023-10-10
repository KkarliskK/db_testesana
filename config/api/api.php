<?php
include 'db.php';
include '../task_management/taskManagement.php';

//theese are the lines to get json data
$database = new Database();

$taskManager = new TaskManager($database);
$data = $database->getTaskManagementData();

$dataArray = json_decode($data, true);

$resultArray = array();

foreach ($dataArray as $item) {
    $id = $item['id'];
    $resultArray[$id] = $item;
}

echo json_encode($resultArray);

?>