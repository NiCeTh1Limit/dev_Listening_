<?php
$RootDir = $_SERVER['DOCUMENT_ROOT'];
require_once "$RootDir/model/config.php";
require_once "$RootDir/model/db-connect.php";
require_once "$RootDir/class/cRegister.php";
header('Content-Type: application/json; charset=UTF-8');
post_group_member();
function post_group_member(){
    $_cRegister = new cRegister();


    ///*
    //$db_connect = @$_POST['db_connect']==''?-1:$_POST['db_connect'];
    $db_connect = "yes";
    //*/
    $ret = $_cRegister->_add_group_member(
    $_POST['name'], $_POST['address'], $_POST['phone'], 
    $_POST['email'], $_POST['contact_name'], $_POST['institution'], 
    $_POST['therapist_quota'], $_POST['people_num'],
    $_POST['monthly_service_number'], $db_connect
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
            (int)$ret['LAST_INSERT_ID'], 'group_member'
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