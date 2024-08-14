<?php
declare(strict_types=1);

require_once(dirname(__DIR__) . "/library/database_access.php");
require_once(dirname(__DIR__) . "/library/logger.php");
writeLog("【表示】登録画面");

if(mb_strtolower($_SERVER['REQUEST_METHOD']) === 'post') {

        $title = $_POST['title'] ?? '';
        $isbn = $_POST['isbn'] ?? '';
        $price = $_POST['price'] ?? '';
        $author = $_POST['author'] ?? '';
        $publisher_name = $_POST['publisher_name'] ?? '';
        $created = $_POST['created'] ?? '';

      
     if(!empty($title) && !empty($isbn) && !empty($price) && !empty($author)){
        DatabaseAccess::insert($title, $isbn, (int)$price, $author, $publisher_name, $created);
       

        require_once(dirname(__DIR__) . "/htdocs/book.php");
        }
    
   
}else {
    require_once(dirname(__DIR__) . "/template/form.php");
}
?>