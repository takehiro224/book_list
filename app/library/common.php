<?php
declare(strict_types=1);
define('LIBRARY_DIR',dirname(__DIR__) . '/library/');
require_once(LIBRARY_DIR . "logger.php");
require_once(LIBRARY_DIR . "validate.php");
require_once(LIBRARY_DIR . "database_access.php");
require_once(LIBRARY_DIR . "session/sessionManager.php");
?>