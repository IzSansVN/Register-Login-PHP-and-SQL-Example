<?php 
require("db-config.php");

try {
  $conn = new PDO("mysql:host=$host;dbname=$db_name", $db_user, $db_pass);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "";
} catch(PDOException $e) {
  echo "Connect to Database Failed : " . $e->getMessage();
}
if (isset($_POST['username']) and isset($_POST['password']) and isset($_POST['email']) and isset($_POST['phonenumber'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$phone = $_POST['phonenumber'];
	$START_CREATE = "INSERT INTO users (username, password, email, phone_number) VALUES ('$username', '$password', '$email', '$phone')";
	$result = $conn->query($START_CREATE);
	if($result) {
		echo "Create Account Successfully : $username <br />";
	}
	$conn->close();
}
?>
<!doctype html>
	<html>
	<head>
		<meta charset="utf-8">
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
		<title>test bootstrap 4</title>
		<style type="text/css">
		/* My CSS */
		.my-content-form {text-align: center;}
	</style>
</head>
<body>
	<div class="my-content-form">
		<h1>REGISTER</h1>
		<br />
		<form method="POST">
			<label for="username">Username : </label>
			<input type="text" name="username" class="form-control" required>
			<br />
			<label for="password">Password : </label>
			<input type="password" class="form-control" name="password" required>
			<br />
			<label for="email">Email : </label>
			<input type="text" class="form-control" name="email" required>
			<br />
			<label for="phonenumber">Phone Number : </label>
			<input type="number" class="form-control" name="phonenumber" required>
			<br />
			<!-- Bootstrap Button -->
			<button class="btn btn-success" type="submit">Create Account</button>
		</form>
	</div>
</body>
</html>