<?php
session_start();
require('../../../cauhinh/env.php');

if (isset($_POST['submit'])) {
    $hokhachhang = trim($_POST['hokhachhang']);
    $tenkhachhang = trim($_POST['tenkhachhang']);
    $gioitinh = $_POST['gioitinh'] ?? '';
    $diachi = trim($_POST['diachi']);
    $email = trim($_POST['email']);
    $dienthoai = trim($_POST['dienthoai']);
    $matkhau = trim($_POST['matkhau']); // Lưu mật khẩu nguyên bản, không mã hóa

    $thongbao = [];

    // Hàm kiểm tra email đã tồn tại chưa
    function isEmailExists($conn, $email) {
        $sql = "SELECT COUNT(*) FROM khachhang WHERE EMAIL = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) return false;
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $count = 0;
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();
        return $count > 0;
    }

    // Validate dữ liệu nhập
    if (empty($hokhachhang)) {
        $thongbao[] = "Họ khách hàng không được để trống.";
    }
    if (empty($tenkhachhang)) {
        $thongbao[] = "Tên khách hàng không được để trống.";
    }
    if (empty($gioitinh)) {
        $thongbao[] = "Giới tính chưa được chọn.";
    }
    if (empty($diachi)) {
        $thongbao[] = "Địa chỉ không được để trống.";
    }
    if (empty($email)) {
        $thongbao[] = "Email không được để trống.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $thongbao[] = "Email không hợp lệ.";
    } elseif (isEmailExists($conn, $email)) {
        $thongbao[] = "Email đã tồn tại.";
    }
    if (empty($dienthoai)) {
        $thongbao[] = "Điện thoại không được để trống.";
    }
    if (empty($matkhau)) {
        $thongbao[] = "Mật khẩu không được để trống.";
    }

    if (!empty($thongbao)) {
        $_SESSION['thongbao'] = $thongbao;
        $_SESSION['old_data'] = $_POST;
        header("Location: ../../index.php?quanly=khachhang&hienthi=them&thongbao=0");
        exit();
    }

    // Thêm khách hàng vào database
    $sql = "INSERT INTO khachhang (HOKHACHHANG, TENKHACHHANG, GIOITINH, DIACHI, EMAIL, DIENTHOAI, MATKHAU) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        $_SESSION['thongbao'] = ["Lỗi truy vấn: " . $conn->error];
        header("Location: ../../index.php?quanly=khachhang&hienthi=them&thongbao=0");
        exit();
    }

    $stmt->bind_param("sssssss", $hokhachhang, $tenkhachhang, $gioitinh, $diachi, $email, $dienthoai, $matkhau);

    if ($stmt->execute()) {
        $_SESSION['thongbao'] = "Thêm khách hàng thành công!";
        header("Location: ../../index.php?quanly=khachhang&hienthi=danhsach&thongbao=1");
        exit();
    } else {
        $_SESSION['thongbao'] = ["Lỗi khi thêm vào database: " . $stmt->error];
        header("Location: ../../index.php?quanly=khachhang&hienthi=them&thongbao=0");
        exit();
    }

    $stmt->close();
    $conn->close();

} else {
    header("Location: ../../index.php?quanly=khachhang&hienthi=danhsach");
    exit();
}
?>
