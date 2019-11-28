
<?php

class Event extends AbstractEntity
{
	// Déclaration des attributs
	private $name;
	private $image;
	private $address;
	private $availability;
	private $program;
	private $cost;
	private $dater;
	private $timer;
	private $fk_user;
	

	
	public function __construct($name, $image, $address, $availability, $program, $cost, $dater, $timer, $fk_user)
	{
		$this->name = $name;
		$this->image = $image;
		$this->address = $address;
		$this->availability = $availability;
		$this->program = $program;
		$this->cost = $cost;
		$this->dater = $dater;
		$this->timer = $timer;
		$this->fk_user = $fk_user;
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

	public function getAddress()
	{
		return $this->address;
	}

	public function setAddress($address)
	{
		$this->address = $address;
	}

	public function getAvailability()
	{
		return $this->availability;
	}

	public function setAvailability($availability)
	{
		$this->availability = $availability;
	}

	public function getProgram()
	{
		return $this->program;
	}

	public function setProgram($program)
	{
		$this->program = $program;
	}

	public function getCost()
	{
		return $this->cost;
	}

	public function setCost($cost)
	{
		$this->cost = $cost;
	}

	public function getDater()
	{
		return $this->dater;
	}

	public function setDater($dater)
	{
		$this->dater = $dater;
	}

	public function getTimer()
	{
		return $this->timer;
	}

	public function setTimer($timer)
	{
		$this->timer = $timer;
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