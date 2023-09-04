<?php

// make input to database based on table forms
include_once '../../../../system/config/base.php';

// return all request
$post = $_POST;

// put data to session first if session exist
if (isset($_SESSION['form'])) {
    $post = array_merge($_SESSION['form'], $post);
}
// put data to session

$signpasien = explode(",", $post['signed-pasien'])[1];
$decodedpasien = base64_decode($signpasien);
$filenamepasien = $_SESSION['form']['medical_record'] . "-signature-pasien-" . date("Y-m-d-H-i-s") . ".png";
$pathpasien = $rootpath . "/assets/images/signatures/" . $filenamepasien;
file_put_contents($pathpasien, $decodedpasien);
// set data for signwali
$signwali = explode(",", $post['signed-wali'])[1];
$decodedwali = base64_decode($signwali);
$filenamewali = $_SESSION['form']['medical_record'] . "-signature-wali-" . date("Y-m-d-H-i-s") . ".png";
$pathwali = $rootpath . "/assets/images/signatures/" . $filenamewali;
file_put_contents($pathwali, $decodedwali);
// set data for signpetugas
$signpetugas = explode(",", $post['signed-petugas'])[1];
$decodedpetugas = base64_decode($signpetugas);
$filenamepetugas = $_SESSION['form']['medical_record'] . "-signature-petugas-" . date("Y-m-d-H-i-s") . ".png";
$pathpetugas = $rootpath . "/assets/images/signatures/" . $filenamepetugas;
file_put_contents($pathpetugas, $decodedpetugas);

// set filepath to session
$post['signed-pasien'] = $filenamepasien;
$post['signed-wali'] = $filenamewali;
$post['signed-petugas'] = $filenamepetugas;
// set session pa
setSessionData('form', $post);
$datasession = getSessionData('form');

// Start form here
// if medical record is not exist input the patient data and guardian data then get the id
$medical_record = find('patients', 'medical_record="' . $datasession['medical_record'] . '"');
if (empty($medical_record)) {
    $patient['medical_record'] = $datasession['medical_record'];
    $patient['name'] = $datasession['name'];
    $patient['sex'] = $datasession['sex'];
    $patient['birthplace'] = $datasession['birthplace'];
    $patient['birthdate'] = $datasession['birthdate'];
    $patient['address'] = $datasession['address'];
    $patient['phone'] = $datasession['phone'];
    //
    $guardian['relation'] = $datasession['relation'];
    $guardian['name'] = $datasession['guardian_name'];
    $guardian['phone'] = $datasession['guardian_phone'];
    $guardian['address'] = $datasession['guardian_address'];

    // input data to table patients using mysqli function
    $patient_id = insert('patients', $patient);
    $guardian['patient_id'] = $patient_id;
    $guardian_id = insert('guardians', $guardian);

    // set session patient_id and guardian_id
    $_SESSION['form']['patient_id'] = $patient_id;
    $_SESSION['form']['guardian_id'] = $guardian_id;
}else{
    // get guardian data based on patient data
    $guardian = find('guardians', 'patient_id="' . $medical_record['id'] . '"');
    // set session patient_id and guardian_id
    $_SESSION['form']['patient_id'] = $medical_record['id'];
    $_SESSION['form']['guardian_id'] = $guardian['id'];
    
}
// get form data from db using token
$form_id = find('forms', 'token="' . getUri(7) . '"');
// set form data
$form['form_id'] = $form_id['id'];
$form['verification'] = $_SESSION['form']['verification'];
$form['patient_id'] = $_SESSION['form']['patient_id'];
$form['guardian_id'] = $_SESSION['form']['guardian_id'];
$form['employee_id'] = $_SESSION['form']['employee_id'];
$form['patient_sign'] = $_SESSION['form']['signed-pasien'];
$form['guardian_sign'] = $_SESSION['form']['signed-wali'];
$form['employee_sign'] = $_SESSION['form']['signed-petugas'];
$form['inputdate'] = date("Y-m-d H:i:s");
$form['inputby'] = $_SESSION['user']['id'];
$form['content'] = json_encode($_SESSION['form']);

if (validate($form)) {
    // input data to table forms using mysqli function
    $form['id'] = insert('consents', $form);
    // set session to show alert success
    setSessionData('alert', [
        'type' => 'success',
        'message' => 'Data Form berhasil ditambahkan',
    ]);
    // return to Form page
    return header("Location: " . routes('form/done'));
}
// return header("Location: ".routes('form/fill/4', getUri(7)));
