<?php
session_start();
if (!isset($_SESSION['khachhang'])) {
    header("Location: index.php?banhang=dangnhap&hienthi=dangnhap");
    exit();
}
$kh = $_SESSION['khachhang'];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sửa thông tin tài khoản</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    body {
      background-color: #f8f9fa;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    .container {
      background-color: #ffffff;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.1);
      max-width: 600px;
      width: 100%;
    }
    h2 {
      color: #4CAF50;
      margin-bottom: 30px;
      font-weight: 700;
      text-align: center;
    }
    .form-label {
      font-weight: 600;
      color: #333;
    }
    .btn-primary {
      background-color: #4CAF50;
      border-color: #4CAF50;
      font-weight: 600;
      transition: background-color 0.3s;
    }
    .btn-primary:hover {
      background-color: #45a049;
      border-color: #45a049;
    }
    .btn-secondary {
      background-color: #6c757d;
      border-color: #6c757d;
      font-weight: 600;
      transition: background-color 0.3s;
    }
    .btn-secondary:hover {
      background-color: #5a6268;
      border-color: #5a6268;
    }
    .btn-info {
      background-color: #17a2b8;
      border-color: #17a2b8;
      font-weight: 600;
      transition: background-color 0.3s;
      color: white;
    }
    .btn-info:hover {
      background-color: #138496;
      border-color: #117a8b;
      color: white;
    }
    .form-control:focus, .form-select:focus {
      border-color: #4CAF50;
      box-shadow: 0 0 0 0.25rem rgba(76, 175, 80, 0.25);
      outline: none;
    }
    .alert-danger {
      font-weight: 700;
      text-align: center;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Cập nhật thông tin cá nhân</h2>

    <?php if (isset($_GET['error'])): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($_GET['error']) ?></div>
    <?php endif; ?>

    <form action="../xuly/xulysua-profile.php" method="post" novalidate>
      <div class="row g-3">
        <div class="col-md-6">
          <label for="ho" class="form-label">Họ</label>
          <input type="text" id="ho" name="ho" class="form-control" required
                 value="<?= htmlspecialchars($kh['HOKHACHHANG']) ?>" />
        </div>
        <div class="col-md-6">
          <label for="ten" class="form-label">Tên</label>
          <input type="text" id="ten" name="ten" class="form-control" required
                 value="<?= htmlspecialchars($kh['TENKHACHHANG']) ?>" />
        </div>

        <div class="col-md-6">
          <label for="gioitinh" class="form-label">Giới tính</label>
          <select id="gioitinh" name="gioitinh" class="form-select" required>
            <option value="Nam" <?= $kh['GIOITINH']=='Nam'?'selected':'' ?>>Nam</option>
            <option value="Nữ"  <?= $kh['GIOITINH']=='Nữ'?'selected':''  ?>>Nữ</option>
            <option value="Khác"<?= $kh['GIOITINH']=='Khác'?'selected':'' ?>>Khác</option>
          </select>
        </div>

        <div class="col-md-6">
          <label for="dienthoai" class="form-label">Điện thoại</label>
          <input type="text" id="dienthoai" name="dienthoai" class="form-control"
                 value="<?= htmlspecialchars($kh['DIENTHOAI']) ?>" />
        </div>

        <div class="col-12">
          <label for="diachi" class="form-label">Địa chỉ</label>
          <input type="text" id="diachi" name="diachi" class="form-control"
                 value="<?= htmlspecialchars($kh['DIACHI']) ?>" />
        </div>

        <div class="col-12">
          <label for="email" class="form-label">Email</label>
          <input type="email" id="email" name="email" class="form-control" required
                 value="<?= htmlspecialchars($kh['EMAIL']) ?>" />
        </div>
      </div>

      <!-- Nút bấm dạng hàng ngang -->
      <div class="row mt-4 g-2">
        <div class="col-md-4 col-12">
          <a href="/quanlylinhkien/banhang/hienthi/suamk-profile.php" class="btn btn-info w-100">
            Sửa mật khẩu
          </a>
        </div>
        <div class="col-md-4 col-12">
          <button type="submit" class="btn btn-primary w-100">
            Lưu thay đổi
          </button>
        </div>
        <div class="col-md-4 col-12">
          <a href="../hienthi/profile.php" class="btn btn-secondary w-100">
            Quay lại
          </a>
        </div>
      </div>

    </form>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
