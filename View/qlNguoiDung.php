<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SESSION["dn"] > 1) {
    echo "<script>
        alert('Bạn không có quyền truy cập');
        window.location.href = '../index.php';
    </script>";
    exit();
}

include_once("Controller/cNguoiDung.php");
$p = new controlNguoiDung();

if (isset($_POST['btnSearch'])) {
    $phone = $_POST['searchPhone'];
    $kq = $p->searchUserByPhone($phone);
} else {
    $kq = $p->getAllND();
}
?>

<!-- Giao diện Form Tìm kiếm -->
<style>
    .search-form {
        margin: 30px auto;
        text-align: center;
    }

    .search-form input[type="text"] {
        padding: 10px;
        width: 300px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    .search-form input[type="submit"] {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        margin-left: 10px;
        cursor: pointer;
        font-size: 16px;
    }

    .search-form input[type="submit"]:hover {
        background-color: #0056b3;
    }

    table {
        width: 90%;
        margin: 20px auto;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    th, td {
        border: 1px solid #ccc;
        padding: 12px;
        text-align: center;
    }

    th {
        background-color:rgb(0, 136, 255);
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    tr:hover {
        background-color: #e2f0d9;
    }

    .action-links a {
        text-decoration: none;
        padding: 6px 12px;
        border-radius: 5px;
        font-size: 14px;
        color: white;
        margin: 0 3px;
    }

    .edit-btn {
        background-color:rgb(255, 0, 0);
    }

    .delete-btn {
        background-color:rgb(0, 136, 255);
    }

    h2 {
        text-align: center;
        color: #333;
        margin-top: 30px;
    }
</style>

<h2>Quản lý Người Dùng</h2>

<form method="post" action="" class="search-form">
    <input type="text" name="searchPhone" placeholder="Nhập số điện thoại" required>
    <input type="submit" name="btnSearch" value="Tìm kiếm">
</form>

<?php
if ($kq) {
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Số điện thoại</th>
            <th>Vai trò</th>
            <th>Thao tác</th>
          </tr>";
    while ($r = mysqli_fetch_assoc($kq)) {
        echo "<tr>";
        echo "<td>" . $r["iduser"] . "</td>";
        echo "<td>" . $r["nameuser"] . "</td>";
        echo "<td>" . $r["phonenumber"] . "</td>";
        echo "<td>" . $r["namerole"] . "</td>";
        echo "<td class='action-links'>
                <a href='?action=updateND&id=" . $r['iduser'] . "' class='edit-btn'>Sửa</a>
                <a href='?action=deleteND&id=" . $r['iduser'] . "' class='delete-btn' onclick='return confirm(\"Bạn có chắc muốn xóa người dùng này không?\")'>Xóa</a>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p style='text-align: center; color: red;'>Lỗi xuất danh sách Người Dùng</p>";
}
?>
