<?php 
class CtrlAddress extends Controller
{
	public function index()
	{
		$this->loadDao('Address');

		$d['addresses'] = $this->DaoAddress->readAll();
		
		$this->set($d);
		$this->render('Address','index');
	}

	public function myAddresses()
	{
		$this->loadDao('Address');

		$d['addresses'] = $this->DaoAddress->readByFkUser($_SESSION['id']);
		$this->set($d);

		$this->render('Address','myAddresses');
	}

	public function pageAddAddress()
	{
		if(isset($_SESSION['id']))
		{
			$this->render('Address','pageAddAddress');
		}
		else
		{
			$this->render('Home','redirectionInscripCo');
		}
	}

	public function addAddress()
	{
		$this->loadDao('address');

		$dossier = ROOT.'img/address';
		$fichier = basename($this->files['image']['name']);
		move_uploaded_file($this->files['image']['tmp_name'], $dossier . $fichier);	

		$address = new Address($this->input['name'], $fichier,$this->input['description'],$this->input['address'],$this->input['schedul'],$this->input['tel'],$this->input['email'],$this->input['website'], $this->input['category'], $this->input['offer'], $this->input['fk_user']);
		
		$this->Daoaddress->create($address);
		// $_SESSION['id'] = DB::lastId();
		$d['address'] = $address;
		$this->set($d);
		$this->myaddresses($address);
	}


}

 ?>