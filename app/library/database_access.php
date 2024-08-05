<?php
declare(strict_types=1);

class DatabaseAccess {

    private static PDO $pdo;

    private function __construct() {}

    private static function getInstance(): PDO {
        if(!isset(self::$pdo)) {
            $dsn = "pgsql:host=book_list_php_db_container;dbname=postgres";
            self::$pdo = new PDO($dsn, "root", "root");
        }
        return self::$pdo;
    }

    public static function fetchAll(): array {
        $sql = "SELECT * FROM books ORDER BY id";
        $stmt = self::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function fetchBy(string $id){
        $sql = "SELECT * FROM books WHERE id = :id ORDER BY id";
        $stmt = self::getInstance()->prepare($sql);
        $param['id'] = $id;
        $stmt->execute($param);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function deleteBy(string $id) {
        $sql = "DELETE FROM books WHERE id = :id";
        $stmt = self::getInstance()->prepare($sql);
        $param['id'] = $id;
        $stmt->execute($param);
    }
    
    public static function insert(string $title, string $isbn, int $price, string $author, string $publisher_name, string $created){
        $sql = "INSERT INTO books(title, isbn, price, author, publisher_name, created) VALUES (:title, :isbn, :price, :author, :publisher_name, :created )";

         $params['title'] = $title;
         $params['isbn'] = $isbn;
         $params['price'] = $price;
         $params['author'] = $author;
         $params['publisher_name'] = $publisher_name;
         $params['created'] = $created;
        
        $stmt = self::getInstance()->prepare($sql);
        return $stmt->execute($params);
    }
}