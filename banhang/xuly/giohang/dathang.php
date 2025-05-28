<?php
session_start();
require('../../../cauhinh/env.php'); // Kết nối DB

// Hàm kiểm tra định dạng (chỉ chứa số và phải có 10 hoặc 11 chữ số)
function validateDienThoai($dienthoai) {
    return preg_match('/^\d{10,11}$/', $dienthoai);
}

// Hàm kiểm tra email
function validateEmail($email) {
    // Kiểm tra định dạng email hợp lệ
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}

if (isset($_SESSION['khachhang'])) {
    $_SESSION['user_id'] = $_SESSION['khachhang']['MAKHACHHANG'];
}

// Giả sử SESSION lưu ID khách hàng là 'user_id'
if (!isset($_SESSION['user_id'])) {
    // Nếu chưa đăng nhập, hiển thị form nhập email/SDT
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $lienhe = trim($_POST['lienhe']);
        $errors = [];

        // Kiểm tra liên hệ
        if (!validateEmail($lienhe)) {
            if (!validateDienThoai($lienhe)) {
                $errors[] = "Thông tin liên hệ không hợp lệ.";
            }
        }
        if (!empty($errors)) {
            $_SESSION["errors"] = $errors;
            $_SESSION["old_data"] = $_POST;
            header("Location: ../../index.php?hienthi=thongtindathang");
            exit();
        }

        if (!empty($lienhe)) {
            // Tạo khách hàng tạm (hoặc kiểm tra đã tồn tại)
            $sql_check = "SELECT MAKHACHHANG FROM khachhang WHERE DIENTHOAI = '$lienhe' OR EMAIL = '$lienhe'";
            $result = mysqli_query($conn, $sql_check);

            if ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['user_id'] = $row['MAKHACHHANG'];
            } else {
                // Thêm mới khách hàng nếu chưa có
                $sql_insert = "INSERT INTO khachhang (HOKHACHHANG, TENKHACHHANG, GIOITINH, DIACHI, EMAIL, DIENTHOAI, MATKHAU) VALUES ('n/a', 'n/a', 'n/a', 'n/a', '$lienhe', '$lienhe', 'n/a')";
                mysqli_query($conn, $sql_insert);
                $_SESSION['user_id'] = mysqli_insert_id($conn);
            }

            // Sau khi có user_id → load lại để xử lý đơn hàng
            header("Location: dathang.php");
            exit;
        } else {
            header("Location: ../../index.php?hienthi=thongtindathang");
        }
    } else {
        header("Location: ../../index.php?hienthi=thongtindathang");
    }
    exit;
}

// Nếu đã có user_id → xử lý đơn hàng
$user_id = $_SESSION['user_id'];
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

if (empty($cart)) {
    echo "Giỏ hàng trống. Vui lòng mua hàng trước.";
    exit;
}

// Thêm đơn hàng
$ngay = date('Y-m-d H:i:s');
$sql_order = "INSERT INTO donhang (MAKHACHHANG, NGAYBANHANG, TRANGTHAI) VALUES ($user_id, '$ngay', 0)";
mysqli_query($conn, $sql_order);
$order_id = mysqli_insert_id($conn);

// Thêm chi tiết đơn hàng
foreach ($cart as $item) {
    $mahang = $item['mahang'];
    $soluong = $item['soluong'];
    $dongia_sql = "SELECT GIABAN FROM mathang WHERE MAHANG = '$mahang'";
    $res_dongia = mysqli_query($conn, $dongia_sql);
    $dongia = mysqli_fetch_assoc($res_dongia)['GIABAN'];

    $sql_detail = "INSERT INTO ctdonhang (MADONHANG, MAHANG, GIABAN, SOLUONG, MUCGIAMGIA) 
    VALUES ($order_id, $mahang, $dongia, $soluong, 0)";
    mysqli_query($conn, $sql_detail);
}

// Xoá giỏ hàng sau khi đặt
unset($_SESSION['cart']);
unset($_SESSION['user_id']);

header("Location: ../../index.php?hienthi=thongtindathang&success");
exit;
?>
