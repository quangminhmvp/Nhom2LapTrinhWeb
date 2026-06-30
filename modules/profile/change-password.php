<?php
/**
 * Change Password
 */

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/session.php';
require_once __DIR__ . '/../../middleware/auth.middleware.php';

require_once __DIR__ . '/profile_controller.php';

$controller = new ProfileController($conn);

// Khi nhấn đổi mật khẩu
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $newPassword = trim($_POST['new_password']);
    $confirmPassword = trim($_POST['confirm_password']);

    if (empty($newPassword) || empty($confirmPassword)) {

        $_SESSION['error'] = "Vui lòng nhập đầy đủ thông tin.";

    } elseif ($newPassword != $confirmPassword) {

        $_SESSION['error'] = "Xác nhận mật khẩu không khớp.";

    } else {

        $_POST['new_password'] = $newPassword;

        $controller->changePassword();
    }
}

include __DIR__ . '/../../includes/header.php';
include __DIR__ . '/../../includes/sidebar.php';
?>

<div class="container-fluid mt-4">

    <div class="card shadow">

        <div class="card-header bg-warning">

            <h4 class="mb-0">

                <i class="bi bi-key-fill"></i>

                Đổi mật khẩu

            </h4>

        </div>

        <div class="card-body">

            <?php if(isset($_SESSION['error'])): ?>

                <div class="alert alert-danger">

                    <?= $_SESSION['error']; ?>

                </div>

                <?php unset($_SESSION['error']); ?>

            <?php endif; ?>

            <form method="POST">

                <div class="mb-3">

                    <label class="form-label">

                        Mật khẩu mới

                    </label>

                    <input
                        type="password"
                        name="new_password"
                        class="form-control"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Xác nhận mật khẩu

                    </label>

                    <input
                        type="password"
                        name="confirm_password"
                        class="form-control"
                        required>

                </div>

                <button
                    type="submit"
                    class="btn btn-warning">

                    <i class="bi bi-check-circle"></i>

                    Đổi mật khẩu

                </button>

                <a
                    href="profile.php"
                    class="btn btn-secondary">

                    Quay lại

                </a>

            </form>

        </div>

    </div>
                    
</div>

<?php
include __DIR__ . '/../../includes/footer.php';
?>