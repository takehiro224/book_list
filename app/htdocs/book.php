<?php
declare(strict_types=1);
require_once(dirname(__DIR__) . "/library/database_access.php");
$data = DatabaseAccess::fetchAll();
require_once(dirname(__DIR__) . "/template/book.php");
?>