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
	<div id="header">NGB</div>
	<div id="content_left">
		<p id="header_content">New Generation Bank</p>
		<p id="bank_quote">"A bank is a place where they lend you an umbrella in fair weather and ask for it back when it begins to rain." </p>
		<p id="robert_frost">Robert Frost </p>
	</div>
	<div id="content_right">
		<div id="login_box">
			<p id="login_header">Zaloguj się<p> <br>
			<form action="ngb_login.php" method='POST'>
				<center> Identyfikator użytkownika: </center> <br>
					<center><input type="text" name="user_id"></center> <br>
				<center> Hasło: </center> <br>
					<center><input type="password" name="password"></center>
					<br> <br> <br>
				<center><input type="submit" value="Zaloguj"></center>
			</form>
		</div>
	</div>
</body>
</html>
