<?php 

class Category{
	private $id_category;
	private $value;

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

	//Getters de cette classe
	public function getId_category(){ return $this->id_category;}
	public function getValue(){ return $this->value;}

	public function setId_category(int $id_category){
		$this->id_category = $id_category;
		return $this;
	}

	public function setValue(string $value){
		$this->value = $value;
		return $this;
	}

}

?>