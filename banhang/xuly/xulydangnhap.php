<?php
session_start();  // Bắt đầu session

require('../../cauhinh/env.php'); // Kết nối CSDL tại đây

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifier = trim($_POST['identifier'] ?? '');
    $password   = trim($_POST['password'] ?? '');

    if (empty($identifier) || empty($password)) {
        header("Location: ../../index.php?banhang=dangnhap&error=");
        exit();
    }

    // Truy vấn tài khoản bằng SĐT hoặc Email
    $sql = "SELECT * FROM khachhang WHERE DIENTHOAI = ? OR EMAIL = ? LIMIT 1";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ss", $identifier, $identifier);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            // So sánh mật khẩu dùng password_verify (vì mật khẩu đã mã hóa)
            if (password_verify($password, $row['MATKHAU'])) {
                $_SESSION['khachhang'] = [
                    'MAKHACHHANG'   => $row['MAKHACHHANG'],
                    'HOKHACHHANG'   => $row['HOKHACHHANG'],
                    'TENKHACHHANG'  => $row['TENKHACHHANG'],
                    'GIOITINH'      => $row['GIOITINH'],
                    'DIACHI'        => $row['DIACHI'],
                    'EMAIL'         => $row['EMAIL'],
                    'DIENTHOAI'     => $row['DIENTHOAI'],
                ];

                $stmt->close();
                $conn->close();
                header("Location: ../../banhang/index.php");
                exit();
            } else {
                $stmt->close();
                $conn->close();
                header("Location: ../hienthi/dangnhap.php?banhang=dangnhap&error=" . urlencode("Mật khẩu không đúng."));
                exit();
            }
        } else {
            $stmt->close();
            $conn->close();
            header("Location: ../hienthi/dangnhap.php?banhang=dangnhap&error=" . urlencode("Không tìm thấy tài khoản."));
            exit();
        }
    } else {
        $conn->close();
        header("Location: ../../index.php?banhang=dangnhap&error=" . urlencode("Lỗi truy vấn CSDL."));
        exit();
    }
} else {
    header("Location: ../../index.php?banhang=dangnhap&error=" . urlencode("Truy cập không hợp lệ."));
    exit();
}
?>
