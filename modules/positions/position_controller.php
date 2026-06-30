<?php
/**
 * Position Controller - Xử lý nghiệp vụ Chức vụ
 * Tuân thủ Quy ước 9 (Validation) và Quy ước 12 (Error log)
 */

if (!isset($_SESSION["user_id"])) {
    header("Location: ../../login.php");
    exit();
}

require_once "position-model.php";

function handleCreatePosition($conn) {
    $errors = [];
    $positionName = "";
    $baseSalaryCoefficient = 1.00;
    $description = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "create_position") {
        $positionName = trim($_POST["position_name"] ?? "");
        $baseSalaryCoefficient = floatval($_POST["base_salary_coefficient"] ?? 1.00);
        $description = trim($_POST["description"] ?? "");

        // Validation (Quy ước 9)
        if (empty($positionName)) {
            $errors["position_name"] = "Tên chức vụ không được để trống.";
        } elseif (isPositionNameExists($conn, $positionName)) {
            $errors["position_name"] = "Tên chức vụ này đã tồn tại.";
        }

        if ($baseSalaryCoefficient <= 0) {
            $errors["base_salary_coefficient"] = "Hệ số lương phải lớn hơn 0.";
        }

        if (empty($errors)) {
            try {
                if (createPosition($conn, $positionName, $baseSalaryCoefficient, $description)) {
                    header("Location: position-list.php?status=success");
                    exit();
                }
            } catch (Exception $e) {
                error_log("Lỗi Create Position: " . $e->getMessage());
                $errors["system"] = "Đã xảy ra lỗi hệ thống.";
            }
        }
    }

    return [
        'errors' => $errors,
        'data' => ['position_name' => $positionName, 'base_salary_coefficient' => $baseSalaryCoefficient, 'description' => $description]
    ];
}