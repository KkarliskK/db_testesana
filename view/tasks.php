<?php
include 'include/header.php';

// Define the number of tasks per page (default set to 6)
$tasksPerPage = 6;

// Fetch the data from the API
$json = file_get_contents('http://localhost/karlis/db_testing/config/api/api.php');
$data = json_decode($json, TRUE);

// Determine the current page based on user input or use default
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

// Calculate the total number of pages
$totalPages = ceil(count($data) / $tasksPerPage);

// Ensure that the current page is within valid bounds
if ($currentPage < 1) {
    $currentPage = 1;
} elseif ($currentPage > $totalPages) {
    $currentPage = $totalPages;
}

// Calculate the starting index for the current page
$startIndex = ($currentPage - 1) * $tasksPerPage;

// Get a subset of tasks for the current page
$tasksToShow = array_slice($data, $startIndex, $tasksPerPage);

?>

<div class="task-container">
    <?php foreach ($tasksToShow as $task) : ?>
        <div class="single-task-container">
            <h1><?= $task['title'] ?></h1>
            <p><?= $task['description'] ?></p>
            <p>Due Date: <?= $task['due_date'] ?></p>
            <p>Status: <?= ($task['status'] == '0') ? 'Not Completed' : 'Completed' ?></p>
            <div class="buttons-container">
                <div class="buttons"><a class="btn btn-white" href="checkTask.php?id=<?= $task['id']?>">Check Task</a></div>
                <div class="buttons"><a class="btn btn-white" href="editTask.php?id=<?= $task['id'] ?>">Edit Task</a></div>
                <div class="buttons"><a class="btn btn-white" href="deleteTask.php?id=<?= $task['id'] ?>">Delete Task</a></div>
            </div>
            <p>Created at: <?= $task['created_at'] ?></p>
        </div>
    <?php endforeach; ?>

    </div>
    <div class="pagination">
        <?php if ($currentPage > 1) : ?>
            <a href="?page=<?= $currentPage - 1 ?>">Previous</a>
        <?php endif; ?>

        <?php if ($totalPages > 1) : ?>
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <a <?= ($i == $currentPage) ? 'class="active"' : '' ?> href="?page=<?= $i ?>"><?= $i ?></a>
            <?php endfor; ?>
        <?php endif; ?>

        <?php if ($currentPage < $totalPages) : ?>
            <a href="?page=<?= $currentPage + 1 ?>">Next</a>
        <?php endif; ?>
    </div>


<?php include 'include/footer.html'; ?>
