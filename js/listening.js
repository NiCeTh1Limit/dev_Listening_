// 負責各功能的切換及入口 「」
//---------------------------------------------------------------------
var index = document.getElementById('index');
var set_data = document.getElementById('set_data');
// 用來比對DB的紀錄，每次測試只會有一組timestamp值
var timestamp = 0;
// 測驗一左上角的題目編號
var test1_subject_num=1;
//測驗二左上角的題目編號
var test2_subject_num=1;
var test2_sub_subject_num=1;

var timer_count1, timer_count2;
var timer1, timer2;
var left1 = "題號: <b id=\"subject_num\">1";
var left2 = "題號: <b id=\"subject_num_parent\">1</b> - <b id=\"subject_num_child\">1</b>";
set_header([]);
window.onload = function () {
    this.document.getElementById('loading').hidden = true;
    this.btn_go_index();
}
//btn_go_index();
//document.getElementById('btn_preview_print').disabled=false;
/*
    //  test1 自動填答
    for (var i=0; i<sub_count_total; i++){
        id = "test1_A"+i+"_2";
        var num = i+1;
        var value = id.split("_");

        value = value[value.length-1]
        value = picno[num-1][value];

        document.getElementById('test1_answer'+num).setAttribute('value', value);
    }
    // test2 自動填答
    for (var i=0; i<sub_count_total2; i++){
        var num = i;
        for (var j=0; j<sub_count_type; j++){
            var id = 'test2_A'+i+'_'+j+'_2';
            var sub_num = j;
            var value = id.split("_");
            value = value[value.length-1];
            value = picno2[num][order2[num][sub_num]][value];
            switch (order2[num][sub_num]) {
                case 0:      
                    document.getElementById('test2_where'+(i+1)).value = value;
                    break;
                case 1:      
                    document.getElementById('test2_who'+(i+1)).value = value;
                    break;
                case 2:      
                    document.getElementById('test2_what'+(i+1)).value = value;
                    break;
                case 3:      
                    document.getElementById('test2_associate'+(i+1)).value = value;
                break;
            }
        }        
    }
    //*/
// 統一 functoin
function btn_go_index(){
    for (var i=1; i<13; i++){
        stop_CT(i.toString());
    }
    document.getElementById('header').hidden = false;
    set_header([]);
    index.hidden = false;
    set_data.hidden = true;
    part2_selector();
}
function btn_go_set_data(){
    index.hidden = true;
    set_data.hidden = false;
    part2_selector();
    set_data_pre();
}
function btn_go_topic1_explain(){
    for (var i=1; i<13; i++){
        stop_CT(i.toString());
    }
    play_CT('1');
    index.hidden = true;
    set_data.hidden = true;
    part2_selector('topic1_explain');
}
function btn_go_topic1_demonstration(){
    for (var i=1; i<13; i++){
        stop_CT(i.toString());
    }
    play_CT('3');
    index.hidden = true;
    set_data.hidden = true;
    part2_selector('topic1_demonstration');
    set_header([, '示範題']);
}
function btn_go_topic1_practice(){
    for (var i=1; i<13; i++){
        stop_CT(i.toString());
    }
    play_CT('5');    
    index.hidden = true;
    set_data.hidden = true;
    part2_selector('topic1_practice');
    set_header([, '練習題']);
}
function btn_go_topic1_test(){
    document.getElementById('btn_topic1_result').disabled = false;
    index.hidden = true;
    set_data.hidden = true;
    part2_selector('topic1_test');
    set_header(["題號: <b id=\"test1_subject_num\">"+test1_subject_num, ]);
    timer_count1 = 0;
}
function btn_go_topic1_result(){    
    index.hidden = true;
    set_data.hidden = true;
    part2_selector('topic1_result');
    set_header([]);
    set_topic1_result();
}
function btn_go_topic2_explain(){
    for (var i=1; i<13; i++){
        stop_CT(i.toString());
    }
    play_CT('7');
    index.hidden = true;
    set_data.hidden = true;
    part2_selector('topic2_explain');
    set_header([]);
}
function btn_go_topic2_practice(){
    for (var i=1; i<13; i++){
        stop_CT(i.toString());
    }
    play_CT('8');
    index.hidden = true;
    set_data.hidden = true;
    part2_selector('topic2_practice');
    set_header(['練習題']);
}
function btn_go_topic2_test(){
    document.getElementById('btn_topic2_result').disabled = false;
    index.hidden = true;
    set_data.hidden = true;
    part2_selector('topic2_test');
    set_header(["題號: <b id=\"subject_num_parent\">"+test2_subject_num+"</b> - <b id=\"subject_num_child\">"+test2_sub_subject_num+"</b>",]);
    set_header_middle_and_column_show_text();
    switch_column_show_and_middle(false);
    playVocal();
    timer_count2 = 0;
}
function btn_go_topic2_result(){
    index.hidden = true;
    set_data.hidden = true;
    part2_selector('topic2_result');
    set_topic2_result();
}
function btn_go_preview_print(){
    //index.hidden = true;
    //set_data.hidden = true;
    document.getElementById('print_name').innerText = $('#u_name').val() + " ";
    document.getElementById('print_sex').innerText = $('#sex').val() + " ";
    var birth = $('#birth').val();
    birth = Date.parse(birth.replace('/-/g', "/"));
    if (birth) {
        var year = 1000 * 60 * 60 * 24 * 365;
        var now = new Date();
        var birthday = new Date(birth);
        var age = parseInt((now - birthday) / year);
        document.getElementById('print_age').innerText = age;
        document.getElementById('print_date').innerText = $('#today_date').val();
    }

    document.getElementById('print_AACPR_score').innerText = parseInt(document.getElementById('print_test1_score').innerText)+parseInt(document.getElementById('print_test2_score').innerText);
    if (document.getElementById('print_AACPR_score').innerText > 54){
        document.getElementById('print_AACPR_level').innerText = "（通過）";
    }else if (document.getElementById('print_AACPR_score').innerText < 49){
        document.getElementById('print_AACPR_level').innerText = "（中重度障礙）";
    }else{
        document.getElementById('print_AACPR_level').innerText = "（輕度障礙）";
    }
    var mywindow = window.open('', 'PRINT', "width="+screen.availWidth*0.8+",height="+screen.availHeight*0.8);
    mywindow.document.write('<!DOCTYPE html><html><head><title>' + document.title  + '</title>');
    mywindow.document.write('<meta charset="UTF-8">');
    mywindow.document.write('<link rel="stylesheet" href="css/listening.css">');
    mywindow.document.write('</head><body >');
    mywindow.document.write('<h1>' + document.title  + '</h1>');
    mywindow.document.write('<div class="header" id="header" hidden>');
    mywindow.document.write(document.getElementById('header').innerHTML);
    mywindow.document.write('</div>');
    mywindow.document.write('<div class="print" id="preview_print">')
    mywindow.document.write(document.getElementById('preview_print').innerHTML);
    mywindow.document.write('</div>');
    mywindow.document.write('</body>');
    mywindow.document.write("<script type=\"text/javascript\" src=\"js/chart.js\"></script><script typee\"text/javascript\" src=\"js/chart_plugin_labels.js\"></script><script type=\"text/javascript\" src=\"js/preview_print.js\" charset=\"utf-8\"></script>");
    mywindow.document.write("<script type=\"text/javascript\">preview_print_pie_test1();preview_print_pie_test2();preview_print_pie_AACPR();</script>");
    mywindow.document.write('</html>');
    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10
    window.setTimeout(( () => {
        mywindow.print();
        mywindow.close();
    }), 1000);
    return true;
    
    

   //document.getElementById('preview_print').hidden = false;
}
function set_header(arr){
    let [left='', middle=''] = arr;
    if (typeof(left) == "string"){
        document.getElementById('header_left').innerHTML = left;
    }
    if (typeof(middle) == 'string'){
        document.getElementById('header_middle').innerHTML = middle;
    }
    
}
function part2_selector(str=''){
    var part2 = document.getElementsByName('part2');
    for (var i=0; i<part2.length; i++){
        if (part2[i].id == str){
            part2[i].style.display = 'grid';
        }else{
            part2[i].style.display = 'none';
        }
    }
}
function play_CT(str){
    var CT = '';
    switch (document.getElementById('language').value) {
        case 'taiwanese':
            CT = 'taiwanese';
            break;    
        default:
            CT = 'chinese';
            break;
    }
    if (CT == 'chinese'){
        str = 'C' + str;
    }else{
        str = 'T' + str;
    }
    var mp3 = document.getElementById(str);
    mp3.play();
}
function stop_CT(str){
    var CT = '';
    switch (document.getElementById('language').value) {
        case 'taiwanese':
            CT = 'taiwanese';
            break;    
        default:
            CT = 'chinese';
            break;
    }
    if (CT == 'chinese'){
        str = 'C' + str;
    }else{
        str = 'T' + str;
    }
    var mp3 = document.getElementById(str);
    mp3.pause();
    mp3.currentTime = 0;
}
function play_click_mp3(){
    var mp3 = document.getElementById('clickMP3');
    mp3.play();
}
//---------------------------------------------------------------------
//---------------------------------------------------------------------
// 「背景資料」
// 切換完「背景資料」後的動作
function set_data_pre(){
    document.getElementById('select_listening').disabled = true;
    document.getElementById('hearing_other').disabled = true;
    CB_vision = document.getElementsByName("CB_vision[]");
    LB_vision = document.getElementsByName("LB_vision");
    for (var i=0; i<CB_vision.length; i++){
        CB_vision[i].hidden = true;
        LB_vision[i].hidden = true;
    }
    var now = new Date();
    //格式化日，如果小於9，前面補0
    var day = ("0" + now.getDate()).slice(-2);
    //格式化月，如果小於9，前面補0
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    //拼裝完整日期格式
    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    document.getElementById('today_date').value = today;
    var date_now = Date.now();
    document.getElementById('time_record').value = date_now;
    timestamp = date_now;
}
//---------------------------------------------------------------------
//---------------------------------------------------------------------
// 「示範」 & 「練習」 - 第一大題
function topic1_practice_demonstration_showImage(subject){
    var path = "";
    if (subject == "demonstration"){
        document.getElementById('topic1_demonstration_A1').style.visibility = 'visible';
        document.getElementById('topic1_demonstration_A2').style.visibility = 'visible';
        document.getElementById('topic1_demonstration_A3').style.visibility = 'visible';
        document.getElementById('topic1_demonstration_A4').style.visibility = 'visible';
        path = "resource/Test1/P/0/C0/";
    }else if(subject == "practice"){
        document.getElementById('topic1_practice_A1').style.visibility = 'visible';
        document.getElementById('topic1_practice_A2').style.visibility = 'visible';
        document.getElementById('topic1_practice_A3').style.visibility = 'visible';
        document.getElementById('topic1_practice_A4').style.visibility = 'visible';
        path = "resource/Test1/P/1/C1/";
    }   
    
    var num_sequence = new Array(4);
  
    var i = 0;
    var j = 0;
    while (i < 4)
      {
        num_sequence[i] = getRandom(1, 4);
        j = 0;
        while (j < i)
        {
          if (num_sequence[j] == num_sequence[i])
          {
            num_sequence[i] = getRandom(1, 4);
            j = 0;
          }
          else
            j++;
        }
        i++;
      }
    if (subject == "demonstration"){        
        document.getElementById('topic1_demonstration_A1').style.backgroundImage = "url("+path+num_sequence[0]+".jpg)";
        document.getElementById('topic1_demonstration_A2').style.backgroundImage = "url("+path+num_sequence[1]+".jpg)";
        document.getElementById('topic1_demonstration_A3').style.backgroundImage = 'url('+path+num_sequence[2]+'.jpg)';
        document.getElementById('topic1_demonstration_A4').style.backgroundImage = 'url('+path+num_sequence[3]+'.jpg)';
    }else if (subject == "practice"){
        document.getElementById('topic1_practice_A1').style.backgroundImage = "url("+path+num_sequence[0]+".jpg)";
        document.getElementById('topic1_practice_A2').style.backgroundImage = "url("+path+num_sequence[1]+".jpg)";
        document.getElementById('topic1_practice_A3').style.backgroundImage = 'url('+path+num_sequence[2]+'.jpg)';
        document.getElementById('topic1_practice_A4').style.backgroundImage = 'url('+path+num_sequence[3]+'.jpg)';
    }
}
function getRandom(min,max){
    return Math.floor(Math.random()*(max-min+1))+min;
}
function topic1_practice_demonstration_clickImage(subject, id){
    play_click_mp3();
    var str = "topic1_" + subject + "_A";
    for (var i=1; i<5; i++){
        if ((str+i) == id){
            document.getElementById(str+i).style.outline = "5px orange solid";
        }else{
            document.getElementById(str+i).style.outline= "5px orange none";
        }
    }
}
//---------------------------------------------------------------------
//---------------------------------------------------------------------
// 「結果」 - 第一大題
function set_topic1_result(){
    var E_score = 0;
    var M_score = 0;
    var H_score = 0;
    var sum_EMH = 0;
    var meaning_score = 0;
    var sound_score = 0;
    var none_score = 0;
    var table_topic1_result = document.getElementById('table_topic1_result');
    for (var i=1; i<sub_count_total+1; i++){
        var value = document.getElementById('test1_answer'+i).value;
        table_topic1_result.rows[3].cells[i].innerHTML = value;
        if (value == 1){
            switch (EMH[i-1]) {
                case 'E':
                    E_score += 1;
                    break;
                case 'M':
                    M_score += 1;
                    break;
                case 'H':
                    H_score += 1;
                    break;
            }
        }else if (value == 2){
            meaning_score += 1;
        }else if (value == 3){
            sound_score += 1;
        }else if (value == 4){
            none_score += 1;
        }
    }
    sum_EMH = E_score+M_score+H_score;
    document.getElementById('score_E').textContent = E_score;
    document.getElementById('score_M').textContent = M_score;
    document.getElementById('score_H').textContent = H_score;
    document.getElementById('test1_score_total').textContent = sum_EMH;

    document.getElementById('test1_score_E').value = E_score;
    document.getElementById('test1_score_M').value = M_score;
    document.getElementById('test1_score_H').value = H_score;
    document.getElementById('test1_score_EMH').value = sum_EMH;

    document.getElementById('print_test1_score').innerText = sum_EMH;
    document.getElementById('print_meaning_score').innerText = meaning_score;
    document.getElementById('print_sound_score').innerText = sound_score;
    document.getElementById('print_none_score').innerText = none_score;
    document.getElementById('print_test1_failed_score').innerText = meaning_score+sound_score+none_score;
    console.log('test1_failed: ' + document.getElementById('print_test1_failed_score').innerText);
    if (sum_EMH > 18){
        document.getElementById('print_test1_level').innerText = "（通過）";
    }else if (sum_EMH < 17){
        document.getElementById('print_test1_level').innerText = "（中重度障礙）";
    }else{
        document.getElementById('print_test1_level').innerText = "（輕度障礙）";
    }
}
//---------------------------------------------------------------------
//---------------------------------------------------------------------
// 「練習」 - 第二大題
function topic2_practice_clickImage(id){
    play_click_mp3();
    var str = id.substr(0, 18)+"_";
    for (var i=1; i<5; i++){
        if ((str+i) == id){
            document.getElementById(str+i).style.outline = "5px orange solid";
        }else{
            document.getElementById(str+i).style.outline= "5px orange none";
        }
    }
}
function topic2_practice_showImage(){
    var arr_ans_fool = document.getElementsByName('topic2_practice_ans_fool');
    for (var i=0; i<arr_ans_fool.length; i++){
    arr_ans_fool[i].hidden = true;
    }
    var str = document.getElementById('header_middle').textContent;
    switch (str){
    case "你會在哪裡聽到這個聲音？":
        for (var i=1; i<5; i++){
        document.getElementById('topic2_practice_A1_' + i).hidden = false;
        }
        break;
    case "你會看到什麼人或物？":
        for (var i=1; i<5; i++){
        document.getElementById('topic2_practice_A2_' + i).hidden = false;
        }
        break;
    case "他們在做什麼事？":
        for (var i=1; i<5; i++){
        document.getElementById('topic2_practice_A3_' + i).hidden = false;
        }
        break;
    case "你不會聯想到？":
        for (var i=1; i<5; i++){
        document.getElementById('topic2_practice_A4_' + i).hidden = false;
        }
        break;
    }
}
function topic2_practice_play_vocal(str){
    switch (str){
    case "你會在哪裡聽到這個聲音？":
        play_CT('9');
        break;
    case "你會看到什麼人或物？":
        play_CT('10');
        break;
    case  "他們在做什麼事？":
        play_CT('11');
        break;
    case "你不會聯想到？":
        play_CT('12');
        break;
    }
}
function topic2_practice_previous_subject(){  
    var header_middle = document.getElementById('header_middle');  
    var column_fool_text = document.getElementById('topic2_practice_column_fool_text');
    var column_middle = document.getElementById('topic2_practice_column_middle');
    var column_right1 = document.getElementById('topic2_practice_column_right1');
    var column_right2 = document.getElementById('topic2_practice_column_right2');
    var column_fool = document.getElementById('topic2_practice_column_fool');
    switch (header_middle.textContent){
    case "你會在哪裡聽到這個聲音？":
        column_fool_text.textContent = "你不會聯想到？";
        break;
    case "你會看到什麼人或物？":
        column_fool_text.textContent = "你會在哪裡聽到這個聲音？";
        break;
    case  "他們在做什麼事？":
        column_fool_text.textContent = "你會看到什麼人或物？";
        break;
    case "你不會聯想到？":
        column_fool_text.textContent = "他們在做什麼事？";
        break;
    }

    arr_ans = document.getElementsByName('topic2_practice_A');
    for (var i=0; i<arr_ans.length; i++){
    arr_ans[i].hidden = true;
    }
    var arr_ans_fool = document.getElementsByName('topic2_practice_ans_fool');
    for (var i=0; i<arr_ans_fool.length; i++){
    arr_ans_fool[i].hidden = false;
    }

    header_middle.hidden = true;
    column_middle.style.display = 'none';
    column_right1.hidden = true;
    column_right2.hidden = false;
    column_fool.style.display = '';
    topic2_practice_play_vocal(column_fool_text.textContent);
}

function topic2_practice_next_subject(){
    var header_middle = document.getElementById('header_middle');  
    var column_fool_text = document.getElementById('topic2_practice_column_fool_text');
    var column_middle = document.getElementById('topic2_practice_column_middle');
    var column_right1 = document.getElementById('topic2_practice_column_right1');
    var column_right2 = document.getElementById('topic2_practice_column_right2');
    var column_fool = document.getElementById('topic2_practice_column_fool');
    switch (header_middle.textContent){
    case "你會在哪裡聽到這個聲音？":
        column_fool_text.textContent = "你會看到什麼人或物？";
        break;
    case "你會看到什麼人或物？":
        column_fool_text.textContent = "他們在做什麼事？";
        break;
    case  "他們在做什麼事？":
        column_fool_text.textContent = "你不會聯想到？";
        break;
    case "你不會聯想到？":
        column_fool_text.textContent = "你會在哪裡聽到這個聲音？";
        break;
    }

    arr_ans = document.getElementsByName('topic2_practice_A');
    for (var i=0; i<arr_ans.length; i++){
    arr_ans[i].hidden = true;
    }
    var arr_ans_fool = document.getElementsByName('topic2_practice_ans_fool');
    for (var i=0; i<arr_ans_fool.length; i++){
    arr_ans_fool[i].hidden = false;
    }
    header_middle.hidden = true;
    column_middle.style.display = 'none';
    column_right1.hidden = true;
    column_right2.hidden = false;
    column_fool.style.display = '';
    topic2_practice_play_vocal(column_fool_text.textContent);
}

function topic2_practice_column_text(){
    var header_middle = document.getElementById('header_middle');
    var column_middle = document.getElementById('topic2_practice_column_middle');
    var column_right1 = document.getElementById('topic2_practice_column_right1');
    var column_right2 = document.getElementById('topic2_practice_column_right2');
    var column_fool = document.getElementById('topic2_practice_column_fool');
    var column_fool_text = document.getElementById('topic2_practice_column_fool_text');
    switch (column_fool_text.textContent){
    case "你會在哪裡聽到這個聲音？":
        header_middle.textContent = "你會在哪裡聽到這個聲音？";
        break;
    case "你會看到什麼人或物？":
        header_middle.textContent = "你會看到什麼人或物？";
        break;
    case  "他們在做什麼事？":
        header_middle.textContent = "他們在做什麼事？";
        break;
    case "你不會聯想到？":
        header_middle.textContent = "你不會聯想到？";
        break;
    }  
    header_middle.hidden = false;
    column_middle.style.display = 'grid';
    column_right1.hidden = false;
    column_right2.hidden = true;
    column_fool.style.display = 'none';
}
//---------------------------------------------------------------------
//---------------------------------------------------------------------
// 「結果」 - 第二大題
function set_topic2_result(){
    var _where = 0;
    var _who = 0;
    var _what = 0;
    var _associate = 0;
    var table_topic2_result = document.getElementById('table_topic2_result');
    var value;
    var R_sum;
    var str = "";
    var where_score = 0;
    var who_score = 0;
    var what_score = 0;
    var associate_score = 0;
    for (var i=0; i<sub_count_total2; i++){
        R_sum = 0;
        for (var k=0; k<sub_count_type; k++){
            switch (order2[i][k]) {
                case 0:
                    str = "where";
                    break;
                case 1:
                    str = "who";
                    break;                
                case 2:
                    str = "what";
                    break;                    
                case 3:
                    str = "associate";
                    break;
            }
            value = document.getElementById('test2_'+str+(i+1)).value;
            table_topic2_result.rows[order2[i][k]+2].cells[i+1].innerHTML = value;
            if (value == 0){
                eval("_" + str + " += 1");
                R_sum += 1;
            }else if (value != -1 && value != 0){
                switch (str) {
                    case "where":
                        where_score++;
                        break;
                    case "who":
                        who_score++;
                        break;
                    case "what":
                        what_score++;
                        break;
                    case "associate":
                        associate_score++;
                        break;
                }
            }
        }
        table_topic2_result.rows[sub_count_type+2].cells[i+1].innerHTML = R_sum;
        document.getElementById('test2_R'+(i+1)).value = R_sum;
    }
    table_topic2_result.rows[2].cells[sub_count_total2+1].innerHTML = _where;
    table_topic2_result.rows[3].cells[sub_count_total2+1].innerHTML = _who;
    table_topic2_result.rows[4].cells[sub_count_total2+1].innerHTML = _what;
    if (sub_count_type == 4){
        table_topic2_result.rows[5].cells[sub_count_total2+1].innerHTML = _associate;
    }
    var _wwwa = _where+_who+_what+_associate;
    document.getElementById('score').value = _wwwa;
    document.getElementById('_where').value = _where;
    document.getElementById('_who').value = _who;
    document.getElementById('_what').value = _what;
    document.getElementById('_associate').value = _associate;
    document.getElementById('test2_score_total').innerText = _wwwa;

    document.getElementById('print_test2_score').innerText = _wwwa;
    document.getElementById('print_where_score').innerText = where_score;
    document.getElementById('print_who_score').innerText = who_score;
    document.getElementById('print_what_score').innerText = what_score;
    document.getElementById('print_associate_score').innerText = associate_score;
    document.getElementById('print_test2_failed_score').innerText = where_score+who_score+what_score+associate_score;
    console.log('test2_failed: ' + document.getElementById('print_test2_failed_score').innerText);
    if (_wwwa > 36){
        document.getElementById('print_test2_level').innerText = "（通過）";
    }else if (_wwwa < 31){
        document.getElementById('print_test2_level').innerText = "（中重度障礙）";
    }else{
        document.getElementById('print_test2_level').innerText = "（輕度障礙）";
    }
}
//---------------------------------------------------------------------

/* 未完成項目 ↓

第一大部分:

第二大部分:

第三大部分: 

DB：
    
其他功能:
    登入功能
    查詢功能
    簡單版
*/