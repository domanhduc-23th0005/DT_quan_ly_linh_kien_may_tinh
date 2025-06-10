<?php
require('../cauhinh/env.php');

$makhachhang = $_GET['id'] ?? '';

if (!$makhachhang) {
  die("Mã khách hàng không hợp lệ.");
}

// Truy vấn dữ liệu
$sql = "SELECT * FROM khachhang WHERE MAKHACHHANG = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $makhachhang);
$stmt->execute();
$result = $stmt->get_result();
$khachhang = $result->fetch_assoc();
$stmt->close();

// Lấy dữ liệu lỗi từ session nếu có
$thongbao = $_SESSION["thongbao"] ?? [];
unset($_SESSION["thongbao"]);
?>

<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Chỉnh Sửa Khách Hàng</h3>
    </div>
    <div class="row">
      <form action="xuly/khachhang/xulysua-khachhang.php" method="post">
        <input type="hidden" name="makhachhang" value="<?php echo $khachhang['MAKHACHHANG'] ?>">

        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Nhập thông tin khách hàng</h4>
              <small>
                <?php
                if (!empty($thongbao)) {
                  if ($_GET['thongbao'] == 0) {
                    echo '<div class="text-danger"><ul>';
                    foreach ($thongbao as $loi) {
                      echo "<li>$loi</li>";
                    }
                    echo '</ul></div>';
                  } else if ($_GET['thongbao'] == 1) {
                    echo '<div class="text-success">' . $thongbao . '</div>';
                  }
                }
                ?>
              </small>
            </div>

            <div class="card-body">
              <div class="row">

                <div class="col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="hokhachhang">Họ Khách Hàng</label>
                    <input type="text" class="form-control" id="hokhachhang" name="hokhachhang"
                      value="<?php echo $khachhang['HOKHACHHANG'] ?? '' ?>" required>
                  </div>
                </div>

                <div class="col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="tenkhachhang">Tên Khách Hàng</label>
                    <input type="text" class="form-control" id="tenkhachhang" name="tenkhachhang"
                      value="<?php echo $khachhang['TENKHACHHANG'] ?? '' ?>" required>
                  </div>
                </div>

                <div class="col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="gioitinh">Giới Tính</label>
                    <select class="form-control" id="gioitinh" name="gioitinh" required>
                      <option value="Nam" <?php if($khachhang['GIOITINH'] == 'Nam') echo 'selected'; ?>>Nam</option>
                      <option value="Nữ" <?php if($khachhang['GIOITINH'] == 'Nữ') echo 'selected'; ?>>Nữ</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="diachi">Địa Chỉ</label>
                    <input type="text" class="form-control" id="diachi" name="diachi"
                      value="<?php echo $khachhang['DIACHI'] ?? '' ?>" required>
                  </div>
                </div>

                <div class="col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                      value="<?php echo $khachhang['EMAIL'] ?? '' ?>" required>
                  </div>
                </div>

                <div class="col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="dienthoai">Điện Thoại</label>
                    <input type="text" class="form-control" id="dienthoai" name="dienthoai"
                      value="<?php echo $khachhang['DIENTHOAI'] ?? '' ?>" required>
                  </div>
                </div>

                <div class="col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="matkhau">Mật Khẩu</label>
                    <input type="text" class="form-control" id="matkhau" name="matkhau"
                      value="">
                  </div>
                </div>

                <div class="col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="xn-matkhau">Xác Nhận Mật Khẩu</label>
                    <input type="text" class="form-control" id="xn-matkhau" name="xn-matkhau"
                      value="">
                  </div>
                </div>

              </div>
            </div>

           <div class="card-action d-flex gap-2">
  <a href="index.php?quanly=khachhang&hienthi=danhsach" class="btn btn-secondary">Quay lại</a>
  <button type="submit" class="btn btn-success" name="submit">Cập nhật</button>
</div>



          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
mysqli_close($conn);
?>
