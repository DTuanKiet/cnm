<?php
class mTinTuc {
    // Lấy tất cả tin tức
    public function layTatCaTinTuc() {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        if (!$con) {
            return null;
        }

        $sql = "SELECT * FROM tintuc ORDER BY ngaydang DESC";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            die("Query failed: " . mysqli_error($con));
        }
        $p->DongKetNoi($con);

        return $result;
    }

    // Lấy tin tức theo ID
    public function layTinTucTheoId($id) {
        $p = new clsketnoi();
        $con = $p->MoKetNoi();
        if (!$con) {
            return null;
        }

        // Sử dụng prepared statement để tránh SQL injection
        $sql = "SELECT * FROM tintuc WHERE id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id); // "i" cho kiểu integer
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $p->DongKetNoi($con);

        return $result;
    }
}
?>
