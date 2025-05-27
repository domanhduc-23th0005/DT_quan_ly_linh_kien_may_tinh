<?php
session_start();
// Lấy dữ liệu lỗi từ session nếu có
$errors = $_SESSION["errors"] ?? [];
$old_data = $_SESSION["old_data"] ?? [];
unset($_SESSION["errors"], $_SESSION["old_data"]); // Xóa lỗi sau khi hiển thị
?>

<div class="container padding-bottom-3x mb-1" style="padding-top: 100px; padding-bottom: 100px;">
    <?php
    if (isset($_GET['success'])) {
        ?>
        <div class="alert alert-success alert-dismissible fade show text-center" style="margin-bottom: 30px;"><span class="alert-close" data-dismiss="alert"></span><h4>Đặt hàng thành công.</h4></div>
        <a type="button" class="btn btn-outline-secondary" href="index.php"><i class="bi bi-arrow-left-short"></i> Tiếp tục mua sắm</a>
        <?php
    } else {
        ?>
        <div class="alert alert-info alert-dismissible fade show text-center" style="margin-bottom: 30px;"><span class="alert-close" data-dismiss="alert"></span><h4>Nhập thông tin để đặt hàng</h4></div>
        <form action="xuly/giohang/dathang.php" method="POST">
            <div class="row">
                <div class="col-md-3 col-lg-4">
                </div>
                <div class="col-md-6 col-lg-4 mb-3">
                    <label for="lienhe" class="form-label">Email/Số diện thoại:</label>
                    <?php
                    if (!empty($errors)) { 
                        ?>
                        <div class="text-danger">
                            <ul>
                                <?php foreach ($errors as $error) { ?>
                                    <li><?php echo $error ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php
                    }
                    ?>
                    <input type="text" class="form-control" placeholder="Email hoặc Số điện thoại" name="lienhe" required>
                    <br>
                    <button type="submit" class="btn btn-success">Xác nhận</button>
                </div>
                <div class="col-md-3 col-lg-4">
                </div>
            </div>
        </form>
        <?php
    }
    ?>
</div>