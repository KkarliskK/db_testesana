

<form method="POST">
    <label for="new_title">Title:</label>
    <input type="text" id="new-title" name="new-title" value="<?= $task['title'] ?>" required>

    <label for="new_description">Description:</label>
    <textarea id="new-description" name="new-description"><?= $task['description'] ?></textarea>

    <label for="new_due_date">Due Date:</label>
    <input type="date" id="new-due-date" name="new-due-date" value="<?= $task['due_date'] ?>">

    <button type="submit">Save Changes</button>
</form>