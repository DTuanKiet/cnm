<?php
include_once("ketnoi.php");
class ModelNguoiDung
{
    public function insertNDDK($nameuser, $password, $phonenumber, $idrole)
    {
        $hashed_password = md5($password);
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $stmt = $con->prepare("INSERT INTO user (nameuser, password, phonenumber, idrole) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $nameuser, $hashed_password, $phonenumber, $idrole);
        $ketqua = $stmt->execute();
        $stmt->close();
        $p->DongKetNoi($con);
        return $ketqua;
    }

    public function SelectNguoiDung($nameuser, $password)
    {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $truyvan = "select * from user where nameuser='$nameuser' and password='$password'";
        $ketqua = mysqli_query($con, $truyvan);
        $p->DongKetNoi($con);
        return $ketqua;
    }

    public function selectAllND()
    {
        $p = new clsKetNoi();
        $con = $p->MoKetNoi();
        $truyvan = "select u.*, r.namerole from user u join role r on u.idrole=r.idrole";
        $ketqua = mysqli_query($con, $truyvan);
        $p->DongKetNoi($con);
        return $ketqua;
    }

    public function selectOneND($iduser)
    {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $truyvan = "select u.*, r.namerole from user u join role r on u.idrole=r.idrole where iduser='$iduser'";
        $ketqua = mysqli_query($con, $truyvan);
        $p->DongKetNoi($con);
        return $ketqua;
    }

    public function selectUserByPhone($phone)
    {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $stmt = $con->prepare("SELECT u.*, r.namerole FROM user u JOIN role r ON u.idrole = r.idrole WHERE phonenumber = ?");
        $stmt->bind_param("s", $phone);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $p->DongKetNoi($con);
        return $result;
    }


    public function insertND($nameuser, $password, $phonenumber, $idrole)
    {
        $hashed_password = md5($password);
        $p = new clsketnoi();
        $truyvan = "INSERT INTO user (nameuser, password, phonenumber, idrole) VALUES ( '$nameuser','$hashed_password','$phonenumber', '$idrole')";
        $con = $p->MoKetNoi();
        $ketqua = mysqli_query($con, $truyvan);
        $p->DongKetNoi($con);
        return $ketqua;
    }
    public function updateND($idrole, $iduser, $nameuser, $password, $phonenumber)
    {
        $p = new clsketnoi();
        $truyvan = "UPDATE user SET nameuser='$nameuser', password='$password', phonenumber='$phonenumber', idrole='$idrole' WHERE iduser='$iduser'";
        $con = $p->MoKetNoi();
        $ketqua = mysqli_query($con, $truyvan);
        $p->DongKetNoi($con);
        return $ketqua;
    }
    public function updateCTND($iduser, $nameuser, $password, $phonenumber)
    {
        $p = new clsketnoi();
        $truyvan = "UPDATE user SET nameuser='$nameuser', password='$password', phonenumber='$phonenumber' WHERE iduser='$iduser'";
        $con = $p->MoKetNoi();
        $ketqua = mysqli_query($con, $truyvan);
        $p->DongKetNoi($con);
        return $ketqua;
    }
    public function deleteND($iduser)
    {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        $truyvan = "DELETE FROM user WHERE iduser='$iduser'";
        $ketqua = mysqli_query($con, $truyvan);
        $p->DongKetNoi($con);
        return $ketqua;
    }
}
