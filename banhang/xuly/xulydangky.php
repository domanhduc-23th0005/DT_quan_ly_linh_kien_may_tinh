<?php
require('../../cauhinh/env.php'); // Kết nối CSDL

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ho = trim($_POST['ho'] ?? '');
    $ten = trim($_POST['ten'] ?? '');
    $gioitinh = trim($_POST['gioitinh'] ?? '');
    $diachi = trim($_POST['diachi'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $dienthoai = trim($_POST['dienthoai'] ?? '');
    $matkhau_plain = trim($_POST['matkhau'] ?? '');

    if ($ho && $ten && $gioitinh && $diachi && $email && $dienthoai && $matkhau_plain) {
        // Kiểm tra email hoặc điện thoại đã tồn tại
        $sql_check = "SELECT * FROM khachhang WHERE EMAIL = ? OR DIENTHOAI = ?";
        $stmt = $conn->prepare($sql_check);
        if (!$stmt) {
            die("Lỗi chuẩn bị truy vấn: " . $conn->error);
        }
        $stmt->bind_param("ss", $email, $dienthoai);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "❌ Email hoặc điện thoại đã được sử dụng.";
        } else {
            // Mã hóa mật khẩu
            $matkhau = password_hash($matkhau_plain, PASSWORD_DEFAULT);

            // Thêm khách hàng mới
            $sql_insert = "INSERT INTO khachhang (HOKHACHHANG, TENKHACHHANG, GIOITINH, DIACHI, EMAIL, DIENTHOAI, MATKHAU)
                           VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql_insert);
            if (!$stmt) {
                die("Lỗi chuẩn bị truy vấn: " . $conn->error);
            }
            $stmt->bind_param("sssssss", $ho, $ten, $gioitinh, $diachi, $email, $dienthoai, $matkhau);

            if ($stmt->execute()) {
                echo "✅ Đăng ký thành công. <a href='../hienthi/dangnhap.php'>Đăng nhập</a>";
            } else {
                echo "❌ Lỗi khi đăng ký: " . $stmt->error;
            }
        }
        $stmt->close();
        $conn->close();
    } else {
        echo "❌ Vui lòng điền đầy đủ thông tin.";
    }
} else {
    echo "Truy cập không hợp lệ.";
}
?>