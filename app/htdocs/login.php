// login.php
<?php
declare(strict_types=1);
 
require_once(dirname(__DIR__) . "/library/common.php");
 
if(mb_strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
 
    // フォームの入力チェック
    if (empty($username) || empty($password)) {
        echo "ユーザー名とパスワードを入力してください。";
        exit;
    }
 
    // 認証処理
    $user = DatabaseAccess::getUserByUsername($username);
    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        header("Location: book.php"); // 一覧画面にリダイレクト
        exit;
    } else {
        echo "ユーザー名またはパスワードが間違っています。";
    }
}
?>