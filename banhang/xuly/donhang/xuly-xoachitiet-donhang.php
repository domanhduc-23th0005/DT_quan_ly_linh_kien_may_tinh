<?php
session_start();
require '../../../cauhinh/env.php';

if (!isset($_GET['madonhang']) || !isset($_GET['mahang'])) {
    echo "Thiếu thông tin.";
    exit;
}

$madonhang = mysqli_real_escape_string($conn, $_GET['madonhang']);
$mahang = mysqli_real_escape_string($conn, $_GET['mahang']);

$sql = "DELETE FROM CTDONHANG WHERE MADONHANG = '$madonhang' AND MAHANG = '$mahang'";

if (mysqli_query($conn, $sql)) {
    header("Location: ../../hienthi/donhang/chitiet-donhang.php?madonhang=$madonhang");
    exit;
} else {
    echo "Lỗi khi xoá chi tiết đơn hàng: " . mysqli_error($conn);
}
?>
