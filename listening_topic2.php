<?php
$RootDir = $_SERVER['DOCUMENT_ROOT'];
require_once("$RootDir/controller/authority.php");
?>
<div class="container_test no_print" id="topic2_explain" name="part2" style="display: none;">
    <div class="column col-1" style="position: relative;">
        <div style="position:absolute; top:50%; width:100%"><button class="btn_menu" onclick="btn_go_index();"><img src="img/Home.jpg"></button></div>
    </div>
    <div class="column col-2" style="position: relative;">
    <div style="position:absolute; top:40%; width:100%">
        <p style="text-align:center;">
            注意下面聲音，我會問你一些問題。
        </p>
    </div>
</div>
    <div class="column col-3" style="position: relative;">
        <div style="position:absolute; top:50%; width:100%"><button class="btn_menu" onclick="btn_go_topic2_practice();"><img src="img/Next.jpg" style="height:56;"></button></div>
    </div>
</div>
<div class="container_test no_print" id="topic2_practice" name="part2" style="display:none;">
    <div class="column col-1" style="position: relative;">
        <div style="position: absolute; bottom: 30px; left: 0px;"><button class="btn_menu" onclick="document.getElementById('topic2_practice_M0').pause(); document.getElementById('topic2_practice_M0').currentTime=0; btn_go_index();"><img src="img/Home.jpg"></button></div>
    </div>
    <div class="column col-2" id="topic2_practice_column_fool" style="height:500px; text-align:center;">
        <table style="width:100%; height:100%;">
            <tr>
                <td style="border-style:none;vertical-align: middle;">
                    <div id="topic2_practice_column_fool_text" style="text-align: center; font-size:64px; font-weight: bold;">你會在哪裡聽到這個聲音？</div>
                </td>
            </tr>
        </table>
    </div>
    <div class="column col-2 test" id="topic2_practice_column_middle" style="display:none;">
        <div class="img_row">
            <div class="img">
                <input name="topic2_practice_ans_fool" type="button" style="visibility: hidden;" value="">
                <input id="topic2_practice_A1_1" name="topic2_practice_A" type="button" hidden value="" style="background-Image:url(resource/Test2/0/1/C01/3.jpg);" onclick="topic2_practice_clickImage(this.id)">
                <input id="topic2_practice_A2_1" name="topic2_practice_A" type="button" hidden value="" style="background-Image:url(resource/Test2/0/2/A02.jpg);" onclick="topic2_practice_clickImage(this.id)">
                <input id="topic2_practice_A3_1" name="topic2_practice_A" type="button" hidden value="" style="background-Image:url(resource/Test2/0/3/C03/3.jpg);" onclick="topic2_practice_clickImage(this.id)">
                <input id="topic2_practice_A4_1" name="topic2_practice_A" type="button" hidden value="" style="background-Image:url(resource/Test2/0/4/C04/3.jpg);" onclick="topic2_practice_clickImage(this.id)">
            </div>
            <br>
            <div class="img">
                <input name="topic2_practice_ans_fool" type="button" style="visibility: hidden;" value="">
                <input id="topic2_practice_A1_2" name="topic2_practice_A" type="button" hidden value="" style="background-Image:url(resource/Test2/0/1/C01/2.jpg);" onclick="topic2_practice_clickImage(this.id)">
                <input id="topic2_practice_A2_2" name="topic2_practice_A" type="button" hidden value="" style="background-Image:url(resource/Test2/0/2/C02/2.jpg);" onclick="topic2_practice_clickImage(this.id)">
                <input id="topic2_practice_A3_2" name="topic2_practice_A" type="button" hidden value="" style="background-Image:url(resource/Test2/0/3/C03/2.jpg);" onclick="topic2_practice_clickImage(this.id)">
                <input id="topic2_practice_A4_2" name="topic2_practice_A" type="button" hidden value="" style="background-Image:url(resource/Test2/0/4/A04.jpg);" onclick="topic2_practice_clickImage(this.id)">
            </div>
        </div>
        <div class="img_row">
            <div class="img" >
                <input name="topic2_practice_ans_fool" type="button" style="visibility: hidden;" value="">
                <input id="topic2_practice_A1_3" name="topic2_practice_A" type="button" hidden value="" style="background-Image:url(resource/Test2/0/1/C01/1.jpg);" onclick="topic2_practice_clickImage(this.id)">
                <input id="topic2_practice_A2_3" name="topic2_practice_A" type="button" hidden value="" style="background-Image:url(resource/Test2/0/2/C02/1.jpg);" onclick="topic2_practice_clickImage(this.id)">
                <input id="topic2_practice_A3_3" name="topic2_practice_A" type="button" hidden value="" style="background-Image:url(resource/Test2/0/3/A03.jpg);" onclick="topic2_practice_clickImage(this.id)">
                <input id="topic2_practice_A4_3" name="topic2_practice_A" type="button" hidden value="" style="background-Image:url(resource/Test2/0/4/C04/1.jpg);" onclick="topic2_practice_clickImage(this.id)">
            </div>
            <br>
            <div class="img">
                <input name="topic2_practice_ans_fool" type="button" style="visibility: hidden;" value="">
                <input id="topic2_practice_A1_4" name="topic2_practice_A" type="button" hidden value="" style="background-Image:url(resource/Test2/0/1/A01.jpg);" onclick="topic2_practice_clickImage(this.id)">
                <input id="topic2_practice_A2_4" name="topic2_practice_A" type="button" hidden value="" style="background-Image:url(resource/Test2/0/2/C02/3.jpg);" onclick="topic2_practice_clickImage(this.id)">
                <input id="topic2_practice_A3_4" name="topic2_practice_A" type="button" hidden value="" style="background-Image:url(resource/Test2/0/3/C03/1.jpg);" onclick="topic2_practice_clickImage(this.id)">
                <input id="topic2_practice_A4_4" name="topic2_practice_A" type="button" hidden value="" style="background-Image:url(resource/Test2/0/4/C04/2.jpg);" onclick="topic2_practice_clickImage(this.id)">
            </div>
        </div>
    </div>
    <div class="column col-3" style="position: relative;">
        <div style="position: absolute; top: 8%; left: 35%;" id="topic2_practice_column_right1" hidden>
            <div><button class="btn_menu" onclick="javascript:stop_CT('8'); document.getElementById('topic2_practice_M0').play();"><img src="img/Audio.jpg" style="height:56;"></button></div>
            <br>
            <div><button class="btn_menu" onclick="topic2_practice_showImage()"><img src="img/Image.jpg" style="height:56;"></button></div>
            <br>
            <div><button class="btn_menu" onclick="document.getElementById('topic2_practice_M0').pause(); document.getElementById('topic2_practice_M0').currentTime=0; stop_CT('8'); topic2_practice_previous_subject()"><img src="img/Prev.jpg" style="height:56;"></button></div>
            <br>
            <div><button class="btn_menu" onclick="document.getElementById('topic2_practice_M0').pause(); document.getElementById('topic2_practice_M0').currentTime=0; stop_CT('8'); topic2_practice_next_subject()"><img src="img/Next.jpg" style="height:56;"></button></div>
        </div>
        <div style="position: absolute; bottom: 30px; right: 0px;" id="topic2_practice_column_right2">
            <div><button class="btn_menu" onclick="stop_CT('8'); topic2_practice_column_text()"><img src="img/Next.jpg" style="height:56;"></button></div>
        </div>
    </div>
</div>
<div class="container_test no_print" id="topic2_test" name="part2" style="display:none;">
    <div class="column col-1" style="position: relative;">
        <div style="position: absolute; bottom: 30px; left: 0px;"><button class="btn_menu" onclick="window.clearInterval(timer2);hidden_subject();stop_subject_audio();btn_go_index();"><img src="img/Home.jpg"></button></div>
    </div>        
    <div class="column col-2" id="test2_column_show" style="height:500px; text-align:center;">
        <table style="width:100%; height:100%;">
            <tr>
                <td style="border-style:none;vertical-align: middle;">
                    <div id="test2_column_show_text" style="text-align: center; font-size:64px; font-weight: bold;"></div>
                </td>
            </tr>
        </table>
    </div>
    <div class="column col-2 test" id="test2_column_middle" style="display:none;">
        <div class="img_row" id="test2_subject_fool_1">
            <div class="img">
                <input name="test2_ans_fool" type="button" value="" onclick="playClickMP3()">
            </div>
            <br>
            <div class="img">
                <input name="test2_ans_fool" type="button" value="" onclick="playClickMP3()">
            </div>
        </div>
        <div class="img_row" id="test2_subject_fool_2">
            <div class="img">
                <input name="test2_ans_fool" type="button" value="" onclick="playClickMP3()">
            </div>
            <br>
            <div class="img">
                <input name="test2_ans_fool" type="button" value="" onclick="playClickMP3()">
            </div>
        </div>
    <?php
    for ($i=0; $i<$sub_count_total2; $i++){
        print <<<EOT
        <div class="img_row" id="test2_subject_A{$i}_1" hidden>
            <div class="img">
EOT;
            for ($k=0; $k<$sub_count_type; $k++){
                print <<<EOT
                <input id="test2_A{$i}_{$k}_0" name="test2_A{$i}_{$k}" type="button" hidden value="" style="background-Image:url({$T2path[$i.$k.$A]});" onclick="test2_image_Click(this.id, this.name)">
EOT;
            }   
                /*
                <input id="test2_A{$i}_0_0" name="test2_A{$i}_0" type="button" hidden value="" style="background-Image:url({$T2path[$i.$A.$A]});" onclick="test2_image_Click(this.id, this.name)">
                <input id="test2_A{$i}_1_0" name="test2_A{$i}_1" type="button" hidden value="" style="background-Image:url({$T2path[$i.$B.$A]});" onclick="test2_image_Click(this.id, this.name)">
                <input id="test2_A{$i}_2_0" name="test2_A{$i}_2" type="button" hidden value="" style="background-Image:url({$T2path[$i.$C.$A]});" onclick="test2_image_Click(this.id, this.name)">
                <input id="test2_A{$i}_3_0" name="test2_A{$i}_3" type="button" hidden value="" style="background-Image:url({$T2path[$i.$D.$A]});" onclick="test2_image_Click(this.id, this.name)">
                */
            print <<<EOT
            </div>
            <br>
            <div class="img">
EOT;
            for ($k=0; $k<$sub_count_type; $k++){
                print <<< EOT
                <input id="test2_A{$i}_{$k}_1" name="test2_A{$i}_{$k}" type="button" hidden value="" style="background-Image:url({$T2path[$i.$k.$B]});" onclick="test2_image_Click(this.id, this.name)">
EOT;
            }
                /*
                <input id="test2_A{$i}_0_1" name="test2_A{$i}_0" type="button" hidden value="" style="background-Image:url({$T2path[$i.$A.$B]});" onclick="test2_image_Click(this.id, this.name)">
                <input id="test2_A{$i}_1_1" name="test2_A{$i}_1" type="button" hidden value="" style="background-Image:url({$T2path[$i.$B.$B]});" onclick="test2_image_Click(this.id, this.name)">
                <input id="test2_A{$i}_2_1" name="test2_A{$i}_2" type="button" hidden value="" style="background-Image:url({$T2path[$i.$C.$B]});" onclick="test2_image_Click(this.id, this.name)">
                <input id="test2_A{$i}_3_1" name="test2_A{$i}_3" type="button" hidden value="" style="background-Image:url({$T2path[$i.$D.$B]});" onclick="test2_image_Click(this.id, this.name)">
                */
            print <<< EOT
                
            </div>
            </div>
            <div class="img_row" id="test2_subject_A{$i}_2" hidden>
                <div class="img" >
EOT;
            for ($k=0; $k<$sub_count_type; $k++){
                print <<<EOT
                <input id="test2_A{$i}_{$k}_2" name="test2_A{$i}_{$k}" type="button" hidden value="" style="background-Image:url({$T2path[$i.$k.$C]});" onclick="test2_image_Click(this.id, this.name)">
EOT;
            }
            /*
                <input id="test2_A{$i}_0_2" name="test2_A{$i}_0" type="button" hidden value="" style="background-Image:url({$T2path[$i.$A.$C]});" onclick="test2_image_Click(this.id, this.name)">
                <input id="test2_A{$i}_1_2" name="test2_A{$i}_1" type="button" hidden value="" style="background-Image:url({$T2path[$i.$B.$C]});" onclick="test2_image_Click(this.id, this.name)">
                <input id="test2_A{$i}_2_2" name="test2_A{$i}_2" type="button" hidden value="" style="background-Image:url({$T2path[$i.$C.$C]});" onclick="test2_image_Click(this.id, this.name)">
                <input id="test2_A{$i}_3_2" name="test2_A{$i}_3" type="button" hidden value="" style="background-Image:url({$T2path[$i.$D.$C]});" onclick="test2_image_Click(this.id, this.name)">
            */
            print <<< EOT
                
            </div>
            <br>
            <div class="img"> 
EOT;
            for ($k=0; $k<$sub_count_type; $k++){
                print <<<EOT
                <input id="test2_A{$i}_{$k}_3" name="test2_A{$i}_{$k}" type="button" hidden value="" style="background-Image:url({$T2path[$i.$k.$D]});" onclick="test2_image_Click(this.id, this.name)">
EOT;
            }
            /*
                <input id="test2_A{$i}_0_3" name="test2_A{$i}_0" type="button" hidden value="" style="background-Image:url({$T2path[$i.$A.$D]});" onclick="test2_image_Click(this.id, this.name)">
                <input id="test2_A{$i}_1_3" name="test2_A{$i}_1" type="button" hidden value="" style="background-Image:url({$T2path[$i.$B.$D]});" onclick="test2_image_Click(this.id, this.name)">
                <input id="test2_A{$i}_2_3" name="test2_A{$i}_2" type="button" hidden value="" style="background-Image:url({$T2path[$i.$C.$D]});" onclick="test2_image_Click(this.id, this.name)">
                <input id="test2_A{$i}_3_3" name="test2_A{$i}_3" type="button" hidden value="" style="background-Image:url({$T2path[$i.$D.$D]});" onclick="test2_image_Click(this.id, this.name)">
            */
            print <<<EOT
            </div>
        </div>
EOT;
    }?>            
    </div>
    <div class="column col-3" style="position: relative;">
        <div id="test2_column_right1" style="position: absolute; top: 8%;" hidden>
            <div><button class="btn_menu" onclick="btn_play_audio();"><img src="img/Audio.jpg" style="height:56;"></button></div>
            <br>
            <div><button class="btn_menu" onclick="btn_show_image();"><img src="img/Image.jpg" style="height:56;"></button></div>
            <br>
            <table width="204" style="text-align:center; table-layout: fixed;">
                <tr>
                    <td colspan="3"><button class="btn_menu" onclick="btn_change_subject('prevStage')"><img src="img/PrevStage.jpg" style="height:56;"></button></td>
                </tr>
                <tr>
                    <td width="68"><button class="btn_menu" onclick="btn_change_subject('prevType')"><img src="img/Prev.jpg" style="height:56;"></button></td>
                    <td width="68"></td>
                    <td width="68"><button class="btn_menu" onclick="btn_change_subject('nextType');"><img src="img/Next.jpg" style="height:56;"></button></td>
                </tr>
                <tr>
                    <td colspan="3"><button class="btn_menu" onclick="btn_change_subject('nextStage')"><img src="img/NextStage.jpg" style="height:56;"></button></td>
                </tr>
                <tr>
                    <td colspan="3"><img id="test2_alert" src="img/Alert.jpg" hidden></td>
                </tr>
            </table>
        </div>
        <div id="test2_column_right2" style="position: absolute; bottom: 30px; right: 0px;">
            <div><button class="btn_menu" onclick="btn_column_text_next()"><img src="img/Next.jpg" style="height:56;"></button></div>
        </div>
    </div>
</div>
<div class="container_result no_print" id="topic2_result" name="part2" style="display:none;">
    <div class="row row-1" id="topic2_result_div1">
        <table id="table_topic2_result" border="1px" width="100%">
        <?php
            echo "<tr>";
            echo "<td colspan=\"3\">項目</td>";
            for ($k=0; $k<$sub_count_total2; $k++){
                echo "<td>";
                echo "R".($k+1);
                echo "</td>";
            }
            echo "<td>得分</td>";

            echo "</tr>";
            echo "<tr>";
            echo "<td colspan=\"3\">題號</td>";
            for ($k=0; $k<$sub_count_total2; $k++){
                echo "<td>";
                echo $folder2[$k];
                echo "</td>";
            }
            echo "<td></td>";

            echo "</tr>";
            echo "<tr>";
            echo "<td colspan=\"3\">where</td>";
            for ($k=0; $k<$sub_count_total2+1; $k++){
                echo "<td>";
                echo "</td>";
            }

            echo "</tr>";
            echo "<tr>";
            echo "<td colspan=\"3\">who</td>";
            for ($k=0; $k<$sub_count_total2+1; $k++){
                echo "<td>";
                echo "</td>";
            }

            echo "</tr>";
            echo "<tr>";
            echo "<td colspan=\"3\">what</td>";
            for ($k=0; $k<$sub_count_total2+1; $k++){
                echo "<td>";
                echo "</td>";
            }

            echo "</tr>";
            if ($sub_count_type == 4){
                echo "<tr>";
                echo "<td colspan=\"3\">associate</td>";
                for ($k=0; $k<$sub_count_total2+1; $k++){
                    echo "<td>";
                    echo "</td>";
                }
                echo "</tr>";
            }            

            echo "<tr>";
            echo "<td colspan=\"3\">得分</td>";
            for ($k=0; $k<$sub_count_total2+1; $k++){
                echo "<td>";
                echo "</td>";
            }
            echo "</tr>";
        ?>
        </table>
    </div>
    <div class="row row-score">
        <table>
            <tr>
                <td class="td_fool"></td>
                <td>總分： <b id="test2_score_total"></b> 分</td>                                       
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
                <button id="btn_submit_test2" class="btn_right btn_menu" onclick="">儲存</button>
EOT;
            }
            ?>
        </div>
    </div>
</div>