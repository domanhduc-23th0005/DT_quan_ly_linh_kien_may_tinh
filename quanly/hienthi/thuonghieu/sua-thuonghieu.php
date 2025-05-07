<?php
require('../cauhinh/env.php');

$mathuonghieu = $_GET['id'] ?? '';

if (!$mathuonghieu) {
  die("Mã thương hiệu không hợp lệ.");
}

// Truy vấn dữ liệu thương hiệu
$sql = "SELECT * FROM thuonghieu WHERE MATHUONGHIEU = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $mathuonghieu);
$stmt->execute();
$result = $stmt->get_result();
$thuonghieu = $result->fetch_assoc();
$stmt->close();

// Lấy dữ liệu lỗi từ session nếu có
$thongbao = $_SESSION["thongbao"] ?? [];
unset($_SESSION["thongbao"]); // Xóa lỗi sau khi hiển thị
?>

<div class="container">

  <div class="page-inner">

    <div class="page-header">
      <h3 class="fw-bold mb-3">Chỉnh Sửa Thương Hiệu</h3>
    </div>

    <div class="row">

      <form action="xuly/thuonghieu/sua-thuonghieu.php" method="post">
        <input type="hidden" name="mathuonghieu" value="<?php echo $thuonghieu['MATHUONGHIEU'] ?>">

        <div class="col-md-12">

          <div class="card">
            <div class="card-header">
              <div class="align-items-center">
                <h4 class="card-title">Nhập thông tin thương hiệu</h4>
              </div>
              <small>
                <?php
                if (!empty($thongbao)) {
                  if ($_GET['thongbao'] == 0) {
                    ?>
                    <div class="text-danger">
                      <ul>
                        <?php foreach ($thongbao as $loi): ?>
                          <li><?php echo $loi ?></li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                    <?php
                  } else if ($_GET['thongbao'] == 1) {
                    ?>
                    <div class="text-success"><?php echo $thongbao ?></div>
                    <?php
                  }
                }
                ?>
              </small>
            </div>

            <div class="card-body">

              <div class="row">

                <div class="col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="tenthuonghieu">Tên Thương Hiệu</label>
                    <input type="text" class="form-control" id="tenthuonghieu" name="tenthuonghieu" value="<?php echo $thuonghieu['TENTHUONGHIEU'] ?? '' ?>" required />
                  </div>
                </div>

              </div>

            </div>

            <div class="card-action">
              <button type="submit" class="btn btn-success" name="submit">Cập nhật</button>
            </div>

          </div>

        </div>

      </form>

    </div>

  </div>

</div>

<?php
// Đóng kết nối
mysqli_close($conn);
?>