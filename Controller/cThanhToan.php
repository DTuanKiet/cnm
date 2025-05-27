<?php
// Xóa session_start vì đã có trong index.php

// Kiểm tra giỏ hàng trước khi thanh toán
if (!isset($_SESSION['giohang']) || empty($_SESSION['giohang'])) {
    header("Location: index.php?action=giohang");
    exit;
}

// Khởi tạo biến để truyền dữ liệu sang View nếu cần
$hoten = '';
$diachi = '';
$sdt = '';
$thongbao = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hoten = trim($_POST['hoten'] ?? '');
    $diachi = trim($_POST['diachi'] ?? '');
    $sdt = trim($_POST['sdt'] ?? '');

    // Kiểm tra dữ liệu hợp lệ
    if (empty($hoten) || empty($diachi) || !preg_match('/^[0-9]{10,11}$/', $sdt)) {
        $thongbao = "Vui lòng nhập đầy đủ và đúng định dạng thông tin (SĐT phải là 10-11 số).";
    } else {
        // Bạn có thể xử lý đơn hàng ở đây (ghi DB, gửi mail, v.v.)
        // và chuyển hướng sang trang xác nhận hoàn tất
        $_SESSION['khachhang'] = [
            'hoten' => $hoten,
            'diachi' => $diachi,
            'sdt' => $sdt
        ];
        header("Location: index.php?action=hoanthanh");
        exit;
    }
}

// Chỉ gọi 1 lần duy nhất
include 'View/thanhtoan.php';
?>
