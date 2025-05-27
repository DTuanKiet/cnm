<?php
include_once("Model/ketnoi.php");

class modelDonHang {
    function getChiTietDonHangBySDT($sdt) {
        $connObj = new clsketnoi();
        $conn = $connObj->MoKetNoi();

        $sql = "SELECT ctdh.MaCT, ctdh.MaDonHang, ctdh.MaSP, ctdh.SoLuong, ctdh.Gia, dh.iduser
                FROM chitietdonhang ctdh
                JOIN donhang dh ON ctdh.MaDonHang = dh.id
                WHERE dh.sdt = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $sdt);
        $stmt->execute();
        $result = $stmt->get_result();

        $connObj->DongKetNoi($conn);
        return $result;
    }
}
?>
