<?php 
//----------------- CLASS CREATION----------------//


// Declaration of the Ingredient class with inheritance (copy / paste) from the abstract class AbstractEntity
class Ingredient extends AbstractEntity
{
	private $name;
	private $image;


	// Declaration of the constructor with its arguments which refer to the attributes
	public function __construct($name, $image)
	{
		// $this refers to the object instance (new Object ())
		$this->name = $name;
		$this->image = $image;
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


}
	
 ?>
