<?php
session_start();
include('../../../cauhinh/env.php'); // Kết nối database

if (isset($_POST['submit'])) {
    $tenloaihang = trim($_POST['tenloaihang']);
    $thongbao = [];

    // Hàm kiểm tra loại hàng tồn tại
    function isLoaiHangExists($conn, $tenloaihang) {
        $sql = "SELECT COUNT(*) FROM loaihang WHERE TENLOAIHANG = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) return false;
        $stmt->bind_param("s", $tenloaihang);
        $stmt->execute();
        $stmt->bind_result($conn);
        $stmt->fetch();
        $stmt->close();
        return $conn > 0;
    }

    // Kiểm tra tên loại hàng
    if (isLoaiHangExists($conn, $tenloaihang)) {
        $thongbao[] = "Tên loại hàng đã tồn tại, vui lòng chọn tên khác.";
    }

    // Nếu có lỗi, quay lại trang thêm loại hàng
    if (!empty($thongbao)) {
        $_SESSION["thongbao"] = $thongbao;
        $_SESSION["old_data"] = $_POST;
        header("Location: ../../index.php?quanly=loaihang&hienthi=them&thongbao=0");
        exit();
    }

    // Chuẩn bị câu lệnh SQL
    $sql_insert = "INSERT INTO loaihang (TENLOAIHANG) VALUES (?)";
    $stmt = $conn->prepare($sql_insert);
    if (!$stmt) {
        $_SESSION["thongbao"] = ["Lỗi truy vấn: " . $conn->error];
        header("Location: ../../index.php?quanly=loaihang&hienthi=them");
        exit();
    }

    $stmt->bind_param("s", $tenloaihang);

    if ($stmt->execute()) {
        $_SESSION["thongbao"] = "Thêm thành công!";
        header("Location: ../../index.php?quanly=loaihang&hienthi=them&thongbao=1");
        exit();
    } else {
        $_SESSION["thongbao"] = ["Lỗi khi thêm vào database: " . $stmt->error];
        header("Location: ../../index.php?quanly=loaihang&hienthi=them&thongbao=0");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../../index.php?quanly=loaihang&hienthi=danhsach");
    exit();
}
?>
