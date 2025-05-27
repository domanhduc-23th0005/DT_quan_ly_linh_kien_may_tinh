<?php
require('../cauhinh/env.php');

$mahang = $_GET['mathang'];

$sql = "SELECT 
mh.*, 
th.TENTHUONGHIEU 
FROM MATHANG mh
LEFT JOIN THUONGHIEU th ON mh.MATHUONGHIEU = th.MATHUONGHIEU
WHERE mh.MAHANG = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $mahang);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

if (!$row) {
  echo "<div class='alert alert-danger'>Không có dữ liệu!</div>";
  exit;
}

$sql_tuongtu = "SELECT * FROM mathang WHERE MALOAIHANG = $row[MALOAIHANG] AND MAHANG <> $row[MAHANG] LIMIT 4";
$result_tuongtu = mysqli_query($conn,$sql_tuongtu);
?>
<!-- content -->
<section style="padding-top: 100px;">
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
              <button class="btn btn-white border border-secondary px-3 soluong-giam" id="button-addon1" data-mdb-ripple-color="dark">
                <i class="bi bi-dash"></i>
              </button>
              <input type="text" class="form-control text-center border border-secondary soluong-input" placeholder="1" aria-label="Example text with button addon" aria-describedby="button-addon1" />
              <button class="btn btn-white border border-secondary px-3 soluong-tang" id="button-addon2" data-mdb-ripple-color="dark">
                <i class="bi bi-plus"></i>
              </button>
            </div>
            <a class="btn btn-primary shadow-0 add-to-cart" data-mahang="<?php echo $row['MAHANG'] ?>">Thêm vào giỏ hàng</a>
          </div>
        </div>
        
      </div>
    </main>
  </div>
</div>
</section>
<!-- content -->

<section class="py-4">
  <div class="container">
    <div class="row gx-4">

      <div class="col-lg-8 mb-4">
        <div class="border rounded-2 px-3 py-2 bg-white">
          <!-- Pills navs -->
          <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item d-flex" role="presentation">
              <h4>Thông số kỹ thuật</h4>
            </li>
          </ul>
          <!-- Pills navs -->

          <!-- Pills content -->
          <div class="tab-content" id="ex1-content">
            <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">
              <p>
                <?php echo $row['THONGSOKYTHUAT'] ?>
              </p>
            </div>
          </div>
          <!-- Pills content -->
        </div>
      </div>

      <div class="col-lg-4">
        <div class="px-0 border rounded-2 shadow-0">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sản phẩm tương tự</h5>
              <?php
              while ($row_tuongtu = mysqli_fetch_assoc($result_tuongtu)) {
                ?>
                <div class="d-flex mb-3">
                  <a href="index.php?hienthi=shop&mathang=<?php echo $row_tuongtu['MAHANG'] ?>" class="me-3">
                    <img src="../hinhanh/<?php echo $row_tuongtu['ANHMINHHOA'] ?>" style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                  </a>
                  <div class="info">
                    <a href="index.php?hienthi=shop&mathang=<?php echo $row_tuongtu['MAHANG'] ?>" class="nav-link mb-1">
                      <?php echo $row_tuongtu['TENHANG'] ?>
                    </a>
                    <strong class="text-dark"> <?php echo number_format($row['GIABAN'], 0, ',', '.').'đ' ?></strong>
                  </div>
                </div>
                <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
$conn->close();
?>

<style>
  .icon-hover:hover {
    border-color: #3b71ca !important;
    background-color: white !important;
    color: #3b71ca !important;
  }

  .icon-hover:hover i {
    color: #3b71ca !important;
  }
</style>