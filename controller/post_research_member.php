<?php
$RootDir = $_SERVER['DOCUMENT_ROOT'];
require_once "$RootDir/model/config.php";
require_once "$RootDir/model/db-connect.php";
require_once "$RootDir/class/cRegister.php";
header('Content-Type: application/json; charset=UTF-8');
post_research_member();
function post_research_member(){
    $_cRegister = new cRegister();


    ///*
    //$db_connect = @$_POST['db_connect']==''?-1:$_POST['db_connect'];
    $db_connect = "yes";
    //*/
    $ret = $_cRegister->_add_research_member(
    $_POST['name'], $_POST['address'], 
    $_POST['lisence_number_1'], $_POST['edu_1'],
    $_POST['lisence_number_2'], $_POST['edu_2'], 
    $_POST['lisence_number_3'], $_POST['edu_3'], 
    $_POST['lisence_number_4'], $_POST['edu_4'], 
    $_POST['lisence_number_5'], $_POST['edu_5'], 
    $_POST['phone'], $_POST['email'], $_POST['contact_name'], 
    $_POST['institution_therapist_people_num'], 
    $_POST['teach_research_people_num'], $db_connect
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
            (int)$ret['LAST_INSERT_ID'], 'research_member'
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