<?php
//Database connection
require('db.con.php');

//Form validation
if (isset($_POST['login'])) {
    $email = trim(htmlentities($_POST['email']));
    $password = trim(htmlentities($_POST['password']));
    $encPassword = md5($password);

    //validation
    $error = [];
    if (empty($email)) {
        $error['emailError'] = 'Please enter your email';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL)) {
        $error['emailError'] = 'Invalid email address';
    }
    if (empty($password)) {
        $error['passwordError'] = 'Please enter your password';
    } elseif ($password < 8) {
        $error['passwordError'] = 'Min enter 8 character password';
    }
    if ($error == []) {
        // Select query
        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$encPassword'";
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            unset($user['password']);
            if ($user['status'] == 0) {
                $alert = 'Your account was deactive!';
            } else {
                //Session start
                session_start();
                $_SESSION['user'] = $user;
                //Set cookie
                setcookie('user_cookie', 'Login', time() + 60, '/');
                header('location:users.php');
            }
        } else {
            $alert = 'User Not Found!';
        }
    }
}
//View page
include('view/login.view.php');