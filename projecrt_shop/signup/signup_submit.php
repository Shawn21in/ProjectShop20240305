<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./assets/js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./assets/css/sweetalert2.min.css">
</head>

</html>

<script>
    function redirectDialog(filename, msg) {
        Swal.fire(msg).then((result) => {
            if (result.isConfirmed || result.isDismissed) {
                window.location.replace(filename);
            }
        });
    }

    function redirectsuccess(filename, msg) {
        Swal.fire({
            title: msg,
            text: "請重新登入！",
            icon: "success"
        }).then((result) => {
            if (result.isConfirmed || result.isDismissed) {
                window.location.replace(filename);
            }
        });
    }
</script>

<?php
$fName = "";
$lName = "";
$gender = "";
$birth = "";
$mail = "";
$userAcc = "";
$pwd = "";
$phone = "";
$addr_city = "";
$addr_town = "";
$addr_St = "";

if (isset($_POST['userAcc'])) {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $gender = $_POST['gender'];
    $birth = $_POST['birth'];
    $mail = $_POST['mail'];
    $userAcc = $_POST['userAcc'];
    $pwd = $_POST['pwd'];
    $phone = $_POST['phone'];
    $addr_city = $_POST['addr_city'];
    $addr_town = $_POST['addr_town'];
    $addr_St = $_POST['addr_St'];

    include '../conn.php';
    $sql = "SELECT * FROM user WHERE user_account='$userAcc'";

    if (mysqli_num_rows(mysqli_query($conn, $sql)) != 0) {
        echo "<script>redirectDialog('signup.php','會員已存在')</script>";
    } else {
        $sql = "insert into user values(' ','$userAcc','$pwd','$fName','$lName','$gender','$birth','$mail','$phone','$addr_city','$addr_town', '$addr_St')";
        //print $sql;
        if ($result = mysqli_query($conn, $sql)) {
            echo "<script>redirectsuccess('login.php','註冊成功')</script>";
        } else {
            echo "<script>redirectDialog('signup.php','註冊失敗')</script>";
        }
    }
}
?>