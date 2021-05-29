<?php
$RootDir = $_SERVER['DOCUMENT_ROOT'];
require_once "$RootDir/model/config.php";
require_once "$RootDir/model/db-connect.php";
require_once "$RootDir/class/cRegister.php";
header('Content-Type: application/json; charset=UTF-8');
post_check_personal_member();
function post_check_personal_member(){
    $_cRegister = new cRegister();

    $license_number = @$_POST['license_number']==''?'':$_POST['license_number'];
    $identity_number = @$_POST['identity_number']==''?'':$_POST['identity_number'];
    /*
    echo $license_number;
    return;
    //*/
    $ret = $_cRegister->_check_personal_member($license_number, $identity_number);
    echo json_encode($ret);
    return;
    if ($ret['status']) {
        $arr = array();
        $arr['status'] = true;
        if ($ret['license_number']){
            $arr['license_number'] = $ret['license_number'];
        }
        if ($ret['identity_number']){
            $arr['license_number'] = $ret['identity_number'];
        }
        echo json_encode($arr);
    } else {
        printf("檢查登記重複：" . htmlspecialchars(json_encode($ret))); // 失敗就顯示錯誤
    }

}
?>