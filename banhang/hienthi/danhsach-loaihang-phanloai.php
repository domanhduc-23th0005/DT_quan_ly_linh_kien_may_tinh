<?php
require('../cauhinh/env.php');
if (!isset($_GET['loaihang'])) {
  header("Location: index.php");
}
?>

<div style="padding-top: 100px;">

  <?php
  $sql_loaihang = "SELECT * FROM loaihang WHERE MALOAIHANG= " . $_GET['loaihang'] . ";";
  $result_loaihang = mysqli_query($conn, $sql_loaihang);
  if (mysqli_num_rows($result_loaihang) != 0) {
    while ($row_loaihang = mysqli_fetch_assoc($result_loaihang)) {
      $maLoai = $row_loaihang['MALOAIHANG'];
      $tenLoai = $row_loaihang['TENLOAIHANG'];

      // Tạo class ID duy nhất cho swiper này
      $swiperClass = "swiper-loaihang-" . $maLoai;
      $paginationId = "pagination-" . $maLoai;

      // Truy vấn danh sách thương hiệu liên quan đến loại sản phẩm
      $sql_thuonghieu = "
      SELECT DISTINCT thuonghieu.MATHUONGHIEU, thuonghieu.TENTHUONGHIEU 
      FROM mathang 
      INNER JOIN thuonghieu ON mathang.MATHUONGHIEU = thuonghieu.MATHUONGHIEU 
      WHERE mathang.MALOAIHANG = $maLoai
      ";
      $result_thuonghieu = mysqli_query($conn, $sql_thuonghieu);

      // Xác định số sản phẩm trên mỗi trang
      $items_per_page = 4;

      // Xác định trang hiện tại
      $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $page = max($page, 1); // Đảm bảo trang không nhỏ hơn 1

    // Tính toán OFFSET
    $offset = ($page - 1) * $items_per_page;

    // Truy vấn danh sách sản phẩm với phân trang
    $sql_mathang = "SELECT * FROM mathang WHERE MALOAIHANG = $maLoai";
    if (isset($_GET['thuonghieu'])) {
      $thuonghieu = $_GET['thuonghieu'];
      $thuonghieu_list = implode(',', array_map('intval', $thuonghieu));
      $sql_mathang .= " AND MATHUONGHIEU IN ($thuonghieu_list)";
    }
    $sql_mathang .= " LIMIT $items_per_page OFFSET $offset";
    $result_mathang = mysqli_query($conn, $sql_mathang);

    // Đếm tổng số sản phẩm để tính số trang
    $sql_count = "SELECT COUNT(*) AS total FROM mathang WHERE MALOAIHANG = $maLoai";
    if (isset($_GET['thuonghieu'])) {
      $sql_count .= " AND MATHUONGHIEU IN ($thuonghieu_list)";
    }
    $result_count = mysqli_query($conn, $sql_count);
    $row_count = mysqli_fetch_assoc($result_count);
    $total_items = $row_count['total'];
    $total_pages = ceil($total_items / $items_per_page);
    ?>

    <div class="text-center text-uppercase">
      <h2 class="text-center text-uppercase"><?php echo $row_loaihang['TENLOAIHANG'] ?></h2>
    </div>

    <section id="<?php echo $paginationId ?>" class="product-store position-relative padding-large no-padding-top">
      <div class="container">
        <div class="row">
          <!-- Danh sách thương hiệu -->
          <div class="col-12 mb-4">
            <div class="brand-filter d-flex flex-wrap justify-content-center align-items-center p-3" style="background-color: white;  border:0; ">
              <h4 class="text-uppercase me-3">Thương hiệu:</h4>
              <form method="GET" action="" class="d-flex flex-wrap">
                <input type="hidden" name="loaihang" value="<?php echo $maLoai; ?>">
                <?php
                while ($row_thuonghieu = mysqli_fetch_assoc($result_thuonghieu)) {
                  ?>
                  <div class="form-check me-3">
                    <input class="form-check-input" type="checkbox" name="thuonghieu[]" value="<?php echo $row_thuonghieu['MATHUONGHIEU']; ?>" id="thuonghieu-<?php echo $row_thuonghieu['MATHUONGHIEU']; ?>"
                    <?php
                    if (isset($_GET['thuonghieu']) && in_array($row_thuonghieu['MATHUONGHIEU'], $_GET['thuonghieu'])) {
                      echo 'checked';
                    }
                  ?>>
                  <label class="form-check-label" for="thuonghieu-<?php echo $row_thuonghieu['MATHUONGHIEU']; ?>">
                    <?php echo $row_thuonghieu['TENTHUONGHIEU']; ?>
                  </label>
                </div>
                <?php
              }
              ?>
              <button type="submit" class="btn btn-primary ms-3">Lọc</button>
            </form>
          </div>
        </div>

        <!-- Danh sách sản phẩm -->
        <div class="col-12">
          <div class="swiper product-swiper <?php echo $swiperClass ?>">
            <div class="swiper-wrapper">
              <?php
              while ($row_mathang = mysqli_fetch_assoc($result_mathang)) {
                ?>
                <div class="swiper-slide">
                  <div class="product-card position-relative">
                    <div class="image-holder" style="height: 200px;">
                      <img src="../hinhanh/<?php echo $row_mathang['ANHMINHHOA'] ?>" alt="product-item" class="img-fluid" width="200">
                    </div>
                    <div class="cart-concern position-absolute">
                      <div class="cart-button d-flex">
                        <a href="#" class="btn btn-medium btn-black add-to-cart-one" data-mahang="<?php echo $row_mathang['MAHANG'] ?>">Thêm vào giỏ hàng<svg class="cart-outline">
                          <use xlink:href="#cart-outline"></use>
                        </svg></a>
                      </div>
                    </div>
                    <div class="card-detail">
                      <span class="item-price text-primary"><?php echo number_format($row_mathang['GIABAN'], 0, ',', '.') . 'đ' ?></span>
                      <h3 class="card-title text-uppercase">
                        <a href="index.php?hienthi=shop&mathang=<?php echo $row_mathang['MAHANG'] ?>"><?php echo $row_mathang['TENHANG'] ?></a>
                      </h3>
                    </div>
                  </div>
                </div>
                <?php
              }
              ?>
            </div>
          </div>

          <!-- Phân trang -->
          <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center mt-4">
              <?php
                // Lấy danh sách thương hiệu đã chọn để thêm vào URL
              $thuonghieu_query = '';
              if (isset($_GET['thuonghieu'])) {
                foreach ($_GET['thuonghieu'] as $thuonghieu) {
                  $thuonghieu_query .= '&thuonghieu[]=' . intval($thuonghieu);
                }
              }
              ?>

              <?php if ($page > 1): ?>
                <li class="page-item">
                  <a class="page-link" href="?loaihang=<?php echo $maLoai; ?>&page=<?php echo $page - 1; ?><?php echo $thuonghieu_query; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              <?php endif; ?>

              <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                  <a class="page-link" href="?loaihang=<?php echo $maLoai; ?>&page=<?php echo $i; ?><?php echo $thuonghieu_query; ?>"><?php echo $i; ?></a>
                </li>
              <?php endfor; ?>

              <?php if ($page < $total_pages): ?>
                <li class="page-item">
                  <a class="page-link" href="?loaihang=<?php echo $maLoai; ?>&page=<?php echo $page + 1; ?><?php echo $thuonghieu_query; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              <?php endif; ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <?php
}
}
?>

</div>

<?php
$conn->close();
?>

<script type="text/javascript" src="js/script.js"></script>