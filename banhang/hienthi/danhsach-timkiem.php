<?php
require('../cauhinh/env.php');
if (!isset($_GET['s'])) {
    header("Location: index.php");
}
?>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.product-swiper', {
        slidesPerView: 4,
        spaceBetween: 30,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
</script>

<div style="padding-top: 100px;">

<!--Sản phẩm -->
<?php
require('../cauhinh/env.php');

// Kiểm tra tham số tìm kiếm
$timkiem = isset($_GET['s']) ? mysqli_real_escape_string($conn, $_GET['s']) : '';

if (!empty($timkiem)) {
    // Xác định số sản phẩm trên mỗi trang
    $items_per_page = 4;

    // Xác định trang hiện tại
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $page = max($page, 1); // Đảm bảo trang không nhỏ hơn 1

    // Tính toán OFFSET
    $offset = ($page - 1) * $items_per_page;

    // Truy vấn sản phẩm theo từ khóa tìm kiếm với phân trang
    $sql_timkiem = "SELECT * FROM mathang WHERE TENHANG LIKE '%$timkiem%'  LIMIT $items_per_page OFFSET $offset";
    $result_timkiem = mysqli_query($conn, $sql_timkiem);

    // Đếm tổng số sản phẩm để tính số trang
    $sql_count = "SELECT COUNT(*) AS total FROM mathang WHERE TENHANG LIKE '%$timkiem%' ";
    $result_count = mysqli_query($conn, $sql_count);
    $row_count = mysqli_fetch_assoc($result_count);
    $total_items = $row_count['total'];
    $total_pages = ceil($total_items / $items_per_page);

    if (mysqli_num_rows($result_timkiem) == 0) {
        echo "<h2 class='text-center'>Không tìm thấy sản phẩm nào</h2>";
    } else {
        echo "<h2 class='text-center'>Có " . $total_items . " sản phẩm tìm thấy</h2>";
        ?>
        <section class="product-store position-relative padding-large no-padding-top">
            <div class="container">
                <div class="row">
                    <!-- Danh sách sản phẩm -->
                    <div class="col-md-12">
                        <div class="swiper product-swiper">
                            <div class="swiper-wrapper">
                                <?php
                                while ($row_timkiem = mysqli_fetch_assoc($result_timkiem)) {
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="product-card position-relative">
                                            <div class="image-holder" style="height: 200px;">
                                                <img src="../hinhanh/<?php echo $row_timkiem['ANHMINHHOA']; ?>" alt="<?php echo htmlspecialchars($row_timkiem['TENHANG']); ?>" class="img-fluid"width="200">
                                            </div>
                                            <div class="card-detail">
                                                <h3 class="card-title text-uppercase">
                                                    <a href="index.php?hienthi=shop&mathang=<?php echo $row_timkiem['MAHANG'] ?>"><?php echo htmlspecialchars($row_timkiem['TENHANG']); ?></a>
                                                </h3>
                                                <span class="item-price text-primary"><?php echo number_format($row_timkiem['GIABAN'], 0, ',', '.') . 'đ'; ?></span>
                                            </div>
                                            <div class="cart-button mt-2">
                                                <a href="#" class="btn btn-primary add-to-cart-one" data-mahang="<?php echo $row_timkiem['MAHANG'] ?>">Thêm vào giỏ hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <!-- Swiper navigation buttons -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <!-- Swiper pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>

                <!-- Phân trang -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center mt-4">
                        <?php if ($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?s=<?php echo urlencode($timkiem); ?>&page=<?php echo $page - 1; ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                <a class="page-link" href="?s=<?php echo urlencode($timkiem); ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($page < $total_pages): ?>
                            <li class="page-item">
                                <a class="page-link" href="?s=<?php echo urlencode($timkiem); ?>&page=<?php echo $page + 1; ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </section>
        <?php
    }
} else {
    echo "<h2 class='text-center'>Vui lòng nhập từ khóa tìm kiếm</h2>";
}
?>

</div>

<?php
$conn->close();
?>

<script>
    var swiper = new Swiper('.product-swiper', {
        slidesPerView: 4,
        spaceBetween: 30,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
</script>