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
                    <div class="fl"><p class="fo1"><a href="book.php">書籍管理システム</a></p></div>
                </div>
            </h1>
        </div>
        <div id="main" class="container">
            <h2 id="title"><p class="fo2">登録画面</p></h2>
            <div class="center">
            <form action="form.php" method="post" >

                <div class="form-group">
                    <label for="title1"><p class="fo3">タイトル:</p></label>
                    <input type="text" name="title" id="title1">
                </div>

                <div class="form-group">
                    <label for="isbn"><p class="fo3">ISBN:</p></label>
                    <input type="text" name="isbn" id="isbn">
                </div>  

                <div class="form-group">  
                    <label for="author"><p class="fo3">著者:</p></label>
                    <input type="text" name="author" id="author">
                </div>

                <div class="form-group">
                    <label for="price"><p class="fo3">価格:</p></label>
                    <input type="text" name="price" id="price">
                </div>

                <div class="form-group">
                    <label for="publisher_name"><p class="fo3">出版社: </p></label>
                    <input type="text" name="publisher_name" id="publisher_name">
                </div>

                <div class="form-group">
                    <label for="created"><p class="fo3">発行日: </p></label>
                    <input type="datetime-local" name="created" id="created">
                </div>

                <?php if (!empty($errors)): ?>
                    <div style='color: red;'>
                        <?php foreach ($errors as $error): ?>
                            <div><?php echo htmlspecialchars($error, ENT_QUOTES); ?></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <div class="button-container">
                    <input type ="submit" VALUE="登録" class="button">
                    <input type ="button" onclick="history.back()" VALUE="戻る">
                </div>
            </form> 
            </div>
        </div>
                
    </body>
</html>