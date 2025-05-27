<?php
    include_once("Controller/cThuongHieu.php");
    $p = new controlThuongHieu();
    $maSP = $_REQUEST["id"];
    $sp = $p->deleteThuongHieu($maSP);
    if ($sp) {
        echo "<script>
                alert('Xóa thành công');
                window.location.href = 'admin.php?type=thuonghieu';
              </script>";
    } else {
        echo "<script>
                alert('Xóa thất bại!');
                window.location.href = 'admin.php?type=thuonghieu';
              </script>";
    }
?>
