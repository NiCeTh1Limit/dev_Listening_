$(document).ready(function (){
    $('#btn_therapist_add').click(function(){
        for (var i=2; i<6; i++){
            if ($('.therapist'+i.toString()).prop('hidden')){
                $('.therapist'+i.toString()).prop('hidden', false);
                if (i==2){$('#btn_therapist_del').prop('disabled', false);}
                if (i==5){$('#btn_therapist_add').prop('disabled', true);}
                return;
            }
        }
        
    });
    $('#btn_therapist_del').click(function(){
        for (var i=5; i>1; i--){
            if (!$('.therapist'+i.toString()).prop('hidden')){
                $('.therapist'+i.toString()).prop('hidden', true);
                if (i==5){$('#btn_therapist_add').prop('disabled', false);}
                if (i==2){$('#btn_therapist_del').prop('disabled', true);}
                return;
            }
        }
        
    });

    $('#name').keyup(function(){
        if ($('#name').val().length <= 0){
            $('#name').removeClass('is-valid');
            $('#name').removeClass('is-invalid');
        }else{
            var data = "name=" + $('#name').val();
            console.log(data);
            $.ajax({
                type: 'POST',
                url: "/controller/post_check_research_member.php",
                data: data,
                success: function(data){
                    console.log(data);
                    try{
                        var dataParsed = JSON.parse(data);
                    }catch(e){
                        console.log(e);
                        return;
                    }
                    
                    if (dataParsed.status){
                        if (dataParsed.name){
                            $('#name').removeClass('is-valid');
                            $('#name').addClass('is-invalid');
                        }else{
                            $('#name').removeClass('is-invalid');
                            $('#name').addClass('is-valid');                                
                        }
                    }
                },
                dataType: "text"
            });
        }
    });
    $('#btn_research_member_submit').click(function(){
        if ($('#name').val().length <= 0){
            $('#name').removeClass('is-valid');
            $('#name').addClass('is-invalid');
            $('#name').focus();
            return;
        }
        var data = "name=" + $('#name').val();
        $.ajax({
            type: 'POST',
            url: "/controller/post_check_research_member.php",
            data: data,
            success: function(data){
                //console.log(data);
                try{
                    var dataParsed = JSON.parse(data);
                }catch(e){
                    console.log(e);
                    return;
                }
                if (dataParsed.status){
                    if (dataParsed.name){
                        $('#name').removeClass('is-valid');
                        $('#name').addClass('is-invalid');
                        $('#name').focus();
                        return;
                    }
                }
            },
            dataType: "text"
        });
        $('#btn_submit').click();
    });
});