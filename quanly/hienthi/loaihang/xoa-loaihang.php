<?php
require('../cauhinh/env.php');

$maloaihang = $_GET['id'] ?? '';

if (!$maloaihang) {
  die("Mã loại hàng không hợp lệ.");
}
?>

<div class="container">

  <div class="page-inner">

    <div class="page-header">
      <h3 class="fw-bold mb-3">Xoá Loại Hàng</h3>
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
                <p class="text-danger text-center">Bạn có chắc chắn muốn xoá loại hàng này?</p>
              </div>

            </div>

          </div>

          <div class="card-action">
            <a href="xuly/loaihang/xoa-loaihang.php?id=<?php echo $maloaihang ?>" class="btn btn-danger">Xoá</a>
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