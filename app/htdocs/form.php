<?php
declare(strict_types=1);
// 共通部分の読込
require_once(dirname(__DIR__) . "/library/common.php");
require_once(dirname(__DIR__) . "/library/database_access.php");

if(!Auth::isLoggedIn()) {
    header("Location: " . "welcome.php");
}

if(mb_strtolower($_SERVER['REQUEST_METHOD']) === 'post') {    
    $title = $_POST['title'] ?? '';
    $isbn = $_POST['isbn'] ?? '';
    $price = $_POST['price'] ?? '';
    $author = $_POST['author'] ?? '';
    $publisher_name = $_POST['publisher_name'] ?? '';
    $created = $_POST['created'] ?? '';
    try {
        // タイトル
        if(!isNotNull($title)) {
            throw new Exception("タイトルを入力してください");
        }
        if(!validateMaxLength($title, 85)) {
            throw new Exception("タイトルの文字数は85文字までです。");
        }
        // ISBN
        if(!isNotNull($isbn)) {
            throw new Exception("ISBNを入力してください");
        }
        if(!validateMaxLength($isbn, 20)) {
            throw new Exception("ISBNの文字数は20文字までです。");
        }
        // 著者
        if(!isNotNull($author)) {
            throw new Exception("著者を入力してください");
        }
        if(!validateMaxLength($author, 85)) {
            throw new Exception("著者の文字数は85文字までです。");
        }
        // 価格
        if(!isNotNull($price)) {
            throw new Exception("価格を入力してください");
        }
        if(!isNumeric($price)) {
            throw new Exception("価格は数値で入力してください");
        }
        if(!validateMaxLength($isbn, 20)) {
            throw new Exception("価格の文字数は20文字までです。");
        }
        // 出版社
        if(!isNotNull($publisher_name)) {
            throw new Exception("出版社を入力してください");
        }
        if(!validateMaxLength($publisher_name, 85)) {
            throw new Exception("出版社の文字数は85文字までです。");
        }
    } catch (Exception $e) {
        $title = "エラー";
        $error_message = $e->getMessage() . "<br>";
        require_once(dirname(__DIR__) . "/template/form.php");
        exit; //処理終了
    }
    writeLog("【処理】登録実行");
    DatabaseAccess::insert($title, $isbn, (int)$price, $author, $publisher_name, $created);
    require_once(dirname(__DIR__) . "/htdocs/book.php");
} else {
    writeLog("【表示】登録画面");
    require_once(dirname(__DIR__) . "/template/form.php");
}
?>