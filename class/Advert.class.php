<?php 

class Advert{
	private $id_advert;
	private $title;
	private $description;
	private $postcode;
	private $city;
	private $price;
	private $reservation_message;
	private $categoryId;
	private $created_at;

	// Constructeur de la classe Guitare
	function __construct(array $data)
	{
		foreach ($data as $key => $value) {
			$method = 'set'.ucfirst($key);

			if (method_exists($this, $method)) {
				$this->$method($value);
			}
		}
	}

	// Getters de cette classe
	public function getId_advert() { return $this->id_advert; }
	public function getTitle() { return $this->title; }
	public function getDescription() { return $this->description; }
	public function getPostcode() { return $this->postcode; }
	public function getCity() { return $this->city; }
	public function getPrice() { return $this->price; }
	public function getReservation_message() { return $this->reservation_message;}
	public function getCategoryId() { return $this->categoryId; }
	public function getCreatedAt() { return $this->created_at;}

	private function setId_advert(int $id) {
		$this->id = $id;
		return $this;
	}

	private function setTitle(string $title) {
		$this->title = $title;
		return $this;
	}
	
	private function setDescription(string $description) {
		$this->description = $description;
		return $this;
	}

	private function setPostcode(int $postcode) {
		$this->postcode = $postcode;
		return $this;
	}

	private function setCity(string $city) {
		$this->city = $city;
		return $this;
	}
	
	private function setPrice(int $price) {
		$this->price = $price;
		return $this;
	}

	private function setReservation_message(string $reservation_message) {
		$this->reservation_message = $reservation_message;
		return $this;
	}

	private function setCategoryId(int $categoryId) {
		$this->categoryId = $categoryId;
		return $this;
	}
}

?>