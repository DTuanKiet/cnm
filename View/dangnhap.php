
<div class="container mt-3">
    <h3>Thông Tin Đăng Nhập</h3>

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
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="myCheck" name="remember" required>
            <label class="form-check-label" for="myCheck">I agree on blabla.</label>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Check this checkbox to continue.</div>
        </div>
        <button type="submit" class="btn btn-primary" name="btnLogin">Submit</button>
    </form>
</div>
<?php
if (isset($_REQUEST["btnLogin"])) {
    include_once("Controller/cNguoiDung.php");
    $p = new ControlNguoiDung();
    $tk = $_REQUEST["tnd"];
    $mk = $_REQUEST["mk"];
    $ketqua = $p->GetNguoiDung($tk, $mk);
}
?>