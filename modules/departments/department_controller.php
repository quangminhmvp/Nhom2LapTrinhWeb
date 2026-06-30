<?php
/**
 * Department Controller - Điều hướng và xử lý logic nghiệp vụ
 * Tuân thủ Quy ước 11 (Session), Quy ước 9 (Validation) và Quy ước 12 (Error log)
 */

// Kiểm tra session đăng nhập (Thường TV1 sẽ thiết lập cái này trong file cấu hình chung)
if (!isset($_SESSION["user_id"])) {
    header("Location: ../../login.php");
    exit();
}

// Import model vào để sử dụng các hàm DB
require_once "department-model.php";

// 1. XỬ LÝ LOGIC CHO TÍNH NĂNG "THÊM MỚI" (Create)
function handleCreateDepartment($conn) {
    $errors = [];
    $departmentName = "";
    $description = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "create") {
        $departmentName = trim($_POST["department_name"] ?? "");
        $description = trim($_POST["description"] ?? "");

        // Quy ước 9: Validation
        if (empty($departmentName)) {
            $errors["department_name"] = "Tên phòng ban không được để trống.";
        } elseif (strlen($departmentName) > 100) {
            $errors["department_name"] = "Tên phòng ban không được vượt quá 100 ký tự.";
        } elseif (isDepartmentNameExists($conn, $departmentName)) {
            $errors["department_name"] = "Tên phòng ban này đã tồn tại.";
        }

        // Nếu không có lỗi, tiến hành lưu database
        if (empty($errors)) {
            try {
                if (createDepartment($conn, $departmentName, $description)) {
                    // Chuyển hướng về trang danh sách với thông báo thành công
                    header("Location: department-list.php?status=success&msg=create");
                    exit();
                }
            } catch (Exception $e) {
                // Quy ước 12: Ghi log hệ thống ẩn, không hiển thị cho user
                error_log("Lỗi Create Department: " . $e->getMessage());
                $errors["system"] = "Đã xảy ra lỗi hệ thống. Vui lòng thử lại sau.";
            }
        }
    }
    
    // Trả về dữ liệu và lỗi (nếu có) để giao diện hiển thị
    return [
        'errors' => $errors,
        'data' => ['department_name' => $departmentName, 'description' => $description]
    ];
}