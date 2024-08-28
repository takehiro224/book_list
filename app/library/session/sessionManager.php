<?php
declare(strict_types=1);

    class sessionManager {
    /**
     * セッションを開始し、カスタム設定を行います。
     *
     * @return void
     */
    public static function start(): void
    {
        // セッションがすでに開始されている場合は、再度開始する必要はない
        if (session_status() !== PHP_SESSION_ACTIVE) {
            // セッションのクッキー設定
            $cookieParams = [
                'lifetime' => 3600,  // クッキーの有効期限（秒）
                'path' => '/',
                'domain' => '',
                'secure' => true,  // HTTPSを使用する場合はtrue
                'httponly' => true,  // JavaScriptからクッキーにアクセスできないようにする
                'samesite' => 'Lax'  // クロスサイトリクエストフォージェリ（CSRF）対策
            ];
            
            // セッションのクッキー設定を適用
            session_set_cookie_params($cookieParams);

            // セッションの開始
            session_start();
        }

        // セッションIDの再生成
        session_regenerate_id(true);
        
        // セッションの有効期限を確認
        self::checkSessionTimeout();
    }
 
    /**
     * セッションの有効期限を確認し、期限が切れた場合はログインページにリダイレクトします。
     *
     * @return void
     */
    private static function checkSessionTimeout(): void {
        if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > 3600) {
            // セッションの有効期限が切れた場合
            session_unset();
            session_destroy();
            header("Location: login.php");
        }
        // 最後のアクティブな時間を更新
        $_SESSION['last_activity'] = time();
    }
 
    /**
     * ユーザーIDが設定されていない場合は、ログインページにリダイレクトします。
     *
     * @return void
     */
    public static function checkUserLoggedIn(): void {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login.php");
        }
    }
}
?>
