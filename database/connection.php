<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'jkkniu_conference';
$conn = mysqli_connect($host, $username, $password);
mysqli_select_db($conn, $database);
if (!$conn)
    echo mysqli_connect_error();
return $conn;
