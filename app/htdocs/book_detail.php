<?php
    declare(strict_types=1);
    require_once(dirname(__DIR__) . "/library/session_start.php");
    require_once(dirname(__DIR__) . "/library/common.php");

    writeLog("【表示】詳細画面");
    $id = $_GET ['id'] ?? '';
    $data = DatabaseAccess::fetchBy($id);
   
    require_once(dirname(__DIR__) . "/template/book_detail.php");
    
?>