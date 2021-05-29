<?php
session_start();
if (@$_SESSION['account'] != '' && @$_SESSION['type'] != ''){
    printf("<script type=\"text/javascript\">location.href='lobby.php';</script>");
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="login-page">
        <div class="form">
            <div class="div_form register-form">
                <button id="personal_member" onclick="javascript:location.href='register/personal_member.php';">個人會員</button>
                <button id="group_member" onclick="javascript:location.href='register/group_member.php';">機構會員（團體）</button>
                <button id="research_member" onclick="javascript:location.href='register/research_member.php';">學術研究會員</button>
                <button id="onetime_member" onclick="javascript:location.href='register/single_member.php';">單次使用者</button>
            </div>
            <div class="div_form">
                <form class="login-form needs-validation" id="login_form" novalidate>
                    <div class="row">
                        <input class="form-control" id="account" name="account" type="text" placeholder="帳號" required/>
                    </div>
                    <div class="row">
                        <input class="form-control" id="password" name="password"  type="password" placeholder="密碼" required/>
                        <div class="invalid-feedback" id="invalid_password_tips">
                            帳號或密碼錯誤
                        </div>
                    </div>                    
                    
                    <button id="btn_login" type="button">登入</button>
                </form>
            </div>            
            <button id="btn" type="button">註冊</button>
        </div>
    </div>
</body>
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>
</html>