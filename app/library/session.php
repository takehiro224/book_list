<?php 
declare(strict_types=1);
class Session {

    // SESSIONにキーを指定して値を設定する
    public static function set(string $key, mixed $value): void {
        $_SESSION[$key] = $value;
    }

    // SESSIONからキーを指定して値を取得する
    public static function get(string $key): mixed {
        $value = null;
        if(isset($_SESSION[$key])) {
            $value = $_SESSION[$key];
        }
        return $value;
    }

    // SESSIONを開始する
    public static function start(): void {
        session_set_cookie_params([
            'httponly' => true
        ]);
        session_start();
    }

    // SESSIONに登録されたデータを全て破棄する
    public static function destroy(): void {
        session_unset(); // セッション変数削除
        session_destroy();
    }
    // 現在のSESSION IDを新しく生成したSESSION IDに置き換える
    public static function regenerate(): void {
        session_regenerate_id(true);
    }
}
?>