<?php
	session_start();

	include "php_config.php";

	if(isSet($_SESSION['log']) && $_SESSION['log'] == true) {
		header('location: ngb_profile_panel.php');
		exit;
	} else if (isSet($_POST['user_id']) && isSet($_POST['password'])) {
		$user_id = $_POST['user_id'];
		$password = $_POST['password'];

		$zapytanie = "SELECT * FROM uzytkownik WHERE user_id = $user_id AND password = '$password'";
		$result = mysqli_query($connection, $zapytanie);

		$rows = mysqli_num_rows($result);

		if ($rows == 1) {
			$r = mysqli_fetch_assoc($result);

			$_SESSION['log'] = true;
			$_SESSION['user_id'] = $r['user_id'];
			$_SESSION['imie'] = $r['imie'];
			$_SESSION['nazwisko'] = $r['nazwisko'];
			$_SESSION['saldo'] = $r['saldo'];

			header('location: ngb_profile_panel.php');
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
	<link rel="stylesheet" type="text/css" href="ngb_login.css">
</head>
<body>
	<div id="header">NGB
	<a href="ngb_register.php" class="nav_button">New account</a>
	<a href="ngb_about.html" class="nav_button">About us</a>
	</div>
	<div id="content_left">
	</div>
	<div id="content_right">
		<p id="login_header">Login to your account<p> <br>
		<div id="form_login">
		<form action="ngb_login.php" method='POST'>
			Your identificator <br>
				<input type="text" name="user_id"> <br>
			 Password <br>
				<input type="password" name="password">
				<br> <br> <br>
			<input type="submit" value="Login">
		</form>
		</div>
	</div>
</body>
</html>
