<?php
    session_start();
    include('../../include/sql/connect.php');
    if(isset($_GET['productId'])){
        $productId = $_GET['productId'];
        $sql = "DELETE FROM products WHERE productId = $productId";
        $query = mysqli_query($conn, $sql);

        header('location: ../../pages/admin/index.php#first');
    }
