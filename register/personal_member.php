<link rel="stylesheet" href="/css/bootstrap.min.css"> 
<body>
    <div class="container">
        <form class="needs-validation" id="regist_form" novalidate>
            <div class="row" style="margin:0">
                <legend class="col-form-label title" id="title">
                    個人會員
                </legend>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="content-left">
                        <div class="row">
                            <div class="col-md-4">
                                <label>申請人姓名</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label>職照號碼</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="license_number" name="license_number" class="form-control">
                                <div class="invalid-feedback">
                                    此號碼已被註冊
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label>身分證號碼</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="identity_number" name="identity_number" class="form-control">
                                <div class="invalid-feedback">
                                    此號碼已被註冊
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label>畢業學校及年限</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" id="edu" name="edu" class="form-control">
                            </div>
                            <div class="input-group col-md-3">
                                <input type="text" id="age_limit" name="age_limit" class="form-control">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">年</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>服務地點區域</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="service_location" name="service_location" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>連絡手機</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="phone" name="phone" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>住址</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="address" name="address" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>email</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>個人月服務人次量</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="monthly_service_number" name="monthly_service_number" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content-right">
                        <div class="row" hidden>
                            <div class="col-md-4">
                                <label>與資料庫連結</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="db_connect" id="db_connect_1" value="yes" checked>
                                    <label class="form-check-label" for="db_connect_1">&nbsp;是&nbsp;</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="db_connect" id="db_connect_2" value="no">
                                    <label class="form-check-label" for="db_connect_2">&nbsp;否&nbsp;</label>
                                </div>
                            </div>
                        </div>
                        <div class="row" hidden>
                            <div class="col-md-4">
                                <label>購買項目</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="AAPCR" name="AAPCR" value="AAPCR">
                                    <label class="form-check-label" for="AAPCR">AAPCR</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="Test1" name="Test1" value="Test1">
                                    <label class="form-check-label" for="Test1">Test1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="Test2" name="Test2" value="Test2">
                                    <label class="form-check-label" for="Test2">Test2</label>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-8">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="CCICA" name="CCICA" value="CCICA">
                                    <label class="form-check-label" for="CCICA">CCICA</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="Word" name="Word" value="Word">
                                    <label class="form-check-label" for="Word">Word</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="Sentence" name="Sentence" value="Sentence">
                                    <label class="form-check-label" for="Sentence">Sentence</label>
                                </div>
                            </div>
                        </div>
                        <div class="row" hidden>
                            <div class="col-md-4">
                                <label>購買數量</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="buy_count" name="buy_count" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>帳號</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="account" name="account" class="form-control">
                                <div class="invalid-feedback" id="invalid_account_tips">
                                此帳號已被使用
                                </div>
                                <div class="valid-feedback">
                                此帳號可使用
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>密碼</label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" id="password" name="password" class="form-control">
                                <div class="invalid-feedback">
                                不可為空
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>確認密碼</label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" id="password_check" class="form-control">
                                <div class="invalid-feedback">
                                密碼必須一致
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" id="btn_personal_member_submit" class="btn btn-primary btn-lg btn-block">註冊</button>
                                <button type="button" class="btn btn-secondary btn-lg btn-block" onclick="javascript:location.href='/index.php'">返回</button>
                                <button type="button" id="btn_submit" hidden></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="container" hidden>
        
    </div>
</body>
<style type="text/css">
@import "/css/register.css";
</style>
<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/register/register.js"></script>
<script type="text/javascript" src="/js/register/personal_member.js"></script>