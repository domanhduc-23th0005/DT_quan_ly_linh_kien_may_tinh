<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container" style="margin-top: 100px; max-width: 95%; margin-left: 20pt;">
  <h1 class="mb-5 fw-bold text-primary" align = 'center'>📊 Báo Cáo Tổng Hợp</h1>

  <!-- Nút chọn báo cáo -->
  <div class="row justify-content-center g-4">
    <div class="col-12 col-sm-6 col-md-4">
      <a href="index.php?quanly=baocao&hienthi=doanhthu"
         class="btn btn-report bg-gradient-primary text-white">
        <div class="icon">⏰</div>
        <div>Doanh Thu Theo Thời Gian</div>
      </a>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
      <a href="index.php?quanly=baocao&hienthi=khachhang"
         class="btn btn-report bg-gradient-success text-white">
        <div class="icon">👥</div>
        <div>Doanh Thu Theo Khách Hàng</div>
      </a>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
      <a href="index.php?quanly=baocao&hienthi=mathang"
         class="btn btn-report bg-gradient-warning text-dark">
        <div class="icon">📦</div>
        <div>Doanh Thu Theo Mặt Hàng</div>
      </a>
    </div>
  </div>

  <!-- Biểu đồ tổng hợp mặt hàng -->
  <div class="mt-5" style="display: none;">
    <h4 class="text-secondary mb-4">📦 Biểu Đồ Doanh Thu Theo Mặt Hàng</h4>
    <canvas id="chartDoanhThuMH" height="120"></canvas>
  </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Biểu đồ dữ liệu mẫu -->
<script>
  const ctx = document.getElementById('chartDoanhThuMH');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Laptop', 'Bàn phím', 'Chuột', 'Tai nghe', 'Màn hình'],
      datasets: [{
        label: 'Doanh Thu (VND)',
        data: [12000000, 4500000, 3200000, 2900000, 8000000],
        backgroundColor: [
          '#007bff', '#28a745', '#ffc107', '#17a2b8', '#6f42c1'
        ],
        borderRadius: 8
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: false
        },
        tooltip: {
          callbacks: {
            label: function(context) {
              return context.dataset.label + ': ' + context.raw.toLocaleString('vi-VN') + ' ₫';
            }
          }
        }
      },
      scales: {
        y: {
          ticks: {
            callback: function(value) {
              return value.toLocaleString('vi-VN') + ' ₫';
            }
          },
          beginAtZero: true
        }
      }
    }
  });
</script>

<!-- Style tuỳ biến -->
<style>
  .btn-report {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 140px;
    border-radius: 20px;
    font-size: 1.2rem;
    font-weight: 500;
    padding: 20px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    transition: transform 0.2s, box-shadow 0.2s;
    text-decoration: none;
  }

  .btn-report:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
  }

  .btn-report .icon {
    font-size: 3rem;
    margin-bottom: 10px;
  }

  .bg-gradient-primary {
    background: linear-gradient(135deg, #007bff, #0056b3);
  }

  .bg-gradient-success {
    background: linear-gradient(135deg, #28a745, #218838);
  }

  .bg-gradient-warning {
    background: linear-gradient(135deg, #ffc107, #e0a800);
  }
</style>
