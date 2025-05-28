<?php
session_start();
if (!isset($_SESSION['khachhang'])) {
    header("Location: index.php?banhang=dangnhap&hienthi=dangnhap");
    exit();
}
$khachhang = $_SESSION['khachhang'];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="../images/favicon.png" type="image/x-icon"/>
  <title>Thông tin tài khoản</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome (icon) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <style>
    body {
      background: #f8f9fa;
    }
    .account-box {
      max-width: 600px;
      margin: 80px auto;
      background: #fff;
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    }
    .account-box h2 {
      margin-bottom: 25px;
      font-weight: bold;
      color: #343a40;
    }
    .account-info li {
      padding: 8px 0;
      font-size: 17px;
    }
    .account-info li strong {
      color: #0d6efd;
    }
    .btn-group a {
      min-width: 140px;
    }
    .account-info {
  list-style: none;
  padding: 0;
  margin: 0;
}

.account-info li {
  display: flex;
  justify-content: space-between;
  padding: 8px 0;
  border-bottom: 1px dashed #ccc;
}

.account-info .label {
  font-weight: bold;
  color: #007bff;
  flex: 1;
}

.account-info .value {
  flex: 1;
  text-align: right;
  color: #333;
}

  </style>
</head>
<body>
  <div class="account-box text-center">
    <h2><i class="fas fa-user-circle me-2"></i>Thông tin tài khoản</h2>
   <ul class="account-info">
  <li><span class="label">Mã khách hàng:</span><span class="value"><?php echo $khachhang['MAKHACHHANG']; ?></span></li>
  <li><span class="label">Họ khách hàng:</span><span class="value"><?php echo $khachhang['HOKHACHHANG']; ?></span></li>
  <li><span class="label">Tên khách hàng:</span><span class="value"><?php echo $khachhang['TENKHACHHANG']; ?></span></li>

  <li><span class="label">Giới tính:</span><span class="value"><?php echo $khachhang['GIOITINH']; ?></span></li>
  <li><span class="label">Địa chỉ:</span><span class="value"><?php echo $khachhang['DIACHI']; ?></span></li>
  <li><span class="label">EMAIL:</span><span class="value"><?php echo $khachhang['EMAIL']; ?></span></li>




  <li><span class="label">Điện thoại:</span><span class="value"><?php echo $khachhang['DIENTHOAI']; ?></span></li>
</ul>


   <div class="btn-group mt-4 text-center w-30">
    <a href="../../banhang/xuly/logout.php" class="btn btn-danger"><i class="fas fa-sign-out-alt me-1"></i>Đăng xuất</a>
    <a href="../../banhang/index.php" class="btn btn-success"><i class="fas fa-home me-1"></i>Trang chủ</a>
    <a href="../../banhang/hienthi/sua-profile.php" class="btn btn-warning"><i class="fas fa-user-edit me-1"></i>Sửa thông tin</a>
</div>

  </div>

  <!-- Bootstrap JS (nếu cần modal/JS components) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
