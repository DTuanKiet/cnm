<?php
if (isset($_POST["btnRegister"])) {
    include_once("Controller/cNguoiDung.php");
    $p = new ControlNguoiDung();
    $tk = $_POST["tnd"];
    $mk = $_POST["mk"];
    $phone = $_POST["pn"];
    $idrole = 3;
    $result = $p->RegisterNguoiDung($tk, $mk, $phone, $idrole);

    if ($result) {
        echo "<script>alert('Đăng ký thành công. Mời bạn đăng nhập');</script>";
        header("refresh:0.5; url='index.php'");
    } else {
        echo "<script>alert('Đăng ký thất bại');</script>";
        header("refresh:0.5; url='index.php'");
    }
}
?>

<div class="container mt-3">
    <h3>Thông Tin Đăng Ký</h3>

    <form action="" class="was-validated" method="post" name="frmLogin">
        <div class="mb-3 mt-3">
            <label for="uname" class="form-label">Username:</label>
            <input type="text" class="form-control" id="uname" placeholder="Enter username" name="tnd" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="mb-3">
            <label for="pwd" class="form-label">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="mk" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="mb-3 mt-3">
            <label for="pnumber" class="form-label">PhoneNumber:</label>
            <input type="text" class="form-control" id="pnumber" placeholder="Enter username" name="pn" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="myCheck" name="remember" required>
            <label class="form-check-label" for="myCheck">I agree on blabla.</label>
            <div class="valid-feedback">OK.</div>
            <div class="invalid-feedback">Điều khoản.</div>
        </div>
        <button type="submit" class="btn btn-primary" name="btnRegister">Đăng Ký</button>
    </form>
</div>