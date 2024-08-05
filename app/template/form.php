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
            <h3 id="title">登録画面</h3>
            <form action="form.php" method = "post" >
                <label for ="title"> タイトル:</label>
                    <input type="text" name = "title">
                <br>

                <label for ="isbn"> ISBN:</label> 
                    <input type="text" name = "isbn">
                <br>    
                <label for ="author"> 著者:</label> 
                    <input type="text" name = "author">
                <br>
                <label for  ="prce"> 価格:</label> 
                    <input type="text" name = "price">
                <br>
                <label for ="publisher_name"> 出版社:</label> 
                    <input type="text" name = "publisher_name">
                <br>
                <label for ="created"> 発行日:</label> 
                    <input type="date" name = "created">
            </form>
        </div>
        <div class = "button_block">
        <input type ="submit" VALUE = "登録" class = "button">
        <input type ="button" onclick = "history.back()" VALUE = "戻る">
        </div>
            
    </body>
</html>