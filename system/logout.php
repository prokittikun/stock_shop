<?php
    //logout process
    session_start();
    session_destroy();
    header('Location: ../login.php');
?>