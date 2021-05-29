<?php
$RootDir = $_SERVER['DOCUMENT_ROOT'];
require_once "$RootDir/model/config.php";
require_once "$RootDir/model/db-connect.php";
require_once "$RootDir/class/cRegister.php";
header('Content-Type: application/json; charset=UTF-8');
post_check_research_member();
function post_check_research_member(){
    $_cRegister = new cRegister();
    if (@$_POST['name']==''){return;}
    $name = @$_POST['name']==''?'':$_POST['name'];

    $ret = $_cRegister->_check_research_member($name);
    echo json_encode($ret);
    return;
    if ($ret['status']) {
        $arr = array();
        $arr['status'] = true;
        if ($ret['name']){
            $arr['name'] = $ret['name'];
        }
        echo json_encode($arr);
    } else {
        printf("檢查登記重複：" . htmlspecialchars(json_encode($ret))); // 失敗就顯示錯誤
    }

}
?>