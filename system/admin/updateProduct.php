<?php
session_start();
include('../../include/sql/connect.php');
if (isset($_POST['update'])) {

    $productId = $_POST['productId'];
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];

    if (isset($_FILES['upload'])) {

        $name_file =  $_FILES['upload']['name'];
        $tmp_name =  $_FILES['upload']['tmp_name'];
        $locate_img = "../../public/images/";
        move_uploaded_file($tmp_name, $locate_img . $name_file);
        if ($name_file !== '') {
            $name_file = 'http://localhost/stock_shop/public/images/' . $name_file;
        } else if ($name_file == '') {

            $select = "SELECT * FROM products WHERE productId='" . $productId . "'";
            $queryImage = mysqli_query($conn, $select);
            $result = mysqli_fetch_assoc($queryImage);

            $name_file = $result['image'];
        }
    }

    $sql = "UPDATE products SET image = '$name_file', name = '$name', detail = '$detail', price = '$price', stock = '$stock' WHERE productId = '" . $productId . "'";
    $query = mysqli_query($conn, $sql);

    header('location: ../../pages/admin/index.php#first');
}
