<?php
// Kiểm tra xem session đã được khởi tạo chưa, nếu chưa thì khởi tạo
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['giohang'])) {
    // Kết nối đến cơ sở dữ liệu
    include_once(__DIR__ . '/../Model/ketnoi.php'); // Đảm bảo đường dẫn đúng
    $kn = new clsketnoi();
    $conn = $kn->MoKetNoi();

    // Lấy thông tin người dùng
    $hoten = $_POST['hoten'] ?? '';
    $diachi = $_POST['diachi'] ?? '';
    $sdt = $_POST['sdt'] ?? '';
    $giohang = $_SESSION['giohang'];

    // Lưu đơn hàng
    $sql = "INSERT INTO donhang (HoTen, DiaChi, SDT) VALUES (?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $hoten, $diachi, $sdt);
        $stmt->execute();
        $MaDonHang = $stmt->insert_id; // Lấy ID đơn hàng vừa tạo
        $stmt->close();
    } else {
        die("Lỗi khi chuẩn bị câu truy vấn: " . $conn->error);
    }

    // Lưu chi tiết sản phẩm trong giỏ hàng
    foreach ($giohang as $item) {
        $maSP = $item['MaSP'];
        $soLuong = $item['SoLuong'];
        $gia = $item['Gia'];

        // Lưu chi tiết sản phẩm vào bảng chitietdonhang
        $sqlCT = "INSERT INTO chitietdonhang (MaDonHang, MaSP, SoLuong, Gia) VALUES (?, ?, ?, ?)";
        if ($stmtCT = $conn->prepare($sqlCT)) {
            $stmtCT->bind_param("iiid", $MaDonHang, $maSP, $soLuong, $gia);
            $stmtCT->execute();
            $stmtCT->close();
        } else {
            die("Lỗi khi chuẩn bị câu truy vấn chi tiết đơn hàng: " . $conn->error);
        }
    }

    // Đóng kết nối và dọn dẹp
    $conn->close();
    unset($_SESSION['giohang']); // Xóa giỏ hàng sau khi đặt

    // Thông báo đơn hàng đã được đặt thành công
    echo "<h2>Đặt hàng thành công!</h2>";
    echo "<p>Cảm ơn bạn, $hoten. Đơn hàng của bạn đã được tiếp nhận và đang được xử lý.</p>";
    echo "<a href='index.php'>Về trang chủ</a>";
} else {
    // Nếu không phải phương thức POST hoặc giỏ hàng chưa được thiết lập, chuyển về trang chủ
    header("Location: index.php");
    exit;
}
?>
