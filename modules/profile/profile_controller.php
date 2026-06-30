<?php
/**
 * Profile Controller
 */

if (!isset($_SESSION["user_id"])) {
    header("Location: ../../login.php");
    exit();
}

require_once "profile-model.php";

function handleUpdateProfile($conn, $userId) {
    $errors = [];
    
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "update_profile") {
        $phoneNumber = trim($_POST["phone_number"] ?? "");

        // Validation số điện thoại cơ bản
        if (empty($phoneNumber)) {
            $errors["phone_number"] = "Số điện thoại không được để trống.";
        } elseif (!preg_match('/^[0-9]{10}$/', $phoneNumber)) {
            $errors["phone_number"] = "Số điện thoại phải gồm 10 chữ số.";
        }

        if (empty($errors)) {
            try {
                if (updateProfilePhone($conn, $userId, $phoneNumber)) {
                    header("Location: profile-view.php?status=updated");
                    exit();
                }
            } catch (Exception $e) {
                error_log("Lỗi Update Profile: " . $e->getMessage());
                $errors["system"] = "Không thể cập nhật hồ sơ.";
            }
        }
    }
    
    return $errors;
}