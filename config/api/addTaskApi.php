<?php
include 'db.php';

$database = new Database();

if(isset($_POST)){
    $taskData = $_POST;

    $addTitle = $taskData['title'];
    $addDescription = $taskData['description'];
    $addDueDate = $taskData['due_date'];

    if(empty($addTitle)){
        echo "Empty title!";
    }else if(empty($addDescription)){
        echo "Empty Description!";
    }else if (empty($addDueDate)) {
        echo "Empty Due Date!";
    }else {
        $today = new DateTime();
        $dueDate = DateTime::createFromFormat('Y-m-d', $addDueDate);
    
        if ($dueDate === false) {
            echo "Invalid Due Date!";
        }else if ($dueDate < $today) {
            echo "Due Date cannot be in the past!";
        }else {

    $insert = $database->insert("INSERT INTO `tasks` (`title`, `description`, `due_date`) VALUES ('$addTitle', '$addDescription', '$addDueDate')");
    }
}

}else{
    echo "NEveiksme";
}


?>