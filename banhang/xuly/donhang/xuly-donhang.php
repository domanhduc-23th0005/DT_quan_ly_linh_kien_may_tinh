<?php
session_start();
require '../../../cauhinh/env.php';

if (isset($_GET['action']) && $_GET['action'] == 'sua' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $madonhang = mysqli_real_escape_string($conn, $_POST['madonhang']);
    $ngaybanhang = mysqli_real_escape_string($conn, $_POST['ngaybanhang']);
    $trangthai = mysqli_real_escape_string($conn, $_POST['trangthai']);

    // Cập nhật đơn hàng
    $sql = "UPDATE DONHANG SET NGAYBANHANG = '$ngaybanhang', TRANGTHAI = '$trangthai' WHERE MADONHANG = '$madonhang'";

    if (mysqli_query($conn, $sql)) {
        // Chuyển hướng về danh sách đơn hàng
        header('Location: ../../hienthi/donhang/danhsach-donhang.php');
        exit;
    } else {
        echo "Lỗi khi cập nhật đơn hàng: " . mysqli_error($conn);
    }
}
?>
