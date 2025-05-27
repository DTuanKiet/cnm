<?php
    include_once("Model/mSanPham.php");
    include_once("upload.php");
    class controlSanPham{
        public function getAllSanPham(){
            $p = new modelSanPham();
            $kq = $p -> selectAllSanPham();
            if(mysqli_num_rows($kq)>0){
                return $kq;
            }else{
                return false;
            }
        }

        public function getAllSanPhamByType($th){
            $p = new modelSanPham();
            $kq = $p -> selectAllSanPhamByType($th);
            if(mysqli_num_rows($kq)>0){
                return $kq;
            }else{
                return false;
            }
        }

        public function getAllSanPhamByName($ten){
            $p = new modelSanPham();
            $kq = $p -> selectAllSanPhamByName($ten);
            if(mysqli_num_rows($kq)>0){
                return $kq;
            }else{
                return false;
            }
        }

        public function getOneSanPham($maSP){
            $p = new modelSanPham();
            $kq = $p -> selectOneSanPham($maSP);
            if(mysqli_num_rows($kq)>0){
                return $kq;
            }else{
                return false;
            }
        }

        public function updateSanPham($maSP, $tenSP, $giaGoc, $giaBan,$fileHinh, $hinhAnh, $thuongHieu){
            if($fileHinh["tmp_name"]!=""){
                $pu = new uploadHinhSP();
                $kq = $pu -> uploadAnh($fileHinh, $tenSP, $hinhAnh);
                if(!$kq){
                    return false;
                }
            }
            $p = new modelSanPham();
            $kq = $p -> updateSanPham($maSP, $tenSP, $giaGoc, $giaBan, $hinhAnh, $thuongHieu);
            return $kq;
        }

        public function insertSanPham($tenSP, $giaBan, $giaGoc, $fileHinh, $thuongHieu){
            if($fileHinh['tmp_name']!=""){
                $pn = new uploadHinhSP();
                $kq = $pn -> uploadAnh($fileHinh, $tenSP, $hinh);
                if(!$kq){
                    return false;
                }
            }
            $p = new modelSanPham();
            $kq = $p -> insertSanPham($tenSP, $giaBan, $giaGoc, $hinh, $thuongHieu);
            return $kq;
        }

        public function deleteSanPham($maSP){
            $p = new modelSanPham();
            $kq = $p -> deleteSanPham($maSP);
            if($kq){
                return $kq;
            }else{
                return false;
            }
        }


}
?>