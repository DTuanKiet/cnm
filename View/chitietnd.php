<?php
include_once("Controller/cNguoiDung.php");
$p = new ControlNguoiDung();
$MaND = $_REQUEST["nd"];
$kq = $p->getOneND($MaND);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Shop Phụ Kiện - Thông tin cá nhân</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .section-title {
            color: #007bff;
            font-weight: 600;
            margin-bottom: 20px;
            text-align: center;
        }
        .info-card {
            padding: 20px;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .info-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            font-size: 16px;
        }
        .info-item label {
            font-weight: 500;
            color: #333;
            flex: 1;
        }
        .info-item span {
            color: #555;
            flex: 2;
            text-align: left;
        }
        .error-message {
            text-align: center;
            color: #dc3545;
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if ($kq) {
            while ($r = mysqli_fetch_assoc($kq)) {
                echo '<div class="text-center mb-4">';
                echo '<h2 class="section-title"><span>Thông tin cá nhân</span></h2>';
                echo '</div>';
                echo '<div class="info-card">';
                echo '<div class="info-item"><label>Tên tài khoản:</label><span>' . htmlspecialchars($r["nameuser"]) . '</span></div>';
                echo '<div class="info-item"><label>Mật khẩu:</label><span>' . htmlspecialchars($r["password"]) . '</span></div>';
                echo '<div class="info-item"><label>Số điện thoại:</label><span>' . htmlspecialchars($r["phonenumber"]) . '</span></div>';
                echo '</div>';
            }
        } else {
            echo '<p class="error-message">Người dùng không tồn tại.</p>';
        }
        ?>
    </div>
</body>
</html>