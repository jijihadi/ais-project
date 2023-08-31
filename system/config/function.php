<?php
$rootpath = $_SERVER['DOCUMENT_ROOT']."/ais-project";
// get base url of the project
$baseurl = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."/ais-project";

function require_all($dir, $max_scan_depth, $depth=0) {
    if ($depth > $max_scan_depth) {
        return;
    }

    // require all php files
    $scan = glob("$dir/*");
    foreach ($scan as $path) {
        if (preg_match('/\.php$/', $path)) {
            include_once $path;
        }
        elseif (is_dir($path)) {
            require_all($path, $max_scan_depth, $depth+1);
        }
    }
}
?>