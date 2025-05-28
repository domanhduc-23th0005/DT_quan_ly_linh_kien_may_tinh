<?php
require('../../../cauhinh/env.php');

$tu_ngay = $_GET['tu_ngay'] ?? '';
$den_ngay = $_GET['den_ngay'] ?? '';
$where = ($tu_ngay && $den_ngay) ? "WHERE DATE(d.NGAYBANHANG) BETWEEN ? AND ?" : "";

$sql = "
  SELECT 
    k.MAKHACHHANG,
    k.TENKHACHHANG,
    SUM(ct.GIABAN * ct.SOLUONG * (1 - ct.MUCGIAMGIA/100)) AS doanhthu
  FROM donhang d
  JOIN khachhang k ON d.MAKHACHHANG = k.MAKHACHHANG
  JOIN ctdonhang ct ON d.MADONHANG = ct.MADONHANG
  $where
  GROUP BY k.MAKHACHHANG, k.TENKHACHHANG
  ORDER BY doanhthu DESC
";

$stmt = $conn->prepare($sql);
if ($where) $stmt->bind_param("ss", $tu_ngay, $den_ngay);
$stmt->execute();
$res = $stmt->get_result();
$data = $res->fetch_all(MYSQLI_ASSOC);
$max = $data[0] ?? null;
$min = end($data);
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <title>Kết Quả Báo Cáo KH</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="container mt-5" style="max-width: 95%;">
  <h2 class="text-center mb-4">📊 Doanh Thu Theo Khách Hàng (Từ <?= htmlspecialchars($tu_ngay) ?> đến <?= htmlspecialchars($den_ngay) ?>)</h2>

  <button onclick="history.back()" class="btn btn-secondary mb-3">🔙 Quay lại</button>

  <?php if ($max): ?>
    <div class="alert alert-success">🔝 <strong>Cao nhất:</strong> <?= $max['TENKHACHHANG'] ?> – <?= number_format($max['doanhthu'], 0, ',', '.') ?> VNĐ</div>
  <?php endif; ?>
  <?php if ($min): ?>
    <div class="alert alert-warning">🔻 <strong>Thấp nhất:</strong> <?= $min['TENKHACHHANG'] ?> – <?= number_format($min['doanhthu'], 0, ',', '.') ?> VNĐ</div>
  <?php endif; ?>

  <canvas id="bieudoKH" height="150"></canvas>
</div>

<script>
const ctx = document.getElementById('bieudoKH').getContext('2d');
new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?= json_encode(array_column($data, 'TENKHACHHANG')) ?>,
    datasets: [{
      label: 'Doanh thu (VNĐ)',
      data: <?= json_encode(array_column($data, 'doanhthu')) ?>,
      backgroundColor: 'rgba(255, 99, 132, 0.7)',
      borderColor: 'rgba(255, 99, 132, 1)',
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
