<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>新規登録</title>
        <!-- フォントのインポート(KiwiMaru) -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kaisei+Tokumin&family=Kiwi+Maru&family=Monomaniac+One&display=swap">
        <link rel="stylesheet" href="../htdocs/css/user.css">
  </head>
<body>
<div class="center">
    <h1>新規登録</h1>
    <form action="register.php" method="post">
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
                <?php foreach ($errors as $error): ?>
                    <p class="error"><?php echo htmlspecialchars($error, ENT_QUOTES); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <button type="submit">登録</button>
    </form>
    <p>既にアカウントがありますか？ <a href="login.php">ログイン</a></p>
</div>
</body>
</html>
