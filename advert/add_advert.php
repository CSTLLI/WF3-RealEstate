<!--**************************************************************************************-->
<!-- 																					  -->
<!-- Project: RealEstate                                / $$      /$$ /$$$$$$$$ /$$$$$$   -->
<!--                  			                        | $$  /$ | $$| $$_____//$$__  $$  -->
<!-- add_item.php                                  	    | $$ /$$$| $$| $$     |__/  \ $$  -->
<!--                                                  	| $$/$$ $$ $$| $$$$$     /$$$$$/  -->
<!-- By: vcastell <valeriocastellipro@gmail.com>	    | $$$$_  $$$$| $$__/    |___  $$  -->
<!--                                              		| $$$/ \  $$$| $$      /$$  \ $$  -->
<!-- Created: 2022/03/04 10:35:00 vcastell   	        | $$/   \  $$| $$     |  $$$$$$/  -->
<!-- Updated: 2022/03/04 15:29:28 vcastell              |__/     \__/|__/      \______/   -->
<!--                                                                     				  -->
<!--**************************************************************************************-->

<?php
	require('../setup/header.php');
	require('../setup/config.php');

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1); error_reporting(E_ALL);

	spl_autoload_register(function($classe){
		require '../class/' .$classe. '.class.php';
	});

	$categoryManager = new CategoryManager($conn);
	$categories = $categoryManager->getListCategory();

	//var_dump($categories);
?>

		<main>
			<div class="card my-5 mx-auto w-50 text-dark">

				<form action="" method="post" class="card-body cardbody-color p-lg-5" enctype="multipart/form-data">

					<h2 class="text-center">Ajouter une annonce</h2>

					<div class="mb-2">
						<input type="text" class="form-control" name="title" id="title" placeholder="Titre de l'annonce">
					</div>

					<div class="mb-2">
						<textarea class="form-control" id="description" name="description" rows="3" placeholder="Description de l'annonce"></textarea>
					</div>

					<div class="mb-2">
						<input type="number" class="form-control" name="postcode" id="postcode" placeholder="Code postal : XXXXX">
					</div>

					<div class="mb-2">
						<input type="text" class="form-control" name="city" id="city" placeholder="Ville">
					</div>

					<div class="mb-2">
						<input type="number" class="form-control" name="price" id="price" placeholder="Prix">
					</div>

					<select name="checkbox" class="mb-2 form-select" aria-label="Default select example">
						<option value="default" selected>Sélectionner un type de vente</option>

						<!-- <?php foreach ($categories as $name_category):?> -->

						<option value=<?=$name_category['id_category']?>><?=$name_category['value']?></option>

						<!-- <?php endforeach; ?> -->
					</select>

					<div class="text-center">
						<button type="submit" name="button" class="btn btn-danger px-5 mb-5 text-uppercase">Envoyer</button>
					</div>
				</form>
			</div>
		</main>
	</body>
</html>

<?php

	require_once "../setup/functions.php";

	if (isset($_POST['button'])){
		if (checkInput($_POST['title']) && $_POST['checkbox'] != "default"){

		$title = $_POST['title'];
		$category_id = $_POST['checkbox'];

		//echo $category_id;

		if (checkInput($_POST['description']) && checkInput($_POST['city'])){
			$description = $_POST['description'];
			$city = $_POST['city'];

			if (checkInput($_POST['postcode']) && checkInput($_POST['price'])){
				$postcode = $_POST['postcode'];
				$price = $_POST['price'];

				$advertManager = new AdvertManager($conn); 
				$advert = new Advert([
					'title' => $title,
					'description' => $description, 
					'postcode' => $postcode,
					'city' => $city,
					'price' => $price,
					'categoryId' => $category_id
				]);

				//var_dump($advert);

				if ($advertManager->addAdvert($advert)) {
					echo "Annonce bien ajouté !";
				}else {
					echo "PROBLEME : L'annonce n'a pas été ajouté à la BDD";
				}

			}else{
				echo "<div class='container alert alert-danger' role='alert'> Erreur sur le prix ou la surface. </div>";
			}
		}else{
			echo "<div class='container alert alert-danger' role='alert'> L'adresse est incorrecte. </div>";
		}
		}else{
		echo "<div class='container alert alert-danger' role='alert'> Erreur sur le titre ou le type de logement. </div>";
		}
	}
?>