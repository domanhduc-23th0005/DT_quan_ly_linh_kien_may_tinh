<?php 
require_once('../../../cauhinh/env.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $maDonHang = $_POST['MADONHANG'];
    $trangThai = $_POST['TRANGTHAI'];

    // Cập nhật trạng thái đơn hàng
    $updateQuery = "UPDATE donhang SET trangthai = ? WHERE MADONHANG = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("si", $trangThai, $maDonHang);
    $stmt->execute();

    // Kiểm tra nếu cập nhật thành công
    if ($stmt->affected_rows > 0) {
        echo "Trạng thái đơn hàng đã được cập nhật thành công.";
    } else {
        echo "Không thể cập nhật trạng thái đơn hàng. Vui lòng thử lại.";
    }

    // Chuyển hướng về trang đơn hàng
    header("Location: ../../index.php?quanly=donhang&hienthi=danhsach");
    exit();
    
}
else {
    echo "Yêu cầu không hợp lệ.";
}
