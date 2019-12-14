
<?php

class Comment extends AbstractEntity
{
	// Déclaration des attributs
	private $fk_user;
	private $fk_event;
	private $comment;
	private $horodate;

	
	public function __construct($fk_user, $fk_event, $comment, $horodate)
	{
		$this->fk_user = $fk_user;
		$this->fk_event = $fk_event;
		$this->comment = $comment;
		$this->horodate = $horodate; 
	}	


  
	public function getFk_user()
	{
		return $this->fk_user;
	}
 
	public function setFk_user($fk_user)
	{
		$this->fk_user = $fk_user;
	}



	public function getFk_event()
	{
		return $this->fk_event;
	}
 
	public function setFk_event($fk_event)
	{
		$this->fk_event = $fk_event;
	}



	public function getComment()
	{
		return $this->comment;
	}
 
	public function setComment($comment)
	{
		$this->comment = $comment;
	}



	public function getHorodate()
	{
		return $this->horodate;
	}
 
	public function setHorodate($horodate)
	{
		$this->horodate = $horodate;
	}

	

}

 ?>