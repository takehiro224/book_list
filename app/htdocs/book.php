<?php
declare(strict_types=1);
// 共通部分の読込
require_once(dirname(__DIR__) . "/library/common.php");

if(!Auth::isLoggedIn()) {
    header("Location: " . "welcome.php");
}

if(mb_strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
    if (isset($_POST['delete'])) {
        $id = $_POST['id'] ?? '';
        if (!empty($id)) {
            writeLog("【処理】削除実行");
            DatabaseAccess::deleteBy($id);
        }
    }
}

$data = DatabaseAccess::fetchAll();
writeLog("【表示】一覧画面");
require_once(dirname(__DIR__) . "/template/book.php");
?>