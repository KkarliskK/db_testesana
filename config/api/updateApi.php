<?php
include 'db.php';

if(isset($_POST)){
    $data = $_POST;
    $database = new Database();

    $taskID = $data['id']; 
    $newTitle = $data['title'];
    $newDescription = $data['description'];
    $newDueDate = $data['due_date'];

    if(empty($newTitle)){
        echo "Title is empty";
    }else if(empty($newDescription)){
        echo "Description is empty";
    }else if(empty($newDueDate)){
        echo "Due date is empty";
    } else {
        $today = new DateTime();
        $dueDate = DateTime::createFromFormat('Y-m-d', $newDueDate);

        if ($dueDate === false) {
            echo "Invalid Due Date!";
        } else if ($dueDate < $today->setTime(0, 0, 0) && $dueDate->format('Y-m-d') !== $today->format('Y-m-d')) {
            echo "Due Date cannot be in the past!";
        } else {
            $update = $database->editTask($taskID, $newTitle, $newDescription, $newDueDate);
            print_r($data['id']);
        }
    }
}else{
    echo "Dati nav padoti";
}

?>

