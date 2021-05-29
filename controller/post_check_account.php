<?php
$RootDir = $_SERVER['DOCUMENT_ROOT'];
require_once "$RootDir/model/config.php";
require_once "$RootDir/model/db-connect.php";
require_once "$RootDir/class/cRegister.php";
header('Content-Type: application/json; charset=UTF-8');
post_check_account();
function post_check_account(){
    $_cRegister = new cRegister();

    $ret = $_cRegister -> _check_account($_POST['account']);

    if (!$ret['status']){
        $arr = array();
        $arr['status'] = false;
        echo json_encode($arr);
    }else{
        $arr = array();
        $arr['status'] = true;
        echo json_encode($arr);
    }

}

?>