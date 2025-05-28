<?php
require('../../../cauhinh/env.php');

$tu_ngay = $_GET['tu_ngay'] ?? '';
$den_ngay = $_GET['den_ngay'] ?? '';
$where_ngay = ($tu_ngay && $den_ngay) ? "WHERE DATE(d.NGAYBANHANG) BETWEEN ? AND ?" : "";

// Doanh thu từng ngày
$sql = "
  SELECT DATE(d.NGAYBANHANG) AS ngay,
         SUM(ct.GIABAN * ct.SOLUONG * (1 - ct.MUCGIAMGIA/100)) AS doanhthu
  FROM donhang d
  JOIN ctdonhang ct ON d.MADONHANG = ct.MADONHANG
  $where_ngay
  GROUP BY ngay
  ORDER BY ngay DESC
";
$stmt = $conn->prepare($sql);
if ($where_ngay) $stmt->bind_param("ss", $tu_ngay, $den_ngay);
$stmt->execute();
$doanhthu_result = $stmt->get_result();

// Chuẩn bị dữ liệu cho biểu đồ
$labels = [];
$data_chart = [];
foreach ($doanhthu_result as $row) {
    $labels[] = date('d/m/Y', strtotime($row['ngay']));
    $data_chart[] = round($row['doanhthu']);
}

// Truy vấn lại vì đã fetch hết dữ liệu cho biểu đồ, cần cho bảng
$stmt->execute();
$doanhthu_result = $stmt->get_result();

// Max doanh thu
$sql_max = "
  SELECT DATE(d.NGAYBANHANG) AS ngay,
         SUM(ct.GIABAN * ct.SOLUONG * (1 - ct.MUCGIAMGIA/100)) AS doanhthu
  FROM donhang d
  JOIN ctdonhang ct ON d.MADONHANG = ct.MADONHANG
  $where_ngay
  GROUP BY ngay
  ORDER BY doanhthu DESC LIMIT 1
";
$stmt_max = $conn->prepare($sql_max);
if ($where_ngay) $stmt_max->bind_param("ss", $tu_ngay, $den_ngay);
$stmt_max->execute();
$ngay_max = $stmt_max->get_result()->fetch_assoc();

// Min doanh thu
$sql_min = "
  SELECT DATE(d.NGAYBANHANG) AS ngay,
         SUM(ct.GIABAN * ct.SOLUONG * (1 - ct.MUCGIAMGIA/100)) AS doanhthu
  FROM donhang d
  JOIN ctdonhang ct ON d.MADONHANG = ct.MADONHANG
  $where_ngay
  GROUP BY ngay
  ORDER BY doanhthu ASC LIMIT 1
";
$stmt_min = $conn->prepare($sql_min);
if ($where_ngay) $stmt_min->bind_param("ss", $tu_ngay, $den_ngay);
$stmt_min->execute();
$ngay_min = $stmt_min->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <title>Kết Quả Báo Cáo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <div class="container" style="margin-top: 50px; max-width: 95%; margin-left: 20pt;">
    <h2 class="mb-4 text-center">📊 Kết Quả Báo Cáo Doanh Thu</h2>

    <div class="mb-3">
      <button onclick="history.back()" class="btn btn-secondary">🔙 Quay lại chọn ngày</button>
    </div>

    <?php if ($ngay_max): ?>
      <div class="alert alert-success">
        📈 <strong>Ngày doanh thu cao nhất:</strong>
        <?= date('d/m/Y', strtotime($ngay_max['ngay'])) ?> –
        <strong><?= number_format($ngay_max['doanhthu'], 0, ',', '.') ?> VNĐ</strong>
      </div>
    <?php endif; ?>

    <?php if ($ngay_min): ?>
      <div class="alert alert-warning">
        📉 <strong>Ngày doanh thu thấp nhất:</strong>
        <?= date('d/m/Y', strtotime($ngay_min['ngay'])) ?> –
        <strong><?= number_format($ngay_min['doanhthu'], 0, ',', '.') ?> VNĐ</strong>
      </div>
    <?php endif; ?>

    <table class="table table-bordered">
      <thead class="table-light">
        <tr><th>Ngày</th><th>Doanh thu (VNĐ)</th></tr>
      </thead>
      <tbody>
        <?php if ($doanhthu_result->num_rows > 0): ?>
          <?php while ($row = $doanhthu_result->fetch_assoc()): ?>
            <tr>
              <td><?= date('d/m/Y', strtotime($row['ngay'])) ?></td>
              <td><?= number_format($row['doanhthu'], 0, ',', '.') ?></td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="2" class="text-center">Không có dữ liệu trong khoảng ngày này.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>

    <h4 class="mt-5 mb-3">📈 Biểu đồ doanh thu theo ngày</h4>
    <canvas id="doanhThuChart" style="max-height: 400px;"></canvas>
  </div>

  <script>
    const ctx = document.getElementById('doanhThuChart').getContext('2d');
    const doanhThuChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: <?= json_encode($labels) ?>,
        datasets: [{
          label: 'Doanh thu (VNĐ)',
          data: <?= json_encode($data_chart) ?>,
          borderColor: 'rgba(54, 162, 235, 1)',
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
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

<?php $conn->close(); ?>
