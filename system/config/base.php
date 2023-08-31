<?php
// load function.php
include_once 'function.php';
include_once 'helper.php';

// require_all("$rootpath/system/server", 255);
include_once $rootpath . '/system/server/session.php';
include_once $rootpath . '/system/server/routes.php';
include_once $rootpath . '/system/server/db.php';

$session = $_SESSION;
$post = $_POST;
$get = $_GET;
$files = $_FILES;
$server = $_SERVER;
$request = $_REQUEST;
$cookie = $_COOKIE;
$files = $_FILES;
$env = $_ENV;
$globals = $GLOBALS;
?>