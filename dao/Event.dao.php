<?php 

require_once('modele/Event.class.php');

class DaoEvent
{
	
	public function create($event)
	{
		DB::select('INSERT INTO event (name,image,address,availability,program,cost,dater,timer,fk_user) VALUES (?,?,?,?,?,?,?,?,?)', array($event->getName(),$event->getImage(),$event->getAddress(),$event->getAvailability(),$event->getProgram(),$event->getCost(),$event->getDater(),$event->getTimer(),$event->getFk_user()));

		$event->getId();
	}

	public function read($id) 
	{
		$eventData = DB::select('SELECT * FROM event WHERE id = ? AND archive = 0', array($id));
		
		if (!empty($eventData))
		{
			$event = new Event($eventData[0]['name'],$eventData[0]['image'],$eventData[0]['address'],$eventData[0]['availability'],$eventData[0]['program'],$eventData[0]['cost'],$eventData[0]['dater'],$eventData[0]['timer'],$eventData[0]['fk_user']);
		
			$event->setId($eventData[0]['id']);
			return $event;
		}
		else
		{
			return null;
		}
	}

	public function readAll()
	{
		$eventData = DB::select('SELECT * FROM event WHERE archive = 0 ORDER BY id DESC');
		
		if (!empty($eventData))
		{
			foreach($eventData as $key => $event)
			{
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

	public function readByFkUser($fk_user)
	{
		$eventData = DB::select('SELECT * FROM event WHERE archive = 0 AND fk_user = ? ORDER BY id DESC',array($fk_user));

		if (!empty($eventData))
		{
			foreach($eventData as $key => $event)
			{
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

	/* Select party's number by event */
	public function partyByEvent($id)
	{
		$party = DB::select('SELECT  user.id, photo, firstname, lastname
			FROM event_participation
			INNER JOIN user ON fk_user = user.id
			WHERE fk_event = ?',array($id));
	}
	
	public function update($event)
	{
		DB::select('UPDATE event SET name = ?, image = ?, address = ?, availability = ?, program = ?, cost = ?, dater = ?, timer = ? WHERE id = ?', array($event->getName(),$event->getImage(),$event->getAddress(),$event->getAvailability(),$event->getProgram(),$event->getCost(),$event->getDater(),$event->getTimer(), $event->getId()));
	}

	
	public function archive($id)
	{
		DB::select('UPDATE event SET archive = 1 WHERE id = ?', array($id));
	}

	public function delete($id)
	{
		DB::select('DELETE FROM event WHERE id = ?', array($id));
	}
}

 ?>