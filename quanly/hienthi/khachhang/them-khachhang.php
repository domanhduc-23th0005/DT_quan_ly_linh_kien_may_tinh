<?php
session_start();
require('../cauhinh/env.php');

// Lấy dữ liệu lỗi và dữ liệu cũ nếu có
$thongbao = $_SESSION["thongbao"] ?? [];
$old_data = $_SESSION["old_data"] ?? [];
unset($_SESSION["thongbao"], $_SESSION["old_data"]);
?>

<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Thêm Mới Khách Hàng</h3>
    </div>
    <div class="row">
      <form action="xuly/khachhang/xulythem-khachhang.php" method="post">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Nhập thông tin khách hàng</h4>
              <small>
                <?php if (!empty($thongbao)) : ?>
                  <?php if (isset($_GET['thongbao']) && $_GET['thongbao'] == 0) : ?>
                    <div class="text-danger">
                      <ul>
                        <?php foreach ($thongbao as $loi) : ?>
                          <li><?= htmlspecialchars($loi) ?></li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  <?php elseif (isset($_GET['thongbao']) && $_GET['thongbao'] == 1) : ?>
                    <div class="text-success"><?= htmlspecialchars($thongbao) ?></div>
                  <?php endif; ?>
                <?php endif; ?>
              </small>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 col-lg-4">
                  <label for="hokhachhang">Họ khách hàng</label>
                  <input type="text" class="form-control" id="hokhachhang" name="hokhachhang" value="<?= htmlspecialchars($old_data['hokhachhang'] ?? '') ?>" required>
                </div>
                <div class="col-md-6 col-lg-4">
                  <label for="tenkhachhang">Tên khách hàng</label>
                  <input type="text" class="form-control" id="tenkhachhang" name="tenkhachhang" value="<?= htmlspecialchars($old_data['tenkhachhang'] ?? '') ?>" required>
                </div>
                <div class="col-md-6 col-lg-4">
                  <label for="gioitinh">Giới tính</label>
                  <select class="form-control" id="gioitinh" name="gioitinh" required>
                    <option value="">Chọn giới tính</option>
                    <option value="Nam" <?= (isset($old_data['gioitinh']) && $old_data['gioitinh'] == 'Nam') ? 'selected' : '' ?>>Nam</option>
                    <option value="Nữ" <?= (isset($old_data['gioitinh']) && $old_data['gioitinh'] == 'Nữ') ? 'selected' : '' ?>>Nữ</option>
                  </select>
                </div>
                <div class="col-md-6 col-lg-4">
                  <label for="diachi">Địa chỉ</label>
                  <input type="text" class="form-control" id="diachi" name="diachi" value="<?= htmlspecialchars($old_data['diachi'] ?? '') ?>" required>
                </div>
                <div class="col-md-6 col-lg-4">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($old_data['email'] ?? '') ?>" required>
                </div>
                <div class="col-md-6 col-lg-4">
                  <label for="dienthoai">Điện thoại</label>
                  <input type="text" class="form-control" id="dienthoai" name="dienthoai" value="<?= htmlspecialchars($old_data['dienthoai'] ?? '') ?>" required>
                </div>
                <div class="col-md-6 col-lg-4">
                  <label for="matkhau">Mật khẩu</label>
                  <input type="password" class="form-control" id="matkhau" name="matkhau" required>
                </div>
              </div>
            </div>
            <div class="card-action mt-3">
              <button type="submit" class="btn btn-success" name="submit">Thêm</button>
              <a href="index.php?quanly=khachhang&hienthi=them" class="btn btn-secondary">Nhập lại</a>
              <a href="index.php?quanly=khachhang&hienthi=danhsach" class="btn btn-secondary">Quay lại</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php mysqli_close($conn); ?>
