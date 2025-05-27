<?php
session_start();
require('../../cauhinh/env.php'); // Kết nối DB
include('send-mail.php');

function taoMaXacNhan($length = 4) {
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $ma = '';
    for ($i = 0; $i < $length; $i++) {
        $ma .= $chars[random_int(0, strlen($chars) - 1)];
    }
    return $ma;
}

// Hàm kiểm tra email
function validateEmail($email) {
    // Kiểm tra định dạng email hợp lệ
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lienhe = trim($_POST['lienhe']);
    $errors = [];

    // Kiểm tra liên hệ
    if (!validateEmail($lienhe)) {
        $errors[] = "Thông tin không hợp lệ.";
    }
    if (!empty($errors)) {
        $_SESSION["errors"] = $errors;
        $_SESSION["old_data"] = $_POST;
        header("Location: ../index.php?hienthi=quenmatkhau");
        exit();
    }

    if (!empty($lienhe)) {
        // Kiểm tra email
        $sql_check = "SELECT MAKHACHHANG FROM khachhang WHERE EMAIL = '$lienhe'";
        $result = mysqli_query($conn, $sql_check);

        if ($row = mysqli_fetch_assoc($result)) {
            $ma_xac_nhan = taoMaXacNhan();
            // Cập nhật mã xác nhận
            $sql = "UPDATE khachhang 
            SET MAXACNHAN = '$ma_xac_nhan'
            WHERE EMAIL = '$lienhe'";

            if (mysqli_query($conn, $sql)) {

                // Gửi email
                if (guiEmailXacNhan($lienhe, $ma_xac_nhan, 'Mã xác nhận', 'Mã xác nhận của bạn là:')) {
                    header("Location: ../index.php?hienthi=quenmatkhau&success");
                    exit;
                } else {
                    $errors[] = "Không thể gửi email. Vui lòng thử lại.";
                    header("Location: ../index.php?hienthi=quenmatkhau");
                }

            } else {
                $errors[] = "Đã xảy ra lỗi, vui lòng thử lại.";
                header("Location: ../index.php?hienthi=quenmatkhau");
            }
        } else {
            $errors[] = "Không tồn tại thông tin này.";
            header("Location: ../index.php?hienthi=quenmatkhau");
        }

        exit;
    } else {
        $errors[] = '1';
        header("Location: ../index.php?hienthi=quenmatkhau");
    }
} else {
    $errors[] = '2';
    header("Location: ../index.php?hienthi=quenmatkhau");
}

$_SESSION["errors"] = $errors;

header("Location: ../index.php?hienthi=quenmatkhau&success");
exit;
?>
