<?php
// isLogin
session_start();
include('../../include/head.php');
include('../../include/sql/connect.php');
if (!isset($_SESSION['userId']) and $_SESSION['role'] === 0) {
    header('Location: ../../index.php');
}

if (isset($_GET['productId'])) {
    $productId = $_GET['productId'];
    $select = "SELECT * FROM products WHERE productId = '" . $productId . "'";
    $query = mysqli_query($conn, $select);
    $result = mysqli_fetch_assoc($query);
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../include/adminCss.css">
</head>
<nav>
    <a href="index.php#first"><i class="fas fa-store"></i></a>
    <a href="../../system/logout.php"><i class="fas fa-sign-out-alt text-danger"></i></a>
    <!-- <a href="#second"><i class="fas fa-briefcase"></i></a> -->
    <!-- <a href="#third"><i class="far fa-file"></i></a> -->
    
    <!-- <a href="#fourth"><i class="far fa-address-card"></i></a> -->
</nav>

<div class='container mt-5'>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form action="../../system/admin/updateProduct.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="productId" value="<?= $result['productId'] ?>">
                <div class="text-center">
                    <img src="<?= $result['image'] ?>" width="30%" alt="">
                </div>
                <input type="file" name="upload" class="mb-2">
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" class="form-control" value="<?= $result['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="detail">Product Detail</label>
                    <input type="text" name="detail" class="form-control" value="<?= $result['detail'] ?>">
                </div>
                <div class="form-group">
                    <label for="price">Product Price</label>
                    <input type="number" name="price" class="form-control" value="<?= $result['price'] ?>">
                </div>
                <div class="form-group">
                    <label for="stock">Product Stock</label>
                    <input type="number" name="stock" class="form-control" value="<?= $result['stock'] ?>">
                </div>
                <div class="text-center">
                    <button type="submit" name="update" class="btn btn-outline-primary btn-sm">อัพเดท</button>
                </div>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>