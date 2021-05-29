$(document).ready(function () {
    $('#btn_submit_set_data').click(function () {
        if ($('#u_name').val() != '' || $('#sex').val() != '' || $('#birth').val() != '' || $('#edu'.val() != '' 
            || $('#medical_diagnosis'.val() != '' || $('#speech_pathology_diagnosis'.val() != '' || $('#onset_year').val() != '' 
            || $('#hearing_status').val() != '' || $('#mocat').val() != '' || $('#vision').val() != '')))){
            console.log('starting ajax');
            $.ajax({
                url: "/controller/post_set_data.php",
                type: "POST",
                dataType: 'text',
                data: $('#data_form').serialize(),
                success: function (data) {                    
                    console.log(data);
                    //alert(data);
                    var dataParsed = JSON.parse(data);
                    if (timestamp == dataParsed.time_record){
                        $('#btn_submit_set_data').attr('disabled', true);
                        $('#test1_time_record').val(dataParsed.time_record);
                        $('#test2_time_record').val(dataParsed.time_record);
                        $('#print_name').text(dataParsed.u_name);
                        $('#print_sex').text(dataParsed.sex);
                        $('#print_age').text(dataParsed.age);
                        $('#print_date').text(dataParsed.date);
                        alert('儲存成功！');
                    }
                },
                error: function(jqXHR, textStatus) {
                alert(jqXHR.status, textStatus);
                }
            });
        }else{
            alert('必填項目不可為空');
        }
    });
    $('#btn_submit_test1').click(function (){
        if ($('#test1_time_record').val() != ''){
            console.log('starting ajax');
            $.ajax({
                url: "/controller/post_test1.php",
                type: "POST",
                dataType: 'text',
                data: $('#test1_form').serialize(),
                success: function(data){
                    //alert(data);
                    var dataParsed = JSON.parse(data);
                    //alert(dataParsed.time_record);
                    if (timestamp == dataParsed.time_record){
                        $('#btn_submit_test1').attr('disabled', true);
                        alert('儲存成功！');
                    }
                    console.log(data);
                },
                error: function(jqXHR, textStatus) {
                alert(jqXHR.status, textStatus);
                }
            });
        }else{
            alert("請先儲存「基本資料」！");
        }
    });
    $('#btn_submit_test2').click(function (){
        if ($('#test2_time_record').val() != ''){
            console.log('starting ajax');
            $.ajax({
                url: "/controller/post_test2.php",
                type: "POST",
                dataType: 'text',
                data: $('#test2_form').serialize(),
                success: function(data){
                    //alert(data);
                    var dataParsed = JSON.parse(data);
                    //alert(dataParsed.time_record);
                    if (timestamp == dataParsed.time_record){
                        $('#btn_submit_test2').attr('disabled', true);
                        alert('儲存成功！');
                    }
                    console.log(data);
                },
                error: function(jqXHR, textStatus) {
                alert(jqXHR.status, textStatus);
                }
            });
        }else{
            alert("請先儲存「基本資料」！");
        }
    });
  });