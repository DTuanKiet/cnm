<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm vai trò</title>
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            font-size: 28px;
            margin-bottom: 25px;
        }

        .role-form {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .role-form table {
            width: 100%;
        }

        .role-form td {
            padding: 12px 10px;
            vertical-align: top;
        }

        .role-form td:first-child {
            width: 30%;
            font-weight: 600;
            color: #333;
        }

        .role-form input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        .role-form input[type="submit"],
        .role-form input[type="reset"] {
            padding: 10px 22px;
            font-size: 15px;
            font-weight: 600;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .role-form input[type="submit"] {
            background-color: #28a745;
            color: #fff;
        }

        .role-form input[type="submit"]:hover {
            background-color: #218838;
        }

        .role-form input[type="reset"] {
            background-color: #6c757d;
            color: #fff;
        }

        .role-form input[type="reset"]:hover {
            background-color: #5a6268;
        }

        .role-form td[colspan="2"] {
            text-align: center;
            padding-top: 20px;
        }
    </style>
</head>
<body>

<?php
include_once("Controller/cVaiTro.php");
$p = new controlVaiTro();

// Giữ lại dữ liệu đã nhập nếu thêm thất bại
$idrole = isset($_POST["idrole"]) ? $_POST["idrole"] : "";
$namerole = isset($_POST["namerole"]) ? $_POST["namerole"] : "";
$mota = isset($_POST["mota"]) ? $_POST["mota"] : "";
?>

<h2>Thêm vai trò</h2>
<form action="#" method="post" class="role-form">
    <table>
        <tr>
            <td><strong>Mã vai trò:</strong></td>
            <td><input type="text" name="idrole" required value="<?php echo htmlspecialchars($idrole); ?>"></td>
        </tr>
        <tr>
            <td><strong>Tên vai trò:</strong></td>
            <td><input type="text" name="namerole" required value="<?php echo htmlspecialchars($namerole); ?>"></td>
        </tr>
        <tr>
            <td><strong>Mô tả:</strong></td>
            <td><input type="text" name="mota" required value="<?php echo htmlspecialchars($mota); ?>"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Thêm" name="btnAdd">
                <input type="reset" value="Làm lại">
            </td>
        </tr>
    </table>
</form>

<?php
if (isset($_POST["btnAdd"])) {
    $kq = $p->insertVT($_POST["idrole"], $_POST["namerole"], $_POST["mota"]);
    if ($kq) {
        echo "<script>alert('Thêm thành công')</script>";
        echo "<meta http-equiv='refresh' content='0;url=admin.php'>";
    } else {
        echo "<script>alert('Thêm thất bại')</script>";
    }
}
?>

</body>
</html>
