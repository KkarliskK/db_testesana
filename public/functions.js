function registerSwitch(){
    let register = $('#register-container-box').toggleClass('hidden');  
    let login = $('#login-container-box').toggleClass('hidden');  
}


// ajax for register
function submitt(forma){
    event.preventDefault();
    $.ajax({
        url: "../controller/user_ctrl.php",
        type: "POST",
        dataType: "json",
        data: $("#"+forma).serialize(),
        success: function(result){
            console.log(result);
            if(result.msgLogin == '' || result.msgRegister == ''){
                $('#errLoginUsername').text(result.errLoginUsername);
                $('#errLoginPassword').text(result.errLoginPassword);
                $('#errRegName').text(result.errRegName);
                $('#errRegUsername').text(result.errRegUsername);
                $('#errRegPassword').text(result.errRegPassword);
                $('#errRegRepPass').text(result.errRegRepPass);
                $('#errRegRepeat').text(result.errRegRepeat);
                $('#errRepeat').text(result.errRepeat);
                $('#msgLogin').text('');
                $('#msgRegister').text('');
            }else{
                $('#msgLogin').text(result.msgLogin);
                $('#msgRegister').text(result.msgRegister);
                $('#errLoginUsername').text('');
                $('#errLoginPassword').text('');
                $('#errRegName').text('');
                $('#errRepeat').text('');
                $('#errRegUsername').text('');
                $('#errRegPassword').text('');
                $('#errRegRepPass').text('');
                $('#errRegRepeat').text('');
                $('#errSession').text('');
                if(result.errSession == '1'){
                    window.location.href = "http://localhost/task_management/view/index.php";
                }
            }
        },
        error: function(error){
            console.log(error);
        }
    });
}