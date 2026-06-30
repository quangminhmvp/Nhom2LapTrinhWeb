<?php<?php
/**
 * Profile Model - Lấy và cập nhật thông tin cá nhân của User hiện tại
 */

// Lấy thông tin chi tiết hồ sơ bằng cách JOIN bảng users và employees
function getUserProfile($conn, $userId) {
    $sql = "SELECT u.id, u.username, e.full_name, e.phone_number, d.department_name, p.position_name 
            FROM users u
            LEFT JOIN employees e ON u.id = e.user_id
            LEFT JOIN departments d ON e.department_id = d.id
            LEFT JOIN positions p ON e.position_id = p.id
            WHERE u.id = ?";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Cho phép nhân viên tự cập nhật số điện thoại của mình
function updateProfilePhone($conn, $userId, $phoneNumber) {
    $sql = "UPDATE employees SET phone_number = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $phoneNumber, $userId);
    return $stmt->execute();
}
