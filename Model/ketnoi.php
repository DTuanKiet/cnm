<?php
class clsketnoi {
    private $conn;

    function MoKetNoi() {
        $this->conn = new mysqli("localhost", "root", "", "cnm");
        if ($this->conn->connect_error) {
            die("Kết nối thất bại: " . $this->conn->connect_error);
        }
        return $this->conn;
    }

    function DongKetNoi() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
?>