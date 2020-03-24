<?php
//require_once "Slim/Slim.php";
require_once "vendor/autoload.php";

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

/*echo 'Hello World!';
$app->get('/article',function () {
	echo 'world';
});


$app->run();
*/



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php
	require('connect.php');

	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
		$result = mysqli_query($connection, $query);

		if($result){
			$sms = "<p class='Good'>Регистрация прошла успешно!<p>";
		}
		else{
			$fsms = "<p class='Mistake'>Ошибка!<p>";
		}
	}
	?>
	<header>
		    <div class="logo">
			<h2>TRENDCRM</h2>
		    </div>
		<div class="container">
			<form class="form-signin" method="POST">
			<h2>Registration</h2>
			<?php if(isset($sms)){?> <div class="alert alert-success" role="alert"> <?php echo $sms; ?> </div> <?php } ?>
			<?php if(isset($fsms)){?> <div class="alert alert-danger" role="alert"> <?php echo $fsms; ?> </div> <?php } ?>
			<input type="text" name="username" class="form-control" placeholder="Username" required>
			<input type="email" name="email" class="form-control" placeholder="Email" required>
			<input type="password" name="password" class="form-control" placeholder="Password" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Registration</button>
			<a href="login.php" class="btn btn-lg btn-primary btn-block ButLog">Login</a>
		</form>
	    </div>
	</header>
</body>
</html>