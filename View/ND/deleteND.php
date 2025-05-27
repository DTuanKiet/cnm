<?php
include_once("Controller/cNguoiDung.php");

if (isset($_GET['id'])) {
    $iduser = $_GET['id'];
    $p = new ControlNguoiDung();
    $kq = $p->deleteND($iduser);

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
