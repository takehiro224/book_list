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
                    <div class="fl"><p class="fo1">書籍管理システム</p></div>
                </div>
            </h1>
        </div>
        <div id="main">
            <h3 id="title"><p class="fo2">詳細画面</p></h3>
            <div>
                <table border="1">
                    <tr>
                        <th>タイトル</th>
                        <td><p class="fo0 highlight"><?php echo $data["title"]; ?></p></td>
                    </tr>
                    <tr>
                        <th>ISBN</th>
                        <td><p class="fo0 highlight"><?php echo $data["isbn"]; ?></p></td>
                    </tr>
                    <tr>
                        <th>著者</th>
                        <td><p class="fo0 highlight"><?php echo $data["author"]; ?></p></td>
                    </tr>
                    <tr>
                        <th>価格</th>
                        <td><p class="fo0 highlight"><?php echo $data["price"]; ?></p></td>
                    </tr>
                    <tr>
                        <th>出版社</th>
                        <td><p class="fo0 highlight"><?php echo $data["publisher_name"]; ?></p></td>
                    </tr>
                    <tr>
                        <th>発行日</th>
                        <td><p class="fo0 highlight"><?php echo $data["created"]; ?></p></td>
                    </tr>
                </table>
            </div>
            <div>
                <form action="/htdocs/edit.php" method="post" name="detail">
                    <input type="hidden" name="detail" value="<?php echo htmlspecialchars(json_encode($data), ENT_QUOTES, 'UTF-8'); ?>">
                    <button type="submit" class="btn-radius-solid btn--shadow">更新</button>
                    <input type="button" value="戻る" onclick="location.href='book.php'; return false;">
                </form>
            </div>
        </div>
    </body>
</html>