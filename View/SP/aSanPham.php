<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px auto;
        font-family: Arial, sans-serif;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }
    th {
        background-color: #f4f4f4;
        color: #333;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    tr:hover {
        background-color: #f1f1f1;
    }
    .canhphai {
        text-align: right;
    }
    .canhgiua {
        text-align: center;
    }
    .edit-btn, .delete-btn {
        padding: 5px 10px;
        text-decoration: none;
        border-radius: 5px;
        margin: 2px;
        display: inline-block;
    }
    .edit-btn {
        background-color:rgb(0, 4, 255);
        color: white;
    }
    .delete-btn {
        background-color: #f44336;
        color: white;
    }
    .insert-link {
        display: inline-block;
        margin: 10px auto;
        padding: 8px 16px;
        background-color: #2196F3;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }
    .insert-row td {
        border: none;
    }
</style>

<?php
    include_once("Controller/cSanPham.php");
    $p = new controlSanPham();
    $kq = $p -> getAllSanPham();
    if(!$kq){
        echo "<p style='text-align:center; color:red;'>Không có dữ liệu!</p>";
    }else{
        echo "<table>";
        echo "<tr class='insert-row'>
                <td colspan='7' align='center'><a href='?action=insert' class='insert-link'>+ Thêm sản phẩm</a></td>
            </tr>";
        echo "<tr>
                <th>Mã SP</th>
                <th>Tên SP</th>
                <th>Giá Gốc</th>
                <th>Giá Bán</th>
                <th>Hình Ảnh</th>
                <th>Thương Hiệu</th>
                <th>Thao tác</th>
            </tr>";
            while($r = mysqli_fetch_assoc($kq)){
                echo "<tr>";
                    echo "<td>".$r["MaSP"]."</td>";
                    echo "<td>".$r["TenSP"]."</td>";
                    echo "<td class='canhphai'>".number_format($r['GiaGoc'],0,",",".")." đ</td>";
                    echo "<td class='canhphai'>".number_format($r['GiaBan'],0,",",".")." đ</td>";
                    echo "<td class='canhgiua'><img src='img/sanpham/".$r["HinhAnh"]."' width='50px'/></td>";
                    echo "<td>".$r["TenTH"]."</td>";
                    echo "<td>
                            <a href='?action=update&id=".$r["MaSP"]."' class='edit-btn'>Sửa</a>
                            <a href='?action=delete&id=".$r["MaSP"]."' class='delete-btn' onclick='return confirm(\"Bạn có thật sự muốn xóa?\")'>Xóa</a>
                          </td>";
                echo "</tr>";
            }
        echo "</table>";
    }
?>
