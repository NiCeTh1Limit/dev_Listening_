<link rel="stylesheet" href="/css/bootstrap.min.css"> 
<body>
    <div class="container">
        <form class="needs-validation" id="regist_form" novalidate>
            <div class="row" style="margin:0">
                <legend class="col-form-label title" id="title">
                機構會員(團體)
                </legend>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="content-left">
                        <div class="row">
                            <div class="col-md-4">
                                <label>申請機構/單位</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="name" name="name" class="form-control" required>
                                <div class="invalid-feedback" id="invalid_name_tips">
                                    此名稱已被註冊
                                </div>
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
                                <label>電話</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="phone" name="phone" class="form-control">
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
                                <label>申請連絡人</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="contact_name" name="contact_name" class="form-control" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>所屬機構</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="institution" name="institution" class="form-control" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>單位語言治療師配額</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="therapist_quota" name="therapist_quota" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>人數</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="people_num" name="people_num" class="form-control">
                            </div>
                        </div>                        
                        <div class="row">
                            <div class="col-md-4">
                                <label>單位月服務人次量</label>
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
                                <button type="button" id="btn_group_member_submit" class="btn btn-primary btn-lg btn-block">註冊</button>
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
@import "../css/register.css";
</style>
<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/register/register.js"></script>
<script type="text/javascript" src="/js/register/group_member.js"></script>