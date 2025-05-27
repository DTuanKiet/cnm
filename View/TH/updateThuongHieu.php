<style>
    h2 {
        text-align: center;
        font-family: Arial, sans-serif;
        color: #333;
        margin-bottom: 20px;
    }
    .tblCate {
        max-width: 600px;
        margin: auto;
        background-color: #f4f4f4;
        border: 1px solid #ccc;
        padding: 25px;
        border-radius: 10px;
        font-family: Arial, sans-serif;
    }
    .tblCate table {
        width: 100%;
    }
    .tblCate td {
        padding: 10px;
        vertical-align: top;
    }
    .tblCate input[type="text"],
    .tblCate input[type="tel"] {
        width: 95%;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #bbb;
    }
    .tblCate input[type="submit"],
    .tblCate input[type="reset"] {
        padding: 10px 20px;
        font-weight: bold;
        border: none;
        border-radius: 6px;
        margin-right: 10px;
        cursor: pointer;
    }
    .tblCate input[type="submit"] {
        background-color: #28a745;
        color: white;
    }
    .tblCate input[type="reset"] {
        background-color: #dc3545;
        color: white;
    }
</style>

<?php
    include_once('Controller/cThuongHieu.php');
    $p = new controlThuongHieu();
    $maTH = $_REQUEST["id"];
    $th = $p -> getOneThuongHieu($maTH);
    if($th){
        while($r = mysqli_fetch_assoc($th)){
            $tenTH = $r['TenTH'];
            $diaChi = $r['DiaChi'];
            $website = $r['Website'];
            $sdt = $r['DienThoai'];
        }
    }else{
        echo "<script>alert('Mã Thương Hiệu Không Tồn Tại !!!')</script>";
        header("refresh:0; url='admin.php'");
    }
?>

<h2>Cập nhật thương hiệu</h2>
<form action="#" method="post" enctype="multipart/form-data" class='tblCate'>
    <table>
        <tr>
            <td><strong>Tên Thương Hiệu</strong></td>
            <td><input type="text" name='TenTH' required value="<?php if(isset($tenTH)) echo $tenTH;?>"></td>
        </tr>
        <tr>
            <td><strong>Địa Chỉ</strong></td>
            <td><input type="text" name="DiaChi" required value="<?php if(isset($diaChi)) echo $diaChi;?>"></td>
        </tr>
        <tr>
            <td><strong>Website</strong></td>
            <td><input type="text" name="Website" required value="<?php if(isset($website)) echo $website;?>"></td>
        </tr>
        <tr>
            <td><strong>Số điện thoại</strong></td>
            <td><input type="tel" name="SDT" required value="<?php if(isset($sdt)) echo $sdt;?>"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" name="btnCapNhat" value="Cập nhật">
                <input type="reset" value="Hủy">
            </td>        
        </tr>
    </table>
</form>

<?php
    if(isset($_REQUEST['btnCapNhat'])){
        $kq = $p->updateThuongHieu($maTH, $_REQUEST['TenTH'], $_REQUEST['DiaChi'], $_REQUEST['Website'],$_REQUEST['SDT']);        
        if($kq){
            echo "<script>alert('Cập nhật thành công')</script>";
            header("refresh:0; url=admin.php?type=sanpham");
        }else{
            echo "<script>alert('Cập nhật thất bại')</script>";
            header("refresh:0; url=admin.php?type=sanpham");
        }
    }
?>
