<?php
declare(strict_types=1);

// 共通部分の読込
require_once(dirname(__DIR__) . "/library/common.php");

// ログアウト処理
Auth::logout();

// ログイン画面に遷移
header("Location: " . "welcome.php");
?>