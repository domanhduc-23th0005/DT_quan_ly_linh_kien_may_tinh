<?php
session_start();
require('../../../cauhinh/env.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Xóa loại hàng khỏi database
    $sql_delete = "DELETE FROM loaihang WHERE MALOAIHANG = ?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("s", $id);

    if ($stmt_delete->execute()) {
        // Chuyển hướng sau khi xóa thành công
        header("Location: ../../index.php?quanly=loaihang&hienthi=danhsach");
        exit();
    } else {
        echo "Lỗi khi xóa: " . $stmt_delete->error;
    }

    // Đóng kết nối
    $stmt_delete->close();
    $conn->close();
} else {
    echo "Không có ID hợp lệ để xóa!";
}
?>
