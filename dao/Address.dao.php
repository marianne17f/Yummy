<?php 

require_once('modele/Address.class.php');

class DaoAddress
{
	
	public function create($address)
	{
		DB::select('INSERT INTO address (name,image,description,address,schedul,phone,email,website,category,offer_yummy, fk_user) VALUES (?,?,?,?,?,?,?,?,?,?,?)', array($adresse->getName(),$adresse->getImage(),$adresse->getDescription(),$adresse->getAddress(),$adresse->getSchedul(),$adresse->getPhone(),$adresse->getEmail(),$adresse->getWebSite(),$adresse->getCategory(),$adresse->getOffer_yummy(),$adresse->getFk_user()));

		$radresse->getId();
	}

	public function read($id)
	{
		$adresseData = DB::select('SELECT * FROM address WHERE id = ? AND archive = 0', array($id));

		if (!empty($addressData))
		{
			$address = new Address($addressData[0]['name'],$addressData[0]['image'],$addressData[0]['description'],$addressData[0]['address'],$addressData[0]['schedul'],$addressData[0]['phone'],$addressData[0]['email'],$addressData[0]['website'],$addressData[0]['category'],$addressData[0]['offer_yummy'],$addressData[0]['fk_user']);
			
			$address->setId($addressData['id']);
			return $address;
		}
		else
		{
			return null;
		}
	}

	public function readAll()
	{
		$addressData = DB::select('SELECT * FROM address WHERE archive = 0 ORDER BY id DESC');

		if (!empty($addressData))
		{
			foreach($addressData as $key => $address)
			{
				$addresses[$key] = new Address($adresse['name'],$adresse['image'],$adresse['description'],$adresse['address'],$adresse['schedul'],$adresse['phone'],$adresse['email'],$adresse['website'],$adresse['category'],$adresse['offer_yummy'],$adresse['fk_user']);
				$addresses[$key]->setId($address['id']);
			}
				return $addresses;
		}
		else
		{
			return null;
		}
		
	}

	public function readByFkUser($fk_user)
	{
		$addressData = DB::select('SELECT * FROM address WHERE archive = 0 AND fk_user = ? ORDER BY id DESC',array($fk_user));

		if (!empty($addressData))
		{
			foreach($addressData as $key => $address)
			{
				$addresses[$key] = new Address($address['name'],$address['image'],$address['description'],$address['address'],$address['schedul'],$address['phone'],$address['email'],$addresse['website'],$adresse['category'],$adresse['offre'],$adresse['fk_user']);
				
				$addresses[$key]->setId($address['id']);
			}
			return $addresses;
		}
		else
		{
			return null;
		}
		
	}

	public function update($address)
	{
		DB::select('UPDATE address SET name = ?, image = ?, description = ?, address = ?, schedul = ?, phone = ?, email = ?, website = ?, category = ?, offer_yummy = ? WHERE id = ?', array($address->getName(),$address->getImage(),$address->getDescription(),$address->getAddress(),$address->getSchedul(),$address->getPhone(),$address->getEmail(),$address->getWebSite(),$address->getCategory(),$address->getOffer_yummy(),$address->getFk_user()));

		$adresse->getId();
	}


}

 ?>