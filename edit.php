<?php
//Session start
session_start();
if (!isset($_SESSION['user'])) {
    header('Location:login.php');
}
//Set cookie
if (!isset($_COOKIE['user_cookie'])) {
    header('Location:logout.php');
}

//Database connection
require('db.con.php');

//Get id by url
$id = base64_decode($_GET['id']);
if (!(int)$id) {
    header('location:users.php');
}

//Select query
$query = "SELECT id, fname, lname, email, photo FROM users WHERE id = $id";
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
}

//Update query
//Form validation
if (isset($_POST['submit'])) {
    $fname = trim(htmlentities($_POST['fname']));
    $lname = trim(htmlentities($_POST['lname']));
    $email = trim(htmlentities($_POST['email']));
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
    $image_name = NULL;
    if ($image['name']) {
        if (!in_array((strtolower(end($image_ex))), $image_type)) {
            $error['imageError'] = 'Invalid image';
        } elseif ($image['size'] > 5242880) {
            $error['imageError'] = 'Max image size 5mb supported';
        } else {
            $image_name = uniqid() . '.' . strtolower(end($image_ex));
            $file_path = "upload/profile/" . $data['photo'];
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            move_uploaded_file($image['tmp_name'], 'upload/profile/' . $image_name);
        }
    } else {
        $image_name = $data['photo'];
    }
    if ($error == []) {
        $updateQuery = "UPDATE users SET fname='$fname',lname='$lname',email='$email',photo='$image_name' WHERE id = $id";
        $result = mysqli_query($connect, $updateQuery);
        if ($result) {
            $success = 'Data Updated';
            header("location:users.php?success=" . base64_encode($success));
        }
    }
}




//View Page
include('view/edit.view.php');