<?php
require('../../../cauhinh/env.php');

$tu_ngay = $_GET['tu_ngay'] ?? '';
$den_ngay = $_GET['den_ngay'] ?? '';
$where = ($tu_ngay && $den_ngay) ? "WHERE DATE(d.NGAYBANHANG) BETWEEN ? AND ? AND d.TRANGTHAI <> 4" : "";

$sql = "
  SELECT 
    ct.MAHANG,
    h.TENHANG,
    SUM(ct.GIABAN * ct.SOLUONG * (1 - ct.MUCGIAMGIA/100)) AS doanhthu
  FROM ctdonhang ct
  JOIN donhang d ON ct.MADONHANG = d.MADONHANG
  JOIN mathang h ON ct.MAHANG = h.MAHANG
  $where
  GROUP BY ct.MAHANG, h.TENHANG
  ORDER BY doanhthu DESC
";

$stmt = $conn->prepare($sql);
if ($where) $stmt->bind_param("ss", $tu_ngay, $den_ngay);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_all(MYSQLI_ASSOC);
$hang_max = $data[0] ?? null;
$hang_min = end($data);
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <title>KQ Báo Cáo Mặt Hàng</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="container" style="margin-top: 50px; max-width: 95%; margin-left: 20pt;">
  <h2 class="mb-4 text-center">📦 Doanh Thu Mặt Hàng Từ <?= $tu_ngay ?> → <?= $den_ngay ?></h2>

  <div class="mb-3">
    <button onclick="history.back()" class="btn btn-secondary">🔙 Quay lại</button>
  </div>

  <?php if ($hang_max): ?>
    <div class="alert alert-success">🔝 <strong>Cao nhất:</strong> <?= $hang_max['TENHANG'] ?> – <?= number_format($hang_max['doanhthu'], 0, ',', '.') ?> VNĐ</div>
  <?php endif; ?>
  <?php if ($hang_min): ?>
    <div class="alert alert-warning">🔻 <strong>Thấp nhất:</strong> <?= $hang_min['TENHANG'] ?> – <?= number_format($hang_min['doanhthu'], 0, ',', '.') ?> VNĐ</div>
  <?php endif; ?>

  <canvas id="bieudoMH" height="120"></canvas>
</div>

<script>
const ctx = document.getElementById('bieudoMH').getContext('2d');
new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?= json_encode(array_column($data, 'TENHANG')) ?>,
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
