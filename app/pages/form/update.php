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

// update data to database but validate first
if(validate($form)){
    // update data to table forms using mysqli function
    update('forms', $form, $post['form_id']);
    // set session to show alert success
    setSessionData('alert', [
        'type' => 'success',
        'message' => 'Data Form berhasil diubah'
    ]);
    // return to Form page
    return header("Location: ".routes('form'));
}
