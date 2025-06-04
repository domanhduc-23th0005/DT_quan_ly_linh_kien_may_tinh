<?php
session_start();
require '../../../cauhinh/env.php'; // Kết nối CSDL

// Kiểm tra xem có mã đơn hàng không
if (!isset($_GET['madonhang']) || empty($_GET['madonhang'])) {
    echo "Mã đơn hàng không hợp lệ.";
    exit;
}

$madonhang = mysqli_real_escape_string($conn, $_GET['madonhang']);

// Lấy thông tin đơn hàng từ cơ sở dữ liệu
$sql = "SELECT * FROM DONHANG WHERE MADONHANG = '$madonhang'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "Không tìm thấy đơn hàng.";
    exit;
}

$row = mysqli_fetch_assoc($result);
$trangthai = $row['TRANGTHAI'];

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../images/favicon.png" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <title>Sửa đơn hàng</title>
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
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
            color: #333;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group select {
            background-color: #fff;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
            display: inline-block;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .back-btn {
            text-align: center;
            margin-top: 20px;
        }
        .btn-back {
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn-back:hover {
            background-color: #da190b;
        }
    </style>
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</head>
<body>
    <h2>Sửa thông tin đơn hàng</h2>

    <div class="container">
      <form action="../../xuly/donhang/xuly-donhang.php?action=sua" method="POST">

        <input type="hidden" name="madonhang" value="<?= htmlspecialchars($madonhang) ?>">

        <div class="form-group">
            <label for="ngaybanhang">Ngày bán hàng:</label>
            <input type="text" id="ngaybanhang" name="ngaybanhang" value="<?= date('Y-m-d H:i:s', strtotime($row['NGAYBANHANG'])) ?>" class="form-control" placeholder="YYYY-MM-DD HH:MM:SS" required>
        </div>

        <div class="form-group">
            <label for="trangthai">Trạng thái:</label>
            <select name="trangthai" required>
                <option value="0" <?= $trangthai == 0 ? 'selected' : '' ?>>Chờ xử lý</option>
                <option value="1" <?= $trangthai == 1 ? 'selected' : '' ?>>Đã xác nhận</option>
                <option value="2" <?= $trangthai == 2 ? 'selected' : '' ?>>Đang giao hàng</option>
                <option value="3" <?= $trangthai == 3 ? 'selected' : '' ?>>Hoàn thành</option>
                <option value="4" <?= $trangthai == 4 ? 'selected' : '' ?>>Đã huỷ</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn">Cập nhật</button>
        </div>
    </form>

    <div class="back-btn">
        <a href="danhsach-donhang.php" class="btn-back">Quay về danh sách</a>
    </div>
</div>
</body>
</html>

<script>
    flatpickr("#ngaybanhang", {
        enableTime: true,
        enableSeconds: true,
        dateFormat: "Y-m-d H:i:S",
        time_24hr: true
    });
</script>
