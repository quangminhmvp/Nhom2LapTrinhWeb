<?php
/**
 * Position Model - Tương tác database cho chức vụ
 * Tuân thủ Quy ước 4 (Verb + Object) & Quy ước 11 (Prepared Statement)
 */

// Lấy danh sách tất cả chức vụ
function getAllPositions($conn) {
    $sql = "SELECT * FROM positions ORDER BY id DESC";
    $result = $conn->query($sql);
    
    $positions = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $positions[] = $row;
        }
    }
    return $positions;
}

// Thêm mới chức vụ
function createPosition($conn, $positionName, $baseSalaryCoefficient, $description) {
    $sql = "INSERT INTO positions (position_name, base_salary_coefficient, description) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sds", $positionName, $baseSalaryCoefficient, $description);
    return $stmt->execute();
}

// Kiểm tra trùng tên chức vụ
function isPositionNameExists($conn, $positionName) {
    $sql = "SELECT id FROM positions WHERE position_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $positionName);
    $stmt->execute();
    return $stmt->get_result()->num_rows > 0;
}