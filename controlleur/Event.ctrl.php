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

		$d['events1'] = $this->DaoEvent->readByFkUserValid($_SESSION['id']);
		$d['events0'] = $this->DaoEvent->readByFkUserUnvalid($_SESSION['id']);
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

		$dossier = ROOT.'img/event/';
		$fichier = basename($this->files['image']['name']);
		move_uploaded_file($this->files['image']['tmp_name'], $dossier . $fichier);	

		$event = new Event($this->input['name'], $fichier,$this->input['address'],$this->input['availability'],$this->input['program'],$this->input['cost'],$this->input['dater'],$this->input['timer'],$this->input['fk_user']);
		
		$this->DaoEvent->create($event);
		$d['event'] = $event;
		$this->set($d);
		$this->myEvents($event);
	}


	// admin valides event and puts it online
	public function validation($id)
	{
		$this->loadDao('Event');

		$this->DaoEvent->validation($id);

		header('Location:'.WEBROOT.'User/administrateur');
	}


	// display the event's details
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

	// display the search bar's results
	public function resultSearch()
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

		$dossier = ROOT.'img/event/';
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


	//  create a comment
	public function comment()
	{
		$this->loadDao('Event');

		$comment = new Comment($this->input['fk_user'],$this->input['fk_event'],$this->input['comment'],$this->input['horodate']);

		$this->DaoEvent->comment($comment);
		var_dump($comment);
	
		$d['comment'] = $comment;
		$this->set($d);

		// $this->details();
	}



	public function archive($id)
	{
		$this->loadDao('Event');
		$this->DaoEvent->archive($id);

		$this->myEvents();
	}



	public function delete($id)
	{
		$this->loadDao('Event');
		$this->DaoEvent->delete($id);

		$this->myEvents();
	}
}

 ?>