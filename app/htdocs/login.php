<?php
declare(strict_types=1);

require_once(dirname(__DIR__) . "/library/common.php");

sessionManager::start();

$error;

// 認証が成功しているかどうかをチェックするフラグ
$isAuthenticated = false;

if (mb_strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // フォームの入力チェック
    if (!isNotNull($username) || !isNotNull($password)) {
        $error = "パスワードまたはユーザー名が不正です。";

    }else{
            // 認証処理
        $user = DatabaseAccess::getUserByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $isAuthenticated = true;

        } else {
            $error = "ユーザー名またはパスワードが間違っています。";
        }
    }   
}
     // エラーメッセージの表示
     if (!empty($error)) {
            echo "<div style='color: red;'>$error</div>";
    }



// ログイン成功後にリダイレクト
if ($isAuthenticated) {
    header("Location: " . dirname($_SERVER['PHP_SELF']) . "/book.php");
    exit;
}

// ログイン画面を表示
require_once(dirname(__DIR__) . "/template/login.php");
?>
