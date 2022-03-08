<!--**************************************************************************************-->
<!-- 																					  -->
<!-- Project: Real Estate                               / $$      /$$ /$$$$$$$$ /$$$$$$   -->
<!--                  			                        | $$  /$ | $$| $$_____//$$__  $$  -->
<!-- header.php                                    	    | $$ /$$$| $$| $$     |__/  \ $$  -->
<!--                                                  	| $$/$$ $$ $$| $$$$$     /$$$$$/  -->
<!-- By: vcastell <valeriocastellipro@gmail.com>	    | $$$$_  $$$$| $$__/    |___  $$  -->
<!--                                              		| $$$/ \  $$$| $$      /$$  \ $$  -->
<!-- Created: 2022/03/03 09:00:00 vcastell   	        | $$/   \  $$| $$     |  $$$$$$/  -->
<!-- Updated: 2022/03/03 17:00:00 vcastell              |__/     \__/|__/      \______/   -->
<!--                                                                     				  -->
<!--**************************************************************************************-->

<!DOCTYPE html>
<html lang='fr'>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title></title>

		<meta name="description" content="Accès aux différents logements en vente ou en location dans la région alsacienne">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Intégration de Bootstrap -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
		<!-- Intégration du style css -->
		<link rel="stylesheet" href="/setup/style.css">

		<!-- Intégration du script -->
		<!-- <script type="text/javascript" src="/setup/script.js" defer></script> -->

	<body>

	<header>
		<!-- <div class="d-flex justify-content-between bg-dark text-decoration-none text-white px-5">
			<a class="my-auto text-uppercase" href="/index.html">Real ESTATE</a>

			<a class="button my-auto p-3" href="/advert/add_advert.php">Ajout d'une annonce</a>

			<a class="button my-auto p-3" href="/catalog.php">Afficher toutes les annonces</a>
		</div> -->

		<nav class="body">
			<div class="w-50">
				<a href="/index.php" id="logo" class="d-flex gap-2"><i class="bi bi-house-door-fill"></i>Metrium</a>
			</div>

			<div class="d-flex gap-4">
				<a href="#">Support</a>
				<a href="#" class="d-flex gap-2"><i class="bi bi-globe font-weight-normal"></i>Langage</a>
				<a href="/advert/add_advert.php" id="btnAdd">Ajouter une annonce</a>
			</div>

			<div class="d-flex gap-2">
				<a href="#"><i class="bi bi-bell"></i></a>
				<a href="#"><i class="bi bi-person"></i></a>
			</div>
		</nav>

		<div id="background">
			<div id="panel">
				<div class="cards">
					<a class="btn btn-dark" href="/index.php">Afficher les 15 dernières annonces</a>

					<a class="btn btn-dark" href="/catalog.php">Afficher toutes les annonces</a>
				</div>
			</div>				
		</div>
	</header>
