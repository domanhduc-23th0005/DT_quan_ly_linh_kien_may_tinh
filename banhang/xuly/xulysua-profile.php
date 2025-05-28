<?php
session_start();
if (!isset($_SESSION['khachhang'])) {
    header("Location: ../index.php?banhang=dangnhap&hienthi=dangnhap");
    exit();
}

// 1. KẾT NỐI CSDL (thủ tục)
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "quanlylinhkien";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// 2. XỬ LÝ FORM
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ho        = $_POST['ho'];
    $ten       = $_POST['ten'];
    $gioitinh  = $_POST['gioitinh'];
    $diachi    = $_POST['diachi'];
    $email     = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $makh      = $_SESSION['khachhang']['MAKHACHHANG'];

    // Sử dụng mysqli_prepare + bind_param thủ tục
    $sql = "UPDATE khachhang 
            SET HOKHACHHANG=?, TENKHACHHANG=?, GIOITINH=?, DIACHI=?, EMAIL=?, DIENTHOAI=? 
            WHERE MAKHACHHANG=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssi",
        $ho, $ten, $gioitinh, $diachi, $email, $dienthoai, $makh
    );

    if (mysqli_stmt_execute($stmt)) {
        // Cập nhật session
        $_SESSION['khachhang'] = array_merge(
            $_SESSION['khachhang'],
            [
                'HOKHACHHANG' => $ho,
                'TENKHACHHANG'=> $ten,
                'GIOITINH'    => $gioitinh,
                'DIACHI'      => $diachi,
                'EMAIL'       => $email,
                'DIENTHOAI'   => $dienthoai,
            ]
        );
        header("Location: ../hienthi/profile.php?success=1");
        exit();
    } else {
        $err = urlencode("Cập nhật thất bại");
        header("Location: ../sua-profile.php?error={$err}");
        exit();
    }
} else {
    header("Location: ../sua-profile.php");
    exit();
}
