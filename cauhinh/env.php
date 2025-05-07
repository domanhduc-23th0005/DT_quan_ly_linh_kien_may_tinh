<?php
// 1. Kết nối CSDL kiểu thủ tục
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanlylinkkien";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
	die("Kết nối thất bại");
}
?>