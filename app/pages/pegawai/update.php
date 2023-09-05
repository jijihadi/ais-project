<?php

// make input to database based on table employees
include_once '../../../system/config/base.php';

// return all request
$post = $_POST;
// get data from post method
$user['username'] = $post['username_lama'];
$user['password'] = ($post['password_baru'] == '') ? $post['password_lama'] : md5($post['password_baru']);
$user['password_confirm'] = ($post['confirm_password_baru'] == '') ? $post['password_lama'] : md5($post['confirm_password_baru']);
$user['name'] = $post['name'];
$user['roles'] = 1;


if ($user['password'] != $user['password_confirm']) {
    setSessionData('alert', [
        'type' => 'danger',
        'message' => 'Password tidak sama',
    ]);
    return header("Location: " . routes('pegawai/edit', $post['employee_id'])); 
}
unset($user['password_confirm']);
// get data from post method
$employee['employee_number'] = $post['employee_number'];
$employee['name'] = $post['name'];
$employee['back_title'] = $post['back_title'];
$employee['join_date'] = toDbDate($post['join_date']);
$employee['position'] = $post['position'];
$employee['phone'] = $post['phone'];
$employee['email'] = $post['email'];

// update data to database but validate first
if(validate($employee)){
    // update data to table employees using mysqli function
    update('employees', $employee, $post['employee_id']);
    update('users', $user, $post['user_id']);
    // set session to show alert success
    setSessionData('alert', [
        'type' => 'success',
        'message' => 'Data pegawai berhasil diubah'
    ]);
    // return to pegawai page
    return header("Location: ".routes('pegawai'));
}
