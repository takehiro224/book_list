<?php 
    declare(strict_types=1);
    function writeLog(string $message): void {
        $logFile = dirname(__DIR__) . '/logs/app.log';
        date_default_timezone_set('Asia/Tokyo');
        $timestamp = date('Y-m-d H:i:s');
        $logMessage ="[$timestamp]$message" . PHP_EOL;
        file_put_contents($logFile, $logMessage, FILE_APPEND | LOCK_EX);
    }
?>