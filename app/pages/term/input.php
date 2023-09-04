<?php

// make input to database based on table terms
include_once '../../../system/config/base.php';

// return all request
$post = $_POST;
// get data from post method
$term['head'] = $post['head'];
$term['content'] = $post['content'];
$term['inputby'] = $session['user']['name'];


// insert data to database but validate first
if(validate($term)){
    $term['verification'] = $post['verification'];
    // input data to table terms using mysqli function
    insert('terms', $term);
    // set session to show alert success
    setSessionData('alert', [
        'type' => 'success',
        'message' => 'Data term berhasil ditambahkan'
    ]);
    // return to term page
    return header("Location: ".routes('term'));
}
