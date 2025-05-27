<?php
include_once("Model/ketnoi.php"); 
$kn = new clsketnoi();
$conn = $kn->MoKetNoi();

$sql = "SELECT * FROM donhang ORDER BY ngaylap DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quản lý đơn hàng</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background-color: #f4f4f4; }
        .btn { padding: 5px 10px; border: none; border-radius: 4px; cursor: pointer; }
        .btn-xem { background-color: #4CAF50; color: white; }
        .btn-xoa { background-color: #f44336; color: white; }
    </style>
</head>
<body>
    <h2>Quản lý đơn hàng</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Địa chỉ</th>
            <th>SĐT</th>
            <th>Ngày lập</th>
            <th>Tổng tiền</th>
            <th>Hành động</th>
        </tr>
        <?php if ($result && mysqli_num_rows($result) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['hoten']; ?></td>
                    <td><?php echo $row['diachi']; ?></td>
                    <td><?php echo $row['sdt']; ?></td>
                    <td><?php echo $row['ngaylap']; ?></td>
                    <td><?php echo number_format($row['tongtien'], 0, ',', '.'); ?> VNĐ</td>

                    <td>
                        <a class="btn btn-xem" href="chitiet_donhang.php?id=<?php echo $row['id']; ?>">Xem</a>
                        <a class="btn btn-xoa" href="xoa_donhang.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc muốn xoá đơn hàng này?');">Xoá</a>
                    </td>
                </tr>
            <?php } ?>
        <?php else: ?>
            <tr><td colspan="8">Không có đơn hàng nào.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
<?php
$kn->DongKetNoi(); // Đóng kết nối sau khi sử dụng
?>
