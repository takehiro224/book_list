<?php
declare(strict_types=1);
// 共通部分の読込
require_once(dirname(__DIR__) . "/library/common.php");
require_once(dirname(__DIR__) . "/library/database_access.php");

if(!Auth::isLoggedIn()) {
    header("Location: " . "welcome.php");
}

if(mb_strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
    if (isset($_POST['detail'])) {
        $data = json_decode($_POST['detail'], true);
        $id = $data['id'];
        // DateTimeオブジェクトを作成し、指定された日時文字列を解析する
        $dateTime = new DateTime($data['created']);
        // date()関数を使用して、datetime-local形式の文字列に変換する
        $formattedDateTime = $dateTime->format('Y-m-d\TH:i');
        writeLog("【表示】更新画面");
        require_once(dirname(__DIR__) . "/template/edit.php");
    } else {
        $data = json_decode($_POST['data'], true);
        $id = (string)$data['id'];
        $title = $_POST['title'] ?? '';
        $isbn = $_POST['isbn'] ?? '';
        $price = $_POST['price'] ?? '';
        $author = $_POST['author'] ?? '';
        $publisher_name = $_POST['publisher_name'] ?? '';
        $created = $_POST['created'] ?? '';
        // DateTimeオブジェクトを作成し、指定された日時文字列を解析する
        $dateTime = new DateTime($created);
        // date()関数を使用して、datetime-local形式の文字列に変換する
        $formattedDateTime = $dateTime->format('Y-m-d\TH:i');
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
            require_once(dirname(__DIR__) . "/template/edit.php");
            exit; //処理終了
        }
        writeLog("【処理】更新実行");
        DatabaseAccess::update($id, $title, $isbn, (int)$price, $author, $publisher_name, $formattedDateTime);        
        require_once(dirname(__DIR__) . "/htdocs/book.php");
    }
}
?>