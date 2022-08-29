<?php
    session_start();
    include('include/head.php');
    if (isset($_SESSION['loginError'])) {
        if ($_SESSION['loginError']) {
            echo '<div class="alert alert-danger" role="alert">
                        <strong>Error!</strong> อีเมลหรือรหัสผ่านไม่ถูกต้อง.
                    </div>';
        }
        unset($_SESSION['loginError']);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center mt-5">ล็อกอิน</h1>
                <form action="system/users/login.php" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="กรุณากรอกอีเมล">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="กรุณากรอกรหัสผ่าน">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">เข้าสู่ระบบ</button>
                    <div class="text-center mt-2">
                        <a href="register.php">ยังไม่เป็นสมาชิก ?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>