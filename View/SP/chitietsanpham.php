<?php
include_once("Model/ketnoi.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $kn = new clsketnoi();
    $conn = $kn->MoKetNoi();

    if (!$conn) {
        die("Lỗi kết nối: " . mysqli_connect_error());
    }

    $sql = "SELECT sp.*, th.TenTH 
            FROM sanpham sp 
            JOIN thuonghieu th ON sp.MaTH = th.MaTH 
            WHERE sp.MaSP = ?";
    
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Lỗi prepare: " . $conn->error);
    }
    
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<div class='error'>Không tìm thấy sản phẩm!</div>";
        exit;
    }

    $stmt->close();
    $kn->DongKetNoi($conn);
} else {
    echo "<div class='error'>Không có mã sản phẩm!</div>";
    exit;
}
?>

<!-- STYLE -->
<style>
    .ctsp-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: flex-start;
        margin: 40px auto;
        max-width: 900px;
        background: #fff;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        border-radius: 10px;
        overflow: hidden;
        font-family: Arial, sans-serif;
    }

    .ctsp-img {
        flex: 1;
        padding: 30px;
        text-align: center;
        background: #f8f9fa;
    }

    .ctsp-img img {
        max-width: 100%;
        max-height: 300px;
        border-radius: 10px;
        object-fit: cover;
    }

    .ctsp-info {
        flex: 1;
        padding: 30px;
    }

    h2 {
        text-align: center;
        color: #333;
        margin-top: 30px;
    }

    .ctsp-info p {
        font-size: 16px;
        margin-bottom: 15px;
    }

    .ctsp-info strong {
        color: #555;
    }

    .ctsp-info input[type="number"] {
        padding: 6px 10px;
        width: 60px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .btn-dathang {
        padding: 10px 25px;
        background-color: #28a745;
        color: white;
        border: none;
        font-size: 16px;
        border-radius: 6px;
        cursor: pointer;
        margin-top: 10px;
    }

    .btn-dathang:hover {
        background-color: #218838;
    }

    .btn-back {
        display: inline-block;
        margin-top: 20px;
        color: #007bff;
        text-decoration: none;
        font-size: 15px;
    }

    .btn-back:hover {
        text-decoration: underline;
    }

    .error {
        text-align: center;
        color: red;
        font-size: 18px;
        margin-top: 30px;
    }

    @media screen and (max-width: 768px) {
        .ctsp-container {
            flex-direction: column;
        }

        .ctsp-img, .ctsp-info {
            padding: 20px;
        }
    }
</style>

<!-- CONTENT -->
<h2><?php echo htmlspecialchars($row['TenSP']); ?></h2>
<div class="ctsp-container">
    <div class="ctsp-img">
        <img src="/CNM/img/sanpham/<?php echo htmlspecialchars($row['HinhAnh'] . (strpos($row['HinhAnh'], '.') === false ? '.jpg' : '')); ?>" alt="<?php echo htmlspecialchars($row['TenSP']); ?>">
    </div>
    <div class="ctsp-info">
        <p><strong>Thương hiệu:</strong> <?php echo htmlspecialchars($row['TenTH']); ?></p>
        <p><strong>Mô tả:</strong>
    <?php echo isset($row['MoTa']) && !empty($row['MoTa']) ? htmlspecialchars($row['MoTa']) : "Chưa có mô tả"; ?>
</p>

        <p><strong>Giá:</strong> 
            <?php
                $gia = $row['GiaBan'] ?? $row['GiaGoc'];
                echo number_format($gia, 0, ',', '.') . " VNĐ";
            ?>
        </p>

        <form method="post" action="/CNM/View/dathang.php">
            <input type="hidden" name="masp" value="<?php echo $row['MaSP']; ?>">
            <label for="soluong"><strong>Số lượng:</strong></label>
            <input type="number" name="soluong" value="1" min="1">
            <br><br>
            <button type="submit" class="btn-dathang">Thêm vào giỏ</button>
        </form>

        <a href="index.php" class="btn-back">← Quay lại danh sách</a>
    </div>
</div>
