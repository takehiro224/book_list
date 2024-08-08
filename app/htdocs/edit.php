<?php
declare(strict_types=1);

require_once(dirname(__DIR__) . "/library/database_access.php");

if(mb_strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
    if (isset($_POST['detail'])){
        $data = json_decode($_POST['detail'], true);
        require_once(dirname(__DIR__) . "/template/edit.php");
    }else {
        $data = json_decode($_POST['update'], true);

        $id = $data['id'] ?? '';
        $title = $_POST['title'] ?? $data['title'] ?? '';
        $isbn = $_POST['isbn'] ?? $data['isbn'] ?? '';
        $price = $_POST['price'] ?? $data['price'] ?? '';
        $author = $_POST['author'] ?? $data['author'] ?? '';
        $publisher_name = $_POST['publisher_name'] ?? $data['publisher_name'] ?? '';
        $created = $_POST['created'] ?? $data['created'] ?? ''; 

        DatabaseAccess::update($title, $isbn, (int)$price, $author, $publisher_name, $created, $id);   
        
        require_once(dirname(__DIR__) . "/htdocs/book.php");
        }
}
?>