(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
})();

$('#btn').click(function(){
    $('.div_form').animate({height: "toggle", opacity: "toggle"}, "slow");
    if ($('#btn').text() == '註冊'){
        $('#btn').text('返回');
    }else{
        $('#btn').text('註冊');
    }
 });


$('#account').click(function(){
    $('#account').removeClass('is-invalid');
});

$('#password').click(function(){
    $('#password').removeClass('is-invalid');
});

$('#btn_login').click(function(){
    if ($('#account').val().length <= 0){
        $('#account').addClass('is-invalid');
        return;
    }
    if ($('#password').val().length <= 0){
        document.getElementById('invalid_password_tips').innerText = '';
        $('#password').addClass('is-invalid');
        return;
    }

    console.log('starting ajax');
    $.ajax({
        url: "/controller/login.php",
        type: "POST",
        dataType: 'text',
        data: $('#login_form').serialize(),
        success: function (data) {
            console.log(data);
            ///*
            try{
                var dataParsed = JSON.parse(data);
            }catch(e){
                console.log(e);
                return;
            }
            if (dataParsed.status){
                location.href='/lobby.php';
            }else{
                document.getElementById('invalid_password_tips').innerText = '帳號或密碼錯誤';
                $('#password').addClass('is-invalid');
            }
            //*/
        },
        error: function(jqXHR, textStatus) {
        alert(jqXHR.status, textStatus);
        }
    });
});
