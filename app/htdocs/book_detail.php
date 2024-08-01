<?php
    declare(strict_types=1);
    $id = $_GET ['id'] ?? '';
    require_once(dirname(__DIR__) . "/library/database_access.php");
    $data = DatabaseAccess::fetchBy($id);
    require_once(dirname(__DIR__) . "/template/book_detail.php");
?>