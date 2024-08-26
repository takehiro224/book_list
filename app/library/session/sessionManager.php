<?php
declare(strict_types=1);

    class sessionManager {
    /**
     * セッションを開始し、カスタム設定を行います。
     *
     * @return void
     */
    public static function start(): void {
        $cookieParams = [
            'lifetime' => 3600,
            'path' => '/',
            'domain' => '',
            'secure' => true,
            'httponly' => true,
            'samesite' => 'Lax'
        ];
 
        session_set_cookie_params($cookieParams);
        session_start();
 
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
    public static function checkSessionTimeout(): void {
        if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > 3600) {
            // セッションの有効期限が切れた場合
            session_unset();
            session_destroy();
            header("Location: login.php");
            exit();
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
            exit();
        }
    }
    }
?>
