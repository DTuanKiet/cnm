<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once("Controller/cVaiTro.php");
$p = new controlVaiTro();
$kq = $p->getAllVaiTro();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách Vai trò</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            background: #fff;
        }
        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        .action-links a {
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 3px;
            color: #fff;
            margin: 0 5px;
            font-size: 14px;
        }
        .action-links a.update {
            background-color: #28a745;
        }
        .action-links a.delete {
            background-color: #dc3545;
        }
    </style>
</head>
<body>

    <?php
    if ($kq) {
        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
              </tr>";
        while ($r = mysqli_fetch_assoc($kq)) {
            echo "<tr>";
            echo "<td>" . $r["idrole"] . "</td>";
            echo "<td>" . $r["namerole"] . "</td>";
            echo "<td>" . $r["mota"] . "</td>";
            echo "<td class='action-links'>
                    <a class='update' href='?action=updateVT&id=" . $r['idrole'] . "'>Sửa</a>
                    <a class='delete' href='?action=deleteVT&id=" . $r['idrole'] . "'>Xóa</a>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='text-align:center;color:red;'>Lỗi xuất vai trò</p>";
    }
    ?>
</body>
</html>
