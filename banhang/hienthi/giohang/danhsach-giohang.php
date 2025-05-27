<?php
require('../cauhinh/env.php');

// Kiểm tra nếu giỏ hàng tồn tại
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>

<div class="container padding-bottom-3x mb-1" style="padding-top: 100px; padding-bottom: 100px;">
    <!-- Alert-->
    <div class="alert alert-info alert-dismissible fade show text-center" style="margin-bottom: 30px;"><span class="alert-close" data-dismiss="alert"></span><h4>GIỎ HÀNG</h4></div>
    <!-- Shopping Cart-->
    <div class="table-responsive shopping-cart">
        <table class="table">
            <thead>
                <tr>
                    <th>Mặt Hàng</th>
                    <th class="text-center">Số Lượng</th>
                    <th class="text-center">Đơn Giá</th>
                    <th class="text-center">Thành Tiền</th>
                    <th class="text-center">Giảm giá (%)</th>
                    <th class="text-center"><a class="btn btn-sm btn-outline-danger" href="xuly/giohang/huybo-giohang.php">Hủy Bỏ</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $tongtien = 0;
                foreach ($cart as $item) {
                    ?>
                    <tr>
                        <?php
                        $sql_giohang = "SELECT * FROM mathang WHERE MAHANG = $item[mahang]";
                        $result_giohang = mysqli_query($conn,$sql_giohang);
                        $row_giohang = mysqli_fetch_assoc($result_giohang);
                        $giamgia = 0;
                        $thanhtien = $item['soluong'] * $row_giohang['GIABAN'] * (1 - $giamgia/100);
                        $tongtien += $thanhtien;
                        ?>
                        <td>
                            <div class="product-item">
                                <a class="product-thumb" href="#"><img src="../hinhanh/<?php echo $row_giohang['ANHMINHHOA'] ?>" alt="Product" width="200"></a>
                                <div class="product-info">
                                    <h4 class="product-title"><?php echo $row_giohang['TENHANG'] ?></h4>
                                </div>
                            </div>
                        </td>
                        <td class="text-center text-lg text-medium"><?php echo $item['soluong'] ?></td>
                        <td class="text-center text-lg text-medium"><?php echo number_format($row_giohang['GIABAN'], 0, ',', '.').'đ' ?></td>
                        <td class="text-center text-lg text-medium"><?php echo number_format($row_giohang['GIABAN'] * $item['soluong'], 0, ',', '.').'đ' ?></td>
                        <td class="text-center text-lg text-medium">0</td>
                        <td class="text-center">
                            <a class="edit-from-cart text-warning" href="index.php?hienthi=giohang&sua=<?php echo $item['mahang'] ?>" data-toggle="tooltip" data-original-title="Edit item" style="margin-right: 16px;"><i class="bi bi-pencil-square"></i></a>
                            <a class="remove-from-cart text-danger" href="xuly/giohang/xoa-giohang.php?xoa=<?php echo $item['mahang'] ?>" data-toggle="tooltip" data-original-title="Remove item"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="shopping-cart-footer">
        <div class="column">
            <form class="coupon-form" method="post">
                <input class="form-control form-control-sm" type="text" placeholder="Mã giảm giá" required="">
                <button class="btn btn-outline-primary btn-sm" type="submit">Xác Nhận</button>
            </form>
        </div>
        <div class="column text-lg">TỔNG CỘNG: <span class="text-medium"><?php echo number_format($tongtien, 0, ',', '.').'đ' ?></span></div>
    </div>
    <div class="shopping-cart-footer">
        <div class="column"><a class="btn btn-outline-secondary" href="index.php"><i class="bi bi-arrow-left-short"></i> Tiếp tục mua sắm</a></div>
        <div class="column"><a class="btn btn-primary" href="xuly/giohang/dathang.php" data-toast="" data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Your cart" data-toast-message="is updated successfully!">Đặt Hàng</a></div>
    </div>
</div>

<?php
$conn->close();
?>

<style>
    table>thead>tr {
        border-top: none;
    }
    table>thead>tr>th {
        border-bottom: none;
        border-left: none;
        border-right: none;
    }

    .shopping-cart,
    .wishlist-table,
    .order-table {
        margin-bottom: 20px
    }

    .shopping-cart .table,
    .wishlist-table .table,
    .order-table .table {
        margin-bottom: 0
    }

    .shopping-cart .btn,
    .wishlist-table .btn,
    .order-table .btn {
        margin: 0
    }

    .shopping-cart>table>thead>tr>th,
    .shopping-cart>table>thead>tr>td,
    .shopping-cart>table>tbody>tr>th,
    .shopping-cart>table>tbody>tr>td,
    .wishlist-table>table>thead>tr>th,
    .wishlist-table>table>thead>tr>td,
    .wishlist-table>table>tbody>tr>th,
    .wishlist-table>table>tbody>tr>td,
    .order-table>table>thead>tr>th,
    .order-table>table>thead>tr>td,
    .order-table>table>tbody>tr>th,
    .order-table>table>tbody>tr>td {
        vertical-align: middle !important
    }

    .shopping-cart>table thead th,
    .wishlist-table>table thead th,
    .order-table>table thead th {
        padding-top: 17px;
        padding-bottom: 17px;
/*        border-width: 1px*/
}

.shopping-cart .remove-from-cart,
.wishlist-table .remove-from-cart,
.order-table .remove-from-cart {
    display: inline-block;
    font-size: 18px;
    line-height: 1;
    text-decoration: none
}

.shopping-cart .edit-from-cart,
.wishlist-table .edit-from-cart,
.order-table .edit-from-cart {
    display: inline-block;
    font-size: 18px;
    line-height: 1;
    text-decoration: none
}

.shopping-cart .count-input,
.wishlist-table .count-input,
.order-table .count-input {
    display: inline-block;
    width: 100%;
    width: 86px
}

.shopping-cart .product-item,
.wishlist-table .product-item,
.order-table .product-item {
    display: table;
    width: 100%;
    min-width: 150px;
    margin-top: 5px;
    margin-bottom: 3px
}

.shopping-cart .product-item .product-thumb,
.shopping-cart .product-item .product-info,
.wishlist-table .product-item .product-thumb,
.wishlist-table .product-item .product-info,
.order-table .product-item .product-thumb,
.order-table .product-item .product-info {
    display: table-cell;
    vertical-align: top
}

.shopping-cart .product-item .product-thumb,
.wishlist-table .product-item .product-thumb,
.order-table .product-item .product-thumb {
    width: 130px;
    padding-right: 20px
}

.shopping-cart .product-item .product-thumb>img,
.wishlist-table .product-item .product-thumb>img,
.order-table .product-item .product-thumb>img {
    display: block;
    width: 100%
}

@media screen and (max-width: 860px) {
    .shopping-cart .product-item .product-thumb,
    .wishlist-table .product-item .product-thumb,
    .order-table .product-item .product-thumb {
        display: none
    }
}

.shopping-cart .product-item .product-info span,
.wishlist-table .product-item .product-info span,
.order-table .product-item .product-info span {
    display: block;
    font-size: 13px
}

.shopping-cart .product-item .product-info span>em,
.wishlist-table .product-item .product-info span>em,
.order-table .product-item .product-info span>em {
    font-weight: 500;
    font-style: normal
}

.shopping-cart .product-item .product-title,
.wishlist-table .product-item .product-title,
.order-table .product-item .product-title {
    margin-bottom: 6px;
    padding-top: 5px;
    font-size: 16px;
    font-weight: 500
}

.shopping-cart .product-item .product-title>a,
.wishlist-table .product-item .product-title>a,
.order-table .product-item .product-title>a {
    transition: color .3s;
    color: #374250;
    line-height: 1.5;
    text-decoration: none
}

.shopping-cart .product-item .product-title>a:hover,
.wishlist-table .product-item .product-title>a:hover,
.order-table .product-item .product-title>a:hover {
    color: #0da9ef
}

.shopping-cart .product-item .product-title small,
.wishlist-table .product-item .product-title small,
.order-table .product-item .product-title small {
    display: inline;
    margin-left: 6px;
    font-weight: 500
}

.wishlist-table .product-item .product-thumb {
    display: table-cell !important
}

@media screen and (max-width: 576px) {
    .wishlist-table .product-item .product-thumb {
        display: none !important
    }
}

.shopping-cart-footer {
    display: table;
    width: 100%;
    padding: 10px 0;
    border-bottom: 1px solid #e1e7ec
}

.shopping-cart-footer>.column {
    display: table-cell;
    padding: 5px 0;
    vertical-align: middle
}

.shopping-cart-footer>.column:last-child {
    text-align: right
}

.shopping-cart-footer>.column:last-child .btn {
    margin-right: 0;
    margin-left: 15px
}

@media (max-width: 768px) {
    .shopping-cart-footer>.column {
        display: block;
        width: 100%
    }
    .shopping-cart-footer>.column:last-child {
        text-align: center
    }
    .shopping-cart-footer>.column .btn {
        width: 100%;
        margin: 12px 0 !important
    }
}

.coupon-form .form-control {
    display: inline-block;
    width: 100%;
    max-width: 235px;
    margin-right: 12px;
}

.form-control-sm:not(textarea) {
    height: 36px;
}
</style>