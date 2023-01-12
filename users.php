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

$query = "SELECT id, fname, lname, email, photo, status FROM users ORDER BY id DESC";
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_all($result, true);
}

//View page
include('view/users.view.php');