<?php declare(strict_types=1); ?>
<!DOCTYPE html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
        <title>書籍一覧</title>
        <script src="deleteUser.js"></script> 
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
            <div class="container">
                <h3 id="title"><p class="fo2">書籍一覧画面</p></h3>
                <a href="logout.php"><p class="fo0">ログアウト</p></a>
            </div>
                <div>
                    <table class="table_design01">
                        <thead>
                            <tr>
                                <th><p class="fo3">タイトル</p></th>
                                <th><p class="fo3">著者</p></th>
                                <th><p class="fo3">出版社</p></th>
                                <td>
                                    <form action="/htdocs/form.php" method = "get">
                                        <button class=bu001 type = "submit">登録</button>
                                    </form>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <td><p class="fo0"><a href=<?php echo "/htdocs/book_detail.php?id=" . $row["id"] ?>><?php echo $row["title"]; ?></a></p></td>
                                    <td><p class="fo0"><?php echo $row["author"]; ?></p></td>
                                    <td><p class="fo0"><?php echo $row["publisher_name"]; ?></p></td>
                                    <td>
                                        <button class=bu002 onclick="deleteUser('<?php echo $row["id"]; ?>');">削除</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <form action="book.php" name="delete_form" method="POST">
                <input type="hidden" name="id" value="" />
                <input type="hidden" name="delete" value=""  />
            </form>
            
        </body>
    </html>
