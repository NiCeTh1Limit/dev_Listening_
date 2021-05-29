<?php
$RootDir = $_SERVER['DOCUMENT_ROOT'];
require_once "$RootDir/model/config.php";
require_once "$RootDir/model/db-connect.php";
require_once "$RootDir/class/cData.php";
header('Content-Type: application/json; charset=UTF-8');
post_test1();
function post_test1(){
    $_cData = new cData();

    for ($i=1; $i<21; $i++){
        ${'random'.$i} = $_POST['test1_random'.$i];
        ${'folder'.$i} = $_POST['test1_folder'.$i];
        ${'answer'.$i} = $_POST['test1_answer'.$i];
    }
    $score_E = $_POST['test1_score_E'];
    $score_M = $_POST['test1_score_M'];
    $score_H = $_POST['test1_score_H'];
    $score_EMH = $_POST['test1_score_EMH'];
    $test1_time_record = $_POST['test1_time_record'];

    $ret = $_cData->_update_test1($random1, $folder1, $answer1,
    $random2, $folder2, $answer2,
    $random3, $folder3, $answer3,
    $random4, $folder4, $answer4,
    $random5, $folder5, $answer5,
    $random6, $folder6, $answer6,
    $random7, $folder7, $answer7,
    $random8, $folder8, $answer8,
    $random9, $folder9, $answer9,
    $random10, $folder10, $answer10,
    $random11, $folder11, $answer11,
    $random12, $folder12, $answer12,
    $random13, $folder13, $answer13,
    $random14, $folder14, $answer14,
    $random15, $folder15, $answer15,
    $random16, $folder16, $answer16,
    $random17, $folder17, $answer17,
    $random18, $folder18, $answer18,
    $random19, $folder19, $answer19,
    $random20, $folder20, $answer20,
    $score_E, $score_M, $score_H, $score_EMH, $test1_time_record);
            
    if (!$ret['status']) {
        //printf($error_message, "新增資料：" . htmlspecialchars(json_encode($ret))); // 失敗就顯示錯誤
        printf("更新資料：" . htmlspecialchars(json_encode($ret))); // 失敗就顯示錯誤
    } else {
        // 成功就回傳"time_record"
        $arr = array();
        $arr['time_record'] = $test1_time_record;
        echo json_encode($arr);
        
        // 成功就把完成按鈕disabled、紀錄time_record至js
        /*
        echo "<script type=\"text/javascript\">";
        echo "document.getElementById('btn_submit').disabled = true;";
        echo "var time_record = " . $_POST['time_record'] . ';';
        echo "</script>";
        */
    }

}
?>