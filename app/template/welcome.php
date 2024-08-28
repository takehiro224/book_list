<!DOCTYPE html>
<html lang="Ja_JP">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="../htdocs/css/welcome.css">
</head>
<body>
    <?php if($errorMessage !== "") { ?>
        <p class="error_message"><?php echo $errorMessage; ?></p>
    <?php } ?>
    <div class="container">
        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'Login')">ログイン</button>
            <button class="tablinks" onclick="openTab(event, 'Register')">登録</button>
        </div>

        <div id="Login" class="tabcontent">
            <h2>ログイン</h2>
            <form action="welcome.php" method="post" id="login-form">
                <input type="hidden" name="form_type" value="login">
                <label for="login-id">ユーザーID: </label>
                <input type="text" id="login-id" name="login-id" required>
                <label for="login-password">パスワード: </label>
                <input type="password" id="login-password" name="login-password" required>
                <button type="submit">ログイン</button>
            </form>
        </div>

        <div id="Register" class="tabcontent">
            <h2>登録</h2>
            <form action="welcome.php" method="post" id="register-form">
                <input type="hidden" name="form_type" value="register">
                <label for="register-id">ユーザーID: </label>
                <input type="text" id="register-id" name="register-id" required>
                <label for="register-password">パスワード: </label>
                <input type="password" id="register-password" name="register-password" required>
                <label for="register-name">ユーザー名: </label>
                <input type="text" id="register-name" name="register-name" required>
                <button type="submit">登録</button>
            </form>
        </div>
    </div>
    <script src="../htdocs/js/welcome.js"></script>
</body>
</html>