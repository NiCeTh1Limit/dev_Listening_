<?php
$RootDir = $_SERVER['DOCUMENT_ROOT'];
require_once "$RootDir/model/config.php";
require_once "$RootDir/model/db-connect.php";
require_once "$RootDir/class/cRegister.php";
header('Content-Type: application/json; charset=UTF-8');
post_check_single_member();
function post_check_single_member(){
    $_cRegister = new cRegister();
    if (@$_POST['identity_number']==''){return;}
    $identity_number = @$_POST['identity_number']==''?'':$_POST['identity_number'];

    $ret = $_cRegister->_check_single_member($identity_number);
    echo json_encode($ret);
    return;
    if ($ret['status']) {
        $arr = array();
        $arr['status'] = true;
        if ($ret['identity_number']){
            $arr['identity_number'] = $ret['identity_number'];
        }
        echo json_encode($arr);
    } else {
        printf("檢查登記重複：" . htmlspecialchars(json_encode($ret))); // 失敗就顯示錯誤
    }

}
?>