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

//View Page
include('view/single.view.php');