<?php

// make input to database based on table patients
include_once '../../../system/config/base.php';

// return all request
$post = $_POST;
// get data from post method
$patient['medical_record'] = $post['medical_record'];
$patient['name'] = $post['name'];
$patient['sex'] = $post['sex'];
$patient['birthplace'] = $post['birthplace'];
$patient['birthdate'] = $post['birthdate'];
$patient['address'] = $post['address'];
$patient['phone'] = $post['phone'];
// 
$guardian['relation'] = $post['relation'];
$guardian['name'] = $post['guardian_name'];
$guardian['phone'] = $post['guardian_phone'];
$guardian['address'] = $post['guardian_address'];

// insert data to database but validate first
if(validate($patient)){
    // input data to table patients using mysqli function
    $patient['id'] = insert('patients', $patient);
    $guardian['patient_id'] = $patient['id'];
    insert('guardians', $guardian);
    // set session to show alert success
    setSessionData('alert', [
        'type' => 'success',
        'message' => 'Data pasien berhasil ditambahkan'
    ]);
    // return to pasien page
    return header("Location: ".routes('pasien'));
}
