<?php
// isLogin
session_start();
include('../../include/head.php');
include('../../include/sql/connect.php');
// if (!isset($_SESSION['userId'])) {
//     header('Location: ../../index.php');
// }
$strKeyword = null;
if (isset($_POST['frmSearch'])) {
    $strKeyword = $_POST["search"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
</head>

<body>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-xl-3">
                <?php include('../../include/sidebar.php'); ?>
            </div>
            <div class="col-xl-9">
                <!-- <div class="card-header bg-dark text-white text-center"><h4>Shoping</h4></div> -->
                <div class="row">
                    <div class="col-sm-4 offset-sm-8">
                        <form name="frmSearch" class="mb-2 form-inline" method="post" action="">
                            <input value="<?= $strKeyword ?>" type="text" class="form-control text-right col-9" name="search" placeholder="ค้นหาสินค้าของคุณ">
                            <button name="frmSearch" class="ml-1 btn btn-success">ค้นหา</button>
                        </form>
                    </div>
                </div>
                <div class="scroll">
                    <!-- <div class="card-body shadow-sm rounded"> -->
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM products WHERE name LIKE '%" . $strKeyword . "%' ";
                        $query = mysqli_query($conn, $sql);
                        $fetch = mysqli_fetch_assoc($query);
                        if ($fetch) {
                            while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                                <div class="col-sm-3  mb-3 ">
                                    <div class="card shadow-sm mb-3" style="width: 90%px">
                                        <img src="<?php echo $row['image'] ?>" class="card-img-top" id="imgUNcover">
                                        <!-- <hr class="border-dark"> -->
                                        <div class="card-body shadow-sm rounded">
                                            <h5 class="card-title"><?php echo $row['name'] ?></h5>
                                            <h6 class="card-detail "><?php echo $row['detail'] ?></h6>

                                            <span style="font-size: 14px;" class="card-detail text-muted">PRICE</span>
                                            <div class="row">
                                                <span class="col-sm-6"><?= $row['price'] ?> ฿</span>
                                                <div class="col-sm-6">
                                                    <div class="text-right">
                                                        <?php
                                                        if (isset($_SESSION['userId'])) { ?>
                                                            <div class="btn btn-danger btn-sm" type="button" style="border-radius: 20%;">ซื้อ</div>
                                                        <?php } else { ?>
                                                            <a href="../../login.php" class="btn btn-primary btn-sm" type="button" style="border-radius: 20%;">เข้าสู่ระบบ</a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <a href="system/add_product.php?prodctid=<?php echo $row['id'] ?>&price=<?php echo $row['price'] ?>" class="btn btn-outline-primary" name="product">เพิ่มลงตะกร้า</a> -->
                                        </div>
                                    </div>
                                </div>

                            <?php }
                        } else { ?>
                            <span class='col-sm-4 offset-sm-4 mt-5'>ไม่พบสินค้า..</span>
                        <?php
                        } ?>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>