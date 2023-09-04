<?php

// make input to database based on table terms
include_once '../../../system/config/base.php';

// return all request
$post = $_POST;
// get data from post method
$term['head'] = $post['head'];
$term['content'] = $post['content'];
$term['inputby'] = $session['user']['name'];

// update data to database but validate first
if(validate($term)){
    $term['verification'] = $post['verification'];
    // update data to table terms using mysqli function
    update('terms', $term, $post['term_id']);
    // set session to show alert success
    setSessionData('alert', [
        'type' => 'success',
        'message' => 'Data term berhasil diubah'
    ]);
    // return to term page
    return header("Location: ".routes('term'));
}
