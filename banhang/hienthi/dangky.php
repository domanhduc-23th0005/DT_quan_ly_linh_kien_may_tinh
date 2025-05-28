<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="../images/favicon.png" type="image/x-icon"/>
  <title>Đăng ký tài khoản</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .form-container {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 500px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input, select {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      width: 100%;
      padding: 10px;
      background: #007bff;
      border: none;
      color: white;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background: #0056b3;
    }

    .login-link {
      text-align: center;
      margin-top: 15px;
    }

    .login-link a {
      color: #007bff;
      text-decoration: none;
    }

    .login-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Đăng ký tài khoản</h2>
    <form method="post" action="../../banhang/xuly/xulydangky.php">
      <label>Họ:</label>
      <input type="text" name="ho" required>

      <label>Tên:</label>
      <input type="text" name="ten" required>

      <label>Giới tính:</label>
      <select name="gioitinh" required>
        <option value="Nam">Nam</option>
        <option value="Nữ">Nữ</option>
      </select>

      <label>Địa chỉ:</label>
      <input type="text" name="diachi" required>

      <label>Email:</label>
      <input type="email" name="email" required>

      <label>Điện thoại:</label>
      <input type="text" name="dienthoai" required>

      <label>Mật khẩu:</label>
      <input type="password" name="matkhau" required>

      <button type="submit">Đăng ký</button>
    </form>
    <div class="login-link">
      <p>Đã có tài khoản? <a href="dangnhap.php">Đăng nhập tại đây</a></p>
    </div>

    <div style="text-align: center; margin-top: 8px;">
      <a href="../index.php">Trang chủ</a>
    </div>
  </div>
</body>
</html>
