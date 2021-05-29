$(document).ready(function (){
    $('#name').keyup(function(){
        if ($('#name').val().length <= 0){
            $('#name').removeClass('is-valid');
            $('#name').removeClass('is-invalid');
        }else{
            var data = "name=" + $('#name').val();
            console.log(data);
            $.ajax({
                type: 'POST',
                url: "/controller/post_check_group_member.php",
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
                            document.getElementById('invalid_name_tips').innerText = "此名稱已被註冊";
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

    $('#btn_group_member_submit').click(function(){
        if ($('#name').val().length <= 0){
            document.getElementById('invalid_name_tips').innerText = "不可為空";
            $('#name').removeClass('is-valid');
            $('#name').addClass('is-invalid');
            $('#name').focus();
            return;
        }
        var data = "name=" + $('#name').val();
        $.ajax({
            type: 'POST',
            url: "/controller/post_check_group_member.php",
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