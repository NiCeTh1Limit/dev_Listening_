<?php
$RootDir = $_SERVER['DOCUMENT_ROOT'];
require_once "$RootDir/model/config.php";
require_once "$RootDir/model/db-connect.php";
require_once "$RootDir/class/cRegister.php";
header('Content-Type: application/json; charset=UTF-8');
post_personal_member();
function post_personal_member(){
    $_cRegister = new cRegister();


    ///*
    // $db_connect = @$_POST['db_connect']==''?-1:$_POST['db_connect'];
    // $AAPCR = @$_POST['AAPCR']==''?'':$_POST['AAPCR'];
    // $Test1 = @$_POST['Test1']==''?'':$_POST['Test1'];
    // $Test2 = @$_POST['Test2']==''?'':$_POST['Test2'];
    // $CCICA = @$_POST['CCICA']==''?'':$_POST['CCICA'];
    // $Word = @$_POST['Word']==''?'':$_POST['Word'];
    // $Sentence = @$_POST['Sentence']==''?'':$_POST['Sentence'];
    // $buy_count = @$_POST['buy_count']==''?'':$_POST['buy_count'];
    $db_connect = "yes";
    $AAPCR = "AAPCR";
    $Test1 = "Test1";
    $Test2 = "Test2";
    $CCICA = "CCICA";
    $Word = "Word";
    $Sentence = "Sentence";
    $buy_count = -1;
    //*/
    $ret = $_cRegister->_add_personal_member(
    $_POST['name'], $_POST['license_number'], $_POST['identity_number'], 
    $_POST['edu'], $_POST['age_limit'], $_POST['service_location'], 
    $_POST['phone'], $_POST['address'], $_POST['email'], 
    $_POST['monthly_service_number'], $db_connect,
    $AAPCR, $Test1, $Test2, 
    $CCICA, $Word, $Sentence, $buy_count
    );
    /*
    var_dump($ret['LAST_INSERT_ID']);
    return;
    //*/
    if (!$ret['status']) {
        //printf($error_message, "新增資料：" . htmlspecialchars(json_encode($ret))); // 失敗就顯示錯誤
        printf("註冊會員：" . htmlspecialchars(json_encode($ret))); // 失敗就顯示錯誤
    } else {
        $ret = $_cRegister->_add_account(
            $_POST['account'], $_POST['password'],
            (int)$ret['LAST_INSERT_ID'], 'personal_member'
        );
        
        if (!$ret['status']){
            printf("新增帳號：" . htmlspecialchars(json_encode($ret))); // 失敗就顯示錯誤
        }else{            
            $arr = array();
            $arr['status'] = true;
            echo json_encode($arr);
        }
    }

}
?>