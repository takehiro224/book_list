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
            <h2 id="title">登録画面</h2>
            <form action="form.php" method="post" >

                 タイトル:
                    <input type="text" name="title" required>
                <br>

                ISBN:
                    <input type="text" name="isbn" required>
                <br>    
                著者:
                    <input type="text" name="author" required>
                <br>
                価格:
                    <input type="text" name="price" required>
                <br>
                出版社: 
                    <input type="text" name="publisher_name">
                <br>
                発行日: 
                    <input type="datetime-local" name="created">
                <br>

        <input type ="submit" VALUE="登録" class="button">
        <input type ="button" onclick="history.back()" VALUE="戻る">
        </form> 
        </div>
                
    </body>
</html>