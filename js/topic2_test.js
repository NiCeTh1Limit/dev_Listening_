//var header_middle = document.getElementById('header_middle');
//var subject = document.getElementById('subject_num_parent');
//var sub_subject = document.getElementById('subject_num_child');
//var column_show = document.getElementById('test2_column_show');
//var column_show_text = document.getElementById('test2_column_show_text');
//var column_fool = document.getElementById('test2_column_fool');
//var column_middle = document.getElementById('test2_column_middle');
//var column_right1 = document.getElementById('test2_column_right1');
//var column_right2 = document.getElementById('test2_column_right2');
function timer2_Tick(){
  window.clearInterval(timer2);
  timer2 = window.setInterval(() => {
    timer2_alert();
  }, 500);
}

function timer2_alert(){
  var alert = document.getElementById('test2_alert');
  if (timer_count2 == 1){
    alert.hidden = !alert.hidden;
  }else{
    btn_change_subject('nextType');
  }
}
function show_form_value(){
  var input_value = '';
  for (var i=0; i<10; i++){
    for (var k=0; k<4; k++){
      input_value += document.getElementById('Q'+i+'_'+k).value+'\n';
    }
  }
  alert(input_value);
}
function stop_subject_audio(){
  audios = document.getElementsByName('test2_audio');
  for (var i=0; i<audios.length; i++){
    audios[i].pause();
    audios[i].currentTime = 0;
  }
}
function playVocal(){
  //var num = document.getElementById('subject_num_parent').textContent - 1;
  //var sub_num = document.getElementById('subject_num_child').textContent - 1;
  var num = test2_subject_num - 1;
  var sub_num = test2_sub_subject_num - 1;
  switch (order2[num][sub_num]) {
    case 0:
      play_CT('9');
      break;
    case 1:
      play_CT('10');
      break;
    case 2:
      play_CT('11');
      break;
    case 3:
      play_CT('12');
      break;
  }
}
function playClickMP3(){
  document.getElementById('clickMP3').play();
}
function test2_image_Click(id, name){
  playClickMP3();  
  var num = test2_subject_num - 1;
  var sub_num = test2_sub_subject_num - 1;
  var value = id.split("_");
  value = value[value.length-1];
  value = picno2[num][order2[num][sub_num]][value];
  switch (order2[num][sub_num]) {
    case 0:      
      document.getElementById('test2_where'+test2_subject_num).value = value;
      break;
    case 1:      
      document.getElementById('test2_who'+test2_subject_num).value = value;
      break;
    case 2:      
      document.getElementById('test2_what'+test2_subject_num).value = value;
      break;
    case 3:      
      document.getElementById('test2_associate'+test2_subject_num).value = value;
    break;
  }
  for (var i=0; i<4; i++){
      if ((name+'_'+i) == id){
          document.getElementById(name+'_'+i).style.outline = "5px orange solid";
      }else{
          document.getElementById(name+'_'+i).style.outline= "5px orange none";
      }
  }
}
function btn_change_subject(value){
  window.clearInterval(timer2);
  hidden_image();
  hidden_subject();
  stop_subject_audio();
  /*
  var subject_num = parseInt(document.getElementById('subject_num_parent').textContent);
  var sub_subject_num = parseInt(document.getElementById('subject_num_child').textContent);
  */
  switch (value) {
    case 'nextType':
      test2_sub_subject_num += 1;
      if (test2_sub_subject_num == (sub_count_type+1)){test2_sub_subject_num = sub_count_type;}
      break;
    case 'prevType':
      test2_sub_subject_num -= 1;
      if (test2_sub_subject_num == 0){test2_sub_subject_num = 1;}
      break;
    case 'nextStage':
      test2_subject_num += 1;
      if (test2_subject_num == (sub_count_total2+1)){test2_subject_num = 1;}
      test2_sub_subject_num = 1;
      break;
    case 'prevStage':
      test2_subject_num -= 1;
      if (test2_subject_num == 0){test2_subject_num = sub_count_total2;}
      test2_sub_subject_num = 1;
      break;
  }
  document.getElementById('subject_num_parent').textContent = test2_subject_num;
  document.getElementById('subject_num_child').textContent = test2_sub_subject_num;
  set_header_middle_and_column_show_text();
  switch_column_show_and_middle(document.getElementById('test2_column_right1').hidden);
  playVocal();
  timer_count2 = 0;
}
function btn_column_text_next(){
  switch_column_show_and_middle(document.getElementById('test2_column_right1').hidden);
  show_subject_fool();
}
function btn_play_audio(){
  window.clearInterval(timer2);
  var num = test2_subject_num - 1;
  document.getElementById('M'+num).play();
  if (timer_count2 == 1)
    {
      timer_count2 = 2;
      timer2 = window.setInterval(() => {
        timer2_Tick();
      }, 30000);
      document.getElementById('test2_alert').hidden = true;
    }
}
function btn_show_image(){
  hidden_subject_fool();
  show_subject();
  var num = test2_subject_num-1;
  var subject_type = get_current_order2_value();
  for (var i=0; i<4; i++){
    document.getElementById('test2_A'+num+'_'+subject_type+'_'+i).hidden = false;
  }
  if (timer_count2 == 0)
    {
      timer_count2 = 1;
      timer2 = window.setInterval(() => {
        timer2_Tick();
      }, 20000);
      document.getElementById('test2_alert').hidden = true;
    }
}

function switch_column_show_and_middle(truefalse){
  document.getElementById('header_middle').hidden = !truefalse;
  document.getElementById('test2_column_show').hidden = truefalse;
  document.getElementById('test2_column_right1').hidden = !truefalse;
  document.getElementById('test2_column_right2').hidden = truefalse;
  if (truefalse){    
    document.getElementById('test2_column_middle').style.display = '';
  }else{
    document.getElementById('test2_column_middle').style.display = 'none';
  }
}
function get_current_order2_value(){
  return order2[test2_subject_num-1][test2_sub_subject_num-1];
}
function set_header_middle_and_column_show_text(){  
  switch (get_current_order2_value()){
    case 0:
      document.getElementById('header_middle').textContent = "你會在哪裡聽到這個聲音？";
      break;
    case 1:
      document.getElementById('header_middle').textContent = "你會看到什麼人或物？"
      break;
    case 2:
      document.getElementById('header_middle').textContent = "他們在做什麼事？";
      break;
    case 3:
      document.getElementById('header_middle').textContent = "你不會聯想到？";
      break;
  }
  document.getElementById('test2_column_show_text').textContent = document.getElementById('header_middle').textContent;
}
function hidden_image(){
  var num = test2_subject_num - 1;
  for (var k=0; k<4; k++){
    images = document.getElementsByName('test2_A'+num+'_'+k);
    for (var i=0; i<images.length; i++){
      images[i].hidden = true;
    }  
  }
  document.getElementById('test2_subject_A'+num+'_1').hidden = true;
  document.getElementById('test2_subject_A'+num+'_2').hidden = true;
}
function show_subject(){
  var num = test2_subject_num - 1;
  document.getElementById('test2_subject_A'+num+'_1').hidden = false;
  document.getElementById('test2_subject_A'+num+'_2').hidden = false;
}
function hidden_subject(){
  var num = test2_subject_num - 1;
  document.getElementById('test2_subject_A'+num+'_1').hidden = true;
  document.getElementById('test2_subject_A'+num+'_2').hidden = true;
}
function show_subject_fool(){
  document.getElementById('test2_subject_fool_1').hidden = false;
  document.getElementById('test2_subject_fool_2').hidden = false;
}
function hidden_subject_fool(){
  document.getElementById('test2_subject_fool_1').hidden = true;
  document.getElementById('test2_subject_fool_2').hidden = true;
}