<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-family: Arial, sans-serif;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px;
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
        padding: 6px 12px;
        margin-right: 5px;
        border-radius: 5px;
        color: white;
        font-size: 14px;
        display: inline-block;
    }

    .edit-btn {
        background-color: #2196F3;
    }

    .delete-btn {
        background-color: #f44336;
    }

    .top-action {
        text-align: center;
        padding: 15px 0;
    }

    .top-action a {
        background-color: rgb(4, 46, 255);
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        font-size: 15px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .top-action a:hover {
        background-color: rgb(59, 1, 252);
    }
</style>

<?php
include_once("Controller/cThuongHieu.php");
$p = new controlThuongHieu();
$kq = $p->getAllThuongHieu();

if (!$kq) {
    echo "<p style='color:red; font-weight:bold;'>Không có dữ liệu!</p>";
} else {
    echo "<div class='top-action'><a href='?action=insert'>+ Thêm thương hiệu</a></div>";
    echo "<table>";
    echo "<tr>
            <th>Mã TH</th>
            <th>Tên TH</th>
            <th>Địa chỉ</th>
            <th>Website</th>
            <th>Điện thoại</th>
            <th>Thao tác</th>
          </tr>";

    while ($r = mysqli_fetch_assoc($kq)) {
        echo "<tr>";
        echo "<td>" . $r["MaTH"] . "</td>";
        echo "<td>" . $r["TenTH"] . "</td>";
        echo "<td>" . $r["DiaChi"] . "</td>";
        echo "<td><a href='" . $r["Website"] . "' target='_blank'>" . $r["Website"] . "</a></td>";
        echo "<td class='canhgiua'>" . $r["DienThoai"] . "</td>";
        echo "<td class='canhgiua action-links'>
                <a href='?action=update&id=" . $r["MaTH"] . "' class='edit-btn'>Sửa</a>
                <a href='?action=delete&id=" . $r["MaTH"] . "' class='delete-btn' onclick='return confirm(\"Bạn có thật sự muốn xóa?\")'>Xóa</a>
              </td>";
        echo "</tr>";
    }

    echo "</table>";
}
?>
