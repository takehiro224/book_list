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
    
    public static function insert(string $title, string $isbn, int $price, string $author, ?string $publisher_name, ?string $created): bool {
        $sql = "INSERT INTO books(title, isbn, price, author";
        
         $param = [
            'title' => $title,
            'isbn' => $isbn,
            'price' => $price,
            'author'=> $author,
         ];
         if(!empty($publisher_name)) {
            $sql .= ", publisher_name";
            $param['publisher_name'] = $publisher_name;   
         }

         if(!empty($created)) {
            $sql .= ", created";
            $param['created'] = $created;   
         }
        
        $sql .=") VALUES (:title, :isbn, :price, :author"; 
        
        if(isset($param['publisher_name'])) {
            $sql .= ", :publisher_name";
        }
        
        if(isset($param['created'])) {
            $sql .= ", :created";
        }
        $sql .= ")";
        $stmt = self::getInstance()->prepare($sql);
        return $stmt->execute($param);
    }

    public static function update(string $title, string $isbn, int $price, string $author, ?string $publisher_name, ?string $created, int $id) {
        $sql = "UPDATE books SET title = :title,isbn = :isbn,price = :price,author = :author,publisher_name = :publisher_name,created = :created 
        WHERE id = :id;";
        // var_dump($created);
        // exit();
         $param = [
            'title' => $title,
            'isbn' => $isbn,
            'price' => $price,
            'author' => $author,
            'publisher_name' => $publisher_name,
            'created' => $created,
            'id' => $id
         ];
        $stmt = self::getInstance()->prepare($sql);

        // foreach ($param as $key => $created) {
        //     if ($created === null) {
        //         $stmt->bindValue(':'.$key, null, PDO::PARAM_NULL);
        //     } else {
        //         $stmt->bindValue(':'.$key, $created);
        //     }
        // }

        return $stmt->execute($param);
        
    }

public static function getUserByUsername(string $username) {

    $sql = "SELECT * FROM users WHERE username = :username";

    $stmt = self::getInstance()->prepare($sql);

    $stmt->execute(['username' => $username]);

    return $stmt->fetch(PDO::FETCH_ASSOC);

}
 
public static function registerUser(string $username, string $hashedPassword) {

    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";

    $stmt = self::getInstance()->prepare($sql);

    return $stmt->execute([

        'username' => $username,

        'password' => $hashedPassword

    ]);

}

public static function userExists(string $username): bool {
    $sql = "SELECT COUNT(*) FROM users WHERE username = :username";
    $stmt = self::getInstance()->prepare($sql);
    $stmt->execute(['username' => $username]);
    return $stmt->fetchColumn() > 0;
}

}