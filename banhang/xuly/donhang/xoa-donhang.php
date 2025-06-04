<?php
session_start();
require '../../../cauhinh/env.php';
echo '<pre>';
print_r($_GET);
echo '</pre>';


if (isset($_GET['action']) && $_GET['action'] == 'xoa' && isset($_GET['madonhang'])) {
    $madonhang = mysqli_real_escape_string($conn, $_GET['madonhang']);

    // Xóa các dòng trong CTDONHANG trước
    $sql_ct = "DELETE FROM CTDONHANG WHERE MADONHANG = '$madonhang'";
    mysqli_query($conn, $sql_ct);

    // Xóa đơn hàng
    $sql_donhang = "DELETE FROM DONHANG WHERE MADONHANG = '$madonhang'";
    if (mysqli_query($conn, $sql_donhang)) {
        header('Location: ../../hienthi/donhang/danhsach-donhang.php');
        exit;
    } else {
        echo "Lỗi khi xóa đơn hàng: " . mysqli_error($conn);
    }
} else {
    echo "Thiếu thông tin để xóa.";
}
?>
