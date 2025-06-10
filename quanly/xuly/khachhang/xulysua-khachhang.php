<?php
session_start();
include('../../../cauhinh/env.php'); // Kết nối database

if (isset($_POST['submit'])) {
    $makhachhang = $_POST['makhachhang'] ?? '';

    if (empty($makhachhang)) {
        $_SESSION["thongbao"] = ["Mã khách hàng không hợp lệ."];
        header("Location: ../../index.php?quanly=khachhang&hienthi=danhsach");
        exit();
    }

    // Kiểm tra khách hàng có tồn tại không
    $sql_check = "SELECT EMAIL FROM khachhang WHERE MAKHACHHANG = ?";
    $stmt_check = $conn->prepare($sql_check);
    if (!$stmt_check) {
        die("Lỗi truy vấn: " . $conn->error);
    }
    $stmt_check->bind_param("s", $makhachhang);
    $stmt_check->execute();
    $stmt_check->bind_result($existing_email);
    $stmt_check->fetch();
    $stmt_check->close();

    // Lấy dữ liệu từ form
    $hokhachhang   = trim($_POST['hokhachhang']);
    $tenkhachhang  = trim($_POST['tenkhachhang']);
    $gioitinh      = trim($_POST['gioitinh']);
    $diachi        = trim($_POST['diachi']);
    $email         = trim($_POST['email']);
    $dienthoai     = trim($_POST['dienthoai']);
    $thongbao = [];

    // Kiểm tra mật khẩu nếu được nhập
    $update_password = false;
    if (!empty($_POST['matkhau'])) {
        $matkhau = $_POST['matkhau'];
        $xacnhan_matkhau = $_POST['xn-matkhau'];
        
        if ($matkhau !== $xacnhan_matkhau) {
            $thongbao[] = "Mật khẩu và xác nhận mật khẩu không khớp.";
        }
        $update_password = true;
    }

    // Kiểm tra email đã tồn tại chưa (trừ chính nó)
    $sql_check_email = "SELECT COUNT(*) FROM khachhang WHERE EMAIL = ? AND MAKHACHHANG != ?";
    $stmt_email = $conn->prepare($sql_check_email);
    $stmt_email->bind_param("ss", $email, $makhachhang);
    $stmt_email->execute();
    $stmt_email->bind_result($email_count);
    $stmt_email->fetch();
    $stmt_email->close();

    if ($email_count > 0) {
        $thongbao[] = "Email đã tồn tại, vui lòng nhập email khác.";
    }

    if (!empty($thongbao)) {
        $_SESSION["thongbao"] = $thongbao;
        header("Location: ../../index.php?quanly=khachhang&hienthi=sua&id=$makhachhang&thongbao=0");
        exit();
    }

    // Cập nhật dữ liệu
    if ($update_password) {
        $matkhau_moi_hashed = password_hash($matkhau, PASSWORD_DEFAULT);
        $sql_update = "UPDATE khachhang SET 
        HOKHACHHANG = ?, 
        TENKHACHHANG = ?, 
        GIOITINH = ?, 
        DIACHI = ?, 
        EMAIL = ?, 
        DIENTHOAI = ?, 
        MATKHAU = ? 
        WHERE MAKHACHHANG = ?";
    } else {
        $sql_update = "UPDATE khachhang SET 
        HOKHACHHANG = ?, 
        TENKHACHHANG = ?, 
        GIOITINH = ?, 
        DIACHI = ?, 
        EMAIL = ?, 
        DIENTHOAI = ? 
        WHERE MAKHACHHANG = ?";
    }

    $stmt = $conn->prepare($sql_update);
    if (!$stmt) {
        die("Lỗi truy vấn: " . $conn->error);
    }

    if ($update_password) {
        $stmt->bind_param("ssssssss", 
            $hokhachhang, 
            $tenkhachhang, 
            $gioitinh, 
            $diachi, 
            $email, 
            $dienthoai, 
            $matkhau_moi_hashed, 
            $makhachhang
        );
    } else {
        $stmt->bind_param("sssssss", 
            $hokhachhang, 
            $tenkhachhang, 
            $gioitinh, 
            $diachi, 
            $email, 
            $dienthoai, 
            $makhachhang
        );
    }

    if ($stmt->execute()) {
        $_SESSION["thongbao"] = "Cập nhật thành công!";
        header("Location: ../../index.php?quanly=khachhang&hienthi=sua&id=$makhachhang&thongbao=1");
    } else {
        $_SESSION["thongbao"] = ["Lỗi khi cập nhật dữ liệu: " . $stmt->error];
        header("Location: ../../index.php?quanly=khachhang&hienthi=sua&id=$makhachhang&thongbao=0");
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../../index.php?quanly=khachhang&hienthi=danhsach");
    exit();
}
?>
