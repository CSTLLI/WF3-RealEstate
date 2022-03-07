<?php 
	require('setup/header.php');
	require('setup/config.php');

	spl_autoload_register(function($classe){
		require 'class/' .$classe. '.class.php';
	});

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1); error_reporting(E_ALL);

	$advertManager = new AdvertManager($conn);
	$adverts = $advertManager->getList15LastAdverts();
?>
		<h1 class="text-center py-3">Affichage des 15 dernières annonces postées</h1>

		<table class='table table-hover table-dark w-75 mx-auto my-5 shadow-lg p-3 mb-5 bg-body rounded text-center'>
			<thead>
				<tr>
					<th>TITRE</th>
					<th>DESCRIPTION</th>
					<th>CODE POSTAL</th>
					<th>VILLE</th>
					<th>PRIX</th>
					<th>CATEGORIE</th>
					<th>CREER LE</th>                      
				</tr>
			</thead>
			<tbody>
				<!-- <?php foreach ($adverts as $advert):?> -->
				<tr>
					<td><?= mb_strtoupper($advert['title']) ?></td>
					<td><?= ucfirst($advert['description']) ?></td>
					<td><?= $advert['postcode'] ?></td>
					<td><?= $advert['city'] ?></td>
					<td><?= number_format($advert['price'], 2, ',', ' ') ?> &euro;</td>
					<td><?= $advert['category'] ?></td>
					<td><?= $advert['created_at'] ?></td>
				</tr>   
				<!-- <?php endforeach; ?> -->
			</tbody>
		</table>
	</body>
</html>