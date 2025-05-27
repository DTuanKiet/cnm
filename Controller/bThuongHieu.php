<?php
    include_once("../Model/mThuongHieu.php");
    class controlThuongHieu{
        public function getAllThuongHieu(){
            $p = new modelThuongHieu();
            $kq = $p -> selectAllThuongHieu();
            if(mysqli_num_rows($kq)>0){
                return $kq;
            }else{
                return false;
            }
        }
        public function getOneThuongHieu($maTH){
            $p = new modelThuongHieu();
            $kq = $p -> selectOneThuongHieu($maTH);
            if(mysqli_num_rows($kq)>0){
                return $kq;
            }else{
                return false;
            }
        }
        public function updateThuongHieu($maTH, $tenTH, $diaChi, $website, $dienThoai){
            $p = new modelThuongHieu();
            $kq = $p -> updateThuongHieu($maTH, $tenTH, $diaChi, $website, $dienThoai);
            if($kq){
                return $kq;
            }else{
                return false;
            }
        }
        public function insertThuongHieu($tenTH, $diaChi, $website, $dienThoai){
            $p = new modelThuongHieu();
            $kq = $p -> insertThuongHieu($tenTH, $diaChi, $website, $dienThoai);
            if($kq){
                return $kq;
            }else{
                return false;
            }
        }
        public function deleteThuongHieu($maTH){
            $p = new modelThuongHieu();
            $kq = $p -> deleteThuongHieu($maTH);
            if($kq){
                return $kq;
            }else{
                return false;
            }
        }
    }
?>