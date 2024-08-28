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

    public static function fetchBy(string $id) {
        $sql = "SELECT * FROM books WHERE id = :id ORDER BY id";
        $stmt = self::getInstance()->prepare($sql);
        $param['id'] = $id;
        $stmt->execute($param);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function deleteBy(string $id) {
        $sql = "DELETE FROM books WHERE id = :id";
        $param = ["id" => $id];
        $stmt = self::getInstance()->prepare($sql);
        $stmt->execute($param);
    }

    public static function insert(string $title, string $isbn, int $price, string $author, string $publisher_name, string $created) {
        $sql = "INSERT INTO books (title, isbn, price, author, publisher_name, created) VALUES (:title, :isbn, :price, :author, :publisher_name, :created);";
        $param = [
            "title" => $title,
            "isbn" => $isbn,
            "price" => $price,
            "author" => $author,
            "publisher_name" => $publisher_name,
            "created" => $created
        ];
        $stmt = self::getInstance()->prepare($sql);
        return $stmt->execute($param);
    }

    public static function update(string $id, string $title, string $isbn, int $price, string $author, string $publisher_name, string $created) {
        $sql = "UPDATE books SET title=:title, isbn=:isbn, price=:price, author=:author, publisher_name=:publisher_name, created=:created WHERE id=:id;";
        $param = [
            "id" => $id,
            "title" => $title,
            "isbn" => $isbn,
            "price" => $price,
            "author" => $author,
            "publisher_name" => $publisher_name,
            "created" => $created
        ];
        $stmt = self::getInstance()->prepare($sql);
        return $stmt->execute($param);
    }

    public static function fetch(string $sql, array $param = []): array | bool {
        $stmt = self::getInstance()->prepare($sql);
        $stmt->execute($param);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * 引数に渡されたSQL(文字列)を実行して結果を真偽値で返却する
     * 
     * @param string @sql 実行するSQL
     * @param array @params SQLに埋め込む値
     */
    public static function execute(string $sql, array $params = []): bool {
        $stmt = self::getInstance()->prepare($sql);
        return $stmt->execute($params);
    }
    
}

?>