<?php
// isLogin
session_start();
include('../../include/head.php');
if (!isset($_SESSION['userId'])) {
    header('Location: ../../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3">
                <?php include('../../include/sidebar.php'); ?>
            </div>
            <div class="col-xl-9">
            </div>
        </div>
</body>

</html>