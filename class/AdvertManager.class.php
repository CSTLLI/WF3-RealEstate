<?php 

class AdvertManager{

	private $bdd;

	/**
	 * Constructeur de la class Advert Manager
	 *
	 * @param PDO $bdd
	 */
	public function __construct(PDO $bdd){
		$this->bdd = $bdd;
	}

	/**
	 * Méthode qui récupère toutes les annonces
	 *
	 * @return void
	 */
	public function getListAdverts(){
		return $this->bdd->query("SELECT advert.id_advert, advert.title, advert.description, advert.postcode, advert.reservation_message, advert.city, advert.price, category.value AS category, advert.created_at 
		FROM advert 
		INNER JOIN category WHERE category.id_category = advert.category_id")->fetchAll();
	}

	/**
	 * Méthode qui récupère les 15 dernières annonces faites
	 *
	 * @return void
	 */
	public function getList15LastAdverts(){
		return $this->bdd->query("SELECT advert.id_advert, advert.title, advert.description, advert.postcode, advert.city, advert.price, advert.reservation_message, category.value AS category, advert.created_at 
		FROM advert 
		INNER JOIN category WHERE category.id_category = advert.category_id
		ORDER BY advert.created_at DESC LIMIT 15")->fetchAll();
	}

	/**
	 * Méthode qui récupère les 15 dernières annonces faites
	 *
	 * @return void
	 */
	public function getAdvertById(int $advert_id){
		return $this->bdd->query("SELECT advert.id_advert, advert.title, advert.description, advert.postcode, advert.city, advert.price, advert.reservation_message, advert.category_id, category.value AS category, advert.created_at 
		FROM advert 
		INNER JOIN category WHERE category.id_category = advert.category_id
		AND advert.id_advert = {$advert_id}")->fetch();
	}

	/**
	 * Méthode pour écrire une annonce en BDD
	 *
	 * @param Advert $advert
	 * @return void
	 */
	public function addAdvert(Advert $advert){
		// Préparation de la requète SQL
		$add_advert = $this->bdd->prepare("INSERT INTO `advert` (`title`, `description`, `postcode`, `city`, `price`, `category_id`) 
											VALUES (:title, :description, :postcode, :city, :price, :category_id);");
		// On associe les différentes variables aux marqueurs en respectant les types
		$add_advert->bindValue(':title', $advert->getTitle(), PDO::PARAM_STR);
		$add_advert->bindValue(':description', $advert->getDescription(), PDO::PARAM_STR);
		$add_advert->bindValue(':postcode', $advert->getPostcode(), PDO::PARAM_INT);
		$add_advert->bindValue(':city', $advert->getCity(), PDO::PARAM_STR);
		$add_advert->bindValue(':price', $advert->getPrice(), PDO::PARAM_INT);
		$add_advert->bindValue(':category_id', $advert->getCategoryId(), PDO::PARAM_INT);

		$add_advert->execute();

		$add_advert->closeCursor();
		return ($add_advert->rowCount());      
	}

	/**
	 * Méthode pour modifier une annonce
	 * @param  Advert $advert
	 * @return int          
	 */
	public function updateAdvert(Advert $advert){
		// Préparation de la requète SQL
		$update_advert = $this->bdd->prepare("UPDATE `advert` SET `title` = :title, `description` = :description, `postcode` = :postcode, `city` = :city, `price` = :price, `reservation_message` = `:reservation_message`, `category_id` = :category_id WHERE `id_advert` = :id_advert");

		// On associe les différentes variables aux marqueurs en respectant les types
		$update_advert->bindValue(':id_advert', $advert->getId_advert(), PDO::PARAM_INT);
		$update_advert->bindValue(':title', $advert->getTitle(), PDO::PARAM_STR);
		$update_advert->bindValue(':description', $advert->getDescription(), PDO::PARAM_STR);
		$update_advert->bindValue(':postcode', $advert->getPostcode(), PDO::PARAM_INT);
		$update_advert->bindValue(':city', $advert->getCity(), PDO::PARAM_STR);
		$update_advert->bindValue(':price', $advert->getPrice(), PDO::PARAM_INT);
		$update_advert->bindValue(':category_id', $advert->getCategoryId(), PDO::PARAM_INT);

		$update_advert->execute();

		$update_advert->closeCursor();        
		return ($update_advert->rowCount());
	}

	/**
	 * Méthode pour ajouter le message de réservation
	 *
	 * @param integer $id
	 * @param string $message
	 * @return int
	 */
	public function addReserAdvert(int $id, string $message){
		// Préparation de la requète SQL
		$add_reserAdvert = $this->bdd->prepare("UPDATE `advert` SET `reservation_message` = :message
															  WHERE `id_advert` = :id");

		$add_reserAdvert->bindValue(':id', $id, PDO::PARAM_INT);
		$add_reserAdvert->bindValue(':message', $message, PDO::PARAM_STR);

		$add_reserAdvert->execute();
		$add_reserAdvert->closeCursor(); 

		return ($add_reserAdvert->rowCount());
	}
}

?>