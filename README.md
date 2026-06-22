# 💼 Website Quản Lý Nhân Sự (HRMS)

Hệ thống **Website Quản Lý Nhân Sự (Human Resource Management System - HRMS)** được xây dựng nhằm hỗ trợ doanh nghiệp quản lý tập trung các thông tin và nghiệp vụ liên quan đến nhân sự như:

- Quản lý nhân viên
- Quản lý phòng ban
- Quản lý chức vụ
- Chấm công
- Nghỉ phép
- Quản lý lương
- Khen thưởng - Kỷ luật
- Dashboard và thống kê

---

# 📌 Thông tin dự án

| Thuộc tính | Thông tin |
|------------|------------|
| Tên dự án | Website Quản Lý Nhân Sự (HRMS) |
| Môn học | Lập trình Web |
| Công nghệ | PHP, MySQL, HTML5, CSS3, JavaScript, Bootstrap 5 |
| Mô hình | Module-Based MVC Lite |
| Loại dự án | Website quản trị doanh nghiệp |
| Nhóm thực hiện | Nhóm 2 |

---

# 👥 Thành viên thực hiện

| STT | Họ và tên |
|-----|------------|
| 1 | Nguyễn Lê Quốc Anh |
| 2 | Nguyễn Hoàng Thái Kỳ |
| 3 | Nguyễn Quang Minh |
| 4 | Hoàng Thị Anh Thư |
| 5 | Hồ Ngọc Anh Thư |
| 6 | Nghiêm Đình Đạt |

---

# 🎯 Mục tiêu dự án

Xây dựng một hệ thống quản lý nhân sự trên nền tảng Web nhằm:

- Quản lý tập trung thông tin nhân viên.
- Hỗ trợ quản lý chấm công và nghỉ phép.
- Quản lý lương, thưởng và kỷ luật.
- Hỗ trợ tra cứu, thống kê và báo cáo.
- Nâng cao hiệu quả quản lý nhân sự trong doanh nghiệp.

---

# 👨‍💼 Đối tượng sử dụng

## Admin

- Quản lý toàn bộ hệ thống.
- Quản lý tài khoản.
- Quản lý nhân viên.
- Quản lý phòng ban.
- Quản lý chức vụ.
- Quản lý lương.
- Quản lý thưởng phạt.
- Xem báo cáo và thống kê.

---

## Manager

- Xem nhân viên thuộc phòng ban.
- Theo dõi chấm công.
- Duyệt đơn nghỉ phép.
- Xem báo cáo phòng ban.

---

## Employee

- Quản lý hồ sơ cá nhân.
- Chấm công.
- Gửi đơn nghỉ phép.
- Xem lương.
- Xem lịch sử thưởng phạt.

---

# ✨ Chức năng chính

## 🔐 Hệ thống

- Đăng nhập
- Đăng xuất
- Đổi mật khẩu
- Phân quyền
- Quản lý tài khoản

## 👨‍💼 Quản lý nhân sự

- Quản lý nhân viên
- Upload ảnh nhân viên
- Hồ sơ cá nhân
- Tìm kiếm và lọc dữ liệu

## 🏢 Quản lý tổ chức

- Quản lý phòng ban
- Quản lý chức vụ

## 📅 Quản lý nghiệp vụ

- Chấm công
- Nghỉ phép
- Quản lý lương
- Khen thưởng - Kỷ luật

## 📊 Dashboard và báo cáo

- Dashboard tổng quan
- Biểu đồ thống kê
- Báo cáo nhân sự

---

# 🛠️ Công nghệ sử dụng

## Frontend

- HTML5
- CSS3
- Bootstrap 5
- JavaScript

## Backend

- PHP 8+

## Database

- MySQL

## Công cụ hỗ trợ

- Visual Studio Code
- XAMPP
- phpMyAdmin
- GitHub

---

# 📂 Cấu trúc thư mục dự án

```text
hrms/
│
├── assets/
├── config/
├── database/
├── docs/
├── helpers/
├── includes/
├── middleware/
├── modules/
│   ├── dashboard/
│   ├── users/
│   ├── employees/
│   ├── departments/
│   ├── positions/
│   ├── attendance/
│   ├── leave/
│   ├── salary/
│   ├── reward/
│   ├── profile/
│   └── reports/
│
├── uploads/
├── tests/
│
├── index.php
├── login.php
├── logout.php
└── README.md
```

---

# 🗄️ Cơ sở dữ liệu

Các bảng chính:

- users
- roles
- employees
- departments
- positions
- attendance
- leave_requests
- salaries
- reward_discipline

---

# 🚀 Hướng dẫn cài đặt

## 1. Clone dự án

```bash
git clone https://github.com/athw25/HRMS_WebDevelopment
```

---

## 2. Di chuyển vào thư mục dự án

```bash
cd hrms
```

---

## 3. Tạo cơ sở dữ liệu

```sql
CREATE DATABASE hrms;
```

---

## 4. Import file SQL

```text
database/hrms.sql
```

---

## 5. Cấu hình kết nối Database

Chỉnh sửa file:

```text
config/database.php
```

Ví dụ:

```php
$host = "localhost";
$username = "sa";
$password = "";
$database = "hrms";
```

---

## 6. Chạy dự án

Khởi động:

- Apache
- MySQL

Truy cập:

```text
http://localhost/hrms
```

---

# 📋 Quy chuẩn phát triển

Dự án tuân thủ:

- UI Design Specification
- Database Design Specification
- Coding Convention
- Module Contract Document
- Development Standards

---

# 📌 Phiên bản

```text
Version: 1.0.0
Status: In Development
```

---

# 📄 Giấy phép

Dự án được phát triển phục vụ mục đích học tập môn **Lập trình Web**.

---

# ❤️ Nhóm thực hiện

**Nhóm 2 – Website Quản Lý Nhân Sự (HRMS)**

© 2026 All Rights Reserved.