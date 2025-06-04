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

// Nếu có form submit, xử lý cập nhật
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Kiểm tra xem có dữ liệu gửi lên không
    if (isset($_POST['soluong']) && isset($_POST['mucgiamgia'])) {
        $soluong = mysqli_real_escape_string($conn, $_POST['soluong']);
        $mucgiamgia = mysqli_real_escape_string($conn, $_POST['mucgiamgia']);
        
        // Cập nhật lại thông tin sản phẩm trong đơn hàng
        $update_sql = "
            UPDATE CTDONHANG 
            SET SOLUONG = '$soluong', MUCGIAMGIA = '$mucgiamgia'
            WHERE MADONHANG = '$madonhang' AND MAHANG = '$mahang'
        ";

        if (mysqli_query($conn, $update_sql)) {
            // Chuyển hướng về trang chi tiết đơn hàng sau khi cập nhật thành công
            header("Location: ../../../banhang/hienthi/donhang/chitiet-donhang.php?madonhang=$madonhang");
            exit;
        } else {
            echo "Lỗi khi cập nhật thông tin sản phẩm: " . mysqli_error($conn);
        }
    } else {
        echo "Dữ liệu không hợp lệ.";
    }

    // Đóng kết nối sau khi xử lý
    mysqli_close($conn);
}
?>
