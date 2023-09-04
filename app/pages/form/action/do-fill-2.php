<?php

// make input to database based on table forms
include_once '../../../../system/config/base.php';

// return all request
$post = $_POST;
// put data to session first if session exist 
if(isset($_SESSION['form'])){
    $post = array_merge($_SESSION['form'], $post);
}
// put data to session
setSessionData('form', $post);
// show data from session

return header("Location: ".routes('form/fill/3', getUri(7)));
