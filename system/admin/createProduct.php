<?php
session_start();
include('../../include/sql/connect.php');
if (isset($_POST['createProduct'])) {
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
            $name_file = "http://localhost/stock_shop/public/images/default.jpg";
        }
    }

    $sql = "INSERT INTO products(image, name, detail, price, stock)VALUES('$name_file', '$name', '$detail', '$price', '$stock')";
    $query = mysqli_query($conn, $sql);
    header('location: ../../pages/admin/index.php#first');
}
