<?php
session_start();
date_default_timezone_set("Asia/Dhaka");
$host = 'localhost';
// $username = 'jkkniu_conference_user';
$username = 'root';
// $password = 'conference_user';
$password = '';
$database = 'jkkniu_conference';
$conn = mysqli_connect($host, $username, $password);
mysqli_select_db($conn, $database);
if (!$conn)
    echo mysqli_connect_error();
return $conn;
