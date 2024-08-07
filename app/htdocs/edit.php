<?php
declare(strict_types=1);

require_once(dirname(__DIR__) . "/library/database_access.php");

if(mb_strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
    if (isset($_POST['detail'])){
        $data = json_decode($_POST['detail'], true);
        //DatabaseAccess::fetchBy($id);
        
    // if(!empty($title) && !empty($isbn) && !empty($price) && !empty($author)){
        
        require_once(dirname(__DIR__) . "/template/edit.php");
    //    }
    }
}else {
    $data = json_decode($_POST, true);
    $title = $_POST['title'] ?? '';
    $isbn = $_POST['isbn'] ?? '';
    $price = $_POST['price'] ?? '';
    $author = $_POST['author'] ?? '';
    $publisher_name = $_POST['publisher_name'] ?? '';
    $created = $_POST['created'] ?? '';
    //$data = json_decode($_POST['detail'], true);
    //$created = $data['created'];
    //$title = $data['title'] ?? '';
    //$isbn = $data['isbn'] ?? '';
    //$price = (int)($data['price'] ?? 0);
    // $author = $data['author'] ?? '';
    // $publisher_name = $data['publisher_name'] ?? '';
    //$created = $_POST['created'] ?? '';
    $id = $_POST['id'] ?? '';
    DatabaseAccess::update($title, $isbn, $price, $author, $publisher_name, $created, $id);   
    //$data = DatabaseAccess::fetchAll();
    require_once(dirname(__DIR__) . "/htdocs/book.php");
}
?>