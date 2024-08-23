<?php

session_set_cookie_params([
    'lifetime' => 1800,  // クッキーの有効期限（秒）
    'path' => '/',
    'domain' => '',
    'secure' => true,  // HTTPSを使用する場合はtrue
    'httponly' => true,  // JavaScriptからクッキーにアクセスできないようにする
    'samesite' => 'Lax'  // クロスサイトリクエストフォージェリ（CSRF）対策
]);

session_start();
 
// セッションにユーザーIDが設定されていない場合は、ログインページへリダイレクト
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// セッションの有効期限（秒）
$session_lifetime = 3600; // 1時間
 
// 最後のアクティブな時間を取得
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $session_lifetime) {
    // セッションの有効期限が切れた場合
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
 
// 最後のアクティブな時間を更新
$_SESSION['last_activity'] = time();
 
// セッションIDの再生成
session_regenerate_id(true);
 
// セッションにユーザーIDが設定されていない場合は、ログインページへリダイレクト
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

?>