$('#identity_number').keyup(function(){
    if ($('#identity_number').val().length <= 0){
        $('#identity_number').removeClass('is-valid');
        $('#identity_number').removeClass('is-invalid');
    }else{
        var data = "identity_number=" + $('#identity_number').val();
        $.ajax({
            type: 'POST',
            url: "/controller/post_check_single_member.php",
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
                    if (dataParsed.identity_number){
                        $('#identity_number').removeClass('is-valid');
                        $('#identity_number').addClass('is-invalid');
                    }else{                                
                        $('#identity_number').removeClass('is-invalid');
                        $('#identity_number').addClass('is-valid');
                    }
                }
            },
            dataType: "text"
        });
    }
});
$('#btn_single_member_submit').click(function(){
    if ($('#identity_number').val().length <= 0){
        $('#identity_number').removeClass('is-valid');
        $('#identity_number').addClass('is-invalid');
        $('#identity_number').focus();
        return;
    }
    var data = "identity_number=" + $('#identity_number').val();
    $.ajax({
        type: 'POST',
        url: "/controller/post_check_single_member.php",
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
                if (dataParsed.identity_number){
                    $('#identity_number').removeClass('is-valid');
                    $('#identity_number').addClass('is-invalid');
                    $('#identity_number').focus();
                    return;
                }
            }
        },
        dataType: "text"
    });
    $('#btn_submit').click();
});