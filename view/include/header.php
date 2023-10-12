<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskIt.com</title>
    <link rel="stylesheet" href="../public/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

<header>
    <img src="include/icon.PNG" alt="logo">
        <nav>
            <ul>
                <li><a href="tasks.php">Tasks</a></li>
                <li><a href="addTask.php">Add Task</a></li>
                <?php
                if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
                    echo '<li><a href="sessionDestroy.php">Sign Out</a></li>';
                } else {
                    echo '<li><a href="login.php">Sign In</a></li>';
                }
                ?>
            </ul>
        </nav>
</header>
