<?php
include_once("../Model/mTinTuc.php"); // Đã sửa đường dẫn

class controlTinTuc {
    // Lấy tất cả tin tức
    function getAllTinTuc() {
        $model = new mTinTuc();
        $result = $model->layTatCaTinTuc(); // Đã sửa về tên phương thức ban đầu
        return $result;
    }
    // Lấy chi tiết một tin tức theo id (nếu cần mở rộng)
    function getTinTucById($id) {
        $model = new mTinTuc();
        $result = $model->layTinTucTheoId($id); // Đã sửa về tên phương thức ban đầu
        return $result;
    }
}
?>