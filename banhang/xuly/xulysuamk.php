<?php
session_start();
require('../../cauhinh/env.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $makh = $_SESSION['khachhang']['MAKHACHHANG'] ?? null; // Lấy id khách hàng từ session
    $matkhau_cu = trim($_POST['matkhau_cu'] ?? '');
    $matkhau_moi = trim($_POST['matkhau_moi'] ?? '');
    $matkhau_moi_xn = trim($_POST['matkhau_moi_xn'] ?? '');

    if (!$makh || !$matkhau_cu || !$matkhau_moi || !$matkhau_moi_xn) {
        die("Vui lòng điền đầy đủ thông tin.");
    }

    if ($matkhau_moi !== $matkhau_moi_xn) {
        die("Mật khẩu mới và xác nhận mật khẩu không khớp.");
    }

    // Lấy mật khẩu hiện tại trong CSDL
    $sql = "SELECT MATKHAU FROM khachhang WHERE MAKHACHHANG = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $makh);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($matkhau_cu, $row['MATKHAU'])) {
            // Mã hóa mật khẩu mới
            $matkhau_moi_hashed = password_hash($matkhau_moi, PASSWORD_DEFAULT);

            // Cập nhật mật khẩu mới
            $sql_update = "UPDATE khachhang SET MATKHAU = ? WHERE MAKHACHHANG = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("si", $matkhau_moi_hashed, $makh);
            if ($stmt_update->execute()) {
                echo "Đổi mật khẩu thành công. <a href='../hienthi/dangnhap.php'>Đăng nhập lại</a>";
            } else {
                echo "Lỗi khi cập nhật mật khẩu.";
            }
            $stmt_update->close();
        } else {
            echo "Mật khẩu cũ không đúng.";
        }
    } else {
        echo "Không tìm thấy người dùng.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Truy cập không hợp lệ.";
}
?>
