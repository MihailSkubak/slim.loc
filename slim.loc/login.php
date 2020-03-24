<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		    <div class="logo">
			<h2>TRENDCRM</h2>
		    </div>
		<div class="container">
		<form class="form-signin" method="POST">
			<h2>Login</h2>
			<input type="text" name="username" class="form-control" placeholder="Username" required>
			<input type="password" name="password" class="form-control" placeholder="Password" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
			<a href="index.php" class="btn btn-lg btn-primary btn-block ButLog2">Registration</a>
		</form>
	</div>

	</header>
	<?php
	session_start();
	require('connect.php');

	if(isset($_POST['username']) AND isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$result=mysqli_query($connection, $query) or die(mysqli_error($connection));
		$count = mysqli_num_rows($result);

		if($count == 1){
			$_SESSION['username'] = $username;
			header('Location: API.php');
		}else{
			$fms = "<p class='Mistake'>Ошибка!<p>";
		}
	}

	if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];
		echo "Hello " . $username. "";
		echo " Вы вошли!";
		echo "<a href = 'logout.php' class='btn btn-lg btn-primary'> LogOut </a>";
	}
	?>

</body>
</html>