<?php

class User extends AbstractEntity
{
	// Déclaration des attributs
	private $firstName;
	private $lastName;
	private $email;
	private $pass;
	private $photo;
	private $age;
	private $sex;
	private $address;
	private $level_cook;
	private $role;

	public function __construct($firstName, $lastName, $email, $pass)
	{
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->email = $email;
		$this->pass = $pass;
	}




    // Getter permet de retourner la valeur de l'attribut
	public function getFirstName()
	{
		return $this->firstName;
	}

    // Setter permet de modifier un attribut
	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;
	}




	public function getLastName()
	{
		return $this->lastName;
	}

	public function setLastName($lastName)
	{
		$this->lastName = $lastName;
	}




	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}




	public function getPass()
	{
		return $this->pass;
	}

	public function setPass($pass)
	{
		$this->pass = $pass;
	}




	public function getPhoto()
	{
		return $this->photo;
	}

	public function setPhoto($photo)
	{
		$this->photo = $photo;
	}




	public function getAge()
	{
		return $this->age;
	}

	public function setAge($age)
	{
		$this->age = $age;
	}



	public function getSex()
	{
		return $this->sex;
	}

	public function setSex($sex)
	{
		$this->sex = $sex;
	}



	public function getAddress()
	{
		return $this->address;
	}

	public function setAddress($address)
	{
		$this->address = $address;
	}



	public function getLevel_cook()
	{
		return $this->level_cook;
	}

	public function setLevel_cook($level_cook)
	{
		$this->level_cook = $level_cook;
	}



	public function getRole()
	{
		return $this->role;
	}

	public function setRole($role)
	{
		$this->role = $role;
	}
}

 ?>