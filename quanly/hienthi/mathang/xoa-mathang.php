<?php
require('../cauhinh/env.php');

$mahang = $_GET['id'] ?? '';

if (!$mahang) {
  die("Mã hàng không hợp lệ.");
}
?>

<div class="container">

  <div class="page-inner">

    <div class="page-header">
      <h3 class="fw-bold mb-3">Xoá Mặt Hàng</h3>
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
                <p class="text-danger text-center">Bạn có chắc chắn muốn xoá?</p>
              </div>

            </div>

          </div>

          <div class="card-action">
            <a href="xuly/mathang/xoa-mathang.php?id=<?php echo $mahang ?>" class="btn btn-danger">Xoá</a>
          </div>

        </div>

      </div>

    </div>

  </div>

</div>

<?php
  // 5. Xóa kết nối
mysqli_close($conn);
?>