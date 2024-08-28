<?php
declare(strict_types=1);
require_once(dirname(__DIR__) . "/library/common.php");
$errorMessage = "";
// リクエストメソッド判定
if(mb_strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
    if(isset($_POST['form_type'])) {
        $form_type = $_POST['form_type'];
        if($form_type == 'login') {
            $id = $_POST['login-id'];
            $password = $_POST['login-password'];
            // ユーザー認証
            if(Auth::login($id, $password)) {
                header("Location: " . "book.php");
            } else {
                $errorMessage = "ユーザー認証失敗";
            }
        } elseif($form_type == 'register') {
            $id = $_POST['register-id'];
            $password = password_hash($_POST['register-password'], PASSWORD_DEFAULT);
            $name = $_POST['register-name'];
            // ユーザー登録処理&判定
            if(Users::registUser($id, $password, $name)) {
                // ユーザー登録成功
                header("Location: " . "book.php");
            }
            // ユーザー登録失敗
            $errorMessage = "ユーザー登録失敗";
        } else {
            // エラー
            $errorMessage = "不明なエラー";
        }
    }
}

writeLog("【表示】ログイン画面");
require_once(dirname(__DIR__) . "/template/welcome.php");
?>