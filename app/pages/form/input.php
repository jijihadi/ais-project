<?php

// make input to database based on table forms
include_once '../../../system/config/base.php';

// return all request
$post = $_POST;
// get data from post method
$form['name'] = $post['name'];
// make token by generating random string
$form['token'] = generateRandomString(50);
// make content by making object from post content array
$form['content'] = json_encode($post['content']);
// insert data to database but validate first
if(validate($form)){
    // input data to table forms using mysqli function
    $form['id'] = insert('forms', $form);
    // set session to show alert success
    setSessionData('alert', [
        'type' => 'success',
        'message' => 'Data Form berhasil ditambahkan'
    ]);
    // return to Form page
    return header("Location: ".routes('form'));
}
