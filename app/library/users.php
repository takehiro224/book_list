<?php
declare(strict_types=1);

class Users {
    /**
     * 新規ユーザー登録
     * 
     * @param string $id ユーザーID
     * @param string $password パスワード
     * @param string $name ユーザー名
     * @return bool 登録実行結果
     */
    public static function registUser(string $id, string $password, string $name): bool {
        // 登録用SQLを作成
        $sql = "INSERT INTO users (login_id, password, name) VALUES (:id, :password, :name)";
        $params = ["id" => $id, "password" => $password, "name" => $name];
        return DatabaseAccess::execute($sql, $params);
    }

    /**
     * ユーザー情報取得
     * 
     * @param string $id ユーザーID
     * @return array ユーザー情報
     */
    public static function getById(string $id): array {
        $sql = "SELECT * FROM users WHERE login_id = :id";
        $params = ["id" => $id];
        return DatabaseAccess::fetch($sql, $params);
    }
}
?>