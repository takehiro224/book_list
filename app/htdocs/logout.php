<?php
declare(strict_types=1);

require_once(dirname(__DIR__) . "/library/common.php");

sessionManager::start();

if (session_status() !== PHP_SESSION_ACTIVE) {
    die("セッションが開始できませんでした。");
}

session_unset();
session_destroy();

// クッキーを削除
if (isset($_COOKIE['session_cookie'])) {
    setcookie('session_cookie', '', time() - 3600, '/'); // 有効期限を過去に設定して削除
}

// セキュリティヘッダーを追加
header("Content-Security-Policy: default-src 'self';");
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");

header("Location: login.php"); // ログイン画面にリダイレクト
exit;
?>
