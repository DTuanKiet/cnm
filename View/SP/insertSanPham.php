<style>
    h2 {
        text-align: center;
        color: #333;
        font-family: Arial, sans-serif;
        margin-bottom: 20px;
    }

    form.tblProd {
        width: 60%;
        margin: auto;
        background: #fdfdfd;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
    }

    form.tblProd table {
        width: 100%;
    }

    form.tblProd td {
        padding: 10px;
        font-size: 15px;
    }

    form.tblProd input[type="text"],
    form.tblProd input[type="number"],
    form.tblProd input[type="file"],
    form.tblProd select {
        width: 100%;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    form.tblProd input[type="submit"],
    form.tblProd input[type="reset"] {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        font-size: 14px;
        cursor: pointer;
        margin-right: 10px;
    }

    form.tblProd input[type="submit"] {
        background-color: #28a745;
        color: white;
    }

    form.tblProd input[type="reset"] {
        background-color: #dc3545;
        color: white;
    }

    form.tblProd input[type="submit"]:hover {
        background-color: #218838;
    }

    form.tblProd input[type="reset"]:hover {
        background-color: #c82333;
    }

    td[colspan="2"] {
        text-align: center;
        padding-top: 20px;
    }
</style>

<h2>Thêm sản phẩm</h2>
<form action="#" method="post" enctype="multipart/form-data" class="tblProd">
    <table>
        <tr>
            <td>Tên Sản Phẩm</td>
            <td><input type="text" name="TenSP" required></td>
        </tr>
        <tr>
            <td>Giá gốc</td>
            <td><input type="number" name="txtGiaGoc" required></td>
        </tr>
        <tr>
            <td>Giá bán</td>
            <td><input type="number" name="txtGiaBan" required></td>
        </tr>
        <tr>
            <td>Ảnh sản phẩm</td>
            <td><input type="file" name="txtHinhAnh"></td>
        </tr>
        <tr>
            <td>Thương hiệu</td>
            <td>
                <?php
                include_once("Controller/cThuongHieu.php");
                $pt = new controlThuongHieu();
                $kq = $pt->getAllThuongHieu();
                if (!$kq) {
                    echo "<p style='color:red'>Không có dữ liệu thương hiệu!</p>";
                } else {
                    echo "<select name='cboThuongHieu'>";
                    while ($r = mysqli_fetch_assoc($kq)) {
                        echo "<option value='{$r['MaTH']}'>{$r['TenTH']}</option>";
                    }
                    echo "</select>";
                }
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="btnThem" value="Thêm sản phẩm">
                <input type="reset" value="Hủy">
            </td>
        </tr>
    </table>
</form>

<?php
include_once("Controller/cSanPham.php");
$p = new controlSanPham();

if (isset($_REQUEST['btnThem'])) {
    $kq = $p->insertSanPham(
        $_REQUEST['TenSP'],
        $_REQUEST['txtGiaBan'],
        $_REQUEST['txtGiaGoc'],
        $_FILES['txtHinhAnh'],
        $_REQUEST['cboThuongHieu']
    );

    if ($kq) {
        echo "<script>alert('Thêm sản phẩm thành công!')</script>";
        header("refresh:0; url='admin.php?action=xemSP'");
    } else {
        echo "<script>alert('Thêm sản phẩm thất bại!')</script>";
    }
}
?>
