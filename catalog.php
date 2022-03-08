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

		<div class="body">
			<!-- <?php foreach ($adverts as $advert):?> -->
			<div class="card my20">
				<div class="row p-2 bg-white border rounded">
					<div class="col-md-4 mt-1">
						<img class="img-fluid img-responsive rounded product-image" src="https://cdn1.epicgames.com/ue/product/Screenshot/ForestHouse0-1920x1080-c854bb9b293be858a30a60776f486f6c.jpg?resize=1&w=1920">
					</div>
	
					<div class="col-md-6 mt-1">
						<a <?php echo "href=/view.php?id=" . $advert['id_advert'] ?>><?= mb_strtoupper($advert['title']) ?></a>

						<div class="mt-1 mb-1 spec-1"><span class="desc">
							<?php if (strlen($advert['description']) >= 40){
								echo substr(ucfirst($advert['description']), 0, 40) . "...";
							}else echo ucfirst($advert['description'])
							?>
						</span</div>
						<div class="mt-1 mb-1 spec-1"><span><?= $advert['postcode']?></span></div>
						<p class="text-justify text-truncate para mb-0"><?= $advert['city']?><br><br></p>
					</div>

					<div class="align-items-center align-content-center border-left">
						<div class="d-flex flex-row align-items-center">
							<h4 class="mr-1"><?= number_format($advert['price'], 2, ',', ' ') ?> &euro;</h4>
						</div>
						<h6 <?php if ($advert['category'] == "vente"){ echo "class='text-success'"; }else echo "class='text-orange'";?>>
							<?= ucfirst($advert['category'])?>
						</h6>
						<h6>Annonce crée le : <?= $advert['created_at'] ?></h6>
						<h6><?php if (empty($advert['reservation_message'])){ echo "Disponible"; }else echo "Reservé!";?></h6>
					</div>
				</div>
			</div>
		</div>
		<!-- <?php endforeach; ?> -->
	</body>
</html>