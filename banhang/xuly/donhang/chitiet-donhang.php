<?php
session_start();
require '../../../cauhinh/env.php'; // Kết nối cơ sở dữ liệu

// Kiểm tra xem có mã đơn hàng và mã sản phẩm không
if (!isset($_GET['madonhang']) || empty($_GET['madonhang']) || !isset($_GET['mahang']) || empty($_GET['mahang'])) {
    echo "Mã đơn hàng hoặc mã sản phẩm không hợp lệ.";
    exit;
}

$madonhang = mysqli_real_escape_string($conn, $_GET['madonhang']);
$mahang = mysqli_real_escape_string($conn, $_GET['mahang']);

// Lấy thông tin sản phẩm trong đơn hàng từ bảng CTDONHANG
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

// Nếu có form submit, xử lý cập nhật
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $soluong = mysqli_real_escape_string($conn, $_POST['soluong']);
    $mucgiamgia = mysqli_real_escape_string($conn, $_POST['mucgiamgia']);
    
    // Cập nhật lại thông tin sản phẩm trong đơn hàng
    $update_sql = "
        UPDATE CTDONHANG 
        SET SOLUONG = '$soluong', MUCGIAMGIA = '$mucgiamgia'
        WHERE MADONHANG = '$madonhang' AND MAHANG = '$mahang'
    ";

    if (mysqli_query($conn, $update_sql)) {
        header("Location: chitiet-donhang.php?madonhang=$madonhang");
        exit;
    } else {
        echo "Lỗi khi cập nhật thông tin sản phẩm: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
