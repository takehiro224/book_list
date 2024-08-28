<?php
declare(strict_types=1);
// ログイン情報を管理するクラス
class Auth {
    /** 
     * ユーザー情報を取得する
     */
    public static function getAccountById(string $id): array | bool {
        // SQL実行
        return Users::getById($id);
    }

    /** 
     * ログイン処理
     * 
     * @param string $id ログインID
     * @param string $password パスワード
     * @return boolean ログイン結果
     */ 
    public static function login(string $id, string $password): bool {
        // IDに紐づくデータを取得する
        $account = self::getAccountById($id);
        if(empty($account["id"])) {
            return false; // データ取得できないのでエラー
        }
        // IDに紐づくデータのパスワードと引数のパスワードが一致するか確認
        $result = password_verify($password, $account["password"]);
        if($result === false) {
            return false; // パスワードが一致しないのでエラー
        }
        // セッションIDを発行
        Session::regenerate();
        // セッションに情報を格納する
        Session::set("id", $account["id"]);
        Session::set("loginId", $account["login_id"]);
        Session::set("name", $account["name"]);
        // ログイン結果を返却
        return true;
    }

    /** 
     * ログアウト処理
     */
    public static function logout(): void {
        // セッション破棄
        Session::destroy();
        // クッキーの削除
        setcookie("PHPSESSID", "", time() - 1800, "/");
        // セッション開始
        Session::start();
    }

    /**
     * ログイン判定
     */
    public static function isLoggedIn(): bool {
        return !is_null(Session::get("id"));
    }
}
?>