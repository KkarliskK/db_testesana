<?php
include 'db.php';

if(isset($_POST)){
    $data = $_POST;
    $database = new Database();

    $taskID = $data['id']; 
    $newTitle = $data['title'];
    $newDescription = $data['description'];
    $newDueDate = $data['due_date'];

    $update = $database->editTask($taskID, $newTitle, $newDescription, $newDueDate);
    
    print_r($data['id']);

}else{
    echo "Dati nav padoti";
}

?>

