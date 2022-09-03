<?php

    session_start();
    include('../../include/sql/connect.php');
    
    // login process
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if($row){
            $_SESSION['userId'] = $row['userId'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $row['role'];
            if($row['role'] == 1){
                header('Location: ../../pages/admin/index.php#first');
            }else{
                header('Location: ../../pages/user');
            }
        }else{
            header('Location: ../../index.php');
            $_SESSION['loginError'] = true;
        }
    }
?>