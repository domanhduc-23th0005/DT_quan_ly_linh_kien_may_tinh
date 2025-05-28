<?php
require('../cauhinh/env.php');

// Lấy doanh thu từng ngày (toàn bộ dữ liệu)
$sql_all = "
  SELECT 
    DATE(d.NGAYBANHANG) AS ngay,
    SUM(ct.GIABAN * ct.SOLUONG * (1 - ct.MUCGIAMGIA/100)) AS doanhthu
  FROM donhang d
  JOIN ctdonhang ct ON d.MADONHANG = ct.MADONHANG
  GROUP BY ngay
  ORDER BY ngay ASC
";
$result_all = $conn->query($sql_all);
$ngay_ds = [];
$doanhthu_ds = [];

while ($row = $result_all->fetch_assoc()) {
    $ngay_ds[] = date('d/m/Y', strtotime($row['ngay']));
    $doanhthu_ds[] = round($row['doanhthu']);
}

// Truy vấn doanh thu cao nhất
$sql_max = "
  SELECT DATE(d.NGAYBANHANG) AS ngay,
         SUM(ct.GIABAN * ct.SOLUONG * (1 - ct.MUCGIAMGIA/100)) AS doanhthu
  FROM donhang d
  JOIN ctdonhang ct ON d.MADONHANG = ct.MADONHANG
  GROUP BY ngay
  ORDER BY doanhthu DESC
  LIMIT 1
";
$max_result = $conn->query($sql_max);
$ngay_max = $max_result->fetch_assoc();

// Truy vấn doanh thu thấp nhất
$sql_min = "
  SELECT DATE(d.NGAYBANHANG) AS ngay,
         SUM(ct.GIABAN * ct.SOLUONG * (1 - ct.MUCGIAMGIA/100)) AS doanhthu
  FROM donhang d
  JOIN ctdonhang ct ON d.MADONHANG = ct.MADONHANG
  GROUP BY ngay
  ORDER BY doanhthu ASC
  LIMIT 1
";
$min_result = $conn->query($sql_min);
$ngay_min = $min_result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <title>Báo cáo Doanh thu Cửa hàng</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <div class="container" style="margin-top: 100px; max-width: 95%; margin-left: 20pt;">
    


<h1 class="mb-4 text-center">📅 Báo Cáo Doanh Thu Cửa Hàng Theo Thời gian</h1>
    <!-- Form chọn ngày -->
    <form method="get" action="xuly/baocao/kqdoanhthu.php" class="mb-4 row g-3 align-items-center">
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
    <!-- Hiển thị doanh thu cao nhất và thấp nhất -->
    <div class="row mb-4">
      <div class="col-md-6">
        <div class="alert alert-success">
          📈 <strong>Ngày có doanh thu cao nhất (tổng thể):</strong><br>
          <?= date('d/m/Y', strtotime($ngay_max['ngay'])) ?> – 
          <strong><?= number_format($ngay_max['doanhthu'], 0, ',', '.') ?> VNĐ</strong>
        </div>
      </div>
      <div class="col-md-6">
        <div class="alert alert-warning">
          📉 <strong>Ngày có doanh thu thấp nhất (tổng thể):</strong><br>
          <?= date('d/m/Y', strtotime($ngay_min['ngay'])) ?> – 
          <strong><?= number_format($ngay_min['doanhthu'], 0, ',', '.') ?> VNĐ</strong>
        </div>
      </div>
    </div>

    <!-- Biểu đồ doanh thu theo ngày -->
    <h4 class="mb-3">📊 Biểu đồ doanh thu theo ngày (tổng thể)</h4>
    <canvas id="doanhThuChart" style="max-height: 400px;"></canvas>
  </div>

  <script>
    const ctx = document.getElementById('doanhThuChart').getContext('2d');
    const doanhThuChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: <?= json_encode($ngay_ds) ?>,
        datasets: [{
          label: 'Doanh thu (VNĐ)',
          data: <?= json_encode($doanhthu_ds) ?>,
          borderColor: 'rgba(75, 192, 192, 1)',
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          fill: true,
          tension: 0.3,
          pointRadius: 3,
          pointHoverRadius: 6,
          borderWidth: 2
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              callback: function(value) {
                return value.toLocaleString('vi-VN') + ' ₫';
              }
            }
          }
        },
        plugins: {
          legend: { display: true, position: 'top' },
          tooltip: {
            callbacks: {
              label: function(context) {
                return context.parsed.y.toLocaleString('vi-VN') + ' VNĐ';
              }
            }
          }
        },
        responsive: true,
        maintainAspectRatio: false
      }
    });
  </script>
</body>
</html>

<?php
$conn->close();
?>
