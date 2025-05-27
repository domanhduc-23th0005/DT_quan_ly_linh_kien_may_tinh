<?php
session_start();
require('../cauhinh/env.php');
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$mahang = $_GET['sua'];

$sql = "SELECT * FROM MATHANG WHERE MAHANG = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $mahang);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

foreach ($cart as $item) {
  if ($item['mahang'] == $mahang) {
    $soluong = $item['soluong'];
    break;
  }
}
?>

<div class="container padding-bottom-3x mb-1" style="padding-top: 100px; padding-bottom: 100px;">
  <div class="alert alert-info alert-dismissible fade show text-center" style="margin-bottom: 30px;"><span class="alert-close" data-dismiss="alert"></span><h4>GIỎ HÀNG - CHỈNH SỬA</h4></div>

  <form action="xuly/giohang/capnhat-giohang.php" method="POST">
    <input type="hidden" name="mahang" value="<?php echo $mahang ?>">

    <div class="container">
      <div class="row gx-5">
        <aside class="col-lg-6">
          <div class="border rounded-4 mb-3 d-flex justify-content-center">
            <a data-fslightbox="mygalley" class="rounded-4" data-type="image">
              <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="../hinhanh
              /<?php echo $row['ANHMINHHOA'] ?>" width="500"/>
            </a>
          </div>
          <!-- thumbs-wrap.// -->
          <!-- gallery-wrap .end// -->
        </aside>
        <main class="col-lg-6">
          <div class="ps-lg-3">
            <h4 class="title text-dark">
              <?php echo $row['TENHANG'] ?>
            </h4>

            <div class="mb-3">
              <span class="h5 text-success"><?php echo number_format($row['GIABAN'], 0, ',', '.').'đ' ?></span>
              <span class="text-muted">/<?php echo $row['DONVITINH'] ?></span>
            </div>

            <!-- col.// -->
            <div class="col-md-4 col-6 mb-3 product-item">
              <label class="mb-2 d-block">Số lượng</label>
              <div class="input-group mb-3" style="width: 170px;">
                <a class="btn btn-white border border-secondary px-3 soluong-giam" id="button-addon1" data-mdb-ripple-color="dark">
                  <i class="bi bi-dash"></i>
                </a>
                <input type="text" class="form-control text-center border border-secondary soluong-input" name="soluong" value="<?php echo $soluong ?>" aria-label="Example text with button addon" aria-describedby="button-addon1" />
                <a class="btn btn-white border border-secondary px-3 soluong-tang" id="button-addon2" data-mdb-ripple-color="dark">
                  <i class="bi bi-plus"></i>
                </a>
              </div>
              <button type="submit" class="btn btn-primary shadow-0">Cập nhật</button>
            </div>
          </div>

        </div>
      </main>
    </div>
  </div>
</form>