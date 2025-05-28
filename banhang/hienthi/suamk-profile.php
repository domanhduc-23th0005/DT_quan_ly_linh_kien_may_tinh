<?php
session_start();
if (!isset($_SESSION['khachhang'])) {
    header("Location: ../index.php?banhang=dangnhap&hienthi=dangnhap");
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <title>Đổi mật khẩu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-5" style="max-width:500px;">
  <h3 class="text-center mb-4">Đổi mật khẩu</h3>

  <?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($_GET['error']) ?></div>
  <?php endif; ?>

  <?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success"><?= htmlspecialchars($_GET['success']) ?></div>
  <?php endif; ?>

  <form method="post" action="../xuly/xulysuamk.php">
    <div class="mb-3">
      <label for="matkhau_cu" class="form-label">Mật khẩu hiện tại</label>
      <input type="password" class="form-control" name="matkhau_cu" id="matkhau_cu" required />
    </div>
    <div class="mb-3">
      <label for="matkhau_moi" class="form-label">Mật khẩu mới</label>
      <input type="password" class="form-control" name="matkhau_moi" id="matkhau_moi" required />
    </div>
    <div class="mb-3">
      <label for="matkhau_moi_xn" class="form-label">Xác nhận mật khẩu mới</label>
      <input type="password" class="form-control" name="matkhau_moi_xn" id="matkhau_moi_xn" required />
    </div>

    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" id="togglePassword" />
      <label class="form-check-label" for="togglePassword">Hiện mật khẩu</label>
    </div>

    <button type="submit" class="btn btn-primary w-100">Cập nhật</button>
    <a href="profile.php" class="btn btn-secondary w-100 mt-3">Quay lại</a>
  </form>
</div>

<script>
  document.getElementById("togglePassword").addEventListener("change", function () {
    const fields = ["matkhau_cu", "matkhau_moi", "matkhau_moi_xn"];
    fields.forEach(function (id) {
      const field = document.getElementById(id);
      field.type = (field.type === "password") ? "text" : "password";
    });
  });
</script>
</body>
</html>
