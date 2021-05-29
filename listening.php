<!DOCTYPE html>
<html>
<?php
    $RootDir = $_SERVER['DOCUMENT_ROOT'];
    require_once("$RootDir/controller/authority.php");
    $db_access = require_once("$RootDir/controller/db_access_authority.php");
    switch($_POST['listening_type']){
        case 'normal':
            $sub_count_E = 5;
            $sub_count_M = 10;
            $sub_count_H = 5;
            $sub_count_total = $sub_count_E+$sub_count_M+$sub_count_H;
            $sub_count_total2 = 10;
            $sub_count_type = 4;
            break;
        case 'simple':
            $sub_count_E = 3;
            $sub_count_M = 6;
            $sub_count_H = 3;
            $sub_count_total = $sub_count_E+$sub_count_M+$sub_count_H;
            $sub_count_total2 = 8;
            $sub_count_type = 3;
            break;
    }
    if ($_SESSION['type'] == 'single_member'){
        $sample = require_once("$RootDir/controller/check_sample_count.php");

        require_once("$RootDir/controller/update_sample_count.php");
    }
    require_once("$RootDir/model/function.php");
    require_once("$RootDir/model/function2.php");
    require_once("$RootDir/model/php_variable_to_js.php");
    $A = 0;
    $B = 1;
    $C = 2;
    $D = 3;

?>
<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
<body>
    <audio src="resource/Test1/P/0/M0.mp3" id="topic1_demonstration_M0" controls hidden></audio>
    <audio src="resource/Test1/P/1/M1.mp3" id="topic1_practice_M1" controls hidden></audio>
    <audio src="resource/Test2/0/M0.mp3" id="topic2_practice_M0" controls hidden></audio>
    <audio src="resource/answer.mp3" id="clickMP3" controls hidden></audio>
    <div id="test1_audio" hidden>
        <?php 
        for ($i=0; $i<20; $i++){
            printf("%s", "<audio src=\"{$pathM[$i.$EMH_num[$i]]}\" id=\"test1_M{$i}\" controls hidden></audio>");
        }
        ?>
    </div>
    <div id="div_test1_form" hidden>
        <form id="test1_form" name="test1_form" method="POST">
            <?php
            for ($i=1; $i<21; $i++){
                echo("<input id=\"test1_random{$i}\" name=\"test1_random{$i}\" type=\"text\" value=\"{$test1[$i-1]}\" hidden>");
                echo("<input id=\"test1_folder{$i}\" name=\"test1_folder{$i}\" type=\"text\" value=\"{$folder[$i-1]}\" hidden>");
                echo("<input id=\"test1_answer{$i}\" name=\"test1_answer{$i}\" type=\"text\" value=\"0\" hidden>");
            }
            ?>
            <input id="test1_score_E" name="test1_score_E" type="text" value="" hidden>
            <input id="test1_score_M" name="test1_score_M" type="text" value="" hidden>
            <input id="test1_score_H" name="test1_score_H" type="text" value="" hidden>
            <input id="test1_score_EMH" name="test1_score_EMH" type="text" value="" hidden>
            <input id="test1_time_record" name="test1_time_record" type="text" value="" hidden>
            
        </form>
    </div>
    <div id="_test2_audio" hidden>
        <?php
        for ($i=0; $i<10; $i++){
            echo("<audio src=\"$path2M[$i]\" id=\"M{$i}\" name=\"test2_audio\" controls hidden></audio>");
        }?>
    </div>
    <div id="div_test2_form" hidden>
        <form id="test2_form" name="test2_form" method="POST">
            <?php
            for ($i=1; $i<11; $i++){
                echo("<input type=\"text\" id=\"test2_folder{$i}\" name=\"test2_folder{$i}\" value=\"{$folder2[$i-1]}\" hidden>");
                echo("<input type=\"text\" id=\"test2_where{$i}\" name=\"test2_where{$i}\" value=\"-1\" hidden>");
                echo("<input type=\"text\" id=\"test2_who{$i}\" name=\"test2_who{$i}\" value=\"-1\" hidden>");
                echo("<input type=\"text\" id=\"test2_what{$i}\" name=\"test2_what{$i}\" value=\"-1\" hidden>");
                echo("<input type=\"text\" id=\"test2_associate{$i}\" name=\"test2_associate{$i}\" value=\"-1\" hidden>");
                echo("<input type=\"text\" id=\"test2_R{$i}\" name=\"test2_R{$i}\" value=\"\" hidden>");
            }
            ?>
            <input type="text" id="score" name="score" value="" hidden>
            <input type="text" id="_where" name="_where" value="" hidden>
            <input type="text" id="_who" name="_who" value="" hidden>
            <input type="text" id="_what" name="_what" value="" hidden>
            <input type="text" id="_associate" name="_associate" value="" hidden>
            <input id="test2_time_record" name="test2_time_record" type="text" value="" hidden>
        </form>
    </div>
    <div id="audio_CT" hidden>
        <audio src="resource/C/C1.mp3" id="C1" name="C" controls hidden></audio>
        <audio src="resource/C/C2.mp3" id="C2" name="C" controls hidden></audio>
        <audio src="resource/C/C3.mp3" id="C3" name="C" controls hidden></audio>
        <audio src="resource/C/C4.mp3" id="C4" name="C" controls hidden></audio>
        <audio src="resource/C/C5.mp3" id="C5" name="C" controls hidden></audio>
        <audio src="resource/C/C6.mp3" id="C6" name="C" controls hidden></audio>
        <audio src="resource/C/C7.mp3" id="C7" name="C" controls hidden></audio>
        <audio src="resource/C/C8.mp3" id="C8" name="C" controls hidden></audio>
        <audio src="resource/C/C9.mp3" id="C9" name="C" controls hidden></audio>
        <audio src="resource/C/C10.mp3" id="C10" name="C" controls hidden></audio>
        <audio src="resource/C/C11.mp3" id="C11" name="C" controls hidden></audio>
        <audio src="resource/C/C12.mp3" id="C12" name="C" controls hidden></audio>
        <audio src="resource/T/T1.mp3" id="T1" name="T" controls hidden></audio>
        <audio src="resource/T/T2.mp3" id="T2" name="T" controls hidden></audio>
        <audio src="resource/T/T3.mp3" id="T3" name="T" controls hidden></audio>
        <audio src="resource/T/T4.mp3" id="T4" name="T" controls hidden></audio>
        <audio src="resource/T/T5.mp3" id="T5" name="T" controls hidden></audio>
        <audio src="resource/T/T6.mp3" id="T6" name="T" controls hidden></audio>
        <audio src="resource/T/T7.mp3" id="T7" name="T" controls hidden></audio>
        <audio src="resource/T/T8.mp3" id="T8" name="T" controls hidden></audio>
        <audio src="resource/T/T9.mp3" id="T9" name="T" controls hidden></audio>
        <audio src="resource/T/T10.mp3" id="T10" name="T" controls hidden></audio>
        <audio src="resource/T/T11.mp3" id="T11" name="T" controls hidden></audio>
        <audio src="resource/T/T12.mp3" id="T12" name="T" controls hidden></audio>        
    </div>
    <div class="header" id="header" hidden>
        <div id="header_left"></div>
        <div id="header_middle"></div> 
        <div id="header_right">header_right</div>
    </div>
    <div class="container no_print" id="loading" style="background-color: transparent;">
        <div style="text-align: center; font-size: 1em;">
            網頁載入中，請稍候 ...
        </div>
    </div>
    <div class="container no_print" id="index" hidden>
        <div class="row row-1">
            <div class="column col-1">
                一、背景資料
                <button onclick="btn_go_set_data();">資料輸入</button>
            </div>
            <div class="column col-2" >
                <div style="float:left;">語言選擇：</div>
                <form>
                    <select id="language" name="language">
                    　<option value="chinese">國語</option>
                    　<option value="taiwanese">台語</option>
                    </select>
                </form> 
            </div>
        </div>
        <div class="row row-2">
            二、測驗主題項目
            <div class="column col-1">
                1、環境聲音
                <button onclick="btn_go_topic1_explain();" name="btn_topic1">說明</button>
                <button onclick="btn_go_topic1_demonstration();" name="btn_topic1">示範</button>
                <button onclick="btn_go_topic1_practice();" name="btn_topic1">練習</button>
                <button onclick="btn_go_topic1_test();" name="btn_topic1">測驗</button>
        <button id="btn_topic1_result" name="btn_topic1" onclick="btn_go_topic1_result();document.getElementById('btn_environment').disabled=false;if(!test2){document.getElementById('btn_preview_print').disabled=false;}else if(!document.getElementById('btn_situation').disabled){document.getElementById('btn_preview_print').disabled=false;};" disabled>結果</button>
            </div>
            <div class="column col-1">
                2、情境聲音
                <button onclick="btn_go_topic2_explain();" name="btn_topic2">說明</button>
                <button onclick="btn_go_topic2_practice();" name="btn_topic2">練習</button>
                <button onclick="btn_go_topic2_test();" name="btn_topic2">測驗</button>
        <button id="btn_topic2_result" name="btn_topic2" onclick="btn_go_topic2_result();document.getElementById('btn_situation').disabled=false;if(!test1){document.getElementById('btn_preview_print').disabled=false;}else if(!document.getElementById('btn_environment').disabled){document.getElementById('btn_preview_print').disabled=false;}" disabled>結果</button>
            </div>
        </div>
        <div class="row row-3">
            三、測驗結果
            <button id="btn_environment" onclick="btn_go_topic1_result();" disabled>環境聲音</button>
            <button id="btn_situation" onclick="btn_go_topic2_result();" disabled>情境聲音</button>
            <button id="btn_preview_print" onclick="btn_go_preview_print();" disabled>預覽列印</button>
        </div>
        <div class="row row-4" style="text-align:center; margin-top:5%;">
            <button onclick="javascript:location.href='/index.php';">結束</button>
        </div>
    </div>
    <div class="container no_print" id="set_data" hidden>
        <div class="content" style="width: 85%; float:left;">
            <form id="data_form" name="data_form" method="POST">
                <input type="text" id="time_record" name="time_record" hidden>
                <input type="date" id="today_date" name="日期" hidden>
                <div class="row">*姓名：<input type="text" id="u_name" name="姓名" required></div>
                <div class="row">*性別：
                    <select id="sex" name="性別" required>
                        <option value="男">男</option>
                        <option value="女">女</option>
                    </select>
                </div>
                <div class="row">*出生年月日：<input type="date" id="birth" name="出生年月日" value="1975-01-01" required></div>
                <div class="row">*教育程度：
                    <select id="edu" name="教育程度" required>
                        <option value="無">無</option>
                        <option value="國小">國小</option>
                        <option value="國中">國中</option>
                        <option value="高中職">高中職</option>
                        <option value="大學">大學</option>
                        <option value="研究所">研究所</option>
                    </select>
                </div>
                <div class="row">*醫學診斷：<input type="text" id="medical_diagnosis" name="醫學診斷" required></div>
                <div class="row">*語言病理學診斷：<input type="text" id="speech_pathology_diagnosis" name="語言病理學診斷" required></div>
                <div class="row">*發病時長；<input type="text" id="onset_year" name="發病時長_年" style="margin: 0% 0.5% 0% 2%;width: 100px;" required>年<input type="text" id="onset_month" name="發病時長_月" style="margin: 0% 0.5% 0% 2%;width: 100px;">月</div>
                <div class="row">*聽力狀況：
                    <select id="hearing_status" name="聽力狀況" onchange="select_change(this.name, this.options[this.selectedIndex].text)" required>
                        <option value="正常">正常</option>
                        <option value="不正常">不正常</option>
                    </select>
                    <select id="select_listening" name="不正常理由" onchange="select_change(this.name, this.options[this.selectedIndex].text)">
                        <option value=""></option>
                        <option value="左右皆有配戴助聽器">左右皆有配戴助聽器</option>
                        <option value="僅左耳配戴助聽器">僅左耳配戴助聽器</option>
                        <option value="僅右耳配戴助聽器">僅右耳配戴助聽器</option>
                        <option value="沒有配戴助聽器">沒有配戴助聽器</option>
                        <option value="重聽">重聽</option>
                        <option value="未測">未測 </option>
                        <option value="其他">其他</option>
                    </select>
                    <input type="text" id="hearing_other" name="hearing_other">
                </div>
                <div class="row">到院GCS分數：
                    E<input type="text" id="arrive_GCS_E" name="到院GCS分數_E" class="EMV">
                    M<input type="text" id="arrive_GCS_M" name="到院GCS分數_M" class="EMV">
                    V<input type="text" id="arrive_GCS_V" name="到院GCS分數_V" class="EMV">
                </div>
                <div class="row">目前GCS分數：
                    E<input type="text" id="current_GCS_E" name="目前GCS分數_E" class="EMV">
                    M<input type="text" id="current_GCS_M"  name="目前GCS分數_M" class="EMV">
                    V<input type="text" id="current_GCS_V" name="目前GCS分數_V" class="EMV">
                </div>
                <div class="row">*MoCA-T分數：
                    <input type="text" id="mocat" name="MoCA-T分數" required>
                    <select id="passed" name="通過否">
                        <option value="通過">通過</option>
                        <option value="不通過">不通過</option>
                    </select>
                </div>
                <div class="row">
                    <div style="float:left;">*視覺能力：</div>
                    <div style="display:grid;">
                        <div>
                            <select id="vision" name="視覺能力" onchange="select_change(this.name, this.options[this.selectedIndex].text)" required>
                                <option value="正常">正常</option>
                                <option value="近視">近視</option>
                                <option value="老花眼">老花眼</option>
                                <option value="忽略">忽略</option>
                                <option value="白內障">白內障</option>
                                <option value="其他">其他</option>
                            </select>
                            <input type="radio" class="CB" id="CB_vision_glasses" name="CB_vision[]" value="1">
                            <label id="LB_vision_glasses" name="LB_vision" for="CB_vision_glasses">有配戴眼鏡</label>
                            <input type="radio" class="CB" id="CB_vision_no_glasses" name="CB_vision[]" value="2">
                            <label id="LB_vision_no_glasses" name="LB_vision" for="CB_vision_no_glasses">未佩戴眼鏡</label>
                            <input type="radio" class="CB" id="CB_vision_left_ignore" name="CB_vision[]" value="1">
                            <label id="LB_vision_left_ignore" name="LB_vision" for="CB_vision_left_ignore">左側忽略</label>
                            <input type="radio" class="CB" id="CB_vision_right_ignore" name="CB_vision[]" value="2">
                            <label id="LB_vision_right_ignore" name="LB_vision" for="CB_vision_right_ignore">右側忽略</label>
                            <input type="checkbox" class="CB" id="CB_vision_leftEye_surgery" name="CB_vision[]" value="1" onclick="checkbox_checked(this.id, this.name)">
                            <label id="LB_vision_leftEye_surgery" name="LB_vision" for="CB_vision_leftEye_surgery">左眼已手術</label>
                            <input type="checkbox" class="CB" id="CB_vision_leftEye_no_surgery" name="CB_vision[]" value="2" onclick="checkbox_checked(this.id, this.name)">
                            <label id="LB_vision_leftEye_no_surgery" name="LB_vision" for="CB_vision_leftEye_no_surgery">左眼未手術</label>
                            <input type="checkbox" class="CB" id="CB_vision_rightEye_surgery" name="CB_vision[]" value="3" onclick="checkbox_checked(this.id, this.name)">
                            <label id="LB_vision_rightEye_surgery" name="LB_vision" for="CB_vision_rightEye_surgery">右眼已手術</label>
                            <input type="checkbox" class="CB" id="CB_vision_rightEye_no_surgery" name="CB_vision[]" value="4" onclick="checkbox_checked(this.id, this.name)">
                            <label id="LB_vision_rightEye_no_surgery" name="LB_vision" for="CB_vision_rightEye_no_surgery">右眼未手術</label>
                        </div>
                        <div>
                            <input type="text" id="TB_vision_other" name="vision_other" style="margin-top:1%;" disabled placeholder="若選其他，請說明原因">
                        </div>
                    </div>
                </div>
                <div class="row">肢體：
                    <select id="body" name="肢體" onchange="select_change(this.name, this.options[this.selectedIndex].text)">
                        <option value="正常">正常</option>
                        <option value="麻痺">麻痺</option>
                        <option value="無力">無力</option>
                        <option value="麻痺／無力">麻痺／無力</option>
                    </select>
                    <input type="checkbox" name="body_status[]" value="" checked hidden>               
                    <input type="checkbox" class="CB" id="body_left_top" name="body_status[]" value="1" hidden>
                    <label id="LB_body_left_top" for="body_left_top" hidden>左側上肢</label>
                    <input type="checkbox" class="CB" id="body_right_top" name="body_status[]" value="2" hidden>
                    <label id="LB_body_right_top" for="body_right_top" hidden>右側上肢</label>
                    <input type="checkbox" class="CB" id="body_left_bottom" name="body_status[]" value="3" hidden>
                    <label id="LB_body_left_bottom" for="body_left_bottom" hidden>左側下肢</label>
                    <input type="checkbox" class="CB" id="body_right_bottom" name="body_status[]" value="4" hidden>
                    <label id="LB_body_right_bottom" for="body_right_bottom" hidden>右側下肢</label>
                </div>
                <div class="row">
                    <div style="float:left;">身心障礙：<br>&nbsp;</div>
                    <div class="column">
                        <input type="checkbox" name="CB_disorders[]" value="" checked hidden>
                        <input type="checkbox" class="CB" id="CB_disorders_none" name="CB_disorders[]" value="1" onclick="checkbox_checked(this.id, this.name)">
                        <label id="LB_disorders_none" for="CB_disorders_none">無</label>
                        <input type="checkbox" class="CB" id="CB_disorders_sleeping" name="CB_disorders[]" value="2" onclick="checkbox_checked(this.id, this.name)">
                        <label id="LB_disorders_sleeping" for="CB_disorders_sleeping">睡眠障礙</label>
                        <input type="checkbox" class="CB" id="CB_disorders_PTSD" name="CB_disorders[]" value="3" onclick="checkbox_checked(this.id, this.name)">
                        <label id="LB_disorders_PTSD" for="CB_disorders_PTSD">PTSD</label>
                        <input type="checkbox" class="CB" id="CB_disorders_anxiety" name="CB_disorders[]" value="4" onclick="checkbox_checked(this.id, this.name)">
                        <label id="LB_disorders_anxiety" for="CB_disorders_anxiety">焦慮</label>
                        <input type="checkbox" class="CB" id="CB_disorders_depression" name="CB_disorders[]" value="5" onclick="checkbox_checked(this.id, this.name)">
                        <label id="LB_disorders_depression" for="CB_disorders_depression">憂鬱</label>
                        <input type="checkbox" class="CB" id="CB_disorders_bipolar" name="CB_disorders[]" value="6" onclick="checkbox_checked(this.id, this.name)">
                        <label id="LB_disorders_bipolar" for="CB_disorders_bipolar">躁鬱</label>
                        <br>
                        <input type="checkbox" class="CB" id="CB_disorders_other" name="CB_disorders[]" value="7" onclick="checkbox_checked(this.id, this.name)">
                        <label id="LB_disorders_other" for="CB_disorders_other">其他</label>
                        <input type="text" id="TB_disorders_other" name="disorders_other" disabled placeholder="若選其他，請說明原因">
                    </div>
                    
                </div>
                <div class="row">其他復健：
                    <input type="checkbox" name="CB_recovery[]" value="" hidden checked/>
                    <input type="checkbox" id="CB_recovery_none" name="CB_recovery[]" class="CB" value="無" onclick="checkbox_checked(this.id, this.name)">
                    <label for="CB_recovery_none">無</label>
                    <input type="checkbox" id="CB_recovery_OT" name="CB_recovery[]" class="CB" value="職能治療" onclick="checkbox_checked(this.id, this.name)">
                    <label for="CB_recovery_OT">職能治療</label>
                    <input type="checkbox" id="CB_recovery_PT" name="CB_recovery[]" class="CB" value="物理治療" onclick="checkbox_checked(this.id, this.name)">
                    <label for="CB_recovery_PT">物理治療</label>
                    <input type="checkbox" id="CB_recovery_psychotherapy" name="CB_recovery[]" class="CB" value="心理治療" onclick="checkbox_checked(this.id, this.name)">
                    <label for="CB_recovery_psychotherapy">心理治療</label>
                </div>
                <div class="row">備註：<input type="text" id="remark" name="備註" value=""></div>
                <!--<input type="submit" id="set_data_submit" value="submit" hidden/>-->
            </form>
        </div>

        <div class="btn_zone" style="width:20%; float:left;">
            <div><button class="btn_menu" onclick="btn_go_index()"><img src="img/Home.jpg"></button></div><br>
            <div><button class="btn_menu" onclick="btn_go_topic1_explain()"><img src="img/Next.jpg"></button></div><br>
            <?php
            if ($db_access['db_access']){
                print <<<EOT
                <div><button id="btn_submit_set_data" class="btn_menu" style="height:56;">完成</button></div>
EOT;
            }
            ?>
        </div>
        <div style="clear:both;"></div>
    </div>
    <?php 
    if ($_SESSION['type'] == 'personal_member'){
        require_once "$RootDir/model/check_AAPCR.php";
        
        if (!empty($_SESSION['Test1'])){
            require_once "$RootDir/listening_topic1.php";
            printf("<script type=\"text/javascript\">test1 = true</script>");
        }else{
            print <<<EOT
            <script type="text/javascript">
                var btn_topic1 = document.getElementsByName('btn_topic1');
                for (var i=0; i<btn_topic1.length; i++){
                    btn_topic1[i].disabled = true;
                }
                test1 = false;
            </script>
EOT;
        }
        if (!empty($_SESSION['Test2'])){
            require_once "$RootDir/listening_topic2.php";
            printf("<script type=\"text/javascript\">test2 = true</script>");
        }else{
            print <<<EOT
            <script type="text/javascript">
                var btn_topic2 = document.getElementsByName('btn_topic2');
                for (var i=0; i<btn_topic2.length; i++){
                    btn_topic2[i].disabled = true;
                }
                test2 = false;
            </script>
EOT;
        }
    }else{
        require_once "$RootDir/listening_topic1.php";
        require_once "$RootDir/listening_topic2.php";
        printf("<script type=\"text/javascript\">test1=true;test2=true</script>");
    }
    ?>
    <div class="print" id="preview_print" style="display: none;">
        <div class="container_print">
            <div class="print_header">
                聽知覺概念辨識測驗結果
            </div>
            <div class="print_tester">
                <table width="100%" style="table-layout:fixed; text-align:center; font-size:10.5pt;">
                    <tr>
                        <td colspan="2"><span id="print_name">王大明&nbsp;</span></td>
                        <td><span id="print_sex">男&nbsp;</span></td>
                        <td><span id="print_age">56歲&nbsp;</span></td>
                    </tr>
                </table>
                施測日期：<span id="print_date" style="font-size:11pt;">2020-02-09</span>
            </div>
            <div class="row row_result row_result_1">
                一、單純環境聲音辨識測驗（測驗一） 結果
                <div class="div_chart"><canvas id="pie_1" style="width:200px; height:200px;"></canvas></div>
                <div hidden>
                    <span id="print_meaning_score"></span>
                    <span id="print_sound_score"></span>
                    <span id="print_none_score"></span>
                </div>
                <div>
                    <ul>
                        <li class="list_1">
                            總分：<span id="print_test1_score"></span> / <?php echo $sub_count_total?> <span id="print_test1_level"></span>
                        </li>
                        <li class="list_2">
                            錯誤類型：
                        </li>
                    </ul>
                </div>                
            </div>
            <div class="row row_result row_result_2">
                二、複雜環境聲音辨識測驗（測驗二） 結果
                <div class="div_chart"><canvas id="pie_2" style="width:200px; height:200px;"></canvas></div>
                <div hidden>
                    <span id="print_where_score"></span>
                    <span id="print_who_score"></span>
                    <span id="print_what_score"></span>
                    <span id="print_associate_score"></span>
                </div>
                <div>
                    <ul>
                        <li class="list_1">
                            總分：<span id="print_test2_score"></span> / <?php echo $sub_count_total2*$sub_count_type?> <span id="print_test2_level"></span>
                        </li>
                        <li class="list_2">
                            錯誤類型：
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row row_result row_result_3">
                三、單純環境聲音辨識測驗（AACPR） 結果
                <div class="div_chart"><canvas id="pie_3" style="width:200px; height:200px;"></canvas></div>
                <div hidden>
                    <span id="print_test1_failed_score"></span>
                    <span id="print_test2_failed_score"></span>
                </div>
                <div>
                    <ul>
                        <li class="list_1">
                            總分：<span id="print_AACPR_score"></span> / <?php echo $sub_count_total+$sub_count_total2*$sub_count_type?> <span id="print_AACPR_level"></span>
                        </li>
                        <li class="list_2">
                            錯誤題數分布：
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row row_standard" style="text-align:center;">
                各切截分數的標準
                <table width="95%" border="1px" align="center" style="table-layout:fixed;font-size:10pt;">
                    <tr>
                        <td>
                            <span class="standard_title">AAPCR切截分數</span>
                            <ul type="disc">
                                <li>    通過：55分以上</li>
                                <li>    輕度：49~55分</li>
                                <li>    中重度：49分以下</li>
                            </ul>
                        </td>
                        <td>
                            <span class="standard_title">T1切截分數</span>
                            <ul type="disc">
                                <li>    通過：18分以上</li>
                                <li>    輕度：17~18分</li>
                                <li>    中重度：17分以下</li>
                            </ul>
                        </td>
                        <td>
                            <span class="standard_title">T2切截分數</span>
                            <ul type="disc">
                                <li>    通過：37分以上</li>
                                <li>    輕度：31~36分</li>
                                <li>    中重度：31分以下</li>
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="row"></div>
            <div class="row"></div>
        </div>
    </div>
</body>

<style type="text/css">
@import "css/listening.css";
</style>
<script type="text/javascript" src="/js/listening.js"></script>
<?php
if ($db_access['db_access']){
    print <<<EOT
    <script type="text/javascript" src="/js/data.js"></script>
EOT;
}
?>
<script type="text/javascript" src="/js/setData.js"></script>
<script type="text/javascript" src="/js/topic1_test.js"></script>
<script type="text/javascript" src="/js/topic2_test.js"></script>
<script type="text/javascript" src="/js/chart.js"></script>
<script type="text/javascript" src="/js/chart_plugin_labels.js"></script>
<script type="text/javascript" src="/js/preview_print.js"></script>
<script>

</script>
</html>