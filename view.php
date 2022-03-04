<?php 
	require('setup/header.php');
	require('setup/config.php');

	spl_autoload_register(function($classe){
		require 'class/' .$classe. '.class.php';
	});

	$advertManager = new AdvertManager($conn);
	$adverts = $advertManager->getListAdverts();
?>

		<h1 class="text-center">Affichage de toutes les annonces</h1>

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
					<th>DISPONIBILITE</th>
					<th>CONSULTER CETTE ANNONCE</th>                      
				</tr>
			</thead>
			<tbody>
				<!-- <?php foreach ($adverts as $advert):?> -->
				<tr>
					<td><?= mb_strtoupper($advert['title']) ?></td>
					<td><?= ucfirst($advert['description']) ?></td>
					<td><?= $advert['postcode'] ?></td>
					<td><?= $advert['city'] ?></td>
					<td><?= $advert['price'] ?></td>
					<td><?= $advert['category'] ?></td>
					<td><?= $advert['created_at'] ?></td>
					<td>
						<?php 
							if ($advert['reservation_message'] == NULL){
								echo "Disponible";
							}else{
								echo "Reservé!";
							}
						?>
					</td>
					<td><a <?php echo "href=/view.php?id=" . $advert['id_advert'] ?>><i class='bi bi-eye'></i></a></td>
				</tr>   
				<!-- <?php endforeach; ?> -->
			</tbody>
		</table>
	</body>
</html>