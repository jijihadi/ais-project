<?php
include_once '../../../system/view/header.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {

        // get user data
        $user = mysqli_fetch_assoc($result);
        // set session
        setSessionData('user', [
            'id' => $user['id'],
            'username' => $user['username'],
            'name' => $user['name'],
            'role' => $user['role'],
        ]);
        header("location: $baseurl/app/pages/dashboard/index.php");
    } else {
        // return with session error message error
        $_SESSION['error'] = ['login'=> "Username or password is incorrect"];
        header("location: $baseurl/app/pages/login/index.php");
    }
}
?>