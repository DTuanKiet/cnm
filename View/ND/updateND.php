<style>
    h2 {
        text-align: center;
        color: #2c3e50;
        font-family: Arial, sans-serif;
        margin-bottom: 20px;
    }
    .user-form {
        max-width: 550px;
        margin: auto;
        padding: 25px;
        background: #f9f9f9;
        border: 1px solid #ccc;
        border-radius: 12px;
        font-family: Arial, sans-serif;
    }
    .user-form table {
        width: 100%;
    }
    .user-form td {
        padding: 12px 8px;
        vertical-align: top;
    }
    .user-form input[type="text"],
    .user-form input[type="password"],
    .user-form select {
        width: 100%;
        padding: 10px;
        border: 1px solid #bbb;
        border-radius: 5px;
        font-size: 14px;
    }
    .user-form input[type="submit"],
    .user-form input[type="reset"] {
        padding: 10px 20px;
        font-weight: bold;
        border: none;
        border-radius: 6px;
        margin-top: 10px;
        cursor: pointer;
    }
    .user-form input[type="submit"] {
        background-color: #28a745;
        color: white;
    }
    .user-form input[type="reset"] {
        background-color: #6c757d;
        color: white;
    }
</style>

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
        $idrole = $r["idrole"];
    }
} else {
    echo "<script>alert('Mã không tồn tại')</script>";
    echo "<meta http-equiv='refresh' content='0;url=admin.php'>";
}
?>

<h2>Cập nhật người dùng</h2>
<form action="#" method="post" class="user-form">
    <table>
        <tr>
            <td><strong>Tên người dùng:</strong></td>
            <td><input type="text" name="nameuser" required value="<?php if (isset($nameuser)) echo $nameuser; ?>"></td>
        </tr>
        <tr>
            <td><strong>Mật khẩu:</strong></td>
            <td><input type="password" name="password" required value="<?php if (isset($password)) echo $password; ?>"></td>
        </tr>
        <tr>
            <td><strong>Số điện thoại:</strong></td>
            <td><input type="text" name="phonenumber" required value="<?php if (isset($phonenumber)) echo $phonenumber; ?>"></td>
        </tr>
        <tr>
            <td><strong>Vai trò:</strong></td>
            <td>
                <select name="idrole" required>
                    <?php
                    include_once("Controller/cVaiTro.php");
                    $pt = new controlVaiTro();
                    $roles = $pt->getAllVaiTro();
                    if ($roles) {
                        while ($role = mysqli_fetch_assoc($roles)) {
                            $selected = ($role["idrole"] == $idrole) ? "selected" : "";
                            echo "<option value='{$role['idrole']}' $selected>{$role['namerole']}</option>";
                        }
                    } else {
                        echo "<option value=''>Không có dữ liệu vai trò</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center">
                <input type="submit" value="Cập nhật" name="btnUpdate">
                <input type="reset" value="Làm lại">
            </td>
        </tr>
    </table>
</form>

<?php
if (isset($_REQUEST["btnUpdate"])) {
    $kq = $p->updateND($_REQUEST["idrole"], $iduser, $_REQUEST["nameuser"], $_REQUEST["password"], $_REQUEST["phonenumber"]);
    if ($kq) {
        echo "<script>alert('Cập nhật thành công')</script>";
        echo "<meta http-equiv='refresh' content='0;url=admin.php'>";
    } else {
        echo "<script>alert('Cập nhật thất bại')</script>";
    }
}
?>
