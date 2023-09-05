<?php
$rootpath = $_SERVER['DOCUMENT_ROOT']."/ais-project";

include "$rootpath/system/config/base.php";
// get data pasien and wali 
$id = $_POST['id'];
$patients = find('patients', 'medical_record='.$id);
if (empty($patients)) {
    echo json_encode(['status' => 'failed']);
    return 0;
}
$guardians = find('guardians', "patient_id = $patients[id]");
// make array to be json
$data = [
    'nama_pasien' => $patients['name'],
    'jenis_kelamin' => $patients['sex'],
    'tempat_lahir' => $patients['birthplace'],
    'tanggal_lahir' => $patients['birthdate'],
    'no_telp_pasien' => $patients['phone'],
    'alamat_pasien' => $patients['address'],
    'nama_wali' => $guardians['name'],
    'alamat_wali' => $guardians['address'],
    'no_telp_wali' => $guardians['phone'],
    'hubungan_wali' => $guardians['relation'],
    'alamat_wali' => $guardians['address'],
];
echo json_encode($data);
return 1;