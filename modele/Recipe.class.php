<?php 
//----------------- CLASS CREATION----------------//


// Declaration of the Recipe class with inheritance (copy / paste) from the abstract class AbstractEntity
class Recipe extends AbstractEntity
{
	private $name;
	private $image;
	private $preparation_time;
	private $cooking_time;
	private $nb_people;
	private $level;
	private $description;
	private $fk_user;
	

	// Declaration of the constructor with its arguments which refer to the attributes
	public function __construct($name, $image, $preparation_time, $cooking_time, $nb_people, $level, $description, $fk_user)
	{
		// $this refers to the object instance (new Object ())
		$this->name = $name;
		$this->image = $image;
		$this->preparation_time = $preparation_time;
		$this->cooking_time = $cooking_time;
		$this->nb_people = $nb_people;
		$this->level = $level;
		$this->description = $description;
		$this->fk_user = $fk_user;

	}


	// Getter allows to read an attribute
	// Declaration of the getter for the name
	public function getName()
	{
		return $this->name;
	}

	// Getter allows to read an attribute
	// Declaration of the getter for the name
	public function setName($name)
	{
		$this->name = $name;
	}




	public function getImage()
	{
		return $this->image;
	}

	public function setImage($image)
	{
		$this->image = $image;
	}




	public function getPreparation_time()
	{
		return $this->preparation_time;
	}

	public function setPreparation_time($preparation_time)
	{
		$this->preparation_time = $preparation_time;
	}



	public function getCooking_time()
	{
		return $this->cooking_time;
	}

	public function setCooking_time($cooking_time)
	{
		$this->cooking_time = $cooking_time;
	}




	public function getNb_people()
	{
		return $this->nb_people;
	}

	public function setNb_people($nb_people)
	{
		$this->nb_people = $nb_people;
	}




	public function getLevel()
	{
		return $this->level;
	}

	public function setLevel($level)
	{
		$this->level = $level;
	}




	public function getDescription()
	{
		return $this->description;
	}

	public function setDescription($description)
	{
		$this->description = $description; 
	}



	public function getFk_user()
	{
		return $this->fk_user;
	}

	public function setFk_user($fk_user)
	{
		$this->fk_user = $fk_user;
	}


}
	
 ?>