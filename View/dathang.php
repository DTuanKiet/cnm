<?php
session_start();

// Khởi tạo giỏ hàng nếu chưa tồn tại
if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = [];
}

// Lấy thông tin sản phẩm từ form
if (isset($_POST['masp']) && isset($_POST['soluong'])) {
    $maSP = $_POST['masp'];
    $soLuong = (int)$_POST['soluong'];

    // Kết nối cơ sở dữ liệu để lấy thông tin sản phẩm
    include_once("../Model/ketnoi.php");
    $kn = new clsketnoi();
    $conn = $kn->MoKetNoi();

    $sql = "SELECT TenSP, GiaBan, GiaGoc, HinhAnh 
            FROM sanpham 
            WHERE MaSP = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $maSP);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Tạo thông tin sản phẩm để lưu vào giỏ hàng
        $sanPham = [
            'MaSP' => $maSP,
            'TenSP' => $row['TenSP'],
            'Gia' => $row['GiaBan'] != null ? $row['GiaBan'] : $row['GiaGoc'],
            'HinhAnh' => $row['HinhAnh'],
            'SoLuong' => $soLuong
        ];

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        if (isset($_SESSION['giohang'][$maSP])) {
            // Nếu đã có, cộng dồn số lượng
            $_SESSION['giohang'][$maSP]['SoLuong'] += $soLuong;
        } else {
            // Nếu chưa có, thêm sản phẩm mới vào giỏ
            $_SESSION['giohang'][$maSP] = $sanPham;
        }

        // Chuyển hướng đến trang giỏ hàng
        header("Location: giohang.php");
    } else {
        echo "Không tìm thấy sản phẩm!";
    }

    $stmt->close();
    $kn->DongKetNoi($conn);
} else {
    echo "Dữ liệu không hợp lệ!";
}


?>