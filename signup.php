<?php
//Database connection
require('db.con.php');

//Form validation
if (isset($_POST['submit'])) {
    $fname = trim(htmlentities($_POST['fname']));
    $lname = trim(htmlentities($_POST['lname']));
    $email = trim(htmlentities($_POST['email']));
    $password = trim(htmlentities($_POST['password']));
    $encPassword = md5($password);
    $image = $_FILES['image'];

    //image upload
    $image_ex = explode('.', $image['name']);
    $image_type = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

    //validation
    $error = [];
    if (empty($fname)) {
        $error['fnameError'] = 'Please enter your first name';
    }
    if (empty($lname)) {
        $error['lnameError'] = 'Please enter your last name';
    }
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
    $image_name = NULL;
    if ($image['name']) {
        if (!in_array((strtolower(end($image_ex))), $image_type)) {
            $error['imageError'] = 'Invalid image';
        } elseif ($image['size'] > 5242880) {
            $error['imageError'] = 'Max image size 5mb supported';
        } else {
            $image_name = uniqid() . '.' . strtolower(end($image_ex));
            move_uploaded_file($image['tmp_name'], 'upload/profile/' . $image_name);
        }
    }
    if ($error == []) {
        $query = "INSERT INTO users(fname, lname, email, password, photo) VALUES('$fname','$lname','$email','$encPassword','$image_name')";
        $result = mysqli_query($connect, $query);
        if ($result) {
            $success = 'Sing Up Successfully Done.';
        }
    }
}

//View page
require('view/signup.view.php');