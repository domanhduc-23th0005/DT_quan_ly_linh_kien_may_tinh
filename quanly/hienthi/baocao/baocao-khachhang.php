<?php
require('../cauhinh/env.php');

// Lấy toàn bộ doanh thu theo khách hàng
$sql = "
  SELECT 
    k.MAKHACHHANG,
    k.TENKHACHHANG,
    k.EMAIL,
    SUM(ct.GIABAN * ct.SOLUONG * (1 - ct.MUCGIAMGIA/100)) AS doanhthu
  FROM donhang d
  JOIN khachhang k ON d.MAKHACHHANG = k.MAKHACHHANG
  JOIN ctdonhang ct ON d.MADONHANG = ct.MADONHANG
  WHERE d.TRANGTHAI <> 4
  GROUP BY k.MAKHACHHANG, k.TENKHACHHANG
  ORDER BY doanhthu DESC
";
$result = $conn->query($sql);
$data = $result->fetch_all(MYSQLI_ASSOC);
$max = $data[0] ?? null;
$min = end($data);
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <title>Báo Cáo Khách Hàng</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="container" style="margin-top: 100px; max-width: 95%; margin-left: 20pt;">
  <h1 class="text-center mb-4"></h1>
 <h1 class="text-center mb-4">👥 Báo Cáo Doanh Thu Theo Khách Hàng </h1>
  <form method="get" action="xuly/baocao/kqbaocaokh.php" class="row g-3 align-items-center mb-4">
    <div class="col-auto">
      <label for="tu_ngay" class="form-label">Từ ngày:</label>
    </div>
    <div class="col-auto">
      <input type="date" id="tu_ngay" name="tu_ngay" class="form-control" required>
    </div>
    <div class="col-auto">
      <label for="den_ngay" class="form-label">Đến ngày:</label>
    </div>
    <div class="col-auto">
      <input type="date" id="den_ngay" name="den_ngay" class="form-control" required>
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary">📊 Thống kê</button>
    </div>
  </form>
<button onclick="history.back()" class="btn btn-secondary mb-3">🔙 Quay lại</button>
  <?php if ($max): ?>
    <div class="alert alert-success">🔝 <strong>Khách hàng mua nhiều nhất:</strong> <?= $max['EMAIL'] ?> – <?= number_format($max['doanhthu'], 0, ',', '.') ?> VNĐ</div>
  <?php endif; ?>
  <?php if ($min): ?>
    <div class="alert alert-warning">🔻 <strong>Ít nhất:</strong> <?= $min['EMAIL'] ?> – <?= number_format($min['doanhthu'], 0, ',', '.') ?> VNĐ</div>
  <?php endif; ?>

  <canvas id="bieudoKH" height="150"></canvas>
</div>

<script>
const ctx = document.getElementById('bieudoKH').getContext('2d');
new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?= json_encode(array_column($data, 'EMAIL')) ?>,
    datasets: [{
      label: 'Doanh thu (VNĐ)',
      data: <?= json_encode(array_column($data, 'doanhthu')) ?>,
      backgroundColor: 'rgba(75, 192, 192, 0.7)',
      borderColor: 'rgba(75, 192, 192, 1)',
      borderWidth: 1
    }]
  },
  options: {
    indexAxis: 'y',
    scales: {
      x: {
        ticks: {
          callback: value => value.toLocaleString('vi-VN')
        }
      }
    }
  }
});
</script>
</body>
</html>
