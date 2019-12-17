<?php
//----------------- CLASS CREATION----------------//


// Declaration of the Comment class with inheritance (copy / paste) from the abstract class AbstractEntity
class Comment extends AbstractEntity
{
	// Declaration of attributes
	private $fk_user;
	private $fk_event;
	private $comment;
	private $horodate;

	
	// Declaration of the constructor with its arguments which refer to the attributes
	public function __construct($fk_user, $fk_event, $comment)
	{
		// $this refers to the object instance (new Object ())
		$this->fk_user = $fk_user;
		$this->fk_event = $fk_event;
		$this->comment = $comment;
	}	


  	// Getter allows to read an attribute
	// Declaration of the getter for the fk_user
	public function getFk_user()
	{
		return $this->fk_user;
	}
 
 	// Setter allows to write an attribute
	// Declaration of the setter for the fk_user
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