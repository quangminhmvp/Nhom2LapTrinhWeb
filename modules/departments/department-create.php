<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Thêm Phòng Ban Mới</h5>
                </div>
                <div class="card-body p-4">
                    <form action="department-create.php" method="POST">
                        <input type="hidden" name="action" value="create">
                        
                        <div class="mb-3">
                            <label for="department-name" class="form-label">Tên phòng ban</label>
                            <input 
                                id="department-name" 
                                class="form-control" 
                                name="department_name" 
                                type="text" 
                                placeholder="Nhập tên phòng ban..."
                                required>
                            <span class="text-danger small d-none">Tên phòng ban không được để trống</span>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả</label>
                            <textarea 
                                id="description" 
                                class="form-control" 
                                name="description" 
                                rows="4"
                                placeholder="Nhập mô tả ngắn..."></textarea>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="department-list.php" class="btn btn-light border">Hủy</a>
                            <button type="submit" class="btn btn-primary">Lưu phòng ban</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>