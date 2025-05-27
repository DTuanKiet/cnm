<?php
session_start();

class controlGioHang {
    // Lấy danh sách giỏ hàng từ session
    public function getGioHang() {
        if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
            return $_SESSION['giohang'];
        }
        return [];
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function capNhatSoLuong($idsp, $soluong) {
        if (isset($_SESSION['giohang'][$idsp])) {
            $_SESSION['giohang'][$idsp]['soluong'] = max(1, intval($soluong));
        }
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function xoaSanPham($idsp) {
        if (isset($_SESSION['giohang'][$idsp])) {
            unset($_SESSION['giohang'][$idsp]);
        }
    }
}
?>
