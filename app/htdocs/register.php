<?php
declare(strict_types=1);
 
require_once(dirname(__DIR__) . "/library/common.php");
 
$errors = []; // エラーを格納する配列

sessionManager::start();

if (mb_strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
 
    // 入力チェック
    if (!isNotNull($username)) {
        $errors[] = "ユーザー名は必須です。";
    } elseif (!isWithinLength($username, 255)) {
        $errors[] = "ユーザー名は255文字以内で入力してください。";
    }
    if (!isNotNull($password)) {
        $errors[] = "パスワードは必須です。";
    } elseif (!isWithinLength($password, 255)) {
        $errors[] = "パスワードは255文字以内で入力してください。";
    }
 
    // ユーザー名の重複チェック
    if (DatabaseAccess::userExists($username)) {
        $errors[] = "このユーザー名は既に使用されています。";
    }
 
    // エラーがない場合のみ、ユーザー登録処理を実行
    if (empty($errors)) {
        // パスワードのハッシュ化
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $result = DatabaseAccess::registerUser($username, $hashedPassword);
        if ($result) {
            ob_start();
            echo "<p> ユーザー登録が完了しました。ログイン画面に移動します。</p>";
            // 登録成功メッセージを表示し、一定時間後にログイン画面へリダイレクト
            header("Refresh: 1; url=login.php");
            ob_end_flush();
            exit;
        } else {
            $errors[] = "ユーザー登録に失敗しました。";
        }
    }
}
 
    // エラーメッセージの表示
    if (!empty($errors)) {
        require_once(dirname(__DIR__) . "/template/register.php");
    }
    // フォームを表示
    require_once(dirname(__DIR__) . "/template/register.php");
 
?>