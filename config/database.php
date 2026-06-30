<?php
// config/database.php

// Cấu hình biến kết nối (Camel Case theo Quy ước 3)
$dbHost = 'localhost';
$dbName = 'hrms_db';
$dbUser = 'root';
$dbPass = ''; // XAMPP mặc định mật khẩu trống

try {
    // Kết nối Database bằng PDO an toàn
    $conn = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4", $dbUser, $dbPass);
    
    // Cấu hình xuất lỗi Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    // Quy ước 12: Ghi log lỗi hệ thống và thông báo an toàn ra ngoài
    error_log("Connection failed: " . $e->getMessage());
    die("Đã xảy ra lỗi kết nối cơ sở dữ liệu.");
}
?>
