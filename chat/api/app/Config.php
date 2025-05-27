<?php
class Config {
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "chatapp";

    public function connect() {
        $conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
        if ($conn->connect_error) {
            die("Lỗi kết nối Database: " . $conn->connect_error);
        }
        return $conn;
    }
}