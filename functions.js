function registerSwitch(){
    let register = $('#register-container-box').toggleClass('hidden');  
    let login = $('#login-container-box').toggleClass('hidden');  
}


// ajax for register
function submitt(forma){
    event.preventDefault();
    $.ajax({
        url: "../controller/user_ctr.php",
        type: "POST",
        dataType: "json",
        data: $("#"+forma).serialize(),
        success: function(result){
            console.log(result);
            if(result.msgLogin == '' || result.msgRegister == ''){
                $('#errLoginUsername').text(result.errLoginUsername);
                $('#errLoginPassword').text(result.errLoginPassword);
                $('#errRegUsername').text(result.errRegUsername);
                $('#errRegPassword').text(result.errRegPassword);
                $('#errRegRepPass').text(result.errRegRepPass);
                $('#msgLogin').text('');
                $('#msgRegister').text('');
            }else{
                $('#msgLogin').text('');
                $('#msgRegister').text('');
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