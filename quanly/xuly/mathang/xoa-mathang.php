<?php
session_start();
require('../../../cauhinh/env.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Lấy tên ảnh trước khi xóa mặt hàng
    $sql_get_image = "SELECT ANHMINHHOA FROM MATHANG WHERE MAHANG = ?";
    $stmt_get_image = $conn->prepare($sql_get_image);
    $stmt_get_image->bind_param("s", $id);
    $stmt_get_image->execute();
    $stmt_get_image->bind_result($image);
    $stmt_get_image->fetch();
    $stmt_get_image->close();

    // Xóa mặt hàng khỏi database
    $sql_delete = "DELETE FROM MATHANG WHERE MAHANG = ?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("s", $id);

    if ($stmt_delete->execute()) {
        // Nếu xóa thành công, kiểm tra và xóa ảnh
        if (!empty($image)) {
            $image_path = "../../../hinhanh/" . $image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        // Chuyển hướng sau khi xóa thành công
        header("Location: ../../index.php?quanly=mathang&hienthi=danhsach");
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
