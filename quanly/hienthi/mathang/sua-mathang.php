<?php
require('../cauhinh/env.php');

$mahang = $_GET['id'] ?? '';

if (!$mahang) {
  die("Mã hàng không hợp lệ.");
}

// Truy vấn dữ liệu mặt hàng
$sql = "SELECT * FROM MATHANG WHERE MAHANG = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $mahang);
$stmt->execute();
$result = $stmt->get_result();
$mathang = $result->fetch_assoc();
$stmt->close();

// Lấy danh sách loại hàng
$sql_loaihang = "SELECT * FROM loaihang";
$result_loaihang = mysqli_query($conn,$sql_loaihang);

// Lấy danh sách thuong hieu
$sql_thuonghieu = "SELECT * FROM thuonghieu";
$result_thuonghieu = mysqli_query($conn,$sql_thuonghieu);


// Lấy dữ liệu lỗi từ session nếu có
$thongbao = $_SESSION["thongbao"] ?? [];
unset($_SESSION["thongbao"]); // Xóa lỗi sau khi hiển thị
?>

<div class="container">

  <div class="page-inner">

    <div class="page-header">
      <h3 class="fw-bold mb-3">Chỉnh Sửa Mặt Hàng</h3>
    </div>

    <div class="row">

      <form action="xuly/mathang/sua-mathang.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="mahang" value="<?php echo $mathang['MAHANG'] ?>">

        <div class="col-md-12">

          <div class="card">
            <div class="card-header">
              <div class="align-items-center">
                <h4 class="card-title">Nhập thông tin mặt hàng</h4>
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
                    <label for="tenhang">Tên</label>
                    <input type="text" class="form-control" id="tenhang" name="tenhang" value="<?php echo $mathang['TENHANG'] ?? '' ?>" required />
                  </div>
                </div>

                <div class="col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="loaihang">Loại hàng</label>
                    <?php
                    if (mysqli_num_rows($result_loaihang) != 0) {
                      ?>
                      <select class="form-select form-control" id="loaihang" name="loaihang" required>
                        <option value="">-- Chọn loại hàng --</option>
                        <?php
                        while ($row_loaihang = mysqli_fetch_assoc($result_loaihang)) {
                          ?>
                          <option value="<?php echo $row_loaihang['MALOAIHANG'] ?>" <?php echo ($mathang['MALOAIHANG'] == $row_loaihang['MALOAIHANG']) ? 'selected' : '' ?>>
                            <?php echo $row_loaihang['TENLOAIHANG'] ?>
                          </option>
                          <?php
                        }
                        ?>
                      </select>
                      <?php
                    }
                    ?>
                  </div>
                </div>

                <div class="col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="thuonghieu">Thương hiệu</label>
                    <?php
                    if (mysqli_num_rows($result_thuonghieu) != 0) {
                      ?>
                      <select class="form-select form-control" id="thuonghieu" name="thuonghieu" required>
                        <option value="">-- Chọn thương hiệu --</option>
                        <?php
                        while ($row_thuonghieu = mysqli_fetch_assoc($result_thuonghieu)) {
                          ?>
                          <option value="<?php echo $row_thuonghieu['MATHUONGHIEU'] ?>" <?php echo ($mathang['MATHUONGHIEU'] == $row_thuonghieu['MATHUONGHIEU']) ? 'selected' : '' ?>>
                            <?php echo $row_thuonghieu['TENTHUONGHIEU'] ?>
                          </option>
                          <?php
                        }
                        ?>
                      </select>
                      <?php
                    }
                    ?>
                  </div>
                </div>

                <div class="col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="dvt">Đơn vị tính</label>
                    <input type="text" class="form-control" id="dvt" name="dvt" value="<?php echo $mathang['DONVITINH'] ?? '' ?>"  required />
                  </div>
                </div>

                <div class="col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="giaban">Giá bán</label>
                    <input type="number" class="form-control" id="giaban" name="giaban" value="<?php echo $mathang['GIABAN'] ?>" required />
                  </div>
                </div>

                <div class="col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="anhminhhoa">Ảnh minh hoạ</label>
                    <br>
                    <input type="file" class="form-control-file" id="hinhanh" name="anhminhhoa" />
                    <p>Ảnh hiện tại: <?php echo $mathang['ANHMINHHOA'] ?></p>
                  </div>
                </div>

                <div>
                  <div class="form-group">
                    <label for="ttkt">Thông số kỹ thuật</label>
                    <textarea class="form-control" id="ttkt" name="ttkt" rows="10"><?php echo $mathang['THONGSOKYTHUAT'] ?? '' ?></textarea>
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
  // 5. Xóa kết nối
mysqli_close($conn);
?>