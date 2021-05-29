<?php
$RootDir = $_SERVER['DOCUMENT_ROOT'];
require_once "$RootDir/model/config.php";
require_once "$RootDir/model/db-connect.php";
require_once "$RootDir/class/cRegister.php";
header('Content-Type: application/json; charset=UTF-8');
login();
function login(){
    $_cRegister = new cRegister();
    
    $ret = $_cRegister -> _login($_POST['account'], $_POST['password']);
    
    if (!$ret['status']){
        $arr = array();
        $arr['status'] = false;
        echo json_encode($arr);
    }else{
        session_start();
        $_SESSION['account'] = $ret['account'];
        $_SESSION['type'] = $ret['type'];
    
        $arr = array();
        $arr['status'] = true;
        $arr['account'] = $ret['account'];
        echo json_encode($arr);
    }
}
?>