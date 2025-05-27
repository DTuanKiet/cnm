<?php
    include_once("ketnoi.php");
    class modelThuongHieu{
        public function selectAllThuongHieu(){
            $p = new clsketnoi();
            $truyvan = "Select * from thuonghieu";
            $con = $p -> MoKetNoi();
            $kq = mysqli_query($con, $truyvan);
            $p -> DongKetNoi($con);
            return $kq;
        }
        public function selectOneThuongHieu($maTH){
            $p = new clsketnoi();
            $truyvan = "Select * from thuonghieu where MaTH = $maTH";
            $con = $p -> MoKetNoi();
            $kq = mysqli_query($con, $truyvan);
            $p -> DongKetNoi($con);
            return $kq;
        }
        public function updateThuongHieu($maTH, $tenTH, $diaChi, $website, $dienThoai){
            $p = new clsketnoi();
            $truyvan = "update thuonghieu set TenTH = N'$tenTH', DiaChi = N'$diaChi', Website = '$website', DienThoai = $dienThoai where MaTH = $maTH";
            $con = $p -> MoKetNoi();
            $kq = mysqli_query($con, $truyvan);
            $p -> DongKetNoi($con);
            return $kq;
        }
        public function insertThuongHieu($tenTH, $diaChi, $website, $dienThoai){
            $p = new clsketnoi();
            $truyvan = "insert into thuonghieu(TenTH, DiaChi, Website, DienThoai) values(N'$tenTH',N'$diaChi','$website',$dienThoai)";
            $con = $p -> MoKetNoi();
            $kq = mysqli_query($con, $truyvan);
            $p -> DongKetNoi($con);
            return $kq;
        }
        public function deleteThuongHieu($maTH){
            $p = new clsketnoi();
            $truyvan = "delete from thuonghieu where MaTh = $maTH";
            $con = $p -> MoKetNoi();
            $kq = mysqli_query($con, $truyvan);
            $p -> DongKetNoi($con);
            return $kq;
        }
    }
?>