<?php
	
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db_base = 'ngb';
	
	$connection = mysqli_connect($db_host, $db_user, $db_pass);
	mysqli_select_db($connection, $db_base);
	
?>