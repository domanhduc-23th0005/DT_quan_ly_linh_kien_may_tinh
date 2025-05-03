<?php
session_start();
include('../../../cauhinh/env.php'); // Kết nối database

if (isset($_POST['submit'])) {
    $tenhang = trim($_POST['tenhang']);
    $maloaihang = $_POST['loaihang'] ?? '';
    $mathuonghieu = $_POST['thuonghieu'] ?? '';
    $donvitinh = trim($_POST['dvt']);
    $giaban = isset($_POST['giaban']) ? filter_var($_POST['giaban'], FILTER_VALIDATE_FLOAT) : 0;
    $anhminhhoa = '';
    $thongsokythuat = trim($_POST['ttkt']);
    $thongbao = [];

    // Hàm kiểm tra mặt hàng tồn tại
    function isProductNameExists($conn, $tenhang) {
        $sql = "SELECT COUNT(*) FROM MATHANG WHERE TENHANG = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) return false;
        $stmt->bind_param("s", $tenhang);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();
        return $count > 0;
    }

    // Kiểm tra tên hàng
    if (isProductNameExists($conn, $tenhang)) {
        $thongbao[] = "Tên hàng đã tồn tại, vui lòng chọn tên khác.";
    }

    // Kiểm tra file ảnh
    if (!empty($_FILES["anhminhhoa"]["name"])) {
        $targetDir = "../../../hinhanh/";
        $originalFileName = pathinfo($_FILES["anhminhhoa"]["name"], PATHINFO_FILENAME);
        $fileExt = strtolower(pathinfo($_FILES["anhminhhoa"]["name"], PATHINFO_EXTENSION));
        $fileSize = $_FILES["anhminhhoa"]["size"];
        $allowedExtensions = ["jpg", "jpeg", "png", "gif"];

        if ($_FILES["anhminhhoa"]["error"] !== UPLOAD_ERR_OK) {
            $thongbao[] = "Lỗi khi tải ảnh lên.";
        }
        if (!in_array($fileExt, $allowedExtensions)) {
            $thongbao[] = "Ảnh chỉ được có định dạng JPG, PNG, GIF.";
        }
        if ($fileSize > 2 * 1024 * 1024) {
            $thongbao[] = "Kích thước ảnh không được vượt quá 2MB.";
        }

        if (empty($thongbao)) {
            $timestamp = date("YmdHis");
            $newFileName = "{$timestamp}_{$originalFileName}.{$fileExt}";
            $targetFilePath = $targetDir . $newFileName;

            if (move_uploaded_file($_FILES["anhminhhoa"]["tmp_name"], $targetFilePath)) {
                $anhminhhoa = $newFileName;
            } else {
                $thongbao[] = "Lỗi khi tải ảnh lên.";
            }
        }
    }

    // Nếu có lỗi, quay lại trang thêm mặt hàng
    if (!empty($thongbao)) {
        $_SESSION["thongbao"] = $thongbao;
        $_SESSION["old_data"] = $_POST;
        header("Location: ../../index.php?quanly=mathang&hienthi=them&thongbao=0");
        exit();
    }

    // Chuẩn bị câu lệnh SQL
    $sql_insert = "INSERT INTO mathang (TENHANG, MALOAIHANG, MATHUONGHIEU, DONVITINH, GIABAN, ANHMINHHOA, THONGSOKYTHUAT) 
                   VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_insert);
    if (!$stmt) {
        $_SESSION["thongbao"] = ["Lỗi truy vấn: " . $conn->error];
        header("Location: ../../index.php?quanly=mathang&hienthi=them");
        exit();
    }

    $stmt->bind_param("siisdss", $tenhang, $maloaihang, $mathuonghieu, $donvitinh, $giaban, $anhminhhoa, $thongsokythuat);

    if ($stmt->execute()) {
        $_SESSION["thongbao"] = "Thêm thành công!";
        header("Location: ../../index.php?quanly=mathang&hienthi=them&thongbao=1");
        exit();
    } else {
        $_SESSION["thongbao"] = ["Lỗi khi thêm vào database: " . $stmt->error];
        header("Location: ../../index.php?quanly=mathang&hienthi=them&thongbao=0");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../../index.php?quanly=mathang&hienthi=danhsach");
    exit();
}
?>
