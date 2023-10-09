<?php

include 'include/header.php';

$json = file_get_contents('http://localhost/karlis/db_testing/config/api/api.php');

$data = json_decode($json, TRUE);

// echo "<pre>";
// print_r($data);
// echo '</pre>';


?>

<div class="task-container">
    <?php foreach($data as $task){
        echo '<div class="single-task-container">';
        echo '<h1>'. $task['title']. '</h1>';
        echo '<p>'. $task['description']. '</p>';
        echo '<p>Due Date: '. $task['due_date']. '</p>';
        echo '<p> Status: ';
        if ($task['status'] == '0') {
            echo "Not Compleated";
        }else{
            echo "Compleated";
        }
        echo '</p>';
        echo '<div class="buttons-container">';
        echo '<div class="buttons"><a class="btn btn-white">Check Task</a></div>';
        echo '<div class="buttons"><a class="btn btn-white" href="editTask.php?id='.$task['id'].'">Edit Task</a></div>';
        echo '<div class="buttons"><a class="btn btn-white">Delete Task</a></div>';
        echo '</div>';
        echo '<p> Created at: '. $task['created_at'] .'</p>';
        echo '</div>';
    } ?>
</div>







<?php include 'include/footer.html'; ?>