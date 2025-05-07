<?php
session_start();
require('../../../cauhinh/env.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Xóa thương hiệu khỏi database
    $sql_delete = "DELETE FROM thuonghieu WHERE MATHUONGHIEU = ?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("s", $id);

    if ($stmt_delete->execute()) {
        // Chuyển hướng sau khi xóa thành công
        header("Location: ../../index.php?quanly=thuonghieu&hienthi=danhsach");
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