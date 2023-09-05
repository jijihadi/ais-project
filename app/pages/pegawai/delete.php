<?php

// make input to database based on table employees
include_once '../../../system/config/base.php';

// Retrieve the employee ID from the URL using the getUri() function
$employee_id = getUri(6);

// Retrieve the employee data from the database based on the employee ID
$employee = find('employees', "id = $employee_id");    

// Retrieve the guardian data from the database based on the employee ID
$guardian = find('guardians', "employee_id = $employee_id");

// Check if the employee and guardian data exist before attempting to delete them
if ($employee && $guardian) {
    // Delete the employee and guardian data from the database
    delete('guardians', "employee_id = $employee_id");
    delete('employees', "id = $employee_id");
} else {
    // Handle the case where the data does not exist
    setSessionData('alert', [
        'type' => 'error',
        'message' => 'Data pegawai atau wali tidak ditemukan'
    ]);
}

// Set the session variable to store a success message
setSessionData('alert', [
    'type' => 'success',
    'message' => 'Data pegawai berhasil dihapus'
]);

// Redirect the user to the "pegawai" page
return header("Location: ".routes('pegawai'));