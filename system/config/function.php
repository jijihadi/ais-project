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
// set session 
function setSessionData($key, $value){
    $_SESSION[$key] = $value;
}
// get session
function getSessionData($key){
    return $_SESSION[$key];
}   
// get uri based on index
function getUri($index){
    $uri = explode("/", $_SERVER['REQUEST_URI']);
    if(isset($uri[$index])){
        $uri[$index] = str_replace(".php", "", $uri[$index]);
        return $uri[$index];
    }
    return null; // or any default value
}
// make function generateRandomString
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; ++$i) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
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
function isSelected($param, $value){
    if($param == $value){
        return "selected";
    }
    return "";
}
// make fucntion need hidden
function needHidden($param, $value){

    if($param === $value){
        return 'd-none';
    }
    return '';
}
// make function is value in array
function inArray($value, $array) {
    return in_array($value, $array);
}
// make function to unset array based on index vlaue
function cleanseArray($array, $index, $value){
    foreach ($array as $key => $arr) {
        if ($arr[$index] === $value) {
            print_r([$array, $key, $value]);
            unset($array[$key]);
        }
    }
}

// text helper
function toTitle($string){
    return ucwords(strtolower($string));
}
function toPlainText($string){
    return strip_tags($string);
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
function toDbDate($string)
{
    return date('Y-m-d', strtotime($string));
}

function toShorten($text, $count)
{
    if (!is_string($text)) {
        return $text;
    }
    
    if (!is_int($count) || $count <= 0) {
        return $text;
    }
    
    $text = trim($text);
    
    $words = explode(" ", $text);
    if ($count >= count($words)) {
        return $text;
    }
    $words[$count - 1] = "...";
    $shortenedText = implode(" ", array_slice($words, 0, $count));
    return $shortenedText;
}
?>