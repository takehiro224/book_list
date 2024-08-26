<?php
declare(strict_types=1);
require_once(dirname(__DIR__) . "/library/session_start.php");
require_once(dirname(__DIR__) . "/library/common.php");
require_once(dirname(__DIR__) . "/library/session.php");
writeLog("【表示】更新画面");

if(mb_strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
    if (isset($_POST['detail'])){
        $data = json_decode($_POST['detail'], true);
        $id = $data['id'];
        // 
        // exit();
//追加
        if (!empty($data['created'])){
        // DateTimeオブジェクトを作成し、指定された日時文字列を解析する
        $dateTime = new DateTime($data['created']);
        // date()関数を使用して、datetime-local形式の文字列に変換する
        $formattedDateTime = $dateTime->format('Y-m-d\TH:i');
        require_once(dirname(__DIR__) . "/template/edit.php");
        }else{

            require_once(dirname(__DIR__) . "/template/edit.php");
        }
    }else {
        $data = json_decode($_POST['update'], true);

        $id = $data['id'] ?? '';
        $title = $_POST['title'] ?? $data['title'] ?? '';
        $isbn = $_POST['isbn'] ?? $data['isbn'] ?? '';
        $price = $_POST['price'] ?? $data['price'] ?? '';
        $author = $_POST['author'] ?? $data['author'] ?? '';
        $publisher_name = $_POST['publisher_name'] ?? $data['publisher_name'] ?? '';
        $created = $_POST['created'] ?? $data['created'] ?? ''; 
        $errors = [];
        if (!empty($created)){
            // DateTimeオブジェクトを作成し、指定された日時文字列を解析する
            $dateTime = new DateTime($created);
            // date()関数を使用して、datetime-local形式の文字列に変換する
            $formattedDateTime = $dateTime->format('Y-m-d\TH:i');
        }else{
            $formattedDateTime = null;
        }
        if(!isNotNull($title)){
            $errors[] = "タイトルは必須です。";
        } elseif (!isWithinLength($title, 255)){
            $errors[] = "タイトルは255文字以内で入力してください。";
        }
        if(!isNotNull($isbn)){
            $errors[] = "ISBNは必須です。";
        } elseif (!isWithinLength($isbn, 20)){
            $errors[] = "ISBNは20文字以内で入力してください。";
        }
        if(!isNotNull($price)){
            $errors[] = "価格は必須です。";
        } elseif (!isNumeric($price)){
            $errors[] = "価格は数値で入力してください。";
        }
        if(!isNotNull($author)){
            $errors[] = "著者は必須です。";
        } elseif (!isWithinLength($author, 255)){
            $errors[] = "著者は255文字以内で入力してください。";
        }
        if(empty($errors)){
            // var_dump($created);
            // exit();
        DatabaseAccess::update($title, $isbn, (int)$price, $author, $publisher_name, $formattedDateTime, $id);          

        require_once(dirname(__DIR__) . "/htdocs/book.php");
                
        } else {
            foreach($errors as $error){
                echo "<p style='color: red;'>$error</p>";
            }
            require_once(dirname(__DIR__) . "/template/edit.php");
        }
       
    }   
}
?>