<!-- Connexion à la base de données -->
<?php

	$servername = "phpmyadmin.test";
	$username = "root";
	$password = "";

	setlocale(LC_ALL, 'fr_FR.utf8','fra', 'French'); 

	try {
		$conn = new PDO("mysql:host=$servername;dbname=real_estate", $username, $password);

		// set the PDO error mode to exception
		$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conn -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

		//echo "Connected successfully";

	} catch(PDOException $e) {
		echo "Connection failed: " . $e -> getMessage();
		die();
	}

?>