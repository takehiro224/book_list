<?php

session_set_cookie_params([
    'lifetime' => 3600,  // クッキーの有効期限（秒）
    'path' => '/',
    'domain' => '',
    'secure' => true,  // HTTPSを使用する場合はtrue
    'httponly' => true,  // JavaScriptからクッキーにアクセスできないようにする
    'samesite' => 'Lax'  // クロスサイトリクエストフォージェリ（CSRF）対策
]);

session_start();

// セッションIDの再生成
session_regenerate_id(true); 

?>