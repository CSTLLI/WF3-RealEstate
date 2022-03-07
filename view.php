<?php 
	require('setup/header.php');
	require('setup/config.php');

	spl_autoload_register(function($classe){
		require 'class/' .$classe. '.class.php';
	});

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1); error_reporting(E_ALL);

	$advertManager = new AdvertManager($conn);
	$advert = $advertManager->getAdvertById($_GET['id']);

	//var_dump($advert);
?>

		<h1 class="text-center py-3">Détails de l'annonce : <?php echo $advert['title'] ?></h1>

		<div class="card my-5 mx-auto w-50 text-dark card-body cardbody-color p-lg-5">
			<p>Prix : <?= number_format($advert['price'], 2, ',', ' ') ?> &euro;</p>

			<p>Description : <?php echo $advert['description'] ?></p>

			<p>Lieu : <?php echo $advert['city'] . " (" . $advert['postcode'] . ")" ?></p>

			<p>Type de vente : <?php echo $advert['category'] ?></p>

			<p>Annonce crée le : <?php echo $advert['created_at']?></p>
		</div>

		<?php if(empty($advert['reservation_message'])){?>

		<form action="" method="post" class="card my-5 mx-auto w-50 text-dark card-body cardbody-color p-lg-5" enctype="multipart/form-data">
			<h2 class="text-center">Proposer une offre :</h2>

			<div class="mb-2">
				<textarea class="form-control" id="message" name="message" rows="3" placeholder="Message de votre proposition"></textarea>
			</div>

			<div class="text-center">
				<button type="submit" name="confirm" class="btn btn-danger px-5 mb-5 text-uppercase">Je réserve</button>
			</div>
		</form>

		<?php }else{ ?>

		<form action="" method="post" class="card my-5 mx-auto w-50 text-dark card-body cardbody-color p-lg-5" enctype="multipart/form-data">
			<h2 class="text-center">Offre déja reservé</h2>

			<div class="mb-2">
				<textarea class="form-control" id="message" name="message" rows="3" disabled><?php echo $advert['reservation_message']; ?></textarea>
			</div>

		</form>

		<?php } ?>

		<div class="text-center">
			<a href="/catalog.php" class="btn btn-primary px-5 mb-5 text-uppercase">Retour</a>
		</div>

	</body>
</html>

<?php 

	require('setup/functions.php');

	if (isset($_POST['confirm'])){

		if (checkInput($_POST['message'])){				

			$advertManager = new AdvertManager($conn);
			$advert = $advertManager->getAdvertById($_GET['id']);

			$message = $_POST['message'];
			$id = $advert['id_advert'];

			// echo("id : " . $id);
			// echo ("message :" . $message);

			if ($advertManager->addReserAdvert($id, $message)) {
				echo "Annonce a bien été réservé !";
			}else {
				echo "PROBLEME : L'annonce n'a pas été réservé.";
			}
		}
	}
?>