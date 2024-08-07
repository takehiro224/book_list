<?php declare(strict_types=1); ?>
<!DOCTYPE html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
        <title>書籍詳細</title>
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
            <h3 id="title">詳細画面</h3>
            <div>
                <table border="1">
                    <tr>
                        <th>タイトル</th>
                        <td><?php echo $data["title"]; ?></td>
                    </tr>
                    <tr>
                        <th>ISBN</th>
                        <td><?php echo $data["isbn"]; ?></td>
                    </tr>
                    <tr>
                        <th>著者</th>
                        <td><?php echo $data["author"]; ?></td>
                    </tr>
                    <tr>
                        <th>価格</th>
                        <td><?php echo $data["price"]; ?></td>
                    </tr>
                    <tr>
                        <th>出版社</th>
                        <td><?php echo $data["publisher_name"]; ?></td>
                    </tr>
                    <tr>
                        <th>発行日</th>
                        <td><?php echo $data["created"]; ?></td>
                    </tr>
                </table>
            </div>
            <div>
                <form action="/htdocs/edit.php" method="post" name="detail">
                    <input type="hidden" name="detail" value="<?php echo htmlspecialchars(json_encode($data), ENT_QUOTES, 'UTF-8'); ?>">
                    <button type="submit">更新</button>
                    <input type="button" value="戻る" onclick="location.href='book.php'; return false;">
                </form>
            </div>
        </div>
    </body>
</html>