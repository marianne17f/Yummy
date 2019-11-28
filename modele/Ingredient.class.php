<?php 

class Ingredient extends AbstractEntity
{
	private $name;
	private $image;


	public function __construct($name, $image)
	{
		$this->name = $name;
		$this->image = $image;
	}


	public function getName()
	{
		return $this->name;
	}

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
