<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require('../../../cauhinh/env.php');

$donhangs = [];

if (isset($_GET['makh']) && !empty($_GET['makh'])) {
    $makh = mysqli_real_escape_string($conn, $_GET['makh']);
    $sql = "SELECT * FROM DONHANG WHERE MAKHACHHANG = '$makh'";
} elseif (isset($_SESSION['khachhang']['MAKHACHHANG']) && !empty($_SESSION['khachhang']['MAKHACHHANG'])) {
    $makh = mysqli_real_escape_string($conn, $_SESSION['khachhang']['MAKHACHHANG']);
    $sql = "SELECT * FROM DONHANG WHERE MAKHACHHANG = '$makh'";
} else {
    $sql = "SELECT * FROM DONHANG WHERE 1=0";
}

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $donhangs[] = $row;
    }
}

mysqli_close($conn);
?>
