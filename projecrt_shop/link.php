<?php
session_start();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
// if (!isset($_SESSION['user_account']))
//     header('Location: login.php');
?>
<!DOCTYPE html>
<!-- <php lang="en"> -->
<html>
    <head>
        <title>Project Shop</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="assets/img/Uni-icon.png">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/Uni-icon.ico">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/templatemo.css">
        <link rel="stylesheet" href="assets/css/custom.css">

        <!-- Load fonts style after rendering the layout styles -->
        <link rel="stylesheet" href="assets/css/fontRobotocss2.css">
        <link rel="stylesheet" href="assets/css/fontawesome.css">

        <!-- Start Script -->
        <script src="assets/js/jquery-3.6.4.min.js"></script>
        <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/templatemo.js"></script>
        <script src="assets/js/custom.js"></script>
        <script src="assets/js/sweetalert2@11.js"></script>
        <!-- End Script -->

    </head>