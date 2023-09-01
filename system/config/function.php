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
// cek login
function isLogin(){
    if(!isset($_SESSION['user'])){
        header("Location: ".routes('login'));
    }
}
// get uri based on index
function getUri($index){
    $uri = explode("/", $_SERVER['REQUEST_URI']);
    if(isset($uri[$index])){
        return $uri[$index];
    }
    return null; // or any default value
}
// view helper
function isActive($param){
    // make function to get current url and check if in those url contain param
    $current_url = $_SERVER['REQUEST_URI'];
    if(strpos($current_url, $param) !== false){
        return "active";
    }
    return "";
}
// text helper
function toTitle($string){
    return ucwords(strtolower($string));
}

function toIndoDate($date)
{
    $date = date('Y-m-d', strtotime($date));
    $BulanIndo = array("Januari", "Februari", "Maret",
        "April", "Mei", "Juni",
        "Juli", "Agustus", "September",
        "Oktober", "November", "Desember");
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl = substr($date, 8, 2);
    $result = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
    return ($result);
}

function toIndoMonth($month)
{
    $BulanIndo = array("Januari", "Februari", "Maret",
        "April", "Mei", "Juni",
        "Juli", "Agustus", "September",
        "Oktober", "November", "Desember");
    $bulan = $month;
    $result = $BulanIndo[(int) $bulan - 1];
    return ($result);
}

function toShorten($text, $count)
{
    $text = strip_tags($text);
    if (strlen($text) > $count) {
        $text = substr($text, 0, $count);
        $text = substr($text, 0, strrpos($text, " "));
        $etc = " ...";
        $text = $text . $etc;
    }
    return $text;
}

?>