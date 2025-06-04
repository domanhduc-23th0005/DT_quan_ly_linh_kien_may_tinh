<?php
session_start();
require '../../../cauhinh/env.php'; // Kết nối CSDL

// Kiểm tra xem có mã đơn hàng không
if (!isset($_GET['madonhang']) || empty($_GET['madonhang'])) {
    echo "Mã đơn hàng không hợp lệ.";
    exit;
}

$madonhang = mysqli_real_escape_string($conn, $_GET['madonhang']);

// Lấy thông tin đơn hàng từ CSDL để xác nhận trước khi xóa
$sql = "SELECT * FROM DONHANG WHERE MADONHANG = '$madonhang'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "Không tìm thấy đơn hàng.";
    exit;
}

$row = mysqli_fetch_assoc($result);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../images/favicon.png" type="image/x-icon"/>
    <title>Xóa đơn hàng</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .container {
            background: #fff;
            padding: 20px;
            width: 500px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
            text-align: center;
        }
        .btn {
            padding: 10px 20px;
            margin: 10px;
            text-decoration: none;
            color: #fff;
            border-radius: 4px;
        }
        .btn-delete {
            background-color: #e74c3c;
        }
        .btn-cancel {
            background-color: #3498db;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Xác nhận xóa đơn hàng</h2>
        <p>Bạn có chắc chắn muốn xóa đơn hàng <strong><?= htmlspecialchars($madonhang) ?></strong> không?</p>

        <form action="../../xuly/donhang/xoa-donhang.php?action=xoa" method="POST">
            <input type="hidden" name="madonhang" value="<?= htmlspecialchars($madonhang) ?>">
            <button type="submit" class="btn btn-delete">Xóa</button>
            <a href="danhsach-donhang.php" class="btn btn-cancel">Hủy</a>
        </form>
    </div>
</body>
</html>
