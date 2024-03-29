<?php
//----------------- CLASS CREATION----------------//


// Declaration of the Address class with inheritance (copy / paste) from the abstract class AbstractEntity
class Address extends AbstractEntity
{
	// Declaration of attributes
	private $name;
	private $image;
	private $description;
	private $address;
	private $schedul;
	private $phone;
	private $email;
	private $webSite;
	private $category;
	private $offer_yummy;
	private $fk_user;
	

	// Declaration of the constructor with its arguments which refer to the attributes
	public function __construct($name, $image, $description, $address, $schedul, $phone, $email, $webSite, $category, $offer_yummy, $fk_user)
	{
		// $this refers to the object instance (new Object ())
		$this->name = $name;
		$this->image = $image;
		$this->description = $description;
		$this->address = $address;
		$this->schedul = $schedul;
		$this->phone = $phone;
		$this->email = $email;
		$this->webSite = $webSite;
		$this->category = $category;
		$this->offer_yummy = $offer_yummy;
		$this->fk_user = $fk_user;
	}


	// Getter allows to read an attribute
	// Declaration of the getter for the name
	public function getName()
	{
		return $this->name;
	}
 
 	// Setter allows to write an attribute
	// Declaration of the setter for the name
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



	public function getDescription()
	{
		return $this->description;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}



	public function getAddress()
	{
		return $this->address;
	}

	public function setAddress($address)
	{
		$this->address = $address;
	}



	public function getSchedul()
	{
		return $this->schedul;
	}

	public function setSchedul($schedul)
	{
		$this->schedul = $schedul;
	}



	public function getPhone()
	{
		return $this->phone;
	}

	public function setPhone($phone)
	{
		$this->phone = $phone;
	}



	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}



	public function getWebSite()
	{
		return $this->webSite;
	}

	public function setWebSite($webSite)
	{
		$this->webSite = $webSite;
	}



	public function getCategory()
	{
		return $this->category;
	}

	public function setCategory($category)
	{
		$this->category = $category;
	}



	public function getOffer_yummy()
	{
		return $this->offer_yummy;
	}

	public function setOffer_yummy($offer_yummy)
	{
		$this->offer_yummy = $offer_yummy;
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