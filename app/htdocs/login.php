<?php
declare(strict_types=1);
session_start();

require_once(dirname(__DIR__) . "/library/common.php");

$error1;


// 認証が成功しているかどうかをチェックするフラグ
$isAuthenticated = false;

if (mb_strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // フォームの入力チェック
    if (empty($username) || empty($password)) {
        $error1 = "未入力の項目があります。";
        echo "<div style='color: red;'>$error1</div>";
        // exit;
    }else{
        $user = DatabaseAccess::getUserByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $isAuthenticated = true;

        // セキュアなクッキーを設定する
    setcookie(
        'secure_cookie', 
        'secure_value', 
        [
            'expires' => time() + 3600, // 有効期限
            'path' => '/', // パス
            'domain' => 'localhost', // ドメイン
            'secure' => true, // HTTPSでのみ送信
            'httponly' => true, // JavaScriptからアクセス不可
            'samesite' => 'Strict' // クロスサイトリクエストを防ぐ
        ]
    );

        } else {
            $error1 = "ユーザー名またはパスワードが間違っています。";
            echo "<div style='color: red;'>$error1</div>";
        }


    }
       
    // 認証処理
    
    
}

// ログイン成功後にリダイレクト
if ($isAuthenticated) {
    header("Location: " . dirname($_SERVER['PHP_SELF']) . "/book.php");
    exit;
}

// ログイン画面を表示
require_once(dirname(__DIR__) . "/template/login.php");
?>
