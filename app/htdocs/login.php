<?php
declare(strict_types=1);
session_start();

require_once(dirname(__DIR__) . "/library/common.php");

$errors;

// 認証が成功しているかどうかをチェックするフラグ
$isAuthenticated = false;

if (mb_strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // フォームの入力チェック
    if (!isNotNull($username) || !isNotNull($password)) {
        $errors = "パスワードまたはユーザー名が不正です。";
    }else{
        $user = DatabaseAccess::getUserByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $isAuthenticated = true;
        } else {
            $errors = "ユーザー名またはパスワードが間違っています。";
        }
    }
}

// ログイン成功後にリダイレクト
if ($isAuthenticated) {
    header("Location: " . dirname($_SERVER['PHP_SELF']) . "/book.php");
    exit;
}

// ログイン画面を表示
require_once(dirname(__DIR__) . "/template/login.php");
?>
