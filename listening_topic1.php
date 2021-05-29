<?php
$RootDir = $_SERVER['DOCUMENT_ROOT'];
require_once("$RootDir/controller/authority.php");
?>
<div class="container_test no_print" id="topic1_explain" name="part2" style="display: none;">
    <div class="column col-1" style="position: relative;">
        <div style="position:absolute; top:60%; width:100%"><button class="btn_menu" onclick="btn_go_index();"><img src="img/Home.jpg"></button></div>
    </div>
    <div class="column col-2" style="position: relative;">
    <div style="position:absolute; top:40%; width:100%">
    <p style="text-align:center;">等一下你會看到四張圖，請指出你聽到的聲音。</p>
        </div>
    </div>
    <div class="column col-3" style="position: relative;">
        <audio src="resource/C/C2.mp3" id="myAudio" controls="" hidden=""></audio>
        <div style="position: absolute;top:39%; width:100%"><button class="btn_menu" onclick="stop_CT('1'); play_CT('2')">播音</button></div><br>
        <div style="position: absolute;top:60%; width:100%"><button class="btn_menu" onclick="btn_go_topic1_demonstration();"><img src="img/Next.jpg"></button></div>
    </div>
</div>
<div class="container_test no_print" id="topic1_demonstration" name="part2" style="display:none;">
    <div class="column col-1" style="position: relative;">
        <div style="position: absolute; bottom: 30px; left: 0px;"><button class="btn_menu" onclick="btn_go_index();"><img src="img/Home.jpg"></button></div>
    </div>
    <div class="column col-2 test">
        <div class="img_row">
            <div class="img">
                <input id="topic1_demonstration_A1" type="button" style="visibility: hidden;" value="" onclick="topic1_practice_demonstration_clickImage('demonstration', this.id);">
            </div>
            <br>
            <div class="img">
                <input id="topic1_demonstration_A2" type="button" style="visibility: hidden;" value="" onclick="topic1_practice_demonstration_clickImage('demonstration', this.id);">
            </div>
        </div>
        <div class="img_row">
            <div class="img" >
                <input id="topic1_demonstration_A3" type="button" style="visibility: hidden;" value="" onclick="topic1_practice_demonstration_clickImage('demonstration', this.id);">
            </div>
            <br>
            <div class="img">
                <input id="topic1_demonstration_A4" type="button" style="visibility: hidden;" value="" onclick="topic1_practice_demonstration_clickImage('demonstration', this.id);">
            </div>
        </div>
    </div>
    <div class="column col-3" style="position: relative;">
        <div style="position: absolute; top: 20%; left: 35%;">
            <div><button class="btn_menu" onclick="javascript:document.getElementById('topic1_demonstration_M0').play()"><img src="img/Audio.jpg" ></button></div>
            <br>
            <div><button class="btn_menu" onclick="topic1_practice_demonstration_showImage('demonstration')"><img src="img/Image.jpg" ></button></div>
        </div>
        <div style="position: absolute; bottom: 30px; right: 0px; width: 60%">
            <div><button class="btn_menu" onclick="stop_CT('3'); play_CT('4');" >播音</button></div><br>
            <div><button class="btn_menu" onclick="btn_go_topic1_practice();"><img src="img/Next.jpg" ></button></div>
        </div>
    </div>
</div>
<div class="container_test no_print" id="topic1_practice" name="part2" style="display:none;">
    <div class="column col-1" style="position: relative;">
        <div style="position: absolute; bottom: 30px; left: 0px;"><button class="btn_menu" onclick="btn_go_index();"><img src="img/Home.jpg"></button></div>
    </div>
    <div class="column col-2 test">
        <div class="img_row">
            <div class="img">
                <input id="topic1_practice_A1" type="button" style="visibility: hidden;" value="" onclick="topic1_practice_demonstration_clickImage('practice', this.id)">
            </div>
            <br>
            <div class="img">
                <input id="topic1_practice_A2" type="button" style="visibility: hidden;" value="" onclick="topic1_practice_demonstration_clickImage('practice', this.id)">
            </div>
        </div>
        <div class="img_row">
            <div class="img" >
                <input id="topic1_practice_A3" type="button" style="visibility: hidden;" value="" onclick="topic1_practice_demonstration_clickImage('practice', this.id)">
            </div>
            <br>
            <div class="img">
                <input id="topic1_practice_A4" type="button" style="visibility: hidden;" value="" onclick="topic1_practice_demonstration_clickImage('practice', this.id)">
            </div>
        </div>
    </div>
    <div class="column col-3" style="position: relative;">
        <div style="position: absolute; top: 20%; left: 35%;">
            <div><button class="btn_menu" onclick="javascript:document.getElementById('topic1_practice_M1').play();"><img src="img/Audio.jpg" ></button></div>
            <br>
            <div><button class="btn_menu" onclick="topic1_practice_demonstration_showImage('practice')"><img src="img/Image.jpg" ></button></div>
        </div>
        <div style="position: absolute; bottom: 30px; right: 0px; width: 60%">
            <div><button class="btn_menu" onclick="stop_CT('5'); play_CT('6');" >播音</button></div><br>
            <div><button class="btn_menu" onclick="btn_go_topic1_test();"><img src="img/Next.jpg" ></button></div>
        </div>
    </div>
</div>
<div class="container_test no_print" id="topic1_test" name="part2" style="display:none;">
    <div class="column col-1" style="position: relative;">
        <div style="position: absolute; bottom: 30px; left: 0px;"><button class="btn_menu" onclick="window.clearInterval(timer1);test1_stop_test1_Audio();btn_go_index();"><img src="img/Home.jpg"></button></div>
    </div>
    <div class="column col-2 test">
        <div class="img_row" id="test1_subject_fool_1">
            <div class="img"><input type="button" onclick="play_click_mp3()"></div>
            <br>
            <div class="img"><input type="button" onclick="play_click_mp3()"></div>
        </div>
        <div class="img_row" id="test1_subject_fool_2">
            <div class="img"><input type="button" onclick="play_click_mp3()"></div>
            <br>
            <div class="img"><input type="button" onclick="play_click_mp3()"></div>
        </div>
        <?php 
        for ($k=0; $k<$sub_count_total; $k++){
            print <<<EOT
            <div class="img_row" id="test1_subject_{$k}_1" hidden>
                <div class="img">
                    <input id="test1_A{$k}_0" name="test1_A{$k}" type="button" style="background-Image: url('{$path[$k.$EMH_num[$k].$A]}');" value="" onclick="test1_image_Click(this.id, this.name)">
                </div>
                <br>
                <div class="img">
                    <input id="test1_A{$k}_1" name="test1_A{$k}" type="button" style="background-Image: url('{$path[$k.$EMH_num[$k].$B]}');" value="" onclick="test1_image_Click(this.id, this.name)">
                </div>
            </div>
            <div class="img_row" id="test1_subject_{$k}_2" hidden>
                <div class="img">
                    <input id="test1_A{$k}_2" name="test1_A{$k}" type="button" style="background-Image: url('{$path[$k.$EMH_num[$k].$C]}');" value="" onclick="test1_image_Click(this.id, this.name)">
                </div>
                <br>
                <div class="img">
                    <input id="test1_A{$k}_3" name="test1_A{$k}" type="button" style="background-Image: url('{$path[$k.$EMH_num[$k].$D]}');" value="" onclick="test1_image_Click(this.id, this.name)">
                </div>
            </div>
EOT;
        }?>
    </div>
    <div class="column col-3" style="position: relative;">
        <div style="position: absolute; top: 8%; left: 35%;">
            <div><button class="btn_menu" onclick="test1_play_test1_Audio()"><img src="img/Audio.jpg" ></button></div>
            <br>
            <div><button class="btn_menu" onclick="test1_showImage()"><img src="img/Image.jpg" ></button></div>
            <br>
            <div><button class="btn_menu" onclick="test1_previous_subject()"><img src="img/Prev.jpg" ></button></div>
            <br>
            <div><button class="btn_menu" onclick="test1_next_subject()"><img src="img/Next.jpg" ></button></div>
            <br>
            <br>
            <div><img id="test1_alert" src="img/Alert.jpg" style="height:56px;" hidden></div>
        </div>
    </div>
</div>
<div class="container_result no_print" id="topic1_result" name="part2" style="display:none;">
    <div class="row row-1" id="topic1_result_div1">
        <table id="table_topic1_result" border="1px" width="100%">
        <?php
            echo "<tr>";
            echo "<td colspan=\"3\">名稱</td>";
            for ($k=0; $k<$sub_count_total; $k++){
                echo "<td>";
                echo "R".($k+1);
                echo "</td>";
            }
            echo "</tr>";
            echo "<tr>";
            echo "<td colspan=\"3\">隨機碼編號</td>";
            for ($k=0; $k<$sub_count_total; $k++){
                echo "<td>";
                echo $test1[$k];
                echo "</td>";
            }
            echo "</tr>";
            echo "<tr>";
            echo "<td colspan=\"3\">資料夾編號</td>";
            for ($k=0; $k<$sub_count_total; $k++){
                echo "<td>";
                echo $folder[$k];
                echo "</td>";
            }
            echo "</tr>";
            echo "<tr>";
            echo "<td colspan=\"3\">測試者答案</td>";
            for ($k=0; $k<$sub_count_total; $k++){
                echo "<td>";
                echo "</td>";
            }
            echo "</tr>";
        ?>
        </table>
    </div>
    <div class="row row-2" style="margin: 1% 1%;margin-top: 0.4%;">1：正確答案／ 2：語意相關／ 3：聲學相關／ 4：無相關／ 0：未作答</div>
    <div class="row row-score">
        <table>
            <tr>
                <td class="td_fool"></td>
                <td>得分： E成績(<b id="score_E"></b>分); M成績(<b id="score_M"></b>分); H成績(<b id="score_H"></b>分)</td>                    
            </tr>
            <tr>
                <td class="td_fool"></td>
                <td>總分： <b id="test1_score_total"></b>/<?php echo $sub_count_total;?></td>                                       
            </tr>
        </table>
    </div>
    <div class="row row-btn">
        <div class="div_left">
            <button class="btn_left btn_menu" onclick="btn_go_index();"><img src="img/Home.jpg"></button>
        </div>
        <div class="div_right">
            <?php
            if ($db_access['db_access']){
                print <<<EOT
                <button id="btn_submit_test1" class="btn_right btn_menu" onclick="">儲存</button>
EOT;
            }
            ?>
        </div>
    </div>
</div>