<?php
	session_start();

	include "php_config.php";

	 if(isSet($_SESSION['log']) && $_SESSION['log'] == true) {
		header('location: ngb_profile_panel.php');
		exit;
	} else if (isSet($_POST['name']) && isSet($_POST['surname']) && isSet($_POST['password']) && isSet($_POST['repeat_password'])) {
		if ($_POST['password'] == $_POST['repeat_password']) {
			$name = $_POST['name'];
			$surname = $_POST['surname'];
			$password = $_POST['password'];
			
			$dodawanie_usera_do_bazy = "INSERT INTO `uzytkownik` (`user_id`, `password`, `imie`, `nazwisko`, `saldo`) VALUES (NULL, '$password', '$name', '$surname', 0)";
			mysqli_query($connection, $dodawanie_usera_do_bazy) or die ("ERROR!");
			
			header('location: ngb_login.php');
			exit;
		}
	}
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>NGB</title>
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="ngb_register.css">
</head>
<body>
	<div id="header">NGB
	<a href="ngb_login.php" class="nav_button">Login</a>
	<a href="ngb_about.html" class="nav_button">About us</a>
	</div>
	<div id="content_left">
	</div>
	<div id="content_right">
		<p id="login_header">Register to NGB<p> <br>
		<div id="form_login">
		<form action="ngb_register.php" method='POST'>
			Name <br>
				<input type="text" name="name"> <br>
			Surname <br>
				<input type="text" name="surname"> <br>
			Password <br>
				<input type="password" name="password"> <br>
			Repeat password <br>
				<input type="password" name="repeat_password">
			
				<br> <br> <br>
			<input type="submit" value="Register">
		</form>
		</div>
	</div>
</body>
</html>
