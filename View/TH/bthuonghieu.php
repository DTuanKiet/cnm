<?php
include_once("../Controller/bThuongHieu.php"); // Try one level up first
$sp = new controlThuongHieu();
$skq = $sp->getALLThuongHieu();
if(!$skq){
    echo "Không có dữ liệu!";
} else {
    echo "<ul>";
    while($r = mysqli_fetch_assoc($skq)){
        echo "<li><a href='?th=$r[MaTH]'>$r[TenTH]</a></li>";
    }
    echo "</ul>";
}
?>