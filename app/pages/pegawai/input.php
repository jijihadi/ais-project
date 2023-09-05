<?php

// make input to database based on table employees
include_once '../../../system/config/base.php';

// return all request
$post = $_POST;
// get data from post method
$user['username'] = $post['username_baru'];
$user['password'] = ($post['password_baru'] != '') ? $post['password_baru'] : $user['username'];
$user['password_confirm'] = ($post['confirm_password_baru'] != '') ? $post['confirm_password_baru'] : $user['username'];
$user['name'] = $post['name'];
$user['roles'] = 1;
//
$user['password'] = md5($user['password']);
$user['password_confirm'] = md5($user['password_confirm']);
if ($user['password'] != $user['password_confirm']) {
    setSessionData('alert', [
        'type' => 'danger',
        'message' => 'Password tidak sama',
    ]);
    return header("Location: " . routes('pegawai/add'));
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

// return print_r([$employee, $user]);
if (validate($employee)) {
    $employee['front_title'] = $post['front_title'];
    $employee['user_id'] = insert('users', $user);
    $employee['id'] = insert('employees', $employee);
    // set session to show alert success
    setSessionData('alert', [
        'type' => 'success',
        'message' => 'Data pegawai berhasil ditambahkan',
    ]);
    // return to pegawai page
    return header("Location: " . routes('pegawai'));
}
