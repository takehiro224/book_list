<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ログイン画面</title>
<style>
        /* スタイルはここに追加 */
</style>
</head>
<body>
<h1>ログイン</h1>
<form action="login.php" method="post">
<label for="username">ユーザー名:</label>
<input type="text" id="username" name="username" required>
<br>
<label for="password">パスワード:</label>
<input type="password" id="password" name="password" required>
<br>
<button type="submit">ログイン</button>
</form>
<p>新規ユーザーですか？ <a href="register.php">新規登録</a></p>
</body>
</html>
