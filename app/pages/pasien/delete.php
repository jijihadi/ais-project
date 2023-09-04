<?php

// make input to database based on table patients
include_once '../../../system/config/base.php';

// Retrieve the patient ID from the URL using the getUri() function
$patient_id = getUri(6);

// Retrieve the patient data from the database based on the patient ID
$patient = find('patients', "id = $patient_id");    

// Retrieve the guardian data from the database based on the patient ID
$guardian = find('guardians', "patient_id = $patient_id");

// Check if the patient and guardian data exist before attempting to delete them
if ($patient && $guardian) {
    // Delete the patient and guardian data from the database
    delete('guardians', "patient_id = $patient_id");
    delete('patients', "id = $patient_id");
} else {
    // Handle the case where the data does not exist
    setSessionData('alert', [
        'type' => 'error',
        'message' => 'Data pasien atau wali tidak ditemukan'
    ]);
}

// Set the session variable to store a success message
setSessionData('alert', [
    'type' => 'success',
    'message' => 'Data pasien berhasil dihapus'
]);

// Redirect the user to the "pasien" page
return header("Location: ".routes('pasien'));