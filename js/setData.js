function combine_checkbox_value(arr){
  var str = "";
  for (var i=0; i<arr.length; i++){
    str += arr[i];
  }
  return str;
}
function submit_data_form(){
  //document.getElementById('set_data_submit').click();
  
}

function select_change(name, value){
  ///*
  if (name == "聽力狀況"){
    var item = document.getElementById('select_listening');
    var item2 = document.getElementById('hearing_other');
    if (value == "正常"){
      item.selectedIndex = 0;
      item.options[0].disabled = false;
      item.disabled = true;
      item2.value = "";
      item2.disabled = true;
    }else{
      item.options[0].disabled = true;
      item.disabled = false;
    }
  }
  //*/
  ///*
  else if (name == "不正常理由"){
    var item = document.getElementById('hearing_other');
    if (value == "其他"){
      item.disabled = false;
    }else{
      item.value = "";
      item.disabled = true;
    }
  }
  //*/
  ///*
  else if (name == "肢體"){
    var lb1 = document.getElementById('LB_body_left_top');
    var lb2 = document.getElementById('LB_body_right_top');
    var lb3 = document.getElementById('LB_body_left_bottom');
    var lb4 = document.getElementById('LB_body_right_bottom');
    var checkbox1 = document.getElementById('body_left_top');
    var checkbox2 = document.getElementById('body_right_top');
    var checkbox3 = document.getElementById('body_left_bottom');
    var checkbox4 = document.getElementById('body_right_bottom');
    
    if (value == "正常"){
      lb1.hidden = true;
      lb2.hidden = true;
      lb3.hidden = true;
      lb4.hidden = true;
      checkbox1.hidden = true;
      checkbox2.hidden = true;
      checkbox3.hidden = true;
      checkbox4.hidden = true;
      checkbox1.checked = false;
      checkbox2.checked = false;
      checkbox3.checked = false;
      checkbox4.checked = false;
    }else{      
      lb1.hidden = false;
      lb2.hidden = false;
      lb3.hidden = false;
      lb4.hidden = false;
      checkbox1.hidden = false;
      checkbox2.hidden = false;
      checkbox3.hidden = false;
      checkbox4.hidden = false;
      checkbox1.checked = false;
      checkbox2.checked = false;
      checkbox3.checked = false;
      checkbox4.checked = false;
    }
  }
  //*/
  ///*
  else if (name == "視覺能力"){
    //TextBox
    var item = document.getElementById('TB_vision_other');
    item.disabled = true;
    //CheckBox
    CB_vision = document.getElementsByName("CB_vision[]");
    //Label
    LB_vision = document.getElementsByName("LB_vision");
    for (var i=0; i<CB_vision.length; i++){
      CB_vision[i].checked = false;
      CB_vision[i].hidden = true;
      LB_vision[i].hidden = true;
    }

    if (value == "其他"){
      item.disabled = false;
    }else{
      item.disabled = true;
      if (value == "近視" || value == "老花眼"){
        document.getElementById('CB_vision_glasses').hidden = false;
        document.getElementById('CB_vision_no_glasses').hidden = false;
        document.getElementById('LB_vision_glasses').hidden = false;
        document.getElementById('LB_vision_no_glasses').hidden = false;
      }else if (value == "忽略"){
        document.getElementById('CB_vision_left_ignore').hidden = false;
        document.getElementById('CB_vision_right_ignore').hidden = false;
        document.getElementById('LB_vision_left_ignore').hidden = false;
        document.getElementById('LB_vision_right_ignore').hidden = false;
      }else if (value == "白內障"){
        document.getElementById('CB_vision_leftEye_surgery').hidden = false;
        document.getElementById('CB_vision_leftEye_no_surgery').hidden = false;
        document.getElementById('CB_vision_rightEye_surgery').hidden = false;
        document.getElementById('CB_vision_rightEye_no_surgery').hidden = false;
        document.getElementById('LB_vision_leftEye_surgery').hidden = false;
        document.getElementById('LB_vision_leftEye_no_surgery').hidden = false;
        document.getElementById('LB_vision_rightEye_surgery').hidden = false;
        document.getElementById('LB_vision_rightEye_no_surgery').hidden = false;
      }
    }
  }
  //*/
  ///*
  //*/
}

function checkbox_checked(id, name){
  if (name == "CB_vision[]"){
    var CB1 = document.getElementById('CB_vision_leftEye_surgery');
    var CB2 = document.getElementById('CB_vision_leftEye_no_surgery');
    var CB3 = document.getElementById('CB_vision_rightEye_surgery');
    var CB4 = document.getElementById('CB_vision_rightEye_no_surgery');
    
    switch (id){
      case CB1.id:
        CB2.checked = false;
        break;
      case CB2.id:
        CB1.checked = false;
        break;
      case CB3.id:
        CB4.checked = false;
        break;
      case CB4.id:
        CB3.checked = false;
        break;
    }
  }else if (name == "CB_disorders[]"){
    var CB1 = document.getElementById('CB_disorders_none');
    var CB2 = document.getElementById('CB_disorders_other');
    var TB = document.getElementById('TB_disorders_other');
    if (id == CB1.id){
      document.getElementById('CB_disorders_sleeping').checked = false;
      document.getElementById('CB_disorders_PTSD').checked = false;
      document.getElementById('CB_disorders_anxiety').checked = false;
      document.getElementById('CB_disorders_depression').checked = false;
      document.getElementById('CB_disorders_bipolar').checked = false;
      document.getElementById('CB_disorders_other').checked = false;
    }else{
      CB1.checked = false;
    }    
    if (CB2.checked == true){
      TB.disabled = false;
    }else{
      TB.disabled = true;
    }
  }else if (name == "CB_recovery[]"){
    var CB = document.getElementById('CB_recovery_none');
    if (id == CB.id){
      document.getElementById('CB_recovery_OT').checked = false;
      document.getElementById('CB_recovery_PT').checked = false;
      document.getElementById('CB_recovery_psychotherapy').checked = false;
    }else{
      CB.checked = false;
    }
  }
}

function test(){
  alert("its working");
}

