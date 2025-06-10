<?php
require('../cauhinh/env.php');
$makhachhang = $_GET['id'] ?? '';

if (!$makhachhang) {
    die("Mã khách hàng không hợp lệ.");
}

$sql = "SELECT * FROM khachhang WHERE MAKHACHHANG = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $makhachhang);
$stmt->execute();
$result = $stmt->get_result();
$khachhang = $result->fetch_assoc();
$stmt->close();

if (!$khachhang) {
    die("Không tìm thấy khách hàng.");
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Xóa Khách Hàng</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .btn-danger {
      min-width: 130px;
    }
    .btn-secondary {
      min-width: 130px;
    }
    .info-list li {
      margin-bottom: 8px;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div class="card p-4">
          <div class="card-body">
            <h3 class="card-title text-center text-danger mb-4">Xác Nhận Xóa Khách Hàng</h3>
            <p class="text-center">Bạn có chắc chắn muốn xóa khách hàng sau không?</p>
            <ul class="info-list list-unstyled">
              <li><strong>Mã KH:</strong> <?= $khachhang['MAKHACHHANG'] ?></li>
              <li><strong>Họ tên:</strong> <?= $khachhang['HOKHACHHANG'] . ' ' . $khachhang['TENKHACHHANG'] ?></li>
              <li><strong>Email:</strong> <?= $khachhang['EMAIL'] ?></li>
            </ul>

            <form action="xuly/khachhang/xulyxoa-khachhang.php" method="post" class="d-flex justify-content-center gap-3 mt-4">
              <input type="hidden" name="makhachhang" value="<?= $makhachhang ?>">
              <button type="submit" name="submit" class="btn btn-danger">Xác nhận xóa</button>
              <a href="index.php?quanly=khachhang&hienthi=danhsach" class="btn btn-secondary">Quay lại</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php mysqli_close($conn); ?>
