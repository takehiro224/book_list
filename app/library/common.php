<?php
declare(strict_types=1);
define("HOME_DIR", dirname(__DIR__) . "/");
define("LIBRARY_DIR", HOME_DIR . "library/");

require_once(LIBRARY_DIR . "logger.php");
require_once(LIBRARY_DIR . "validate.php");
require_once(LIBRARY_DIR . "session.php");
require_once(LIBRARY_DIR . "users.php");
require_once(LIBRARY_DIR . "auth.php");
require_once(LIBRARY_DIR . "database_access.php");
Session::start();
?>