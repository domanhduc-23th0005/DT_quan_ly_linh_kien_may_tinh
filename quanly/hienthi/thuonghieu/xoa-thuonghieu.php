<?php
require('../cauhinh/env.php');

$mathuonghieu = $_GET['id'] ?? '';

if (!$mathuonghieu) {
  die("Mã thương hiệu không hợp lệ.");
}
?>

<div class="container">

  <div class="page-inner">

    <div class="page-header">
      <h3 class="fw-bold mb-3">Xoá Thương Hiệu</h3>
    </div>

    <div class="row">

      <div class="col-md-12">

        <div class="card">
          <div class="card-header">
            <div class="align-items-center">
              <h4 class="card-title">Thông báo</h4>
            </div>
          </div>

          <div class="card-body">

            <div class="row">

              <div>
                <p class="text-danger text-center">Bạn có chắc chắn muốn xoá thương hiệu này?</p>
              </div>

            </div>

          </div>

          <div class="card-action">
            <a href="xuly/thuonghieu/xoa-thuonghieu.php?id=<?php echo $mathuonghieu ?>" class="btn btn-danger">Xoá</a>
          </div>

        </div>

      </div>

    </div>

  </div>

</div>

<?php
// Đóng kết nối
mysqli_close($conn);
?>