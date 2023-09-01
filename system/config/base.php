<?php
// load function.php
include 'function.php';
include 'helper.php';

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

function routes($param = null)
{
    $baseurl = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . "/ais-project";
    $routes = [
        'login' => '/app/pages/login/index.php',
        'logout' => '/app/pages/login/do-logout.php',
        'dashboard' => '/app/pages/dashboard/index.php',
        'pasien' => '/app/pages/pasien/index.php',
        'form' => '/app/pages/form/index.php',
        'submit' => '/app/pages/form/submit.php',
        'pegawai' => '/app/pages/pegawai/index.php',
        'consent' => '/app/pages/consent/index.php',
    ];
    return $baseurl . ($routes[$param] ?? '');
}