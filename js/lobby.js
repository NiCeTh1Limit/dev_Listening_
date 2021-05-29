$('#btn_simple').click(function(){
    $('#listening_type').val('simple');
    $('#btn_submit').click();
});
$('#btn_normal').click(function(){
    $('#listening_type').val('normal');
    $('#btn_submit').click();
});
$('#btn_logout').click(function(){
    location.href = '/controller/logout.php';
});
$('#btn_query_information').click(function(){
    location.href = '/query_information.php';
});