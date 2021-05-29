<?php
$RootDir = $_SERVER['DOCUMENT_ROOT'];
require_once "$RootDir/model/config.php";
require_once "$RootDir/model/db-connect.php";
require_once "$RootDir/class/cRegister.php";
header('Content-Type: application/json; charset=UTF-8');
post_single_member();
function post_single_member(){
    $_cRegister = new cRegister();


    ///*
    //$db_connect = @$_POST['db_connect']==''?-1:$_POST['db_connect'];
    $db_connect = "yes";
    //*/
    $ret = $_cRegister->_add_single_member(
    $_POST['name'], $_POST['identity_number'], 
    $_POST['edu'], $_POST['age_limit'], $_POST['service_location'], 
    $_POST['phone'], $_POST['address'], $_POST['email']
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
            (int)$ret['LAST_INSERT_ID'], 'single_member'
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