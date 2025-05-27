<?php
include_once("Model/mNguoiDung.php");

class ControlNguoiDung
{
    public function RegisterNguoiDung($nameuser, $password, $phonenumber, $idrole)
    {
        $p = new ModelNguoiDung();
        return $p->insertNDDK($nameuser, $password, $phonenumber, $idrole);
    }
    public function GetNguoiDung($tnd, $mk)
    {
        $mk = md5($mk);
        $p = new ModelNguoiDung();
        $ketqua = $p->SelectNguoiDung($tnd, $mk);
        if (mysqli_num_rows($ketqua) > 0) {
            while ($r = mysqli_fetch_assoc($ketqua)) {
                session_start();
                $_SESSION["dn"] = $r["idrole"];
                $_SESSION["iduser"] = $r["iduser"];
            }
            if ($_SESSION["dn"] == 1) {
                echo "<script>alert('Đăng nhập thành công. Chào mừng quản lý');</script>";
                header("refresh:0.5; url='admin.php'");
            } else {
                echo "<script>alert('Đăng nhập thành công, Chào mừng khách hàng');</script>";
                header("refresh:0.5; url='admin.php'");
            }
            exit();
        } else {
            echo "<script>alert('Đăng nhập thất bại');</script>";
            header("refresh:0.5; url='index.php?login.php'");
            exit();
        }
    }
    public function getAllND()
    {
        $p = new ModelNguoiDung();
        $kq = $p->selectAllND();
        if (mysqli_num_rows($kq) > 0) {
            return $kq;
        } else {
            return false;
        }
    }
    public function getOneND($idpro)
    {
        $p = new ModelNguoiDung();
        $kq = $p->selectOneND($idpro);
        if (mysqli_num_rows($kq) > 0) {
            return $kq;
        } else {
            return false;
        }
    }
    public function searchUserByPhone($phone)
    {
        $p = new ModelNguoiDung();
        $kq = $p->selectUserByPhone($phone);
        if (mysqli_num_rows($kq) > 0) {
            return $kq;
        } else {
            return false;
        }
    }

    public function updateND($idrole, $iduser, $nameuser, $password, $phonenumber)
    {
        $p = new ModelNguoiDung();
        return $p->updateND($idrole, $iduser, $nameuser, $password, $phonenumber);
    }
    public function updateCTND($iduser, $nameuser, $password, $phonenumber)
    {
        $p = new ModelNguoiDung();
        return $p->updateCTND($iduser, $nameuser, $password, $phonenumber);
    }
    public function deleteND($iduser)
    {
        $p = new ModelNguoiDung();
        return $p->deleteND($iduser);
    }
    public function insertND($nameuser, $password, $phonenumber, $idrole)
    {
        $p = new ModelNguoiDung();
        return $p->insertND($nameuser, $password, $phonenumber, $idrole);
    }
}
