<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="../images/favicon.png" type="image/x-icon"/>
    <title>Đăng nhập</title>
    <!-- Thư viện font Google Fonts (Segoe UI không miễn phí) -->
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI&display=swap" rel="stylesheet" />
    <style>
        /* Reset cơ bản */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            margin: 0;
            min-height: 100vh;

            /* Flex để căn giữa container */
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 15px;
        }

        .login-container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
            font-weight: 700;
            font-size: 1.8rem;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
            color: #444;
            font-size: 1rem;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin-top: 6px;
            border: 1.5px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
            font-family: inherit;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0,123,255,0.5);
        }

        button {
            margin-top: 25px;
            width: 100%;
            padding: 14px 0;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .register-link {
            margin-top: 20px;
            text-align: center;
            font-size: 0.95rem;
            color: #444;
        }

        .register-link a {
            display: inline-block;
            margin-top: 8px;
            text-decoration: none;
            background-color: #28a745;
            color: white;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .register-link a:hover {
            background-color: #1e7e34;
        }

        /* Link quay lại */
        .back-link {
            margin-top: 15px;
            text-align: center;
        }

        .back-link a {
            text-decoration: none;
            color: #007bff;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .back-link a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        /* Thông báo lỗi */
        .error-message {
            color: #d93025;
            background-color: #fce8e6;
            border: 1px solid #d93025;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: 600;
            text-align: center;
            font-size: 1rem;
        }

        /* Responsive nhỏ */
        @media (max-width: 420px) {
            .login-container {
                padding: 25px 20px;
            }

            button,
            .register-link a {
                font-size: 1rem;
                padding: 12px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form method="post" action="../xuly/xulydangnhap.php" novalidate>
            <h2>Đăng nhập</h2>

            <!-- Hiển thị lỗi nếu có -->
            <?php
            if (!empty($_GET['error']) && trim($_GET['error']) !== 'Vui lòng điền đầy đủ thông tin.') {
                $error = htmlspecialchars($_GET['error']);
                echo "
                <div style='
                background-color: #f8d7da;
                color: #721c24;
                border: 1px solid #f5c6cb;
                border-radius: 5px;
                padding: 10px 15px;
                margin: 10px 0;
                font-weight: bold;
                '>
                ⚠️ $error
                </div>";
            }
            ?>




            <label for="identifier">Email hoặc Số điện thoại:</label>
            <input type="text" id="identifier" name="identifier" placeholder="Nhập email hoặc số điện thoại" required autofocus>

            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>

            <button type="submit">Đăng nhập</button>
        </form>

        <div class="register-link">
            <span>Bạn chưa có tài khoản?</span><br />
            <a href="../hienthi/dangky.php">Đăng ký ngay</a>
        </div>

        <div style="text-align: center; margin-top: 8px;">
            <a href="../index.php?hienthi=quenmatkhau">Quên mật khẩu</a>
        </div>

        <div class="back-link">
            <a href="../../banhang/index.php">Quay lại</a>
        </div>
    </div>
</body>
</html>
