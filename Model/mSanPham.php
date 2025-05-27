<?php
    include_once("ketnoi.php");
    class modelSanPham{
        public function selectAllSanPham(){
            $p = new clsketnoi();
            $truyvan = "Select s.*, t.TenTH from sanpham s join thuonghieu t on s.MaTH = t.MaTH";
            $con = $p -> MoKetNoi();
            $kq = mysqli_query($con, $truyvan);
            $p -> DongKetNoi($con);
            return $kq;
        }

        public function selectAllSanPhamByType($th){
            $p = new clsketnoi();
            $truyvan = "Select s.*, t.TenTH from sanpham s join thuonghieu t on s.MaTH = t.MaTH where s.MaTH=$th";
            $con = $p -> MoKetNoi();
            $kq = mysqli_query($con, $truyvan);
            $p -> DongKetNoi($con);
            return $kq;
        }

        public function selectAllSanPhamByName($ten){
            $p = new clsketnoi();
            $truyvan = "Select s.*, t.TenTH from sanpham s join thuonghieu t on s.MaTH = t.MaTH where s.TenSP like N'%$ten%'";
            $con = $p -> MoKetNoi();
            $kq = mysqli_query($con, $truyvan);
            $p -> DongKetNoi($con);
            return $kq;
        }

        public function selectOneSanPham($maSP){
            $p = new clsketnoi();
            $truyvan = "Select s.*, t.TenTH from sanpham s join thuonghieu t on s.MaTH = t.MaTH where MaSP=$maSP";
            $con = $p -> MoKetNoi();
            $kq = mysqli_query($con, $truyvan);
            $p -> DongKetNoi($con);
            return $kq;
        }

        public function updateSanPham($maSP, $tenSP, $giaGoc, $giaBan, $hinhAnh, $thuongHieu){
            $p = new clsketnoi();
            if($giaBan == null){
                $truyvan = "update sanpham set TenSP=N'$tenSP', GiaGoc=$giaGoc, GiaBan = null, HinhAnh='$hinhAnh', MaTH=$thuongHieu where MaSP=$maSP ";
            }else{
                $truyvan = "update sanpham set TenSP=N'$tenSP', GiaGoc=$giaGoc, GiaBan =$giaBan, HinhAnh='$hinhAnh', MaTH=$thuongHieu where MaSP=$maSP ";
            }
            $con = $p -> MoKetNoi();
            $kq = mysqli_query($con, $truyvan);
            $p -> DongKetNoi($con);
            return $kq;
        }

        public function insertSanPham($tenSP, $giaBan, $giaGoc, $hinhAnh, $thuongHieu){
            $p = new clsketnoi();
            $con = $p -> MoKetNoi();
            $truyvan = "insert into sanpham(TenSP, GiaBan, GiaGoc, HinhAnh, MaTH) values(N'$tenSP',$giaBan,$giaGoc,'$hinhAnh','$thuongHieu')";
            $kq = mysqli_query($con, $truyvan);
            $p -> DongKetNoi($con);
            return $kq;
        }

        
        public function deleteSanPham($maSP){
            $p = new clsketnoi();
            $truyvan = "delete from sanpham where MaSP = $maSP";
            $con = $p -> MoKetNoi();
            $kq = mysqli_query($con, $truyvan);
            $p -> DongKetNoi($con);
            return $kq;
        }
}
?>