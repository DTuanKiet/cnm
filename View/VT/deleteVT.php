<?php
include_once("Controller/cVaiTro.php");

if (isset($_GET['id'])) {
    $idrole = $_GET['id'];
    $p = new controlVaiTro();
    $kq = $p->deleteVT($idrole);

    if ($kq) {
        echo "<script>alert('Xóa thành công');</script>";
        echo "<meta http-equiv='refresh' content='0;url=admin.php'>";
    } else {
        echo "<script>alert('Xóa thất bại');</script>";
    }
    header("refresh:0.5, url='admin.php'");
} else {
    echo "<script>alert('ID không hợp lệ');</script>";
    header("refresh:0.5, url='admin.php'");
}
