<?php declare(strict_types=1); ?>
<!DOCTYPE html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
        <title>書籍登録</title>
    </head>
    <body>
        <div id="header">
            <h1>
                <div class="clearfix">
                    <div class="fl">書籍管理システム</div>
                </div>
            </h1>
        </div>
        <div id="main">
            <h3 id="title">更新画面</h3>
            <form action="edit.php" method="post">
                <div>
                    タイトル: <input type="text" name="title" value="<?php echo $date["title"]; ?>">                                    
                </div>
                <div>
                    ISBN: <input type="text" name="isbn" value="<?php echo $date["isbn"]; ?>">
                </div>
                <div>
                    著者: <input type="text" name="author" value="<?php echo $date["author"]; ?>">
                </div>
                <div>
                    価格: <input type="text" name="price" value="<?php echo $date["price"]; ?>">
                </div>
                <div>
                    出版社: <input type="text" name="publisher_name" value="<?php echo $date["publisher_name"]; ?>">
                </div>
                <div>
                    発行日: <input type="datetime-local" name="created" value="<?php echo $date["created"]; ?>">
                </div>
                <div>
                    <input type="submit" value="更新">
                    <input type="button" value="戻る" onclick="location.href='edit.php'; return false;">
                </div>
            </form>
        </div>
    </body>
</html>