<?php
$RootDir = $_SERVER['DOCUMENT_ROOT'];
require_once "$RootDir/controller/authority.php";
require_once "$RootDir/model/config.php";
require_once "$RootDir/model/db-connect.php";
require_once "$RootDir/class/cData.php";
header('Content-Type: application/json; charset=UTF-8');
post_set_data();

function _post_text($str){ 
    $r_val = empty($_POST[$str]) ? "" : $_POST[$str];
    $r_val = "value=\"" . $r_val . "\"";
    return $r_val; 
}
function _post_select($str, $value){
    $r_val = empty($_POST[$str])? "" : $_POST[$str]==$value? "selected" : "";
    return $r_val;
}
function _post_select_checkbox($str_select, $str_checkbox, $checkbox_value){
    $select_value = empty($_POST[$str_select])? "" : $_POST[$str_select]; 
    switch ($str_select){
        case '視覺能力':
            if ($select_value == '近視' or $select_value == '老花眼'){
                return _post_checkbox($str_checkbox, $checkbox_value);
            }
            else if ($select_value == '忽略'){
                return _post_checkbox($str_checkbox, $checkbox_value);
            }else if ($select_value == "白內障"){
                return _post_checkbox($str_checkbox, $checkbox_value);
            }
            break;
        case '肢體':
            if ($select_value != '正常'){
                return _post_checkbox($str_checkbox, $checkbox_value);
            }
            break;
    }
}
function _post_checkbox($str, $value){
    $checkbox = empty($_POST[$str])? "" : $_POST[$str]; 
    if ($checkbox != ''){
        for ($i=0; $i<count($checkbox); $i++){
            if ($checkbox[$i] == $value){
                return 'checked';
            }
        }
    }
}
function post_set_data(){
    $_cData = new cData();
    if (@$_POST['姓名'] != ""){
        $time_record = $_POST['time_record'];
        $hearing_status = $_POST['聽力狀況'];
        if ($hearing_status == "不正常"){
            $abnormal_reason = $_POST['不正常理由'];
            if ($abnormal_reason == "其他"){
                $abnormal_reason = $_POST['hearing_other'];
            }
        }else{
            $abnormal_reason = "";
        }
    
        $vision = $_POST['視覺能力'];
        if ($vision == "正常"){
            $vision_correct = "";
        }else if ($vision == "其他"){
            $vision_correct = $_POST['vision_other'];
        }else{
            $arr = $_POST['CB_vision'];
            $vision_correct = "";
            for ($i=0; $i<count($arr); $i++){
                $vision_correct .= $arr[$i];
            }
        }
    
        $arr = $_POST['body_status'];
        $body_status = "";
        for ($i=0; $i<count($arr); $i++){
            $body_status .= $arr[$i];
        }
    
        $arr = $_POST['CB_disorders'];
        $disorders = "";
        $disorders_other = "";
        for ($i=0; $i<count($arr); $i++){
            $disorders .= $arr[$i];
            if ($arr[$i] == '7'){
                $disorders_other = $_POST['disorders_other'];
            }
        }
        
        $arr = $_POST['CB_recovery'];
        $recovery = "";
        for ($i=0; $i<count($arr); $i++){
            $recovery .= $arr[$i];
        }
        //empty($_POST['備註']) ? $remark = null : $remark = $_POST['備註'];

        $ret = $_cData->_add_data($_POST['time_record'], $_SESSION['account'],$_POST['日期'], $_POST['姓名'], $_POST['性別'],
        $_POST['出生年月日'], $_POST['教育程度'], $_POST['醫學診斷'], $_POST['語言病理學診斷'],
        $_POST['發病時長_年'], $_POST['發病時長_月'], $_POST['聽力狀況'],
        $abnormal_reason, $_POST['到院GCS分數_E'], $_POST['到院GCS分數_M'],
        $_POST['到院GCS分數_V'], $_POST['目前GCS分數_E'], $_POST['目前GCS分數_M'],
        $_POST['目前GCS分數_V'], $_POST['MoCA-T分數'], $_POST['通過否'],
        $vision, $vision_correct, $_POST['肢體'],
        $body_status, $disorders, $disorders_other,
        $recovery, $_POST['備註']);
        if (!$ret['status']) {
            //printf($error_message, "新增資料：" . htmlspecialchars(json_encode($ret))); // 失敗就顯示錯誤
            printf("新增資料：" . htmlspecialchars(json_encode($ret))); // 失敗就顯示錯誤
        } else {
            // 成功就回傳time_record、姓名、性別、年齡、日期
            $arr = array();
            $arr['time_record'] = $time_record;
            $arr['u_name'] = $_POST['姓名'];
            $arr['sex'] = $_POST['性別'];
            $arr['age'] = birthday($_POST['出生年月日']);
            $arr['date'] = $_POST['日期'];
            $arr['CB_recovery'] = $_POST['CB_recovery'];
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
}
function birthday($birthday){ 
    $age = strtotime($birthday); 
    if($age === false){ 
    return false; 
    } 
    list($y1,$m1,$d1) = explode("-",date("Y-m-d",$age)); 
    $now = strtotime("now"); 
    list($y2,$m2,$d2) = explode("-",date("Y-m-d",$now)); 
    $age = $y2 - $y1; 
    if((int)($m2.$d2) < (int)($m1.$d1)) 
    $age -= 1; 
    return $age; 
    } 
?>