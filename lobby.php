<?php
$RootDir = $_SERVER['DOCUMENT_ROOT'];
require_once "$RootDir/controller/authority.php";
?>
<!DOCTYPE html>
<html>
<header>
    <link rel="stylesheet" href="/css/bootstrap.min.css"> 
</header>

<div class="container">
    <div class="row">
        <legend class="col-form-label title" id="title">
        帳號： <?php echo $_SESSION['account']?> 
        <p><a href="/controller/logout.php">[ 登 出 ]</a></p>
        </legend>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="content-left">
                <button class="btn-primary btn-block" id="btn_simple">簡單版</button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="content-right">
                <button class="btn-primary btn-block" id="btn_normal">普通版</button>
            </div>
        </div>
    </div>
    <div class=row>
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button class="btn-primary btn-block" id="btn_query_information">查詢</button>
        </div>
        <div class="col-md-3"></div>
    </div>
    <form action="/listening.php" method="POST" hidden>
        <input id="listening_type" name="listening_type"/>
        <button type="submit" id="btn_submit"></button>
    </form>
</div>
<style type="text/css">
@import "/css/lobby.css";
</style>

<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/lobby.js"></script>
</html>