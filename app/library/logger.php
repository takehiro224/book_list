<?php
declare(strict_types=1);
function writeLog(string $message): void {
    $now = date("Y/m/d H:i:s");
    $log = "{$now}: {$message}\n";
    $fileName = dirname(__DIR__) . "/log/app.log";
    if(!file_exists($fileName)) {
        file_put_contents($fileName, '');
    }
    $handle = fopen($fileName, "a");
    fwrite($handle, $log);
    fclose($handle);
}
?>