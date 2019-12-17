<?php 
//------------------ DAO creation -------------------//

// load the model linked to the DAO
require_once('modele/Event.class.php');
require_once('modele/Comment.class.php');

// Declaration of the DAO object
class DaoEvent
{
	// Insert a new Event in the Data Base
	// Dao method declaration with $event object as argument
	public function create($event)
	{
		DB::select('INSERT INTO event (name,image,address,availability,program,cost,dater,timer,fk_user) VALUES (?,?,?,?,?,?,?,?,?)', array($event->getName(),$event->getImage(),$event->getAddress(),$event->getAvailability(),$event->getProgram(),$event->getCost(),$event->getDater(),$event->getTimer(),$event->getFk_user()));

		$event->getId();
	}




	// Recovers data about the requested ID
	public function read($id) 
	{
		$eventData = DB::select('SELECT * FROM event WHERE id = ? AND archive = 0', array($id));
		
		if (!empty($eventData))
		{
			// A new object is instanced with data from the Data Base in parameters / and this new object is stored in a variable $event
			$event = new Event($eventData[0]['name'],$eventData[0]['image'],$eventData[0]['address'],$eventData[0]['availability'],$eventData[0]['program'],$eventData[0]['cost'],$eventData[0]['dater'],$eventData[0]['timer'],$eventData[0]['fk_user']);
		
			$event->setId($eventData[0]['id']);
			
			// The variable and its contents are returned to the controller
			return $event;
		}
		else
		{
			return null;
		}
	}




	//Recovers all events
	public function readAll()
	{
		$eventData = DB::select('SELECT * FROM event WHERE archive = 0 AND validation = 1 ORDER BY id DESC');
		
		if (!empty($eventData))
		{
			foreach($eventData as $key => $event)
			{
				// A new object is instanced for each Event with the recovered data and stored in a variable $events
				$events[$key] = new Event($event['name'],$event['image'],$event['address'],$event['availability'],$event['program'],$event['cost'],$event['dater'],$event['timer'],$event['fk_user']);
				
				$events[$key]->setId($event['id']);
			}
			return $events;
		}
		
		else
		{
			return null;
		}
	}




	//Recovers all unvalidated events
	public function readAllUnvalidated()
	{
		$eventData = DB::select('SELECT * FROM event WHERE archive = 0 AND validation = 0 ORDER BY id DESC');
		
		if (!empty($eventData))
		{
			foreach($eventData as $key => $event)
			{
				// A new object is instanced for each Event with the recovered data and stored in a variable $events
				$events[$key] = new Event($event['name'],$event['image'],$event['address'],$event['availability'],$event['program'],$event['cost'],$event['dater'],$event['timer'],$event['fk_user']);
				
				$events[$key]->setId($event['id']);
			}
			return $events;
		}
		
		else
		{
			return null;
		}
		
	}



	//Valides (and puts online) event
	public function validation($id)
	{
		DB::select('UPDATE event SET validation = 1 WHERE id = ?', array($id));
		var_dump($id);
	}



	// Recovers created and validated Events by the connected user
	public function readByFkUserValid($fk_user)
	{
		$eventData = DB::select('SELECT * FROM event WHERE archive = 0 AND validation = 1 AND fk_user = ? ORDER BY id DESC',array($fk_user));

		if (!empty($eventData))
		{
			foreach($eventData as $key => $event)
			{
				// A new object is instanced for each Event with the recovered data and stored in a variable $events
				$events0[$key] = new Event($event['name'],$event['image'],$event['address'],$event['availability'],$event['program'],$event['cost'],$event['dater'],$event['timer'],$event['fk_user']);
				
				$events0[$key]->setId($event['id']);
			}
			return $events0;
		}
		else
		{
			return null;
		}
		
	}



	// Recovers events created and unvalidated by the connected user
	public function readByFkUserUnvalid($fk_user)
	{
		$eventData = DB::select('SELECT * FROM event WHERE archive = 0 AND validation = 0 AND fk_user = ? ORDER BY id DESC',array($fk_user));

		if (!empty($eventData))
		{
			foreach($eventData as $key => $event)
			{
				// A new object is instanced for each Event with the recovered data and stored in a variable $events
				$events1[$key] = new Event($event['name'],$event['image'],$event['address'],$event['availability'],$event['program'],$event['cost'],$event['dater'],$event['timer'],$event['fk_user']);
				
				$events1[$key]->setId($event['id']);
			}
			return $events1;
		}
		else
		{
			return null;
		}
		
	}




	// Selects party's number by event
	public function partyByEvent($id)
	{
		$parties = DB::select('SELECT user.id, photo, firstname, lastname
			FROM event_participation
			INNER JOIN user ON fk_user = user.id
			WHERE fk_event = ?',array($id));

		

	}


	// Inserts/creates a comment in DB
	public function comment($comment)
	{
		DB::select('INSERT INTO event_comment(fk_user, fk_event, comment) VALUES (?,?,?)', array($comment->getFk_user(), $comment->getFk_event(), $comment->getComment()));

		$comment->getId();
	}



	// Selects comments by event
	public function commentByEvent($id)
	{
		$comments = DB::select('SELECT user.id, photo, firstname, lastname, fk_user, fk_event, comment, horodate
			FROM event_comment
			INNER JOIN user ON fk_user = user.id
			WHERE fk_event = ? ORDER BY horodate DESC', array($id));


		if (!empty($comments))
		{
			foreach($comments as $key => $comment)
			{
				// A new object is instanced for each Comment with the recovered data and stored in a variable $comments
				$comments[$key] = new Comment($comment['fk_user'], $comment['fk_event'], $comment['comment']);
				
				$comments[$key]->setHorodate($comment['horodate']);
				$comments[$key]->setId($comment['id']);

			}
			return $comments;
		}
		else
		{
			return null;
		}
	}
	



	// Updates an Event
	public function update($event)
	{
		DB::select('UPDATE event SET name = ?, image = ?, address = ?, availability = ?, program = ?, cost = ?, dater = ?, timer = ? WHERE id = ?', array($event->getName(),$event->getImage(),$event->getAddress(),$event->getAvailability(),$event->getProgram(),$event->getCost(),$event->getDater(),$event->getTimer(), $event->getId()));
	}

	


	// Changes the value of the column "archive" 0 => 1
	public function archive($id)
	{
		DB::select('UPDATE event SET archive = 1 WHERE id = ?', array($id));
	}




	// Deletes permanently Event
	public function delete($id)
	{
		DB::select('DELETE FROM event WHERE id = ?', array($id));
	}
}

 ?>