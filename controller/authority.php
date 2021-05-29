<?php
session_start();
if (@$_SESSION['account'] == '' && @$_SESSION['type'] == ''){
    header('HTTP/1.0 403 Forbidden', true, 403);
    exit();
}

$RootDir = $_SERVER['DOCUMENT_ROOT'];
require_once "$RootDir/model/config.php";
require_once "$RootDir/model/db-connect.php";
require_once "$RootDir/class/cAuthority.php";

$cAuthority = new cAuthority();

$ret = $cAuthority -> _check_authority($_SESSION['account'], $_SESSION['type']);

if (!$ret['status']){
    header('location: ../index.php');
}

$_SESSION['number'] = $ret['number'];

?>