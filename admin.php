<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập và iduser có tồn tại không
if (!isset($_SESSION["dn"]) || !isset($_SESSION["iduser"])) {
    echo "<script>alert('Vui lòng đăng nhập để truy cập trang này.');</script>";
    header("Location: ../index.php");
    exit(); // Ngừng thực thi mã tiếp theo
}

include_once("Controller/cNguoiDung.php");
$p = new controlNguoiDung();

// Lấy thông tin người dùng đã đăng nhập
$iduser = $_SESSION['iduser'];
$tbl = $p->getOneND($iduser); // Lấy dữ liệu người dùng

// Kiểm tra nếu không lấy được dữ liệu người dùng
if (!$tbl) {
    echo "<script>alert('Lỗi khi lấy dữ liệu người dùng.');</script>";
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SHOP PHỤ KIỆN</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="css/style.css?v=2">
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
                            <!-- <span class="input-group-text bg-transparent text-primary">
                            </span> -->
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
            <div class="col-lg-3 d-none d-lg-block gap-2">
                <div class="dropdown dropend">
                   <!-- <button type="button" class="btn btn-lg btn-primary dropdown-toggle text-white w-100" data-bs-toggle="dropdown" href="index.php">Shop Phụ Kiện</button> -->
                    
                </div>
                <?php
                if ($_SESSION["dn"] == 3) {
                    if ($tbl) {
                        // Chỉ cần một dòng cho thông tin cá nhân
                        $r = mysqli_fetch_assoc($tbl); // Lấy dữ liệu của người dùng
                        echo '<div class="dropdown dropend">';
                        echo '<button type="button" class="btn btn-lg btn-primary dropdown-toggle text-white w-100" data-bs-toggle="dropdown">Thông tin cá nhân</button>';
                        echo '<ul class="dropdown-menu">';
                        echo '<li><a class="dropdown-item" href="?action=chitietnd&nd=' . $r["iduser"] . '">Xem chi tiết</a></li>';
                        echo '<li><a class="dropdown-item active" href="?action=updateCTND&id=' . $r["iduser"] . '">Sửa thông tin</a></li>';
                        echo '</ul>';
                        echo '</div>';
                        //
                         echo '<div class="dropdown dropend">';
                        echo '</ul>';
                        echo '</div>';
                    } else {
                        echo '<div class="alert alert-danger">Không tìm thấy thông tin người dùng.</div>';
                    }
                }
                ?>
                <?php
                if ($_SESSION["dn"] <= 1) {
                    echo '<div class="dropdown dropend">';
                    echo '<button type="button" class="btn btn-lg btn-primary dropdown-toggle text-white w-100" data-bs-toggle="dropdown">Quản lý vai trò</button>';
                    echo '<ul class="dropdown-menu">';
                    echo '<li><a class="dropdown-item" href="?type=VaiTro">Xem danh sách vai trò</a></li>';
                    echo '<li><a class="dropdown-item active" href="?type=insertVT">Thêm vai trò mới</a></li>';
                    echo '</ul>';
                    echo '</div> ';
                    echo '<div class="dropdown dropend">';
                    echo '<button type="button" class="btn btn-lg btn-primary dropdown-toggle text-white w-100" data-bs-toggle="dropdown">Quản lý người dùng</button>';
                    echo '<ul class="dropdown-menu">';
                    echo '<li><a class="dropdown-item" href="?type=NguoiDung">Xem danh sách người dùng</a></li>';
                    echo '<li><a class="dropdown-item active" href="?type=insertND">Thêm người dùng mới</a></li>';
                    echo '</ul>';
                    echo '</div>';
                    echo '<div class="dropdown dropend">';
                    echo '<button type="button" class="btn btn-lg btn-primary dropdown-toggle text-white w-100" data-bs-toggle="dropdown">Quản lý Thương Hiệu</button>';
                    echo '<ul class="dropdown-menu">';
                    echo '<li><a class="dropdown-item" href="admin.php?type=thuonghieu">Xem danh sách thương hiệu</a></li>';
                    echo '<li><a class="dropdown-item active" href="?action=insert">Thêm thương hiệu</a></li>';
                    echo '</ul>';
                    echo '</div>';
                    echo '<div class="dropdown dropend">';
                    echo '<button type="button" class="btn btn-lg btn-primary dropdown-toggle text-white w-100" data-bs-toggle="dropdown">Quản lý Sản Phẩm</button>';
                    echo '<ul class="dropdown-menu">';
                    echo '<li><a class="dropdown-item" href="admin.php?type=sanpham">Xem danh sách sản phẩm </a></li>';
                    echo '<li><a class="dropdown-item active" href="?action=insert">Thêm sản phẩm</a></li>';
                    echo '</ul>';
                    echo '</div>';
                }
                
                ?>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link active">Trang chủ</a>
                            <a href="admin.php" class="nav-item nav-link">Quản lý</a>
                            <a href="View/TinTuc.php" class="nav-item nav-link">Tin tức</a>
                             <a href="View/giohang.php" class="nav-item nav-link">Giỏ hàng (<?php echo isset($_SESSION['giohang']) ? count($_SESSION['giohang']) : 0; ?>)</a>
                            <a href="chat" class="nav-item nav-link">Liên hệ & hỗ trợ</a>
                            </div>
                        <div class="navbar-nav ml-auto py-0">
                            <a href="view/dangxuat.php" onclick="return confirm('Bạn có chắc muốn đăng xuất?');">Đăng xuất</a>
                        </div>
                    </div>
                </nav>

                <!-- Page Header Start -->
                <div class="container-fluid bg-secondary mb-5">
                    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
                        <h1 class="font-weight-semi-bold text-uppercase mb-3">ĐÂY LÀ TRANG ADMIN</h1>
                    </div>
                </div>
                <!-- Page Header End -->
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <?php
            if (isset($_REQUEST["type"]) && $_REQUEST["type"] == "NguoiDung") {
                echo '<div class="text-center mb-4"><h2 class="section-title px-5"><span class="px-2">Danh Sách Người Dùng</span></h2></div>';
                include_once("view/qlNguoiDung.php");
            } else if (isset($_REQUEST["type"]) && $_REQUEST["type"] == "VaiTro") {
                echo '<div class="text-center mb-4"><h2 class="section-title px-5"><span class="px-2">Danh Sách Vai Trò</span></h2></div>';
                include_once("view/qlVaiTro.php");
            } else if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "updateVT") {
                include_once("view/VT/updateVT.php");
            } else if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "deleteVT") {
                include_once("view/VT/deleteVT.php");
            } else if (isset($_REQUEST["type"]) && $_REQUEST["type"] == "insertVT") {
                include_once("view/VT/insertVT.php");
            } else if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "updateND") {
                include_once("view/ND/updateND.php");
            } else if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "deleteND") {
                include_once("view/ND/deleteND.php");
            } else if (isset($_REQUEST["type"]) && $_REQUEST["type"] == "insertND") {
                include_once("view/ND/insertND.php");
            } else if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "chitietnd") {
                include_once("View/chitietnd.php");
            } else if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "updateCTND") {
                include_once("View/updateCTND.php");
            } if(isset($_REQUEST["type"]) && $_REQUEST["type"]=="thuonghieu"){
                echo '<div class="text-center mb-4"><h2 class="section-title px-5"><span class="px-2">Danh Sách Thương Hiệu</span></h2></div>';
          include_once("View/TH/athuonghieu.php");
          $_SESSION['type'] = 'thuonghieu';
           
        }elseif(isset($_REQUEST["type"]) && $_REQUEST["type"]=="sanpham"){
            echo '<div class="text-center mb-4"><h2 class="section-title px-5"><span class="px-2">Danh Sách Sản Phẩm</span></h2></div>';
          include_once("View/SP/asanpham.php");
          $_SESSION['type'] = 'sanpham';
           
        }elseif(isset($_REQUEST["type"]) && $_REQUEST["type"]=="donhang"){
            echo '<div class="text-center mb-4"><h2 class="section-title px-5"><span class="px-2">Danh Sách Đơn Hàng</span></h2></div>';
          include_once("View/donhang.php");
          $_SESSION['type'] = 'donhang';
           
        } elseif(isset($_REQUEST["action"]) && $_REQUEST["action"]=="update"){
          if($_SESSION['type']=='thuonghieu')  
            include_once("View/TH/updateThuongHieu.php");
          else
            include_once("View/SP/updateSanPham.php");
        }elseif(isset($_REQUEST["action"]) && $_REQUEST["action"]=="delete"){
          if($_SESSION['type']=='thuonghieu')  
            include_once("View/TH/deleteThuongHieu.php");
          else
            include_once("View/SP/deleteSanPham.php");
        }elseif(isset($_REQUEST["action"]) && $_REQUEST["action"]=="insert"){
          if($_SESSION['type']=='thuonghieu')  
            include_once("View/TH/insertThuongHieu.php");
          else
            include_once("View/SP/insertSanPham.php");
        }
            ?>
        </div>
    </div>
    <!-- Products End -->
    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">Shop</span>Phụ Kiện</h1>
                </a>
                <p>Bảo mật thông tin của khách hàng</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>12 Nguyễn Văn Bảo</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>abc@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>123456789</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our </a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Detail</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Cart</a>
                            <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our </a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Detail</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i> Cart</a>
                            <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Your Email" required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
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
    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>