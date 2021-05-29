<?php
$RootDir = $_SERVER['DOCUMENT_ROOT'];
require_once "$RootDir/model/config.php";
require_once "$RootDir/model/db-connect.php";
require_once "$RootDir/class/cUser.php";
update_sample_count();
function update_sample_count(){
    $_cUser = new cUser();

    $ret = $_cUser -> _update_sample($_SESSION['account']);

    if (!$ret['status']){
        printf("update試用數：" . htmlspecialchars(json_encode($ret))); // 失敗就顯示錯誤
    }
}


?>