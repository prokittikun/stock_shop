<?php
session_start();
include('include/head.php');
if (isset($_SESSION['registerError'])) {
    if ($_SESSION['registerError']) {
        echo '<div class="alert alert-danger" role="alert">
                        <strong>Error!</strong> ' . $_SESSION['registerErrorMsg'] . '.
                    </div>';
    }
    unset($_SESSION['registerError']);
    unset($_SESSION['registerErrorMsg']);
}elseif(isset($_SESSION['registerSuccess'])){
    if ($_SESSION['registerSuccess']) {
        echo '<div class="alert alert-success" role="alert">
                        <strong>Success!</strong> สมัครสมาชิกสำเร็จ.
                    </div>';
    }
    unset($_SESSION['registerSuccess']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <!-- register -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center mt-5">สมัครสมาชิก</h1>
                <form action="system/users/register.php" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="กรุณากรอกอีเมล" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="กรุณากรอกรหัสผ่าน" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="กรุณากรอกรหัสผ่านอีกครั้ง" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">สมัครสมาชิก</button>
                    <div class="text-center mt-2">
                        <a href="index.php">เป็นสมาชิกแล้ว ?</a>
                    </div>
                </form>
            </div>
        </div>

</body>

</html>