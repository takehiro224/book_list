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
            <h3 id="title"><p class="fo2">更新画面</p></h3>
                <div class="center">
                    <form action="edit.php" method="post">
                    <div class="form-group">
                        <label for="title"><p class="fo3">タイトル:</p></label>
                        <input type="text" name="title" value="<?php echo $data["title"]; ?>">                                    
                    </div>
                    <div class="form-group">
                        <label for="isbn"><p class="fo3">ISBN:</p></label>
                        <input type="text" name="isbn" value="<?php echo $data["isbn"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="author"><p class="fo3">著者:</p></label>
                        <input type="text" name="author" value="<?php echo $data["author"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="price"><p class="fo3">価格:</p></label>
                        <input type="text" name="price" value="<?php echo $data["price"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="publisher_name"><p class="fo3">出版社:</p></label>
                        <input type="text" name="publisher_name" value="<?php echo $data["publisher_name"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="created"><p class="fo3">発行日:</p></label>
                        <input type="datetime-local" name="created" value="<?php echo $data["created"]; ?>">
                    </div>       
                    <div class="button-container">                             
                        <input type="hidden" name="update" value="<?php echo htmlspecialchars(json_encode($data), ENT_QUOTES, 'UTF-8'); ?>">
                        <input type="submit" value="更新">
                        <input type="button"  value="戻る" onclick="location.href='book_detail.php?id=<?php echo $id ?>'; return false;">   
                    </div> 
                </form>
            </div>
        </div>
    </body>
</html>