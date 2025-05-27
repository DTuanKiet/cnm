<?php
include_once("Model/mDonHang.php");

class controlNguoiDung {
    function searchUserByPhone($sdt) {
        $model = new modelDonHang();
        return $model->getChiTietDonHangBySDT($sdt);
    }
}
?>
