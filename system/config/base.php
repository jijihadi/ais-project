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

// made function routes that also catch parameter
function routes($param = null, $id=null)
{
    $baseurl = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . "/ais-project";
    $routes = [
        // Login
        'login' => '/app/pages/login/index.php',
        'logout' => '/app/pages/login/do-logout.php',
        // Dashboard
        'dashboard' => '/app/pages/dashboard/index.php',
        // Pasien
        'pasien' => '/app/pages/pasien/index.php',
        'pasien/add' => '/app/pages/pasien/add.php',
        'pasien/input' => '/app/pages/pasien/input.php',
        'pasien/edit' => '/app/pages/pasien/edit.php',
        'pasien/update' => '/app/pages/pasien/update.php',
        'pasien/delete' => '/app/pages/pasien/delete.php',
        // Form
        'form' => '/app/pages/form/index.php',
        'form/fill' => '/app/pages/form/fill/1.php',
        'form/fill/2' => '/app/pages/form/fill/2.php',
        'form/fill/3' => '/app/pages/form/fill/3.php',
        'form/fill/4' => '/app/pages/form/fill/4.php',
        'form/do-fill-1' => '/app/pages/form/action/do-fill-1.php',
        'form/do-fill-2' => '/app/pages/form/action/do-fill-2.php',
        'form/do-fill-3' => '/app/pages/form/action/do-fill-3.php',
        'form/do-fill-4' => '/app/pages/form/action/do-fill-4.php',
        'form/done' => '/app/pages/form/done.php',
        'form/add' => '/app/pages/form/add.php',
        'form/input' => '/app/pages/form/input.php',
        'form/edit' => '/app/pages/form/edit.php',
        'form/update' => '/app/pages/form/update.php',
        'form/delete' => '/app/pages/form/delete.php',
        // Submission
        'submit' => '/app/pages/form/submit.php',
        // Pegawai
        'pegawai' => '/app/pages/pegawai/index.php',
        // Consent
        'term' => '/app/pages/term/index.php',
        'term/add' => '/app/pages/term/add.php',
        'term/input' => '/app/pages/term/input.php',
        'term/edit' => '/app/pages/term/edit.php',
        'term/update' => '/app/pages/term/update.php',
        'term/delete' => '/app/pages/term/delete.php',
    ];
    return $baseurl . ($routes[$param] ."/". $id  ?? '');
}