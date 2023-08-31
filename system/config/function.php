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
            require_once $path;
        }
        elseif (is_dir($path)) {
            require_all($path, $max_scan_depth, $depth+1);
        }
    }
}

// make function to get all css and scss files
function require_css($dir, $max_scan_depth, $depth=0) {
    if ($depth > $max_scan_depth) {
        return;
    }

    // require all php files
    $scan = glob("$dir/*");
    foreach ($scan as $path) {
        if (preg_match('/\.css$/', $path)) {
            echo "<link rel='stylesheet' href='$path'>";
        }
        // elseif (preg_match('/\.scss$/', $path)) {
        //     echo "<link rel='stylesheet' href='$path'>";
        // }
        elseif (is_dir($path)) {
            require_css($path, $max_scan_depth, $depth+1);
        }
    }
}
// make function to get all js files
function require_js($dir, $max_scan_depth, $depth=0) {
    if ($depth > $max_scan_depth) {
        return;
    }

    // require all php files
    $scan = glob("$dir/*");
    foreach ($scan as $path) {
        if (preg_match('/\.js$/', $path)) {
            echo "<script src='$path'></script>";
        }
        elseif (is_dir($path)) {
            require_js($path, $max_scan_depth, $depth+1);
        }
    }
}
?>