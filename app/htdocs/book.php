<?php
declare(strict_types=1);
require_once(dirname(__DIR__) . "/library/session_start.php");
require_once(dirname(__DIR__) . "/library/common.php");

writeLog("データベース接続しました");

if(mb_strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
    if (isset($_POST['delete'])){
        $id = $_POST['id'] ?? '';
        if(!empty($id)){
            writeLog("削除リクエストを受信しました ID: {$id}");
            DatabaseAccess::deleteBy($id);
            writeLog("ID: {$id}を削除しました");
        } else {
            writeLog("削除失敗しました");
        }
    }
}

$data = DatabaseAccess::fetchAll();
writeLog("【表示】一覧画面");
require_once(dirname(__DIR__) . "/template/book.php");


?>