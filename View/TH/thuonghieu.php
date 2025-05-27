<?php
    include_once("Controller/cThuongHieu.php");
    $p = new controlThuongHieu();
    $kq = $p -> getAllThuongHieu();
    if(!$kq){
        echo "Không có dữ liệu!";
    }else{
        echo "<ul>";
        while($r = mysqli_fetch_assoc($kq)){
            echo "<li><a href='?th=".$r['MaTH']."'>".$r['TenTH']."</a></li>";
        }
        echo "</ul>";
    }
?>