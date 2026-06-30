<?php
/**
 * Department Model - Chứa các hàm tương tác database cho phòng ban
 * Tuân thủ Quy ước 4 (Tên hàm Verb + Object) & Quy ước 11 (Prepared Statement)
 */

// Lấy danh sách toàn bộ phòng ban (Read)
function getAllDepartments($conn) {
    $sql = "SELECT * FROM departments ORDER BY id DESC";
    $result = $conn->query($sql);
    
    $departments = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $departments[] = $row;
        }
    }
    return $departments;
}

// Lấy thông tin 1 phòng ban theo ID (Read)
function getDepartmentById($conn, $id) {
    $sql = "SELECT * FROM departments WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Thêm mới phòng ban (Create)
function createDepartment($conn, $departmentName, $description) {
    $sql = "INSERT INTO departments (department_name, description) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $departmentName, $description);
    return $stmt->execute();
}

// Kiểm tra trùng tên phòng ban (Validation helper)
function isDepartmentNameExists($conn, $departmentName, $excludeId = null) {
    if ($excludeId) {
        $sql = "SELECT id FROM departments WHERE department_name = ? AND id != ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $departmentName, $excludeId);
    } else {
        $sql = "SELECT id FROM departments WHERE department_name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $departmentName);
    }
    $stmt->execute();
    return $stmt->get_result()->num_rows > 0;
}