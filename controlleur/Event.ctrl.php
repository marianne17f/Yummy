<?php


class CtrlEvent extends Controller
{
	public function index()
	{
		$this->loadDao('Event');

		$d['events'] = $this->DaoEvent->readAll();
		
		$this->set($d);
		$this->render('Event','index');
	}



	public function myEvents()
	{
		$this->loadDao('Event');

		$d['events'] = $this->DaoEvent->readByFkUser($_SESSION['id']);
		$this->set($d);
		
		$this->render('Event','myEvents');
	}



	public function pageAddEvent()
	{	/* if the user is connected, allow him to access to the pageAddEvent.php */
		if(isset($_SESSION['id']))
		{
			$this->render('Event','pageAddEvent');
		}
		else
		{
			/*if the user isn't connected, send back him to the redictionInscripCo page*/
			$this->render('Home','redirectionInscripCo');
		}
	}



	public function addEvent()
	{
		$this->loadDao('Event');

		$dossier = ROOT.'img/';
		$fichier = basename($this->files['image']['name']);
		move_uploaded_file($this->files['image']['tmp_name'], $dossier . $fichier);	

		$event = new Event($this->input['name'], $fichier,$this->input['address'],$this->input['availability'],$this->input['program'],$this->input['cost'],$this->input['dater'],$this->input['timer'],$this->input['fk_user']);
		
		$this->DaoEvent->create($event);
		// $_SESSION['id'] = DB::lastId();
		$d['event'] = $event;
		$this->set($d);
		$this->myEvents($event);
	}



	public function detail($id)
	{
		$this->loadDao('Event');
		$this->loadDao('User');

		$d['event'] = $this->DaoEvent->read($id);
		$d['user'] = $this->DaoUser->read($id);
		$d['party'] = $this->DaoEvent->partyByEvent($id);
		
		$this->set($d);

		$this->render('Event','detail',$id);
	}


	public function result()
	{
		$this->render('Event','result');
	}




	public function pageUpdateEvent($id)
	{
		$this->loadDao('Event');

		$d['event'] = $this->DaoEvent->read($id);
		
		$this->set($d);
		$this->render('Event','pageUpdateEvent');
	}



	public function updateEvent()
	{
		$this->loadDao('Event');

		$dossier = ROOT.'img/';
		$fichier = basename($this->files['image']['name']);
		move_uploaded_file($this->files['image']['tmp_name'], $dossier . $fichier);

		$event = $this->DaoEvent->read($this->input['eventId']);

		if (!empty($this->input['name']))
			{
				$event->setName($this->input['name']);
			}

		if (!empty($this->files['image']['name']))
			{
				$event->setImage($this->files['image']['name']);
			}

		if (!empty($this->input['address']))
			{
				$event->setAddress($this->input['address']);
			}

		if (!empty($this->input['availability']))
			{
				$event->setAvailability($this->input['availability']);
			}

		if (!empty($this->input['program']))
			{
				$event->setProgram($this->input['program']);
			}

		if (!empty($this->input['cost']))
			{
				$event->setCost($this->input['cost']);
			}

		if (!empty($this->input['dater']))
			{
				$event->setDater($this->input['dater']);
			}

		if (!empty($this->input['timer']))
			{
				$event->setTimer($this->input['timer']);
			}

		if (!empty($this->input['fk_user']))
			{
				$event->setFk_user($this->input['fk_user']);
			}

		$this->DaoEvent->update($event);
		$d['event'] = $event;

		$this->set($d);	
		$this->myEvents($event);
	}



	public function archive($id)
	{
		$this->loadDao('Event');
		$this->DaoEvent->archive($id);

		// $this->saveUrl('Rencontre', 'mesRencontres');
		$this->myEvents();
	}



	public function delete($id)
	{
		$this->loadDao('Event');
		$this->DaoEvent->delete($id);

		// $this->saveUrl('Rencontre', 'mesRencontres');
		$this->myEvents();
	}
}

 ?>