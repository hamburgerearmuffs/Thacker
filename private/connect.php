<?php
session_start();
define("APP_ROOT", dirname(dirname(__FILE__)));
define("PRIVATE_PATH", APP_ROOT . "/private");


require_once(PRIVATE_PATH . "/database/dbconnect.php");
require_once(PRIVATE_PATH . "/functions/cog.php");
require_once(PRIVATE_PATH . "/functions/access-function.php");
require_once(PRIVATE_PATH . "/functions/sms-function.php");
require_once(PRIVATE_PATH . "/functions/phone-function.php");
require_once(PRIVATE_PATH . "/functions/password-function.php");

?>