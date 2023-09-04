<?php

// make input to database based on table forms
include_once '../../../system/config/base.php';

// Retrieve the form ID from the URL using the getUri() function
$form_id = getUri(6);

// Retrieve the form data from the database based on the form ID
$form = find('forms', "id = $form_id");    

// Retrieve the guardian data from the database based on the form ID
$guardian = find('guardians', "form_id = $form_id");

// Check if the form and guardian data exist before attempting to delete them
if ($form && $guardian) {
    // Delete the form and guardian data from the database
    delete('guardians', "form_id = $form_id");
    delete('forms', "id = $form_id");
} else {
    // Handle the case where the data does not exist
    setSessionData('alert', [
        'type' => 'error',
        'message' => 'Data Form atau wali tidak ditemukan'
    ]);
}

// Set the session variable to store a success message
setSessionData('alert', [
    'type' => 'success',
    'message' => 'Data Form berhasil dihapus'
]);

// Redirect the user to the "Form" page
return header("Location: ".routes('form'));