<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB_NAME', 'batch_2205');

$connect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);
if (!$connect) {
    die('Database connection failed' . mysqli_connect_error());
}