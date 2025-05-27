<style>
    h2 {
        text-align: center;
        margin-bottom: 20px;
        font-family: Arial, sans-serif;
        color: #333;
    }
    .tblProd {
        max-width: 800px;
        margin: 0 auto;
        font-family: Arial, sans-serif;
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 10px;
        background-color: #f9f9f9;
    }
    .tblProd table {
        width: 100%;
        border-collapse: collapse;
    }
    .tblProd td {
        padding: 10px;
        vertical-align: middle;
    }
    .tblProd input[type="text"],
    .tblProd input[type="number"],
    .tblProd select {
        width: 95%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .tblProd input[type="file"] {
        padding: 5px;
    }
    .tblProd input[type="submit"],
    .tblProd input[type="reset"] {
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
        margin-right: 10px;
    }
    .tblProd input[type="submit"] {
        background-color: #28a745;
        color: white;
    }
    .tblProd input[type="reset"] {
        background-color: #dc3545;
        color: white;
    }
    .tblProd img {
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-top: 10px;
    }
</style>

<?php
    include_once("Controller/cSanPham.php");
    $p = new controlSanPham();
    $maSP = $_REQUEST["id"];
    $sp = $p->getOneSanPham($maSP);
    if($sp){
        while($r = mysqli_fetch_assoc($sp)){
            $tensp = $r['TenSP'];
            $giaban = $r['GiaBan'];
            $giagoc = $r['GiaGoc'];
            $hinhanh = $r['HinhAnh'];
            $thuonghieu = $r['TenTH'];
        }
    }else{
        echo "<script>alert('Mã Sản Phẩm Không Tồn Tại !!!')</script>";
        header("refresh:0; url='admin.php'");
    }
?>

<h2>Cập nhật sản phẩm</h2>
<form action="#" method='post' enctype="multipart/form-data" class='tblProd'>
    <table>
        <tr>
            <td><strong>Tên Sản Phẩm</strong></td>
            <td>
                <input type="text" name="TenSP" required value="<?php if(isset($tensp)) echo $tensp; ?>">
            </td>
            <td rowspan="5" style="text-align:center">
                <img src="img/sanpham/<?php if(isset($hinhanh)) echo $hinhanh; ?>" width="150px" alt="Hình sản phẩm">
            </td>
        </tr>
        <tr>
            <td><strong>Giá gốc</strong></td>
            <td>
                <input type="number" name="txtGiaGoc" required value="<?php if(isset($giagoc)) echo $giagoc; ?>">
            </td>
        </tr>
        <tr>
            <td><strong>Giá bán</strong></td>
            <td>
                <input type="number" name="txtGiaBan" required value="<?php if(isset($giaban)) echo $giaban; ?>">
            </td>
        </tr>
        <tr>
            <td><strong>Ảnh sản phẩm</strong></td>
            <td>
                <input type="file" name="txtHinhAnh">
            </td>
        </tr>
        <tr>
            <td><strong>Thương hiệu</strong></td>
            <td>
                <?php
                    include_once("Controller/cThuongHieu.php");
                    $pt = new controlThuongHieu();
                    $kq = $pt->getAllThuongHieu();
                    if(!$kq){
                        echo "No data!";
                    }else{
                        echo "<select name='cboThuongHieu'>";
                        while($r = mysqli_fetch_assoc($kq)){
                            $selected = ($r['TenTH'] == $thuonghieu) ? "selected" : "";
                            echo "<option value='".$r['MaTH']."' $selected>".$r['TenTH']."</option>";
                        }
                        echo "</select>";
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                <input type="submit" name="btnCapNhat" value="Cập nhật">
                <input type="reset" value="Hủy">
            </td>
        </tr>
    </table>
</form>

<?php
    if(isset($_REQUEST['btnCapNhat'])){
        $kq = $p->updateSanPham($maSP, $_REQUEST['TenSP'], $_REQUEST['txtGiaGoc'], $_REQUEST['txtGiaBan'], $_FILES['txtHinhAnh'], $hinhanh, $_REQUEST['cboThuongHieu']);        
        if($kq){
            echo "<script>alert('Cập nhật thành công')</script>";
            header("refresh:0; url=admin.php?type=sanpham");
        }else{
            echo "<script>alert('Cập nhật thất bại')</script>";
            header("refresh:0; url=admin.php?type=sanpham");
        }
    }
?>
