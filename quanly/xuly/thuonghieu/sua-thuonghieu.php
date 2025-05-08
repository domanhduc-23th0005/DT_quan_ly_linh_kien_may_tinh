<?php
session_start();
include('../../../cauhinh/env.php'); // Kết nối database

if (isset($_POST['submit'])) {
    $mathuonghieu = $_POST['mathuonghieu'] ?? '';

    if (empty($mathuonghieu)) {
        $_SESSION["thongbao"] = ["Mã thương hiệu không hợp lệ."];
        header("Location: ../../index.php?quanly=thuonghieu&hienthi=danhsach");
        exit();
    }

    // Kiểm tra thương hiệu tồn tại
    $sql_check = "SELECT TENTHUONGHIEU FROM thuonghieu WHERE MATHUONGHIEU = ?";
    $stmt_check = $conn->prepare($sql_check);
    if (!$stmt_check) {
        die("Lỗi truy vấn: " . $conn->error);
    }
    $stmt_check->bind_param("i", $mathuonghieu);
    $stmt_check->execute();
    $stmt_check->bind_result($existing_tenthuonghieu);
    $stmt_check->fetch();
    $stmt_check->close();

    // Lấy dữ liệu từ form
    $tenthuonghieu = trim($_POST['tenthuonghieu']);
    $thongbao = [];

    // Kiểm tra tên thương hiệu trùng lặp (ngoại trừ chính nó)
    $sql_check_name = "SELECT COUNT(*) FROM thuonghieu WHERE TENTHUONGHIEU = ? AND MATHUONGHIEU != ?";
    $stmt_check_name = $conn->prepare($sql_check_name);
    $stmt_check_name->bind_param("si", $tenthuonghieu, $mathuonghieu);
    $stmt_check_name->execute();
    $stmt_check_name->bind_result($count);
    $stmt_check_name->fetch();
    $stmt_check_name->close();

    if ($count > 0) {
        $thongbao[] = "Tên thương hiệu đã tồn tại, vui lòng chọn tên khác.";
    }

    if (!empty($thongbao)) {
        $_SESSION["thongbao"] = $thongbao;
        header("Location: ../../index.php?quanly=thuonghieu&hienthi=sua&id=$mathuonghieu");
        exit();
    }

    // Cập nhật dữ liệu
    $sql_update = "UPDATE thuonghieu SET TENTHUONGHIEU = ? WHERE MATHUONGHIEU = ?";
    $stmt = $conn->prepare($sql_update);
    if (!$stmt) {
        die("Lỗi truy vấn: " . $conn->error);
    }
    $stmt->bind_param("si", $tenthuonghieu, $mathuonghieu);

    if ($stmt->execute()) {
        $_SESSION["thongbao"] = "Cập nhật thành công!";
        header("Location: ../../index.php?quanly=thuonghieu&hienthi=sua&id=$mathuonghieu&thongbao=1");
    } else {
        $_SESSION["thongbao"] = ["Lỗi khi cập nhật dữ liệu: " . $stmt->error];
        header("Location: ../../index.php?quanly=thuonghieu&hienthi=sua&id=$mathuonghieu&thongbao=0");
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../../index.php?quanly=thuonghieu&hienthi=danhsach");
    exit();
}
?>