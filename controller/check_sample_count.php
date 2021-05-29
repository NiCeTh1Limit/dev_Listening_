<?php
$RootDir = $_SERVER['DOCUMENT_ROOT'];
require_once "$RootDir/model/config.php";
require_once "$RootDir/model/db-connect.php";
require_once "$RootDir/class/cUser.php";
check_sample_count();
function check_sample_count(){
    $_cUser = new cUser();

    $ret = $_cUser -> _check_sample($_SESSION['account']);

    if (!$ret['status']){
        printf("check試用數：" . htmlspecialchars(json_encode($ret))); // 失敗就顯示錯誤
    }else{
        if ($ret['sample_count'] <= 0){
            header("location: $RootDir/lobby.php");
            exit();
        }
    }
}


?>