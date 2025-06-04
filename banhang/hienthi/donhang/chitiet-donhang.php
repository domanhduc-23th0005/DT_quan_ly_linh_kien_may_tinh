<?php
session_start();
require '../../../cauhinh/env.php'; // Kết nối cơ sở dữ liệu

// Kiểm tra xem có mã đơn hàng không
if (!isset($_GET['madonhang']) || empty($_GET['madonhang'])) {
    echo "Mã đơn hàng không hợp lệ.";
    exit;
}

$madonhang = mysqli_real_escape_string($conn, $_GET['madonhang']);

// Lấy thông tin chi tiết đơn hàng từ cơ sở dữ liệu
$sql = "SELECT * FROM DONHANG WHERE MADONHANG = '$madonhang'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "Không tìm thấy đơn hàng.";
    exit;
}

$row = mysqli_fetch_assoc($result);

// Lấy chi tiết sản phẩm trong đơn hàng từ bảng CTDONHANG
$sql_ct = "
SELECT 
c.MAHANG, c.GIABAN, c.SOLUONG, c.MUCGIAMGIA
FROM 
CTDONHANG c
WHERE 
c.MADONHANG = '$madonhang'
";
$result_ct = mysqli_query($conn, $sql_ct);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../images/favicon.png" type="image/x-icon"/>
    <title>Chi tiết đơn hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2, h3 {
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        td a {
            color: #007BFF;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #007BFF;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        td a:hover {
            background-color: #007BFF;
            color: white;
        }

        p {
            font-size: 16px;
            margin: 10px 0;
        }

        .btn-back {
            display: inline-block;
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
        }

        .btn-back:hover {
            background-color: #d32f2f;
        }

        .total-row td {
            font-weight: bold;
            background-color: #e6ffe6;
        }
    </style>
</head>
<body>
    <h2>Chi tiết đơn hàng <?= htmlspecialchars($madonhang) ?></h2>

    <div class="container">
        <p><strong>Mã đơn hàng:</strong> <?= htmlspecialchars($row['MADONHANG']) ?></p>
        <p><strong>Ngày bán hàng:</strong> <?= htmlspecialchars($row['NGAYBANHANG']) ?></p>
        <p><strong>Trạng thái:</strong> 
            <?php
            switch ($row['TRANGTHAI']) {
                case 0:
                echo "Chờ xử lý";
                break;
                case 1:
                echo "Đã xác nhận";
                break;
                case 2:
                echo "Đang giao hàng";
                break;
                case 3:
                echo "Hoàn thành";
                break;
                case 4:
                echo "Đã huỷ";
                break;
                default:
                echo "Không xác định";
            }
            ?>
        </p>

        <h3>Chi tiết sản phẩm trong đơn hàng</h3>
        <table>
            <thead>
                <tr>
                    <th>Mã sản phẩm</th>
                    <th>Giá bán</th>
                    <th>Số lượng</th>
                    <th>Mức giảm giá</th>
                    <th>Tổng tiền</th>
                    <?php
                    if ($row['TRANGTHAI'] == 0) {
                        ?>
                        <th>Hành động</th>
                        <?php
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                $tongtien = 0;
                while ($ct = mysqli_fetch_assoc($result_ct)):
                    $thanhtien = $ct['GIABAN'] * $ct['SOLUONG'] * (1 - $ct['MUCGIAMGIA'] / 100);
                    $tongtien += $thanhtien;
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($ct['MAHANG']) ?></td>
                        <td><?= number_format($ct['GIABAN'], 0) ?> VND</td>
                        <td><?= htmlspecialchars($ct['SOLUONG']) ?></td>
                        <td><?= number_format($ct['MUCGIAMGIA'], 0) ?>%</td>
                        <td><?= number_format($thanhtien, 0) ?> VND</td>
                        <?php
                        if ($row['TRANGTHAI'] == 0) {
                            ?>
                            <td>
                                <a href="suachitiet-donhang.php?madonhang=<?= urlencode($madonhang) ?>&mahang=<?= urlencode($ct['MAHANG']) ?>">Sửa</a> |
                                <a href="xoachitiet-donhang.php?madonhang=<?= urlencode($madonhang) ?>&mahang=<?= urlencode($ct['MAHANG']) ?>">Xóa</a>
                            </td>
                            <?php
                        }
                        ?>
                    </tr>
                <?php endwhile; ?>
                <tr class="total-row">
                    <?php
                    if ($row['TRANGTHAI'] == 0) {
                        ?>
                        <td colspan="4" style="text-align: right;">Tổng tiền hóa đơn:</td>
                        <?php
                    } else {
                        ?>
                        <td colspan="3" style="text-align: right;">Tổng tiền hóa đơn:</td>
                        <?php
                    }
                    ?>
                    <td><?= number_format($tongtien, 0) ?> VND</td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <a href="danhsach-donhang.php" class="btn-back">Quay về danh sách</a>
    </div>
</body>
</html>
