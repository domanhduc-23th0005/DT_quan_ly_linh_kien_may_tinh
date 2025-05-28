<?php
require('../cauhinh/env.php');

// Truy vấn toàn bộ doanh thu theo mặt hàng
$sql = "
  SELECT 
    ct.MAHANG,
    h.TENHANG,
    SUM(ct.GIABAN * ct.SOLUONG * (1 - ct.MUCGIAMGIA / 100)) AS doanhthu
  FROM ctdonhang ct
  JOIN donhang d ON ct.MADONHANG = d.MADONHANG
  JOIN mathang h ON ct.MAHANG = h.MAHANG
  GROUP BY ct.MAHANG, h.TENHANG
  ORDER BY doanhthu DESC
";
$result = $conn->query($sql);
$top = $result->fetch_all(MYSQLI_ASSOC);
$hang_max = $top[0] ?? null;
$hang_min = end($top);
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <title>Báo Cáo Mặt Hàng</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <div class="container" style="margin-top: 100px; max-width: 95%; margin-left: 20pt;">
    <h1 class="mb-4 text-center"></h1>
<h1 class="mb-4 text-center">📦 Báo Cáo Doanh Thu Theo Mặt Hàng </h1>
    <!-- Form chọn khoảng thời gian -->
    <form method="get" action="xuly/baocao/kqbaocaomh.php" class="mb-4 row g-3 align-items-center">
      <div class="col-auto">
        <label for="tu_ngay" class="col-form-label">Từ ngày:</label>
      </div>
      <div class="col-auto">
        <input type="date" id="tu_ngay" name="tu_ngay" class="form-control" required>
      </div>
      <div class="col-auto">
        <label for="den_ngay" class="col-form-label">Đến ngày:</label>
      </div>
      <div class="col-auto">
        <input type="date" id="den_ngay" name="den_ngay" class="form-control" required>
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary">📊 Thống kê</button>
      </div>
    </form>
<button onclick="history.back()" class="btn btn-secondary mb-3">🔙 Quay lại</button>
    <!-- Hiển thị mặt hàng cao/thấp nhất -->
    <?php if ($hang_max): ?>
      <div class="alert alert-success">
        🔝 <strong>Cao nhất:</strong> <?= $hang_max['TENHANG'] ?> – <?= number_format($hang_max['doanhthu'], 0, ',', '.') ?> VNĐ
      </div>
    <?php endif; ?>
    <?php if ($hang_min): ?>
      <div class="alert alert-warning">
        🔻 <strong>Thấp nhất:</strong> <?= $hang_min['TENHANG'] ?> – <?= number_format($hang_min['doanhthu'], 0, ',', '.') ?> VNĐ
      </div>
    <?php endif; ?>

    <!-- Biểu đồ -->
    <canvas id="bieudoMH" height="120"></canvas>
  </div>

  <script>
    const ctx = document.getElementById('bieudoMH').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?= json_encode(array_column($top, 'TENHANG')) ?>,
        datasets: [{
          label: 'Doanh thu (VNĐ)',
          data: <?= json_encode(array_map('floatval', array_column($top, 'doanhthu'))) ?>,
          backgroundColor: 'rgba(75, 192, 192, 0.7)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }]
      },
      options: {
        indexAxis: 'y',
        responsive: true,
        scales: {
          x: {
            ticks: {
              callback: value => value.toLocaleString('vi-VN')
            }
          }
        },
        plugins: {
          legend: { display: false }
        }
      }
    });
  </script>
</body>
</html>
