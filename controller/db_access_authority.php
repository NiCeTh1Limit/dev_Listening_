<?php
if (@$_SESSION['account'] == '' && @$_SESSION['type'] == ''){
    header('HTTP/1.0 403 Forbidden', true, 403);
    exit();
}

$RootDir = $_SERVER['DOCUMENT_ROOT'];
require_once "$RootDir/model/config.php";
require_once "$RootDir/model/db-connect.php";
require_once "$RootDir/class/cAuthority.php";

$cAuthority = new cAuthority();

$ret = $cAuthority -> _db_access($_SESSION['account'], $_SESSION['type']);

if ($ret['status']){
    return array(
        'db_access' => $ret['db_access']
    );
}

?>