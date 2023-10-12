<?php
session_start();


if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {

    header("Location: login.php");
    exit;
}


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

// Define the default sorting method
$sortBy = 'none';

// Check if the user has specified a sorting method
if (isset($_GET['sort'])) {
    $sortBy = $_GET['sort'];
    
    // Check if the sorting order is specified
    $sortOrder = isset($_GET['order']) ? $_GET['order'] : 'asc';
} else {
    $sortOrder = 'asc'; // Define sortOrder with a default value
}

// Function to compare tasks by due date
function compareByDueDate($a, $b) {
    global $sortOrder; // Define sortOrder as a global variable
    $result = strtotime($a['due_date']) - strtotime($b['due_date']);
    return ($sortOrder === 'asc') ? $result : -$result;
}

// Function to compare tasks by status
function compareByStatus($a, $b) {
    global $sortOrder; // Define sortOrder as a global variable
    $statusA = $a['status'];
    $statusB = $b['status'];

    if ($statusA == $statusB) {
        return 0; // They have the same status
    }

    if ($sortOrder === 'asc') {
        return ($statusA < $statusB) ? -1 : 1;
    } else {
        // For descending order, place completed tasks first
        if ($statusA === '1') {
            return -1;
        } elseif ($statusB === '1') {
            return 1;
        } else {
            return ($statusA > $statusB) ? -1 : 1;
        }
    }
}


// Sort the data based on the chosen sorting method
if ($sortBy === 'due_date') {
    usort($data, 'compareByDueDate');
} elseif ($sortBy === 'status') {
    usort($data, 'compareByStatus');
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

<div class="sort-buttons">
    <a href="?sort=due_date&order=<?= ($sortOrder === 'asc') ? 'desc' : 'asc' ?>">Sort by Due Date (<?= $sortOrder === 'asc' ? 'Ascending' : 'Descending' ?>)</a>
    <a href="?sort=status&order=<?= ($sortOrder === 'asc') ? 'desc' : 'asc' ?>">Sort by Status (<?= $sortOrder === 'asc' ? 'Ascending' : 'Descending' ?>)</a>
</div>

<div class="task-container">
    <?php foreach ($tasksToShow as $task) : ?>
        <div class="single-task-container">
            <h1><?= $task['title'] ?></h1>
            <p><?= $task['description'] ?></p>
            <?php
            $today = date('Y-m-d');
            if ($task['due_date'] == $today) {
                echo '<p style="color: #FF3333">Due Date: ' . $task['due_date'] . ' </p>';
            } else {
                echo '<p>Due Date: ' . $task['due_date'] . ' </p>';
            }
            ?>
            <?php
            if($task['due_date'] < $today){
                echo '<p style="color:red;">Status: You did not do task in time!</p>';
            }else if($task['status'] == '0'){
                echo '<p style="color:orange;">Status: Not completed</p>';
            }else{
                echo '<p style="color:green;">Status: Completed</p>';
            }
            ?>
            <div class="buttons-container">
                <?php
                if($task['due_date'] < $today){ ?>
                    <div class="buttons"><a class="btn btn-white" href="deleteTask.php?id=<?= $task['id'] ?>">Delete Task</a></div>
                <?php    
                }else{ ?>
                    <div class="buttons"><a class="btn btn-white" href="checkTask.php?id=<?= $task['id']?>">Check Task</a></div>
                    <div class="buttons"><a class="btn btn-white" href="editTask.php?id=<?= $task['id'] ?>">Edit Task</a></div>
                    <div class="buttons"><a class="btn btn-white" href="deleteTask.php?id=<?= $task['id'] ?>">Delete Task</a></div>
                <?php
                }
                ?>
            </div>
            <p>Created at: <?= $task['created_at'] ?></p>
        </div>
    <?php endforeach; ?>
</div>

<div class="pagination">
    <?php
    // Include the sorting order in the pagination links
    $paginationBaseUrl = "?page=$currentPage";
    if ($sortBy !== 'none') {
        $paginationBaseUrl .= "&sort=$sortBy&order=$sortOrder";
    }
    
    if ($currentPage > 1) {
        $prevPage = $currentPage - 1;
        echo "<a href='?page=$prevPage&sort=$sortBy&order=$sortOrder'>Previous</a>";
    }

    for ($i = 1; $i <= $totalPages; $i++) {
        $activeClass = ($i == $currentPage) ? 'class="active"' : '';
        echo "<a $activeClass href='?page=$i&sort=$sortBy&order=$sortOrder'>$i</a>";
    }

    if ($currentPage < $totalPages) {
        $nextPage = $currentPage + 1;
        echo "<a href='?page=$nextPage&sort=$sortBy&order=$sortOrder'>Next</a>";
    }
    ?>
</div>

<?php include 'include/footer.html'; ?>