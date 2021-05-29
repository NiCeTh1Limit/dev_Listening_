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
$(document).ready(function () {

    $('#account').keyup(function(){
        var regex = new RegExp("^[a-zA-Z0-9]+$");
        if($('#account').val().length <= 0){
            document.getElementById('invalid_account_tips').innerText = "不可為空";
            $('#account').removeClass('is-valid');
            $('#account').addClass('is-invalid');
        }else if ($('#account').val().length > 20){
            $('#account').val($('#account').val().substring(0, 20));
        }else if (!regex.test($('#account').val())){
            document.getElementById('invalid_account_tips').innerText = "請輸入英數字";
            $('#account').removeClass('is-valid');
            $('#account').addClass('is-invalid');
        }else{
            var data = "account=" + $('#account').val();
            $.ajax({
                type: 'POST',
                url: "/controller/post_check_account.php",
                data: data,
                success: function(data){
                    //console.log(data);
                    document.getElementById('invalid_account_tips').innerText = "此帳號已被使用";
                    var dataParsed = JSON.parse(data);
                    if (dataParsed.status){
                        $('#account').removeClass('is-invalid');
                        $('#account').addClass('is-valid');
                    }else{
                        $('#account').removeClass('is-valid');
                        $('#account').addClass('is-invalid');
                    }
                },
                dataType: "text"
            });
        }
    });
    $('#password').keyup(function(){
        if ($('#password').val().length > 20){
            $('#password').val($('#password').val().substring(0, 20));
        }else if ($('#password').val().length <= 0){
            $('#password').removeClass('is-valid');
            $('#password').addClass('is-invalid');
        }else if ($('#password_check').val() === $('#password').val()){
            $('#password_check').removeClass('is-invalid');
            $('#password_check').addClass('is-valid');
        }else if ($('#password_check').val() !== $('#password').val() && $('#password_check').val().length != 0){
            $('#password_check').removeClass('is-valid');
            $('#password_check').addClass('is-invalid');
        }else{
            $('#password').removeClass('is-invalid');
            $('#password').addClass('is-valid');
        }
    });
    $('#password_check').keyup(function(){
        if ($('#password_check').val().length > 20){
            $('#password_check').val($('#password_check').val().substring(0, 20));
        }else if($('#password_check').val().length<=0){
            $('#password_check').removeClass('is-invalid');
            $('#password_check').removeClass('is-valid');
        }else if ($('#password_check').val() === $('#password').val()){
            $('#password_check').removeClass('is-invalid');
            $('#password_check').addClass('is-valid');
        }else{
            $('#password_check').removeClass('is-valid');
            $('#password_check').addClass('is-invalid');
        }
    });
    //-----------------------------------------------------------
    // 註冊Submit
    $('#btn_submit').click(function(){
        //----------------------------------------
        //注意 checkbox若未勾選則不會被傳過去
        console.log($('#regist_form').serializeArray());
        //---------------------------------------
        //alert($('#pm_form').serializeArray()[0].value);
        var regex = new RegExp("^[a-zA-Z0-9]+$");
        if (!regex.test($('#account').val())){
            document.getElementById('invalid_account_tips').innerText = "請輸入英數字";
            $('#account').removeClass('is-valid');
            $('#account').addClass('is-invalid');
            $('#account').focus();
            return;
        }else if ($('#account').val().length > 20){
            $('#account').val($('#account').val().substring(0, 20));
            return;
        }else if($('#account').val() <= 0){
            $('#account').removeClass('is-invalid');
            $('#account').removeClass('is-valid');
            $('#account').focus();
            return;
        }else if($('#password_check').val() != $('#password').val()){
            $('#password_check').focus();
            return;
        }else{
            var data = "account=" + $('#account').val();
            $.ajax({
                type: 'POST',
                url: "/controller/post_check_account.php",
                data: data,
                success: function(data){
                    //console.log(data);
                    document.getElementById('invalid_account_tips').innerText = "此帳號已被使用";
                    var dataParsed = JSON.parse(data);
                    if (!dataParsed.status){
                        $('#account').focus();
                        return;
                    }
                },
                dataType: "text"
            });
        }
        if ($('#password').val().length <= 0){
            $('#password').removeClass('is-valid');
            $('#password').addClass('is-invalid');
            $('#password').focus();
            return;
        }else if ($('#password_check').val() !== $('#password').val() && $('#password_check').val().length != 0){
            $('#password_check').removeClass('is-valid');
            $('#password_check').addClass('is-invalid');
            $('#password_check').focus();
            return;
        }
        if ($('#name').val() != ''){
            switch (document.getElementById('title').innerText) {
                case '個人會員':
                    var url = "/controller/post_personal_member.php";
                    break;
                case '機構會員(團體)':
                    var url = "/controller/post_group_member.php";
                    break;
                case '學術研究會員':
                    var url = "/controller/post_research_member.php";
                    break;
                case '單次使用者':
                    var url = "/controller/post_single_member.php";
                    break;
            }
            console.log('starting ajax');
            $.ajax({
                url: url,
                type: "POST",
                dataType: 'text',
                data: $('#regist_form').serialize(),
                success: function (data) {
                    //alert(data);
                    console.log(data);
                    ///*
                    var dataParsed = JSON.parse(data);
                    if (dataParsed.status){
                        alert('註冊成功！');
                        document.getElementById('invalid_account_tips').innerText = "此帳號已被使用";
                        $('#account').removeClass('is-valid');
                        $('#account').addClass('is-invalid');
                    }
                    //*/
                    console.log(data);
                },
                error: function(jqXHR, textStatus) {
                alert(jqXHR.status, textStatus);
                }
            });
        }
    });
});