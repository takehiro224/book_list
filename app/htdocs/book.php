<?php
declare(strict_types=1);
require_once(dirname(__DIR__) . "/library/database_access.php");


if(mb_strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
    if (isset($_POST['delete'])){
        $id = $_POST['id'] ?? '';
        if(!empty($id)){
            DatabaseAccess::deleteBy($id);
        }
    }
}

$data = DatabaseAccess::fetchAll();
require_once(dirname(__DIR__) . "/template/book.php");
?>