<?php
session_start();
define("USE_BASE_PATH", 1);
define("ROOT", dirname(__FILE__));
USE_BASE_PATH ? define("BP", "/" . basename(getcwd())) : "";
define("DS", DIRECTORY_SEPARATOR);
include ROOT . DS . '/app/bootstrap.php';
