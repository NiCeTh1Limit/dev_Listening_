$(document).ready(function(){
    $('#AAPCR').change(function(){
        if (!this.checked){
            $('#Test1').prop('checked', false);
            $('#Test2').prop('checked', false);
        }else{
            $('#Test1').prop('checked', true);
            $('#Test2').prop('checked', true);
        }
    });
    
    $('#Test1').change(function(){
        if (this.checked){
            $('#AAPCR').prop('checked', true)
        }else if (!$('#Test2').prop('checked')){
            $('#AAPCR').prop('checked', false)
        }
    });
    $('#Test2').change(function(){
        if (this.checked){
            $('#AAPCR').prop('checked', true)
        }else if (!$('#Test1').prop('checked')){
            $('#AAPCR').prop('checked', false)
        }
    });
    
    $('#CCICA').change(function(){
        if (!this.checked){
            $('#Word').prop('checked', false);
            $('#Sentence').prop('checked', false);
        }else{
            $('#Word').prop('checked', true);
            $('#Sentence').prop('checked', true);
            
        }
    });
    $('#Word').change(function(){
        if (this.checked){
            $('#CCICA').prop('checked', true)
        }else if (!$('#Sentence').prop('checked')){
            $('#CCICA').prop('checked', false)
        }
    });
    $('#Sentence').change(function(){
        if (this.checked){
            $('#CCICA').prop('checked', true)
        }else if (!$('#Word').prop('checked')){
            $('#CCICA').prop('checked', false)
        }
    });

    $('#license_number').keyup(function(){
        if ($('#license_number').val().length <= 0){
            $('#license_number').removeClass('is-valid');
            $('#license_number').removeClass('is-invalid');
        }else{
            var data = "license_number=" + $('#license_number').val();
            data += "&" + "identity_number=" + $('#identity_number').val();
            console.log(data);
                $.ajax({
                    type: 'POST',
                    url: "/controller/post_check_personal_member.php",
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
                            if (dataParsed.lisence_number){
                                $('#license_number').removeClass('is-valid');
                                $('#license_number').addClass('is-invalid');
                            }else{
                                $('#license_number').removeClass('is-invalid');
                                $('#license_number').addClass('is-valid');                                
                            }
                        }
                    },
                    dataType: "text"
                });
        }
    });
    
    $('#identity_number').keyup(function(){
        if ($('#identity_number').val().length <= 0){
            $('#identity_number').removeClass('is-valid');
            $('#identity_number').removeClass('is-invalid');
        }else{
            var data = "license_number=" + $('#license_number').val();
            data += "&" + "identity_number=" + $('#identity_number').val();
            $.ajax({
                type: 'POST',
                url: "/controller/post_check_personal_member.php",
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

    $('#btn_personal_member_submit').click(function(){
        if ($('#license_number').val().length <= 0){
            $('#license_number').removeClass('is-valid');
            $('#license_number').addClass('is-invalid');
            $('#license_number').focus();
            return;
        }
        if ($('#identity_number').val().length <= 0){
            $('#identity_number').removeClass('is-valid');
            $('#identity_number').addClass('is-invalid');
            $('#identity_number').focus();
            return;
        }
        var data = "license_number=" + $('#license_number').val();
        data += "&" + "identity_number=" + $('#identity_number').val();
        $.ajax({
            type: 'POST',
            url: "/controller/post_check_personal_member.php",
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
                    if (dataParsed.lisence_number){
                        $('#license_number').removeClass('is-valid');
                        $('#license_number').addClass('is-invalid');
                        $('#license_number').focus();
                        return;
                    }
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
});