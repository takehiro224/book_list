<?php 
declare(strict_types=1);
// 共通部分の読込
require_once(dirname(__DIR__) . "/library/common.php");
if(!Auth::isLoggedIn()) {
    header("Location: " . "welcome.php");
}
$id = $_GET['id'] ?? '';
require_once(dirname(__DIR__) . "/library/database_access.php");
$data = DatabaseAccess::fetchBy($id);
writeLog("【表示】詳細画面");
require_once(dirname(__DIR__) . "/template/book_detail.php");
?>