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

// update data to database but validate first
if(validate($patient)){
    // update data to table patients using mysqli function
    update('patients', $patient, $post['patient_id']);
    update('guardians', $guardian, $post['guardian_id']);
    // set session to show alert success
    setSessionData('alert', [
        'type' => 'success',
        'message' => 'Data pasien berhasil diubah'
    ]);
    // return to pasien page
    return header("Location: ".routes('pasien'));
}
