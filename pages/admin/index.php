<?php
// isLogin
session_start();
include('../../include/head.php');
include('../../include/sql/connect.php');
if (!isset($_SESSION['userId']) and $_SESSION['role'] === 0) {
    header('Location: ../../index.php');
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
    <a href="#first"><i class="fas fa-store"></i></a>
    <a href="../../system/logout.php"><i class="fas fa-sign-out-alt text-danger"></i></a>
    <!-- <a href="#second"><i class="fas fa-briefcase"></i></a> -->
    <!-- <a href="#third"><i class="far fa-file"></i></a> -->
    <!-- <a href="#fourth"><i class="far fa-address-card"></i></a> -->
</nav>

<div class='container'>
    <section id='first'>
        <?php include('first.php'); ?>
    </section>

    <section id='second'>
        <h1>Second</h1>
    </section>

    <section id='third'>
        <h1>Third</h1>
    </section>

    <section id='fourth'>
        <h1>Fourth</h1>
    </section>
</div>

<div class="modal fade openModalCreate" id="openModalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มสินค้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../../system/admin/createProduct.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="productId" value="<?= $result['productId'] ?>">
                    <div class="text-center">
                        <img src="<?= $result['image'] ?>" width="30%" alt="">
                    </div>
                    <input type="file" name="upload" class="mb-2">
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="detail">Product Detail</label>
                        <input type="text" name="detail" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Product Price</label>
                        <input type="number" name="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="stock">Product Stock</label>
                        <input type="number" name="stock" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary" name="createProduct">เพิ่ม</button>
                </div>
            </form>
        </div>
    </div>
</div>