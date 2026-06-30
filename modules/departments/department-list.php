<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="slide-title">Quản lý Phòng ban</h2>
        <a href="department-create.php" class="btn btn-primary">
            <i class="fa-solid fa-plus me-2"></i>Thêm mới
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Tên phòng ban</th>
                            <th>Mô tả</th>
                            <th>Ngày tạo</th>
                            <th class="text-end">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="fw-bold">Phòng Kỹ thuật</td>
                            <td>Phát triển phần mềm và bảo trì hệ thống</td>
                            <td>27/06/2026</td>
                            <td class="text-end">
                                <a href="department-edit.php?id=1" class="btn btn-sm btn-outline-secondary me-1">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>