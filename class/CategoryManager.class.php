<?php 

	class CategoryManager{
		private $bdd;

		/**
		 * Constructeur de la class Category Manager
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
		public function getListCategory(){
			return $this->bdd->query("SELECT * FROM category")->fetchAll();
		}
	}

?>