<?php
// isLogin
include('sql/connect.php');
if (isset($_SESSION['userId'])) {
    $sql = "SELECT * FROM users WHERE userId = '" . $_SESSION['userId'] . "'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

    <div class="text-center mt-5 "><img src="http://localhost/stock_shop/public/users/1.jpg" width="50%" class="shadow-sm" style="border-radius: 50%" alt=""></div>
    <p>
    <h4 class="text-center"><b>ยินดีต้อนรับ, <?= $row['email'] ?></b></h4>
    </p>
<?php
} else { ?>
    <div class="text-center mt-5 "><img src="http://localhost/stock_shop/public/users/1.png" width="50%" class="shadow-sm" style="border-radius: 50%" alt=""></div>
    <p>
    <h4 class="text-center"><b>ยินดีต้อนรับ, Guest</b></h4>
<?php
}
?>
<hr>

<hr>
<div class="list-group shadow-sm">
    <a class="bg-white list-group-item list-group-item-action  text-center text-dark">เมนู</a>
    <a href="index.php" class="list-group-item list-group-item-action text-center">รายการสินค้า</a>
    <?php
    if (isset($_SESSION['userId'])) {
    ?>
        <a href="#" class="list-group-item list-group-item-action text-center">ตะกร้าสินค้า</a>
    <?php } ?>
    <?php
    if (isset($_SESSION['userId'])) {
    ?>
        <a href="../../system/logout.php" class="list-group-item list-group-item-danger text-center">ล็อกเอ้าท์</a>
    <?php } else { ?>
        <a href="../../login.php" class="list-group-item list-group-item-primary text-center">เข้าสู่ระบบ</a>

    <?php }
    ?>
</div>