<?php
include 'db.php';

$database = new Database();

if(isset($_POST)){
    $taskData = $_POST;

    $addTitle = $taskData['title'];
    $addDescription = $taskData['description'];
    $addDueDate = $taskData['due_date'];

    $insert = $database->insert("INSERT INTO `tasks` (`title`, `description`, `due_date`) VALUES ('$addTitle', '$addDescription', '$addDueDate')");

}else{
    echo "NEveiksme";
}


?>