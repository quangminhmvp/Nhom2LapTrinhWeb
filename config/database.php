<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "hrms";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");