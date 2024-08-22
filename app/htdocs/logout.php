<?php
declare(strict_types=1);

session_start();

if (session_status() !== PHP_SESSION_ACTIVE) {
    die("セッションが開始できませんでした。");
}

session_unset();
session_destroy();
header("Location: login.php"); // ログイン画面にリダイレクト
exit;
?>
