
// logout.php

<?php

declare(strict_types=1);
 
session_start();

session_unset();

session_destroy();
 
header("Location: login.html"); // ログイン画面にリダイレクト

exit;

?>

 