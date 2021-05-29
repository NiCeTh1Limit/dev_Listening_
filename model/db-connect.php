<?php
$db = null;

function db_init () {
    global $_db;

    $dsn = "mysql:host={$_db['host']};dbname={$_db['name']}";
    try {
        $db = new PDO($dsn, $_db['login'], $_db['pass']);
        $db->exec("set names utf8");
        return $db;
    } catch (PDOException $e) {
        // 如果 DB 連線失敗就直接出錯，結束程式
        die('Connection failed: ' . $e->getMessage());
    }
}

$db = db_init(); // 一啟動就直接連資料庫