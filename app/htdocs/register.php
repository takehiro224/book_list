// register.php
<?php
declare(strict_types=1);
 
require_once(dirname(__DIR__) . "/library/common.php");
 
if(mb_strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
 
    if (empty($username) || empty($password)) {
        echo "ユーザー名とパスワードを入力してください。";
        exit;
    }
 
    // パスワードのハッシュ化
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
 
    // データベースへの登録
    $result = DatabaseAccess::registerUser($username, $hashedPassword);
    if ($result) {
        echo "ユーザー登録が完了しました。<a href='login.php'>ログイン</a>";
    } else {
        echo "ユーザー登録に失敗しました。";
    }
}
?>
