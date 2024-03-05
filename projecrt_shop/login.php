<?php
session_start();
require 'conn.php';
$error_message = "";
$user_account = "";
$user_password = "";
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;



if (isset($_POST['user_account'])) { //使用者輸入帳號後，帳號密碼的判斷
	$user_account = $_POST['user_account'];
	$user_password = $_POST['user_password'];
	$sql = "SELECT * 
			FROM user 
			where user_account='$user_account'"; // 指定SQL查詢字串
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) == 0) {
		$error_message = "請輸入正確帳號";
	} else {
		$row = mysqli_fetch_assoc($result);
		if ($user_password == $row['user_password']) {
			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['user_account'] = $user_account;
			$_SESSION['user_logintime'] = $user_account . date("F j, Y, g:i a");

			//Session.set(name, 123);
			$conn->close();  // 關閉資料庫連接
			//echo $total_records;

			header('Location: index.php');
		} else
			$varErrmessage = "請輸入正確密碼";
	}
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login</title>

	<link rel="apple-touch-icon" href="assets/img/Uni-icon.png">
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/templatemo.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<!-- Load fonts style after rendering the layout styles -->
	<link rel="stylesheet" href="assets/css/fontRobotocss2.css">
	<link rel="stylesheet" href="assets/css/fontawesome.min.css">
</head>

<body>
	<!-- Start Top Nav -->
	<?php
	include_once "top-nav.php"
	?>
	<!-- Close Top Nav -->


	<!-- Header -->
	<?php
	include_once "header.php"
	?>
	<!-- Close Header -->
	<div class="Nixon-login">
		<div class="container">
			<div class="row justify-content-center"">
				<div class="col-lg-6 col-lg-offset-3">
					<div class="login-content">
						<div class="hero-wrap hero-bread">
							<div class="container">
								<div class="row no-gutters slider-text align-items-center justify-content-center">
									<div class="col-md-9 ftco-animate text-center">
										<!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p> -->
										<h1 class="mt-5 mb-5 bread">Login</h1>
									</div>
								</div>
							</div>
						</div>
						<div class="login-form">
							<form method="post" action="login.php">
								<div class="form-group">
									<label>Account</label>
									<input type="text" name="user_account" id="user_account" class="form-control" value="<?= $user_account ?>" placeholder="account">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="user_password" id="user_password" class="form-control" value="<?= $user_password ?>" placeholder="password">
								</div>
								<div>
									<label>
										<?= $error_message ?>
									</label>
									<label class="pull-right">
										<a href="#">Lost your password?</a>
									</label>
								</div>
								<div>
								<button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">
									Login
								</button>
								<button type="button" class="btn btn-primary btn-flat m-b-30 m-t-30" onclick='location.href=("signup.php")'> 
									Signup
								</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>