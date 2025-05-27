<?php
include_once("Controller/cNguoiDung.php");
$p = new controlNguoiDung();
$iduser = $_REQUEST["id"];
$nd = $p->getOneND($iduser);
if ($nd) {
    while ($r = mysqli_fetch_assoc($nd)) {
        $nameuser = $r["nameuser"];
        $password = $r["password"];
        $phonenumber = $r["phonenumber"];
    }
} else {
    echo "<script>alert('Mã không tồn tại')</script>";
    echo "<meta http-equiv='refresh' content='0;url=admin.php'>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Shop Phụ Kiện - Cập nhật thông tin</title>
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
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 15px;
        }
        td {
            padding: 10px;
            vertical-align: middle;
        }
        td:first-child {
            font-weight: 500;
            color: #333;
            width: 30%;
            text-align: right;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }
        input[type="submit"],
        input[type="reset"] {
            padding: 10px 20px;
            margin: 10px 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        input[type="reset"] {
            background-color: #6c757d;
            color: #fff;
        }
        input[type="reset"]:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="section-title"><span>Cập nhật thông tin cá nhân</span></h2>
        </div>
        <form action="#" method="post">
            <table>
                <tr>
                    <td>Tên người dùng:</td>
                    <td><input type="text" name="nameuser" value="<?php if (isset($nameuser)) echo $nameuser; ?>"></td>
                </tr>
                <tr>
                    <td>Mật khẩu:</td>
                    <td><input type="password" name="password" value="<?php if (isset($password)) echo $password; ?>"></td>
                </tr>
                <tr>
                    <td>Số điện thoại:</td>
                    <td><input type="text" name="phonenumber" value="<?php if (isset($phonenumber)) echo $phonenumber; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <input type="submit" value="Cập nhật" name="btnUpdate">
                        <input type="reset" value="Làm lại">
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <?php
    if (isset($_REQUEST["btnUpdate"])) {
        $password = $_REQUEST["password"];
        $passwordHash = md5($password);
        $kq = $p->updateCTND($iduser, $_REQUEST["nameuser"], $passwordHash, $_REQUEST["phonenumber"]);
        if ($kq) {
            echo "<script>alert('Cập nhật thành công')</script>";
            echo "<meta http-equiv='refresh' content='0;url=admin.php'>";
        } else {
            echo "<script>alert('Cập nhật thất bại')</script>";
        }
    }
    ?>
</body>
</html>