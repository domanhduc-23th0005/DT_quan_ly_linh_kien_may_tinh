<?php
session_start();
require('../../cauhinh/env.php');
include('send-mail.php');

// Hàm tạo mật khẩu ngẫu nhiên
function taoMatKhauMoi($length = 8) {
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $matkhau = '';
    for ($i = 0; $i < $length; $i++) {
        $matkhau .= $chars[random_int(0, strlen($chars) - 1)];
    }
    return $matkhau;
}

// Xử lý xác nhận mã
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['lienhe'] ?? '');
    $ma_xac_nhan = trim($_POST['maxacnhan'] ?? '');

    $errors = [];

    if (empty($email) || empty($ma_xac_nhan)) {
        $errors[] = "Vui lòng điền đầy đủ thông tin.";
    } else {
        // Kiểm tra mã xác nhận trong CSDL
        $sql = "SELECT MAKHACHHANG FROM khachhang WHERE EMAIL = ? AND MAXACNHAN = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $email, $ma_xac_nhan);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $makh = $row['MAKHACHHANG'];

            // Tạo mật khẩu mới và hash
            $matkhau_moi = taoMatKhauMoi(8);
            $matkhau_hash = password_hash($matkhau_moi, PASSWORD_DEFAULT);

            // Cập nhật mật khẩu và xóa mã xác nhận
            $update_sql = "UPDATE khachhang SET MATKHAU = ?, MAXACNHAN = NULL WHERE MAKHACHHANG = ?";
            $update_stmt = mysqli_prepare($conn, $update_sql);
            mysqli_stmt_bind_param($update_stmt, "si", $matkhau_hash, $makh);
            mysqli_stmt_execute($update_stmt);

            // Gửi email mật khẩu mới
            if (guiEmailXacNhan($email, $matkhau_moi, 'Mật khẩu mới của bạn', 'Mật khẩu mới của bạn là:')) {
                header("Location: ../index.php?hienthi=khoiphuc&success");
                exit();
            } else {
                $errors[] = "Không gửi được email. Vui lòng thử lại.";
            }

        } else {
            $errors[] = "Mã xác nhận không chính xác hoặc đã hết hạn.";
        }
    }

    $_SESSION['errors'] = $errors;
    $_SESSION['old_data'] = $_POST;
    header("Location: ../index.php?hienthi=khoiphuc");
    exit;
}
?>
