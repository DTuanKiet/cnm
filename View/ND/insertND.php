<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm người dùng</title>
    <style>
        body {
            background-color: #f2f4f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-top: 30px;
        }

        .user-form {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .user-form table {
            width: 100%;
        }

        .user-form td {
            padding: 12px 10px;
            vertical-align: middle;
        }

        .user-form td:first-child {
            width: 35%;
            font-weight: 600;
            color: #333;
        }

        .user-form input[type="text"],
        .user-form input[type="password"],
        .user-form select {
            width: 100%;
            padding: 10px;
            font-size: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .user-form input[type="submit"],
        .user-form input[type="reset"] {
            padding: 10px 22px;
            font-size: 15px;
            font-weight: 600;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-right: 10px;
            transition: background-color 0.3s ease;
        }

        .user-form input[type="submit"] {
            background-color: #007bff;
            color: white;
        }

        .user-form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .user-form input[type="reset"] {
            background-color: #6c757d;
            color: white;
        }

        .user-form input[type="reset"]:hover {
            background-color: #5a6268;
        }

        .user-form td[colspan="2"] {
            text-align: center;
            padding-top: 20px;
        }
    </style>
</head>
<body>

<?php
include_once("Controller/cNguoiDung.php");
$p = new ControlNguoiDung();

$iduser = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";
$sp = $p->getOneND($iduser);

$nameuser = "";
$password = "";
$phonenumber = "";
$idrole = "";

if ($sp) {
    while ($r = mysqli_fetch_assoc($sp)) {
        $nameuser = $r["nameuser"];
        $password = $r["password"];
        $phonenumber = $r["phonenumber"];
        $idrole = $r["idrole"];
    }
}

// Nếu form bị submit lỗi, giữ lại dữ liệu đã nhập
if (isset($_POST["btnAdd"])) {
    $nameuser = $_POST["nameuser"];
    $password = $_POST["password"];
    $phonenumber = $_POST["phonenumber"];
    $idrole = $_POST["idrole"];
}
?>

<h2>Thêm người dùng</h2>
<form action="#" method="post" class="user-form">
    <table>
        <tr>
            <td>Tên người dùng:</td>
            <td><input type="text" name="nameuser" required value="<?php echo htmlspecialchars($nameuser); ?>"></td>
        </tr>
        <tr>
            <td>Mật khẩu:</td>
            <td><input type="password" name="password" required value="<?php echo htmlspecialchars($password); ?>"></td>
        </tr>
        <tr>
            <td>Số điện thoại:</td>
            <td><input type="text" name="phonenumber" required value="<?php echo htmlspecialchars($phonenumber); ?>"></td>
        </tr>
        <tr>
            <td>Vai trò:</td>
            <td>
                <select name="idrole" required>
                    <?php
                    include_once("Controller/cVaiTro.php");
                    $pt = new controlVaiTro();
                    $roles = $pt->getAllVaiTro();
                    if ($roles) {
                        while ($role = mysqli_fetch_assoc($roles)) {
                            $selected = ($role["idrole"] == $idrole) ? "selected" : "";
                            echo "<option value='" . $role['idrole'] . "' $selected>" . $role['namerole'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Không có dữ liệu vai trò</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Thêm người dùng" name="btnAdd">
                <input type="reset" value="Làm lại">
            </td>
        </tr>
    </table>
</form>

<?php
if (isset($_POST["btnAdd"])) {
    $kq = $p->insertND($_POST["nameuser"], $_POST["password"], $_POST["idrole"], $_POST["phonenumber"]);
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
