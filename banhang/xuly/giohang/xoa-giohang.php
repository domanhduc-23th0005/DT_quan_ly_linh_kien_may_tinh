<?php
session_start();

if (isset($_GET['xoa']) && isset($_SESSION['cart'])) {
    $mahang = $_GET['xoa'];

    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['mahang'] == $mahang) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
}

header("Location: ../../index.php?hienthi=giohang");
exit;