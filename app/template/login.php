<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ログイン画面</title>
        <!-- フォントのインポート(KiwiMaru) -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kaisei+Tokumin&family=Kiwi+Maru&family=Monomaniac+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../htdocs/css/user.css">
</head>
<body>
<div class="center">
    <h1>ログイン</h1>
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="username">ユーザー名:</label>
            <input type="text" id="username" name="username" >
        </div>
        <div class="form-group">
            <label for="password">パスワード:</label>
            <input type="password" id="password" name="password" >
        </div>
        <?php if (!empty($errors)): ?>
            <div>
               <p  class="error"><?php echo htmlspecialchars($errors, ENT_QUOTES); ?></p>
            </div>
        <?php endif; ?>
        <button type="submit">ログイン</button>
    </form>
    <p>新規ユーザーですか？ <a href="register.php">新規登録</a></p>
</div>
</body>
</html>

