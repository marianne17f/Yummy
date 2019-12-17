<?php


class CtrlEvent extends Controller
{
	//Return all events in the page index (in the folder Event)
	public function index()
	{
		$this->loadDao('Event');

		$d['events'] = $this->DaoEvent->readAll();
		
		$this->set($d);
		$this->render('Event','index');
	}



	// Return all events created by the connected user
	public function myEvents()
	{
		$this->loadDao('Event');

		$d['events1'] = $this->DaoEvent->readByFkUserValid($_SESSION['id']);
		$d['events0'] = $this->DaoEvent->readByFkUserUnvalid($_SESSION['id']);
		$this->set($d);
		
		$this->render('Event','myEvents');
	}



	// Return the page "pageAddEvent.php" (which contains form to create an Event)
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




	// Instance a new object "Event" and send it to the DaoEvent, method create()
	public function addEvent()
	{
		// Load the Dao 'Event'
		$this->loadDao('Event');

		// Stores in the variable $dossier, the path we're going to store the profile picture
		$dossier = ROOT.'img/event/';

		// $fichier stores only the last component of the file path
			//example : the file path is 'holidaysPhotos/ItalieHolidays/TreviFountain.jpg' => $fichier = 'TreviFountain.jpg'
		$fichier = basename($this->files['image']['name']);

		// Method move_uploaded_file() moves the name of the downloaded file (ex: 'TreviFountain.jpg') to ROOT.'img/profile'
		move_uploaded_file($this->files['image']['tmp_name'], $dossier . $fichier);	

		// Creates a new Event object and stores its in $event
		$event = new Event($this->input['name'], $fichier,$this->input['address'],$this->input['availability'],$this->input['program'],$this->input['cost'],$this->input['dater'],$this->input['timer'],$this->input['fk_user']);
		
		$this->DaoEvent->create($event);
		$d['event'] = $event;
		$this->set($d);
		$this->myEvents($event);
	}



	// Admin valides event and puts it online
	public function validation($id)
	{
		$this->loadDao('Event');

		$this->DaoEvent->validation($id);

		header('Location:'.WEBROOT.'User/administrateur');
	}



	// Calls the Dao which will recovers data from the requested Event
	public function detail($id)
	{
		$this->loadDao('Event');
		$this->loadDao('User');

		$d['event'] = $this->DaoEvent->read($id);
		// $d['party'] = $this->DaoEvent->partyByEvent($id);
		$comments = $this->DaoEvent->commentByEvent($id);
		foreach ($comments as $key => $comment)
		{
			$comment->setFk_user($this->DaoUser->read($comment->getFk_user()));

		}
		
		$d['comments'] = $comments;
		$this->set($d);

		$this->render('Event','detail',$id);
	}



	// display the search bar's results
	public function resultSearch()
	{
		$this->render('Event','result');
	}



	// Returns the page "pageUpdateEvent.php" (which contains form to update an Event)
	public function pageUpdateEvent($id)
	{
		$this->loadDao('Event');

		$d['event'] = $this->DaoEvent->read($id);
		
		$this->set($d);
		$this->render('Event','pageUpdateEvent');
	}



	// Send modified user's data to Dao update() which will change this data in the Data Base
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



	//  Calls the Dao which will create a Comment
	public function comment()
	{
		$this->loadDao('Event');

		$comment = new Comment($this->input['fk_user'],$this->input['fk_event'],$this->input['comment']);

		$this->DaoEvent->comment($comment);
	
		$d['comment'] = $comment;
		$this->set($d);

		$this->detail($this->input['fk_event']);
	}



	// Calls the Dao which will archive Event
	public function archive($id)
	{
		$this->loadDao('Event');
		$this->DaoEvent->archive($id);

		$this->myEvents();
	}



	// Calls the Dao which will permanently delete Event
	public function delete($id)
	{
		$this->loadDao('Event');
		$this->DaoEvent->delete($id);

		$this->render('User','administrateur');
	}
}

 ?>