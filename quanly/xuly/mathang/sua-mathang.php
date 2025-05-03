<?php
session_start();
include('../../../cauhinh/env.php'); // Kết nối database

if (isset($_POST['submit'])) {
    $mahang = $_POST['mahang'] ?? '';

    if (empty($mahang)) {
        $_SESSION["thongbao"] = ["Mã hàng không hợp lệ."];
        header("Location: ../../index.php?quanly=mathang&hienthi=danhsach");
        exit();
    }

    // Kiểm tra mặt hàng tồn tại
    $sql_check = "SELECT TENHANG, ANHMINHHOA FROM MATHANG WHERE MAHANG = ?";
    $stmt_check = $conn->prepare($sql_check);
    if (!$stmt_check) {
        die("Lỗi truy vấn: " . $conn->error);
    }
    $stmt_check->bind_param("i", $mahang);
    $stmt_check->execute();
    $stmt_check->bind_result($existing_tenhang, $old_image);
    $stmt_check->fetch();
    $stmt_check->close();

    // Lấy dữ liệu từ form
    $tenhang = trim($_POST['tenhang']);
    $maloaihang = $_POST['loaihang'];
    $mathuonghieu = $_POST['thuonghieu'];
    $donvitinh = trim($_POST['dvt']);
    $giaban = isset($_POST['giaban']) ? filter_var($_POST['giaban'], FILTER_VALIDATE_FLOAT) : 0;
    $anhminhhoa = $old_image;
    $thongsokythuat = trim($_POST['ttkt']);
    $thongbao = [];

    // Kiểm tra tên hàng trùng lặp (ngoại trừ chính nó)
    $sql_check_name = "SELECT COUNT(*) FROM MATHANG WHERE TENHANG = ? AND MAHANG != ?";
    $stmt_check_name = $conn->prepare($sql_check_name);
    $stmt_check_name->bind_param("si", $tenhang, $mahang);
    $stmt_check_name->execute();
    $stmt_check_name->bind_result($count);
    $stmt_check_name->fetch();
    $stmt_check_name->close();

    if ($count > 0) {
        $thongbao[] = "Tên hàng đã tồn tại, vui lòng chọn tên khác.";
    }

    // Xử lý ảnh mới nếu có
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
                if (!empty($old_image) && file_exists($targetDir . $old_image) && is_writable($targetDir . $old_image)) {
                    unlink($targetDir . $old_image);
                }
                $anhminhhoa = $newFileName;
            } else {
                $thongbao[] = "Lỗi khi tải ảnh lên.";
            }
        }
    }

    if (!empty($thongbao)) {
        $_SESSION["thongbao"] = $thongbao;
        header("Location: ../../index.php?quanly=mathang&hienthi=sua&id=$mahang");
        exit();
    }

    // Cập nhật dữ liệu
    $sql_update = "UPDATE MATHANG SET TENHANG = ?, MALOAIHANG = ?, MATHUONGHIEU = ?, DONVITINH = ?, GIABAN = ?, ANHMINHHOA = ?, THONGSOKYTHUAT = ? WHERE MAHANG = ?";
    $stmt = $conn->prepare($sql_update);
    if (!$stmt) {
        die("Lỗi truy vấn: " . $conn->error);
    }
    $stmt->bind_param("siisdssi", $tenhang, $maloaihang, $mathuonghieu, $donvitinh, $giaban, $anhminhhoa, $thongsokythuat, $mahang);

    if ($stmt->execute()) {
        $_SESSION["thongbao"] = "Cập nhật thành công!";
        header("Location: ../../index.php?quanly=mathang&hienthi=sua&id=$mahang&thongbao=1");
    } else {
        $_SESSION["thongbao"] = ["Lỗi khi cập nhật dữ liệu: " . $stmt->error];
        header("Location: ../../index.php?quanly=mathang&hienthi=sua&id=$mahang&thongbao=0");
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../../index.php?quanly=mathang&hienthi=danhsach");
    exit();
}
?>
