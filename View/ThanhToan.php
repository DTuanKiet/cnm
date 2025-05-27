<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xác nhận đơn hàng</title>
    <style>
        /* Reset cơ bản */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h1, h3 {
            text-align: center;
            color: #2c3e50;
        }

        /* Container */
        .container {
            max-width: 700px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        /* Form styles */
        form p {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        form p strong {
            margin-bottom: 6px;
            font-size: 16px;
            color: #34495e;
        }

        form input[type="text"] {
            padding: 10px 15px;
            border: 1.8px solid #bdc3c7;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        form input[type="text"]:focus {
            border-color: #2980b9;
            outline: none;
        }

        form input[type="submit"] {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 17px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        form input[type="submit"]:hover {
            background-color: #1e8449;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            margin-bottom: 30px;
            font-size: 16px;
        }

        table th, table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        table th {
            background-color: #2980b9;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
        }

        table tr:nth-child(even) {
            background-color: #f9fbfd;
        }

        table tr:hover {
            background-color: #f1f7fc;
        }

        /* Error message */
        .error {
            color: #e74c3c;
            font-weight: 600;
            text-align: center;
        }

        /* Submit confirm order button */
        .btn-confirm {
            max-width: 300px;
            margin: 0 auto;
            display: block;
            background-color: #2980b9;
            padding: 14px 0;
            border-radius: 8px;
            color: white;
            font-size: 18px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-confirm:hover {
            background-color: #1c5980;
        }

        /* Responsive */
        @media screen and (max-width: 600px) {
            .container {
                padding: 20px;
            }
            form p {
                font-size: 14px;
            }
            form input[type="text"] {
                font-size: 14px;
            }
            table th, table td {
                font-size: 14px;
                padding: 10px 8px;
            }
            .btn-confirm {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Xác nhận đơn hàng</h1>

        <h3>Thông tin khách hàng</h3>
        <form method="post" action="">
            <p>
                <strong>Họ tên:</strong>
                <input type="text" name="hoten" value="<?= isset($_SESSION['dn']['hoten']) ? htmlspecialchars($_SESSION['dn']['hoten']) : '' ?>" required>
            </p>
            <p>
                <strong>Địa chỉ:</strong>
                <input type="text" name="diachi" value="<?= isset($_SESSION['dn']['diachi']) ? htmlspecialchars($_SESSION['dn']['diachi']) : '' ?>" required>
            </p>
            <p>
                <strong>Số điện thoại:</strong>
                <input type="text" name="sdt" value="<?= isset($_SESSION['dn']['sdt']) ? htmlspecialchars($_SESSION['dn']['sdt']) : '' ?>" required>
            </p>
            
        </form>

        <h3>Giỏ hàng</h3>
        <table>
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $tong = 0;
            $hople = true;

            if (isset($_SESSION['giohang']) && !empty($_SESSION['giohang'])) {
                foreach ($_SESSION['giohang'] as $sp) {
                    if (!isset($sp['Gia']) || !isset($sp['SoLuong']) || !isset($sp['TenSP'])) {
                        echo "<tr><td colspan='4' class='error'>Lỗi: Sản phẩm trong giỏ hàng không hợp lệ.</td></tr>";
                        $hople = false;
                        break;
                    }

                    $thanhtien = $sp['Gia'] * $sp['SoLuong'];
                    $tong += $thanhtien;
                    ?>
                    <tr>
                        <td style="text-align: left;"><?= htmlspecialchars($sp['TenSP']) ?></td>
                        <td><?= number_format($sp['Gia'], 0, ',', '.') ?> VNĐ</td>
                        <td><?= $sp['SoLuong'] ?></td>
                        <td><?= number_format($thanhtien, 0, ',', '.') ?> VNĐ</td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='4' class='error'>Giỏ hàng trống!</td></tr>";
                $hople = false;
            }
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" style="font-weight: bold; text-align: right;">Tổng cộng</td>
                    <td style="font-weight: bold;"><?= number_format($tong, 0, ',', '.') ?> VNĐ</td>
                </tr>
            </tfoot>
        </table>

        <?php if ($hople): ?>
            <form action="index.php?action=hoanthanh" method="post">
                <input type="submit" value="Xác nhận đặt hàng" class="btn-confirm">
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
