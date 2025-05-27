<style>
    h2 {
        text-align: center;
        color: #333;
        font-family: Arial, sans-serif;
        margin-bottom: 20px;
    }

    form.tblCate {
        width: 60%;
        margin: auto;
        background: #fdfdfd;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
    }

    form.tblCate table {
        width: 100%;
    }

    form.tblCate td {
        padding: 10px;
        font-size: 15px;
    }

    form.tblCate input[type="text"],
    form.tblCate input[type="tel"] {
        width: 100%;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    form.tblCate input[type="submit"],
    form.tblCate input[type="reset"] {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        font-size: 14px;
        cursor: pointer;
        margin-right: 10px;
    }

    form.tblCate input[type="submit"] {
        background-color: #007bff;
        color: white;
    }

    form.tblCate input[type="reset"] {
        background-color: #dc3545;
        color: white;
    }

    form.tblCate input[type="submit"]:hover {
        background-color: #0069d9;
    }

    form.tblCate input[type="reset"]:hover {
        background-color: #c82333;
    }

    td[colspan="2"] {
        text-align: center;
        padding-top: 20px;
    }
</style>

<h2>Thêm thương hiệu</h2>
<form action="#" method="post" enctype="multipart/form-data" class="tblCate">
    <table>
        <tr>
            <td>Tên Thương Hiệu</td>
            <td><input type="text" name="TenTH" required></td>
        </tr>
        <tr>
            <td>Địa Chỉ</td>
            <td><input type="text" name="DiaChi" required></td>
        </tr>
        <tr>
            <td>Website</td>
            <td><input type="text" name="Website" required></td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td><input type="tel" name="DienThoai" pattern="[0-9]{10,11}" placeholder="VD: 0987654321"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="btnThem" value="Thêm thương hiệu">
                <input type="reset" value="Hủy">
            </td>
        </tr>
    </table>
</form>

<?php
include_once("Controller/cThuongHieu.php");
$p = new controlThuongHieu();
if (isset($_REQUEST['btnThem'])) {
    $kq = $p->insertThuongHieu(
        $_REQUEST['TenTH'],
        $_REQUEST['DiaChi'],
        $_REQUEST['Website'],
        $_REQUEST['DienThoai']
    );

    if ($kq) {
        echo "<script>alert('Thêm Thương hiệu thành công')</script>";
    } else {
        echo "<script>alert('Thêm Thương hiệu thất bại')</script>";
    }
}
?>
