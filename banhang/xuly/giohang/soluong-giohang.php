<?php
session_start();

// Lấy tổng số mặt hàng trong giỏ hàng
$sl_giohang = 0;
foreach ($_SESSION['cart'] as $item) {
  $sl_giohang += $item['soluong'];
}
?>
<span class="badge bg-danger"><?php echo $sl_giohang ?></span>