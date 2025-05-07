<?php
session_start();
include('../../../cauhinh/env.php'); // Kết nối database

if (isset($_POST['submit'])) {
    $tenthuonghieu = trim($_POST['tenthuonghieu']);
    $thongbao = [];

    // Hàm kiểm tra thương hiệu tồn tại
    function isBrandNameExists($conn, $tenthuonghieu) {
        $sql = "SELECT COUNT(*) FROM thuonghieu WHERE TENTHUONGHIEU = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) return false;
        $stmt->bind_param("s", $tenthuonghieu);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();
        return $count > 0;
    }

    // Kiểm tra tên thương hiệu
    if (isBrandNameExists($conn, $tenthuonghieu)) {
        $thongbao[] = "Tên thương hiệu đã tồn tại, vui lòng chọn tên khác.";
    }

    // Nếu có lỗi, quay lại trang thêm thương hiệu
    if (!empty($thongbao)) {
        $_SESSION["thongbao"] = $thongbao;
        $_SESSION["old_data"] = $_POST;
        header("Location: ../../index.php?quanly=thuonghieu&hienthi=them&thongbao=0");
        exit();
    }

    // Chuẩn bị câu lệnh SQL
    $sql_insert = "INSERT INTO thuonghieu (TENTHUONGHIEU) VALUES (?)";
    $stmt = $conn->prepare($sql_insert);
    if (!$stmt) {
        $_SESSION["thongbao"] = ["Lỗi truy vấn: " . $conn->error];
        header("Location: ../../index.php?quanly=thuonghieu&hienthi=them");
        exit();
    }

    $stmt->bind_param("s", $tenthuonghieu);

    if ($stmt->execute()) {
        $_SESSION["thongbao"] = "Thêm thành công!";
        header("Location: ../../index.php?quanly=thuonghieu&hienthi=them&thongbao=1");
        exit();
    } else {
        $_SESSION["thongbao"] = ["Lỗi khi thêm vào database: " . $stmt->error];
        header("Location: ../../index.php?quanly=thuonghieu&hienthi=them&thongbao=0");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../../index.php?quanly=thuonghieu&hienthi=danhsach");
    exit();
}
?>