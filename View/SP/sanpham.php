<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .product-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    margin-top: 20px;
}

.product-item {
    width: 30%;
    background: #fff;
    border-radius: 10px;
    padding: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    text-align: center;
    transition: transform 0.3s;
}

.product-item:hover {
    transform: translateY(-5px);
}

.product-image img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
}

.product-info {
    margin-top: 10px;
}

.product-info strong a {
    text-decoration: none;
    color: #333;
    font-size: 16px;
}

.price {
    color: #d60000;
    font-weight: bold;
    font-size: 15px;
}

.old-price {
    color: #888;
    font-size: 13px;
}
.product-image img {
    width: 100%;
    max-width: 220px;  /* Giới hạn chiều rộng tối đa */
    height: auto;
    border-radius: 8px;
    margin: 0 auto;
    display: block;
}

    </style>
</head>
<body>
    
</body>
</html>
<?php
include_once("Controller/cSanPham.php");
$p = new controlSanPham();

if (isset($_REQUEST['th'])) {
    $kq = $p->getAllSanPhamByType($_REQUEST['th']);
} elseif (isset($_REQUEST['btnTimKiem']) && !empty($_REQUEST['txtname'])) {
    $kq = $p->getAllSanPhamByName($_REQUEST['txtname']);
} else {
    $kq = $p->getAllSanPham();
}


if (!$kq) {
    echo "<p>Không có dữ liệu!</p>";
} else {
    echo '<div class="product-grid">';
    while ($r = mysqli_fetch_assoc($kq)) {
        echo '<div class="product-item">';
        echo '<div class="product-image">';
        echo "<a href='index.php?chitietsanpham&id={$r["MaSP"]}'>";
        echo "<img src='img/sanpham/{$r["HinhAnh"]}' alt='{$r["TenSP"]}' />";
        echo "</a>";
        echo '</div>';
        echo '<div class="product-info">';
        echo "<strong><a href='index.php?chitietsanpham&id={$r["MaSP"]}'>{$r["TenSP"]}</a></strong><br>";
        if ($r["GiaBan"] == null) {
            echo "<span class='price'>" . number_format($r['GiaGoc'], 0, ",", ".") . " ₫</span>";
        } else {
            echo "<span class='price'>" . number_format($r['GiaBan'], 0, ",", ".") . " ₫</span><br>";
            echo "<span class='old-price'><s>" . number_format($r['GiaGoc'], 0, ",", ".") . " ₫</s></span>";
        }
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
}
?>
