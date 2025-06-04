<?php
session_start();
require '../../../cauhinh/env.php'; // Kết nối cơ sở dữ liệu

// Kiểm tra mã đơn hàng và mã sản phẩm
if (!isset($_GET['madonhang']) || empty($_GET['madonhang']) || !isset($_GET['mahang']) || empty($_GET['mahang'])) {
    echo "Mã đơn hàng hoặc mã sản phẩm không hợp lệ.";
    exit;
}

$madonhang = mysqli_real_escape_string($conn, $_GET['madonhang']);
$mahang = mysqli_real_escape_string($conn, $_GET['mahang']);

// Truy vấn thông tin chi tiết sản phẩm
$sql = "
    SELECT 
        c.MAHANG, c.GIABAN, c.SOLUONG, c.MUCGIAMGIA
    FROM 
        CTDONHANG c
    WHERE 
        c.MADONHANG = '$madonhang' AND c.MAHANG = '$mahang'
";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "Không tìm thấy sản phẩm trong đơn hàng.";
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
    <title>Sửa chi tiết đơn hàng</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #e0eafc, #cfdef3);
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 60px auto;
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        h3 {
            text-align: center;
            color: #555;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
            transition: border 0.3s;
        }

        .form-group input:focus {
            border-color: #4CAF50;
            outline: none;
        }

        .form-group input[type="number"] {
            appearance: textfield;
            -webkit-appearance: none;
            -moz-appearance: textfield;
        }

        .form-group button {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s;
        }

        .form-group button:hover {
            background-color: #43a047;
        }

        .btn-back {
            display: block;
            margin-top: 25px;
            padding: 12px;
            background-color: #e53935;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            text-align: center;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .btn-back:hover {
            background-color: #c62828;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sửa thông tin sản phẩm trong đơn hàng #<?= htmlspecialchars($madonhang) ?></h2>
        <h3>Thông tin sản phẩm</h3>
        <form action="../../xuly/donhang/xuly-suachitiet-donhang.php?madonhang=<?= urlencode($madonhang) ?>&mahang=<?= urlencode($mahang) ?>" method="POST">
            <div class="form-group">
                <label for="mahang">Mã sản phẩm:</label>
                <input type="text" id="mahang" name="mahang" value="<?= htmlspecialchars($row['MAHANG']) ?>" readonly>
            </div>

            <div class="form-group">
                <label for="soluong">Số lượng:</label>
                <input type="number" id="soluong" name="soluong" value="<?= htmlspecialchars($row['SOLUONG']) ?>" required>
            </div>

            <div class="form-group" style="display: none;">
                <label for="mucgiamgia">Mức giảm giá:</label>
                <input type="text" id="mucgiamgia" name="mucgiamgia" value="<?= htmlspecialchars($row['MUCGIAMGIA']) ?>" readonly>
            </div>

            <div class="form-group">
                <button type="submit">Cập nhật</button>
            </div>
        </form>

        <a href="chitiet-donhang.php?madonhang=<?= urlencode($madonhang) ?>" class="btn-back">Quay lại chi tiết đơn hàng</a>
    </div>
</body>
</html>
