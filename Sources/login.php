<?php
require("db-config.php");

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if (isset($_POST['username']) and isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$START_CHECK = "SELECT * FROM users WHERE username = '$username'";
	$result = $conn->query($START_CHECK)->fetch_assoc();

	if ($result['password'] == $password) {
		echo "Login Successfully !";
	} else {
		echo "Login failed ! Please check your username or password.";
	}

	$conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LOGIN</title>
	<!-- Install Bootstrap 4 -->


	<!-- latest compiled and minified css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<!-- jquery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- popper js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- latest compiled javascript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
	/* My CSS */
	.my-content-form {text-align: center;}
</style>
</head>
<body>
	<div class="my-content-form">
		<h1>LOGIN</h1>
		<br />
		<form method="POST">
			<label for="username">Username : </label>
			<input type="text" name="username" class="form-control" required>
			<br />
			<label for="password">Password : </label>
			<input type="password" class="form-control" name="password" required>
			<br />
			<!-- Bootstrap Button -->
			<button class="btn btn-success" type="submit">Login</button>
		</form>
	</div>
</body>
</html>