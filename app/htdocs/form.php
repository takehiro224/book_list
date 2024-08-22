<?php
declare(strict_types=1);
require_once(dirname(__DIR__) . "/library/session_start.php");
require_once(dirname(__DIR__) . "/library/common.php");
writeLog("【表示】登録画面");

if(mb_strtolower($_SERVER['REQUEST_METHOD']) === 'post') {

        $title = $_POST['title'] ?? '';
        $isbn = $_POST['isbn'] ?? '';
        $price = $_POST['price'] ?? '';
        $author = $_POST['author'] ?? '';
        $publisher_name = $_POST['publisher_name'] ?? '';
        $created = $_POST['created'] ?? '';
        $errors = [];
      
    //  if(!empty($title) && !empty($isbn) && !empty($price) && !empty($author))
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
            $errors[] = "価格は必須です。正の整数で入力してください。";
        } elseif (!isNumeric($price)){
            $errors[] = "価格は正の整数で入力してください。";
        }
        if(!isNotNull($author)){
            $errors[] = "著者は必須です。";
        } elseif (!isWithinLength($author, 255)){
            $errors[] = "著者は255文字以内で入力してください。";
        }
        if(empty($errors)){
            DatabaseAccess::insert($title, $isbn, (int)$price, $author, $publisher_name, $created);
            require_once(dirname(__DIR__) . "/htdocs/book.php");
        } else {
            foreach($errors as $error){
                echo "<div style='color: red;'>$error</div>";
            }
            require_once(dirname(__DIR__) . "/template/form.php");
        }
        
}else {
    require_once(dirname(__DIR__) . "/template/form.php");
}
?>