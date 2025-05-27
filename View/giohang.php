<?php
ob_start(); // Bật chế độ đệm đầu ra
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Shop Phụ Kiện</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="../css/style.css?v=2">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">Shop</span>Phụ Kiện</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="btnTuKhoa">
                        <input type="submit" value="Search" name="btnTimKiem">
                        <div class="input-group-append">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Topbar End -->
    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Danh Mục</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <?php
                        include_once("TH/bthuonghieu.php");
                        ?>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="../index.php" class="nav-item nav-link active">Trang chủ</a>
                            <a href="../admin.php" class="nav-item nav-link">Quản lý</a>
                            <a href="#" class="nav-item nav-link">Tin tức</a>
                            <a href="giohang.php" class="nav-item nav-link">Giỏ hàng (<?php echo isset($_SESSION['giohang']) ? count($_SESSION['giohang']) : 0; ?>)</a>
                            <a href="../chat" class="nav-item nav-link">Liên hệ & hỗ trợ</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <?php
                            if (isset($_SESSION["dn"])) {
                                echo '<a href="../admin.php">Quản lý</a> |';
                                echo '<a href="../?dangxuat" onclick="return confirm(\'Are you sure to logout?\');">Đăng xuất</a>';
                            } else {
                                echo '<a href="../?dangnhap">Đăng nhập</a> |';
                                echo '<a href="../?dangky">Đăng ký</a>';
                            }
                            ?>
                        </div>
                    </div>
                </nav>
                <section>
                    <h2 style="text-align: center; margin-top: 20px;">Giỏ hàng của bạn</h2>

                    <style>
                        .cart-table {
                            width: 90%;
                            margin: 20px auto;
                            border-collapse: collapse;
                            font-family: 'Poppins', sans-serif; /* Đồng bộ phông chữ với trang chủ */
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        }

                        .cart-table th,
                        .cart-table td {
                            padding: 12px;
                            border: 1px solid #ccc;
                            text-align: center;
                        }

                        .cart-table th {
                            background-color: #007bff; /* Màu xanh giống trang chủ */
                            color: white;
                        }

                        .cart-table tr:nth-child(even) {
                            background-color: #f9f9f9;
                        }

                        .cart-table img {
                            width: 60px;
                            height: auto;
                            border-radius: 5px;
                        }

                        .cart-actions {
                            text-align: center;
                            margin: 20px 0;
                        }

                        .btn-back,
                        .btn-checkout {
                            display: inline-block;
                            padding: 10px 20px;
                            margin: 0 10px;
                            font-size: 16px;
                            text-decoration: none;
                            border-radius: 5px;
                            font-family: 'Poppins', sans-serif; /* Đồng bộ phông chữ */
                        }

                        .btn-back {
                            background-color: #6c757d; /* Màu xám giống nút "Quay lại mua sắm" */
                            color: white;
                        }

                        .btn-back:hover {
                            background-color: #5a6268;
                        }

                        .btn-checkout {
                            background-color: #28a745; /* Màu xanh lá cho nút "Thanh toán" */
                            color: white;
                        }

                        .btn-checkout:hover {
                            background-color: #218838;
                        }

                        .cart-empty {
                            text-align: center;
                            margin: 40px 0;
                            font-size: 24px; /* Cỡ chữ lớn giống trang chủ */
                            color: #ff0000; /* Màu đỏ giống thông báo trang chủ */
                            font-family: 'Poppins', sans-serif; /* Đồng bộ phông chữ */
                        }
                    </style>

                    <?php
                    if (isset($_SESSION['giohang']) && !empty($_SESSION['giohang'])) {
                        echo "<table class='cart-table'>";
                        echo "<tr><th>Hình ảnh</th><th>Tên sản phẩm</th><th>Giá</th><th>Số lượng</th><th>Thành tiền</th><th>Thao tác</th></tr>";

                        $tongTien = 0;
                        foreach ($_SESSION['giohang'] as $maSP => $item) {
                            $thanhTien = $item['Gia'] * $item['SoLuong'];
                            $tongTien += $thanhTien;

                            $hinhAnh = '../img/sanpham/' . $item['HinhAnh'];
                            if (strpos($item['HinhAnh'], '.') === false) {
                                $hinhAnh .= '.jpg';
                            }

                            echo "<tr>";
                            echo "<td><img src='$hinhAnh'></td>";
                            echo "<td>{$item['TenSP']}</td>";
                            echo "<td>" . number_format($item['Gia'], 0, ',', '.') . " VNĐ</td>";
                            echo "<td>{$item['SoLuong']}</td>";
                            echo "<td>" . number_format($thanhTien, 0, ',', '.') . " VNĐ</td>";
                            echo "<td><a href='giohang.php?xoa={$maSP}' onclick=\"return confirm('Bạn có chắc muốn xóa sản phẩm này không?');\" style='color:red;'>🗑 Xóa</a></td>";
                            echo "</tr>";
                        }

                        echo "<tr><td colspan='4' style='text-align:right; font-weight:bold;'>Tổng tiền:</td>
                              <td colspan='2' style='font-weight:bold; color:#28a745;'>" . number_format($tongTien, 0, ',', '.') . " VNĐ</td></tr>";
                        echo "</table>";

                        echo "<div class='cart-actions'>";
                        echo "<a href='../index.php' class='btn-back'>← Quay lại mua sắm</a>";
                        echo "<a href='../index.php?thanhtoan' class='btn-checkout'>Thanh toán</a>";
                        echo "</div>";
                    } else {
                        echo "<p class='cart-empty'>Giỏ hàng của bạn đang trống!</p>";
                        echo "<div class='cart-actions'><a href='../index.php' class='btn-back'>← Quay lại mua sắm</a></div>";
                    }

                    // Xử lý xóa sản phẩm khỏi giỏ hàng
                    if (isset($_GET['xoa'])) {
                        $maSP = $_GET['xoa'];
                        if (isset($_SESSION['giohang'][$maSP])) {
                            unset($_SESSION['giohang'][$maSP]);
                            if (empty($_SESSION['giohang'])) {
                                unset($_SESSION['giohang']);
                            }
                            header("Location: giohang.php");
                            exit();
                        }
                    }
                    ?>
                </section>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">Shop</span>Phụ Kiện</h1>
                </a>
                <p>Thông tin của khách hàng</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>12 Nguyễn Văn Bảo</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>abc@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>123456789</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Trang chủ</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Cửa hàng</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Chi tiết</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Giỏ hàng</a>
                            <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Thanh toán</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Liên hệ</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Trang chủ</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Cửa hàng</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Chi tiết</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Giỏ hàng</a>
                            <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Thanh toán</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Liên hệ</a>
                        </div>
                    </div>
                
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Tên của bạn" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Email của bạn" required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Đăng ký ngay</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">Shop</a> Website Phụ Kiện
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>
    <script src="js/main.js"></script>

    <!-- Chatbox JavaScript -->
</body>

</html>
<?php ob_end_flush(); ?>