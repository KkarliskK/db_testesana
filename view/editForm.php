<div class="form-main-container">
    <div class="form-container">
        <form method="POST" id="edit-task">
            <h1>Edit Task</h1>
            <label for="new_title">Title:</label>
            <input type="text" id="new-title" name="new-title" value="<?= $task->title ?>" required>

            <label for="new_description">Description:</label>
            <textarea id="new-description" name="new-description"><?= $task->description ?></textarea>

            <label for="new_due_date">Due Date:</label>
            <input type="date" id="new-due-date" name="new-due-date" value="<?= $task->due_date ?>">
            <div class="buttons">
                <button onclick="editValidation()"><a class="btn btn-white" id="edit-form-submit" name="edit-form-submit">Save Changes</button></a>
            </div>
        </form>
    </div>
</div>