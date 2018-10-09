<?php

	session_start();

	include "php_config.php";

	if($_SESSION['log'] != true) {
		header('location: ngb_login.php');
	}

	$id_odbiorcy = $_POST['id_odbiorcy'];
	$id_adresata = $_SESSION['user_id'];
	$tytul = $_POST['tytul'];
	$kwota = $_POST['kwota'];
	
	$zapytanie = "INSERT INTO transakcja (`id_transakcji`, `id_odbiorcy`, `id_adresata`, `kwota`, `tytul`) VALUES (NULL, $id_odbiorcy, $id_adresata, $kwota, '$tytul')";
	$kwota_po_transakcji_adresata = $_SESSION['saldo'] - $kwota;
	
	$zapytanie_o_saldo_odbiorcy = "SELECT saldo FROM uzytkownik where user_id = $id_odbiorcy";
	$result = mysqli_query($connection, $zapytanie_o_saldo_odbiorcy);
	$salda	= mysqli_fetch_assoc($result);
	
	$saldo_odbiorcy = $salda['saldo'];
	
	$kwota_po_transakcji_odbiorcy = $saldo_odbiorcy + $kwota;
	$zapytanie2 = "UPDATE `uzytkownik` SET `saldo` = $kwota_po_transakcji_adresata WHERE `uzytkownik`.`user_id` = $id_adresata";
	$zapytanie3 = "UPDATE `uzytkownik` SET `saldo` = $kwota_po_transakcji_odbiorcy WHERE `uzytkownik`.`user_id` = $id_odbiorcy";
	mysqli_query($connection, $zapytanie) or die('Error');
	mysqli_query($connection, $zapytanie2) or die('Error');
	mysqli_query($connection, $zapytanie3) or die('Error');
	header('location: ngb_add_transaction.php');
?>