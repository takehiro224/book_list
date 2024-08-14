<?php declare(strict_types=1); ?>
<!DOCTYPE html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
        <title>書籍詳細</title>
        <!-- フォントのインポート(KiwiMaru) -->
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
            <h3 id="title"><p class="fo2">詳細画面</p></h3>
            <div>
                <table border="1">
                    <tr>
                        <th><p class="fo3">タイトル</p> </th>
                        <td><p class="fo0 highlight"><?php echo $data["title"]; ?></p></td>
                    </tr>
                    <tr>
                        <th><p class="fo3">ISBN</p></th>
                        <td><p class="fo0 highlight"><?php echo $data["isbn"]; ?></p></td>
                    </tr>
                    <tr>
                        <th><p class="fo3">著者</p></th>
                        <td><p class="fo0 highlight"><?php echo $data["author"]; ?></p></td>
                    </tr>
                    <tr>
                        <th><p class="fo3">価格</p></th>
                        <td><p class="fo0 highlight"><?php echo $data["price"]; ?></p></td>
                    </tr>
                    <tr>
                        <th><p class="fo3">出版社</p></th>
                        <td><p class="fo0 highlight"><?php echo $data["publisher_name"]; ?></p></td>
                    </tr>
                    <tr>
                        <th><p class="fo3">発行日</p></th>
                        <td><p class="fo0 highlight"><?php echo $data["created"]; ?></p></td>
                    </tr>
                </table>
            </div>
            <div class="button-container">
                <form action="/htdocs/edit.php" method="post" name="detail">
                    <input type="hidden" name="detail" value="<?php echo htmlspecialchars(json_encode($data), ENT_QUOTES, 'UTF-8'); ?>">
                    <button type="submit" class="btn-radius-solid btn--shadow">更新</button>
                    <input type="button" value="戻る" onclick="location.href='book.php'; return false;">
                </form>
            </div>
        </div>
    </body>
</html>