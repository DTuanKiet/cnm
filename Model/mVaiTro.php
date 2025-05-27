<?php
include_once("ketnoi.php");
class modelVaiTro
{
    public function selectAllVaiTro()
    {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $truyvan = "select * from role";
        $ketqua = mysqli_query($con, $truyvan);
        $p->DongKetNoi($con);
        return $ketqua;
    }
    public function selectoneVaiTro($idrole)
    {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $truyvan = "select * from role WHERE idrole='$idrole'";
        $ketqua = mysqli_query($con, $truyvan);
        $p->DongKetNoi($con);
        return $ketqua;
    }
    public function insertVT($idrole, $namerole, $mota)
    {
        $p = new clsketnoi();
        $truyvan = "INSERT INTO role (idrole, namerole, mota) VALUES ('$idrole', '$namerole', '$mota')";
        $con = $p->MoKetNoi();
        $ketqua = mysqli_query($con, $truyvan);
        $p->DongKetNoi($con);
        return $ketqua;
    }
    public function updateVT($idrole, $namerole, $mota)
    {
        $p = new clsketnoi();
        $truyvan = "UPDATE role SET namerole='$namerole', mota='$mota' WHERE idrole='$idrole'";
        $con = $p->MoKetNoi();
        $ketqua = mysqli_query($con, $truyvan);
        $p->DongKetNoi($con);
        return $ketqua;
    }

    public function deleteVT($idrole)
    {
        $p = new clsketnoi();
        $truyvan = "DELETE FROM role WHERE idrole='$idrole'";
        $con = $p->MoKetNoi();
        $ketqua = mysqli_query($con, $truyvan);
        $p->DongKetNoi($con);
        return $ketqua;
    }
}
