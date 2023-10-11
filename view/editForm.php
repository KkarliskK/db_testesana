<div class="form-main-container">
    <div class="form-container">
        <form method="POST" id="edit-task">
            <h1>Edit Task</h1>
            <label for="new-title">Title:</label>
            <input type="text" id="new-title" name="new-title" value="<?= $task->title ?>">
            <p style="color: #FF3333" class="error-title" id="error-title"></p>

            <label for="new-description">Description:</label>
            <textarea id="new-description" name="new-description"><?= $task->description ?></textarea>
            <p style="color: #FF3333" class="error-description" id="error-description"></p>

            <label for="new-due-date">Due Date:</label>
            <input type="date" id="new-due-date" name="new-due-date" value="<?= $task->due_date ?>">
            <p style="color: #FF3333" class="error-due-date" id="error-due-date"></p>
            <div class="buttons">
                <button onclick="editValidation()"><a class="btn btn-white" id="edit-form-submit" name="edit-form-submit">Save Changes</button></a>
            </div>
        </form>
    </div>
</div>
