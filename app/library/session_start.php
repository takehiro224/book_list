<?php
session_start();
 
// セッションにユーザーIDが設定されていない場合は、ログインページへリダイレクト
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>