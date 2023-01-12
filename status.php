<?php
//Session start
session_start();
if (!isset($_SESSION['user'])) {
    header('Location:login.php');
}


//Database connection
require('db.con.php');

//Get id by url
$id = base64_decode($_GET['id']);
if (!(int)$id) {
    header('location:users.php');
}

//Select query
$statusQuery = "SELECT status FROM users WHERE id = $id";
$statusResult = mysqli_query($connect, $statusQuery);
if (mysqli_num_rows($statusResult) > 0) {
    $data = mysqli_fetch_assoc($statusResult);
}
if ($data['status'] == 1) {
    $query = "UPDATE users SET status = 0 WHERE id = $id";
    $result = mysqli_query($connect, $query);
    $success = "User Deactive Successfully";
} else {
    $query = "UPDATE users SET status = 1 WHERE id = $id";
    $result = mysqli_query($connect, $query);
    $success = "User Active Successfully";
}


header("location:users.php?success=" . base64_encode($success));