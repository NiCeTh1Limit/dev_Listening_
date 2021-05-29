
function timer1_Tick(){
    window.clearInterval(timer1);
    timer1 = window.setInterval(() => {
        timer1_alert();
    }, 500);
}

function timer1_alert(){
    var alert = document.getElementById('test1_alert');
    if (timer_count1 == 1){
        alert.hidden = !alert.hidden;
    }else{
        test1_next_subject();
    }
}
function test1_next_subject(){
    if (test1_subject_num == 20){
        return;
    }
    window.clearInterval(timer1);
    test1_stop_test1_Audio();
    var num = document.getElementById('test1_subject_num').textContent;
    document.getElementById('test1_subject_'+(num-1)+'_1').hidden = true;
    document.getElementById('test1_subject_'+(num-1)+'_2').hidden = true;
    document.getElementById('test1_subject_fool_1').hidden = false;
    document.getElementById('test1_subject_fool_2').hidden = false;
    test1_subject_num += 1;
    if (test1_subject_num >= sub_count_total+1) {
        test1_subject_num = 1;
    }
    document.getElementById('test1_subject_num').textContent = test1_subject_num;
    timer_count1 = 0;
}
function test1_previous_subject(){
    if (test1_subject_num == 1){
        return;
    }
    window.clearInterval(timer1);
    test1_stop_test1_Audio();
    var num = document.getElementById('test1_subject_num').textContent;
    document.getElementById('test1_subject_'+(num-1)+'_1').hidden = true;
    document.getElementById('test1_subject_'+(num-1)+'_2').hidden = true;
    document.getElementById('test1_subject_fool_1').hidden = false;
    document.getElementById('test1_subject_fool_2').hidden = false;
    test1_subject_num -= 1;
    if (test1_subject_num <= 0) {
        test1_subject_num = sub_count_total;
    }
    document.getElementById('test1_subject_num').textContent = test1_subject_num;
    timer_count1 = 0;
}
function test1_showImage(){
    var num = document.getElementById('test1_subject_num').textContent;
    document.getElementById('test1_subject_'+(num-1)+'_1').hidden = false;
    document.getElementById('test1_subject_'+(num-1)+'_2').hidden = false;
    document.getElementById('test1_subject_fool_1').hidden = true;
    document.getElementById('test1_subject_fool_2').hidden = true;
    if (timer_count1 == 0){
        timer_count1 = 1;
        timer1 = window.setInterval(( () => timer1_Tick() ), 20000);
        document.getElementById('test1_alert').hidden = true;
    }
}
function test1_hiddenImage(){    
    document.getElementById('test1_subject_'+(num-1)+'_1').hidden = true;
    document.getElementById('test1_subject_'+(num-1)+'_2').hidden = true;
    document.getElementById('test1_subject_fool_1').hidden = false;
    document.getElementById('test1_subject_fool_2').hidden = false;
}
function test1_play_test1_Audio(){
    window.clearInterval(timer1);
    var num = document.getElementById('test1_subject_num').textContent;
    document.getElementById('test1_M'+(num-1)).play();
    if (timer_count1 == 1){
        timer_count1 = 2;
        timer1 = window.setInterval(( () => timer1_Tick() ), 30000);
        document.getElementById('test1_alert').hidden = true;
    }
}
function test1_stop_test1_Audio(){
    var num = document.getElementById('test1_subject_num').textContent;
    var mp3 = document.getElementById('test1_M'+(num-1));
    mp3.pause();
    mp3.currentTime = 0;
}
function test1_image_Click(id, name){
    play_click_mp3();
    var num = document.getElementById('test1_subject_num').textContent;
    var value = id.split("_");
    //alert(value[value.length-1]);
    value = value[value.length-1]
    value = picno[num-1][value];
    document.getElementById('test1_answer'+num).setAttribute('value', value);
    
    for (var i=0; i<4; i++){
        if ((name+'_'+i) == id){
            document.getElementById(name+'_'+i).style.outline = "5px orange solid";
        }else{
            document.getElementById(name+'_'+i).style.outline= "5px orange none";
        }
    }
}
function test1_submit(){
    document.EMH.submit();
}