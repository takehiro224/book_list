<?php declare(strict_types=1); ?>
<!DOCTYPE html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
        <title>書籍登録</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kaisei+Tokumin&family=Kiwi+Maru&family=Monomaniac+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../htdocs/css/style.css">
    </head>
    <body>
        <div id="header">
            <h1>
                <div class="clearfix">
                    <div class="fl"><p class="fo1">書籍管理システム</p></div>
                </div>
            </h1>
        </div>
        <div id="main">
            <h2 id="title"><p class="fo2">登録画面</p></h2>
            <form action="form.php" method="post" >

                <div class="form-group">
                    <label for="title"><p class="fo3">タイトル:</p></label>
                    <input type="text" name="title" required>
                </div>

                <div class="form-group">
                    <label for="isbn"><p class="fo3">ISBN:</p></label>
                    <input type="text" name="isbn" required>
                </div>  

                <div class="form-group">  
                    <label for="author"><p class="fo3">著者:</p></label>
                    <input type="text" name="author" required>
                </div>

                <div class="form-group">
                    <label for="price"><p class="fo3">価格:</p></label>
                    <input type="text" name="price" required>
                </div>

                <div class="form-group">
                    <label for="publisher_name"><p class="fo3">出版社: </p></label>
                    <input type="text" name="publisher_name">
                </div>

                <div class="form-group">
                    <label for="created"><p class="fo3">発行日: </p></label>
                    <input type="datetime-local" name="created">
                </div>

        <input type ="submit" VALUE="登録" class="button">
        <input type ="button" onclick="history.back()" VALUE="戻る">
        </form> 
        </div>
                
    </body>
</html>