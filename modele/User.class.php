<?php

//----------------- CLASS CREATION----------------//


// Declaration of the User object with inheritance (copy / paste) from the abstract class AbstractEntity
class User extends AbstractEntity
{
	// Declaration of attributes
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



	// Declaration of the constructor with its arguments which refer to the attributes
	public function __construct($firstName, $lastName, $email, $pass)
	{
		// $this refers to the object instance (new Object ())
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->email = $email;
		$this->pass = $pass;
	}





	// Getter allows to read an attribute
	// Declaration of the getter for the firstName
	public function getFirstName()
	{
		return $this->firstName;
	}

    // Setter allows to write an attribute
	// Declaration of the setter for the firstName
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