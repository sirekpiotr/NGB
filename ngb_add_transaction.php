<?php
		session_start();

		include "php_config.php";

		if($_SESSION['log'] != true) {
			header('location: ngb_login.php');
		}
?>

<html>
<head>
	<title>NGB - Transaction Panel</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="ngb_add_transaction.css">
</head>
<body>
  <div id="header">NGB Transactions
    <a href="ngb_logout.php" class="nav_button">Logout</a>
    <a href="ngb_user_settings.php" class="nav_button">Settings</a>
    <a href="ngb_profile_panel.php" class="nav_button">Home</a>
  </div>

  <div id="left">
    <div id="left_header">Your transactions</div>
    <?php
      $user_id = $_SESSION['user_id'];
      $zapytanie = "SELECT * FROM transakcja WHERE id_adresata = $user_id OR id_odbiorcy = $user_id";

      $result = mysqli_query($connection, $zapytanie) or die('Error');

      if (($result->num_rows)>0) {

          while ($rows = mysqli_fetch_assoc($result)) {

            $id_odbiorcy = $rows['id_odbiorcy'];
            $id_adresata = $rows['id_adresata'];

            echo "<div id='transaction'><div id=title>".$rows['tytul']."</div>";
            if ($rows['id_adresata'] == $user_id) {
              echo "<div id='cash_less'>".'- '.$rows['kwota']."$"."</div><br><br>";
              echo "From: Me<br>";

              $zapytanie_dane_odbiorcy = "SELECT imie, nazwisko FROM uzytkownik WHERE user_id = $id_odbiorcy";
              $result_odbiorca = mysqli_query($connection, $zapytanie_dane_odbiorcy) or die('Error');

              while($odbiorca = mysqli_fetch_assoc($result_odbiorca)) {
                  echo "To: ".$odbiorca['imie']." ".$odbiorca['nazwisko'];
              }
              echo "</div>";
            } else {
              echo "<div id='cash_more'>".'+ '.$rows['kwota']."$"."</div><br><br>";

              $zapytanie_dane_adresata = "SELECT imie, nazwisko FROM uzytkownik WHERE user_id = $id_adresata";
              $result_adresata = mysqli_query($connection, $zapytanie_dane_adresata) or die('Error');

              while($adresat = mysqli_fetch_assoc($result_adresata)) {
                  echo "From: ".$adresat['imie']." ".$adresat['nazwisko'].'<br>';
              }
              echo "To: Me";
              echo "</div>";
            }
          }

          //echo "<center><a href='#' class='add_transaction_button'>Add New</a></center>";
      } else {
          echo "Sorry. You don't have any transactions right now. <br> <br>";
          echo "<a href='#' class='add_transaction_button'>Add New</a>";
      }
    ?>
  </div>
</body>
</html>
