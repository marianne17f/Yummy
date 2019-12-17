<?php 
//------------------ DAO creation -------------------//


	
// load the model linked to the DAO
require_once('modele/Address.class.php');

// Declaration of the DAO object
class DaoAddress
{
	// Insert a new Address in the Data Base
	// Dao method declaration with $address object as argument
	public function create($address)
	{
		DB::select('INSERT INTO address (name,image,description,address,schedul,phone,email,website,category,offer_yummy, fk_user) VALUES (?,?,?,?,?,?,?,?,?,?,?)', array($address->getName(),$address->getImage(),$address->getDescription(),$address->getAddress(),$address->getSchedul(),$address->getPhone(),$address->getEmail(),$address->getWebSite(),$address->getCategory(),$address->getOffer_yummy(),$address->getFk_user()));

		$address->getId();
	}



	//Recovers all Events
	public function readAll()
	{
		$addressData = DB::select('SELECT * FROM address WHERE archive = 0 ORDER BY id DESC');

		if (!empty($addressData))
		{
			foreach($addressData as $key => $address)
			{
				// A new object is instanced for each address with the recovered data and stored in a variable $addresses
				$addresses[$key] = new Address($address['name'],$address['image'],$address['description'],$address['address'],$address['schedul'],$address['phone'],$address['email'],$address['website'],$address['category'],$address['offer_yummy'],$address['fk_user']);
				$addresses[$key]->setId($address['id']);
			}
			// The variable and its contents are returned to the controller
				return $addresses;
		}
		else
		{
			return null;
		}
		
	}



	// Recovers created addresses by the connected user
	public function readByFkUser($fk_user)
	{
		$addressData = DB::select('SELECT * FROM address WHERE archive = 0 AND fk_user = ? ORDER BY id DESC',array($fk_user));

		if (!empty($addressData))
		{
			foreach($addressData as $key => $address)
			{
				// A new object is instanced for each address with the recovered data and stored in a variable $addresses
				$addresses[$key] = new Address($address['name'],$address['image'],$address['description'],$address['address'],$address['schedul'],$address['phone'],$address['email'],$address['website'],$address['category'],$address['offer_yummy'],$address['fk_user']);
				
				$addresses[$key]->setId($address['id']);
			}
			return $addresses;
		}
		else
		{
			return null;
		}
		
	}


	// Updates an Address
	public function update($address)
	{
		DB::select('UPDATE address SET name = ?, image = ?, description = ?, address = ?, schedul = ?, phone = ?, email = ?, website = ?, category = ?, offer_yummy = ? WHERE id = ?', array($address->getName(),$address->getImage(),$address->getDescription(),$address->getAddress(),$address->getSchedul(),$address->getPhone(),$address->getEmail(),$address->getWebSite(),$address->getCategory(),$address->getOffer_yummy(),$address->getFk_user()));

		$address->getId();
	}


}

 ?>