<?php
// register process
session_start();
include('../../include/sql/connect.php');
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    // email is already exits
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $_SESSION['registerError'] = true;
        $_SESSION['registerErrorMsg'] = "อีเมลถูกใช้แล้ว";
        header('Location: ../../register.php');
    } else {
        if ($password === $confirmPassword) {
            $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $_SESSION['registerSuccess'] = true;
                header('Location: ../../register.php');
            } else {
                $_SESSION['registerError'] = true;
                $_SESSION['registerErrorMsg'] = "เกิดข้อผิดพลาด";
                header('Location: ../../register.php');
            }
        } else {
            $_SESSION['registerError'] = true;
            $_SESSION['registerErrorMsg'] = "รหัสผ่านไม่ตรงกัน";
            header('Location: ../../register.php');
        }
    }
}
