<?php
include_once("Model/mVaiTro.php");
class controlVaiTro
{
    public function getAllVaiTro()
    {
        $p = new modelVaiTro();
        $kq = $p->selectAllVaiTro();
        if (mysqli_num_rows($kq) > 0) {
            return $kq;
        } else {
            return false;
        }
    }
    public function getOneVaiTro($idrole)
    {
        $p = new modelVaiTro();
        $kq = $p->selectoneVaiTro($idrole);
        if (mysqli_num_rows($kq) > 0) {
            return $kq;
        } else {
            return false;
        }
    }
    public function updateVT($idrole, $namerole, $mota)
    {
        $p = new modelVaiTro();
        return $p->updateVT($idrole, $namerole, $mota);
    }
    public function deleteVT($idrole)
    {
        $p = new modelVaiTro();
        return $p->deleteVT($idrole);
    }
    public function insertVT($idrole, $namerole, $mota)
    {
        $p = new modelVaiTro();
        return $p->insertVT($idrole, $namerole, $mota);
    }
}
