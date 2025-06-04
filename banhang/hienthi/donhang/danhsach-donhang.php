<?php
session_start();
include '../../xuly/donhang/danhsach-donhang.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../images/favicon.png" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <title>Danh sách đơn hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            margin-top: 30px;
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 30px auto;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }
        td {
            color: #555;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .btn, .btn-danger, .btn-warning {
            padding: 8px 15px;
            margin: 5px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            font-size: 14px;
            text-align: center;
        }
        .btn {
            background-color: #4CAF50; /* Xanh */
            color: white;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .btn-danger {
            background-color: #f44336; /* Đỏ */
            color: white;
        }
        .btn-danger:hover {
            background-color: #da190b;
        }
        .btn-warning {
            background-color: #ff9800; /* Vàng */
            color: white;
        }
        .btn-warning:hover {
            background-color: #fb8c00;
        }
        .btn:active, .btn-danger:active, .btn-warning:active {
            transform: scale(0.98);
        }
        .btn:focus, .btn-danger:focus, .btn-warning:focus {
            outline: none;
        }
        .action-btns {
            display: flex;
            justify-content: center;
        }
        .back-btn {
            text-align: center;
            margin-top: 20px;
        }
        .back-btn a {
            text-decoration: none;
            background-color: #4CAF50;
            padding: 10px 20px;
            color: white;
            border-radius: 4px;
            font-size: 16px;
            display: inline-block;
        }
        .back-btn a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>
        <?php
        if (isset($_GET['makh']) && !empty($_GET['makh'])) {
            echo "Danh sách đơn hàng của khách hàng: " . htmlspecialchars($_GET['makh']);
        } else {
            echo "Danh sách đơn hàng của bạn";
        }
        ?>
    </h2>

    <table>
        <tr>
            <th>Mã khách hàng</th>
            <th>Mã đơn hàng</th>
            <th>Ngày bán hàng</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
        <?php if (!empty($donhangs)): ?>
            <?php foreach ($donhangs as $row): 
                switch ($row['TRANGTHAI']) {
                    case 0: $trangthai = "Chờ xử lý"; break;
                    case 1: $trangthai = "Đã xác nhận"; break;
                    case 2: $trangthai = "Đang giao hàng"; break;
                    case 3: $trangthai = "Hoàn thành"; break;
                    case 4: $trangthai = "Đã hủy"; break;
                    default: $trangthai = "Không xác định";
                }
                ?>
                <tr>
                    <td><?= htmlspecialchars($row['MAKHACHHANG']) ?></td>
                    <td><?= htmlspecialchars($row['MADONHANG']) ?></td>
                    <td><?= htmlspecialchars($row['NGAYBANHANG']) ?></td>
                    <td><?= $trangthai ?></td>
                    <td class="action-btns">
                        <a class="btn" href="chitiet-donhang.php?madonhang=<?= urlencode($row['MADONHANG']) ?>">Chi tiết</a>
                        <a class="btn-warning" href="sua-donhang.php?madonhang=<?= urlencode($row['MADONHANG']) ?>">Sửa</a>
                        <?php
                        if ($trangthai == "Chờ xử lý") {
                            ?>
                            <a class="btn-danger" href="../../xuly/donhang/xoa-donhang.php?action=xoa&madonhang=<?= urlencode($row['MADONHANG']) ?>">Xóa</a>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5">Không có đơn hàng nào.</td></tr>
        <?php endif; ?>
    </table>

    <div class="back-btn">
        <a href="../../index.php">Quay về trang chủ</a>
    </div>
</body>
</html>
