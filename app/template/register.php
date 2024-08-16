<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>新規登録</title>
<style>
        /* スタイルはここに追加 */
</style>
</head>
<body>
<h1>新規登録</h1>
<form action="register.php" method="post">
<label for="username">ユーザー名:</label>
<input type="text" id="username" name="username" required>
<br>
<label for="password">パスワード:</label>
<input type="password" id="password" name="password" required>
<br>
<button type="submit">登録</button>
</form>
<p>既にアカウントがありますか？ <a href="login.php">ログイン</a></p>
</body>
</html>