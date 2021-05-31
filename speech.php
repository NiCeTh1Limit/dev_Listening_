<!DOCTYPE html>
<html style="height: 100%;">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </head>
    <body style="height: 100%;">
        <nav class="navbar fixed-top navbar-light bg-light row">
            <div class="container-fluid col">
                <span class="navbar-brand mx-auto fs-1" id="top_title"></span>
                <hr>
            </div>
        </nav>
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-7 mx-auto" id="main">
                    <div class="row fs-1 my-4">
                        <div class="col-5">
                            一、背景資料
                        </div>
                        <button type="button" class="btn btn-outline-dark fs-3 col-3" id="main_btn_user_data">輸入</button>
                        <div class="col-5 "></div>
                    </div>
                    <div class="row fs-1 my-4">
                        <div class="col-5">
                            二、設定
                        </div>
                        <button type="button" class="btn btn-outline-dark fs-3 col-3" id="">設定</button>
                        <div class="col-5 "></div>
                    </div>
                    <div class="row fs-1 mt-4">
                        <div class="col-5">
                            三、評估項目
                        </div>
                        <div class="col"></div>
                    </div>
                    <div class="row fs-1 my-0">
                        <div class="col-2">
                        </div>
                        <button type="button" class="btn btn-outline-dark fs-3 col-2 m-1">字詞</button>
                        <button type="button" class="btn btn-outline-dark fs-3 col-2 m-1">句子</button>
                        <button type="button" class="btn btn-outline-dark fs-3 col m-1">短文（北風與太陽）</button>
                    </div>
                    <div class="row fs-1 mb-4">
                        <div class="col-2"></div>
                        <button type="button" class="btn btn-outline-dark fs-4 col m-1">短文（國語）</button>
                        <button type="button" class="btn btn-outline-dark fs-3 col m-1">短文（台語）</button>
                    </div>
                </div>
                <div class="col-7 mx-auto visually-hidden" id="user_data">
                    <form>
                        <div class="row my-3">
                            <div class="col">
                                <label for="d_name" class="form-label">姓名</label>
                                <input type="text" class="form-control" id="d_name">
                            </div>
                            <div class="col-3">
                                <label for="d_sex" class="form-label">性別</label>
                                <select class="form-select" aria-label="Default select example" id="d_sex">
                                    <option value="1"selected>男</option>
                                    <option value="0">女</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="d_age" class="form-label">年齡</label>
                                <input type="text" class="form-control" id="d_age">
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col">
                                <label for="d_birth" class="form-label">生日</label>
                                <input type="date" class="form-control" id="d_birth">
                            </div>
                            <div class="col">
                                <label for="d_job" class="form-label">職業</label>
                                <input type="text" class="form-control" id="d_job">
                            </div>
                            <div class="col">
                                <label class="form-label" for="d_retired">退休</label>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="checkbox" value="" id="d_retired">
                                    </div>
                                    <input type="text" class="form-control" aria-describedby="btnGroupAddon">
                                    <div class="input-group-text">年</div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col">
                                <label class="form-label">聽力</label>
                                <div class="row">
                                    <div class="btn-group col" role="group">
                                        <div class="btn-group" role="group">
                                            <input type="checkbox" class="btn-check" id="d_hearing_can_follow_spoken_instruction" autocomplete="off">
                                            <label class="btn btn-outline-dark" for="d_hearing_can_follow_spoken_instruction">可遵循口語命令</label>
                                        </div>

                                        <div class="btn-group" role="group">
                                            <input type="checkbox" class="btn-check" id="d_hearing_with_hearing_aid" autocomplete="off">
                                            <label class="btn btn-outline-dark" for="d_hearing_with_hearing_aid">配有助聽器</label>
                                        </div>
                                        <div class="btn-group" role="group" style="width:50%">
                                            <input type="text" class="form-control" id="d_hearing_other" placeholder="其他">
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-4">
                                <label class="form-label" for="d_education">教育程度</label>
                                <select class="form-select" id="d_education">
                                    <option value="0"selected>國小以下</option>
                                    <option value="1">國小</option>
                                    <option value="2">國小</option>
                                    <option value="3">高中／高職</option>
                                    <option value="4">專科／大學</option>
                                    <option value="5">碩士／博士</option>
                                </select>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col">
                                <label class="form-label" for="d_idiom">慣用語</label>
                                <div class="row">
                                    <div class="btn-group col" role="group">
                                        <div class="btn-group" role="group">
                                            <input type="checkbox" class="btn-check" id="d_idiom_chinese" autocomplete="off">
                                            <label class="btn btn-outline-dark" for="d_idiom_chinese">國</label>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <input type="checkbox" class="btn-check" id="d_idiom_taiwanese" autocomplete="off">
                                            <label class="btn btn-outline-dark" for="d_idiom_taiwanese">台</label>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <input type="checkbox" class="btn-check" id="d_idiom_hakka" autocomplete="off">
                                            <label class="btn btn-outline-dark" for="d_idiom_hakka">客</label>
                                        </div>
                                        <div class="btn-group" role="group" style="width:100%;">
                                            <input type="text" class="form-control" id="d_idiom_other" placeholder="其他">
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            <div class="col">
                                <label class="form-label" for="d_address">居住地地址</label>
                                <input type="text" class="form-control col" id="d_address" placeholder="">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-7 mx-auto visually-hidden" id="user_data2">
                    
                </div>
            </div>
        </div>
        <nav class="navbar fixed-bottom navbar-light bg-light row">
            <div class="col-2"></div>
            <div class="container-fluid col">
                <button class="btn btn-outline-success mx-auto visually-hidden" type="button" id="btn_home"><img src="img/Home.jpg"></button>
            </div>
            <div class="container-fluid col">
                <button class="btn btn-outline-info mx-auto visually-hidden" type="button" id="btn_prev"><img src="img/Prev.jpg"></button>
            </div>
            <div class="container-fluid col">
                <button class="btn btn-outline-info mx-auto visually-hidden" type="button" id="btn_next"><img src="img/Next.jpg"></button>
            </div>
            <div class="container-fluid col">
                <button class="btn btn-outline-info mx-auto visually-hidden" type="button" id="btn_save"><div class="row" style="width:62px; height:56px;"><span class="m-auto">儲存</span></div></button>
            </div>
            <div class="col-2"></div>
        </nav>
    </body>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/speech.js"></script>
    <script>
        // default date
        $("#d_birth")[0].defaultValue = "1970-01-01";
        // resize navbar save button
        //$("#btn_save").width($("#btn_home").width());$("#btn_save").height($("#btn_home").height());
    </script>
</html>