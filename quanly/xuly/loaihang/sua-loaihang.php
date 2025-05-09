<?php
session_start();
include('../../../cauhinh/env.php'); // Kết nối database

if (isset($_POST['submit'])) {
    $maloaihang = $_POST['maloaihang'] ?? '';

    if (empty($maloaihang)) {
        $_SESSION["thongbao"] = ["Mã loại hàng không hợp lệ."];
        header("Location: ../../index.php?quanly=loaihang&hienthi=danhsach");
        exit();
    }

    // Kiểm tra loại hàng tồn tại
    $sql_check = "SELECT TENLOAIHANG FROM loaihang WHERE MALOAIHANG = ?";
    $stmt_check = $conn->prepare($sql_check);
    if (!$stmt_check) {
        die("Lỗi truy vấn: " . $conn->error);
    }
    $stmt_check->bind_param("i", $maloaihang);
    $stmt_check->execute();
    $stmt_check->bind_result($existing_tenloaihang);
    $stmt_check->fetch();
    $stmt_check->close();

    // Lấy dữ liệu từ form
    $tenloaihang = trim($_POST['tenloaihang']);
    $thongbao = [];

    // Kiểm tra tên loại hàng trùng lặp (ngoại trừ chính nó)
    $sql_check_name = "SELECT COUNT(*) FROM loaihang WHERE TENLOAIHANG = ? AND MALOAIHANG != ?";
    $stmt_check_name = $conn->prepare($sql_check_name);
    $stmt_check_name->bind_param("si", $tenloaihang, $maloaihang);
    $stmt_check_name->execute();
    $stmt_check_name->bind_result($count);
    $stmt_check_name->fetch();
    $stmt_check_name->close();

    if ($count > 0) {
        $thongbao[] = "Tên loại hàng đã tồn tại, vui lòng chọn tên khác.";
    }

    if (!empty($thongbao)) {
        $_SESSION["thongbao"] = $thongbao;
        header("Location: ../../index.php?quanly=loaihang&hienthi=sua&id=$maloaihang");
        exit();
    }

    // Cập nhật dữ liệu
    $sql_update = "UPDATE loaihang SET TENLOAIHANG = ? WHERE MALOAIHANG = ?";
    $stmt = $conn->prepare($sql_update);
    if (!$stmt) {
        die("Lỗi truy vấn: " . $conn->error);
    }
    $stmt->bind_param("si", $tenloaihang, $maloaihang);

    if ($stmt->execute()) {
        $_SESSION["thongbao"] = "Cập nhật thành công!";
        header("Location: ../../index.php?quanly=loaihang&hienthi=sua&id=$maloaihang&thongbao=1");
    } else {
        $_SESSION["thongbao"] = ["Lỗi khi cập nhật dữ liệu: " . $stmt->error];
        header("Location: ../../index.php?quanly=loaihang&hienthi=sua&id=$maloaihang&thongbao=0");
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../../index.php?quanly=loaihang&hienthi=danhsach");
    exit();
}
?>
