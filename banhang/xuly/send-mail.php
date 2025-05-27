<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Nếu bạn không dùng Composer, hãy require từng file:
require '../../PHPMailer/PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/PHPMailer/src/SMTP.php';
require '../../PHPMailer/PHPMailer/src/Exception.php';

// Hàm gửi email với mã xác nhận
function guiEmailXacNhan($nguoiNhan, $maXacNhan, $tenNguoiNhan = '', $body) {
    $mail = new PHPMailer(true);

    try {
        // Server cấu hình SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'hoa.dt.nt23cth@ntu.edu.vn';
        $mail->Password   = 'qaow npdw ttfs hcnw'; // ⚠️ Đổi thành MẬT KHẨU ỨNG DỤNG nếu dùng Gmail
        $mail->Port = 587;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; // hoặc DEBUG_CONNECTION

        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer'       => false,
                'verify_peer_name'  => false,
                'allow_self_signed' => true
            ]
        ];

        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';

        // Người gửi & người nhận
        $mail->setFrom('hoa.dt.nt23cth@ntu.edu.vn', 'SHOP ONLINE');
        $mail->addAddress($nguoiNhan, $tenNguoiNhan ?: $nguoiNhan);

        // Nội dung email
        $mail->isHTML(true);
        $mail->Subject = 'Khôi phục mật khẩu';
        $mail->Body    = $body . " <strong>$maXacNhan</strong>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Email không gửi được: {$mail->ErrorInfo}");
        return false;
    }
}

//guiEmailXacNhan('hoa.thudientu@gmail.com', '1234');

// $fp = fsockopen("smtp.gmail.com", 465, $errno, $errstr, 10);
// if (!$fp) {
//     echo "Kết nối thất bại: $errstr ($errno)";
// } else {
//     echo "Kết nối thành công!";
//     fclose($fp);
// }

?>