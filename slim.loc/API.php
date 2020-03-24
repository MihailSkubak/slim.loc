<?php
$ch=curl_init("http://127.0.0.1/slim.loc/InfaNew.json");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$res=curl_exec($ch);
$j=json_decode($res, true);

?>
		<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
		    <div class="logo">
			<h2>TRENDCRM</h2>
		    </div>
		    	<?php
	session_start();
	require('connect.php');
	error_reporting(0);
	if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];
		echo "Hello " . $username. "";
		echo " Вы вошли!";
		echo "<a href = 'logout.php' class='btn btn-lg btn-primary'> LogOut </a>";
		echo "<br>";
	}
		?>
		<div class="container">
		<form class="form-signin" method="POST">
			<h2>Track</h2>
			<input type="text" name="userfind" class="form-control" placeholder="Find" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Find</button>
		</form>
	</div>
	<?php
			if($_POST['userfind']==$j['code']){
		echo "Код товара: ";
		echo  $j['code'];
		echo "<br>";
		echo "Имя товара: ";
		echo $j['name'];
		echo "<br>";
		echo "Информация о товаре: ";
		echo $j['information'];

	}
	else{
			$fsmss = "Експрес-накладной с таким номером не найдено";
		}
		?>
</body>
</html>