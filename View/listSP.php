<style>
    /* CSS giống như bạn đã gửi */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-family: Arial, sans-serif;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    th {
        background-color: rgb(7, 142, 246);
        color: white;
        text-align: center;
    }
    td {
        text-align: left;
    }
    .canhphai {
        text-align: right;
    }
    .canhgiua {
        text-align: center;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    tr:hover {
        background-color: #f1f1f1;
    }
    .action-links a {
        text-decoration: none;
        padding: 5px 10px;
        margin-right: 5px;
        border-radius: 5px;
        color: white;
    }
    .edit-btn {
        background-color: #2196F3;
    }
    .delete-btn {
        background-color: #f44336;
    }
    .top-action {
        text-align: center;
        padding: 10px;
    }
    .top-action a {
        background-color: rgb(4, 46, 255);
        color: white;
        padding: 8px 15px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
    }
    .top-action a:hover {
        background-color: rgb(59, 1, 252);
    }
    .pagination {
        text-align: center;
        margin-top: 20px;
    }
    .pagination a, .pagination strong {
        padding: 6px 12px;
        margin: 0 3px;
        text-decoration: none;
        border-radius: 5px;
        border: 1px solid #ccc;
        color: #333;
    }
    .pagination strong {
        background-color: #007BFF;
        color: white;
        border: none;
    }
    .pagination a:hover {
        background-color: #ddd;
    }
</style>

<?php
include_once("Controller/cSanPham.php");

$ctrl = new controlSanPham();

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$limit = 10;
$offset = ($page - 1) * $limit;

$total = $ctrl->getTotalSanPham();
$totalPages = ceil($total / $limit);

$kq = $ctrl->getSanPhamByPage($offset, $limit);

if (!$kq || $kq->num_rows == 0) {
    echo "<p style='color:red; font-weight:bold;'>Không có dữ liệu!</p>";
} else {
    echo "<div class='top-action'><a href='?action=insert'>+ Thêm sản phẩm</a></div>";
    echo "<table>";
    echo "<tr>
            <th>Mã SP</th>
            <th>Tên SP</th>
            <th>Giá Gốc</th>
            <th>Giá Bán</th>
            <th>Hình Ảnh</th>
            <th>Thương Hiệu</th>
            <th>Thao tác</th>
          </tr>";

    while ($r = $kq->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $r["MaSP"] . "</td>";
        echo "<td>" . $r["TenSP"] . "</td>";
        echo "<td class='canhphai'>" . number_format($r['GiaGoc'], 0, ",", ".") . "</td>";
        echo "<td class='canhphai'>" . number_format($r['GiaBan'], 0, ",", ".") . "</td>";
        echo "<td class='canhgiua'><img src='img/sanpham/" . $r["HinhAnh"] . "' width='50px'/></td>";
        echo "<td>" . $r["TenTH"] . "</td>";
        echo "<td class='canhgiua action-links'>
                <a href='?action=update&id=" . $r["MaSP"] . "' class='edit-btn'>Sửa</a>
                <a href='?action=delete&id=" . $r["MaSP"] . "' class='delete-btn' onclick='return confirm(\"Bạn có thật sự muốn xóa?\")'>Xóa</a>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
}

// Hiển thị phân trang
echo "<div class='pagination'>";
if ($page > 1) {
    echo "<a href='?type=sanpham&page=" . ($page - 1) . "'>&laquo; Trước</a>";
}

for ($i = 1; $i <= $totalPages; $i++) {
    if ($i == $page) {
        echo "<strong>$i</strong>";
    } else {
        echo "<a href='?type=sanpham&page=$i'>$i</a>";
    }
}

if ($page < $totalPages) {
    echo "<a href='?type=sanpham&page=" . ($page + 1) . "'>Tiếp &raquo;</a>";
}
echo "</div>";
?>
