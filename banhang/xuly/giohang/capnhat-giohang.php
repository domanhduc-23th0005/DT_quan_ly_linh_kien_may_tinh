<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    $mahang = $_POST['mahang'];
    $soluong = (int) $_POST['soluong'];

    $updated = false;

    if (isset($cart[$mahang])) {
        $_SESSION['cart'][$mahang]['soluong'] = $soluong;
        $updated = true;
    }

    // Trả về JSON phản hồi
    if ($updated) {
        echo 'Cập nhật thành công.';
        header("Location: ../../index.php?hienthi=giohang");
    } else {
        echo 'Cập nhật không thành công.';
    }
}