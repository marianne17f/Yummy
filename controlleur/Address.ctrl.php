<?php 
class CtrlAddress extends Controller
{
	//Return all addresses in the page index (in the folder Address)
	public function index()
	{
		$this->loadDao('Address');

		$d['addresses'] = $this->DaoAddress->readAll();
		
		$this->set($d);
		$this->render('Address','index');
	}



	// Return all addresses created by the connected user
	public function myAddresses()
	{
		$this->loadDao('Address');

		$d['addresses'] = $this->DaoAddress->readByFkUser($_SESSION['id']);
		$this->set($d);

		$this->render('Address','myAddresses');
	}


	
	public function pageAddAddress()
	{
		// if user is connected...
		if(isset($_SESSION['id']))
		{
			// ... Returns the form to create a new Event
			$this->render('Address','pageAddAddress');
		}
		else
		{
			// Or... returns the page that ask to Sign In ou Sign Up
			$this->render('Home','redirectionInscripCo');
		}
	}



	// Instance a new object "Address" and send it to the DaoAddress, method create()
	public function addAddress()
	{
		$this->loadDao('address');

		$dossier = ROOT.'img/address';
		$fichier = basename($this->files['image']['name']);
		move_uploaded_file($this->files['image']['tmp_name'], $dossier . $fichier);	

		$address = new Address($this->input['name'], $fichier,$this->input['description'],$this->input['address'],$this->input['schedul'],$this->input['tel'],$this->input['email'],$this->input['website'], $this->input['category'], $this->input['offer'], $this->input['fk_user']);
		
		$this->DaoAddress->create($address);

		$d['address'] = $address;
		$this->set($d);
		$this->myAddresses($address);
	}


}

 ?>