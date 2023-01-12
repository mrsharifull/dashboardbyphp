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
$imgQuery = "SELECT photo FROM users WHERE id = $id";
$imageResult = mysqli_query($connect, $imgQuery);
if (mysqli_num_rows($imageResult) > 0) {
    $data = mysqli_fetch_assoc($imageResult);
}
$file_path = "upload/profile/" . $data['photo'];
if (file_exists($file_path)) {
    unlink($file_path);
}

//Delete query
$query = "DELETE FROM users WHERE id = $id";
$result = mysqli_query($connect, $query);
if ($result) {
    $success = 'Data Deleted Successfully';
    header("location:users.php?success=" . base64_encode($success));
}