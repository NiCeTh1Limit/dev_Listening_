<?php
class cData{
    // 新增資料
    public function _add_data($time_record = NULL, $account, $ymd = NULL, $name = NULL, $sex = NULL, $birth = NULL, 
    $edu = NULL, $medical_diagnosis = NULL, $speech_pathology_diagnosis = NULL, 
    $onset_year = NULL, $onset_month = NULL, $hearing_status = NULL,
    $abnormal_reason = NULL, $arrive_GCS_E = NULL, $arrive_GCS_M = NULL, 
    $arrive_GCS_V = NULL, $current_GCS_E = NULL, $current_GCS_M = NULL, 
    $current_GCS_V = NULL, $mocat = NULL, $passed = NULL, $vision = NULL, 
    $vision_correct = NULL, $body = NULL, $body_status = NULL, $disorders = NULL, 
    $disorders_other = NULL, $recovery = NULL, $remark = NULL){
        global $db;
        $sql_str = " CALL `sp_add_data` (:time_record, :account, :ymd, :name, :sex, :birth, :edu, 
        :medical_diagnosis, :speech_pathology_diagnosis, :onset_year, 
        :onset_month, :hearing_status, :abnormal_reason, :arrive_GCS_E, 
        :arrive_GCS_M, :arrive_GCS_V, :current_GCS_E, :current_GCS_M, 
        :current_GCS_V, :mocat, :passed, :vision, :vision_correct, :body, 
        :body_status, :disorders, :disorders_other, :recovery, :remark); ";

        $stmt = $db->prepare($sql_str);
        $stmt->bindParam(':time_record', $time_record);
        $stmt->bindParam(':account', $account);
        $stmt->bindParam(':ymd', $ymd);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':sex', $sex);
        $stmt->bindParam(':birth', $birth);
        $stmt->bindParam(':edu', $edu);
        $stmt->bindParam(':medical_diagnosis', $medical_diagnosis);
        $stmt->bindParam(':speech_pathology_diagnosis', $speech_pathology_diagnosis);
        $stmt->bindParam(':onset_year', $onset_year);
        $stmt->bindParam(':onset_month', $onset_month);
        $stmt->bindParam(':hearing_status', $hearing_status);
        $stmt->bindParam(':abnormal_reason', $abnormal_reason);
        $stmt->bindParam(':arrive_GCS_E', $arrive_GCS_E);
        $stmt->bindParam(':arrive_GCS_M', $arrive_GCS_M);
        $stmt->bindParam(':arrive_GCS_V', $arrive_GCS_V);
        $stmt->bindParam(':current_GCS_E', $current_GCS_E);
        $stmt->bindParam(':current_GCS_M', $current_GCS_M);
        $stmt->bindParam(':current_GCS_V', $current_GCS_V);
        $stmt->bindParam(':mocat', $mocat);
        $stmt->bindParam(':passed', $passed);
        $stmt->bindParam(':vision', $vision);
        $stmt->bindParam(':vision_correct', $vision_correct);
        $stmt->bindParam(':body', $body);
        $stmt->bindParam(':body_status', $body_status);
        $stmt->bindParam(':disorders', $disorders);
        $stmt->bindParam(':disorders_other', $disorders_other);
        $stmt->bindParam(':recovery', $recovery);
        $stmt->bindParam(':remark', $remark);

        if ($stmt->execute()){
            return array('status' => true);
        }else{
            return array('status' => false, 'message' => $stmt->errorInfo());
        }
    }
    public function _update_test1($random1, $folder1, $answer1,
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
    $score_E, $score_M, $score_H, $score_EMH, $test1_time_record){
        global $db;
        $sql_str = "CALL sp_update_test1 (
            :random1, :folder1, :answer1,
            :random2, :folder2, :answer2,
            :random3, :folder3, :answer3,
            :random4, :folder4, :answer4,
            :random5, :folder5, :answer5,
            :random6, :folder6, :answer6,
            :random7, :folder7, :answer7,
            :random8, :folder8, :answer8,
            :random9, :folder9, :answer9,
            :random10, :folder10, :answer10,
            :random11, :folder11, :answer11,
            :random12, :folder12, :answer12,
            :random13, :folder13, :answer13,
            :random14, :folder14, :answer14,
            :random15, :folder15, :answer15,
            :random16, :folder16, :answer16,
            :random17, :folder17, :answer17,
            :random18, :folder18, :answer18,
            :random19, :folder19, :answer19,
            :random20, :folder20, :answer20, 
            :score_E, :score_M, :score_H, :score_EMH, :test1_time_record);";
        $stmt = $db->prepare($sql_str);
        for ($i=1; $i<21; $i++){
            $stmt->bindParam(':random'.$i, ${'random'.$i});
            $stmt->bindParam(':folder'.$i, ${'folder'.$i});
            $stmt->bindParam(':answer'.$i, ${'answer'.$i});
        }
        $stmt->bindParam(':test1_time_record', $test1_time_record);
        $stmt->bindParam(':score_E', $score_E);
        $stmt->bindParam(':score_M', $score_M);
        $stmt->bindParam(':score_H', $score_H);
        $stmt->bindParam(':score_EMH', $score_EMH);
        $stmt->bindParam(':test1_time_record', $test1_time_record);

        if ($stmt->execute()){
            return array('status' => true);
        }else{
            return array('status' => false, 'message' => $stmt->errorInfo());
        }
    }
    public function _update_test2($test2_folder1, $test2_where1, $test2_who1, $test2_what1, $test2_associate1, $test2_R1,
    $test2_folder2, $test2_where2, $test2_who2, $test2_what2, $test2_associate2, $test2_R2,
    $test2_folder3, $test2_where3, $test2_who3, $test2_what3, $test2_associate3, $test2_R3,
    $test2_folder4, $test2_where4, $test2_who4, $test2_what4, $test2_associate4, $test2_R4,
    $test2_folder5, $test2_where5, $test2_who5, $test2_what5, $test2_associate5, $test2_R5,
    $test2_folder6, $test2_where6, $test2_who6, $test2_what6, $test2_associate6, $test2_R6,
    $test2_folder7, $test2_where7, $test2_who7, $test2_what7, $test2_associate7, $test2_R7,
    $test2_folder8, $test2_where8, $test2_who8, $test2_what8, $test2_associate8, $test2_R8,
    $test2_folder9, $test2_where9, $test2_who9, $test2_what9, $test2_associate9, $test2_R9,
    $test2_folder10, $test2_where10, $test2_who10, $test2_what10, $test2_associate10, $test2_R10,
    $score, $_where, $_who, $_what, $_associate, $test2_time_record){
        global $db;
        $sql_str = "CALL sp_update_test2 (
            :test2_folder1, :test2_where1, :test2_who1, :test2_what1, :test2_associate1, :test2_R1,
            :test2_folder2, :test2_where2, :test2_who2, :test2_what2, :test2_associate2, :test2_R2,
            :test2_folder3, :test2_where3, :test2_who3, :test2_what3, :test2_associate3, :test2_R3,
            :test2_folder4, :test2_where4, :test2_who4, :test2_what4, :test2_associate4, :test2_R4,
            :test2_folder5, :test2_where5, :test2_who5, :test2_what5, :test2_associate5, :test2_R5,
            :test2_folder6, :test2_where6, :test2_who6, :test2_what6, :test2_associate6, :test2_R6,
            :test2_folder7, :test2_where7, :test2_who7, :test2_what7, :test2_associate7, :test2_R7,
            :test2_folder8, :test2_where8, :test2_who8, :test2_what8, :test2_associate8, :test2_R8,
            :test2_folder9, :test2_where9, :test2_who9, :test2_what9, :test2_associate9, :test2_R9,
            :test2_folder10, :test2_where10, :test2_who10, :test2_what10, :test2_associate10, :test2_R10,
            :score, :_where, :_who, :_what, :_associate, :test2_time_record);";
        $stmt = $db->prepare($sql_str);
        for ($i=1; $i<11; $i++){
            $stmt->bindParam(":test2_folder$i", ${"test2_folder$i"});
            $stmt->bindParam(":test2_where$i", ${"test2_where$i"});
            $stmt->bindParam(":test2_who$i", ${"test2_who$i"});
            $stmt->bindParam(":test2_what$i", ${"test2_what$i"});
            $stmt->bindParam(":test2_associate$i", ${"test2_associate$i"});
            $stmt->bindParam(":test2_R$i", ${"test2_R$i"});
        }
        $stmt->bindParam(":score", $score);
        $stmt->bindParam(":_where", $_where);
        $stmt->bindParam(":_who", $_who);
        $stmt->bindParam(":_what", $_what);
        $stmt->bindParam(":_associate", $_associate);
        $stmt->bindParam(":test2_time_record", $test2_time_record);
        if ($stmt->execute()){
            return array('status' => true);
        }else{
            return array('status' => false, 'message' => $stmt->errorInfo());
        }
    }
}
?>