<?php
session_start();
include('../../../cauhinh/env.php');

if (isset($_POST['submit'])) {
    $makhachhang = $_POST['makhachhang'] ?? '';

    if (empty($makhachhang)) {
        $_SESSION['thongbao'] = ["Mã khách hàng không hợp lệ."];
        header("Location: ../../index.php?quanly=khachhang&hienthi=danhsach&thongbao=0");
        exit();
    }

    // Xóa khách hàng
    $sql = "DELETE FROM khachhang WHERE MAKHACHHANG = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $makhachhang);

    if ($stmt->execute()) {
        $_SESSION['thongbao'] = "Xóa khách hàng thành công!";
        header("Location: ../../index.php?quanly=khachhang&hienthi=danhsach&thongbao=1");
    } else {
        $_SESSION['thongbao'] = ["Lỗi khi xóa: " . $stmt->error];
        header("Location: ../../index.php?quanly=khachhang&hienthi=danhsach&thongbao=0");
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../../index.php?quanly=khachhang&hienthi=danhsach");
    exit();
}
?>
