function registerSwitch(){
    let register = $('#register-container-box').toggleClass('hidden');  
    let login = $('#login-container-box').toggleClass('hidden');  
}


//  VALIDATION FOR ADDING A TASK

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
        document.getElementById('add-title').style.borderColor = "#FF3333";
        errorTitle.show();
    } else {
        errorTitle.hide();
        document.getElementById('add-title').style.borderColor = "#d7d8d8";
    }
    if (description.trim() === '') {
        errorDescription.text('The description field is empty!');
        document.getElementById('add-description').style.borderColor = "#FF3333";
        errorDescription.show();
    } else {
        errorDescription.hide();
        document.getElementById('add-description').style.borderColor = "#d7d8d8";
    }
    if (dueDate.trim() === '') {
        errorDueDate.text('The date field is empty!');
        document.getElementById('add-due-date').style.borderColor = "#FF3333";
        errorDueDate.show();
    } else {
        // Check if the dueDate is a valid date and not in the past
        const currentDate = new Date();
        const inputDate = new Date(dueDate);

        if (isNaN(inputDate.getTime())) {
            errorDueDate.text('Invalid date format!');
            document.getElementById('add-due-date').style.borderColor = "#FF3333";
            errorDueDate.show();
        } else if (inputDate < currentDate && inputDate.toDateString() !== currentDate.toDateString()) {
            errorDueDate.text('Date cannot be in the past!');
            document.getElementById('add-due-date').style.borderColor = "#FF3333";
            errorDueDate.show();
        } else {
            errorDueDate.hide();
            document.getElementById('add-due-date').style.borderColor = "#d7d8d8";
            $('#add-task').submit(); // if everything is good, it submits the form
        }
    }
}


// VALIDATION FOR EDITING TASK

function editValidation() {
    event.preventDefault();

    let title = $('#new-title').val();
    let description = $('#new-description').val();
    let dueDate = $('#new-due-date').val();
    let errorTitle = $('#error-title');
    let errorDescription = $('#error-description');
    let errorDueDate = $('#error-due-date');

    if (title.trim() === '') {
        errorTitle.text('The title field is empty!');
        document.getElementById('new-title').style.borderColor = "#FF3333";
        errorTitle.show();
        return; // Prevent form submission
    } else {
        errorTitle.hide();
        document.getElementById('new-title').style.borderColor = "#d7d8d8";
    }
    
    if (description.trim() === '') {
        errorDescription.text('The description field is empty!');
        document.getElementById('new-description').style.borderColor = "#FF3333";
        errorDescription.show();
        return; // Prevent form submission
    } else {
        errorDescription.hide();
        document.getElementById('new-description').style.borderColor = "#d7d8d8";
    }
    
    if (dueDate.trim() === '') {
        errorDueDate.text('The date field is empty!');
        document.getElementById('new-due-date').style.borderColor = "#FF3333";
        errorDueDate.show();
    } else {
        // Check if the dueDate is a valid date and not in the past
        const currentDate = new Date();
        const inputDate = new Date(dueDate);

        if (isNaN(inputDate.getTime())) {
            errorDueDate.text('Invalid date format!');
            document.getElementById('new-due-date').style.borderColor = "#FF3333";
            errorDueDate.show();
        } else if (inputDate < currentDate && inputDate.toDateString() !== currentDate.toDateString()) {
            errorDueDate.text('Date cannot be in the past!');
            document.getElementById('new-due-date').style.borderColor = "#FF3333";
            errorDueDate.show();
            return;
        } else {
            errorDueDate.hide();
            document.getElementById('new-due-date').style.borderColor = "#d7d8d8";
        }
        $('#edit-task').submit(); // if everything is good, it submits the form
    }
}


//validations for loign

// $(document).ready(function() {
//     $('#login-form').submit(function(e) {
//         e.preventDefault();

//         let username = $('#login-username').val();
//         let password = $('#login-password').val();

//         $.ajax({
//             type: "POST",
//             url: "http://localhost/karlis/db_testing/config/api/loginApi.php",
//             data: {
//                 username: username,
//                 password: password
//             },
//             dataType: "json",
//             success: function(response) {
//                 if (response.status === "success") {
//                     window.location.href = "tasks.php"; // Redirect on successful login
//                 } else if (response.status === "error") {
//                     let errorContainer = $('#error-container');
//                     errorContainer.empty();

//                     for (const errorField in response.errors) {
//                         let errorMessage = response.errors[errorField];
//                         let errorElement = $('<p></p>').text(errorMessage);
//                         errorContainer.append(errorElement);
//                     }
//                 }
//             },
//             error: function(jqXHR, textStatus, errorThrown) {
//                 console.log("AJAX request failed: " + textStatus, errorThrown);
//             }
//         });
//     });
// });




// VALIDATION FOR REGISTER

$(document).ready(function() {
    $('#register-form').submit(function(e) {
        e.preventDefault();

        let name = $('#register-name').val();
        let username = $('#register-username').val();
        let password = $('#register-password').val();
        let repeatPassword = $('#repeat-password').val();


        $('#errorName').text('');
        $('#errorUsername').text('');
        $('#errorPassword').text('');
        $('#error-container').text('');

        if (name.trim() === '') {
            $('#errorName').text('Name is required.');
            return;
        }

        if (username.trim() === '') {
            $('#errorUsername').text('Username is required.');
            return;
        }

        if (password.trim() === '') {
            $('#errorPassword').text('Password is required.');
            return;
        }

        if (password !== repeatPassword) {
            $('#error-container').text('Passwords do not match.');
            return;
        }


        $.ajax({
            type: "POST",
            url: "http://localhost/karlis/db_testing/config/api/registerApi.php", 
            data: {
                name: name,
                username: username,
                password: password
            },
            dataType: "json",
            success: function(response) {
                if (response.status === "success") {
                    window.location.href = "login.php"; 
                } else if (response.status === "error") {
                    let errorContainer = $('#error-container');
                    errorContainer.empty(); 

                    for (const errorField in response.errors) {
                        let errorMessage = response.errors[errorField];
                        let errorElement = $('<p></p>').text(errorMessage);
                        errorContainer.append(errorElement);
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("AJAX request failed: " + textStatus, errorThrown);
            }
        });
    });
});






