<?php
    include_once("Controller/cSanPham.php");
    $p = new controlSanPham();
    $maSP = $_REQUEST["id"];
    $sp = $p->deleteSanPham($maSP);
    if($sp){
        echo "<script>
                alert('Xóa thành công');
                window.location.href = 'admin.php?type=sanpham';
              </script>";
    }else{
        echo "<script>
                alert('Xóa thất bại!');
                window.location.href = 'admin.php?type=sanpham';
              </script>";
    }
?>
