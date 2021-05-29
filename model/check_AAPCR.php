<?php
$RootDir = $_SERVER['DOCUMENT_ROOT'];
require_once "$RootDir/model/config.php";
require_once "$RootDir/model/db-connect.php";
require_once "$RootDir/class/cAuthority.php";

check_AAPCR();
function check_AAPCR(){
    $_cAuthority = new cAuthority();

    $ret = $_cAuthority -> _check_AAPCR($_SESSION['account']);

    if ($ret['status']){
        $_SESSION['Test1'] = $ret['Test1'];
        $_SESSION['Test2'] = $ret['Test2'];
    }else{
        printf("檢查AAPCR失敗：" . htmlspecialchars(json_encode($ret))); // 失敗就顯示錯誤
    }
}
?>