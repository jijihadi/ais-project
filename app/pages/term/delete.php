<?php

// make input to database based on table terms
include_once '../../../system/config/base.php';

// Retrieve the term ID from the URL using the getUri() function
$term_id = getUri(6);

// Retrieve the term data from the database based on the term ID
$term = find('terms', "id = $term_id");    

// Check if the term and guardian data exist before attempting to delete them
if ($term) {
    // Delete the term and guardian data from the database
    delete('terms', "id = $term_id");
} else {
    // Handle the case where the data does not exist
    setSessionData('alert', [
        'type' => 'error',
        'message' => 'Data term atau wali tidak ditemukan'
    ]);
}

// Set the session variable to store a success message
setSessionData('alert', [
    'type' => 'success',
    'message' => 'Data term berhasil dihapus'
]);

// Redirect the user to the "term" page
return header("Location: ".routes('term'));