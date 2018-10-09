<?php
		session_start();

		include "php_config.php";

		if($_SESSION['log'] != true) {
			header('location: ngb_login.php');
		}
		
		$user_id = $_SESSION['user_id'];
		
		if(isSet($_SESSION['log']) && $_SESSION['log'] == true) {
			$zapytanie_o_saldo = "SELECT saldo FROM uzytkownik WHERE user_id = $user_id";
		}
?>

<html>
<head>
	<title>NGB - User Panel</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="ngb_profile_panel.css">
</head>
<body>
	<div id="header">NGB
		<a href="ngb_logout.php" class="nav_button">Logout</a>
		<a href="ngb_user_settings.php" class="nav_button">Settings</a>
		<a href="ngb_add_transaction.php" class="nav_button">Transactions</a>
	</div>
	<div id="content-header">
	 	<?php
				echo '<center><h1>Hello, '.$_SESSION['imie'].'!</h1></center><br>';
	 	?>
	</div>
	<div id='finance'>
		<center><h1>Your balance is now:</h1>
		<?php
			echo '<div id="balance">'.$_SESSION['saldo'].'$</div>';
		?>
			<a href="ngb_add_funds.php" class="add_funds">Add funds</a></center>
	</div>
</body>
</html>
