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
		return $this->bdd->query("SELECT advert.id_advert, advert.title, advert.description, advert.postcode, advert.city, advert.price, category.value AS category, advert.created_at 
		FROM advert 
		INNER JOIN category WHERE category.id_category = advert.category_id")->fetchAll();
	}

	/**
	 * Méthode qui récupère toutes les annonces
	 *
	 * @return void
	 */
	public function getList15LastAdverts(){
		return $this->bdd->query("SELECT advert.id_advert, advert.title, advert.description, advert.postcode, advert.city, advert.price, category.value AS category, advert.created_at 
		FROM advert 
		INNER JOIN category WHERE category.id_category = advert.category_id
		ORDER BY advert.created_at DESC LIMIT 15")->fetchAll();
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
		// On execute la requète
		$add_advert->execute();
		// On libère la connexion à la BDD
		$add_advert->closeCursor();
		return ($add_advert->rowCount());      
	}
}

?>