<?php
// config/database.php

$dbHost = "localhost";
$dbName = "hrms_db";
$dbUser = "root";
$dbPass = "";

// Kết nối MySQLi
$conn = new mysqli(
    $dbHost,
    $dbUser,
    $dbPass,
    $dbName
);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Thiết lập UTF-8
$conn->set_charset("utf8mb4");
?>