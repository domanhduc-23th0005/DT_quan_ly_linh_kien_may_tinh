<?php
session_start();
require '../../../cauhinh/env.php';

if (!isset($_GET['madonhang']) || !isset($_GET['mahang'])) {
    echo "Thiếu thông tin.";
    exit;
}

$madonhang = $_GET['madonhang'];
$mahang = $_GET['mahang'];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../images/favicon.png" type="image/x-icon"/>
    <title>Xoá sản phẩm khỏi đơn hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            background: white;
            padding: 20px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.2);
            text-align: center;
        }
        .btn {
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            color: white;
            margin: 10px;
        }
        .btn-danger {
            background-color: #e74c3c;
        }
        .btn-secondary {
            background-color: #7f8c8d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Xác nhận xoá</h2>
        <p>Bạn có chắc muốn xoá sản phẩm <strong><?= htmlspecialchars($mahang) ?></strong> khỏi đơn hàng <strong>#<?= htmlspecialchars($madonhang) ?></strong> không?</p>
        <a href="../../xuly/donhang/xuly-xoachitiet-donhang.php?madonhang=<?= urlencode($madonhang) ?>&mahang=<?= urlencode($mahang) ?>" class="btn btn-danger">Xoá</a>
        <a href="chitiet-donhang.php?madonhang=<?= urlencode($madonhang) ?>" class="btn btn-secondary">Huỷ</a>
    </div>
</body>
</html>
