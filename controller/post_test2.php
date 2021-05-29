<?php
$RootDir = $_SERVER['DOCUMENT_ROOT'];
require_once "$RootDir/model/config.php";
require_once "$RootDir/model/db-connect.php";
require_once "$RootDir/class/cData.php";
header('Content-Type: application/json; charset=UTF-8');
post_test2();
function post_test2(){
    $_cData = new cData();

    for ($i=1; $i<11; $i++){
        ${"test2_folder".$i} = $_POST["test2_folder".$i];
        ${"test2_where".$i} = $_POST["test2_where".$i];
        ${"test2_who".$i} = $_POST["test2_who".$i];
        ${"test2_what".$i} = $_POST["test2_what".$i];
        ${"test2_associate".$i} = $_POST["test2_associate".$i];
        ${"test2_R".$i} = $_POST["test2_R".$i];
    }
    $score = $_POST['score'];
    $_where = $_POST['_where'];
    $_who = $_POST['_who'];
    $_what = $_POST['_what'];
    $_associate = $_POST['_associate'];
    $test2_time_record = $_POST['test2_time_record'];

    $ret = $_cData->_update_test2(
    $test2_folder1, $test2_where1, $test2_who1, $test2_what1, $test2_associate1,$test2_R1,
    $test2_folder2, $test2_where2, $test2_who2, $test2_what2, $test2_associate2,$test2_R2,
    $test2_folder3, $test2_where3, $test2_who3, $test2_what3, $test2_associate3,$test2_R3,
    $test2_folder4, $test2_where4, $test2_who4, $test2_what4, $test2_associate4,$test2_R4,
    $test2_folder5, $test2_where5, $test2_who5, $test2_what5, $test2_associate5,$test2_R5,
    $test2_folder6, $test2_where6, $test2_who6, $test2_what6, $test2_associate6,$test2_R6,
    $test2_folder7, $test2_where7, $test2_who7, $test2_what7, $test2_associate7,$test2_R7,
    $test2_folder8, $test2_where8, $test2_who8, $test2_what8, $test2_associate8,$test2_R8,
    $test2_folder9, $test2_where9, $test2_who9, $test2_what9, $test2_associate9,$test2_R9,
    $test2_folder10, $test2_where10, $test2_who10, $test2_what10, $test2_associate10,$test2_R10,
    $score, $_where, $_who, $_what, $_associate, $test2_time_record);

    if (!$ret['status']) {
        //printf($error_message, "新增資料：" . htmlspecialchars(json_encode($ret))); // 失敗就顯示錯誤
        printf("更新資料：" . htmlspecialchars(json_encode($ret))); // 失敗就顯示錯誤
    } else {
        // 成功就回傳"time_record"
        $arr = array();
        $arr['time_record'] = $test2_time_record;
        echo json_encode($arr);
    }
}
?>