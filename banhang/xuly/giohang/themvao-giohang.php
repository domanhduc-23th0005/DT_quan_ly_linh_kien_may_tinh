<?php
session_start();
header('Content-Type: application/json');

// Lấy dữ liệu từ AJAX và lọc đầu vào
$mahang = (int)$_POST['mahang'];
$soluong = (int)$_POST['soluong'];

if ($mahang > 0) {
    // Nếu phiếu bán hàng chưa tồn tại, tạo mảng rỗng
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Kiểm tra sản phẩm đã tồn tại trong phiếu bán hàng chưa
    $isExist = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['mahang'] === $mahang) {
            if ($soluong >= 0) { // Tăng số lượng
                if ($soluong == 1) {
                    $item['soluong']++;
                } else {
                    $item['soluong'] = $item['soluong'] + $soluong;
                }
            } else if (($soluong < 0) && ($item['soluong'] > 1)) {
                $item['soluong']--; // Giảm số lượng
            }
            $isExist = true;
            break;
        }
    }
    unset($item); // Giải phóng biến tham chiếu

    // Nếu sản phẩm chưa có trong phiếu bán hàng tạm, thêm mới
    if (!$isExist && ($soluong >= 0)) {
        $_SESSION['cart'][$mahang] = [
            'mahang' => $mahang,
            'soluong' => $soluong,
        ];
    }

    // Tính tổng số lượng sản phẩm hiện tại
    $totalQuantity = 0;
    foreach ($_SESSION['cart'] as $item) {
        $totalQuantity += $item['soluong'];
    }

    // Trả về JSON khi thêm sản phẩm thành công
    echo json_encode([
        'status' => 'success',
        'totalQuantity' => $totalQuantity,
        'message' => 'Thao tác thành công.'
    ]);
} else {
    // Trả về JSON khi dữ liệu không hợp lệ
    echo json_encode([
        'status' => 'error',
        'message' => 'Dữ liệu không hợp lệ. Vui lòng kiểm tra lại.'
    ]);
}
exit;
?>
