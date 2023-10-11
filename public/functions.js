function registerSwitch(){
    let register = $('#register-container-box').toggleClass('hidden');  
    let login = $('#login-container-box').toggleClass('hidden');  
}


function addValidation() {
    event.preventDefault();

    let title = $('#add-title').val();
    let description = $('#add-description').val();
    let dueDate = $('#add-due-date').val();
    let errorTitle = $('#error-title'); 
    let errorDescription = $('#error-description'); 
    let errorDueDate = $('#error-due-date'); 

    if (title.trim() === '') {
        errorTitle.text('The title field is empty!');
        errorTitle.show(); 
    } else {
        errorTitle.hide();
    }
    if (description.trim() === '') {
        errorDescription.text('The description field is empty!');
        errorDescription.show();
    } else {
        errorDescription.hide();
    }
    if (dueDate.trim() === '') {
        errorDueDate.text('The date field is empty!');
        errorDueDate.show();
    } else {
        errorDueDate.hide();
        // If everything is correct, you can submit the form
        $('#add-task').submit();
    }
}
