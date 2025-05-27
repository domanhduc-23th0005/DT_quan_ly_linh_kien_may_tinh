<?php
require('../cauhinh/env.php');
?>

<!-- Banner -->
<section id="billboard" class="position-relative overflow-hidden bg-light-blue" style="padding-top: 100px;">
  <div class="swiper main-swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="container">
          <div class="row">
            <div class="banner-content position-absolute" style="display: none;">
              <h1 class="display-2 text-uppercase text-dark pb-5">Sản Phẩm Chính Hãng.</h1>
              <a href="shop.html" class="btn btn-medium btn-dark text-uppercase btn-rounded-none">Shop Now</a>
            </div>
            <div class="image-holder text-center">
              <img src="images/banner-1.png" alt="banner" height="500">
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="container">
          <div class="row">
            <div class="banner-content position-absolute" style="display: none;">
              <h1 class="display-2 text-uppercase text-dark pb-5">Sản Phẩm Chính Hãng.</h1>
              <a href="shop.html" class="btn btn-medium btn-dark text-uppercase btn-rounded-none">Shop Now</a>
            </div>
            <div class="image-holder text-center">
              <img src="images/banner-2.png" alt="banner" height="500">
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="container">
          <div class="row">
            <div class="banner-content position-absolute" style="display: none;">
              <h1 class="display-2 text-uppercase text-dark pb-5">Sản Phẩm Chính Hãng.</h1>
              <a href="shop.html" class="btn btn-medium btn-dark text-uppercase btn-rounded-none">Shop Now</a>
            </div>
            <div class="image-holder text-center">
              <img src="images/banner-3.png" alt="banner" height="500">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="swiper-icon swiper-arrow swiper-arrow-prev">
    <svg class="chevron-left">
      <use xlink:href="#chevron-left" />
    </svg>
  </div>
  <div class="swiper-icon swiper-arrow swiper-arrow-next">
    <svg class="chevron-right">
      <use xlink:href="#chevron-right" />
    </svg>
  </div>
</section>

<!-- Chính sách -->
<section id="company-services" class="padding-large no-padding-bottom">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6 pb-3">
        <div class="icon-box d-flex">
          <div class="icon-box-icon pe-3 pb-3">
            <svg class="cart-outline">
              <use xlink:href="#cart-outline" />
            </svg>
          </div>
          <div class="icon-box-content">
            <h3 class="card-title text-uppercase text-dark">Miễn phí vận chuyển</h3>
            <p>Phí ship 0đ cho tất cả các đơn hàng.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 pb-3">
        <div class="icon-box d-flex">
          <div class="icon-box-icon pe-3 pb-3">
            <svg class="quality">
              <use xlink:href="#quality" />
            </svg>
          </div>
          <div class="icon-box-content">
            <h3 class="card-title text-uppercase text-dark">Bảo hành lên đến 36 tháng</h3>
            <p>Chính sách bảo hành từ hãng.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 pb-3">
        <div class="icon-box d-flex">
          <div class="icon-box-icon pe-3 pb-3">
            <svg class="price-tag">
              <use xlink:href="#price-tag" />
            </svg>
          </div>
          <div class="icon-box-content">
            <h3 class="card-title text-uppercase text-dark">Giá tốt mỗi ngày</h3>
            <p>Nhiều chương trình khuyến mãi hấp dẫn.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 pb-3">
        <div class="icon-box d-flex">
          <div class="icon-box-icon pe-3 pb-3">
            <svg class="shield-plus">
              <use xlink:href="#shield-plus" />
            </svg>
          </div>
          <div class="icon-box-content">
            <h3 class="card-title text-uppercase text-dark">100% bảo mật giao dịch</h3>
            <p>Thông tin của bạn luôn được an toàn.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Sản phẩm -->
<?php
$sql_loaihang = "SELECT * FROM loaihang";
$result_loaihang = mysqli_query($conn,$sql_loaihang);
if (mysqli_num_rows($result_loaihang) != 0) {
  while ($row_loaihang = mysqli_fetch_assoc($result_loaihang)) {
    $maLoai = $row_loaihang['MALOAIHANG'];
    $tenLoai = $row_loaihang['TENLOAIHANG'];

    // Tạo class ID duy nhất cho swiper này
    $swiperClass = "swiper-loaihang-" . $maLoai;
    $paginationId = "pagination-" . $maLoai;
    ?>
    <section id="<?php echo $paginationId ?>" class="product-store position-relative padding-large no-padding-top">
      <div class="container">
        <div class="row">

          <div class="display-header d-flex justify-content-between pb-3">
            <h2 class="display-7 text-dark text-uppercase"><?php echo $row_loaihang['TENLOAIHANG'] ?></h2>
            <div class="btn-right">
              <a href="index.php?loaihang=<?php echo $row_loaihang['MALOAIHANG'] ?>" class="btn btn-medium btn-normal text-uppercase">Xem tất cả</a>
            </div>
          </div>

          <div class="swiper product-swiper <?php echo $swiperClass ?>">
            <div class="swiper-wrapper">

              <?php
              $sql_mathang = "SELECT * FROM mathang WHERE MALOAIHANG = $maLoai LIMIT 5";
              $result_mathang = mysqli_query($conn,$sql_mathang);
              while ($row_mathang = mysqli_fetch_assoc($result_mathang)) {
                ?>
                <div class="swiper-slide">
                  <div class="product-card position-relative">
                    <div class="image-holder" style="height: 200px;">
                      <img src="../hinhanh/<?php echo $row_mathang['ANHMINHHOA'] ?>" alt="product-item" class="img-fluid" width="200">
                    </div>
                    <div class="cart-concern position-absolute">
                      <div class="cart-button d-flex">
                        <a href="#" class="btn btn-medium btn-black add-to-cart-one" data-mahang="<?php echo $row_mathang['MAHANG'] ?>">Thêm vào giỏ hàng<svg class="cart-outline"><use xlink:href="#cart-outline"></use></svg></a>
                      </div>
                    </div>
                    <div class="card-detail">
                      <span class="item-price text-primary"><?php echo number_format($row_mathang['GIABAN'], 0, ',', '.').'đ' ?></span>
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

        </div>
      </div>
      <div class="swiper-pagination position-absolute text-center"></div>
    </section>
    <?php
  }
}
?>

<?php
$sql_hot = "SELECT * FROM mathang ORDER BY RAND() LIMIT 5";
$result_hot = mysqli_query($conn, $sql_hot);
?>
<section id="instagram" class="padding-large overflow-hidden no-padding-top">
  <div class="container">
    <div class="row">
      <div class="display-header text-uppercase text-dark text-center pb-3">
        <h2 class="display-7 text-danger">Sản phẩm HOT <i class="bi bi-fire"></i></h2>
      </div>
      <div class="d-flex flex-wrap">
        <?php
        while ($row_hot = mysqli_fetch_assoc($result_hot)) {
          ?>
          <figure class="instagram-item pe-2">
            <a href="index.php?hienthi=shop&mathang=<?php echo $row_hot['MAHANG'] ?>" class="image-link position-relative">
              <img src="../hinhanh/<?php echo $row_hot['ANHMINHHOA'] ?>" alt="instagram" class="insta-image">
              <div class="icon-overlay position-absolute d-flex justify-content-center">
                <i class="bi bi-fire h1"></i>
              </div>
            </a>
          </figure>
          <?php
        }
        ?>
      </div>
    </div>
  </div>
</section>

<?php
$conn->close();
?>

<script type="text/javascript" src="js/script.js"></script>