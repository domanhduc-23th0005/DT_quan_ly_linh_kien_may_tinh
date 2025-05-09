<?php
require('../cauhinh/env.php');

// Lấy dữ liệu lỗi từ session nếu có
$thongbao = $_SESSION["thongbao"] ?? [];
$old_data = $_SESSION["old_data"] ?? [];
unset($_SESSION["thongbao"], $_SESSION["old_data"]); // Xóa lỗi sau khi hiển thị
?>

<div class="container">

  <div class="page-inner">

    <div class="page-header">
      <h3 class="fw-bold mb-3">Thêm Mới Loại Hàng</h3>
    </div>

    <div class="row">

      <form action="xuly/loaihang/them-loaihang.php" method="post">

        <div class="col-md-12">

          <div class="card">
            <div class="card-header">
              <div class="align-items-center">
                <h4 class="card-title">Nhập thông tin loại hàng</h4>
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
                    <label for="tenloaihang">Tên Loại Hàng</label>
                    <input type="text" class="form-control" id="tenloaihang" name="tenloaihang" value="<?php echo $old_data['tenloaihang'] ?? '' ?>" required />
                  </div>
                </div>

              </div>

            </div>

            <div class="card-action">
              <button type="submit" class="btn btn-success" name="submit">Thêm</button>
              <a href="index.php?quanly=loaihang&hienthi=them" class="btn btn-secondary">Nhập lại</a>
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
